<?php 

	/**Includes reqired resources here**/
	define('BUSI_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BUSI_TEMPLATE_DIR',get_template_directory());
	define('BUSI_THEME_FUNCTIONS_PATH',BUSI_TEMPLATE_DIR.'/functions');

	require_once('theme_setup_data.php');

	//Files for custom - defaults menus
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/busiprof_nav_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );
	require( BUSI_THEME_FUNCTIONS_PATH .'/font/font.php' );


	// Theme functions file including
	require( BUSI_THEME_FUNCTIONS_PATH . '/scripts/script.php');
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/custom-widgets.php' ); // for footer widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-widget-contact.php' ); // for custom contact widget 
	require( BUSI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); // for custom contact widget
	require( BUSI_THEME_FUNCTIONS_PATH . '/widgets/busiprof-latest-widget.php' );

	// customizer files include
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_general_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_sections_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_template_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_post_slugs_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_layout_manager_settings.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/customizer/custo_post_meta_setting.php' );
	
	
	
	require( BUSI_THEME_FUNCTIONS_PATH . '/pagination/webriti_pagination.php' );
	require( BUSI_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php' );// for cpt
	require( BUSI_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php' );// for meta box
	require( BUSI_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomie.php' );// for taxonomie
	
	//code for shortcode .....................
	define( 'WPEX_FRAMEWORK_DIR', get_template_directory_uri().'/functions' ); 
	
	//theme ckeck plugin required 	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	
	//content width
	if ( ! isset( $content_width ) ) $content_width = 750;	


	if ( ! function_exists( 'busiporf_setup' ) ) :
	function busiporf_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'busiprof', get_template_directory() . '/lang' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	// supports featured image
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'busiprof' )
	) );
	
	
} // busiporf_setup
endif;
	
	add_action( 'after_setup_theme', 'busiporf_setup' );	

	
function busiprof_project_categories( $query ) {
	
	$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );

	
   if ( is_archive('busiprof_project')) {
        $query->set( 'posts_per_page', $current_options['project_per_page'] );
		return;
   }
		
}
add_action( 'pre_get_posts', 'busiprof_project_categories' );