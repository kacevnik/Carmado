<?php 
function busiprof_sections_settings( $wp_customize ){

/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Homepage section settings', 'busiprof'),
	) );
	
	/* Banner strip section */
	$wp_customize->add_section( 'bannerstrip_section' , array(
		'title'      => __('Infobar settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 0,
   	) );
	
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_banner_strip_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_banner_strip_enabled]' , array(
				'label'    => __( 'Enable Infobar', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// Banner strip text
		$wp_customize->add_setting( 'busiprof_pro_theme_options[intro_tag_line]', array( 'default' =>__('Backend as a service plateform for any app developer', 'busiprof' ) , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[intro_tag_line]', 
			array(
				'label'    => __('Infobar text', 'busiprof' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'textarea',
		));
		
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_page_slider_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_page_slider_enabled]' , array(
				'label'    => __( 'Enable slider', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// animation
		$wp_customize->add_setting( 'busiprof_pro_theme_options[animation]', array( 'default' => 'slide' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[animation]', 
			array(
				'label'    => __( 'Animation', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'slide'=>__('slide', 'busiprof'),
					'fade'=>__('fade', 'busiprof')
				)
		));
		
		// Direction
		$wp_customize->add_setting( 'busiprof_pro_theme_options[slide_direction]', array( 'default' => 'horizontal' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[slide_direction]', 
			array(
				'label'    => __( 'Direction', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'horizontal'=>__('horizontal', 'busiprof'),
					'vertical'=>__('vertical', 'busiprof')
				)
		));
		
		// animation speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[animation_speed]', array( 'default' => 1000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[animation_speed]', 
			array(
				'label'    => __( 'Animation speed', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		// slide show speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[slideshow_speed]', array( 'default' => 2000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[slideshow_speed]', 
			array(
				'label'    => __('Slideshow speed', 'busiprof' ),
				'section'  => 'slider_section',
				'type'     => 'select',
				'choices'=>array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		
		//link
		class WP_slider_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_slider" class="button"  target="_blank"><?php _e( 'Click here to add slider', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'slider',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_slider_Customize_Control( $wp_customize, 'slider', array(	
			'section' => 'slider_section',
		))
	);	
	
	
	
	/* Services section */
	$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Service settings', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 3,
	) );
		
		
		// Enable service more btn
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_service_section_enabled]' , array( 'default' => 'on' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_service_section_enabled]' , array(
				'label'    => __( 'Enable / Disable home services section', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		
		// service section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_tag_line]', 
		array( 'default' => __('<b>Awesome </b>services', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_tag_line]', 
			array(
				'label'    => __('Title', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// service section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_tag_desciption]', array( 'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_tag_desciption]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'textarea',
		));
		
		// no of service show
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_list]', array( 'default' => 4 , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_list]', 
			array(
				'label'    => __( 'Number of services on service section', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'select',
				'choices'=>array(
					'4'=>'4',
					'8'=>'8',
					'12'=>'12',
					'16'=>'16',
					'20'=>'20',
					'24'=>'24',
				)
		));
		
		
		// Services Read More Text
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_readmore_button]', array( 'default' =>__( 'More services', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_readmore_button]', 
			array(
				'label'    => __( 'Button Text', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		// Services Read More Button URL
		$wp_customize->add_setting( 'busiprof_pro_theme_options[service_readmore_link]', array( 'default' => '#' , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[service_readmore_link]', 
			array(
				'label'    => __( 'Button Link', 'busiprof' ),
				'section'  => 'services_section',
				'type'     => 'text',
		));
		
		//Service Read More Button target
		$wp_customize->add_setting('busiprof_pro_theme_options[service_readmore_link_target]',
		array( 'default' => true, 
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		));

		$wp_customize->add_control(
		'busiprof_pro_theme_options[service_readmore_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','busiprof'),
			'section' => 'services_section',
		)
	);
		
		
		//link
		class WP_service_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_service" class="button"  target="_blank"><?php _e( 'Click here to add service', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'service',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_service_Customize_Control( $wp_customize, 'service', array(	
			'section' => 'services_section',
		))
	);
	
	
	
	/* Project Section */
	$wp_customize->add_section( 'project_section' , array(
			'title'      => __('Project settings', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 4,
		) );
		
		// Enable banner strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_project_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_project_section_enabled]' , array(
				'label'    => __( 'Enable home project section', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// project section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_tag_line]', 
		array( 'default' => __('<b>Recent </b>projects', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_tag_line]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'text',
		));
		
		// project section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[project_tag_desciption]', 
		array( 'default' => '', 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[project_tag_desciption]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'project_section',
				'type'     => 'textarea',
		));	
		
		
		
	/* Testimonial Section */
	$wp_customize->add_section( 'testimonial_section' , array(
			'title'      => __('Testimonial setting', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 5,
		) );
		
		// Enable Testimonial strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_testimonial_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_testimonial_section_enabled]' , array(
				'label'    => __( 'Enable home testimonial section', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));
		
		// testmonial section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[testimonial_head]', 
		array( 'default' => __('<b>Our</b> Testimonials', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[testimonial_head]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'text',
		));
		
		// testmonial section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[testimonial_tagline]', array( 'default' => __('We are a group of passionate designers & developers', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[testimonial_tagline]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'testimonial_section',
				'type'     => 'textarea',
		));	

	/* Blog Section */
	$wp_customize->add_section( 'blog_section' , array(
			'title'      => __('Recent blog setting', 'busiprof'),
			'panel'  => 'section_settings',
			'priority'   => 6,
		) );
		
		// Enable Recent Blog
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_recentblog_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_recentblog_section_enabled]' , array(
				'label'    => __( 'Enable home client section', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
		
		
		// blog section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[blog_head]', array( 'default' => __('<b>Recent </b> blog', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[blog_head]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'text',
		));
		
		// blog section desc
		$wp_customize->add_setting( 'busiprof_pro_theme_options[blog_tagline]', array( 'default' => __('We are a group of passionate designers & developers', 'busiprof' ) , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[blog_tagline]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'blog_section',
				'type'     => 'textarea',
		));
		
	/* Client Slider Section */
	$wp_customize->add_section( 'clientslider_section' , array(
		'title'      => __('Client slider setting', 'busiprof'),
		'panel'  => 'section_settings',
		'priority'   => 7,
   	) );
	
		// Enable Client Strip
		$wp_customize->add_setting( 'busiprof_pro_theme_options[home_client_section_enabled]' , array( 'default' => 'on' , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[home_client_section_enabled]' , array(
				'label'    => __( 'Enable home client section', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'busiprof'),
					'off'=>__('OFF', 'busiprof')
				)
		));	
	
	
		// Client section title
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_title]', array( 'default' => __('Meet our clients','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_title]', 
			array(
				'label'    => __( 'Title', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'text',
		));
		
		
		// Client section Description
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_desc]', array( 'default' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof') , 'type'=>'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_desc]', 
			array(
				'label'    => __( 'Description', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'textarea',
		));
		
		// client to show
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_total]', array( 'default' => 5 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_total]', 
			array(
				'label'    => __( 'No. of clients show', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices'=>array(
					'2'=>'2',
					'3'=>'3',
					'4'=>'4',
					'5'=>'5',
					'6'=>'6',
					'7'=>'7',
					'8'=>'8',
					'9'=>'9',
					'10'=>'10',
					'11'=>'11',
					'12'=>'12',
				)
		));
		
		// Client Strip slide Speed
		$wp_customize->add_setting( 'busiprof_pro_theme_options[client_strip_slide_speed]', array( 'default' => 2000 , 'type' => 'option' ) );
		$wp_customize->add_control(	'busiprof_pro_theme_options[client_strip_slide_speed]', 
			array(
				'label'    => __( 'Animation speed', 'busiprof' ),
				'section'  => 'clientslider_section',
				'type'     => 'select',
				'choices' => array(
					'1000'=>'1.0',
					'1500'=>'1.5',
					'2000'=>'2.0',
					'2500'=>'2.5',
					'3000'=>'3.0',
					'3500'=>'3.5',
					'4000'=>'4.0',
					'4500'=>'4.5',
					'5000'=>'5.0',
					'5500'=>'5.5',
					'6000'=>'6.0',
				)
		));
		
		//link
		class WP_client_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
		/**
		* Render the control's content.
		*/
		public function render_content() {
		?>
		<a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=busiprof_clientstrip" class="button"  target="_blank"><?php _e( 'Click here to add client', 'busiprof' ); ?></a>
		<?php
		}
	}

	$wp_customize->add_setting(
		'pro_cleint',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_client_Customize_Control( $wp_customize, 'pro_cleint', array(	
			'section' => 'clientslider_section',
		))
	);	
}
add_action( 'customize_register', 'busiprof_sections_settings' );