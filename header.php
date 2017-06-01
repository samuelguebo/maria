<?php
/*
================================================================================================
The header for our theme. This is the template that displays all of the <head> section 
and everything up until <div id="content">
================================================================================================

@link           https://developer.wordpress.org/themes/basics/template-files/#template-partials
@package        Iam
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/

?><!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php 
    if( false === get_option( 'site_icon', false ) ) {
        // Show favicon
        wp_site_icon(); 
    }
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section id ="boxed-wrapper">
        <section class= "fixed-header">
            <header class="background-white main-row">
                <div class="row clearfix">
                    <?php if(has_custom_logo()):?>
                    <div class="large-2 medium-8 small-8 columns logo">
                        <a href="<?php echo site_url(); ?>">  
                            <?php the_custom_logo();?>
                        </a>
                    </div>
                    <?php else:?>
                    <div class="large-2 medium-8 small-8 columns columns">
                        <h2 class="site-title">
                            <a href="<?php echo site_url(); ?>"><?php bloginfo('title'); ?></a>
                        </h2>
                    </div>
                    <?php endif;?>

                    <div class="nav-wrapper large-8 medium-4 small-4 columns">
                        <?php get_template_part('menu'); ?>
                    </div><!--/nav-wrapper-->   
                    <div class="large-2 medium-2 columns right">
                        <?php get_template_part('menu-social'); ?>
                    </div><!--/social icons-->   
                </div>
            </header>
        </section>