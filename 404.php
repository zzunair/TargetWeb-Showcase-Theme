<?php
/**
 * 404.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="content" class="tw-page">
	<div class="tw-wrap tw-prose">
		<h1><?php esc_html_e( 'Page not found', 'targetweb' ); ?></h1>
		<p><?php esc_html_e( 'That page doesn’t exist. Head back to the template showcase.', 'targetweb' ); ?></p>
		<?php targetweb_button( __( 'Back to home', 'targetweb' ), home_url( '/' ), 'tw-btn tw-btn--primary' ); ?>
	</div>
</main>
<?php
get_footer();
