<?php
/**
 * @package WordPress
 * @subpackage autodeal
 */

function autodeal_setup() {

	load_theme_textdomain( 'autodeal', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'autodeal-featured-image', 2000, 1200, true );
	add_image_size( 'autodeal-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'autodeal' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', autodeal_fonts_url() ) );
}
add_action( 'after_setup_theme', 'autodeal_setup' );

/**
 * Register custom fonts.
 */
function autodeal_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Playfair Display:400,400i,700,700i,900,900i';
	$font_family[] = 'Poppins:200,200i,300,300i,400,400i,500';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}


/**
 * Enqueue scripts and styles.
 */
function autodeal_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'autodeal-fonts', autodeal_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'autodeal-style', get_stylesheet_uri() );

	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'autodeal_scripts' );



/**
 * Use front-page.php when Front page displays is set to a static page.
 */

function autodeal_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'autodeal_front_page_template' );


define('AUTODEAL_CREDIT','');
if ( ! function_exists( 'autodeal_credit' ) ) {
	function autodeal_credit(){
		echo "<a class='link' href=".esc_url(AUTODEAL_CREDIT)." target='_blank'>".esc_html__('Papa Ibrahima Sene','autodeal')."</a>";
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );