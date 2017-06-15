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
function iam_customize_register( $wp_customize ) {
	
	
	/*
	 * Theme colors using Customizer Custom Controls, 
	 * @link https://github.com/bueltge/Wordpress-Theme-Customizer-Custom-Controls
	 *
	 */
	require_once dirname(__FILE__) . '/class-category_dropdown_custom_control.php';
	require_once dirname(__FILE__) . '/class-palette_custom_control.php';
	
	
	// kirki configs
	Maria_Kirki::add_config( 'iam', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	
	// Create a repeater section for slider settings
	Maria_Kirki::add_section('slider_section', array(
		'title' => __('Sliders', 'iam'),
		'priority' => 10,
	));

	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'repeater',
			'settings'      => 'slider_repeater',
			'label'         => __( 'Create a slide', 'iam' ),
			'description'   => __( 'Set up the slide, define title, description, page, etc', 'iam' ),
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
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Small upper text', 'iam' ),
					'default'           => 'Institut Africain des medias',
					'sanitize_callback' => 'sanitize_text_field'
				),
				// field: slide description
				'slide_description' => array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Big lower text', 'iam' ),
					'default'           => 'Enquêter, informer, former',
					'sanitize_callback'	=> 'sanitize_text_field'
				),
				// field: page
				'slide_page' => array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'iam' ),
						'description' => esc_attr__( 'Page of the slide', 'iam' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				),
				// field: button text
				'slide_button_text' => array(
						'type'        => 'text',
						//'label'       => esc_attr__( 'Display text for section', 'iam' ),
						'description' => esc_attr__( 'Text for the buton', 'iam' ),
						'default'     => esc_attr__( 'Read more', 'iam' ),
						'sanitize_callback' => 'sanitize_text_field'
				),
				// field: button text
				'slide_image' => array(
						'type'        => 'image',
						//'label'       => esc_attr__( 'Display text for section', 'iam' ),
						'description' => esc_attr__( 'Image of the slide', 'iam' ),
				)
			)
		)
	);
		
	// Create a new section for Expertises/ Grey
	Maria_Kirki::add_section('expertise_section', array(
		'title' => __('Expertises', 'iam'),
		'priority' => 10,
	));

	// Create field for expertise sections: title 
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'text',
			'settings'      => 'expertise_section_title',
			'label'         => __( 'Head text for expertise section', 'iam' ),
			//'description'   => __( 'Add Head text for expertise section', 'iam' ),
			'default'       => __( 'Our expertise', 'iam' ),
			'section'       => 'expertise_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Create field for expertise sections: description
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'textarea',
			'settings'      => 'expertise_section_description',
			'label'         => __( 'Head description for expertise section', 'iam' ),
			//'description'   => __( 'Add Head description for expertise section', 'iam' ),
			'default'         => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'iam' ),
			'section'       => 'expertise_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Create a repeater for expertises
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'repeater',
			'settings'      => 'expertise_repeater',
			'label'         => __( 'Create a expertise', 'iam' ),
			'description'   => __( 'Set up the slide, define title, description, page, etc', 'iam' ),
			'section'       => 'expertise_section',
			'default'       => array(),
			'priority'      => 10,
			'row_label'     => array(
				'type'      => 'field',
				'value'     => 'row',
				'field'     => 'expertise_title',
			),
			'fields' => array(
				// field: expertise_icon
				'expertise_icon'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Expertise icon class', 'iam' ),
					'default'           => 'youtube',
					'sanitize_callback' => 'sanitize_text_field'
				),
				'expertise_title'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Upper text', 'iam' ),
					'default'           => 'Institut Africain des medias',
					'sanitize_callback' => 'sanitize_text_field'
				),
				// field: expertise_description
				'expertise_description' => array(
					'type'              => 'textarea',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Lower text', 'iam' ),
					'default'           => 'Enquêter, informer, former',
					'sanitize_callback'	=> 'sanitize_text_field'
				),
				// field: page
				'expertise_page'	=> array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'iam' ),
						'description' => esc_attr__( 'Page of the expertise', 'iam' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				)
			)
		)
	);

	// Create a new section for Solutions/ White section
	Maria_Kirki::add_section('solution_section', array(
		'title' => __('Solutions', 'iam'),
		'priority' => 10,
	));

	// Create field for solution sections: title 
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'text',
			'settings'      => 'solution_section_title',
			'label'         => __( 'Head text for solution section', 'iam' ),
			//'description'   => __( 'Add Head text for solution section', 'iam' ),
			'section'       => 'solution_section',
			'default'       => __( 'Our solutions', 'iam' ),
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Create field for solution sections: description
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'textarea',
			'settings'      => 'solution_section_description',
			'label'         => __( 'Head description for solution section', 'iam' ),
			'default'         => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'iam' ),
			//'description'   => __( 'Add Head description for solution section', 'iam' ),
			'section'       => 'solution_section',
			'priority'      => 10,
			'sanitize_callback' => 'sanitize_text_field'
			)
	);
	// Create a repeater for solutions
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'repeater',
			'settings'      => 'solution_repeater',
			'label'         => __( 'Create a solution', 'iam' ),
			'description'   => __( 'Add solution items such as title, description, page, etc', 'iam' ),
			'section'       => 'solution_section',
			'default'       => array(),
			'priority'      => 10,
			'row_label'     => array(
				'type'      => 'field',
				'value'     => 'row',
				'field'     => 'solution_title',
			),
			'fields' => array(
				// field: solution_icon
				'solution_icon'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Solution icon class', 'iam' ),
					'default'           => 'youtube',
					'sanitize_callback' => 'sanitize_text_field'
				),
				'solution_title'	=> array(
					'type'              => 'text',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Upper text', 'iam' ),
					'default'           => 'Solution',
					'sanitize_callback' => 'sanitize_text_field'
				),
				// field: solution_description
				'solution_description' => array(
					'type'              => 'textarea',
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Lower text', 'iam' ),
					'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'iam' ),
					'sanitize_callback'	=> 'sanitize_text_field'
				),
				// field: page
				'solution_page'	=> array(
						'type'        => 'dropdown-pages',
						//'label'       => esc_attr__( 'Display text for section', 'iam' ),
						'description' => esc_attr__( 'Page of the solution', 'iam' ),
						'default'     => 0,
						'sanitize_callback' => 'absint'
				)
			)
		)
	);
	
	// Create a repeater section for social networks
	Maria_Kirki::add_section('social_section', array(
		'title' => __('Social medias', 'iam'),
		'priority' => 10,
	));
	// Create a repeater for socials
	Maria_Kirki::add_field( 'iam', array(
			'type'          => 'repeater',
			'settings'      => 'social_repeater',
			'label'         => __( 'Add a social media', 'iam' ),
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
					//'label'       => esc_attr__( 'Display text for section', 'iam' ),
					'description'       => esc_attr__( 'Title', 'iam' ),
					'default'           => 'Social',
					'sanitize_callback' => 'sanitize_text_field'
				),
				
				// field: social_url
				'social_url'	=> array(
						'type'        => 'text',
						'description' => esc_attr__( 'Url of the social profile or page', 'iam' ),
						'default'     => '#',
						'sanitize_callback' => 'sanitize_text_field'
				)
			)
		)
	);

	// Add controls to existing Header Textcolor section
	$wp_customize->remove_control('header_textcolor'); // remove existing Headline color setting
	$wp_customize->add_setting(
		'iam_theme_color', array(
			'default' => '',
			'sanitize_callback'	=> 'iam_sanitize_colors'

		)
	);
	
	$wp_customize->add_control(
		new Palette_Custom_Control(
			$wp_customize, 'iam_theme_color', array(
				'label' => __( 'Theme color', 'iam' ),
				'section' => 'colors',
				'settings' => 'iam_theme_color',
			)
		)
	);    
   
}

add_action( 'customize_register', 'iam_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iam_customize_preview_js() {
	wp_enqueue_script( 'iam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170714', true );
}

/* Validate user input */
get_template_part('inc/customizer-sanitize'); 
