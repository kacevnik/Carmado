<?php
add_action( 'widgets_init','busiprof_latest_widget'); 
   function busiprof_latest_widget() { return   register_widget( 'busiprof_latest_widget' ); }

/**
 * Adds busiprof_latest_widget widget.
 */
class busiprof_latest_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'busiprof_latest_widget', // Base ID
			__('WBR : Latest Posts', 'busiprof'), // Name
			array( 'description' => __( 'To display your recent post', 'busiprof' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) { ?>
	
	<?php if($args['id'] == 'sidebar-primary') { ?>
		<aside class="widget">			
				<ul id="mytabs" class="widget-tabs">
				  <li class="active"><a href="#popular" data-toggle="tab"><?php _e("Popular",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#recent" data-toggle="tab"><?php _e("Recent",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#comment1" data-toggle="tab"><?php _e("Comment",'busiprof');?></a></li>
				</ul>				
				<div class="tab-content" id="myTabContent">					
					<div id="popular" class="tab-pane fade in active">
					 
					<?php global $wpdb;
						$pop = $wpdb->get_results("SELECT id,guid,post_date,post_title,post_content, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY comment_count DESC LIMIT 5");
						foreach($pop as $post):?>
							<article class="media post">						
								<a class="post-thumbnail" href="<?php echo $post->guid; ?>">
										<?php $atts=array('class' => 'media-object img-polaroid'	);?>
									<?php echo get_the_post_thumbnail( $post->id,'post_feature_image_thumb', $atts); ?>								 
									  </a>
									  <div class="media-body">
										<div class="entry-header">
											<h5 class="entry-title"><a href="<?php echo get_permalink($post->id);  ?>"><?php echo $post->post_title; ?></a></h5>
										<span class="entry-date"><?php echo date("M j,Y",strtotime($post->post_date)) ; ?></span>
									  </div>
									</div>
							</article>
						<?php endforeach; ?>
					 </div>	
					<div id="recent" class="tab-pane fade">
					<?php 
						$args = array( 'post_type' => 'post','posts_per_page' => 4) ; 	
						query_posts( $args );
						if(query_posts( $args ))
						{	while(have_posts()):the_post();
							{ ?><article class="media post">						
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
											 <?php $defalt_arg =array('class' => "media-object img-polaroid");?>
										<?php if(has_post_thumbnail()){?>
										<?php the_post_thumbnail('post_feature_image_thumb',$defalt_arg);
											} ?>
										  </a>
										  <div class="media-body">
											<div class="entry-header">
												<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
											<span class="entry-date"><?php echo get_the_date('M j,Y');?></span>
										  </div>
								</article><?php
							} endwhile; 
						} ?>						
					</div>					
					<div id="comment1" class="tab-pane fade">					
						<?php	$args = array('number' => '5');
						$comments = get_comments($args);
						foreach($comments as $comment) 
						{	$pop1 = $wpdb->get_results("SELECT guid  FROM {$wpdb->prefix}posts WHERE id='$comment->comment_post_ID' ORDER BY comment_count DESC LIMIT 5");
							foreach($pop1 as $post1) { ?>
							<div class="row-fluid" style="border-bottom: 1px dotted #B4BFC5;margin-bottom: 0;padding: 15px 0;">
								<div class="media pull-space-no">
									<a  href="<?php echo $post1->guid; ?>">
										<?php echo get_avatar( $comment, 70 ); ?>
									</a>
									<div class="media-body">
										<p><?php  echo( $comment->comment_author . '<br />' . $comment->comment_content ); ?>
										</p>
										<span><?php  $cm_date = $comment->comment_date; echo date("M j,Y",strtotime($cm_date)); ?> 
										</span>
									</div>
								</div>
							</div><?php 
							}  
						}  ?>									
					</div>					
				</div>
	</aside>	<?php } 
	else if($args['id'] == 'footer-widget-area') { ?>
	<div class="col-md-3 col-sm-6">	
		<aside class="widget">			
				<ul id="mytabs" class="widget-tabs">
				  <li class="active"><a href="#popular-item" data-toggle="tab"><?php _e("Popular",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#recent-item" data-toggle="tab"><?php _e("Recent",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#comment-item" data-toggle="tab"><?php _e("Comment",'busiprof');?></a></li>
				</ul>				
				<div id="myTabContent" class="tab-content">					
					<div id="popular-item" class="tab-pane fade active in">
					<?php global $wpdb;
						$pop = $wpdb->get_results("SELECT id,guid,post_date,post_title, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY comment_count DESC LIMIT 5");
						foreach($pop as $post): ?>
							<article class="media post">						
								<a class="post-thumbnail" href="<?php echo $post->guid; ?>">
										<?php $atts=array('class' => 'media-object img-polaroid'	);?>
									<?php echo get_the_post_thumbnail( $post->id,'post_feature_image_thumb', $atts); ?>								 
									  </a>
									  <div class="media-body">
										<div class="entry-header">
											<h5 class="entry-title"><a href="<?php echo get_permalink($post->id);  ?>"><?php echo $post->post_title; ?></a></h5>
										<span class="entry-date"><?php echo date("M j,Y",strtotime($post->post_date)) ; ?></span>
									  </div>
									</div>
							</article>
						<?php endforeach; ?>
					</div>
					<div id="recent-item" class="tab-pane fade">
					<?php 
						$args = array( 'post_type' => 'post','posts_per_page' => 4) ; 	
						query_posts( $args );
						if(query_posts( $args ))
						{	while(have_posts()):the_post();
							{ ?><article class="media post">						
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
											 <?php $defalt_arg =array('class' => "media-object img-polaroid");?>
										<?php if(has_post_thumbnail()){?>
										<?php the_post_thumbnail('post_feature_image_thumb',$defalt_arg);
											} ?>
										  </a>
										  <div class="media-body">
											<div class="entry-header">
												<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
											<span class="entry-date"><?php echo get_the_date('M j,Y');?></span>
										  </div>
								</article><?php
							} endwhile; 
						} ?>						
					</div>					
					<div id="comment-item" class="tab-pane fade">					
						<?php	$args = array('number' => '5');
						$comments = get_comments($args);
						foreach($comments as $comment) 
						{	$pop1 = $wpdb->get_results("SELECT guid  FROM {$wpdb->prefix}posts WHERE id='$comment->comment_post_ID' ORDER BY comment_count DESC LIMIT 5");
							foreach($pop1 as $post1) { ?>
							<div class="row-fluid" style="border-bottom: 1px dotted #B4BFC5;margin-bottom: 0;padding: 15px 0;">
								<div class="media pull-space-no">
									<a  href="<?php echo $post1->guid; ?>">
										<?php echo get_avatar( $comment, 70 ); ?>
									</a>
									<div class="media-body">
										<p><?php  echo( $comment->comment_author . '<br />' . $comment->comment_content ); ?>
										</p>
										<span><?php  $cm_date = $comment->comment_date; echo date("M j,Y",strtotime($cm_date)); ?> 
										</span>
									</div>
								</div>
							</div><?php 
							}  
						}  ?>									
					</div>					
				</div>
	</aside>
</div>
	<?php } else 
		{
		if($args['id'] == 'header-widget-area') { ?>
		<aside class="widget">			
				<ul id="mytabs" class="widget-tabs">
				  <li class="active"><a href="#popular" data-toggle="tab"><?php _e("Popular",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#recent" data-toggle="tab"><?php _e("Recent",'busiprof');?></a></li>
				  <span>|</span>
				  <li><a href="#comment1" data-toggle="tab"><?php _e("Comment",'busiprof');?></a></li>
				</ul>				
				<div class="tab-content" id="myTabContent">					
					<div id="popular" class="tab-pane fade in active">
					 
					<?php global $wpdb;
						$pop = $wpdb->get_results("SELECT id,guid,post_date,post_title,post_content, comment_count FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY comment_count DESC LIMIT 5");
						foreach($pop as $post):?>
							<article class="media post">						
								<a class="post-thumbnail" href="<?php echo $post->guid; ?>">
										<?php $atts=array('class' => 'media-object img-polaroid'	);?>
									<?php echo get_the_post_thumbnail( $post->id,'post_feature_image_thumb', $atts); ?>								 
									  </a>
									  <div class="media-body">
										<div class="entry-header">
											<h5 class="entry-title"><a href="<?php echo get_permalink($post->id);  ?>"><?php echo $post->post_title; ?></a></h5>
										<span class="entry-date"><?php echo date("M j,Y",strtotime($post->post_date)) ; ?></span>
									  </div>
									</div>
							</article>
						<?php endforeach; ?>
					 </div>	
					<div id="recent" class="tab-pane fade">
					<?php 
						$args = array( 'post_type' => 'post','posts_per_page' => 4) ; 	
						query_posts( $args );
						if(query_posts( $args ))
						{	while(have_posts()):the_post();
							{ ?><article class="media post">						
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
											 <?php $defalt_arg =array('class' => "media-object img-polaroid");?>
										<?php if(has_post_thumbnail()){?>
										<?php the_post_thumbnail('post_feature_image_thumb',$defalt_arg);
											} ?>
										  </a>
										  <div class="media-body">
											<div class="entry-header">
												<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
											<span class="entry-date"><?php echo get_the_date('M j,Y');?></span>
										  </div>
								</article><?php
							} endwhile; 
							wp_reset_query();
						} ?>						
					</div>					
					<div id="comment1" class="tab-pane fade">					
						<?php	$args = array('number' => '5');
						$comments = get_comments($args);
						foreach($comments as $comment) 
						{	$pop1 = $wpdb->get_results("SELECT guid  FROM {$wpdb->prefix}posts WHERE id='$comment->comment_post_ID' ORDER BY comment_count DESC LIMIT 5");
							foreach($pop1 as $post1) { ?>
							<div class="row-fluid" style="border-bottom: 1px dotted #B4BFC5;margin-bottom: 0;padding: 15px 0;">
								<div class="media pull-space-no">
									<a  href="<?php echo $post1->guid; ?>">
										<?php echo get_avatar( $comment, 70 ); ?>
									</a>
									<div class="media-body">
										<p><?php  echo( $comment->comment_author . '<br />' . $comment->comment_content ); ?>
										</p>
										<span><?php  $cm_date = $comment->comment_date; echo date("M j,Y",strtotime($cm_date)); ?> 
										</span>
									</div>
								</div>
							</div><?php 
							}  
						}  ?>									
					</div>					
				</div>
	</aside>
	
	<?php	
		}
	}	
	}	
} // class Foo_Widget
?>