<?php
/*
================================================================================================
Template part for displaying a slide item in the Slider loop
================================================================================================
@package        Iam
@link https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/


?>
<section class="post-item">
	
    <?php echo get_the_post_thumbnail( $post['slide_page'], 'slider-cover', array('class'=>'responsive delay'));?>
        <div class="slider-caption post-item-caption">
            <div class="panel">
                <h4 class="post-item-description"><?php echo $post['slide_title'];?></h4>
                <h2 class="post-item-title"><?php echo $post['slide_description'];?></h2>
				<h3><a href="<?php echo get_the_permalink($post['slide_page']);?>" class="button radius">
					<?php _e('Read more','iam')?>
				</a>
                <h3>
            </div>
        </div>
    <div class="clearfix"></div>
</section> 