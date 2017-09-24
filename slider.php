<?php
/*
================================================================================================
The slider containing the carousel animation
================================================================================================
@package        Maria
@link           https://developer.wordpress.org/themes/basics/template-files/#template-partials
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
	<?php //starting slider loop;
	
	$sliders = Maria_Kirki::get_option( 'slider_repeater');
	if(is_array($sliders)):?>
		<!-- Slides: Images and Captions -->
		<section id="slider" class="row slider-wrapper">
			<?php
			foreach ( $sliders  as $post )  : setup_postdata( $post );
                print_r($post);
				get_template_part('template-parts/content','slide');
			endforeach; ?>
		</section>
	<?php endif; wp_reset_postdata(); $sliders = null;?>

	<!-- Javascript setting for the slider -->
	<script>
		jQuery(document).ready(function ($) {
			// Initialize Homepage slider            
			 $('.slider-wrapper').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
				swipe:true,
				pauseOnHover:true,
				swipeToSlide:true,
				arrows: true,
				fade: true            
			});
		});
	</script>