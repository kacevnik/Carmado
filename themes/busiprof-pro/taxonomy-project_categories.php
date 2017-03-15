<?php
get_header ();
get_template_part('index', 'bannerstrip');

$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
?>
<!-- Container -->
<<section id="section" class="portfolio">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php 
					if( $current_options['project_texonomy_tag_line'] != '' )
					{ ?>
					<h1 class="section-heading"><?php echo $current_options['project_texonomy_tag_line']; ?> </h1>
					<?php } 
					if( $current_options['project_texonomy_description_tag'] != '')
					{
					?>
					<p><?php echo $current_options['project_texonomy_description_tag']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<!-- Portfolio Item -->
			<div class="row">
			<?php 	
				$j=1;
				
	
				if( have_posts() )
				{	while ( have_posts() ) : the_post();
				?>
				<?php if($current_options['taxonomy_project_list'] == 2) { ?>
				<div class="col-md-6 col-sm-6 col-xs-12">

				<?php } else if($current_options['taxonomy_project_list'] == 3) { ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					
					
				<?php } else if($current_options['taxonomy_project_list'] == 4) { ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
				<?php } ?>
				
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
						<?php 
							if(get_post_meta( get_the_ID(),'portfolio_link', true )) 
							{ $portfolio_link=get_post_meta( get_the_ID(),'portfolio_link', true ); }
							else { $portfolio_link = get_post_permalink(); } ?>
							<div class="entry-header">
								<h4 class="entry-title"><a href="<?php echo $portfolio_link; ?>" <?php if(get_post_meta( get_the_ID(),'portfolio_target', true )) { echo "target='_blank'"; } ?> ><?php echo the_title(); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php echo  get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<?php
						if($j%$current_options['taxonomy_project_list']==0){ echo "<div class='clearfix'></div>"; } $j++; $norecord=1; endwhile; ?>
					<?php $count_posts_cat = wp_count_posts('busiprof_project')->publish;
			if($count_posts_cat > $current_options['project_per_page']) { ?>
				
					
					</div>
					<div class="paginations">
					<?php 
				
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => __('Previous','busiprof'),
						'next_text'          => __('Next','busiprof'),
						'screen_reader_text' => ' ',
						) );
			} else { 
			/*No Pagination*/
			} 
			wp_reset_postdata();
			?>	
					</div>
			<?php 
			 } ?>		
				</div>
			</div>
	</div>
</section>
<!-- End of Portfolio Section -->
<?php get_footer(); ?>