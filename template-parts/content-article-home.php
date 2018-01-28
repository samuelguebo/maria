<?php
/*
================================================================================================
Template part for displaying posts on homepage
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
    

<article id="post-<?php the_ID(); ?>" class="post-item <?php echo $container_class;?> columns">
    <!--post/-->
    <div class="post-item-caption">
        <div class="post-item-image"> 
            <div class="colorful-line"> </div>
            <?php
                if ( has_post_thumbnail_or_image ()) { 
                    the_post_thumbnail( $thumbnail_size ); 
                }
            ?>

        </div>
        <div class="panel">
            <h3 class="post-item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        </div>
    </div>
</article>
