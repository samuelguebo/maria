<?php
/*
================================================================================================
Template part for displaying a slide item in the Slider loop
================================================================================================
@package        Maria
@link https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/


?>
<section class="post-item">
        <img src="<?php echo maria_get_thumb_by_id($post['slide_image'],'slider-cover');?>" alt="<?php echo $post['slide_title'];?>" class="responsive delay"/>
        <div class="slider-caption post-item-caption">
            <div class="panel">
                <h4 class="post-item-description"><?php echo $post['slide_title'];?></h4>
                <h2 class="post-item-title"><?php echo $post['slide_description'];?></h2>
                    
        <div class="large-7 small-8 large-centered summary columns">
            <a href="<?php echo get_permalink( $post['slide_page_1'] );?>" class="small button round navy one"><?php echo esc_attr($post['slide_button_text_1']);?></a>
            <a href="<?php echo get_permalink( $post['slide_page_2'] );?>" class="small button round navy two"><?php echo esc_attr($post['slide_button_text_2']);?></a>

        </div>
            </div>
        </div>
    <div class="clearfix"></div>
</section> 