<?php //Template Name: About Us 
  get_header ();
  get_template_part('index', 'bannerstrip');
  $current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
?>


<div class="clearfix"></div>

<!-- About Section -->
<section id="section" class="about">		
	<div class="container">
		<div class="row">
			<?php if(has_post_thumbnail()): ?>
			<div class="col-md-12">
				<div class="page-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="clearfix"></div>
			<?php 
			if( $post->post_content != "" ) { ?>
			<div class="col-md-12">
				<div class="page-thumb">
					<?php 
					the_post(); 
					the_content();?>
				</div>	
			</div>
			<?php } ?>
		</div>
		<?php if( $post->post_content != "" ) { ?>
		<!--Separator-->
		<div class="row"><div class="col-md-12"><div class="separator margin20"></div></div></div>
		<!--/Separator-->
		<?php } ?>
		<!-- Team -->
		<?php if(($current_options['enable_team_section']) == 'on'){ ?>
		<div class="row">
			<?php 
			$arg = array( 'post_type' => 'busiprof_team', 'posts_per_page'=> 4);
			$team = new WP_Query( $arg ); 				
			if( $team->have_posts() )
			{
			$i=1;
			while ( $team->have_posts() ) : $team->the_post();	?>	
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<?php $twitter_url = sanitize_text_field( get_post_meta( get_the_ID(),'twitter_url', true ));  ?>
						<?php if ($twitter_url !='') { ?>
						<div class="twitter-social"><a href="<?php echo $twitter_url ?>">&nbsp;</a></div>
						<?php } ?>
						<div class="team-gravatar">
						<?php $defalt_arg =array('class' => "img-responsive" )?>
						<?php if(has_post_thumbnail()):?>
						<?php the_post_thumbnail('', $defalt_arg); 
						endif ;?>
						</div>
						<?php $team_fb_url = sanitize_text_field(get_post_meta(get_the_ID(),'fb_url',true)); ?>
						<?php if (isset($team_fb_url)) {?>
						<div class="facebook-social"><a href="<?php echo $team_fb_url ?>">&nbsp;</a></div>
						<?php } ?>
						<?php $team_linked_url = sanitize_text_field (get_post_meta(get_the_ID(),'linked_url',true)); ?>
						<?php if(isset($team_linked_url)) {?>
						<div class="linkedin-social"><a href="<?php echo $team_linked_url ;?>">&nbsp;</a></div>
						<?php } ?>
					</div>
					<div class="media-body">
						<?php $team_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_designation', true )); ?>
						<h4 class="team-name"><?php the_title() ;?> <span class="team-designation"><?php echo "(".$team_designation.")" ;?></span></h4>
						<?php $team_description = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_desc', true )); ?>
						<p><?php echo $team_description ;?></p>
					</div>
				</div>
			</div>
			<?php $i++; endwhile; 
			}  else { ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<div class="twitter-social"><a href="#">&nbsp;</a></div>
						<div class="team-gravatar"><img src="<?php echo get_template_directory_uri(); ?>/images/item9.jpg" /></div>
						
						<div class="facebook-social"><a href="#">&nbsp;</a></div>
						<div class="linkedin-social"><a href="#">&nbsp;</a></div>
					</div>
					<div class="media-body">
						<h4 class="team-name"><?php echo 'John Doe'; ?><span class="team-designation">
						<?php _e('(DEVELOPER)','busiprof'); ?></span></h4>
						<p><?php _e('This is where you could add a short bio about the owner or staff of your establishment This is where you could add a short bio about the owner. Neque porro quisquam est, qui dolorem ipsum am quaerat voluptatem.','busiprof'); ?> </p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<div class="twitter-social"><a href="#">&nbsp;</a></div>
						<div class="team-gravatar"><img src="<?php echo get_template_directory_uri(); ?>/images/item10.jpg" /></div>
						<div class="facebook-social"><a href="#">&nbsp;</a></div>
						<div class="linkedin-social"><a href="#">&nbsp;</a></div>
					</div>
					<div class="media-body">
						<h4 class="team-name"><?php echo 'Alice Culan'; ?> <span class="team-designation"><?php _e('(DESIGNER)','busiprof'); ?></span></h4>
						<p><?php echo 'This is where you could add a short bio about the owner or staff of your establishment This is where you could add a short bio about the owner. Neque porro quisquam est, qui dolorem ipsum am quaerat voluptatem.'; ?> </p>
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>
			<!--Separator--><div class="col-md-12"><div class="separator"></div></div><!--/Separator-->
		
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<div class="twitter-social"><a href="#">&nbsp;</a></div>
						<div class="team-gravatar"><img src="<?php echo get_template_directory_uri(); ?>/images/item11.jpg" /></div>
						<div class="facebook-social"><a href="#">&nbsp;</a></div>
						<div class="linkedin-social"><a href="#">&nbsp;</a></div>
					</div>
					<div class="media-body">
						<h4 class="team-name"><?php echo 'Annah Doe'; ?> <span class="team-designation"><?php _e('(DEVELOPER)','busiprof'); ?></span></h4>
						<p><?php echo 'This is where you could add a short bio about the owner or staff of your establishment This is where you could add a short bio about the owner. Neque porro quisquam est, qui dolorem ipsum am quaerat voluptatem.'; ?> </p>
					</div>
				</div>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="team">
					<div class="post-thumbnail">
						<div class="twitter-social"><a href="#">&nbsp;</a></div>
						<div class="team-gravatar"><img src="<?php echo get_template_directory_uri(); ?>/images/item12.jpg" /></div>
						<div class="facebook-social"><a href="#">&nbsp;</a></div>
						<div class="linkedin-social"><a href="#">&nbsp;</a></div>
					</div>
					<div class="media-body">
						<h4 class="team-name"><?php echo 'Charlie Sun'; ?> <span class="team-designation">
						<?php _e('(DESIGNER)','busiprof'); ?></span></h4>
						<p><?php echo 'This is where you could add a short bio about the owner or staff of your establishment This is where you could add a short bio about the owner. Neque porro quisquam est, qui dolorem ipsum am quaerat voluptatem.'; ?> </p>
					</div>
				</div>
			</div>
			<?php } ?>
		
		</div>
		<!-- End of Team -->
		<?php } ?>
	</div>
</section>
<!-- End of About Section -->

<div class="clearfix"></div>

<!-- Clients Section -->
<?php 
if(($current_options['enable_client_section'])=='on') { get_template_part('index','clientstrip'); }?>
<!-- End of Clients Section -->
<?php get_footer(); ?>