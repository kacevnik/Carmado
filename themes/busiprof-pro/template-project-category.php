<?php 
//Template Name: Project With Category
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
		<?php
		//for a given post type, return all
		$post_type = 'busiprof_project';
		$tax = 'project_categories'; 
		$tax_terms = get_terms($tax);
		$defualt_tex_id = get_option('custom_texoid_busiprof');
		$busiprof_active=1;
		$tab= get_option('tab');
		if(isset($_GET['div']))
		{
			$tab=$_GET['div'];
		}
		
		?>
		<div class="row">
			<div class="col-md-12">
				<ul id="mytabs" class="portfolio-tabs">
					<?php	foreach ($tax_terms  as $tax_term) { 
					?>
					<li class="tab <?php if($tab==''){if($j==1){echo 'active';$j=2;}}else if($tab==$tax_term->slug){echo 'active';}?>"><a id="tab" href="#<?php echo $tax_term->slug; ?>" data-toggle="tab"><?php echo $tax_term->name; ?></a></li>
					<?php } ?>
					</ul>
				
			</div>		
		</div>
		<?php if ($tax_terms) { ?>
		<!-- /Portfolio Tabs -->
		<div class="tab-content main-portfolio-section" id="myTabContent">
		<?php  
		$busiprof_in=1;
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
		<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>">
			<div class="row">
			<?php $k=1;
				  while ($home_project_query->have_posts()) : $home_project_query->the_post(); ?>
				<?php if($current_options['project_category_list'] == 2) { ?>
				<div class="col-md-6 col-sm-6 col-xs-12">

				<?php } else if($current_options['project_category_list'] == 3) { ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					
					
				<?php } else if($current_options['project_category_list'] == 4) { ?>
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
							<div class="entry-header">
								<h4 class="entry-title"><a href="<?php echo get_post_meta( get_the_ID(),'project_link', true ); ?>" <?php if(get_post_meta( get_the_ID(),'project_target', true )) { echo "target='_blank'"; } ?> > <?php the_title(); ?></a></h4>
							</div>
							<div class="entry-content">
								<p><?php echo get_post_meta( get_the_ID(),'project_title_description', true ); ?></p>
							</div>
						</div>					
					</aside>
				</div>
				<?php
						if($k%$current_options['project_category_list']==0){ echo "<div class='clearfix'></div>"; } $k++; $norecord=1; endwhile; ?>	
			</div>	
		</div>
		<?php } 
			else{
			?>
			<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>"></div>
			<?php
			}
			wp_reset_query(); $busiprof_in++; } ?>
	</div>
	<?php } ?></div>
</section>
<!-- End of Portfolio Section -->
<?php get_footer(); ?>