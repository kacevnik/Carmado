<?php 
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

if( $current_options['home_project_section_enabled'] == 'on' ) { 
?>
<!-- Portfolio Section -->
<section id="section" class="portfolio bg-color">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h1 class="section-heading"><?php echo $current_options['project_tag_line'];?></h1>
					<?php if( $current_options['project_tag_desciption'] != '' ) {?>
					<p><?php echo $current_options['project_tag_desciption']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<!-- Portfolio Tabs -->
		<?php
		//for a given post type, return all
		$post_type = 'busiprof_project';
		$tax = 'project_categories'; 
		$tax_terms = get_terms($tax);
		//echo  $defualt_tex_id = get_option('custom_texoid_busiprof');
		$busiprof_active=1;
		if($tax_terms)
		{?>
		<div class="row">
			<div class="col-md-12">
				<ul id="mytabs" class="portfolio-tabs">
				<?php
					foreach ($tax_terms  as $tax_term)						
					{	$tax_name =str_replace(' ', '_', $tax_term->name); 
						$tax_name=preg_replace('~[^A-Za-z\d\s-]+~u', 'wbr', $tax_name); ?>
						<li <?php if($busiprof_active==1) echo "class='active'"; ?>><a data-toggle="tab" href="#<?php echo $tax_name; ?>" ><?php echo $tax_term->name; ?></a></li>
					<?php  $busiprof_active++; } ?>	
				</ul>
			</div>		
		</div>
		<?php } else { ?>
		<div class="row">
			<div class="col-md-12">
				<ul id="mytabs" class="portfolio-tabs">
					<li class="active"><a data-toggle="tab" href="#all"><?php _e('All','busiprof'); ?></a></li>
					<li><a data-toggle="tab" href="#web"><?php _e('Web design','busiprof'); ?></a></li>
					<li><a data-toggle="tab" href="#graphic"><?php _e('Graphic design','busiprof'); ?></a></li>
					<li><a data-toggle="tab" href="#development"><?php _e('Web development','busiprof'); ?></a></li>
					<li><a data-toggle="tab" href="#multimedia"><?php _e('Multimedia','busiprof'); ?></a></li>
					<li><a data-toggle="tab" href="#media"><?php _e('Print media','busiprof'); ?></a></li>
				</ul>
			</div>		
		</div>
		<?php } if ($tax_terms) { ?>
		<!-- /Portfolio Tabs -->
		<div class="tab-content main-portfolio-section" id="myTabContent">
		<?php  $busiprof_in=1;
					foreach ($tax_terms  as $tax_term)
					  {
						$args=array(
						  'post_type' => $post_type,
						  "$tax" => $tax_term->slug,
						  'post_status' => 'publish',
						  'posts_per_page' => -1 ,
						);
						$home_project_query = null;
						$home_project_query = new WP_Query($args);
						if( $home_project_query->have_posts() )
						{ 	
						$tax_name =str_replace(' ', '_', $tax_term->name);
						$tax_name=preg_replace('~[^A-Za-z\d\s-]+~u', 'wbr', $tax_name);
						?>
		<!-- Portfolio Item -->
		<div id="<?php echo $tax_name; ?>" class="tab-pane fade <?php if($busiprof_in == 1) echo "in active" ; ?>">
			<div class="row">
			<?php $k=1;
				  while ($home_project_query->have_posts()) : $home_project_query->the_post(); ?>
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
				<?php  if($k%4==0){ echo '<div class="clearfix"></div>' ; }  $k++; endwhile; ?>
			</div>	
		</div>
		<?php } wp_reset_query(); $busiprof_in++; } ?>
	</div>
	<?php } else { ?>
		<!-- /Portfolio Item -->
				
		<!-- Portfolio Item -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<!-- Portfolio Item -->
		<div id="all" class="tab-pane fade in active">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Clean & usable UI kit','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>	
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Responsive WP theme','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>	
						</div>
					</aside>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Graphic design','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>	
						</div>
					</aside>
				</div>
			</div>	
		</div>
		<!-- /Portfolio Item -->
		<div id="web" class="tab-pane fade">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Clean & usable UI kit','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>	
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Responsive WP theme','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>	
						</div>
					</aside>
				</div>
			</div>	
		</div>
		<!-- /Portfolio Item -->
		
		<!-- Portfolio Item -->
		<div id="graphic" class="tab-pane fade">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Clean & usable UI kit','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>	
			</div>	
		</div>
		<!-- /Portfolio Item -->
		
		<!-- Portfolio Item -->
		<div id="development" class="tab-pane fade">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
			</div>	
		</div>
		<!-- /Portfolio Item -->
		
		<!-- Portfolio Item -->
		<div id="multimedia" class="tab-pane fade">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Responsive design','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
			</div>	
		</div>
		<!-- /Portfolio Item -->
		
		<!-- Portfolio Item -->
		<div id="media" class="tab-pane fade">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg">
							<div class="thumbnail-showcase-overlay">
								<div class="thumbnail-showcase-overlay-inner">
									<div class="thumbnail-showcase-icons">
										<a href="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/item1.jpg" data-lightbox="image" title="Busiprof" class="hover_thumb"><i class="fa fa-search"></i></a>
									</div>
								</div>
							</div>
						</figure>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title"><a href="#"><?php _e('Business cards','busiprof'); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php _e('Graphic design & web design','busiprof'); ?></p>
							</div>
						</div>					
					</aside>
				</div>
			</div>	
		</div>
	</div>	
		<!-- /Portfolio Item -->
		<?php } ?>	
	</div>
</section>
<!-- End of Portfolio Section -->
<div class="clearfix"></div>
<?php } ?>