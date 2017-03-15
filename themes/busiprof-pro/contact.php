<?php 
//Template Name: Contact
get_header();
get_template_part('index', 'bannerstrip');

$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

$mapsrc = $current_options['google_map_url']; 
$mapsrc = $mapsrc.'&amp;output=embed';
?>


<div class="clearfix"></div>

<!-- Contact Section -->
<section id="section" class="contact">		
	<div class="container">
			
		<div class="row">
			<!--Contact Info-->
			<?php if( $current_options['contact_info_enabled'] == 'on' ) { ?>
			<div class="col-md-5 col-xs-12">
				<div class="contact">
					<div class="post-thumbnail">
						<?php if( $current_options['footer_twitter_link'] != '' ) { ?>
						<div class="twitter-social"><a href="<?php echo $current_options['footer_twitter_link']; ?>">&nbsp;</a></div>
						<?php } ?>
						<div class="contact-gravatar">
						<div class="contact_left_ic_img"><img class="aboutroundimg" src="<?php echo BUSI_TEMPLATE_DIR_URI .'/images/contact_ic1.png'?>"></div>
						</div>
						<?php if( $current_options['footer_facebook_link'] != '' ) { ?>
						<div class="facebook-social"><a href="<?php echo $current_options['footer_facebook_link']; ?>">&nbsp;</a></div>
						<?php } if( $current_options['footer_linkedin_link'] != '' ) { ?>
						<div class="linkedin-social"><a href="<?php echo $current_options['footer_linkedin_link']; ?>">&nbsp;</a></div>
						<?php } ?>
					</div>
					<div class="media-body">
						<address>
							<p><?php 
							if( $current_options['contact_address_1'] )  
								echo $current_options['contact_address_1'];
							?><br>
							<?php 
							if( $current_options['contact_address_2'] )  
								echo $current_options['contact_address_2'];
							?></p>
							
							<?php 
							if( $current_options['contact_number'] != '' ) 
							{ 
							?>
							<p><strong><?php _e('Phone','busiprof'); ?></strong> <?php echo $current_options['contact_number']; ?></p>
							<?php }
							if( $current_options['contact_fax_number'] != '' ) 
							{
							?>
							<p><strong><?php _e('Fax','busiprof'); ?></strong> <?php echo $current_options['contact_fax_number']; ?></p>
							<?php } 
							if( $current_options['contact_email'] != '' ) { ?>
							<p><strong><?php _e('Email','busiprof'); ?></strong> <a ><?php  echo $current_options['contact_email']; ?></a></p>
							<?php } 
							if( $current_options['contact_website'] != '' ) 
							{
							?>
							<p><strong><?php _e('Website','busiprof'); ?></strong> <a ><?php echo $current_options['contact_website']; ?></a></p>
							<?php } ?>
						</address>	
					</div>
				</div>
			</div>
			<!--/End of Contact Info-->
			
			<!--Contact Form-->
			<div class="col-md-7 col-xs-12">
				<div class="contact-form">
					<?php the_post(); the_content(); ?>
				</div>
			</div>
			<?php } else { ?>
			<!--Contact Form-->
			<div class="col-md-12 col-xs-12">
				<div class="contact-form">
					<?php the_post(); the_content(); ?>
				</div>
			</div>	
			<?php } ?>
			
			<!--/End of Contact Form-->
		
		</div>
	
		<!--Google map-->
		<?php if( $current_options['contact_google_map_enabled'] == 'on' ) { ?>
		<div class="row">
			<div class="col-md-12">
			<?php  if( $current_options['google_map_url'] != '' ) { ?>
				<div class="google-map">							
					<iframe width="100%" height="380" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $mapsrc ?>"></iframe>
				</div>
			<?php } ?>	
			</div>
		</div>
		<?php } ?>
		<!--/End of Google map-->		
			
	</div>
</section>
<!-- End of Contact Section -->
 
<div class="clearfix"></div>
<?php if( $current_options['contact_client_enabled'] == 'on' ) { ?>
<!-- Clients Section -->
<?php get_template_part('index','clientstrip'); ?>
<!-- End of Clients Section -->
<?php } ?>
<?php get_footer(); ?>