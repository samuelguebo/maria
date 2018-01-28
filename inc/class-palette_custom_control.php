<?php
/*
================================================================================================
Customizer custom control - Color Palette
It display a 6-color palette in the theme customization panel
================================================================================================
@package        Maria
@link           https://codex.wordpress.org/Theme_Customization_API
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/
if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
 * Class to create a custom layout control
 */
class Palette_Custom_Control extends WP_Customize_Control
{
	  /**
	   * Render the content on the theme customizer page
	   */
	  public function render_content()
	   {
			?>  <style>
					#palette{
						margin-top:10px;
					}
					#palette a{
						float:left;
						margin:4px;
						width:73px;
						height:73px;
						display: block;
					}
					#palette a.selected{
						border: solid 3px #000;
						margin: 1px;
						
					}
					#palette a input[type=radio]{
						display: none;
					}
				
					#palette #navy {
						background: #2b5f9a;
					}
					#palette #blue {
						background: #0e94c9;
					}
					#palette #green {
						background: #309864;
					}
					#palette #orange {
						background: #e34a00;
					}
					#palette #yellow {
						background: #ffc200;
					}
					#palette #red {
						background: #d8052e;
					}
					
				</style>

				<label>
					  <?php
						$current_color =  esc_attr(get_theme_mod('maria_theme_color'));
						$selected_css = "class = 'selected' ";
					   ?>
				  <h1 class="customize-layout-control">
					  <?php echo esc_html( $this->label ); ?>
					</h1>
				  <div id="palette">
					  <a id="yellow" href="#" <?php if($current_color == 'yellow') echo $selected_css;?>>
						<input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> value="yellow"/>
						</a>
					  <a id="green" href="#" <?php if($current_color == 'green') echo $selected_css;?>>
						<input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> id="<?php echo $this->id; ?>" value="green"/>
					</a>
					<a id="blue" href="#" <?php if($current_color == 'blue') echo $selected_css;?>>
						<input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> id="<?php echo $this->id; ?>" value="blue" />
					</a>
					<a id="orange" href="#" <?php if($current_color == 'orange') echo $selected_css;?>>
						<input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> id="<?php echo $this->id; ?>" value="orange" />
					</a>
					<a id="red" href="#" <?php if($current_color == 'red') echo $selected_css;?> <?php if($current_color == 'red') echo $selected_css;?>>
						<input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> id="<?php echo $this->id; ?>" value="red"/>
					</a>
					<a id="navy" href="#" <?php if($current_color == 'navy') echo $selected_css;?>>
					  <input type="radio" name="<?php echo $this->id; ?>" <?php $this->link(); ?> id="<?php echo $this->id; ?>" value="navy" />
					</a>
				  </div>
				</label>
				<script>
					// Non conflict mode
				jQuery(document).ready(function ($) {
					$('div#palette a').click(function (e) {
						$(this).siblings().removeClass('selected');
						$(this).attr('class', 'selected');
						var checkbox = $(this).children('input[type=radio]');
						//checkbox.prop('checked', true);
						checkbox.attr('checked', true);
			
						var setting = checkbox.attr( 'data-customize-setting-link' );
						// Get the value of the currently-checked radio input.
						var color = checkbox.val();
						// Set the new value.
						wp.customize( setting, function( obj ) {

							obj.set( color );
						} );
								
						e.preventDefault();

					});
				});
				</script>
			<?php
	   }
}
?>