<?php
/*
================================================================================================
Maria Theme Customizer
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/Theme_Customization_API
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function maria_kirki_customize_register () {
	
	// kirki configs
	Maria_Kirki::add_config( 'maria', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	
	// Repeater section for slider settings
	Maria_Kirki::add_section('slider_section', array(
		'title' => __('Sliders', 'maria'),
		'priority' => 30,
	));

	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'repeater',
			'settings'      => 'slider_repeater',
			'label'         => esc_attr__( 'Create a slide', 'maria' ),
			'description'   => esc_attr__( 'Set up the slide, define title, description, page, etc', 'maria' ),
			'section'       => 'slider_section',
			'default'       => array(),
			'priority'      => 10,
			'row_label'     => array(
				'type'      => 'field',
				'value'     => 'row',
				'field'     => 'slide_description',
			),
			'fields' => array(
				// field: slide title
				'slide_title' => array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description'       => esc_attr__( 'Small upper text', 'maria' ),
					'default'           => esc_attr__( 'For people who do real business', 'maria' ),
					'sanitize_callback' => 'sanitize_text_field'
				),
				// field: slide description
				'slide_description' => array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description'       => esc_attr__( 'Big lower text', 'maria' ),
					'default'           => esc_attr__( 'Simple, intuitive, creative', 'maria' ),
					'sanitize_callback'	=> 'sanitize_text_field'
				),
				// field: button text 1
				'slide_button_text_1' => array(
						'type'        => 'text',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Text for button 1', 'maria' ),
						'default'     => esc_attr__( 'Read more', 'maria' ),
						'sanitize_callback' => 'sanitize_text_field'
				),
				// field: page 1
				'slide_page_1' => array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Page for button 1', 'maria' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				),
				// field: button text 2
				'slide_button_text_2' => array(
						'type'        => 'text',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Text for button 2', 'maria' ),
						'default'     => esc_attr__( 'Read more', 'maria' ),
						'sanitize_callback' => 'sanitize_text_field'
				),
                // field: page 2
				'slide_page_2' => array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Page for button 2', 'maria' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				),
				// field: background
				'slide_image' => array(
						'type'        => 'image',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Image of the slide', 'maria' ),
				)
			)
		)
	);
		
	/**
     * Section for Services
     * Taking advantage of Kirki's repeater 
     * feature, and static fields: section title
     * and description
     */
    
	Maria_Kirki::add_section('services_section', array(
		'title' => __('Services', 'maria'),
		'priority' => 30,
	));

	// Field for services sections: title 
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'text',
			'settings'      => 'services_section_title',
			'label'         => __( 'Head text for services section', 'maria' ),
			//'description'   => __( 'Add Head text for services section', 'maria' ),
			'default'       => __( 'Our services', 'maria' ),
			'section'       => 'services_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Field for services sections: description
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'textarea',
			'settings'      => 'services_section_description',
			'label'         => __( 'Head description for services section', 'maria' ),
			//'description'   => __( 'Add Head description for services section', 'maria' ),
			'default'         => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'maria' ),
			'section'       => 'services_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
    
	// Repeater for services
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'repeater',
			'settings'      => 'services_repeater',
			'label'         => __( 'Create a service', 'maria' ),
			'description'   => __( 'Set up the service, define title, description, page, etc', 'maria' ),
			'section'       => 'services_section',
			'default'       => array(),
			'priority'      => 10,
			'row_label'     => array(
				'type'      => 'field',
				'value'     => 'row',
				'field'     => 'service_title',
			),
			'fields' => array(
				// field: image
				'service_image' => array(
						'type'        => 'image',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Image of the slide', 'maria' ),
				),
				'service_title'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description'       => esc_attr__( 'Upper text', 'maria' ),
					'default'           => 'Business strategy',
					'sanitize_callback' => 'sanitize_text_field'
				),
				// field: services_description
				'service_description' => array(
					'type'              => 'textarea',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description'       => esc_attr__( 'Description', 'maria' ),
					'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					'sanitize_callback'	=> 'sanitize_text_field'
				),
				// field: page
				'service_page'	=> array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'maria' ),
						'description' => esc_attr__( 'Page of the service', 'maria' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				)
			)
		)
	);

	
	
	// Create a repeater section for social networks
	Maria_Kirki::add_section('social_section', array(
		'title' => __('Social medias', 'maria'),
		'priority' => 30,
	));
	// Create a repeater for socials
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'repeater',
			'settings'      => 'social_repeater',
			'label'         => __( 'Add a social media', 'maria' ),
			'section'       => 'social_section',
			'default'       => array(),
			'priority'      => 10,
			'row_label'     => array(
				'type'      => 'field',
				'value'     => 'row',
				'field'     => 'social_title',
			),
			'fields' => array(
				// field: social_title
				'social_title'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description'       => esc_attr__( 'Title', 'maria' ),
					'default'           => 'Social',
					'sanitize_callback' => 'sanitize_text_field'
				),
				
				// field: social_url
				'social_url'	=> array(
						'type'        => 'text',
						'description' => esc_attr__( 'Url of the social profile or page', 'maria' ),
						'default'     => '#',
						'sanitize_callback' => 'sanitize_text_field'
				)
			)
		)
	);

	/**
     * Section for Blog
     * Taking advantage of Kirki's repeater 
     * feature, and static fields: section title
     * and description
     */
    
	// Create a repeater section for team
	Maria_Kirki::add_section('blog_section', array(
		'title' => __('Blog', 'maria'),
		'priority' => 30,
	));


	// Field for team sections: title 
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'text',
			'settings'      => 'blog_section_title',
			'label'         => __( 'Head text for team section', 'maria' ),
			//'description'   => __( 'Add Head text for team section', 'maria' ),
			'default'       => __( 'Our team', 'maria' ),
			'section'       => 'blog_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Field for team sections: description
	Maria_Kirki::add_field( 'maria', array(
			'type'          => 'textarea',
			'settings'      => 'blog_section_description',
			'label'         => __( 'Head description for team section', 'maria' ),
			//'description'   => __( 'Add Head description for team section', 'maria' ),
			'default'         => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'maria' ),
			'section'       => 'blog_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);


	// Field: blog page
	Maria_Kirki::add_field( 'maria', 
			// field: page
			'blog_page' => array(
					'type'        => 'dropdown-pages',
					//'label'       => esc_attr__( 'Display text for section', 'maria' ),
					'description' => esc_attr__( 'Select blog page', 'maria' ),
					'default'     => 0,
					'sanitize_callback' => 'absint'
			)
		)
	);
	

	Maria_Kirki::add_field( 'theme_config_id', array(
		'type'        => 'number',
		'settings'    => 'my_setting',
		'label'       => esc_attr__( 'This is the label', 'textdomain' ),
		'section'     => 'section_id',
		'default'     => 42,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		),
	) );
}
function maria_customize_register( $wp_customize ) {
	
	
	/*
	 * Theme colors using Customizer Custom Controls, 
	 * @link https://github.com/bueltge/Wordpress-Theme-Customizer-Custom-Controls
	 *
	 */
	require_once dirname(__FILE__) . '/class-category_dropdown_custom_control.php';
	require_once dirname(__FILE__) . '/class-palette_custom_control.php';
	
	
	// Add controls to existing Header Textcolor section
	$wp_customize->remove_control('header_textcolor'); // remove existing Headline color setting
	$wp_customize->add_setting(
		'maria_theme_color', array(
			'default' => 'blue',
			'sanitize_callback'	=> 'maria_sanitize_colors'

		)
	);
	
	$wp_customize->add_control(
		new Palette_Custom_Control(
			$wp_customize, 'maria_theme_color', array(
				'label' => __( 'Theme color', 'maria' ),
				'section' => 'colors',
				'settings' => 'maria_theme_color',
			)
		)
	);    
   
}
add_action( 'init', 'maria_kirki_customize_register' );
add_action( 'customize_register', 'maria_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maria_customize_preview_js() {
	wp_enqueue_script( 'maria_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170714', true );
}

/* Validate user input */
get_template_part('inc/customizer-sanitize'); 
