<?php
/**
 * Default content and Customizer field catalog.
 *
 * Defaults live here so the Customizer and the front page stay in sync.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

/**
 * Google Fonts stylesheet used on the front end and in the editor.
 *
 * @return string
 */
function targetweb_font_url() {
	return 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Source+Sans+3:wght@400;500;600;700&display=swap';
}

/**
 * Graphic used until a template screenshot is ready.
 *
 * @return string
 */
function targetweb_coming_soon_url() {
	return get_template_directory_uri() . '/assets/images/coming-soon.png';
}

/**
 * Category copy from the showcase design. Each category has three templates.
 *
 * @return array<string, array<string, mixed>>
 */
function targetweb_category_blueprints() {
	return array(
		'ecommerce' => array(
			'label'       => __( 'Ecommerce', 'targetweb' ),
			'name'        => 'Ecommerce',
			'description' => 'Full online storefronts built to sell inventory directly, with cart, checkout and synced pricing straight from Ideal.',
			'badge'       => '3 templates',
			'tag'         => 'Ecommerce',
			'blurbs'      => array(
				'Full catalog browsing with live pricing and cart checkout.',
				'Streamlined storefront focused on fast add-to-cart conversion.',
				'Category-rich layout for dealers with large, varied inventory.',
			),
			'urls'        => array(
				'https://olive-cassowary-129506.hostingersite.com/mowtivated/',
				'#contact',
				'#contact',
			),
			'coming_soon' => array( false, true, true ),
		),
		'leadgen'   => array(
			'label'       => __( 'Lead Generation', 'targetweb' ),
			'name'        => 'Lead Generation',
			'description' => 'Inventory-forward layouts built to capture inquiries and drive foot traffic, without full online checkout.',
			'badge'       => '3 templates',
			'tag'         => 'Lead Gen',
			'blurbs'      => array(
				'Inventory showcase with prominent "Request Info" paths.',
				'Service and parts focused layout built to fill the contact form.',
				'Local-dealer layout emphasizing visits and phone inquiries.',
			),
			'urls'        => array(
				'https://olive-cassowary-129506.hostingersite.com/theme-1/',
				'https://olive-cassowary-129506.hostingersite.com/theme-2/',
				'https://olive-cassowary-129506.hostingersite.com/theme-3/',
			),
		),
		'showroom'  => array(
			'label'       => __( 'Virtual Showroom', 'targetweb' ),
			'name'        => 'Virtual Showroom',
			'description' => 'Immersive, media-first layouts for browsing units in detail before a customer ever visits the lot.',
			'badge'       => '3 templates',
			'tag'         => 'Showroom',
			'blurbs'      => array(
				'Large gallery-first unit pages with 360° viewer support.',
				'Spec-sheet-forward layout for side-by-side unit comparisons.',
				'Lifestyle-driven layout pairing imagery with unit highlights.',
			),
			'urls'        => array(
				'https://olive-cassowary-129506.hostingersite.com/virtual-showroom/',
				'https://olive-cassowary-129506.hostingersite.com/virtualshowrrom2/',
				'#contact',
			),
			'coming_soon' => array( false, false, true ),
		),
	);
}

/**
 * Columns in the category comparison, in display order.
 *
 * Headings come from each category name so the table stays in step with those fields.
 *
 * @return array<string, string> Column slug => category name setting id.
 */
function targetweb_comparison_columns() {
	return array(
		'ecommerce' => 'tw_ecommerce_name',
		'showroom'  => 'tw_showroom_name',
		'leadgen'   => 'tw_leadgen_name',
	);
}

/**
 * Drafted differences between the three site types.
 *
 * The templates inside a category share the same functionality, so these rows
 * describe who each site type is for and what the visit is meant to accomplish.
 *
 * @return array<string, array<string, string>>
 */
