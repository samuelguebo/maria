<?php
/*
================================================================================================
The template for displaying the social menu items
================================================================================================
@package        Maria
@link 			https://aristath.github.io/kirki/docs/controls/repeater.html
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>

<?php $socials = Maria_Kirki::get_option( 'social_repeater' );
if (is_array($socials)): //make sure the icons list is not empty ?> 
	<ul class="right">
		<?php foreach ($socials as $social) :?>
			<li class="reveal">
				<a href="<?php echo $social['social_url']; ?>" alt="<?php echo $social['social_title']; ?>"></a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>