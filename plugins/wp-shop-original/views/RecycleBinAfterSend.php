<?php 
$last = Wpshop_RecycleBin::getInstance()->getLastOrder();
$order = new Wpshop_Order($this->order['id']);
$ordered_products = $order->getOrderItemsFull($this->order['id']);
if ($ordered_products){
foreach($ordered_products as $product) {
	$product['count'];
	$meta = get_post_custom($product['post_id']);
	foreach ($meta as $key => $val)
	{
		if ( preg_match('/^cost_(\d+)/i', $key, $m) )
		{
			$costs[$m[1]] = $val[0];
		}
			
	}
	
	if (count($costs) > 0)
	{
		
		foreach ($costs as $key => $val)
		{
			$val_r = round($val,2);
			$key_order='';
			if ($product['cost']==$val_r)
			{
				$key_order=$key;
				$name='sklad_'.$key_order;
				$old = get_post_meta( $product['post_id'],$name, true );
        if($old){
				$new = (int)$old - $product['count'];
				update_post_meta($product['post_id'],$name,$new); 
        }
			}
			
		}
		
	}
}
}
		
if ($this->order['info']['payment'] == "wm") {

?>
<form action="https://merchant.webmoney.ru/lmi/payment.asp" method="POST">
	<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="<?php  echo $order->getTotalSum();?>"/>
	<input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="<?php  echo base64_encode(__('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}");?>"/>
	<input type="hidden" name="LMI_PAYEE_PURSE" value="<?php  echo $this->wm['wmCheck'];?>"/>
	<input type="hidden" name="LMI_SUCCESS_URL" value="<?php  echo $this->wm['successUrl'];?>"/>
	<input type="hidden" name="LMI_FAIL_URL" value="<?php  echo $this->wm['failedUrl'];?>"/>
	<input type="hidden" name="LMI_RESULT_URL" value="<?php  echo bloginfo('wpurl')."/?wmResult=1&order_id={$this->order['id']}";?>"/>
	<input type="submit" class=\"wpshop-button\" value="<?php  echo __('Pay WM', 'wp-shop'); // Оплатить WM ?>"/>
