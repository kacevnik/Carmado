<?php
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function create_project_taxonomy() {
		$current_options = wp_parse_args(  get_option( 'busiprof_pro_theme_options', array() ), theme_data_setup() );
		$busiprof_products_category_slug = $current_options['busiprof_project_texonomy_slug'];
		register_taxonomy('project_categories', 'busiprof_project',
        array(
            'hierarchical' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array('slug' => $busiprof_products_category_slug ),
            'label' => __('Project categories','busiprof'),
            'query_var' => true,
		));
	//Default category id		
	$defualt_tex_id = get_option('custom_texoid_busiprof');
	//quick update category
	if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
		wp_update_term($_POST['tax_ID'], 'project_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug']
		));	
		update_option('custom_texoid_busiprof', $defualt_tex_id);
	}
	else 
	{ 	//insert default category 
		if(!$defualt_tex_id){
			wp_insert_term('ALL','project_categories', array('description'=> 'Default Category','slug' => 'ALL'));
			$Current_text_id = term_exists('ALL', 'project_categories');
			update_option('custom_texoid_busiprof', $Current_text_id['term_id']);
		}
	}
	//update category
	if(isset($_POST['submit']) && isset($_POST['action']) )
	{	wp_update_term($_POST['tag_ID'], 'project_categories', array(
		  'name' => $_POST['name'],
		  'slug' => $_POST['slug'],
		  'description' =>$_POST['description']
		));
	}
	// Delete default category
	if(isset($_POST['action']) && isset($_POST['tag_ID']) )
	{	if(($_POST['tag_ID'] == $defualt_tex_id) && $_POST['action']	 =="delete-tag")
		{	
			delete_option('custom_texoid_busiprof'); 
		} 
	}
}
add_action( 'init', 'create_project_taxonomy' );
?>