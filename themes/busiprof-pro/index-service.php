<?php
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

if( $current_options['home_service_section_enabled']=='on' ) { ?>

<!-- Service Section -->
<section id="section" class="service">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php if( $current_options['service_tag_line'] != '' ) { ?>
					<h1 class="section-heading"><?php echo $current_options['service_tag_line']; ?></h1>
					<?php } if( $current_options['service_tag_desciption'] != '' ) { ?>
					<p><?php echo $current_options['service_tag_desciption']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		<div class="row">
			<?php 
		    $i=1;
		    $total_services = $current_options['service_list'];
			$args = array( 'post_type' => 'busiprof_service','posts_per_page' => $total_services); 	
			$service = new WP_Query( $args );
			
			if( $service->have_posts() )
			{	while ( $service->have_posts() ) : $service->the_post();
			    $link=1;
			?>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
				<?php 	
						$service_icon_icons =  get_post_meta( get_the_ID(),'service_icon_icons', true );
						$meta_service_description =  get_post_meta( get_the_ID(),'meta_service_description', true );  
						if(get_post_meta( get_the_ID(),'service_icon_link', true ))
					    $service_icon_link =  get_post_meta( get_the_ID(),'service_icon_link', true );
						else 
						$link=0;
						if($service_icon_icons){
						?>
						<div class="service-icon"><i class="fa <?php echo get_post_meta( get_the_ID(),'service_icon_icons', true );?>"></i>
						<?php } else { echo '<div class="service-icon">'; $default_arg =array('class' => "img-responsive" ); 
								if(has_post_thumbnail()){  the_post_thumbnail('', $default_arg); 
						} } 
						?>
						</div>
						<div class="entry-header">
						<?php if($link==1 ) {?>
						<h4 class="entry-title"><a href="<?php echo $service_icon_link; ?>" <?php if(get_post_meta( get_the_ID(),'service_icon_target', true )) { echo "target='_blank'"; } ?> >
						<?php echo the_title(); ?></a></h4>
						<?php  } else { ?> <h4 class="entry-title"><?php echo the_title(); ?></h4><?php } ?>
						</div>
					<div class="entry-content">
						<p><?php echo $meta_service_description ;?></p>
					</div>	
				</div>
			</div>
			<?php if($i%4==0){	echo "<div class='clearfix'></div>";} $i++; endwhile;  
			}  else { ?>			
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
					<div class="service-icon"><i class="fa fa-laptop"></i></div>
					<div class="entry-header">
						<h4 class="entry-title"><a href="#"><?php _e('Web design','busiprof'); ?></a></h4>
					</div>
					<div class="entry-content">
						<p><?php echo 'We are a group of passionate designers and developers who really love to create awesome wordpress themes...'; ?></p>
					</div>	
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
					<div class="service-icon"><i class="fa fa-life-ring"></i></div>
					<div class="entry-header">
						<h4 class="entry-title"><a href="#"><?php _e('24/7 support','busiprof'); ?></a></h4>
					</div>
					<div class="entry-content">
						<p><?php echo 'We are a group of passionate designers and developers who really love to create awesome wordpress themes...'; ?></p>
					</div>	
				</div>
			</div>		
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
					<div class="service-icon"><i class="fa fa-thumbs-o-up"></i></div>
					<div class="entry-header">
						<h4 class="entry-title"><a href="#"><?php _e('User friendly','busiprof'); ?></a></h4>
					</div>
					<div class="entry-content">
						<p><?php echo 'We are a group of passionate designers and developers who really love to create awesome wordpress themes...'; ?></p>
					</div>	
				</div>
			</div>			
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="post">
					<div class="service-icon"><i class="fa fa-tasks"></i></div>
					<div class="entry-header">
						<h4 class="entry-title"><a href="#"><?php _e('Unique elements','busiprof'); ?></a></h4>
					</div>
					<div class="entry-content">
						<p><?php echo 'We are a group of passionate designers and developers who really love to create awesome wordpress themes...'; ?></p>
					</div>	
				</div>
			</div>
			
			<div class="clearfix"></div>
			<?php } ?>
			
			<div class="col-md-12 col-xs-12">
				<?php if( $current_options['service_readmore_button'] != '' ) { ?>
				<div class="btn-wrap">
					<?php 
					if( $current_options['service_readmore_link'] != '' ) 
					{ 
						$link = $current_options['service_readmore_link'];
					}
					?>
					<a href="<?php echo $link; ?>" <?php if( $current_options['service_readmore_link_target'] == true ) { echo "target='_blank'"; } ?> ><?php echo $current_options['service_readmore_button'];
					?>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<!-- End of Service Section -->

<div class="clearfix"></div>
<?php } ?>