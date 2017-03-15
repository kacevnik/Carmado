<?php 
function busiprof_home_page_manager_settings( $wp_customize ){
	
	/* section manager section */
	
	$wp_customize->add_section( 'homepage_layout_manager_section' , 
	
	array(
	
		'title'      => __('Theme layout manager', 'busiprof'),
		
		'priority'   => 130,
		
   	) );
		
		// section 1

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section1]', array( 'default' => 'slider' , 'type'=>'option'  ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section1]', 

			array(

				'label'    => __( 'Section 1', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),

					'Testimonials section'=> __( 'Testimonials section', 'busiprof' ),

					'Client strip'=> __( 'Client strip', 'busiprof' ),

				)

		));

		

		// section 2

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section2]', array( 'default' => 'Service Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section2]', 

			array(

				'label'    => __('Section 2','busiprof'),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),

					'Testimonials section'=> __( 'Testimonials section', 'busiprof' ),

					'Client strip'=> __( 'Client strip', 'busiprof' ),

				)

		));

		

		// section 3

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section3]', array( 'default' => 'Project Section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section3]', 

			array(

				'label'    => __( 'Section 3', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),

					'Testimonials section'=> __( 'Testimonials section', 'busiprof' ),

					'Client strip'=> __( 'Client strip', 'busiprof' ),
				)

		));

		

		// section 4

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section4]', array( 'default' => 'Testimonials section' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section4]', 

			array(

				'label'    => __( 'Section 4', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),

					'Testimonials section'=> __( 'Testimonials section', 'busiprof' ),

					'Client strip'=> __( 'Client strip', 'busiprof' ),

				)

		));

		

		// section 5

		$wp_customize->add_setting( 'busiprof_pro_theme_options[busi_layout_section5]', array( 'default' => 'Client strip' , 'type'=>'option' ) );

		$wp_customize->add_control(	'busiprof_pro_theme_options[busi_layout_section5]', 

			array(

				'label'    => __( 'Section 5', 'busiprof' ),

				'section'  => 'homepage_layout_manager_section',

				'type'     => 'select',

				'choices' => array(

					'slider'=> __( 'Slider', 'busiprof' ),

					'Service Section'=> __( 'Service section', 'busiprof' ),

					'Project Section'=> __( 'Project section', 'busiprof' ),

					'Testimonials section'=> __( 'Testimonials section', 'busiprof' ),

					'Client strip'=> __( 'Client strip', 'busiprof' ),

				)

		));
}
add_action( 'customize_register', 'busiprof_home_page_manager_settings' );