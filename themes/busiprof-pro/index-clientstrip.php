<?php 
$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
require_once( BUSI_THEME_FUNCTIONS_PATH . '/scripts/clientjs-strip.php' );
if( $current_options['home_client_section_enabled']=='on' ) { 
?>
<!-- Clients Section -->
<section class="clients">
	<div class="container">
			
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h1 class="section-heading"><?php echo $current_options['client_title']; ?></h1>
					<p><?php echo $current_options['client_desc']; ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<div id="clients" class="flexslider carousel col-md-12">
			<ul class="slides">
				<?php  
					/****check custom client strip*****/
					$count_posts = wp_count_posts( 'busiprof_clientstrip')->publish;
					$args = array( 'post_type' => 'busiprof_clientstrip','posts_per_page'=>$count_posts ) ; 
						
					$clientstrip = new WP_Query( $args );
						
					if( $clientstrip->have_posts() )
					{	
					while ( $clientstrip->have_posts() ) : $clientstrip->the_post(); ?>
				<li>
				<?php if(has_post_thumbnail()) { the_post_thumbnail('');  } ?>
				</li>
					<?php endwhile; 
					} else 
					{ for($i=0;$i<=12;$i++) { ?>
				<li>
					<img src="<?php echo BUSI_TEMPLATE_DIR_URI; ?>/images/clients/client1.png" />
				</li>
				<?php } }?>
			</ul>
		</div>	
	</div>
</section>
<!-- End of Clients Section -->

<div class="clearfix"></div>
<?php } ?>