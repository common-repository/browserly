<?php
/**
	* Browserly
	*
	* @package Browserly
  *
  * Plugin Name: Browserly
  * Description: Easily customise the users browser, including setting the theme colour, and disabling overscroll or pull-to-refresh features.
  * Author: Browserly
  * Version: 1.2.0
  */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Fly like a Sparrow.
}

// Customizer
require plugin_dir_path( __FILE__ ) . 'inc/customizer.php';

// Get options
require plugin_dir_path( __FILE__ ) . 'inc/get-options.php';
