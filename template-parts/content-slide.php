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
				<h3>
                    <a href="<?php echo get_the_permalink($post['slide_page']);?>" class="button radius">
    					<?php echo $post['slide_button_text'];?>
    				</a>
                <h3>
                    
        <div class="large-7 small-8 large-centered summary columns">
            <a href="<?php echo get_permalink( get_page_by_path( 'etudes' ) );?>" class="small button round navy"><?php _e('Etudes réalisées','alliancelab')?></a>
            <a href="<?php echo get_permalink( get_page_by_path( 'commander' ) );?>" class="small button round green right"><?php _e('Commander une étude','alliancelab')?></a>

        </div>
            </div>
        </div>
    <div class="clearfix"></div>
</section> 