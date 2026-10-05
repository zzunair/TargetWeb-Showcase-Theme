<?php
/**
 * Closing call to action.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

$title = trim( (string) targetweb_mod( 'tw_cta_title' ) );
$text  = trim( (string) targetweb_mod( 'tw_cta_text' ) );
?>
<section class="tw-cta" id="contact">
	<?php if ( '' !== $title ) : ?>
		<h2><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>
	<?php if ( '' !== $text ) : ?>
		<p><?php echo nl2br( esc_html( $text ) ); ?></p>
	<?php endif; ?>
	<?php
	targetweb_button(
		targetweb_mod( 'tw_cta_label' ),
		targetweb_mod( 'tw_cta_url' ),
		'tw-btn tw-btn--light'
	);
	?>
</section>
