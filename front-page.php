<?php
/**
 * Front page.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="content">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/categories' ); ?>
	<?php get_template_part( 'template-parts/comparison' ); ?>
	<?php get_template_part( 'template-parts/cta' ); ?>
</main>
<?php
get_footer();
