<?php
/**
 * Blog, search, and archive fallback.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="content" class="tw-page">
	<div class="tw-wrap tw-prose tw-loop">
		<?php if ( is_search() ) : ?>
			<h1>
				<?php
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for “%s”', 'targetweb' ),
					esc_html( get_search_query() )
				);
				?>
			</h1>
		<?php elseif ( is_archive() ) : ?>
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<div class="tw-archive-desc">', '</div>' ); ?>
		<?php elseif ( is_home() && ! is_front_page() ) : ?>
			<h1><?php echo esc_html( single_post_title( '', false ) ); ?></h1>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class(); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="tw-meta"><?php echo esc_html( get_the_date() ); ?></p>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => __( 'Previous', 'targetweb' ),
					'next_text' => __( 'Next', 'targetweb' ),
				)
			);
			?>
		<?php else : ?>
			<h1><?php esc_html_e( 'Nothing found', 'targetweb' ); ?></h1>
			<p><?php esc_html_e( 'Try a different search, or head back to the template showcase.', 'targetweb' ); ?></p>
			<?php targetweb_button( __( 'Back to home', 'targetweb' ), home_url( '/' ), 'tw-btn tw-btn--primary' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
