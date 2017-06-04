<?php
/*
================================================================================================
Template part for displaying the white section
================================================================================================
@package        Iam
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$solution_section_title = Iam_Kirki::get_option( 'solution_section_title');
$solution_section_description = Iam_Kirki::get_option( 'solution_section_description');
$solutions = Iam_Kirki::get_option( 'solution_repeater');
?>
<section class="row main-row clearfix white-section">
			<section class="columns main-column white-section-intro">
				<h5 class="section-solution-title"><?php iam_highlight_first_word($solution_section_title); ?></h5>
				<p class="section-solution-description"><?php echo $solution_section_description; ?></p>
			</section><!--section description/-->
			<?php if(is_array($solutions)): //make sure array is not empty ?>
				<section class="columns main-column">
					<?php foreach ($solutions as $solution): // loop through array?>
							<div class="small-6 medium-3 large-3 columns solution">
								<a href="<?php the_permalink($solution['solution_page']);?>" title="<?php echo $solution['solution_title'];?>">
									<h2 class="solution-icon">
										<i class="fa fa-<?php echo $solution['solution_icon'] ?>"></i>
									</h2>
									<h5 class="solution-title"><?php echo $solution['solution_title'] ?></h5>
									<p class="solution-description"><?php echo $solution['solution_description'] ?>
									</p>
								</a>
							</div>
					<?php endforeach;?>
				</section>
			<?php endif;?>
</section>
