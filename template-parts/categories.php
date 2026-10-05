<?php
/**
 * Template categories.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

$link_label = trim( (string) targetweb_mod( 'tw_card_link_label' ) );
?>
<?php foreach ( targetweb_get_categories() as $category ) : ?>
	<section class="tw-section" id="<?php echo esc_attr( $category['slug'] ); ?>">
		<div class="tw-section__head">
			<h2><?php echo esc_html( $category['name'] ); ?></h2>
			<?php if ( '' !== trim( (string) $category['badge'] ) ) : ?>
				<span class="tw-pill tw-pill--lg"><?php echo esc_html( $category['badge'] ); ?></span>
			<?php endif; ?>
		</div>
		<?php if ( '' !== trim( (string) $category['description'] ) ) : ?>
			<p class="tw-section__intro"><?php echo esc_html( $category['description'] ); ?></p>
		<?php endif; ?>
		<div class="tw-cards">
			<?php foreach ( $category['templates'] as $template ) : ?>
				<article class="tw-card">
					<div class="tw-card__media">
						<?php if ( ! empty( $template['image'] ) ) : ?>
							<?php
							$image_alt = ( false !== strpos( $template['image'], 'coming-soon.png' ) )
								? __( 'Coming soon', 'targetweb' )
								: '';
							?>
							<img src="<?php echo esc_url( $template['image'] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="lazy" decoding="async">
						<?php else : ?>
							<div class="tw-card__placeholder"><?php echo targetweb_placeholder_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Fixed SVG from the theme. ?></div>
						<?php endif; ?>
					</div>
					<div class="tw-card__body">
						<div class="tw-card__title-row">
							<h3><?php echo esc_html( $template['name'] ); ?></h3>
							<?php if ( '' !== trim( (string) $template['tag'] ) ) : ?>
								<span class="tw-pill"><?php echo esc_html( $template['tag'] ); ?></span>
							<?php endif; ?>
						</div>
						<?php if ( '' !== trim( (string) $template['blurb'] ) ) : ?>
							<p class="tw-card__blurb"><?php echo esc_html( $template['blurb'] ); ?></p>
						<?php endif; ?>
						<?php if ( '' !== $link_label && '' !== trim( (string) $template['url'] ) ) : ?>
							<?php $is_external = 0 === strpos( $template['url'], 'http' ); ?>
							<a class="tw-card__link" href="<?php echo esc_url( $template['url'] ); ?>"<?php echo $is_external ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html( $link_label ); ?></a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
<?php endforeach; ?>
