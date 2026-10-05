<?php
/**
 * Header.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="tw-skip" href="#content"><?php esc_html_e( 'Skip to content', 'targetweb' ); ?></a>
<header class="tw-header">
	<div class="tw-header__inner">
		<a class="tw-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
			$logo_id  = (int) get_theme_mod( 'custom_logo' );
			$logo_html = $logo_id ? wp_get_attachment_image(
				$logo_id,
				'medium',
				false,
				array(
					'class' => 'tw-brand__logo',
					'alt'   => '',
				)
			) : '';
			if ( $logo_html ) :
				echo $logo_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_get_attachment_image() escapes.
			else :
				?>
				<span class="tw-mark"><?php echo esc_html( targetweb_mod( 'tw_monogram' ) ); ?></span>
			<?php endif; ?>
			<span class="tw-brand__text">
				<span class="tw-brand__name"><?php echo esc_html( targetweb_mod( 'tw_brand_name' ) ); ?></span>
				<?php $subtitle = trim( (string) targetweb_mod( 'tw_brand_subtitle' ) ); ?>
				<?php if ( '' !== $subtitle ) : ?>
					<span class="tw-brand__sub"><?php echo esc_html( $subtitle ); ?></span>
				<?php endif; ?>
			</span>
		</a>

		<?php
		wp_nav_menu(
			array(
				'theme_location'       => 'showcase',
				'container'            => 'nav',
				'container_class'      => 'tw-nav',
				'container_aria_label' => __( 'Primary', 'targetweb' ),
				'menu_class'           => 'tw-nav__list',
				'menu_id'              => 'tw-nav',
				'fallback_cb'          => 'targetweb_primary_menu_fallback',
				'depth'                => 1,
			)
		);
		?>

		<div class="tw-header__end">
			<button class="tw-nav-toggle" type="button" aria-expanded="false" aria-controls="tw-nav">
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'targetweb' ); ?></span>
				<span class="tw-nav-toggle__bar"></span>
				<span class="tw-nav-toggle__bar"></span>
				<span class="tw-nav-toggle__bar"></span>
			</button>
			<?php
			targetweb_button(
				targetweb_mod( 'tw_header_cta_label' ),
				targetweb_mod( 'tw_header_cta_url' ),
				'tw-btn tw-btn--primary tw-btn--sm'
			);
			?>
		</div>
	</div>
</header>
