<?php
/**
 * Customizer registration.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register showcase settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function targetweb_customize_register( $wp_customize ) {
	require_once get_template_directory() . '/inc/class-heading-control.php';

	$wp_customize->add_panel(
		'targetweb_panel',
		array(
			'title'       => __( 'TargetWeb Showcase', 'targetweb' ),
			'description' => __( 'Colors, copy, template cards, and the comparison table for the front page.', 'targetweb' ),
			'priority'    => 10,
		)
	);

	foreach ( targetweb_customizer_sections() as $id => $section ) {
		$wp_customize->add_section(
			$id,
			array(
				'title'       => $section['title'],
				'description' => $section['description'],
				'panel'       => 'targetweb_panel',
				'priority'    => $section['priority'],
			)
		);
	}

	foreach ( targetweb_settings_catalog() as $id => $field ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => $field['sanitize'],
				'transport'         => $field['transport'],
			)
		);

		$args = array(
			'label'    => $field['label'],
			'section'  => $field['section'],
			'priority' => $field['priority'],
			'settings' => $id,
		);

		if ( ! empty( $field['description'] ) ) {
			$args['description'] = $field['description'];
		}
		if ( ! empty( $field['active_callback'] ) ) {
			$args['active_callback'] = $field['active_callback'];
		}

		if ( 'image' === $field['type'] ) {
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, $args ) );
		} elseif ( 'color' === $field['type'] ) {
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, $args ) );
		} else {
			$args['type'] = $field['type'];
			$wp_customize->add_control( $id, $args );
		}
	}

	foreach ( targetweb_customizer_headings() as $heading ) {
		$wp_customize->add_setting(
			$heading['id'],
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new TargetWeb_Heading_Control(
				$wp_customize,
				$heading['id'],
				array(
					'label'    => $heading['label'],
					'section'  => $heading['section'],
					'priority' => $heading['priority'],
				)
			)
		);
	}

	foreach ( array( 'colors', 'header_image', 'background_image' ) as $section_id ) {
		$wp_customize->remove_section( $section_id );
	}
	$wp_customize->remove_panel( 'widgets' );
}
add_action( 'customize_register', 'targetweb_customize_register' );

/**
 * Print the color tokens so the stylesheet can use them.
 */
function targetweb_print_color_css() {
	$vars = array(
		'--tw-primary'       => targetweb_hex( 'tw_color_primary' ),
		'--tw-primary-hover' => targetweb_hex( 'tw_color_primary_hover' ),
		'--tw-accent'        => targetweb_hex( 'tw_color_accent' ),
		'--tw-heading'       => targetweb_hex( 'tw_color_heading' ),
		'--tw-muted'         => targetweb_hex( 'tw_color_muted' ),
		'--tw-surface'       => targetweb_hex( 'tw_color_surface' ),
		'--tw-cta-text'      => targetweb_hex( 'tw_color_cta_text' ),
	);

	$rules = array();
	foreach ( $vars as $name => $value ) {
		$rules[] = $name . ':' . $value;
	}

	printf(
		'<style id="targetweb-colors">:root{%s}</style>' . "\n",
		esc_html( implode( ';', $rules ) )
	);
}
add_action( 'wp_head', 'targetweb_print_color_css', 20 );

/**
 * Update color tokens in the Customizer preview without a reload.
 */
function targetweb_customize_preview_js() {
	wp_enqueue_script(
		'targetweb-customizer',
		get_template_directory_uri() . '/assets/js/customizer-preview.js',
		array( 'customize-preview' ),
		TARGETWEB_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'targetweb_customize_preview_js' );

/**
 * Styles for the heading controls in the Customizer sidebar.
 */
function targetweb_customizer_controls_css() {
	wp_enqueue_style(
		'targetweb-customizer-controls',
		get_template_directory_uri() . '/assets/css/customizer.css',
		array(),
		TARGETWEB_VERSION
	);

	wp_enqueue_script(
		'targetweb-customizer-controls',
		get_template_directory_uri() . '/assets/js/customizer-controls.js',
		array( 'customize-controls' ),
		TARGETWEB_VERSION,
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'targetweb_customizer_controls_css' );
