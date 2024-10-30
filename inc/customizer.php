<?php
/**
	* Customizer
	*
	* @package Browserly
	*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Fly like a Sparrow.
}

function browserly_customize_register( $wp_customize ) {

  $wp_customize->add_panel( 'browserly', array(
    'title'          => 'Browserly', 'browserly',
    'priority' => 180,
  ) );

  // add theme section
	$wp_customize->add_section( 'browserly_theme', array(
		'title' => __( 'Theme Colour', 'browserly' ),
		'description' => __( 'Allow your branding to flow throughout the users browser on mobile devices, by adjusting the theme colour of the address and notifications bar. <br><br>This applies to Chrome, Firefox, Opera, and Windows mobile devices. ' ),
		'priority' => 10,
    'panel' => 'browserly',
	) );

  // primary color setting
	$wp_customize->add_setting( 'browserly_primary_color', array(
      'type' => 'option',
      'capability' => 'manage_options',
      'default' => '#FF595E',
      'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
  ) );

  // primary color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'browserly_primary_color', array(
		'section' => 'browserly_theme',
		'settings' => 'browserly_primary_color',
	) ) );

  // Safari setting
  $wp_customize->add_setting( 'browserly_safari_notification' , array(
    'type' => 'option',
    'capability' => 'manage_options',
    'sanitize_callback' => 'browserly_sanitize_checkbox'
  ) );

  // Safari control
  $wp_customize->add_control( 'browserly_safari_notification', array(
    'label' => 'Enable transparent notification bar in Safari', 'browserly',
    'description' => __( 'Safari doesn\'t support a theme colour, but it does allow you to make the notification bar transparent' ),
    'type' => 'checkbox',
    'default'    => '0',
    'section' => 'browserly_theme',
  ) );

  // add scroll effects section
  $wp_customize->add_section( 'browserly_scroll_effects', array(
    'title' => __( 'Scroll Effects', 'browserly' ),
    'description' => __( 'Sometimes the browser\'s overscroll and pull-to-refresh features have unwanted effects on the user experience. <br><br>These can be easily disabled site-wide, or by targeting the CSS class of a specific element.' ),
    'priority' => 30,
    'panel' => 'browserly',
  ) );

  // pull-to-refresh setting
  $wp_customize->add_setting( 'browserly_pulltorefresh' , array(
    'type' => 'option',
    'capability' => 'manage_options',
    'sanitize_callback' => 'browserly_sanitize_checkbox'
  ) );

  // pull-to-refresh control
  $wp_customize->add_control( 'browserly_pulltorefresh', array(
    'label' => 'Disable pull-to-refresh', 'browserly',
    'type' => 'checkbox',
	  'default'    => '0',
    'section' => 'browserly_scroll_effects',
  ) );

  // Overscroll setting
  $wp_customize->add_setting( 'browserly_overscroll' , array(
    'type' => 'option',
    'capability' => 'manage_options',
    'sanitize_callback' => 'browserly_sanitize_checkbox',
  ) );

  // Overscroll control
  $wp_customize->add_control( 'browserly_overscroll', array(
    'label' => 'Disable Overscroll', 'browserly',
    'type' => 'checkbox',
    'section' => 'browserly_scroll_effects',
	  'default'    => '0'
  ) );

  // custom css setting
  $wp_customize->add_setting( 'browserly_custom_css' , array(
    'type' => 'option',
    'capability' => 'manage_options',
    'default' => '',
    'sanitize_callback' => 'sanitize_textarea_field',
  ) );

  // custom css control
  $wp_customize->add_control( 'browserly_custom_css', array(
    'label' => 'Custom CSS Class', 'browserly',
    'description' => __( 'The default target of the above options is .body, but if you want to target a particular section, you can add the CSS class below without the dot.', 'browserly' ),
    'type' => 'text',
    'section' => 'browserly_scroll_effects',
  ) );

  // add outdated browser section
  $wp_customize->add_section( 'browserly_outdatedbrowser', array(
    'title' => __( 'Outdated Browser', 'browserly' ),
    'description' => __( 'Don\'t let visitors using outdated browsers miss out! Enable this option to display a message to visitors using an out-of-date browser version, recommending they upgrade. <br><br>Further details on this can be found here: https://browser-update.org/' ),
    'priority' => 30,
    'panel' => 'browserly',
  ) );

  // outdated browser setting
  $wp_customize->add_setting( 'browserly_outdatedbrowser' , array(
    'type' => 'option',
    'capability' => 'manage_options',
    'sanitize_callback' => 'browserly_sanitize_checkbox'
  ) );

  // outdated browser control
  $wp_customize->add_control( 'browserly_outdatedbrowser', array(
    'label' => 'Enable out-of-date browser message', 'browserly',
    'type' => 'checkbox',
    'default'    => '0',
    'section' => 'browserly_outdatedbrowser',
  ) );

function browserly_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

}

add_action( 'customize_register', 'browserly_customize_register' );
