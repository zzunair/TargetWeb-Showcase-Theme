<?php
/**
 * Footer.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

$before = trim( (string) targetweb_mod( 'tw_footer_before' ) );
$after  = trim( (string) targetweb_mod( 'tw_footer_after' ) );
$company_label = trim( (string) targetweb_mod( 'tw_footer_company_label' ) );
$company_url   = trim( (string) targetweb_mod( 'tw_footer_company_url' ) );
$privacy_label = trim( (string) targetweb_mod( 'tw_footer_privacy_label' ) );
$privacy_url   = trim( (string) targetweb_mod( 'tw_footer_privacy_url' ) );
$terms_label   = trim( (string) targetweb_mod( 'tw_footer_terms_label' ) );
$terms_url     = trim( (string) targetweb_mod( 'tw_footer_terms_url' ) );
?>
<footer class="tw-footer">
	<p class="tw-footer__copy">
		<?php
		echo esc_html( $before );
		if ( '' !== $company_label && '' !== $company_url ) {
			echo ' <a href="' . esc_url( $company_url ) . '">' . esc_html( $company_label ) . '</a>';
		}
		if ( '' !== $after ) {
			echo ' ' . esc_html( $after );
		}
		?>
	</p>
	<?php if ( has_nav_menu( 'legal' ) ) : ?>
		<nav class="tw-footer__links" aria-label="<?php esc_attr_e( 'Legal', 'targetweb' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'legal',
					'container'      => false,
					'menu_class'     => 'tw-footer__menu',
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	<?php elseif ( ( '' !== $privacy_label && '' !== $privacy_url ) || ( '' !== $terms_label && '' !== $terms_url ) ) : ?>
		<nav class="tw-footer__links" aria-label="<?php esc_attr_e( 'Legal', 'targetweb' ); ?>">
			<?php if ( '' !== $privacy_label && '' !== $privacy_url ) : ?>
				<a href="<?php echo esc_url( $privacy_url ); ?>"><?php echo esc_html( $privacy_label ); ?></a>
			<?php endif; ?>
			<?php if ( '' !== $terms_label && '' !== $terms_url ) : ?>
				<a href="<?php echo esc_url( $terms_url ); ?>"><?php echo esc_html( $terms_label ); ?></a>
			<?php endif; ?>
		</nav>
	<?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
