<?php 
//Template Name: project-4-column
get_header();
get_template_part('index', 'bannerstrip');
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
?>
<!-- Portfolio Section -->
<section id="section" class="portfolio">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php 
					if( $current_options['project_template_tag_line'] != '' )
					{ ?>
					<h1 class="section-heading"><?php echo $current_options['project_template_tag_line']; ?> </h1>
					<?php } 
					if( $current_options['project_template_tag_desciption'] != '')
					{
					?>
					<p><?php echo $current_options['project_template_tag_desciption']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
			
		<!-- Portfolio Item -->
			<div class="row">
			<?php 	global $paged;
				$j=1;
				$paged = $paged ? $paged : 1;
				$args = array(
					'post_type' => 'busiprof_project',
					'posts_per_page' => $current_options['project_per_page'],
					'paged' => $paged
				);
				
				$project = new WP_Query( $args );
				//$post_type_data = new WP_Query( $args );
				if( $project->have_posts() )
				{	while ( $project->have_posts() ) : $project->the_post();
				?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<?php	if(has_post_thumbnail())
									{ 
									the_post_thumbnail( );
									$post_thumbnail_id = get_post_thumbnail_id();
									$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
									}
									?>
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<?php if(isset($post_thumbnail_url)){ ?>
										<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-search"></i></a>
										<?php } ?>
									</div>
								</div>
							</div>
							
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<?php if($j%4==0){ echo "<div class='clearfix'></div>"; } $j++; 	endwhile;  ?>
			
			<?php $count_posts_4c = wp_count_posts('busiprof_project')->publish;
			if($count_posts_4c > $current_options['project_per_page']) { ?>
			<?php 
				$Webriti_pagination = new Webriti_pagination();
				$Webriti_pagination->Webriti_page($paged, $project);
			} else { 
			/*No Pagination*/
			} 
			wp_reset_postdata();
			?>
			</div>
			<?php 
			 } ?>
		<!-- /Portfolio Item -->		
	</div>
</section>
<!-- End of Portfolio Section -->
<?php get_footer(); ?>