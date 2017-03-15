<style type='text/css'>
.postbox h3
{
	padding: 0 12px;
	cursor: none;
}

#wpshop_tabs_metabox {
	margin-bottom: 20px;
}
</style>
<script>
	jQuery( document ).ready(function( $ ) {
		var tabs = $( "#wpshop_tabs_metabox" ).tabs();
	});
</script>	
<div class="wrap">
<h2><?php  _e('Payment methods', 'wp-shop'); /*Способы оплаты*/ ?></h2>
<form method="POST" class="payments">
<input type="hidden" name="update_payments" value="1"/>
<div id="wpshop_tabs_metabox">
<ul>
        <li class="wpshop_tab-1"><a href="#wpshop_tabs_metabox-1"><?php  echo __('Offline payments', 'wp-shop');?></a></li>
        <li class="wpshop_tab-2"><a href="#wpshop_tabs_metabox-2"><?php  echo __('Russian payment systems', 'wp-shop');?></a></li>	
		<li class="wpshop_tab-3"><a href="#wpshop_tabs_metabox-3"><?php  echo __('International payment systems', 'wp-shop');?></a></li>	
</ul>
<div id="wpshop_tabs_metabox-1">
		<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Self-delivery', 'wp-shop'); /*Самовывоз*/ ?></h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td><?php  _e('Enable support for self-delivery from a store / office.', 'wp-shop'); /*Включить поддержку самовывоза из магазина/офиса.*/ ?></td>
          <?php if(isset($this->vizit['activate'])&&$this->vizit['activate']){
            $vizit_activate =" checked";
          }else {
            $vizit_activate ="";
          } ?>
					<td><input type="checkbox" name="wpshop_payments_vizit[activate]"<?php  echo $vizit_activate;?>/></td>
				</tr>

				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->vizit['delivery'])&&$this->vizit['delivery']){
                if (in_array($delivery->ID,$this->vizit['delivery']))
                {
                  $checked = " checked";
                }
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.vizit",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_vizit[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="8" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>

	<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Cash to courier', 'wp-shop'); /*Включить поддержку оплаты курьеру*/ ?></h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td><?php  _e('Enable support for payment to courier', 'wp-shop'); /*Включить поддержку оплаты курьеру*/ ?></td>
					<?php if(isset($this->cash['activate'])&&$this->cash['activate']){
            $cash_activate =" checked";
          }else {
            $cash_activate ="";
          } ?>
					<td><input type="checkbox" name="wpshop_payments_cash[activate]"<?php  echo $cash_activate;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->cash['delivery'])&&$this->cash['delivery']){
							if (in_array($delivery->ID,$this->cash['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.cash",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_cash[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="9" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>
	<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Cash on delivery (COD)', 'wp-shop'); /*Наложенный платеж*/ ?></h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td><?php  _e('Enable support for COD', 'wp-shop'); /*Включить поддержку наложного платежа*/ ?></td>
				  <?php if(isset($this->post['activate'])&&$this->post['activate']){
            $post_activate =" checked";
          }else {
            $post_activate ="";
          } ?>
					<td><input type="checkbox" name="wpshop_payments_post[activate]"<?php  echo $post_activate;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->post['delivery'])&&$this->post['delivery']){
							if (in_array($delivery->ID,$this->post['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.post",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_post[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="10" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>

	<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Your bank account details', 'wp-shop'); /*Ваши банковские реквизиты*/ ?></h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable support of a payment through the bank', 'wp-shop'); /*Включить поддержку оплаты через банк*/ ?></td>
          <?php if(isset($this->bank['activate'])&&$this->bank['activate']){
            $bank_activate =" checked";
          }else {
            $bank_activate ="";
          } ?>
					<td><input type="checkbox" name="wpshop_payments_bank[activate]"<?php  echo $bank_activate;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->bank['delivery'])&&$this->bank['delivery']){
							if (is_array($this->bank['delivery']) && in_array($delivery->ID,$this->bank['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.bank",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_bank[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="11" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>
</div>
<div id="wpshop_tabs_metabox-2">
	<div id="poststuff">
		<div class="postbox">
			<h3>Web-money</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td><?php  _e('Enable support of a payment using Web-Money', 'wp-shop'); /*Включить поддержку оплаты по Web-Money*/ ?></td>
					  <?php if(isset($this->wm['activate'])&&$this->wm['activate']){
						$wm_activate =" checked";
					  }else {
						$wm_activate ="";
					  } ?>
					<td><input type="checkbox" name="wpshop_payments_wm[activate]"<?php  echo $wm_activate;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->wm['delivery'])&&$this->wm['delivery']){
							if (in_array($delivery->ID,$this->wm['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.wm",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_wm[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>

				<tr>
					<td><?php  _e('Your WM-purse', 'wp-shop'); /*Ваш WM-Кошелек*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_wm[wmCheck]" value="<?php if(isset($this->wm['wmCheck'])){echo $this->wm['wmCheck'];}?>"/></td>
				</tr>
				<tr>
					<td><?php  _e('Success URL', 'wp-shop'); ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_wm[successUrl]" value="<?php  if(isset($this->wm['successUrl'])){echo $this->wm['successUrl'];}?>"/></td>
				</tr>
				<tr>
					<td><?php  _e('Failed URL', 'wp-shop'); ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_wm[failedUrl]" value="<?php if(isset($this->wm['failedUrl'])){echo $this->wm['failedUrl'];}?>"/></td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="12" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>
  
  <div id="poststuff">
		<div class="postbox">
			<h3>Yandex money</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td><?php  _e('Enable support of a payment using Yandex Money', 'wp-shop'); /*Включить поддержку оплаты по Yandex Money*/ ?></td>
					  <?php if(isset($this->ym['activate'])&&$this->ym['activate']){
						$ym_activate =" checked";
					  }else {
						$ym_activate ="";
					  } ?>
					<td><input type="checkbox" name="wpshop_payments_ym[activate]"<?php  echo $ym_activate;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->ym['delivery'])&&$this->ym['delivery']){
							if (in_array($delivery->ID,$this->ym['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.ym",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_ym[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>

				<tr>
					<td><?php  _e('Your Yandex money account ', 'wp-shop'); /*Ваш Yandex Money кошелек*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_ym[ymAccount]" value="<?php if(isset($this->ym['ymAccount'])){echo $this->ym['ymAccount'];}?>"/></td>
				</tr>
				<tr>
					<td><?php  _e('Success URL', 'wp-shop'); ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_ym[successUrl]" value="<?php  if(isset($this->ym['successUrl'])){echo $this->ym['successUrl'];}?>"/></td>
				</tr>
				<tr>
					<td><?php  _e('Add payments by Visa and MasterCard', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_visa'])&&$this->ym['p_visa']){
							$ym_p_visa =" checked";
						}else {
							$ym_p_visa ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_visa]"<?php  echo $ym_p_visa;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Add payments from cellphones', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_mobile'])&&$this->ym['p_mobile']){
							$ym_p_mobile =" checked";
						}else {
							$ym_p_mobile ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_mobile]"<?php  echo $ym_p_mobile;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Require Payer Name', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_name'])&&$this->ym['p_name']){
							$ym_p_name =" checked";
						}else {
							$ym_p_name ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_name]"<?php  echo $ym_p_name;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Require Payer Email', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_email'])&&$this->ym['p_email']){
							$ym_p_email =" checked";
						}else {
							$ym_p_email ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_email]"<?php  echo $ym_p_email;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Require Payer Cell', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_cell'])&&$this->ym['p_cell']){
							$ym_p_cell =" checked";
						}else {
							$ym_p_cell ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_cell]"<?php  echo $ym_p_cell;?>/></td>
				</tr>
				<tr>
					<td><?php  _e('Require Payer Adress', 'wp-shop'); ?></td>
						<?php if(isset($this->ym['p_adr'])&&$this->ym['p_adr']){
							$ym_p_adr =" checked";
						}else {
							$ym_p_adr ="";
						} ?>
					<td><input type="checkbox" name="wpshop_payments_ym[p_adr]"<?php  echo $ym_p_adr;?>/></td>
				</tr>
			</table>
			
			</div>
		</div>
	</div>
	
	<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Payment through the merchant', 'wp-shop');/* Оплата через шлюз */?></h3>
			<div class="inside">
			
			<table cellpadding="2" cellspacing="2" >
				<tr>
					<td><?php  _e('Enable support of Merchant', 'wp-shop'); /*Включить поддержку merchants*/ ?></td>
					<?php if(isset($this->merchant)&&$this->merchant){
						$merchant_activate =" checked";
					  }else {
						$merchant_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_merchant"<?php  echo $merchant_activate;?>/></td>
				</tr>
				
				<script>
					jQuery(function(){
						if (jQuery('.merchant_system').val() == 'ek') { 
							jQuery('.robokassa_n').hide();
							jQuery('.yandex_kassa_n').hide();
							jQuery('.ek_n').show();
						}
						
						if (jQuery('.merchant_system').val() == 'robokassa') { 
							jQuery('.ek_n').hide();
							jQuery('.yandex_kassa_n').hide();
							jQuery('.robokassa_n').show();
						}
						
						if (jQuery('.merchant_system').val() == 'yandex_kassa') { 
							jQuery('.ek_n').hide();
							jQuery('.robokassa_n').hide();
							jQuery('.yandex_kassa_n').show();
						}
						
						jQuery('.merchant_system').change(function(){
							if (jQuery(this).val() == 'ek') { 
								jQuery('.robokassa_n').hide();
								jQuery('.yandex_kassa_n').hide();
								jQuery('.ek_n').show();
							}
							
							if (jQuery(this).val() == 'robokassa') { 
								jQuery('.ek_n').hide();
								jQuery('.yandex_kassa_n').hide();
								jQuery('.robokassa_n').show();
							}
							
							if (jQuery(this).val() == 'yandex_kassa') { 
								jQuery('.ek_n').hide();
								jQuery('.robokassa_n').hide();
								jQuery('.yandex_kassa_n').show();
							}
						});
					});
				</script>
				
				<tr>
					<td><?php  _e('Select Merchant System', 'wp-shop'); /*Выбрать merchant system*/ ?></td>
					<td>
						<select name="wpshop_merchant_system" class="merchant_system">
							<option value='ek' <?php  if(isset($this->merchant_system)&&$this->merchant_system == 'ek'){ echo' selected="selected"';}?>><?php  _e('WalletOne', 'wp-shop');/* Единая касса */?></option>
							<option value='robokassa' <?php if(isset($this->merchant_system)&&$this->merchant_system == 'robokassa'){ echo' selected="selected"';}?>><?php  _e('Robokassa', 'wp-shop');/* Робокасса */?></option>
							<option value='yandex_kassa' <?php if(isset($this->merchant_system)&&$this->merchant_system == 'yandex_kassa'){ echo' selected="selected"';}?>><?php  _e('Yandex kassa', 'wp-shop');/* Робокасса */?></option>
						</select>
					</td>
				</tr>
				
				<!-- Настройки robokassa-->
				<table class="robokassa_n" style="width: 50%;float: left;min-width: 650px; display:none">
					<tr>
						<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
						<td>
						<?php 
							$i = 0;
							foreach($this->deliveries as $delivery)
							{
								$checked = "";
								if(isset($this->robokassa['delivery'])&&$this->robokassa['delivery']){
								if (in_array($delivery->ID,$this->robokassa['delivery']))
								{
									$checked = " checked";
								}
								}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.robokassa",array('delivery' => array(2=>'vizit')));}
								echo "<input type='checkbox' name='wpshop_payments_robokassa[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
								if(++$i == 5) break;
							}
						?>
						</td>
					</tr>
					<tr>
						<td><?php  _e('Robokassa Login', 'wp-shop'); ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_robokassa[login]" value="<?php if(isset($this->robokassa['login'])){echo $this->robokassa['login'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('Robokassa pass 1', 'wp-shop'); /*Robokassa пароль 1*/ ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_robokassa[pass1]" value="<?php if(isset($this->robokassa['pass1'])){echo $this->robokassa['pass1'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('Robokassa pass 2', 'wp-shop'); /*Robokassa пароль 2*/ ?></td>
						<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_robokassa[pass2]" value="<?php if(isset($this->robokassa['pass2'])){echo $this->robokassa['pass2'];}?>"/></td>
					</tr>
				</table>
				
				<!-- Настройки EK-->
				<table class="ek_n" style="width: 50%;float: left;min-width: 650px; display:none">
					<tr>
						<td>
							<table>
							<tr>
								<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
								<td>
								<?php 
									$i = 0;
									foreach($this->deliveries as $delivery)
									{
										$checked = "";
										if(isset($this->ek['delivery'])&&$this->ek['delivery']){
										if (in_array($delivery->ID,$this->ek['delivery']))
										{
											$checked = " checked";
										}
										}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.ek",array('delivery' => array(2=>'vizit')));}
										echo "<input type='checkbox' name='wpshop_payments_ek[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
										if(++$i == 5) break;
									}

								?>
								</td>
							</tr>
							
							<tr>
								<td><?php  _e('Your WalletOne', 'wp-shop'); /*Ваш WalletOne*/ ?></td>
								<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_ek[wmCheck]" value="<?php if(isset($this->ek['wmCheck'])){ echo $this->ek['wmCheck'];}?>"/></td>
							</tr>
							
							<tr>
								<td><?php  _e('Currency', 'wp-shop'); /*Валюта*/ ?></td>
								<td>
									<?php 
										if(isset($this->ek['currency_ek'])){
										$currency = $this->ek['currency_ek'];
										if ($currency == '643') { $p1 = ' selected="selected"'; $p2 = ''; $p3 = ''; $p4 = ''; $p5 = ''; $p6 = ''; $p7 = ''; }
										if ($currency == '710') { $p1 = ''; $p2 = ' selected="selected"'; $p3 = ''; $p4 = ''; $p5 = ''; $p6 = ''; $p7 = ''; }
										if ($currency == '840') { $p1 = ''; $p2 = ''; $p3 = ' selected="selected"'; $p4 = ''; $p5 = ''; $p6 = ''; $p7 = ''; }
										if ($currency == '978') { $p1 = ''; $p2 = ''; $p3 = ''; $p4 = ' selected="selected"'; $p5 = ''; $p6 = ''; $p7 = ''; }
										if ($currency == '980') { $p1 = ''; $p2 = ''; $p3 = ''; $p4 = ''; $p5 = ' selected="selected"'; $p6 = ''; $p7 = ''; }
										if ($currency == '398') { $p1 = ''; $p2 = ''; $p3 = ''; $p4 = ''; $p5 = ''; $p6 = ' selected="selected"'; $p7 = ''; }
										if ($currency == '974') { $p1 = ''; $p2 = ''; $p3 = ''; $p4 = ''; $p5 = ''; $p6 = ''; $p7 = ' selected="selected"'; }
									}
									?>
									<select name="wpshop_payments_ek[currency_ek]">
										<option value='643' <?php echo $p1?>><?php  _e('Russian Ruble', 'wp-shop'); /*Российские рубли*/ ?></option>
										<option value='710' <?php echo $p2?>><?php  _e('South African Rand', 'wp-shop'); /*Южно-Африканские ранды*/ ?></option>
										<option value='840' <?php echo $p3?>><?php  _e('USD', 'wp-shop'); /*Американские доллары*/ ?></option>
										<option value='978' <?php echo $p4?>><?php  _e('euro', 'wp-shop'); /*Евро*/ ?></option>
										<option value='980' <?php echo $p5?>><?php  _e('Ukrainian hryvnia', 'wp-shop'); /*Украинские гривны*/ ?></option>
										<option value='398' <?php echo $p6?>><?php  _e('Kazakhstani tenge', 'wp-shop'); /*Казахстанские тенге*/ ?></option>
										<option value='974' <?php echo $p7?>><?php  _e('Belarusian Ruble', 'wp-shop'); /*Белорусские рубли*/ ?></option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td><?php  _e('Success URL', 'wp-shop'); ?></td>
								<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_ek[successUrl]" value="<?php if(isset($this->ek['successUrl'])){echo $this->ek['successUrl'];}?>"/></td>
							</tr>
							
							<tr>
								<td><?php  _e('Failed URL', 'wp-shop'); ?></td>
								<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_ek[failedUrl]" value="<?php if(isset($this->ek['failedUrl'])){echo $this->ek['failedUrl'];}?>"/></td>
							</tr>
              
							<tr>
								<td><?php  _e('Result URL', 'wp-shop'); ?></td>
								<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_ek[resultUrl]" value="<?php if(isset($this->ek['resultUrl'])){echo $this->ek['resultUrl'];}?>"  readonly="readonly"/></td>
							</tr>
							<input type="hidden" name="wpshop_payments_ek[passfrase]" value="<?php if(isset($this->ek['passfrase'])){echo $this->ek['passfrase'];}?>"/>
							</table>
						</td>
						<?php add_thickbox(); ?>
						<div id="my-content-id" style="display:none;">
							<img src="<?php echo WPSHOP_URL;?>/images/ek_reg.jpg" width="100%">
						</div>
						<td class="wpshop_information">
							<h3>Внимание, это важно! </h3>
							<p>код подключения к системе <strong>Единая Касса</strong></p>
							<h2>Ra2xrxrxy</h2>
							<p>Для правильной синхронизации данных с системой Единая Касса Вам нужно внести этот код в форму ругистрации аккаунта </p>
							<a href="#TB_inline?width=600&height=550&inlineId=my-content-id" class="thickbox">Подробнее...</a>
						</td>
					</tr>
				</table>
				
				<!-- Настройки yandex_kassa-->
				<table class="yandex_kassa_n" style="width: 50%;float: left;min-width: 650px; display:none">
					
					<tr>
						<td><?php  _e('Test paiments', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['test'])&&$this->yandex_kassa['test']){
							$yandex_test =" checked";
						}else {
							$yandex_test ="";
						} ?>						
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[test]"<?php  echo $yandex_test;?>/></td>
					</tr>
          
					<tr>
						<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
						<td>
						<?php 
							$i = 0;
							foreach($this->deliveries as $delivery)
							{
								$checked = "";
								if(isset($this->yandex_kassa['delivery'])&&$this->yandex_kassa['delivery']){
								if (in_array($delivery->ID,$this->yandex_kassa['delivery']))
								{
									$checked = " checked";
								}
								}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.yandex_kassa",array('delivery' => array(2=>'vizit')));}
								echo "<input type='checkbox' name='wpshop_payments_yandex_kassa[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
								if(++$i == 5) break;
							}

						?>
						</td>
					</tr>

					<tr>
						<td><?php  _e('Your Yandex kassa shop_id', 'wp-shop'); /*Ваш Yandex shop_id*/ ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_yandex_kassa[shopId]" value="<?php if(isset($this->yandex_kassa['shopId'])){echo $this->yandex_kassa['shopId'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('Your Yandex kassa scid', 'wp-shop'); /*Ваш Yandex scid*/ ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_yandex_kassa[scid]" value="<?php if(isset($this->yandex_kassa['scid'])){echo $this->yandex_kassa['scid'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('Your Yandex kassa shopPassword', 'wp-shop'); /*Ваш Yandex shopPassword*/ ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_yandex_kassa[shopPassword]" value="<?php if(isset($this->yandex_kassa['shopPassword'])){echo $this->yandex_kassa['shopPassword'];}?>"/></td>
					</tr>
					
					<tr>
						<td><?php  _e('Success URL', 'wp-shop'); ?></td>
						<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_yandex_kassa[successUrl]" value="<?php if(isset($this->yandex_kassa['successUrl'])){echo $this->yandex_kassa['successUrl'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('Failed URL', 'wp-shop'); ?></td>
						<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_yandex_kassa[failedUrl]" value="<?php if(isset($this->yandex_kassa['failedUrl'])){echo $this->yandex_kassa['failedUrl'];}?>"/></td>
					</tr>
					<tr>
						<td><?php  _e('сheckURL and paymentAvisoURL', 'wp-shop'); ?></td>
						<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_yandex_kassa[resultUrl]" value="<?php if(isset($this->yandex_kassa['resultUrl'])){echo $this->yandex_kassa['resultUrl'];}?>"  readonly="readonly"/></td>
					</tr>
					<tr>
						<td><?php  _e('Enable Sberbank online', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['sber'])&&$this->yandex_kassa['sber']){
							$yandex_sber =" checked";
						}else {
							$yandex_sber ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[sber]"<?php  echo $yandex_sber;?>/></td>
					</tr>
					<tr>
						<td><?php  _e('Enable Webmoney', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['webmoney'])&&$this->yandex_kassa['webmoney']){
							$yandex_webmoney =" checked";
						}else {
							$yandex_webmoney ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[webmoney]"<?php  echo $yandex_webmoney;?>/></td>
					</tr>    
					<tr>
						<td><?php  _e('Enable Qiwi', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['qiwi'])&&$this->yandex_kassa['qiwi']){
							$yandex_qiwi =" checked";
						}else {
							$yandex_qiwi ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[qiwi]"<?php  echo $yandex_qiwi;?>/></td>
					</tr>   
					<tr>
						<td><?php  _e('Enable Promsvyazbank', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['prom'])&&$this->yandex_kassa['prom']){
							$yandex_prom =" checked";
						}else {
							$yandex_prom ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[prom]"<?php  echo $yandex_prom;?>/></td>
					</tr>   
					<tr>
						<td><?php  _e('Enable MasterPass', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['master'])&&$this->yandex_kassa['master']){
							$yandex_master =" checked";
						}else {
							$yandex_master ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[master]"<?php  echo $yandex_master;?>/></td>
					</tr>   
					<tr>
						<td ><?php  _e('Enable Alfa Click', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['alfa'])&&$this->yandex_kassa['alfa']){
							$yandex_alfa =" checked";
						}else {
							$yandex_alfa ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[alfa]"<?php  echo $yandex_alfa;?>/></td>
					</tr>   
					<tr>
						<td ><?php  _e('Enable Doveritelniy payment', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['dover'])&&$this->yandex_kassa['dover']){
							$yandex_dover =" checked";
						}else {
							$yandex_dover ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[dover]"<?php  echo $yandex_dover;?>/></td>
					</tr>   
					<tr>
						<td ><?php  _e('Enable buy in credit', 'wp-shop'); ?></td>
						<?php if(isset($this->yandex_kassa['credit'])&&$this->yandex_kassa['credit']){
							$yandex_credit =" checked";
						}else {
							$yandex_credit ="";
						} ?>
						<td><input type="checkbox" name="wpshop_payments_yandex_kassa[credit]"<?php  echo $yandex_credit;?>/></td>
					</tr> 
					<input type="hidden" name="wpshop_payments_yandex_kassa[passfrase]" value="<?php  echo $this->yandex_kassa['passfrase'];?>"/>
				</table>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="13" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>
	
	<div id="poststuff">
		<div class="postbox">
			<h3><?php  _e('Sberbank', 'wp-shop'); /*Сбербанк*/ ?></h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable Sberbank', 'wp-shop'); ?></td>
					<?php if(isset($this->sber['activate'])&&$this->sber['activate']){
							$sber_activate =" checked";
						}else {
							$sber_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_sber[activate]"<?php  echo $sber_activate;?>/></td>
				</tr>
				<tr>
					<td ><?php  _e('Test paiments', 'wp-shop'); ?></td>
					<?php if(isset($this->sber['test'])&&$this->sber['test']){
							$sber_test =" checked";
						}else {
							$sber_test ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_sber[test]"<?php  echo $sber_test;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->sber['delivery'])&&$this->sber['delivery']){
							if (in_array($delivery->ID,$this->sber['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.sber",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_sber[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
					
				<tr>
					<td><?php  _e('Login', 'wp-shop'); /*Login продавца*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sber[login]" value="<?php if(isset($this->sber['login'])){echo $this->sber['login'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Password', 'wp-shop'); /*Пароль продавца*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sber[pass]" value="<?php if(isset($this->sber['pass'])){echo $this->sber['pass'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('One or two stage payments', 'wp-shop'); /*Валюта*/ ?></td>
					<td>
						<?php 
							if(isset($this->sber['stage'])){
							$stage = $this->sber['stage'];
							if ($stage == 'one') { $m1 = ' selected="selected"';}
							if ($stage== 'two') { $m1 = ''; $m2 = ' selected="selected"';}
						}
						?>
						<select name="wpshop_payments_sber[stage]">
							<option value='one' <?php echo $m1?>><?php  _e('One stage', 'wp-shop'); /*В один шаг*/ ?></option>
							<option value='two' <?php echo $m2?>><?php  _e('Two stage', 'wp-shop'); /*В два шага*/ ?></option>
						</select>
					</td>
				</tr>
				
				
				<tr>
					<td><?php  _e('Success URL', 'wp-shop'); ?></td>
					<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_sber[successUrl]" value="<?php if(isset($this->sber['successUrl'])){echo $this->sber['successUrl'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Failed URL', 'wp-shop'); ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sber[failedUrl]" value="<?php if(isset($this->sber['failedUrl'])){echo $this->sber['failedUrl'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Currency', 'wp-shop'); /*Валюта*/ ?></td>
					<td>
						<?php 
							if(isset($this->sber['currency_sber'])){
							$currency = $this->sber['currency_sber'];
							if ($currency == '840') { $p1 = ' selected="selected"'; $p2 = ''; $p3 = '';$p4 = '';}
							if ($currency == '978') { $p1 = ''; $p2 = ' selected="selected"';$p3 = '';$p4 = '';}
							if ($currency == '643') { $p1 = ''; $p2 = '';$p3 = ' selected="selected"';$p4 = '';}
							if ($currency == '980') { $p1 = ''; $p2 = '';$p3 = ''; $p4 = ' selected="selected"';}
						}
						?>
						<select name="wpshop_payments_sber[currency_sber]">
							<option value='840' <?php echo $p1?>><?php  _e('USD', 'wp-shop'); /*Американские доллары*/ ?></option>
							<option value='978' <?php echo $p2?>><?php  _e('euro', 'wp-shop'); /*Евро*/ ?></option>
							<option value='643' <?php echo $p3?>><?php  _e('Russian Ruble', 'wp-shop'); /*Российские рубли*/ ?></option>
							<option value='980' <?php echo $p4?>><?php  _e('Ukrainian hryvnia', 'wp-shop'); /*Украинские гривны*/ ?></option>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	</div>
	  <div id="poststuff">
		<div class="postbox">
			<h3>Simplepay</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable Simplepay', 'wp-shop'); ?></td>
					<?php if(isset($this->simplepay['activate'])&&$this->simplepay['activate']){
							$simplepay_activate =" checked";
						}else {
							$simplepay_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_simplepay[activate]"<?php  echo $simplepay_activate;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->simplepay['delivery'])&&$this->simplepay['delivery']){
							if (in_array($delivery->ID,$this->simplepay['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.simplepay",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_simplepay[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
        
        <tr>
					<td><?php  _e('Outlet id', 'wp-shop'); /*Outlet id*/ ?></td>
					<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_simplepay[outlet_id]" value="<?php if(isset($this->simplepay['outlet_id'])){echo $this->simplepay['outlet_id'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Secure key', 'wp-shop'); /*Secure key*/ ?></td>
					<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_simplepay[secure]" value="<?php if(isset($this->simplepay['secure'])){ echo $this->simplepay['secure'];}?>"/></td>
				</tr>
        
        <tr>
					<td><?php  _e('Currency', 'wp-shop'); /*Валюта*/ ?></td>
					<td>
						<?php 
							if(isset($this->simplepay['currency_simplepay'])){
							$currency = $this->simplepay['currency_simplepay'];
							if ($currency == 'USD') { $p1 = ' selected="selected"'; $p2 = ''; $p3 = '';}
							if ($currency == 'EUR') { $p1 = ''; $p2 = ' selected="selected"';$p3 = '';}
							if ($currency == 'RUB') { $p1 = ''; $p2 = '';$p3 = ' selected="selected"';}
						}
						?>
						<select name="wpshop_payments_simplepay[currency_simplepay]">
							<option value='USD' <?php echo $p1?>><?php  _e('USD', 'wp-shop'); /*Американские доллары*/ ?></option>
							<option value='EUR' <?php echo $p2?>><?php  _e('euro', 'wp-shop'); /*Евро*/ ?></option>
							<option value='RUB' <?php echo $p3?>><?php  _e('Russian Ruble', 'wp-shop'); /*Российские рубли*/ ?></option>
						</select>
					</td>
				</tr>
					
			
			</table>
			</div>
		</div>
	</div>
  
  <div id="poststuff">
		<div class="postbox">
			<h3>Chronopay</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
			
				<script>
					jQuery(function(){
						jQuery('#chronopay').change(function(){
							if(jQuery(this).is(':checked')){
								window.open('http://wp-shop.ru/chronopay/');
							}
						});
							
						
					});
				</script>
				<tr>
					<td ><?php  _e('Enable Chronopay', 'wp-shop'); ?></td>
					<?php if(isset($this->chronopay['activate'])&&$this->chronopay['activate']){
							$chronopay_activate =" checked";
						}else {
							$chronopay_activate ="";
					} ?>
					<td><input type="checkbox" id="chronopay" name="wpshop_payments_chronopay[activate]"<?php  echo $chronopay_activate;?>/></td>
				</tr>
				
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->chronopay['delivery'])&&$this->chronopay['delivery']){
							if (in_array($delivery->ID,$this->chronopay['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.chronopay",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_chronopay[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
								
				<tr>
					<td ><p><strong>Важно!</strong> для учета номера заказа необходимо связаться с администрацией Сhronopay для подключения данной услуги. Только после этого активируйте ее в настройках оплаты вашего магазина.</p></td>
				</tr>
						
				<tr>
					<td ><?php  _e('Order_id enable', 'wp-shop');//Учитывать параметр order_id ?></td>
					<?php if(isset($this->chronopay['order'])&&$this->chronopay['order']){
							$chronopay_order =" checked";
						}else {
							$chronopay_order ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_chronopay[order]"<?php  echo $chronopay_order;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Product_id', 'wp-shop'); /*Product_id*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_chronopay[product_id]" value="<?php if(isset($this->chronopay['product_id'])){echo $this->chronopay['product_id'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Success URL', 'wp-shop'); /*Success URL*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_chronopay[success]" value="<?php if(isset($this->chronopay['success'])){echo $this->chronopay['success'];}?>"/></td>
				</tr>
        
				<tr>
					<td><?php  _e('Failed URL', 'wp-shop'); /*Failed URL*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_chronopay[failed]" value="<?php if(isset($this->chronopay['failed'])){ echo $this->chronopay['failed'];}?>"/></td>
				</tr>
        
				<tr>
					<td><?php  _e('Password', 'wp-shop'); /*Пароль*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_chronopay[sharedsec]" value="<?php if(isset($this->chronopay['sharedsec'])){echo $this->chronopay['sharedsec'];}?>"/></td>
				</tr>
        
				</table>
				<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
					<ins data-revive-zoneid="15" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
				</div>
			</div>
		</div>
	</div>
	
 </div> 
 <div id="wpshop_tabs_metabox-3">
  <div id="poststuff">
		<div class="postbox">
			<h3>SOFORT</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable SOFORT banking', 'wp-shop'); ?></td>
					<?php if(isset($this->sofort['activate'])&&$this->sofort['activate']){
							$sofort_activate =" checked";
						}else {
							$sofort_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_sofort[activate]"<?php  echo $sofort_activate;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->sofort['delivery'])&&$this->sofort['delivery']){
							if (in_array($delivery->ID,$this->sofort['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.sofort",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_sofort[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
					
			<tr>
				<tr>
					<td><?php  _e('Config key', 'wp-shop'); /*Email продавца*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sofort[conf_key]" value="<?php if(isset($this->sofort['conf_key'])){echo $this->sofort['conf_key'];}?>"/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><?php  _e('You need to enter your configkey or userid:projektid:apikey', 'wp-shop'); /*Email продавца*/ ?></td>
				</tr>
			</tr>			
			<tr>
				<td><?php  _e('Notification email', 'wp-shop'); ?></td>
				<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_sofort[notifEmail]" value="<?php if(isset($this->sofort['notifEmail'])){echo $this->sofort['notifEmail'];}?>"/></td>
			</tr>			
			<tr>
				<td ><?php  _e('Trust pending payments', 'wp-shop'); ?></td>
				<?php if(isset($this->sofort['trust'])&&$this->sofort['trust']){
						$sofort_trust =" checked";
				}else {
						$sofort_trust ="";
				} ?>
				<td><input type="checkbox" name="wpshop_payments_sofort[trust]"<?php  echo $sofort_trust;?>/></td>
			</tr>
			<tr>
				<td><?php  _e('Success URL', 'wp-shop'); ?></td>
				<td style="min-width:300px;"><input type="text" style="width:100%;" name="wpshop_payments_sofort[successUrl]" value="<?php if(isset($this->sofort['successUrl'])){echo $this->sofort['successUrl'];}?>"/></td>
			</tr>
			<tr>
				<td><?php  _e('Failed URL', 'wp-shop'); ?></td>
				<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sofort[failedUrl]" value="<?php if(isset($this->sofort['failedUrl'])){echo $this->sofort['failedUrl'];}?>"/></td>
			</tr>
			<tr>
				<td><?php  _e('resultURL', 'wp-shop'); ?></td>
				<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_sofort[resultUrl]" value="<?php if(isset($this->sofort['resultUrl'])){echo $this->sofort['resultUrl'];}?>"  readonly="readonly"/></td>
			</tr>
			<input type="hidden" name="wpshop_payments_sofort[passfrase]" value="<?php echo $this->sofort['passfrase'];?>"/>
			</table>
			</div>
		</div>
	</div>
	
	<div id="poststuff">
		<div class="postbox">
			<h3>PayPal</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable PayPal', 'wp-shop'); ?></td>
					<?php if(isset($this->paypal['activate'])&&$this->paypal['activate']){
							$paypal_activate =" checked";
						}else {
							$paypal_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_paypal[activate]"<?php  echo $paypal_activate;?>/></td>
				</tr>
				
				<tr>
					<td ><?php  _e('Test paiments', 'wp-shop'); ?></td>
					<?php if(isset($this->paypal['test'])&&$this->paypal['test']){
							$paypal_test =" checked";
						}else {
							$paypal_test ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_paypal[test]"<?php  echo $paypal_test;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->paypal['delivery'])&&$this->paypal['delivery']){
							if (in_array($delivery->ID,$this->paypal['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.paypal",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_paypal[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
					
				<tr>
					<td><?php  _e('Saller Email', 'wp-shop'); /*Email продавца*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_paypal[email]" value="<?php if(isset($this->paypal['email'])){echo $this->paypal['email'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Success URL', 'wp-shop'); /*Success URL*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_paypal[success]" value="<?php if(isset($this->paypal['success'])){echo $this->paypal['success'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Currency', 'wp-shop'); /*Валюта*/ ?></td>
					<td>
						<?php 
							if(isset($this->paypal['currency_paypal'])){
							$currency = $this->paypal['currency_paypal'];
							if ($currency == 'USD') { $p1 = ' selected="selected"'; $p2 = ''; $p3 = '';}
							if ($currency == 'EUR') { $p1 = ''; $p2 = ' selected="selected"';$p3 = '';}
							if ($currency == 'RUB') { $p1 = ''; $p2 = '';$p3 = ' selected="selected"';}
						}
						?>
						<select name="wpshop_payments_paypal[currency_paypal]">
							<option value='USD' <?php echo $p1?>><?php  _e('USD', 'wp-shop'); /*Американские доллары*/ ?></option>
							<option value='EUR' <?php echo $p2?>><?php  _e('euro', 'wp-shop'); /*Евро*/ ?></option>
							<option value='RUB' <?php echo $p3?>><?php  _e('Russian Ruble', 'wp-shop'); /*Российские рубли*/ ?></option>
						</select>
					</td>
				</tr>
			</table>
			<div style="width: 50%;float: left;text-align: right;min-width: 500px;">
				<ins data-revive-zoneid="14" data-revive-id="03af71d0efe35b0d7d888949e681431d"></ins><script async src="https://wp-shop.ru/adv/www/delivery/asyncjs.php"></script>
			</div>
			</div>
		</div>
	</div>
	
	<div id="poststuff">
		<div class="postbox">
			<h3>ICredit</h3>
			<div class="inside">
			<table cellpadding="2" cellspacing="2" style="width: 50%;float: left;min-width: 500px;">
				<tr>
					<td ><?php  _e('Enable ICredit', 'wp-shop'); ?></td>
					<?php if(isset($this->icredit['activate'])&&$this->icredit['activate']){
							$icredit_activate =" checked";
						}else {
							$icredit_activate ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_icredit[activate]"<?php  echo $icredit_activate;?>/></td>
				</tr>
        <tr>
					<td ><?php  _e('Test paiments', 'wp-shop'); ?></td>
					<?php if(isset($this->icredit['test'])&&$this->icredit['test']){
							$icredit_test =" checked";
						}else {
							$icredit_test ="";
					} ?>
					<td><input type="checkbox" name="wpshop_payments_icredit[test]"<?php  echo $icredit_test;?>/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Delivery', 'wp-shop'); /*Доставка*/ ?></td>
					<td>
					<?php 
						$i = 0;
						foreach($this->deliveries as $delivery)
						{
							$checked = "";
							if(isset($this->icredit['delivery'])&&$this->icredit['delivery']){
							if (in_array($delivery->ID,$this->icredit['delivery']))
							{
								$checked = " checked";
							}
							}elseif($i==3){ $checked = " checked"; update_option("wpshop.payments.icredit",array('delivery' => array(2=>'vizit')));}
							echo "<input type='checkbox' name='wpshop_payments_icredit[delivery][]' value='{$delivery->ID}'{$checked}/> <label>{$delivery->name}</label><br/>";
							if(++$i == 5) break;
						}

					?>
					</td>
				</tr>
       <tr>
					<td><?php  _e('GroupPrivateToken', 'wp-shop'); /*GroupPrivateToken*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_icredit[token]" value="<?php if(isset($this->icredit['token'])){echo $this->icredit['token'];}?>"/></td>
				</tr>
        <tr>
					<td><?php  _e('Success URL', 'wp-shop'); /*Success URL*/ ?></td>
					<td style="min-width:300px;"><input style="width:100%;" type="text" name="wpshop_payments_icredit[success]" value="<?php if(isset($this->icredit['success'])){echo $this->icredit['success'];}?>"/></td>
				</tr>
				
				<tr>
					<td><?php  _e('Currency', 'wp-shop'); /*Валюта*/ ?></td>
					<td>
						<?php 
							if(isset($this->icredit['currency'])){
							$currency_icredit = $this->icredit['currency'];
							if ($currency_icredit == '1') { $pr1 = ' selected="selected"'; $pr2 = ''; $pr3 = '';}
							if ($currency_icredit == '2') { $pr1 = ''; $pr2 = ' selected="selected"';$pr3 = '';}
							if ($currency_icredit == '3') { $pr1 = ''; $pr2 = '';$pr3 = ' selected="selected"';}
						}
						?>
						<select name="wpshop_payments_icredit[currency]">
							<option value='1' <?php echo $pr1?>><?php  _e('Shekel', 'wp-shop'); /*Шекель*/ ?></option>
							<option value='2' <?php echo $pr2?>><?php  _e('USD', 'wp-shop'); /*Американские доллары*/ ?></option>
							<option value='3' <?php echo $pr3?>><?php  _e('EUR', 'wp-shop'); /*Евро*/ ?></option>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	</div>
</div>
</div>
	<input type="submit" value="<?php  _e('Save', 'wp-shop'); /*Сохранить*/ ?>" class="button">

</form>
</div>