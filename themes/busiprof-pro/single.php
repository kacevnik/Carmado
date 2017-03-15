<?php get_header(); 
get_template_part('index', 'bannerstrip');
?>
<!-- Page Title -->
<!-- End of Page Title -->

<div class="clearfix"></div>
<!-- Blog & Sidebar Section -->
<section>		
	<div class="container">
		<div class="row">
			<!--Blog Posts-->
			<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
				<div class="site-content">
					<?php 
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
					
					get_template_part( 'content','' );
					comments_template('',true); 	
					endwhile;
					 
					endif; ?>
					
				</div>
			<!--/End of Blog Posts-->
			</div>
			<!--Sidebar-->
			<?php get_sidebar();?>
			<!--/End of Sidebar-->
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
<?php get_footer(); ?>