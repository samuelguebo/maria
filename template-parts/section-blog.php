<?php
/*
================================================================================================
Template part for displaying team member section
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$blog_section_title = esc_attr(Maria_Kirki::get_option( 'blog_section_title'));
$blog_section_description = esc_attr(Maria_Kirki::get_option( 'blog_section_description'));
$blog_post_number = esc_attr(Maria_Kirki::get_option( 'blog_post_number'));
?>
<section class="row main-row clearfix white-section">
			<section class="columns main-column white-section-intro large-8 small-12 large-centered columns clearfix">
				<h2 class="section-title"><?php echo $blog_section_title; ?></h2>
				<p class="section-description"><?php echo $blog_section_description; ?></p>
				<div class="bottom-line large-1 small-1 large-centered columns clearfix"></div>
			</section><!--section description/-->
</section>
<section class="post-list clearfix full-blog category-row">
	<?php
            if ( have_posts() ) :
                /* Start the Loop */
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // for pagination purpose
                $args = array(
                        'post_type' => array('post'),
                        'posts_per_page' =>$blog_post_number,
                        'paged'=>$paged
                        );
                $blog_posts = new WP_Query($args);
                while ( $blog_posts->have_posts() ) : $blog_posts->the_post();

					maria_get_template_part('template-parts/content-article-home.php', 'large-3 medium-6 small-12', 'post-thumb');

				endwhile;

				else :

					get_template_part( 'template-parts/content', '404' );

		endif; wp_reset_query();
		?>
</section>
