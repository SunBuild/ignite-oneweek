<?php

/**
 * @package WP_ExternalMedia
 */

/*
  Plugin Name: External Media
  Description: Import files from thrid-party services (Dropbox, Box, OneDrive, Google Drive, Instagram and any remote URL).
  Version: 1.0.13
  Author: Minnur Yunusov
  Author URI: http://www.minnur.com/
  Text Domain: WP_ExternalMedia
*/

define( 'WP_ExternalMedia_PATH', dirname( __FILE__ ) );
define( 'WP_ExternalMedia_PluginName', plugin_basename( __FILE__ ) );
define( 'WP_ExternalMedia_Prefix', 'WPExternalMedia_' );
define( 'WP_ExternalMedia_Version', '1.0.13' );

if ( !class_exists( 'WP_ExternalMedia' ) ) {

  // List of plugin classes in their load order.
  $classes = array(
    'WP_ExternalPluginBase',
    'WP_ExternalUtility',
    'WP_ExternalMedia',
  );

  foreach ( $classes as $class ) {
    require_once ( sprintf( "%s/classes/%s.php", WP_ExternalMedia_PATH, $class ) );
  }

  // Instantiate the plugin class.
  $WP_ExternalMedia = new WP_ExternalMedia\WP_ExternalMedia();

  // Install and uninstall hooks.
  register_activation_hook( WP_ExternalMedia_PluginName, array( $WP_ExternalMedia, 'activate' ) );
  register_deactivation_hook( WP_ExternalMedia_PluginName, array( $WP_ExternalMedia, 'deactivate' ) );

}
