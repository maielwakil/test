<?php
/** Create A Simple Theme Options Panel**/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( ' Options', 'text-domain' ),
				esc_html__( 'Theme Options', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {
				
				// address
				if ( ! empty( $options['input_address'] ) ) {
					$options['input_address'] = sanitize_text_field( $options['input_address'] );
				} else {
					unset( $options['input_address'] ); // Remove from options if empty
                }
                // phone
				if ( ! empty( $options['input_phone'] ) ) {
					$options['input_phone'] = sanitize_text_field( $options['input_phone'] );
				} else {
					unset( $options['input_phone'] ); // Remove from options if empty
                }
                 // facebook
				if ( ! empty( $options['input_facebook'] ) ) {
					$options['input_facebook'] = sanitize_text_field( $options['input_facebook'] );
				} else {
					unset( $options['input_facebook'] ); // Remove from options if empty
                }
                 // youtube
				if ( ! empty( $options['input_youtube'] ) ) {
					$options['input_youtube'] = sanitize_text_field( $options['input_youtube'] );
				} else {
					unset( $options['input_youtube'] ); // Remove from options if empty
                }
                 // whatsapp
				if ( ! empty( $options['input_whatsapp'] ) ) {
					$options['input_whatsapp'] = sanitize_text_field( $options['input_whatsapp'] );
				} else {
					unset( $options['input_whatsapp'] ); // Remove from options if empty
                }
                 // linkedin-in
				if ( ! empty( $options['input_linkedin-in'] ) ) {
					$options['input_linkedin-in'] = sanitize_text_field( $options['input_linkedin-in'] );
				} else {
					unset( $options['input_linkedin-in'] ); // Remove from options if empty
                }
                 // twitter
				if ( ! empty( $options['input_twitter'] ) ) {
					$options['input_twitter'] = sanitize_text_field( $options['input_twitter'] );
				} else {
					unset( $options['input_twitter'] ); // Remove from options if empty
                }
                 // instagram
				if ( ! empty( $options['input_instagram'] ) ) {
					$options['input_instagram'] = sanitize_text_field( $options['input_instagram'] );
				} else {
					unset( $options['input_instagram'] ); // Remove from options if empty
				}
				 // copyright
				 if ( ! empty( $options['input_copyright'] ) ) {
					$options['input_copyright'] = sanitize_text_field( $options['input_copyright'] );
				} else {
					unset( $options['input_copyright'] ); // Remove from options if empty
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">				
				<h1><?php esc_html_e( 'Theme  Options', 'text-domain' ); ?></h1>
				<form method="post" action="options.php">
				<?php settings_fields( 'theme_options' ); ?>
				<style>
					.tab-content .form-table td {
						width: 85%;
						text-align: right;
					}
					.tab-content .form-table th{
						text-align: right;
					}
					input[type="text"] {
						width: 90%;
						text-align: right;
					}
					ul#menu {
						text-align: center;
						list-style-type: none;
						margin: 0;
						padding: 0;
						overflow: hidden;						
						display: block;
					}
					#menu li {
						display: inline-block;
						padding: 20px;
						border: 2px solid #0b9696;
						margin-left: 10px;
					}
					#menu li a {
						font-size: 17px;
						text-decoration-line: none;
						color: #0b9696;
					}
					.tab-content {
						display: none;
					}
					.tab-content:target {
						display: block;
					}
					.tab-content {
						z-index: 0;
						background-color: white;
						padding: 20px;
						margin: 20px auto;
					}
					.tab-content:first-child {
						z-index: 1;
					}
					.tab-content:target {
						z-index: 2;
					}
					.tab-folder > .tab-content:target ~ .tab-content:last-child, .tab-folder > .tab-content {
						display: none;
					}
					.tab-folder > :last-child, .tab-folder > .tab-content:target {
						display: block;
					}
				</style>
				<ul id="menu">
					<li><a href="#tab1">معلومات التواصل</a></li>
					<li><a href="#tab2">مواقع التواصل الاجتماعى</a></li>
					
				</ul>
				<div id="tab1" class="tab-content">
					<table class="form-table wpex-custom-admin-login-table">
						<?php // Text input?>
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_address' ); ?>
								<input type="text" name="theme_options[input_address]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Address', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_phone' ); ?>
								<input type="text" name="theme_options[input_phone]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Phone', 'text-domain' ); ?></th>
						</tr>
					</table>
				</div>
				<div id="tab2" class="tab-content">
					<table class="form-table wpex-custom-admin-login-table">
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_facebook' ); ?>
								<input type="text" name="theme_options[input_facebook]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Facebook', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_youtube' ); ?>
								<input type="text" name="theme_options[input_youtube]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Youtube', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">
							<td>
								<?php $value = self::get_theme_option( 'input_whatsapp' ); ?>
								<input type="text" name="theme_options[input_whatsapp]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Whats app', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_linkedin-in' ); ?>
								<input type="text" name="theme_options[input_linkedin-in]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Linkedin-in', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">
							<td>
								<?php $value = self::get_theme_option( 'input_twitter' ); ?>
								<input type="text" name="theme_options[input_twitter]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Twitter', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">
							<td>
								<?php $value = self::get_theme_option( 'input_instagram' ); ?>
								<input type="text" name="theme_options[input_instagram]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'Instagram', 'text-domain' ); ?></th>
						</tr>
						<tr valign="top">							
							<td>
								<?php $value = self::get_theme_option( 'input_copyright' ); ?>
								<input type="text" name="theme_options[input_copyright]" value="<?php echo esc_attr( $value ); ?>">
							</td>
							<th scope="row"><?php esc_html_e( 'copyright', 'text-domain' ); ?></th>
						</tr>
					</table>
				</div>				

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}

