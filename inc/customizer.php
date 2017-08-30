<?php
/*
================================================================================================
Iam Theme Customizer
================================================================================================
@package        Iam
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
    Iam_Kirki::add_config( 'iam', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    
    // Create a repeater section for slider settings
    Iam_Kirki::add_section('slider_section', array(
		'title' => __('Sliders', 'iam'),
		'priority' => 10,
	));

    Iam_Kirki::add_field( 'iam', array(
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
                )
            )
        )
    );
        
    
   
    
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
