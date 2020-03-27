<?php
/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings class.
 */
class Global_Balkan_Top_Header_Settings {

	/**
	 * The single instance of Global_Balkan_Top_Header_Settings.
	 *
	 * @var     object
	 * @access  private
	 * @since   1.0.0
	 */
	private static $_instance = null; //phpcs:ignore

	/**
	 * The main plugin object.
	 *
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $parent = null;

	/**
	 * Prefix for plugin settings.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $base = '';

	/**
	 * Available settings for plugin.
	 *
	 * @var     array
	 * @access  public
	 * @since   1.0.0
	 */
	public $settings = array();

	/**
	 * Constructor function.
	 *
	 * @param object $parent Parent object.
	 */
	public function __construct( $parent ) {
		$this->parent = $parent;

		$this->base = 'wpt_';

		// Initialise settings.
		add_action( 'init', array( $this, 'init_settings' ), 11 );

		// Register plugin settings.
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		// Add settings page to menu.
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );

		// Add settings link to plugins page.
		add_filter(
			'plugin_action_links_' . plugin_basename( $this->parent->file ),
			array(
				$this,
				'add_settings_link',
			)
		);

		// Configure placement of plugin settings page. See readme for implementation.
		add_filter( $this->base . 'menu_settings', array( $this, 'configure_settings' ) );
	}

	/**
	 * Initialise settings
	 *
	 * @return void
	 */
	public function init_settings() {
		$this->settings = $this->settings_fields();
	}

	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item() {

		$args = $this->menu_settings();

		// Do nothing if wrong location key is set.
		if ( is_array( $args ) && isset( $args['location'] ) && function_exists( 'add_' . $args['location'] . '_page' ) ) {
			switch ( $args['location'] ) {
				case 'options':
				case 'submenu':
					$page = add_submenu_page( $args['parent_slug'], $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
					break;
				case 'menu':
					$page = add_menu_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'], $args['icon_url'], $args['position'] );
					break;
				default:
					return;
			}
			add_action( 'admin_print_styles-' . $page, array( $this, 'settings_assets' ) );
		}
	}

	/**
	 * Prepare default settings page arguments
	 *
	 * @return mixed|void
	 */
	private function menu_settings() {
		return apply_filters(
			$this->base . 'menu_settings',
			array(
				'location'    => 'options', // Possible settings: options, menu, submenu.
				'parent_slug' => 'options-general.php',
				'page_title'  => __( 'Plugin Settings', 'global-balkan-top-header' ),
				'menu_title'  => __( 'Plugin Settings', 'global-balkan-top-header' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $this->parent->_token . '_settings',
				'function'    => array( $this, 'settings_page' ),
				'icon_url'    => '',
				'position'    => null,
			)
		);
	}

	/**
	 * Container for settings page arguments
	 *
	 * @param array $settings Settings array.
	 *
	 * @return array
	 */
	public function configure_settings( $settings = array() ) {
		return $settings;
	}

	/**
	 * Load settings JS & CSS
	 *
	 * @return void
	 */
	public function settings_assets() {

		// We're including the farbtastic script & styles here because they're needed for the colour picker
		// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the wpt-admin-js script below.
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );

		// We're including the WP media scripts here because they're needed for the image upload field.
		// If you're not including an image upload then you can leave this function call out.
		wp_enqueue_media();

		wp_register_script( $this->parent->_token . '-settings-js', $this->parent->assets_url . 'js/settings' . $this->parent->script_suffix . '.js', array( 'farbtastic', 'jquery' ), '1.0.0', true );
		wp_enqueue_script( $this->parent->_token . '-settings-js' );
	}

	/**
	 * Add settings link to plugin list table
	 *
	 * @param  array $links Existing links.
	 * @return array        Modified links.
	 */
	public function add_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=' . $this->parent->_token . '_settings">' . __( 'Settings', 'global-balkan-top-header' ) . '</a>';
		array_push( $links, $settings_link );
		return $links;
	}

	/**
	 * Build settings fields
	 *
	 * @return array Fields to be displayed on settings page
	 */
	private function settings_fields() {

		$settings['standard'] = array(
			'title'       => __( 'Standard', 'global-balkan-top-header' ),
			'description' => __( 'These are fairly standard form input fields.', 'global-balkan-top-header' ),
			'fields'      => array(
				array(
					'id'          => 'text_field',
					'label'       => __( 'Some Text', 'global-balkan-top-header' ),
					'description' => __( 'This is a standard text field.', 'global-balkan-top-header' ),
					'type'        => 'text',
					'default'     => '',
					'placeholder' => __( 'Placeholder text', 'global-balkan-top-header' ),
				),
				array(
					'id'          => 'password_field',
					'label'       => __( 'A Password', 'global-balkan-top-header' ),
					'description' => __( 'This is a standard password field.', 'global-balkan-top-header' ),
					'type'        => 'password',
					'default'     => '',
					'placeholder' => __( 'Placeholder text', 'global-balkan-top-header' ),
				),
				array(
					'id'          => 'secret_text_field',
					'label'       => __( 'Some Secret Text', 'global-balkan-top-header' ),
					'description' => __( 'This is a secret text field - any data saved here will not be displayed after the page has reloaded, but it will be saved.', 'global-balkan-top-header' ),
					'type'        => 'text_secret',
					'default'     => '',
					'placeholder' => __( 'Placeholder text', 'global-balkan-top-header' ),
				),
				array(
					'id'          => 'text_block',
					'label'       => __( 'A Text Block', 'global-balkan-top-header' ),
					'description' => __( 'This is a standard text area.', 'global-balkan-top-header' ),
					'type'        => 'textarea',
					'default'     => '',
					'placeholder' => __( 'Placeholder text for this textarea', 'global-balkan-top-header' ),
				),
				array(
					'id'          => 'single_checkbox',
					'label'       => __( 'An Option', 'global-balkan-top-header' ),
					'description' => __( 'A standard checkbox - if you save this option as checked then it will store the option as \'on\', otherwise it will be an empty string.', 'global-balkan-top-header' ),
					'type'        => 'checkbox',
					'default'     => '',
				),
				array(
					'id'          => 'select_box',
					'label'       => __( 'A Select Box', 'global-balkan-top-header' ),
					'description' => __( 'A standard select box.', 'global-balkan-top-header' ),
					'type'        => 'select',
					'options'     => array(
						'drupal'    => 'Drupal',
						'joomla'    => 'Joomla',
						'wordpress' => 'WordPress',
					),
					'default'     => 'wordpress',
				),
				array(
					'id'          => 'radio_buttons',
					'label'       => __( 'Some Options', 'global-balkan-top-header' ),
					'description' => __( 'A standard set of radio buttons.', 'global-balkan-top-header' ),
					'type'        => 'radio',
					'options'     => array(
						'superman' => 'Superman',
						'batman'   => 'Batman',
						'ironman'  => 'Iron Man',
					),
					'default'     => 'batman',
				),
				array(
					'id'          => 'multiple_checkboxes',
					'label'       => __( 'Some Items', 'global-balkan-top-header' ),
					'description' => __( 'You can select multiple items and they will be stored as an array.', 'global-balkan-top-header' ),
					'type'        => 'checkbox_multi',
					'options'     => array(
						'square'    => 'Square',
						'circle'    => 'Circle',
						'rectangle' => 'Rectangle',
						'triangle'  => 'Triangle',
					),
					'default'     => array( 'circle', 'triangle' ),
				),
			),
		);

		$settings['extra'] = array(
			'title'       => __( 'Extra', 'global-balkan-top-header' ),
			'description' => __( 'These are some extra input fields that maybe aren\'t as common as the others.', 'global-balkan-top-header' ),
			'fields'      => array(
				array(
					'id'          => 'number_field',
					'label'       => __( 'A Number', 'global-balkan-top-header' ),
					'description' => __( 'This is a standard number field - if this field contains anything other than numbers then the form will not be submitted.', 'global-balkan-top-header' ),
					'type'        => 'number',
					'default'     => '',
					'placeholder' => __( '42', 'global-balkan-top-header' ),
				),
				array(
					'id'          => 'colour_picker',
					'label'       => __( 'Pick a colour', 'global-balkan-top-header' ),
					'description' => __( 'This uses WordPress\' built-in colour picker - the option is stored as the colour\'s hex code.', 'global-balkan-top-header' ),
					'type'        => 'color',
					'default'     => '#21759B',
				),
				array(
					'id'          => 'an_image',
					'label'       => __( 'An Image', 'global-balkan-top-header' ),
					'description' => __( 'This will upload an image to your media library and store the attachment ID in the option field. Once you have uploaded an imge the thumbnail will display above these buttons.', 'global-balkan-top-header' ),
					'type'        => 'image',
					'default'     => '',
					'placeholder' => '',
				),
				array(
					'id'          => 'multi_select_box',
					'label'       => __( 'A Multi-Select Box', 'global-balkan-top-header' ),
					'description' => __( 'A standard multi-select box - the saved data is stored as an array.', 'global-balkan-top-header' ),
					'type'        => 'select_multi',
					'options'     => array(
						'linux'   => 'Linux',
						'mac'     => 'Mac',
						'windows' => 'Windows',
					),
					'default'     => array( 'linux' ),
				),
			),
		);

		$settings = apply_filters( $this->parent->_token . '_settings_fields', $settings );

		return $settings;
	}

	/**
	 * Register plugin settings
	 *
	 * @return void
	 */
	public function register_settings() {
		if ( is_array( $this->settings ) ) {

			// Check posted/selected tab.
			//phpcs:disable
			$current_section = '';
			if ( isset( $_POST['tab'] ) && $_POST['tab'] ) {
				$current_section = $_POST['tab'];
			} else {
				if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
					$current_section = $_GET['tab'];
				}
			}
			//phpcs:enable

			foreach ( $this->settings as $section => $data ) {

				if ( $current_section && $current_section !== $section ) {
					continue;
				}

				// Add section to page.
				add_settings_section( $section, $data['title'], array( $this, 'settings_section' ), $this->parent->_token . '_settings' );

				foreach ( $data['fields'] as $field ) {

					// Validation callback for field.
					$validation = '';
					if ( isset( $field['callback'] ) ) {
						$validation = $field['callback'];
					}

					// Register field.
					$option_name = $this->base . $field['id'];
					register_setting( $this->parent->_token . '_settings', $option_name, $validation );

					// Add field to page.
					add_settings_field(
						$field['id'],
						$field['label'],
						array( $this->parent->admin, 'display_field' ),
						$this->parent->_token . '_settings',
						$section,
						array(
							'field'  => $field,
							'prefix' => $this->base,
						)
					);
				}

				if ( ! $current_section ) {
					break;
				}
			}
		}
	}

	/**
	 * Settings section.
	 *
	 * @param array $section Array of section ids.
	 * @return void
	 */
	public function settings_section( $section ) {
		$html = '<p> ' . $this->settings[ $section['id'] ]['description'] . '</p>' . "\n";
		echo $html; //phpcs:ignore
	}

	/**
	 * Load settings page content.
	 *
	 * @return void
	 */
	public function settings_page() {

		// Build page HTML.
		$html      = '<div class="wrap" id="' . $this->parent->_token . '_settings">' . "\n";
			$html .= '<h2>' . __( 'Plugin Settings', 'global-balkan-top-header' ) . '</h2>' . "\n";

			$tab = '';
		//phpcs:disable
		if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
			$tab .= $_GET['tab'];
		}
		//phpcs:enable

		// Show page tabs.
		if ( is_array( $this->settings ) && 1 < count( $this->settings ) ) {

			$html .= '<h2 class="nav-tab-wrapper">' . "\n";

			$c = 0;
			foreach ( $this->settings as $section => $data ) {

				// Set tab class.
				$class = 'nav-tab';
				if ( ! isset( $_GET['tab'] ) ) { //phpcs:ignore
					if ( 0 === $c ) {
						$class .= ' nav-tab-active';
					}
				} else {
					if ( isset( $_GET['tab'] ) && $section == $_GET['tab'] ) { //phpcs:ignore
						$class .= ' nav-tab-active';
					}
				}

				// Set tab link.
				$tab_link = add_query_arg( array( 'tab' => $section ) );
				if ( isset( $_GET['settings-updated'] ) ) { //phpcs:ignore
					$tab_link = remove_query_arg( 'settings-updated', $tab_link );
				}

				// Output tab.
				$html .= '<a href="' . $tab_link . '" class="' . esc_attr( $class ) . '">' . esc_html( $data['title'] ) . '</a>' . "\n";

				++$c;
			}

			$html .= '</h2>' . "\n";
		}

			$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

				// Get settings fields.
				ob_start();
				settings_fields( $this->parent->_token . '_settings' );
				do_settings_sections( $this->parent->_token . '_settings' );
				$html .= ob_get_clean();

				$html     .= '<p class="submit">' . "\n";
					$html .= '<input type="hidden" name="tab" value="' . esc_attr( $tab ) . '" />' . "\n";
					$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr( __( 'Save Settings', 'global-balkan-top-header' ) ) . '" />' . "\n";
				$html     .= '</p>' . "\n";
			$html         .= '</form>' . "\n";
		$html             .= '</div>' . "\n";

		echo $html; //phpcs:ignore
	}

	/**
	 * Main Global_Balkan_Top_Header_Settings Instance
	 *
	 * Ensures only one instance of Global_Balkan_Top_Header_Settings is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Global_Balkan_Top_Header()
	 * @param object $parent Object instance.
	 * @return object Global_Balkan_Top_Header_Settings instance
	 */
	public static function instance( $parent ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}
		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Cloning of Global_Balkan_Top_Header_API is forbidden.' ) ), esc_attr( $this->parent->_version ) );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html( __( 'Unserializing instances of Global_Balkan_Top_Header_API is forbidden.' ) ), esc_attr( $this->parent->_version ) );
	} // End __wakeup()

}
