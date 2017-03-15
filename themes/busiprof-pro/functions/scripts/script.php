<?php
// Webriti scripts
if( !function_exists('busiporf_scripts'))
{
	function busiporf_scripts(){
		
		// css
		wp_enqueue_style('style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css' );
		wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/css/flexslider.css' );
		
		wp_enqueue_style('busiporf-Droid', '//fonts.googleapis.com/css?family=Droid+Sans:400,700' );
		wp_enqueue_style('busiporf-Montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' );
		wp_enqueue_style('busiporf-Droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' );
		
		wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/css/lightbox.css' );
		
		// js
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'busiporf-bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js' );
		wp_enqueue_script( 'busiporf-flexslider-js' , get_template_directory_uri() . '/js/jquery.flexslider.js' );
		wp_enqueue_script( 'busiporf-custom-js' , get_template_directory_uri() . '/js/custom.js' );
		
		wp_enqueue_script( 'busiporf-lightbox-js' , get_template_directory_uri() . '/js/lightbox/lightbox-2.6.min.js' );
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action('wp_enqueue_scripts','busiporf_scripts');

add_action('wp_head','busiprof_enqueue_custom_css');
function busiprof_enqueue_custom_css()
{
	$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
	
	if($current_options['busiprof_pro_custom_css']!='') {  ?>
	<style>
	<?php echo $current_options['busiprof_pro_custom_css']; ?>
	</style>
	<?php } 
}
?>