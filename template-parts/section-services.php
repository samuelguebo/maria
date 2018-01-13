<?php
/*
================================================================================================
Template part for displaying services section
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$service_section_title = Maria_Kirki::get_option( 'services_section_title');
$service_section_description = Maria_Kirki::get_option( 'services_section_description');
$services = Maria_Kirki::get_option( 'services_repeater');
?>
<section class="row main-row clearfix white-section large-7 small-8 large-centered columns">
			<section class="columns main-column white-section-intro">
				<h3 class="section-title"><?php echo $service_section_title; ?></h3>
				<p class="section-description"><?php echo $service_section_description; ?></p>
			</section><!--section description/-->
			<?php if(is_array($services)): //make sure array is not empty ?>
				<section class="columns main-column">
					<?php foreach ($services as $service): // loop through array?>
							<div class="small-6 medium-3 large-3 columns section-item">
								<a href="<?php the_permalink($service['service_page']);?>" title="<?php echo $service['service_title'];?>">
									<h2 class="service-icon">
										<i class="fa fa-<?php echo $service['service_icon'] ?>"></i>
									</h2>
									<h5 class="item-title"><?php echo $service['service_title'] ?></h5>
									<p class="item-description"><?php echo $service['service_description'] ?>
									</p>
								</a>
							</div>
					<?php endforeach;?>
				</section>
			<?php endif;?>
</section>
