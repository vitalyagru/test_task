<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Настроить Task Test', 'sampletheme' ), __( 'Настроить Task Test', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'main' => array(
		'value' =>	'main',
		'label' => __( 'Стандартная', 'sampletheme' )
	),
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ': Настройки темы', 'sampletheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Адрес изображения в шапке', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[img_header]" class="regular-text" type="text" name="sample_theme_options[img_header]" value="<?php esc_attr_e( $options['img_header'] ); ?>" />
						<label class="description" for="sample_theme_options[img_header]"></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Изображение карты', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[map_src]" class="regular-text" type="text" name="sample_theme_options[map_src]" value="<?php esc_attr_e( $options['map_src'] ); ?>" />
						<label class="description" for="sample_theme_options[map_src]"></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Адрес кнопки слайдера', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[button_href]" class="regular-text" type="text" name="sample_theme_options[button_href]" value="<?php esc_attr_e( $options['button_href'] ); ?>" />
						<label class="description" for="sample_theme_options[button_href]"></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Текст кнопки слайдера', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[button_text]" class="regular-text" type="text" name="sample_theme_options[button_text]" value="<?php esc_attr_e( $options['button_text'] ); ?>" />
						<label class="description" for="sample_theme_options[button_text]"></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Цветовая схема', 'sampletheme' ); ?></th>
					<td>
						<select name="sample_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sample_theme_options[selectinput]"></label>
					</td>
				</tr>

				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sampletheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['img_header'] = wp_filter_nohtml_kses( $input['img_header'] );
	$input['map_src'] = wp_filter_nohtml_kses( $input['map_src'] );
	$input['button_href'] = wp_filter_nohtml_kses( $input['button_href'] );
	$input['button_text'] = wp_filter_nohtml_kses( $input['button_text'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;


	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/