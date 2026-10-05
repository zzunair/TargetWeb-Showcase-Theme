<?php
/**
 * Single post.
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
			<p class="tw-meta"><?php echo esc_html( get_the_date() ); ?></p>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
