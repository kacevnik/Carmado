<?php 
function busiprof_template_settings( $wp_customize ){

/* Template Settings */
	$wp_customize->add_panel( 'template_settings', array(
		'priority'       => 127,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template settings', 'busiprof'),
	) );
	
	
	
	/* About settings */
	$wp_customize->add_section( 'about_section' , array(
		'title'      => __('About us page setting', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 0,
   	) );
	
	
	// Enable Team Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_team_section]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_team_section]' , array(
				'label'    => __( 'Enable team section', 'busiprof' ),
				'section'  => 'about_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		
	// Enable Client Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_client_section]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_client_section]' , array(
				'label'    => __( 'Enable client section', 'busiprof' ),
				'section'  => 'about_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
	
	
	
	/* Service settings */
	$wp_customize->add_section( 'service_template' , array(
		'title'      => __('Service page setting', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 1,
   	) );
	
	
		
		// Enable Testimonial Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_testimonial_section_portfolio]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_testimonial_section_portfolio]' , array(
				'label'    => __( 'Enable testimonial section', 'busiprof' ),
				'section'  => 'service_template',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
		
		
		// Enable Client Section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[enable_client_section_portfolio]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[enable_client_section_portfolio]' , array(
				'label'    => __( 'Enable client section', 'busiprof' ),
				'section'  => 'service_template',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
		

	/* Portfolio settings */
	$wp_customize->add_section( 'portfolio_section' , array(
		'title'      => __('Project page setting', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 2,
   	) );
	
		
	// Portfolio template title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_template_tag_line]',
		array( 'default' =>__( '<b>Recent </b>projects', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_template_tag_line]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'text',
		));
		
		// Portfolio template desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_template_tag_desciption]', array( 'default' =>__( 'Project for select your column webdesign', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_template_tag_desciption]', 
			array(
				'label'    => __( 'Description','busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'textarea',
		));
		
		//Project Per Page Setting
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_per_page]', array( 'default' => 4 , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_per_page]', 
			array(
				'label'    => __( 'Display project per page', 'busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'text',
		));
		
		
		
		
		// Project Category Layout
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_category_list]', array( 'default' => 2 , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_category_list]', 
			array(
				'label'    => __( 'Select column layout', 'busiprof' ),
				'section'  => 'portfolio_section',
				'type'     => 'select',
				'choices' => array(
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
				)
		));
		
		
		
		
		/* Contact settings */
	$wp_customize->add_section( 'contact_template_section' , array(
		'title'      => __('Contact page setting', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 3,
   	) );
	
		// Enable Contact Information
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_info_enabled]' , array( 'default' => 'on' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_info_enabled]' , array(
				'label'    => __( 'Enable contact information', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
	
		// Contact Address 1
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_address_1]', array( 'default' => '378 Kingston Court', 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_address_1]', 
			array(
				'label'    => __( 'Address one', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'textarea',
		));
		
		// Contact Address 2
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_address_2]', array( 'default' => 'West New York, NJ 07093' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_address_2]', 
			array(
				'label'    => __( 'Address two', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'textarea',
		));
		
		// phone number
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_number]', array( 'default' => '973-960-4715' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_number]', 
			array(
				'label'    => __( 'Phone', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
		));
		
		// fax number
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_fax_number]', array( 'default' => '0276-758645' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_fax_number]', 
			array(
				'label'    => __( 'Fax', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
		));
		
		// email
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_email]', array( 'default' => 'info@busiprof.com' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_email]', 
			array(
				'label'    => __( 'Email', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
		));
		
		// website
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_website]', array( 'default' => 'https://www.busiprof.com' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_website]', 
			array(
				'label'    => __( 'Website', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'text',
		));
		
		// Enable google map
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_google_map_enabled]' , array( 'default' => 'on' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_google_map_enabled]' , array(
				'label'    => __( 'Enable Google map', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		
		// google map url
		$wp_customize->add_setting( 'busiprof_pro_theme_options[google_map_url]', array( 'default' => 'https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Kota+Industrial+Area,+Kota,+Rajasthan&aq=2&oq=kota+&sll=25.003049,76.117499&sspn=0.020225,0.042014&t=h&ie=UTF8&hq=&hnear=Kota+Industrial+Area,+Kota,+Rajasthan&z=13&ll=25.142832,75.879538' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[google_map_url]', 
			array(
				'label'    => __( 'Google map URL', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'textarea',
		));
		
		//Enble Client section
		$wp_customize->add_setting( 'busiprof_pro_theme_options[contact_client_enabled]' , array( 'default' => 'on' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[contact_client_enabled]' , array(
				'label'    => __( 'Enable client strip', 'busiprof' ),
				'section'  => 'contact_template_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
	/* Taxonomy Archive Project */
	$wp_customize->add_section( 'texonomy_template_section' , array(
		'title'      => __('Project archive page setting', 'busiprof'),
		'panel'  => 'template_settings',
		'priority'   => 4,
   	) );
	
		
		
		// Taxonomy Archive
		$wp_customize->add_setting( 'busiprof_pro_theme_options[taxonomy_project_list]', array( 'default' => 2 , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[taxonomy_project_list]', 
			array(
				'label'    => __( 'Select column layout', 'busiprof' ),
				'section'  => 'texonomy_template_section',
				'type'     => 'select',
				'choices' => array(
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
				)
		));
		
		
		
		//link
		class WP_portfolio_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_project" class="button"  target="_blank"><?php _e( 'Click here to add project', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'portfolio_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_portfolio_Customize_Control( $wp_customize, 'portfolio_pro', array(	
			'section' => 'portfolio_section',
		))
	);
	
	$wp_customize->add_setting( 'busiprof_pro_theme_options[project_texonomy_tag_line]', 
	array( 'default' => __('Recent project category','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_texonomy_tag_line]', 
			array(
				'label'    => __('Title', 'busiprof' ),
				'section'  => 'texonomy_template_section',
				'type'     => 'text',
		));
		
		// Portfolio template desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_texonomy_description_tag]', array( 'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_texonomy_description_tag]', 
			array(
				'label'    => __('Description', 'busiprof' ),
				'section'  => 'texonomy_template_section',
				'type'     => 'textarea',
		));
		
	
		
}
add_action( 'customize_register', 'busiprof_template_settings' );