<?php
/**
 * Customizer heading control.
 *
 * @package TargetWeb
 */

defined( 'ABSPATH' ) || exit;

/**
 * Non-input heading used to group template fields.
 */
class TargetWeb_Heading_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @var string
	 */
	public $type = 'targetweb-heading';

	/**
	 * Render the heading. No setting value is edited.
	 */
	public function render_content() {
		if ( $this->label ) {
			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
		}
		if ( $this->description ) {
			echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
	}
}
