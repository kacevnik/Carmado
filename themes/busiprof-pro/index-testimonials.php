<?php  $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() ); ?>
<!-- Testimonial & Blog Section -->
<section id="section">
	<div class="container">	
		<div class="row">
		
			<!-- Testimonial -->
			<?php if( $current_options['home_testimonial_section_enabled']=='on' ) { ?>
			<div class="col-md-6 testimonial">
				<!-- Section Title -->
				<div class="section-title-small">
					<?php if( $current_options['testimonial_head'] != '' ) { ?>
					<h3 class="section-heading"><?php echo $current_options['testimonial_head'];?></h3>
					<?php } if( $current_options['testimonial_tagline'] !='') { ?>
					<p><?php echo $current_options['testimonial_tagline'];?></p>
					<?php } ?>
				</div>
				<!-- /Section Title -->
				<?php
				$args = array( 'post_type' => 'busiprof_testimonial','posts_per_page' => 2,) ; 	
				$tesimonials = new WP_Query( $args ); 
				if( $tesimonials->have_posts() )
				{
				while ( $tesimonials->have_posts() ) : $tesimonials->the_post(); ?>
				<div class="post"> 
					<div class="media"> 
						<figure class="post-thumbnail width-lg">
							<div class="home-post-img">
								<?php $defalt_arg =array('class' => "img-circle");?>
								<?php if(has_post_thumbnail()){ ?>
								<?php the_post_thumbnail('',$defalt_arg); 
								} ?>
							</div>	
						</figure> 
						<div class="media-body">
							<div class="entry-content">
								<?php $testimonial_description =  get_post_meta( get_the_ID(), 'testimonial_desc', true ); ?>
								<p><?php echo $testimonial_description; ?></p>
								<span class="author-name"><?php $testimonial_author_link =get_post_meta( get_the_ID(), 'author_link', true ) ;	?>					
								<?php 
								$testimonial_author_designation =  get_post_meta( get_the_ID(), 'author_designation', true ); 
								$testimonial_author_link =get_post_meta( get_the_ID(), 'author_link', true ) ;	?>
								<a href="<?php echo $testimonial_author_link; ?>"  <?php if(get_post_meta( get_the_ID(),'author_link_target', true )) { echo "target='_blank'"; } ?> ><?php echo the_title(); ?></a> <small class="designation"><?php echo "(".$testimonial_author_designation.")"; ?></small></span>
							</div>
						</div> 
					</div>
				</div>
				<?php endwhile;  
				} else {  for($i=1; $i<=2; $i++) { ?>
				<div class="post"> 
					<div class="media"> 
						<figure class="post-thumbnail width-lg"><img src="<?php echo get_template_directory_uri();?>/images/item-small3.jpg" class="img-circle" alt="img"></figure> 
						<div class="media-body">
							<div class="entry-content">
								<p><?php _e('We are a group of passionate designers and developers who really love to create awesome wordpress themes with amazing support and cooles video documentations','busiprof'); ?></p>
								<span class="author-name"><?php echo 'Natalie Portman'; ?> <small class="designation"><?php _e('(Sales & Marketing)','busiprof'); ?></small></span>
							</div>
						</div> 
					</div>
				</div>
				<?php } } ?>
			</div>
			<!-- /Testimonial -->
			<?php } if( $current_options['home_recentblog_section_enabled']=='on' ) { ?>
			<!-- Blog Post -->
			<div class="col-md-6 home-post">
				<!-- Section Title -->
				<div class="section-title-small">
				<?php
					if( $current_options['blog_head'] != '' ) { ?> 
					<h3 class="section-heading"><?php echo $current_options['blog_head'];?></h3>
					<?php } if( $current_options['blog_tagline'] !='')  { ?>
					<p><?php echo $current_options['blog_tagline'];?></p>
					<?php } ?>
				</div>
				<!-- /Section Title -->	
				
				<div class="row">
					<?php 	$args = array( 'post_type' => 'post','posts_per_page' => 4,'post__not_in'=>get_option("sticky_posts")) ; 	
						query_posts( $args );
						if(query_posts( $args ))
					{	
						while(have_posts()):the_post();
					{ ?>
					<div class="col-md-6">
						<div class="post"> 
							<div class="media"> 
								<figure class="post-thumbnail width-lg">
									<div class="home-post-img">
								<?php $defalt_arg =array('class' => "img-circle");?>
								<?php if(has_post_thumbnail()){?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$defalt_arg);?></a>
								<?php } ?>
									</div>
								</figure> 
								<div class="media-body">
									<div class="entry-header">
										<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
										<span class="entry-date">
											<a href="<?php the_permalink(); ?>"><?php echo get_the_date('M j,Y');?></a>
										</span>
									</div>
								</div> 
							</div>
						</div>
					</div>
					<?php } endwhile; } ?>
				</div>
			</div>
			<!-- /Blog Post -->
			<?php } ?>
		</div>	
	</div>
</section>
<!-- End of Testimonial & Blog Section -->

<div class="clearfix"></div>