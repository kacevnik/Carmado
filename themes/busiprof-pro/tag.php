<?php
/**
 * The Tag template file
 * @package WordPress
 */
get_header(); 
?>
<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title">
					<h2><?php  _e( "Tag Archive", 'busiprof'); echo single_cat_title( '', false ); ?></h2>
					<p><?php bloginfo('description');?></p>
				</div>
			</div>
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="col-md-6">
				<div class="search_box">
					<input type="text" id="appendedInputButton" class="search_input" placeholder=<?php _e( 'Search', 'busiprof' ); ?> name="s">
					<input type="button" value="" class="search_btn">
				</div>
			</div>
			</form>
		</div>
	</div>	
</section>
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
						
					endwhile;
					?>
					<!-- Pagination -->			
					<div class="paginations">
						<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => __('Previous','busiprof'),
						'next_text'          => __('Next','busiprof'),
						'screen_reader_text' => ' ',
						) ); ?>
					</div>
					<?php endif; ?>
					<!-- /Pagination -->
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
 
<div class="clearfix"></div>

<?php get_footer(); ?>