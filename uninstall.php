<?php
/**
	* Fired when the plugin is uninstalled to cleanup data from the database
	*
	* @package Browserly
	*/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Cleanup data
global $wpdb;
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_primary_color'" );
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_custom_css'" );
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_pulltorefresh'" );
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_overscroll'" );
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_safari_notification'" );
$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'browserly_outdatedbrowser'" );
