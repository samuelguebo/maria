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
<section class="row main-row clearfix white-section">
			<section class="columns main-column white-section-intro large-8 small-8 large-centered columns clearfix">
				<h2 class="section-title"><?php echo $service_section_title; ?></h2>
				<p class="section-description"><?php echo $service_section_description; ?></p>
                <div class="bottom-line large-1 small-1 large-centered columns clearfix"></div>
			</section><!--section description/-->
			<?php if(is_array($services)): //make sure array is not empty ?>
				<section class="columns main-column">
					<?php foreach ($services as $service): // loop through array?>
							<div class="small-12 medium-6 large-4 columns section-item">
								<?php
                                $service_image_id = maria_get_attachment_id_from_src( $service['service_image'] );
                                $service_thumb = maria_get_thumb_by_id ($service_image_id, 'post_thumb');
	
                                ?>
									<div class="post-item-caption">
                                        <div class="post-item-image"> 
                                            <img src="<?php echo maria_get_thumb_by_id($service['service_image'],'post-thumb');?>" alt="<?php echo $service['service_title'];?>" class="responsive delay"/>

                                        </div>
                                    </div>
                                    <div class="content">
                                        <h4 class="item-title"><?php echo $service['service_title'] ?></h4>
                                        <p class="item-description"><?php echo $service['service_description'] ?>
                                        </p>

                                        <a href="<?php the_permalink($service['service_page']);?>" title="<?php echo $service['service_title'];?>" class="item-link">
                                        <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
							</div>
					<?php endforeach;?>
				</section>
			<?php endif;?>
</section>
