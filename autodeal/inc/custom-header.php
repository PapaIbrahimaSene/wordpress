<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage autodeal
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses autodeal_header_style()
 */
function autodeal_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'autodeal_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'autodeal_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'autodeal_custom_header_setup' );

if ( ! function_exists( 'autodeal_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see autodeal_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'autodeal_header_style' );
function autodeal_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'autodeal-style', $custom_css );
	endif;
}
endif; // autodeal_header_style
