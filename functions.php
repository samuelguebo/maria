<?php
/*
================================================================================================
Iam functions and definitions
================================================================================================
@package        Iam
@link           https://developer.wordpress.org/themes/basics/theme-functions/
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/

if ( ! function_exists( 'iam_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function iam_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Iam, use a find and replace
	 * to change 'iam' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'iam', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-thumb', 370,210, array( 'center', 'top' ) );
    add_image_size( 'single-thumb', 770,330, array( 'center', 'top' ) );
    add_image_size( 'slider-cover', 1100,400, array( 'center', 'top' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'iam' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );



	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'iam_setup' );

/**
 * Recommend the Kirki plugin
 */
require get_template_directory() . '/inc/include-kirki.php';
/**
 * Load the Kirki Fallback class
 * Making sure that output works when Kirki is not installed
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iam_widgets_init() {
    register_sidebar( array(
		'name'          => esc_html__( 'Home sidebar', 'iam' ),
		'id'            => 'sidebar-home',
		'description'   => esc_html__( 'Add widgets here.', 'iam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Single sidebar', 'iam' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Add widgets here.', 'iam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    
    
    register_sidebar( array(
		'name'          => esc_html__( 'Banner top', 'iam' ),
		'id'            => 'banner-top',
		'description'   => esc_html__( 'Add the top banner ici.', 'iam' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'iam' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'iam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s large-4 small-up-4 columns widget left">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'iam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function iam_scripts() {
    
    // Google fonts
    wp_enqueue_style( 'iam-google-fonts', 'http://fonts.googleapis.com/css?family=Roboto:500|', false ); 


    // CSS
	wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.min.css' );
	wp_enqueue_style( 'foundation-css', get_template_directory_uri().'/css/foundation.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );
	wp_enqueue_style( 'motion-ui', 'https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.css' );
	wp_enqueue_style( 'slick-slider', get_template_directory_uri().'/css/slick.css');
    
    $style = "style";
    if(""!=get_theme_mod('iam_theme_color')){
        $color = get_theme_mod('iam_theme_color');
        $style = 'style-'.$color;
    } 
	wp_enqueue_style( 'iam-style', get_template_directory_uri().'/css/'.$style.'.css' );
    
    // JS
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizer', get_template_directory_uri().'/js/modernizr.min.js', true);
	wp_enqueue_script( 'foundation-js', get_template_directory_uri().'/js/foundation.min.js', true);
	wp_enqueue_script( 'scroll-reveal', get_template_directory_uri().'/js/scrollreveal.min.js', true);
	wp_enqueue_script( 'slick-slider', get_template_directory_uri().'/js/slick.min.js','1.6.0', true);
	wp_enqueue_script( 'main-scripts', get_template_directory_uri().'/js/scripts.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function iam_admin_js($hook) {
    /*
    if ( 'customize.php' != $hook ) {
        return;
    }
    */
    wp_enqueue_script( 'iam_admin_js', get_template_directory_uri() . '/js/admin.js' );

}
add_action( 'wp_enqueue_scripts', 'iam_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
