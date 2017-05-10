<?php
/*
================================================================================================
Template part for displaying they grey section
================================================================================================
@package        Bastille
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$expertise_section_title = Iam_Kirki::get_option( 'expertise_section_title');
$expertise_section_description = Iam_Kirki::get_option( '$expertise_section_description');
$expertises = Iam_Kirki::get_option( 'expertise_repeater');
?>
<section class="row main-row clearfix grey-section">
			<section class="columns main-column">
				<h2><?php echo $expertise_title; ?></h2>
				<p><?php echo $expertise_description; ?></p>
			</section><!--section description/-->
			<?php if(is_array($expertises)): //make sure array is not empty ?>
				<section class="columns main-column">
					<?php foreach ($expertises as $expertise): // loop through array?>
							<div class="small-4 medium-3 large-3 columns expertise">
								<a href"<?php echo get_the_permalink($post['expertise_page']);?>" title="<?php echo $expertise['expertise_title'] ?>">
									<h2 class="expertise-icon">
										<i class="fa <?php echo $expertise['expertise_icon'] ?>"></i>
									</h2>
									<h5 class="expertise-title"><?php echo $expertise['expertise_title'] ?></h5>
									<span><?php echo $expertise['expertise_description'] ?></span>
								</a>
							</div>
					<?php endforeach;?>
				</section>
			<?php endif;?>
</section>
<?php endif; 	