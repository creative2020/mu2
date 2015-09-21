<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}


class GF_Field_Option extends GF_Field {

	public $type = 'option';

	function get_form_editor_field_settings() {
		return array(
			'product_field_setting',
			'option_field_type_setting',
			'conditional_logic_field_setting',
			'prepopulate_field_setting',
			'label_setting',
			'admin_label_setting',
			'label_placement_setting',
			'default_value_setting',
			'placeholder_setting',
			'description_setting',
			'css_class_setting',
		);
	}

	public function get_form_editor_field_title() {
<<<<<<< HEAD
		return __( 'Option', 'gravityforms' );
=======
		return esc_attr__( 'Option', 'gravityforms' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

}

GF_Fields::register( new GF_Field_Option() );