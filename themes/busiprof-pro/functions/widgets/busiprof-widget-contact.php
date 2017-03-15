<?php
add_action( 'widgets_init','busi_contact_widget'); 
   function busi_contact_widget() { return   register_widget( 'busiprof_contact_widget' ); }

/**
 * Adds busiprof_contact_widget widget.
 */
class busiprof_contact_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'busiprof_contact_widget', // Base ID
			__('WBR : Contact Widget', 'busiprof'), // Name
			array( 'description' => __( 'Quick contact for your site', 'busiprof' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
		?>	<?php echo $args['before_title'] . $title . $args['after_title']; ?>
				<form action="" method="post">
				<?php wp_nonce_field('Busiprof_name_nonce_check','Busiprof_name_nonce_field'); ?>
					<div class="form-group"><input type="text" placeholder="<?php _e('Name','busiprof');?>" id="contact_user_name" name="contact_user_name"></div>
					<span  style="display:none; color:red" id="contact_user_name_error"><?php _e('Name','busiprof');?> </span>
					<div class="form-group"><input type="text" placeholder="<?php _e('Email','busiprof');?>" id="contact_email" name="contact_email"></div>
					<span  style="display:none; color:red" id="contact_email_error"><?php _e('Email','busiprof'); ?> </span>
					<div class="form-group"><textarea rows="1" placeholder="<?php _e('Message','busiprof');?>" id="contact_massage" name="contact_massage"></textarea></div>
					<span  style="display:none; color:red" id="contact_massage_error"><?php _e('Message','busiprof'); ?></span>
					<div class="form-group"><input type="submit" name="contactsubmit" class="submit_btn" value="<?php _e('Send Message','busiprof');?>"></div>
					
				</form>
				</aside>
				<div id="mailsentboxwidget" style="display:none">
						<div class="alert alert-success" >
							<strong><?php _e('Thank you','busiprof');?></strong> <?php _e('Your information has been sent.','busiprof');?>
						</div>
				</div>
		<?php
		/*******************************/
		if(isset($_POST['contactsubmit']))
		{
			$flag=1;
			if(empty($_POST['contact_user_name']))
			{	$flag=0;
				echo "<script>jQuery('#contact_user_name_error').show();</script>";
				//echo "Please Enter Your Name<br>";
			}else			
			if($_POST['contact_email']=='')
			{	$flag=0;
				echo "<script>jQuery('#contact_email_error').show();</script>";
				
			}else
			if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['contact_email']))
			{	$flag=0;
				echo "<script>jQuery('#contact_email_error').show();</script>";
				//echo "Please Enter Valid E-Mail<br>";
			}else
			if($_POST['contact_massage']=='')
			{
				$flag=0;
				echo "<script>jQuery('#contact_massage_error').show();</script>";
				//echo "Please Enter Message";
			}else
			if ( empty($_POST) || !wp_verify_nonce($_POST['Busiprof_name_nonce_field'],'Busiprof_name_nonce_check') )
			{
			   print __('Sorry, your nonce did not verify.','busiprof');
			   exit;
			}
			else
			{
				if($flag==1)
				{	
					$maildata =wp_mail(sanitize_email(get_option('admin_email')),trim($_POST['contact_user_name']).__("sent you a message from",'busiprof').get_option("blogname"),stripslashes(trim($_POST['contact_massage']))."                     Message sent from:: ".trim($_POST['contact_email']),"From: ".trim($_POST['contact_user_name'])." <".trim($_POST['contact_email']).">\r\nReply-To:".trim($_POST['contact_email']));
					if($maildata)
					{ 	echo "<script>jQuery('#mailsentboxwidget').show();</script>";
					}	
				}
			}
		}
		/**********   Quick contact form **************/
		echo $args['after_widget']; // end of contact widget
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Quick contact', 'busiprof' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','busiprof' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Foo_Widget
?>