</form>
<?php 
} elseif ($this->order['info']['payment'] == "ym") {?>
<?php 
	if ($this->ym['p_name']){$p_name = '&fio=on';}else {$p_name ='';}
	if ($this->ym['p_email']){$p_email = '&mail=on';}else {$p_email ='';}
	if ($this->ym['p_cell']){$p_cell = '&phone=on';}else {$p_cell ='';}
	if ($this->ym['p_adr']){$p_adr = '&address=on';}else {$p_adr ='';}
	if ($this->ym['p_visa']){$p_visa = '&payment-type-choice=on';}else {$p_visa ='';}
	if ($this->ym['p_mobile']){$p_mobile = '&mobile-payment-type-choice=on';}else {$p_mobile ='';}
?>
<iframe frameborder="0" allowtransparency="true" scrolling="no" style="display: block; margin: 0 auto;" src="https://money.yandex.ru/embed/shop.xml?account=<?php  echo urlencode($this->ym['ymAccount']);?>&quickpay=shop<?php  echo $p_visa.$p_mobile;?>&writer=seller&targets=<?php  echo urlencode (__('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}");?>&targets-hint=&default-sum=<?php  echo $order->getTotalSum();?>&button-text=01<?php  echo $p_name.$p_email.$p_cell.$p_adr;?>&successURL=<?php echo $this->ym['successUrl'];?>" width="450" height="198"></iframe>
<?php 
} elseif ($this->order['info']['payment'] == "sber") {
	if ($this->sber['test']){
		$action_adr = 'https://3dsec.sberbank.ru/payment/rest/';
	}else{
		$action_adr = 'https://securepayments.sberbank.ru/payment/rest/';
	}

	if ($this->sber['stage'] == 'two') {
		$action_adr .= 'registerPreAuth.do';
	} else if ($this->sber['stage'] == 'one') {
		$action_adr .= 'register.do';
	} 
	
	$args = array(
		'userName' => $this->sber['login'],
		'password' => $this->sber['pass'],
		'orderNumber' => $this->order['id'],
		'amount' => $order->getTotalSum()*100,
		'returnUrl' =>$this->sber['successUrl'],
		'currency' =>$this->sber['currency_sber'],
		'failUrl'=>$this->sber['failedUrl']
	);
	
	$rbsCurl = curl_init();
	curl_setopt_array($rbsCurl, array(
		CURLOPT_URL => $action_adr,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query($args)
	));
	$response = curl_exec($rbsCurl);
	curl_close($rbsCurl);

	$response = json_decode($response, true);
	
	$errorCode = $response['errorCode'];
	$return_link_sber =get_option("wpshop.cartpage");

	if ($errorCode == 0) {
		echo '<h3>'.__('Thank you for your order, please click the button `Pay` below to pay.', 'wp-shop').'</h3><br><br>'.
		'<a class="wpshop-button" href="'.$response['formUrl'].'">'.__('Pay', 'wp-shop').'</a>'.
		'<a class="wpshop-button" href="'.$return_link_sber.'">'.__('Refuse to pay and go to shopping cart', 'wp-shop').'</a><br><br>';
	}
	else {
		echo '<h3>'.__('Error #'.$errorCode.': '.$response['errorMessage'], 'wp-shop').'</h3><br><br>'.
		'<a class="wpshop-button" href="'.$return_link_sber.'">'.__('Refuse to pay and go to shopping cart', 'wp-shop').'</a><br><br>';
	}
} elseif ($this->order['info']['payment'] == "icredit") {

    $ICREDIT_PAYMENT_GATEWAY_URL_TEST = 'https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl';
    $ICREDIT_PAYMENT_GATEWAY_URL_REAL = 'https://icredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl';
		
	$full_name = $this->order['info']['username'];
	$full_name = rtrim ($full_name);
	if(isset($full_name)&&$full_name!=''){
		$full_name_arr = explode(" ", $full_name);
	}
	
	$icredit_data = array();
	$icredit_data['GroupPrivateToken'] = $this->icredit['token'];
	$icredit_data['Order'] = $this->order['id'];
	$icredit_data['IPNURL']= get_bloginfo("url");
	$icredit_data['RedirectURL']= $this->icredit['success'];
	$icredit_data['Currency']=$this->icredit['currency']; 
	$icredit_data['EmailAddress']= $this->order['info']['email'];
	$icredit_data['Custom1'] = session_id();
	
	$icredit_items = array();
	$whole_price = 0;
	foreach ($this->order['offers'] as $key=>$item) {
		$icredit_items[$key]['Quantity'] = $item['partnumber'];
		$icredit_items[$key]['UnitPrice'] = $item['price'];
		$icredit_items[$key]['Description'] = $item['name'];
		$whole_price = $whole_price+$item['price']*$item['partnumber']*1;
	}
	
	if (isset($icredit_items)&&is_array($icredit_items)) {
		$icredit_data['Items'] = $icredit_items;
	}
	
	if (is_array($full_name_arr)&&$full_name_arr[0]!='') {
		$icredit_data['CustomerFirstName'] = $full_name_arr[0];
	}
	
	$discont = $this->order['info']['discount'];
	if (isset($discont)&&$discont > 0&&isset($whole_price)&&$whole_price>0) {
		$price_with_disc= ($whole_price/100)*$discont*1;
		$icredit_data['Discount'] = $price_with_disc;
	}
	
	if (is_array($full_name_arr)&&$full_name_arr[1]!='') {
		$icredit_data['CustomerLastName'] =  $full_name_arr[1];
	}
	
	if ($this->icredit['test']){
		$icredit_payment_gateway_url = $ICREDIT_PAYMENT_GATEWAY_URL_TEST;
	}else{
		$icredit_payment_gateway_url = $ICREDIT_PAYMENT_GATEWAY_URL_REAL;
	}
	
	$jsonData = json_encode($icredit_data);
		

	$rbsCurl = curl_init();
	curl_setopt_array($rbsCurl, array(
		CURLOPT_URL => $icredit_payment_gateway_url,
		CURLOPT_HTTPHEADER => array("Content-type: application/json"),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $jsonData
	));
	$response = curl_exec($rbsCurl);
	
	curl_close($rbsCurl);
	
	
	$j_response = json_decode($response);
	
	$errorCode = $j_response->Status;
	$return_link_icredit =get_option("wpshop.cartpage");

	if ($errorCode == 0) {
		echo '<h3>'.__('Thank you for your order, please click the button below to pay.', 'wp-shop').'</h3><br><br>'.
		'<a class="wpshop-button" href="'.$j_response->URL.'">'.__('Pay ICredit', 'wp-shop').'</a>'.
		'<a class="wpshop-button" href="'.$return_link_icredit.'">'.__('Refuse to pay and go to shopping cart', 'wp-shop').'</a><br><br>';
	}
	else {
		echo '<h3>'.__('Error #'.$errorCode, 'wp-shop').'</h3><br><br>'.
		'<a class="wpshop-button" href="'.$return_link_icredit.'">'.__('Refuse to pay and go to shopping cart', 'wp-shop').'</a><br><br>';
	}

} elseif ($this->order['info']['payment'] == "yandex_kassa") {
?>
<form action="https://<?php if($this->yandex_kassa['test']==true){echo 'demo';}?>money.yandex.ru/eshop.xml" method="POST" id="payment_form">
	<input type="hidden" name="shopId" value="<?php  echo $this->yandex_kassa['shopId'];?>" />
	<input type="hidden" name="scid" value="<?php  echo $this->yandex_kassa['scid'];?>" />
	<input type="hidden" name="sum" value="<?php  echo $order->getTotalSum();?>" />
	<input type="hidden" name="customerNumber" value="<?php echo $this->order['id'];?>" />
	<input type="hidden" name="orderNumber" value="<?php echo $this->order['id'];?>" />
	<input type="hidden" name="custom" value="<?php echo session_id();?>" />
	<input type="hidden" name="cps_email" value="<?php echo $order->getOrderEmail();?>" />
	<input type="hidden" name="shopSuccessURL" value="<?php echo $this->yandex_kassa['successUrl'];?>" />
	<input type="hidden" name="shopFailURL" value="<?php echo $this->yandex_kassa['failedUrl'];?>" />
	<input type="hidden" name="paymentType" value="<?php echo $_GET['paymentType'];?>" />
	<input type="hidden" name="cms_name" value="wordpress_wp-shop-original" />
	<input type="submit" class=\"wpshop-button\" value="<?php  echo __('Pay Yandex kassa', 'wp-shop'); // Оплатить Yandex касса ?>"/>
</form>
<?php 
}elseif($this->order['info']['payment'] == "robokassa"){

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = $this->robokassa['login'];
$mrh_pass1 = $this->robokassa['pass1'];

// номер заказа
// number of order
$inv_id = $this->order['id'];

// описание заказа
// order description
$inv_desc = urlencode(__('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}.");

// сумма заказа
// sum of order
$out_summ = $order->getTotalSum();

// тип товара
// code of goods
$shp_item = 1;

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "PCR";

// язык
// language
$culture = "ru";

// кодировка
// encoding
$encoding = "utf-8";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

// HTML-страница с кассой
// ROBOKASSA HTML-page
print "<script language=JavaScript ".
      "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
//      "src='https://test.robokassa.ru/Handler/MrchSumPreview.ashx?".
      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
      "&Desc=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item".
      "&Culture=$culture&Encoding=$encoding'></script>";

?>
<?php 
}elseif($this->order['info']['payment'] == "ek"){
$fields = array(); 

// Добавление полей формы в ассоциативный массив
$fields["WMI_MERCHANT_ID"]    = $this->ek['wmCheck'];
$fields["WMI_PAYMENT_AMOUNT"] = $order->getTotalSum();
$fields["WMI_CURRENCY_ID"]    = $this->ek['currency_ek'];
$fields["WMI_PAYMENT_NO"]     = $this->order['id'];
$fields["WMI_DESCRIPTION"]    = __('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}.";
$fields["WMI_SUCCESS_URL"]    = $this->ek['successUrl'];
$fields["WMI_FAIL_URL"]       = $this->ek['failedUrl'];
$fields["SESSION_USER"]       = session_id();

//Если требуется задать только определенные способы оплаты, раскоментируйте данную строку и перечислите требуемые способы оплаты.
// if (isset($_GET['rk'])){$fields["WMI_PTENABLED"] = $_GET['rk'];} 

// Формирование HTML-кода платежной формы

print "<form action=\"https://merchant.w1.ru/checkout/default.aspx\" method=\"POST\">";

foreach($fields as $key => $val)
{
    if (is_array($val))
       foreach($val as $value)
       {
     print "<input type=\"hidden\" name=\"$key\" value=\"$value\"/>";
       }
    else	    
       print "<input type=\"hidden\" name=\"$key\" value=\"$val\"/>";
}
$button_name = __('Pay EK', 'wp-shop');// Оплатить в Единой кассе
print "<input type=\"submit\" class=\"wpshop-button\" value=\"".$button_name."\"/></form>";
?>

<?php 
}elseif($this->order['info']['payment'] == "simplepay"){

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function makeSigStr ( $strScriptName, array $arrParams, $strSecretKey ) {
  unset($arrParams['sp_sig']);
  
  ksort($arrParams);

  array_unshift($arrParams, $strScriptName);
  array_push   ($arrParams, $strSecretKey);

  return join(';', $arrParams);
}

$fields = array(); 

// Добавление полей формы в ассоциативный массив
$fields["sp_outlet_id"]    = $this->simplepay['outlet_id'];
$fields["sp_order_id"] = $this->order['id'];
$fields["sp_partner_id"]    = '18';
$fields["sp_amount"]     = $order->getTotalSum();
$fields["sp_description"]    = __('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}.";
$fields["sp_user_params"]    =  session_id();
$fields["sp_currency"]       = $this->simplepay['currency_simplepay'];
$fields["sp_salt"]       = rand(21,43433);
$fields["sp_user_ip"] = get_client_ip();
$fields["sp_user_name"] = $this->order['info']['username'];
$fields["sp_user_contact_email"] = $this->order['info']['email'];

$sp_sig_before  = makeSigStr('payment',$fields,$this->simplepay['secure']);
$fields["sp_sig"] =  md5($sp_sig_before);
print_r($fields["order"]);
?>

<form action="https://api.simplepay.pro/sp/payment" method="POST"> 
   
    <?php foreach($fields as $key => $val)
    {
    if (is_array($val))
       foreach($val as $value)
       {
     print "<input type=\"hidden\" name=\"$key\" value=\"$value\"/>";
       }
    else	    
       print "<input type=\"hidden\" name=\"$key\" value=\"$val\"/>";
    }?>
    <input type="submit" class=\"wpshop-button\" value="<?php  echo __('Pay Simplepay', 'wp-shop'); // Оплатить через Simplepay ?>"/>
  </form>

<?php 
} elseif($this->order['info']['payment'] == "paypal"){

$fields = array(); 

// Добавление полей формы в ассоциативный массив

$fields["cmd"]         = '_cart';
$fields["upload"] 	   = 1;
$fields["business"]    = $this->paypal['email'];
$fields["amount_1"]      = $order->getTotalSum();
$text = __('Order', 'wp-shop')." #{$this->order['id']} ".__('from site', 'wp-shop')." {$_SERVER['HTTP_HOST']}.";
$convertedText = mb_convert_encoding($text, 'utf-8', mb_detect_encoding($text));
$fields["item_name_1"]      = $convertedText;
$fields["currency_code"] 	   = $this->paypal['currency_paypal'];
$fields["no_shipping"] 	   = 1;
$fields["invoice"] 	   = $this->order['id'];
$fields["custom"] 	   = session_id();
$fields["return"] 	   = $this->paypal['success'];
$fields["notify_url"] 	   = 'http://'.$_SERVER['HTTP_HOST'];
// Формирование HTML-кода платежной формы
if($this->paypal['test']==true){print "<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" accept-charset=\"UTF-8\">";}
else{ print "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" accept-charset=\"UTF-8\">";}

foreach($fields as $key => $val)
{
    if (is_array($val))
       foreach($val as $value)
       {
     print "<input type=\"hidden\" name=\"$key\" value=\"$value\"/>";
       }
    else	    
       print "<input type=\"hidden\" name=\"$key\" value=\"$val\"/>";
}

print "<input type=\"image\" value=\"PayPal\" src=\"https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif\" alt=\"Submit button\" align=\"left\" style=\"margin-right:7px;\" /></form>";

}elseif($this->order['info']['payment'] == "sofort"){
	require_once(WPSHOP_CLASSES_DIR.'/sofort_lib/payment/sofortLibSofortueberweisung.inc.php');
	
	if(isset($this->sofort['conf_key'])&&$this->sofort['conf_key']!=''){
	  $configkey = $this->sofort['conf_key'];
	  $Sofortueberweisung = new Sofortueberweisung($configkey);

	  $Sofortueberweisung->setAmount($order->getTotalSum());
	  $Sofortueberweisung->setCurrencyCode('EUR');
	  $Sofortueberweisung->setReason($this->order['id'],$_SERVER['HTTP_HOST']);
	  $Sofortueberweisung->setUserVariable(session_id());

	  $Sofortueberweisung->setSuccessUrl($this->sofort['successUrl'], true);
	  $Sofortueberweisung->setAbortUrl($this->sofort['failedUrl']);
	  $Sofortueberweisung->setNotificationUrl($this->sofort['resultUrl']);
	  if (isset($this->sofort['notifEmail'])&&$this->sofort['notifEmail']!=''){
		$Sofortueberweisung->setNotificationEmail($this->sofort['notifEmail']);
	  }
	  
	  // $Sofortueberweisung->setSenderSepaAccount('SFRTDE20XXX', 'DE06000000000023456789', 'Max Mustermann');
	  // $Sofortueberweisung->setSenderCountryCode('DE');
	  // $Sofortueberweisung->setNotificationUrl('http://www.google.de', 'loss,pending');
	  // $Sofortueberweisung->setNotificationUrl('http://www.yahoo.com', 'loss');
	  // $Sofortueberweisung->setNotificationUrl('http://www.bing.com', 'pending');
	  // $Sofortueberweisung->setNotificationUrl('http://www.sofort.com', 'received');
	  // $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'refunded');
	  // $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'untraceable');
		if (isset($this->sofort['trust'])&&$this->sofort['trust']){
			$Sofortueberweisung->setCustomerprotection(true);
		}
	  $Sofortueberweisung->sendRequest();

	  if($Sofortueberweisung->isError()) {
		//SOFORT-API didn't accept the data
		echo $Sofortueberweisung->getError();
	  } else {
		//buyer must be redirected to $paymentUrl else payment cannot be successfully completed!
		$paymentUrl = $Sofortueberweisung->getPaymentUrl();
		$Sofortueberweisung->safeRedirect($paymentUrl);
	  }
	}
} elseif($this->order['info']['payment'] == "chronopay"){
if($this->chronopay['order']==true){
$sign = md5($this->chronopay['product_id'].'-'.$order->getTotalSum().'-'.$this->order['id'].'-'.$this->chronopay['sharedsec']);}else{
$sign = md5($this->chronopay['product_id'].'-'.$order->getTotalSum().'-'.$this->chronopay['sharedsec']);
}
?>
  <form action="https://payments.chronopay.com/" method="POST"> 
    <input type="hidden" name="product_id" value="<?php  echo $this->chronopay['product_id'];?>" /> 
    <input type="hidden" name="product_price" value="<?php  echo $order->getTotalSum();?>" />
    <input type="hidden" name="order_id" value="<?php echo $this->order['id'];?>" />     
    <input type="hidden" name="cs1" value="<?php echo session_id();?>" /> 
    <input type="hidden" name="cb_type" value="P" />
    <input type="hidden" name="cb_url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>" /> 
    <input type="hidden" name="success_url" value="<?php  echo $this->chronopay['success'];?>" /> 
    <input type="hidden" name="decline_url" value="<?php  echo $this->chronopay['failed'];?>" /> 
    <input type="hidden" name="sign" value="<?php echo $sign; ?>" /> 
    <input type="submit" class=\"wpshop-button\" value="<?php  echo __('Pay Chronopay', 'wp-shop'); // Оплатить через ChronoPay ?>"/>
  </form>
<?php  } else {?>
<script type="text/javascript">
jQuery(document).ready(function()
{
	window.__cart.reset();
});
</script>
<?php } ?>
<?php if(isset($_GET['ya_dostavka'])&&$_GET['ya_dostavka']==1){
  $yandex_delivery_opts = $this->yandex_delivery;
  if (isset($yandex_delivery_opts['cart_code'])&&isset($yandex_delivery_opts['activate'])&&$yandex_delivery_opts['cart_code']!='') {
  echo $yandex_delivery_opts['cart_code'];?>

  <script type="text/javascript">
    ydwidget.ready(function(){
      ydwidget.initCartWidget({
        // Завершение загрузки корзинного виджета.
        'onLoad': function () {
          // Подтверждаем заказ и передаем любые данные со страницы успешного оформления, если 
          // необходимо. В данном случае, номер заказа (чтобы номер заказа в CMS и в Яндекс.Доставке
          // совпадал)
          ydwidget.cartWidget.order.confirmOrder({'order_num': '<?php echo $this->order['id'];?>'})
          .done(function (data) {
             if (data.status == 'ok') {
               console.log('Заказ создан успешно.', data)
              } else {
                // При правильной интеграции, на этом этапе ошибки быть не должно, так как вся 
                // валидация происходит на этапе вызова createOrder, и здесь в cookie уже валидные
                // данные
                console.log('При создании заказа были ошибки.', data)
              }
          });
        }
      })
    })
  </script>
<?php  }}?>