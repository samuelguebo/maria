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
$blog_section_title = Maria_Kirki::get_option( 'blog_section_title');
$blog_section_description = Maria_Kirki::get_option( 'blog_section_description');
$blog_post_number = Maria_Kirki::get_option( 'blog_post_number');
?>
<section class="row main-row clearfix white-section">
			<section class="columns main-column white-section-intro large-8 small-12 large-centered columns clearfix">
				<h2 class="section-title"><?php echo $blog_section_title; ?></h2>
				<p class="section-description"><?php echo $blog_section_description; ?></p>
				<div class="bottom-line large-1 small-1 large-centered columns clearfix"></div>
			</section><!--section description/-->
			<section class="columns main-column">
				<div class="post-list clearfix">
					<?php
						if ( have_posts() ) :
							/* Start the Loop */
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // for pagination purpose
							while ( have_posts() ) : the_post();

								if(has_post_thumbnail()){
									maria_get_template_part('template-parts/content-article.php', 'large-6 medium-6 small-12', 'post-thumb');
								}else {
									maria_get_template_part('template-parts/content-article-without-thumb.php', 'large-6 medium-6 small-12', 'post-thumb');
								}

							endwhile;

						else :

							get_template_part( 'template-parts/content', '404' );

						endif; ?>
				</div>
			</section>
</section>