function targetweb_comparison_blueprints() {
	return array(
		'fit'       => array(
			'label'     => 'Best for',
			'ecommerce' => 'Dealers whose customers are ready to buy from the website',
			'showroom'  => 'Dealers whose customers decide after studying a unit up close',
			'leadgen'   => 'Dealers whose customers need a reason to call, write, or visit',
		),
		'job'       => array(
			'label'     => 'Job of the site',
			'ecommerce' => 'Carry the store: catalog, price, and a path to purchase',
			'showroom'  => 'Do the showing: let someone learn a unit before they talk to anyone',
			'leadgen'   => 'Start the conversation and hand a real inquiry to the dealer',
		),
		'layout'    => array(
			'label'     => 'What the layout leads with',
			'ecommerce' => 'Categories, pricing, and the next step through the store',
			'showroom'  => 'Galleries, unit pages, and the details that explain the machine',
			'leadgen'   => 'Available inventory, with a way to reach the dealer always in view',
		),
		'inventory' => array(
			'label'     => 'How inventory is framed',
			'ecommerce' => 'A catalog the shopper can move through and buy from',
			'showroom'  => 'Units paired with the photos and specs that present them',
			'leadgen'   => 'Enough detail on what’s available to spark an inquiry',
		),
		'action'    => array(
			'label'     => 'The ask on the page',
			'ecommerce' => 'Choose a unit and move toward buying it',
			'showroom'  => 'Spend time with a unit, then ask for a closer look',
			'leadgen'   => 'Request information, call, or plan a visit',
		),
		'visit'     => array(
			'label'     => 'A good visit looks like',
			'ecommerce' => 'The customer leaves with an order in progress',
			'showroom'  => 'The customer understands the unit before the sales conversation',
			'leadgen'   => 'The customer raises a hand so the dealer can follow up',
		),
		'choose'    => array(
			'label'     => 'Choose this when',
			'ecommerce' => 'You want the website to carry the sale',
			'showroom'  => 'You want the website to do the showing',
			'leadgen'   => 'You want the website to fill the pipeline',
		),
	);
}

/**
 * Customizer sections, settings, and group headings.
 *
 * @return array{sections: array, settings: array, headings: array}
 */
