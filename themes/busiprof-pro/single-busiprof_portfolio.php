<?php  get_header();
get_template_part('index', 'bannerstrip');
?>
<!-- Portfolio & Sidebar Section -->
<section>		
	<div class="container">
		<div class="row">
			<!--Portfolio Detail-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					<article class="post"> 
						<span class="author">
						<figure class="avatar">
						<a data-tip="<?php the_author() ;?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?> data-toggle="tooltip"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 );  ?></a>
						</figure>
						</span>
						<header class="entry-header">
							<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>"><?php the_title();?></a></h3>
						</header>
						
						<div class="entry-meta">
		
						<span class="entry-date"><a href="<?php the_permalink(); ?>"><time datetime=""><?php the_time('M j,Y');?></time></a></span>
			
						<span class="comments-link"><a href="<?php the_permalink(); ?>"><?php  comments_popup_link( __( 'Leave a comment', 'busiprof' ) ); ?></a></span>
			
						<span class="tag-links"><a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', ''); ?></a></span>				
						
						</div>
						
						<?php if(has_post_thumbnail()):?>
						<?php $post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );	 ?>
						<a class="post-thumbnail" href="<?php echo $post_thumbnail_url; ?>"><?php the_post_thumbnail(); ?></a>
						<?php endif;?>						
						<div class="entry-content">
							<p><?php echo  get_post_meta( get_the_ID(),'portfolio_description', true ); ?></p>
						</div>
					</article>
					
				</div>
			</div>
			<!--/End of Portfolio Detail-->

			<!--Sidebar-->
			<?php get_sidebar(); ?>
			<!--/End of Sidebar-->
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
<?php get_footer(); ?>