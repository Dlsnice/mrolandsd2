<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GF_Field_Page extends GF_Field {

	public $type = 'page';

	public function get_form_editor_field_title() {
		return esc_attr__( 'Page', 'gravityforms' );
	}

	/**
	 * Returns the field's form editor description.
	 *
	 * @since 2.5
	 *
	 * @return string
	 */
	public function get_form_editor_field_description() {
		return esc_attr__( 'Allows multi-page forms.', 'gravityforms' );
	}

	/**
	 * Returns the field's form editor icon.
	 *
	 * This could be an icon url or a gform-icon class.
	 *
	 * @since 2.5
	 *
	 * @return string
	 */
	public function get_form_editor_field_icon() {
		return 'gform-icon--page';
	}

	function get_form_editor_field_settings() {
		return array(
			'next_button_setting',
			'previous_button_setting',
			'css_class_setting',
			'conditional_logic_page_setting',
			'conditional_logic_nextbutton_setting',
		);
	}

	public function get_field_content( $value, $force_frontend_label, $form ) {
		$admin_buttons = $this->get_admin_buttons();
<<<<<<< HEAD
		$field_content = "{$admin_buttons} <label class='gfield_label'>&nbsp;</label><div class='gf-pagebreak-inline gf-pagebreak'>" . esc_html__( 'Page Break', 'gravityforms' ) . '</div>';
=======
		$field_content = "{$admin_buttons} <label class='gfield_label'>&nbsp;</label><div class='gf-pagebreak-inline gf-pagebreak'>" . esc_html__( 'PAGE BREAK', 'gravityforms' ) . '</div>';
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
		return $field_content;
	}

	public function sanitize_settings() {
		parent::sanitize_settings();
		if ( $this->nextButton ) {
<<<<<<< HEAD
			if ( isset( $this->nextButton['imageUrl'] ) )  {
				$this->nextButton['imageUrl'] = wp_strip_all_tags( $this->nextButton['imageUrl'] );
			}
=======
			$this->nextButton['imageUrl'] = wp_strip_all_tags( $this->nextButton['imageUrl'] );
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
			$allowed_tags      = wp_kses_allowed_html( 'post' );
			$this->nextButton['text'] = wp_kses( $this->nextButton['text'], $allowed_tags );
			$this->nextButton['type'] = wp_strip_all_tags( $this->nextButton['type'] );
			if ( isset( $this->nextButton['conditionalLogic'] ) && is_array( $this->nextButton['conditionalLogic'] ) ) {
				$this->nextButton['conditionalLogic'] = $this->sanitize_settings_conditional_logic( $this->nextButton['conditionalLogic'] );
			}
		}
	}

}

<<<<<<< HEAD
GF_Fields::register( new GF_Field_Page() );
=======
GF_Fields::register( new GF_Field_Page() );
>>>>>>> f26e4f95b60bfd1cf1147cc07e0ad43a657b7fd6