function targetweb_customizer_config() {
	static $config = null;

	if ( null !== $config ) {
		return $config;
	}

	$sections = array(
		'targetweb_colors'     => array(
			'title'       => __( 'Colors', 'targetweb' ),
			'priority'    => 10,
			'description' => __( 'Used for buttons, links, headings, and the closing call to action.', 'targetweb' ),
		),
		'targetweb_header'     => array(
			'title'       => __( 'Header', 'targetweb' ),
			'priority'    => 20,
			'description' => __( 'Upload a logo under Site Identity to replace the TW monogram. The brand name and subtitle stay beside it. Assign a menu to Header Menu under Menus to replace the default section links.', 'targetweb' ),
		),
		'targetweb_hero'       => array(
			'title'       => __( 'Hero', 'targetweb' ),
			'priority'    => 30,
			'description' => __( 'The front page always uses this layout. Inner pages such as Privacy and Terms can be normal WordPress pages.', 'targetweb' ),
		),
		'targetweb_comparison' => array(
			'title'       => __( 'Comparison', 'targetweb' ),
			'priority'    => 70,
			'description' => __( 'Compares Ecommerce, Virtual Showroom, and Lead Generation. Column headings follow each category name. Templates inside a category are not listed, because they share the same functionality.', 'targetweb' ),
		),
		'targetweb_cta'        => array(
			'title'       => __( 'Contact Call to Action', 'targetweb' ),
			'priority'    => 80,
			'description' => '',
		),
		'targetweb_footer'     => array(
			'title'       => __( 'Footer', 'targetweb' ),
			'priority'    => 90,
			'description' => '',
		),
	);

	$settings = array();
	$headings = array();

	$add = function ( $id, $args ) use ( &$settings ) {
		$settings[ $id ] = wp_parse_args(
			$args,
			array(
				'description'     => '',
				'active_callback' => '',
				'transport'       => 'refresh',
				'priority'        => 10,
			)
		);
	};

	$add(
		'tw_color_primary',
		array(
			'label'     => __( 'Primary', 'targetweb' ),
			'section'   => 'targetweb_colors',
			'type'      => 'color',
			'default'   => '#1455C0',
			'sanitize'  => 'targetweb_sanitize_color',
			'transport' => 'postMessage',
			'priority'  => 10,
		)
	);
	$add(
		'tw_color_primary_hover',
		array(
			'label'     => __( 'Primary hover', 'targetweb' ),
			'section'   => 'targetweb_colors',
			'type'      => 'color',
			'default'   => '#0B3E8C',
			'sanitize'  => 'targetweb_sanitize_color',
			'transport' => 'postMessage',
			'priority'  => 20,
		)
	);
	$add(
		'tw_color_accent',
		array(
			'label'       => __( 'Accent tint', 'targetweb' ),
			'description' => __( 'Eyebrow, badges, and soft highlights.', 'targetweb' ),
			'section'     => 'targetweb_colors',
			'type'        => 'color',
			'default'     => '#EAF1FC',
			'sanitize'    => 'targetweb_sanitize_color',
			'transport'   => 'postMessage',
			'priority'    => 30,
		)
	);
	$add(
		'tw_color_heading',
		array(
			'label'     => __( 'Headings', 'targetweb' ),
			'section'   => 'targetweb_colors',
			'type'      => 'color',
			'default'   => '#0B1F3A',
			'sanitize'  => 'targetweb_sanitize_color',
			'transport' => 'postMessage',
			'priority'  => 40,
		)
	);
	$add(
		'tw_color_muted',
		array(
			'label'     => __( 'Secondary text', 'targetweb' ),
			'section'   => 'targetweb_colors',
			'type'      => 'color',
			'default'   => '#5B6B82',
			'sanitize'  => 'targetweb_sanitize_color',
			'transport' => 'postMessage',
			'priority'  => 50,
		)
	);
	$add(
		'tw_color_surface',
		array(
			'label'       => __( 'Surface', 'targetweb' ),
			'description' => __( 'Secondary button, comparison header, and empty screenshot areas.', 'targetweb' ),
			'section'     => 'targetweb_colors',
			'type'        => 'color',
			'default'     => '#F3F7FD',
			'sanitize'    => 'targetweb_sanitize_color',
			'transport'   => 'postMessage',
			'priority'    => 60,
		)
	);
	$add(
		'tw_color_cta_text',
		array(
			'label'     => __( 'Call to action text', 'targetweb' ),
			'section'   => 'targetweb_colors',
			'type'      => 'color',
			'default'   => '#D6E4FA',
			'sanitize'  => 'targetweb_sanitize_color',
			'transport' => 'postMessage',
			'priority'  => 70,
		)
	);

	$add(
		'tw_monogram',
		array(
			'label'       => __( 'Monogram', 'targetweb' ),
			'description' => __( 'Shown in the blue mark when no logo is uploaded. Two letters fit best.', 'targetweb' ),
			'section'     => 'targetweb_header',
			'type'        => 'text',
			'default'     => 'TW',
			'sanitize'    => 'targetweb_sanitize_monogram',
			'priority'    => 10,
		)
	);
	$add(
		'tw_brand_name',
		array(
			'label'    => __( 'Brand name', 'targetweb' ),
			'section'  => 'targetweb_header',
			'type'     => 'text',
			'default'  => 'TargetWeb',
			'sanitize' => 'sanitize_text_field',
			'priority' => 20,
		)
	);
	$add(
		'tw_brand_subtitle',
		array(
			'label'    => __( 'Brand subtitle', 'targetweb' ),
			'section'  => 'targetweb_header',
			'type'     => 'text',
			'default'  => 'by Ideal Computer Systems',
			'sanitize' => 'sanitize_text_field',
			'priority' => 30,
		)
	);
	$add(
		'tw_header_cta_label',
		array(
			'label'       => __( 'Button label', 'targetweb' ),
			'description' => __( 'Leave blank to hide the header button.', 'targetweb' ),
			'section'     => 'targetweb_header',
			'type'        => 'text',
			'default'     => 'Contact Sales',
			'sanitize'    => 'sanitize_text_field',
			'priority'    => 40,
		)
	);
	$add(
		'tw_header_cta_url',
		array(
			'label'    => __( 'Button link', 'targetweb' ),
			'section'  => 'targetweb_header',
			'type'     => 'text',
			'default'  => '#contact',
			'sanitize' => 'esc_url_raw',
			'priority' => 50,
		)
	);

	$add(
		'tw_hero_eyebrow',
		array(
			'label'    => __( 'Eyebrow', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => '9 Dealer Website Templates',
			'sanitize' => 'sanitize_text_field',
			'priority' => 10,
		)
	);
	$add(
		'tw_hero_title',
		array(
			'label'    => __( 'Headline', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => 'Websites Built for How Dealers Actually Sell',
			'sanitize' => 'sanitize_text_field',
			'priority' => 20,
		)
	);
	$add(
		'tw_hero_text',
		array(
			'label'    => __( 'Intro', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'textarea',
			'default'  => 'Every TargetWeb template syncs live inventory and pricing straight from Ideal — no manual updates, ever. Choose the layout that fits how you sell.',
			'sanitize' => 'sanitize_textarea_field',
			'priority' => 30,
		)
	);
	$add(
		'tw_hero_primary_label',
		array(
			'label'    => __( 'Primary button label', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => 'Contact Sales',
			'sanitize' => 'sanitize_text_field',
			'priority' => 40,
		)
	);
	$add(
		'tw_hero_primary_url',
		array(
			'label'    => __( 'Primary button link', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => '#contact',
			'sanitize' => 'esc_url_raw',
			'priority' => 50,
		)
	);
	$add(
		'tw_hero_secondary_label',
		array(
			'label'    => __( 'Secondary button label', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => 'View Comparison',
			'sanitize' => 'sanitize_text_field',
			'priority' => 60,
		)
	);
	$add(
		'tw_hero_secondary_url',
		array(
			'label'    => __( 'Secondary button link', 'targetweb' ),
			'section'  => 'targetweb_hero',
			'type'     => 'text',
			'default'  => '#compare',
			'sanitize' => 'esc_url_raw',
			'priority' => 70,
		)
	);

	$add(
		'tw_card_link_label',
		array(
			'label'       => __( 'Card link label', 'targetweb' ),
			'description' => __( 'Text on every template card. Each template’s URL is the Demo link under that template.', 'targetweb' ),
			'section'     => 'targetweb_ecommerce',
			'type'        => 'text',
			'default'     => 'Ask About This Template →',
			'sanitize'    => 'sanitize_text_field',
			'priority'    => 40,
		)
	);

	$section_priority = 40;
	foreach ( targetweb_category_blueprints() as $slug => $category ) {
		$section_id = 'targetweb_' . $slug;

		$description = __( 'Name, screenshot, blurb, and demo link for each template.', 'targetweb' );

		$sections[ $section_id ] = array(
			'title'       => $category['label'],
			'priority'    => $section_priority,
			'description' => $description,
		);
		$section_priority += 10;

		$add(
			"tw_{$slug}_name",
			array(
				'label'    => __( 'Category name', 'targetweb' ),
				'section'  => $section_id,
				'type'     => 'text',
				'default'  => $category['name'],
				'sanitize' => 'sanitize_text_field',
				'priority' => 10,
			)
		);
		$add(
			"tw_{$slug}_description",
			array(
				'label'    => __( 'Category description', 'targetweb' ),
				'section'  => $section_id,
				'type'     => 'textarea',
				'default'  => $category['description'],
				'sanitize' => 'sanitize_textarea_field',
				'priority' => 20,
			)
		);
		$add(
			"tw_{$slug}_badge",
			array(
				'label'    => __( 'Badge', 'targetweb' ),
				'section'  => $section_id,
				'type'     => 'text',
				'default'  => $category['badge'],
				'sanitize' => 'sanitize_text_field',
				'priority' => 30,
			)
		);

		$base = 100;
		foreach ( $category['blurbs'] as $index => $blurb ) {
			$n = $index + 1;

			$headings[] = array(
				'id'       => "tw_heading_{$slug}_{$n}",
				'label'    => sprintf(
					/* translators: %d: template number within the category. */
					__( 'Template %d', 'targetweb' ),
					$n
				),
				'section'  => $section_id,
				'priority' => $base,
			);

			$add(
				"tw_{$slug}_{$n}_name",
				array(
					'label'    => __( 'Name', 'targetweb' ),
					'section'  => $section_id,
					'type'     => 'text',
					'default'  => 'Theme ' . $n,
					'sanitize' => 'sanitize_text_field',
					'priority' => $base + 10,
				)
			);
			$add(
				"tw_{$slug}_{$n}_tag",
				array(
					'label'    => __( 'Tag', 'targetweb' ),
					'section'  => $section_id,
					'type'     => 'text',
					'default'  => $category['tag'],
					'sanitize' => 'sanitize_text_field',
					'priority' => $base + 20,
				)
			);
			$add(
				"tw_{$slug}_{$n}_blurb",
				array(
					'label'    => __( 'Blurb', 'targetweb' ),
					'section'  => $section_id,
					'type'     => 'textarea',
					'default'  => $blurb,
					'sanitize' => 'sanitize_textarea_field',
					'priority' => $base + 30,
				)
			);
			$image_default = '';
			if ( ! empty( $category['coming_soon'][ $index ] ) ) {
				$image_default = targetweb_coming_soon_url();
			}
			$add(
				"tw_{$slug}_{$n}_image",
				array(
					'label'       => __( 'Screenshot', 'targetweb' ),
					'description' => __( 'Use a 4:3 image, 1600×1200 pixels.', 'targetweb' ),
					'section'     => $section_id,
					'type'        => 'image',
					'default'     => $image_default,
					'sanitize'    => 'esc_url_raw',
					'priority'    => $base + 40,
				)
			);
			$link_description = __( 'Full URL, or #contact to stay on this page. Full URLs open in a new tab.', 'targetweb' );
			if ( ! empty( $category['coming_soon'][ $index ] ) ) {
				$link_description = __( 'No live demo yet. Use #contact to jump to the call to action.', 'targetweb' );
			}
			$add(
				"tw_{$slug}_{$n}_url",
				array(
					'label'       => __( 'Demo link', 'targetweb' ),
					'description' => $link_description,
					'section'     => $section_id,
					'type'        => 'text',
					'default'     => isset( $category['urls'][ $index ] ) ? $category['urls'][ $index ] : '#contact',
					'sanitize'    => 'esc_url_raw',
					'priority'    => $base + 50,
				)
			);
			$base += 100;
		}
	}

	$compare_fields = array(
		'tw_compare_title'     => array(
			'label'    => __( 'Heading', 'targetweb' ),
			'default'  => 'How the Three Site Types Differ',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tw_compare_text'      => array(
			'label'    => __( 'Intro', 'targetweb' ),
			'default'  => 'Every category runs on the same TargetWeb functionality. These rows describe how each site type is aimed, so you can match one to how you sell.',
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'tw_compare_nav_label' => array(
			'label'       => __( 'Menu label', 'targetweb' ),
			'description' => __( 'Used in the default header menu. A custom Header Menu replaces this.', 'targetweb' ),
			'default'     => 'Compare',
			'type'        => 'text',
			'sanitize'    => 'sanitize_text_field',
		),
		'tw_compare_corner'    => array(
			'label'    => __( 'First column heading', 'targetweb' ),
			'default'  => 'Focus',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	$add(
		'tw_show_comparison',
		array(
			'label'    => __( 'Show comparison table', 'targetweb' ),
			'section'  => 'targetweb_comparison',
			'type'     => 'checkbox',
			'default'  => true,
			'sanitize' => 'targetweb_sanitize_checkbox',
			'priority' => 10,
		)
	);

	$priority = 20;
	foreach ( $compare_fields as $id => $field ) {
		$field['section']         = 'targetweb_comparison';
		$field['priority']        = $priority;
		$field['active_callback'] = 'targetweb_comparison_is_enabled';
		$add( $id, $field );
		$priority += 10;
	}

	$column_labels = array(
		'ecommerce' => __( 'Ecommerce', 'targetweb' ),
		'showroom'  => __( 'Virtual Showroom', 'targetweb' ),
		'leadgen'   => __( 'Lead Generation', 'targetweb' ),
	);
	$row_priority  = 100;
	foreach ( targetweb_comparison_blueprints() as $key => $row ) {
		$headings[] = array(
			'id'       => "tw_heading_compare_{$key}",
			'label'    => $row['label'],
			'section'  => 'targetweb_comparison',
			'priority' => $row_priority,
		);
		$add(
			"tw_compare_{$key}_label",
			array(
				'label'           => __( 'Row label', 'targetweb' ),
				'section'         => 'targetweb_comparison',
				'type'            => 'text',
				'default'         => $row['label'],
				'sanitize'        => 'sanitize_text_field',
				'priority'        => $row_priority + 10,
				'active_callback' => 'targetweb_comparison_is_enabled',
			)
		);
		$offset = 20;
		foreach ( $column_labels as $column => $column_label ) {
			$add(
				"tw_compare_{$key}_{$column}",
				array(
					'label'           => $column_label,
					'section'         => 'targetweb_comparison',
					'type'            => 'textarea',
					'default'         => $row[ $column ],
					'sanitize'        => 'sanitize_textarea_field',
					'priority'        => $row_priority + $offset,
					'active_callback' => 'targetweb_comparison_is_enabled',
				)
			);
			$offset += 10;
		}
		$row_priority += 100;
	}

	$add(
		'tw_cta_title',
		array(
			'label'    => __( 'Heading', 'targetweb' ),
			'section'  => 'targetweb_cta',
			'type'     => 'text',
			'default'  => 'Not Sure Which Template Fits Your Store?',
			'sanitize' => 'sanitize_text_field',
			'priority' => 10,
		)
	);
	$add(
		'tw_cta_text',
		array(
			'label'    => __( 'Text', 'targetweb' ),
			'section'  => 'targetweb_cta',
			'type'     => 'textarea',
			'default'  => 'Talk to our team — we\'ll match a template to your dealership and walk you through a live demo.',
			'sanitize' => 'sanitize_textarea_field',
			'priority' => 20,
		)
	);
	$add(
		'tw_cta_label',
		array(
			'label'    => __( 'Button label', 'targetweb' ),
			'section'  => 'targetweb_cta',
			'type'     => 'text',
			'default'  => 'Contact Sales →',
			'sanitize' => 'sanitize_text_field',
			'priority' => 30,
		)
	);
	$add(
		'tw_cta_url',
		array(
			'label'    => __( 'Button link', 'targetweb' ),
			'section'  => 'targetweb_cta',
			'type'     => 'text',
			'default'  => 'https://www.idealcomputersystems.com/contact',
			'sanitize' => 'esc_url_raw',
			'priority' => 40,
		)
	);

	$add(
		'tw_footer_before',
		array(
			'label'    => __( 'Copyright lead-in', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => '© TargetWeb, a product of Ideal Computer Systems — a',
			'sanitize' => 'sanitize_text_field',
			'priority' => 10,
		)
	);
	$add(
		'tw_footer_company_label',
		array(
			'label'    => __( 'Company link label', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'Constellation Software',
			'sanitize' => 'sanitize_text_field',
			'priority' => 20,
		)
	);
	$add(
		'tw_footer_company_url',
		array(
			'label'    => __( 'Company link', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'https://constellationdealer.com/',
			'sanitize' => 'esc_url_raw',
			'priority' => 30,
		)
	);
	$add(
		'tw_footer_after',
		array(
			'label'    => __( 'Copyright ending', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'company.',
			'sanitize' => 'sanitize_text_field',
			'priority' => 40,
		)
	);
	$add(
		'tw_footer_privacy_label',
		array(
			'label'    => __( 'Privacy label', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'Privacy',
			'sanitize' => 'sanitize_text_field',
			'priority' => 50,
		)
	);
	$add(
		'tw_footer_privacy_url',
		array(
			'label'    => __( 'Privacy link', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'https://www.idealcomputersystems.com/privacy',
			'sanitize' => 'esc_url_raw',
			'priority' => 60,
		)
	);
	$add(
		'tw_footer_terms_label',
		array(
			'label'    => __( 'Terms label', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'Terms',
			'sanitize' => 'sanitize_text_field',
			'priority' => 70,
		)
	);
	$add(
		'tw_footer_terms_url',
		array(
			'label'    => __( 'Terms link', 'targetweb' ),
			'section'  => 'targetweb_footer',
			'type'     => 'text',
			'default'  => 'https://www.idealcomputersystems.com/terms',
			'sanitize' => 'esc_url_raw',
			'priority' => 80,
		)
	);

	$config = array(
		'sections' => $sections,
		'settings' => $settings,
		'headings' => $headings,
	);

	return $config;
}

/**
 * Customizer sections.
 *
 * @return array
 */
function targetweb_customizer_sections() {
	$config = targetweb_customizer_config();
	return $config['sections'];
}

/**
 * Customizer settings keyed by theme mod id.
 *
 * @return array
 */
function targetweb_settings_catalog() {
	$config = targetweb_customizer_config();
	return $config['settings'];
}

/**
 * Heading controls inserted above each template group.
 *
 * @return array
 */
function targetweb_customizer_headings() {
	$config = targetweb_customizer_config();
	return $config['headings'];
}

/**
 * Theme mod with the catalog default when the value has never been saved.
 *
 * @param string $id Setting id.
 * @return mixed
 */
function targetweb_mod( $id ) {
	$catalog = targetweb_settings_catalog();
	$default = array_key_exists( $id, $catalog ) ? $catalog[ $id ]['default'] : '';
	return get_theme_mod( $id, $default );
}

/**
 * Hex color, falling back to the catalog default.
 *
 * @param string $id Setting id.
 * @return string
 */
function targetweb_hex( $id ) {
	$hex = sanitize_hex_color( (string) targetweb_mod( $id ) );
	if ( $hex ) {
		return $hex;
	}

	$catalog = targetweb_settings_catalog();
	return isset( $catalog[ $id ]['default'] ) ? $catalog[ $id ]['default'] : '#1455C0';
}

/**
 * Whether the comparison section should render.
 *
 * @return bool
 */
function targetweb_show_comparison() {
	return targetweb_sanitize_checkbox( targetweb_mod( 'tw_show_comparison' ) );
}

/**
 * Customizer active callback for comparison-only fields.
 *
 * @return bool
 */
function targetweb_comparison_is_enabled() {
	return targetweb_show_comparison();
}

/**
 * Comparison rows after Customizer overrides. Empty rows are omitted.
 *
 * @return array<int, array{label: string, cells: array<string, string>}>
 */
function targetweb_get_comparison_rows() {
	$rows = array();

	foreach ( targetweb_comparison_blueprints() as $key => $blueprint ) {
		$cells   = array();
		$has_cell = false;

		foreach ( array_keys( targetweb_comparison_columns() ) as $column ) {
			$value            = trim( (string) targetweb_mod( "tw_compare_{$key}_{$column}" ) );
			$cells[ $column ] = $value;
			if ( '' !== $value ) {
				$has_cell = true;
			}
		}

		$label = trim( (string) targetweb_mod( "tw_compare_{$key}_label" ) );
		if ( '' === $label && ! $has_cell ) {
			continue;
		}

		$rows[] = array(
			'label' => $label,
			'cells' => $cells,
		);
	}

	return $rows;
}

/**
 * The three categories with their templates, after Customizer overrides.
 *
 * @return array<int, array<string, mixed>>
 */
function targetweb_get_categories() {
	$categories = array();

	foreach ( targetweb_category_blueprints() as $slug => $blueprint ) {
		$templates = array();
		$count     = count( $blueprint['blurbs'] );

		for ( $n = 1; $n <= $count; $n++ ) {
			$templates[] = array(
				'name'  => targetweb_mod( "tw_{$slug}_{$n}_name" ),
				'tag'   => targetweb_mod( "tw_{$slug}_{$n}_tag" ),
				'blurb' => targetweb_mod( "tw_{$slug}_{$n}_blurb" ),
				'image' => targetweb_mod( "tw_{$slug}_{$n}_image" ),
				'url'   => targetweb_mod( "tw_{$slug}_{$n}_url" ),
			);
		}

		$categories[] = array(
			'slug'        => $slug,
			'name'        => targetweb_mod( "tw_{$slug}_name" ),
			'description' => targetweb_mod( "tw_{$slug}_description" ),
			'badge'       => targetweb_mod( "tw_{$slug}_badge" ),
			'templates'   => $templates,
		);
	}

	return $categories;
}

/**
 * Keep monogram text short enough for the mark.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function targetweb_sanitize_monogram( $value ) {
	$value = sanitize_text_field( (string) $value );
	if ( function_exists( 'mb_substr' ) ) {
		return mb_substr( $value, 0, 3 );
	}
	return substr( $value, 0, 3 );
}

/**
 * Checkbox values arrive as booleans or "1" / "0" strings.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function targetweb_sanitize_checkbox( $value ) {
	return (bool) filter_var( $value, FILTER_VALIDATE_BOOLEAN );
}

/**
 * Hex color or an empty string when the value is not a color.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function targetweb_sanitize_color( $value ) {
	$hex = sanitize_hex_color( (string) $value );
	return $hex ? $hex : '';
}
