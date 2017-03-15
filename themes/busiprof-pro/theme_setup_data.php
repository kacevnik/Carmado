<?php
/*---------------------------------------------------------------------------------*
 * @file           theme_stup_data.php
 * @package        Busiprof
 * @copyright      2013 Busiprof
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/theme_setup_data.php
 *	Admin  & front end defual data file 
 *-----------------------------------------------------------------------------------*/ 
 
function theme_data_setup()
{
		$template_uri = BUSI_TEMPLATE_DIR_URI. '/images/default/';	
		
		return $busiprof_pro_theme_options = array(
		
			'front_page'  => 'yes',
			
			'upload_image'=>'',
			'width'=>'115',
			'height'=>'40',
			'enable_logo_text'=>false,
			
			'upload_image_favicon'=>'',
			'home_banner_strip_enabled'=>'on',
			'intro_tag_line' => __('Backend as a service plateform for any app developer','busiprof'),
			
			'home_page_slider_enabled'=>'on',			
			'home_service_section_enabled'=>'on',
			'home_project_section_enabled'=>'on',
			'home_testimonial_section_enabled'=>'on',
			'home_recentblog_section_enabled'=>'on',
			'home_client_section_enabled' => 'on',
			'contact_info_enabled' => 'on',
			'contact_google_map_enabled'=>'on',
			'contact_client_enabled' => 'on',
			'enable_team_section' => 'on',
			'enable_client_section' => 'on',
			'enable_testimonial_section_portfolio' => 'on',
			'enable_client_section_portfolio' => 'on',
			'enable_post_meta' => 'on',

			
			//Slide Heading								
			'animation' => 'slide',
			'slide_direction' => 'horizontal',
			'animation_speed' => '1000',
			'slideshow_speed' => '2000',
			
			'client_strip'=>'yes',
			'client_strip_slide_speed'=>'2000',
			'client_strip_total' =>5,
			'client_title' => __('Meet our clients','busiprof'),
			'client_desc' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			
			'busiprof_pro_custom_css' =>"",
			
			'footer_copyright_text'=> '<p>'.__('All Rights Reserved by BusiProf. Designed and Developed by','busiprof').'<a href="http://www.webriti.com/" target="_blank">'.__('WordPress Theme','busiprof').'</a></p>',
			
			'footer_social_media_enabled'=>'on',
			'footer_twitter_link' =>"#",
			'footer_facebook_link' =>"#",
			'footer_linkedin_link' =>"#",
			'footer_google_link' => '#',
			'footer_skype_link' => '#',
			
			//Portfolio
			'protfolio_tag_line'=> __('<b>Recent </b> projects','busiprof'),
			'protfolio_description_tag' => __("We are a group of passionate designers and developers who really love to create awesome wordpress themes & support",'busiprof'),
								
			//Service
			'slider_readmore'=>'#',
			'service_list' => 4,
			'service_tag_line'=>__('<b>Awesome </b>services','busiprof'),
			'service_tag_desciption'=>__('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			'read_more_btn_enabled' => 'on',
			'service_readmore_button'=>__('More services','busiprof'),
			'service_readmore_link'=>'#',
			'service_readmore_link_target' => true,
			
			//Project
			'project_tag_line'=>__('<b>Recent </b>projects','busiprof'),
			'project_tag_desciption'=> __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			
			'testimonial_head' => __('<b>Our</b> Testimonials','busiprof'),
			'testimonial_tagline' => __('We are a group of passionate designers & developers','busiprof'),
			
			'blog_head' =>__('<b>Recent </b>blog','busiprof'),
			'blog_tagline' =>__('We are a group of passionate designers & developers','busiprof'),	
			'project_category_list'=>2,
			'project_per_page' => 4,
			
			
			'project_template_tag_line' => __('<b>Recent </b>projects','busiprof'),
			'project_template_tag_desciption' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			
			'project_texonomy_tag_line' => __('Recent project category','busiprof'),
			'project_texonomy_description_tag' => __('We are a group of passionate designers and developers who really love to create awesome wordpress themes & support','busiprof'),
			
			//contact page settings
			'contact_address_1'=> '378 Kingston Court',
			'contact_address_2'=> 'West New York, NJ 07093',
			'contact_number'=>'973-960-4715',
			'contact_fax_number'=>'0276-758645',
			'contact_email'=>'info@busiprof.com',
			'contact_website'=>'https://www.busiprof.com',
			'google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
			
			//Post Type slug Options
			'busiprof_slider_slug' => 'busiprof-slider',
			'busiprof_service_slug' => 'busiprof-service',
			'busiprof_project_slug' => 'busiprof-project',
			'busiprof_testimonial_slug' => 'busiprof-testimonial',
			'busiprof_team_slug' => 'busiprof-team',
			'busiprof_client_slug' => 'busiprof-client',
			'busiprof_project_texonomy_slug' => 'project-category',
			
			//Taxonomy Archive Setting
			'taxonomy_project_list' => 2 ,
			
			// layout manager settings
			'busi_layout_section1' => 'slider',
			'busi_layout_section2' => 'Service Section',
			'busi_layout_section3' => 'Project Section',
			'busi_layout_section4' => 'Testimonials section',
			'busi_layout_section5' => 'Client strip',

	);
		
}