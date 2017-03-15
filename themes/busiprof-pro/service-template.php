<?php
//Template Name: service
get_header (); 
get_template_part('index', 'bannerstrip');
?>
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
		    $count_posts = wp_count_posts( 'busiprof_service')->publish;
			$args = array( 'post_type' => 'busiprof_service','posts_per_page'=>$count_posts) ;  	
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
						<?php } else { echo '<div class="service-icon">'; $default_arg =array('class' => "home_service" ); 
								if(has_post_thumbnail()){  the_post_thumbnail('', $default_arg); 
						} } ?>
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
			} ?>
		</div>
	</div>
</section>
<!-- End of Service Section -->

<div class="clearfix"></div>
<?php if($current_options['enable_testimonial_section_portfolio'] == 'on') {?>
<!-- Testimonial Scroll Section -->
<section class="testimonial-scroll">
	<div class="container">
		<div class="row">
		
			<!-- Section Title -->
			<div class="col-md-12">
				<div class="section-title-mini border">
					<?php if( $current_options['testimonial_head'] != '' ) { ?>
					<h4 class="section-heading txt-color"><?php echo $current_options['testimonial_head'];?>
					<?php } if( $current_options['testimonial_tagline'] !='') { ?>
					<span><?php echo $current_options['testimonial_tagline'];?></span></h4>
					<?php } ?>
					
					<!-- Pagination --> 
					<ul class="testi-nav">
						<li><a class="testi-prev" href="#myTestimonial" data-slide="prev"></a></li>
						<li><a class="testi-next" href="#myTestimonial" data-slide="next"></a></li>
					</ul> 
					<!-- /Pagination -->
					
				</div>
			</div>
			<!-- /Section Title -->	
			
			<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myTestimonial">
				<div class="carousel-inner">
					<?php
					$i=1;
					$args = array( 'post_type' => 'busiprof_testimonial') ; 	
					$tesimonials = new WP_Query( $args ); 
					if( $tesimonials->have_posts() )
					{
					while ( $tesimonials->have_posts() ) : $tesimonials->the_post();
					
					?>
					<div class="col-md-12 pull-left item <?php if($i == 1) echo "in active" ; ?>">
						<div class="post"> 
							<div class="entry-content">
								<p><?php echo get_post_meta( get_the_ID(), 'testimonial_desc', true ); ?></p>
							</div>
							<div class="media"> 
								<figure class="post-thumbnail width-sm">
								<?php if(has_post_thumbnail()){ 
								the_post_thumbnail( ); 
								} ?>
								</figure> 
								<div class="media-body">
									<span class="author-name"><?php echo the_title() ;?> <small class="designation"><?php echo get_post_meta( get_the_ID(), 'author_designation', true ); ?></small></span>
								</div> 
							</div>
						</div>
					</div>
					<?php $i++; endwhile;  } else ?>	
				</div>	
			</div>
		</div>
	</div>		
</section>
<!-- End of Testimonial Section -->
<?php } if( $post->post_content != "" ) { ?>
<!-- Other Service Section -->
<section class="other-service">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="post">
					<div class="entry-content">
						<?php  the_post(); the_content(); ?>
					</div>	
				</div>
			</div>			
		</div>
	</div>	
</section>
<!-- End of Other Service Section -->
<?php } ?>

<div class="clearfix"></div>

<!-- Clients Section -->
<?php if(($current_options['enable_client_section_portfolio'])=='on') { get_template_part('index','clientstrip'); }?>
<!-- End of Clients Section -->
<?php get_footer(); ?>