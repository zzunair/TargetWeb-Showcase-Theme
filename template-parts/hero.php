<?php
/**
 * Hero.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

$eyebrow = trim( (string) targetweb_mod( 'tw_hero_eyebrow' ) );
$title   = trim( (string) targetweb_mod( 'tw_hero_title' ) );
$text    = trim( (string) targetweb_mod( 'tw_hero_text' ) );

$secondary_label = targetweb_mod( 'tw_hero_secondary_label' );
$secondary_url   = targetweb_mod( 'tw_hero_secondary_url' );
if ( ! targetweb_show_comparison() && '#compare' === $secondary_url ) {
	$secondary_label = '';
}
?>
<section class="tw-hero">
	<?php if ( '' !== $eyebrow ) : ?>
		<p class="tw-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
	<?php endif; ?>
	<?php if ( '' !== $title ) : ?>
		<h1><?php echo esc_html( $title ); ?></h1>
	<?php endif; ?>
	<?php if ( '' !== $text ) : ?>
		<p class="tw-hero__text"><?php echo nl2br( esc_html( $text ) ); ?></p>
	<?php endif; ?>
	<div class="tw-hero__actions">
		<?php
		targetweb_button(
			targetweb_mod( 'tw_hero_primary_label' ),
			targetweb_mod( 'tw_hero_primary_url' ),
			'tw-btn tw-btn--primary'
		);
		targetweb_button(
			$secondary_label,
			$secondary_url,
			'tw-btn tw-btn--ghost'
		);
		?>
	</div>
</section>
