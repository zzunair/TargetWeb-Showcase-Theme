<?php
/**
 * Template helpers.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

/**
 * Print a button link when both the label and URL are set.
 *
 * @param string $label Link text.
 * @param string $url   Link URL.
 * @param string $class CSS classes.
 */
function targetweb_button( $label, $url, $class ) {
	$label = trim( (string) $label );
	$url   = trim( (string) $url );

	if ( '' === $label || '' === $url ) {
		return;
	}

	printf(
		'<a class="%1$s" href="%2$s">%3$s</a>',
		esc_attr( $class ),
		esc_url( $url ),
		esc_html( $label )
	);
}

/**
 * Default header links when no Primary menu is assigned.
 *
 * @param array $args Menu arguments from wp_nav_menu().
 */
function targetweb_primary_menu_fallback( $args ) {
	unset( $args );

	echo '<nav class="tw-nav" aria-label="' . esc_attr__( 'Primary', 'targetweb' ) . '">';
	echo '<ul id="tw-nav" class="tw-nav__list">';

	foreach ( targetweb_get_categories() as $category ) {
		if ( '' === trim( (string) $category['name'] ) ) {
			continue;
		}
		echo '<li class="menu-item"><a href="#' . esc_attr( $category['slug'] ) . '">' . esc_html( $category['name'] ) . '</a></li>';
	}

	if ( targetweb_show_comparison() ) {
		$label = trim( (string) targetweb_mod( 'tw_compare_nav_label' ) );
		if ( '' !== $label ) {
			echo '<li class="menu-item"><a href="#compare">' . esc_html( $label ) . '</a></li>';
		}
	}

	echo '</ul></nav>';
}

/**
 * Empty screenshot icon. Markup is fixed, not user content.
 *
 * @return string
 */
function targetweb_placeholder_icon() {
	return '<svg class="tw-card__icon" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" focusable="false"><rect x="3.25" y="4.25" width="17.5" height="15.5" rx="2" fill="none" stroke="currentColor" stroke-width="1.5"></rect><circle cx="8.5" cy="9" r="1.4" fill="currentColor"></circle><path d="M4 16.5l4.2-3.4 3.3 2.6 2.4-1.8L20 17.5" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path></svg>';
}
