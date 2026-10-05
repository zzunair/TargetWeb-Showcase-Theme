<?php
/**
 * Comparison table for the three site types.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

if ( ! targetweb_show_comparison() ) {
	return;
}

$title   = trim( (string) targetweb_mod( 'tw_compare_title' ) );
$text    = trim( (string) targetweb_mod( 'tw_compare_text' ) );
$rows    = targetweb_get_comparison_rows();
$columns = targetweb_comparison_columns();
?>
<section class="tw-section tw-compare" id="compare">
	<?php if ( '' !== $title ) : ?>
		<h2><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>
	<?php if ( '' !== $text ) : ?>
		<p class="tw-section__intro"><?php echo nl2br( esc_html( $text ) ); ?></p>
	<?php endif; ?>
	<?php if ( $rows ) : ?>
		<div class="tw-table-scroll">
			<table class="tw-table">
				<thead>
					<tr>
						<th scope="col"><?php echo esc_html( targetweb_mod( 'tw_compare_corner' ) ); ?></th>
						<?php foreach ( $columns as $setting_id ) : ?>
							<th scope="col"><?php echo esc_html( targetweb_mod( $setting_id ) ); ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<th scope="row"><?php echo esc_html( $row['label'] ); ?></th>
							<?php foreach ( $row['cells'] as $cell ) : ?>
								<td><?php echo esc_html( $cell ); ?></td>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif; ?>
</section>
