<?php 
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/indexslider-script.php' );
if( $current_options['home_banner_strip_enabled'] == 'on' && $current_options['intro_tag_line'] != '' ) { ?>
<div class="clearfix"></div>
<section class="header-title"><h2><?php echo $current_options['intro_tag_line']; ?> </h2></section>
<div class="clearfix"></div>
<?php } ?>
<!-- Slider -->
<?php if( $current_options['home_page_slider_enabled'] == 'on' ) { ?>
<div id="main" role="main">
	<section class="slider">
		<div id="slider" class="flexslider">
			<ul class="slides">
			<?php 
				$args = array( 'post_type' => 'busiprof_slider') ; 	
				$slider = new WP_Query( $args ); 
				if( $slider->have_posts() )
				{
					while ( $slider->have_posts() ) : $slider->the_post();?>
				<li>
					<?php $default_arg =array('class' => "img-responsive"); ?>
					<?php if(has_post_thumbnail()){
					the_post_thumbnail('', $default_arg); 
					} ?>
					<?php
					$img_description = sanitize_text_field( get_post_meta( get_the_ID(),'image_description', true )); 
					$readmorelink = sanitize_text_field( get_post_meta( get_the_ID(),'readmore_link', true )) ;
					$readmore_button = sanitize_text_field( get_post_meta( get_the_ID(),'readmore_button', true )) ;
					?>
					<?php if($img_description) { ?>	
					<div class="container">
						<div class="slide-caption">
							<h2><?php echo the_title(); ?></h2>
							<p><?php echo $img_description ;?></p>
							<div>
							<?php if($readmore_button ) { ?>
							<a href="<?php echo $readmorelink ;?>" <?php if(get_post_meta( get_the_ID(),'readmore_link_target', true )) { echo "target='_blank'"; } ?> class="flex-btn">
							<?php echo $readmore_button ?>
							</a>
							<?php } ?>
							</div>	
						</div>		
					</div>
					<?php } ?>
				</li>
				<?php 	endwhile;  
				}   else { ?>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide1.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('Responsive WP theme','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide2.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('Graphic design','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<li>
					<img alt="img" src="<?php echo get_template_directory_uri(); ?>/images/slide3.jpg" />
					<div class="container">
						<div class="slide-caption">
							<h2><?php _e('User friendly','busiprof'); ?></h2>
							<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations','busiprof'); ?></p>
							<div><a href="#" class="flex-btn"><?php _e('Read More','busiprof'); ?></a></div>	
						</div>		
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>			
	</section>
</div>
<!-- End of Slider -->

<div class="clearfix"></div>
<?php } ?>