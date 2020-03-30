<?php
/**
 * Plugin Name: Global Balkan Top Header
 * Version: 1.0.6
 * Plugin URI: https://github.com/xhevatziberi/wp-global-balkan-top-header
 * Description: A plugin to display a top header for all Global Balkan sites.
 * Author: Xhevat Ziberi
 * Author URI: https://github.com/xhevatziberi
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: global-balkan-top-header
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Xhevat Ziberi
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Load plugin class files.
require_once 'includes/class-global-balkan-top-header.php';
require_once 'includes/class-global-balkan-top-header-settings.php';

// Load plugin libraries.
require_once 'includes/lib/class-global-balkan-top-header-admin-api.php';
require_once 'includes/lib/class-global-balkan-top-header-post-type.php';
require_once 'includes/lib/class-global-balkan-top-header-taxonomy.php';

/**
 * Returns the main instance of Global_Balkan_Top_Header to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Global_Balkan_Top_Header
 */
function global_balkan_top_header() {
	$instance = Global_Balkan_Top_Header::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Global_Balkan_Top_Header_Settings::instance( $instance );
	}

	return $instance;
}

global_balkan_top_header();

function icl_other_languages(){
	if ( function_exists('icl_object_id') ) {
			$languages = icl_get_languages('skip_missing=1');
			if(1 < count($languages)){
			echo '<ul class="dropdown-menu" role="menu">';
			foreach($languages as $l){
				if(!$l['active']) $langs[] = '<li><a href="'.$l['url'].'">'.fix_lang_code( $l['language_code'] ).'</a></li>';
			}
			echo join(' ', $langs);
			echo '</ul>';
			}
	} else {
		 echo ''; //no other langs
	}
}

function fix_lang_code($code) {
  switch ($code) {
    case 'sq':
      $code = 'al';
      break;
    default:
      $code = $code;
      break;
  }
  return $code;
}

function get_lang_code($value='') {
	if ( function_exists('icl_object_id') ) {
		return ICL_LANGUAGE_CODE;
	} else {
		return ''; //no lang code
	}
}

// Add some text after the header
add_action ('wp_head' , 'add_header', 20);
function add_header() {
	$instance = Global_Balkan_Top_Header::instance( __FILE__, '1.0.0' );
  // Echo the html
  //echo "<div>Special offer! June only: Free chocolate for everyone!</div>";
	include_once( 'template.php' );
}


/*updater*/
add_action( 'init', 'github_plugin_updater_test_init' );
function github_plugin_updater_test_init() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'wp-global-balkan-top-header-master',
			'api_url' => 'https://api.github.com/repos/xhevatziberi/wp-global-balkan-top-header',
			'raw_url' => 'https://raw.github.com/xhevatziberi/wp-global-balkan-top-header/master',
			'github_url' => 'https://github.com/xhevatziberi/wp-global-balkan-top-header',
			'zip_url' => 'https://github.com/xhevatziberi/wp-global-balkan-top-header/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.md',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}

/*updater 2*/
/*require 'path/to/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://example.com/path/to/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'unique-plugin-or-theme-slug'
);*/
