<?php 
function busiprof_post_meta_settings( $wp_customize ){

/* Template Settings */
	$wp_customize->add_section( 'post_meta_settings', array(
		'priority'       => 127,
		'capability'     => 'edit_theme_options',
		'title'      => __('Blog meta settings', 'busiprof'),
	) );
	
// Enable Post meta
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_post_meta]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_post_meta]' , array(
				'label'    => __('Hide post meta from blog pages, archive pages, categories, author etc.', 'busiprof' ),
				'section'  => 'post_meta_settings',
				'type'     => 'radio',
				'choices' => array(
					'on'=>'ON',
					'off'=>'OFF'
				)
		));
		
}
add_action( 'customize_register', 'busiprof_post_meta_settings' );