<?php
/**
	* Options
	*
	* @package Browserly
	*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Fly like a Sparrow.
}

// Theme
add_action('wp_head', 'browserly_theme');
  function browserly_theme() {
?>
<meta name="theme-color" content="<?php echo get_option( 'browserly_primary_color', __('#FF595E') ); ?>">
<meta name="msapplication-navbutton-color" content="<?php echo get_option( 'browserly_primary_color', __('#FF595E') ); ?>">
<?php
};

// Safari
function browserly_safari_notification() {

$browserly_safari_notification = get_option( 'browserly_safari_notification', __('0') );
if ( $browserly_safari_notification != '0' ) :
?>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<?php
endif;

}

add_action( 'wp_head', 'browserly_safari_notification' );

// Pull-to-refresh
function browserly_pulltorefresh_styles() {

$browserly_pulltorefresh = get_option( 'browserly_pulltorefresh', __('0') );
if ( $browserly_pulltorefresh != '0' ) :
?>
  <style type="text/css">
    <?php echo get_option('browserly_custom_css', __('body') ); ?> {
      overscroll-behavior-y: contain;
    }
  </style>
<?php
endif;

}

add_action( 'wp_head', 'browserly_pulltorefresh_styles' );

// Overscroll
function browserly_overscroll_styles() {

$browserly_overscroll = get_option( 'browserly_overscroll', __('0') );
if ( $browserly_overscroll != '0' ) :
?>
  <style type="text/css">
    @media only screen and (min-width: 992px) {
      <?php echo get_option('browserly_custom_css', __('body') ); ?> {
          overscroll-behavior-y: none;
      }
    }
  </style>
<?php
endif;

}

add_action( 'wp_head', 'browserly_overscroll_styles' );


// Out-of-date browser message
function browserly_outdatedbrowser() {

$browserly_outdatedbrowser = get_option( 'browserly_outdatedbrowser', __('0') );
if ( $browserly_outdatedbrowser != '0' ) :
?>
  <script>
    var $buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,unsupported:true,mobile:false,api:2020.09 };
    function $buo_f(){
    var e = document.createElement("script");
    e.src = "//browser-update.org/update.min.js";
    document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
  </script>
<?php
endif;

}

add_action( 'wp_footer', 'browserly_outdatedbrowser' );
