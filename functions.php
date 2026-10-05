<?php
/**
 * TargetWeb theme setup.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

define( 'TARGETWEB_VERSION', '1.0.0' );

require get_template_directory() . '/inc/defaults.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme supports, menu, and editor styles.
 */
function targetweb_setup() {
	load_theme_textdomain( 'targetweb', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	register_nav_menus(
		array(
			'showcase' => __( 'Header Menu', 'targetweb' ),
			'legal'    => __( 'Footer Menu', 'targetweb' ),
		)
	);

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 760;
	}
}
add_action( 'after_setup_theme', 'targetweb_setup' );

/**
 * Front-end styles and the mobile menu script.
 */
function targetweb_scripts() {
	wp_enqueue_style( 'targetweb-fonts', targetweb_font_url(), array(), null );
	wp_enqueue_style( 'targetweb-style', get_stylesheet_uri(), array( 'targetweb-fonts' ), TARGETWEB_VERSION );
	wp_enqueue_style( 'targetweb-theme', get_template_directory_uri() . '/assets/css/theme.css', array( 'targetweb-style' ), TARGETWEB_VERSION );
	wp_enqueue_script( 'targetweb-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), TARGETWEB_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'targetweb_scripts' );

/**
 * Load the same fonts inside the block editor.
 */
function targetweb_editor_fonts() {
	wp_enqueue_style( 'targetweb-fonts', targetweb_font_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'targetweb_editor_fonts' );

/**
 * Preconnect to the font host.
 *
 * @param array  $urls          Resource hints.
 * @param string $relation_type Hint type.
 * @return array
 */
function targetweb_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'targetweb_resource_hints', 10, 2 );

/**
 * Mark that JavaScript is available before the body paints, so the
 * mobile menu can stay hidden until the button is used.
 */
function targetweb_js_class() {
	echo "<script>document.documentElement.classList.add('tw-js');</script>\n";
}
add_action( 'wp_head', 'targetweb_js_class', 0 );

/**
 * Pingback header for singular views.
 */
function targetweb_pingback() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'targetweb_pingback' );
