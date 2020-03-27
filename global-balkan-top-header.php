<?php
/**
 * Plugin Name: Global Balkan Top Header
 * Version: 1.0.1
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: global-balkan-top-header
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once('updater.php');
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
	$config = array(
		'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
		'proper_folder_name' => 'wp-global-balkan-top-header-master', // this is the name of the folder your plugin lives in
		'api_url' => 'https://api.github.com/repos/xhevatziberi/wp-global-balkan-top-header', // the GitHub API url of your GitHub repo
		'raw_url' => 'https://raw.github.com/xhevatziberi/wp-global-balkan-top-header/master', // the GitHub raw url of your GitHub repo
		'github_url' => 'https://github.com/xhevatziberi/wp-global-balkan-top-header', // the GitHub url of your GitHub repo
		'zip_url' => 'https://github.com/xhevatziberi/wp-global-balkan-top-header/zipball/master', // the zip url of the GitHub repo
		'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
		'requires' => '3.0', // which version of WordPress does your plugin require?
		'tested' => '3.3', // which version of WordPress is your plugin tested up to?
		'readme' => 'README.md', // which file to use as the readme for the version number
		'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
	);
	new WP_GitHub_Updater($config);
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

function icl_other_languagess(){
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
		 echo 'no other langs';
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
		return 'no lang code';
	}
}

// Add some text after the header
add_action ('wp_head' , 'add_header', 20);
function add_header() {
	$instance = Global_Top_Header::instance( __FILE__, '1.0.0' );
  // Echo the html
  echo "<div>Special offer! June only: Free chocolate for everyone!</div>";
	include_once( 'template.php' );
}
