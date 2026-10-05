<?php
/**
 * Page.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="content" class="tw-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'tw-wrap tw-prose' ); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
