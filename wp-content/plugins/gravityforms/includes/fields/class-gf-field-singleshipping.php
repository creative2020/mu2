<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}


class GF_Field_SingleShipping extends GF_Field {

	public $type = 'singleshipping';

	function get_form_editor_field_settings() {
		return array(
			'base_price_setting',
		);
	}

	public function get_form_editor_button() {
		return array();
	}

	public function get_field_input( $form, $value = '', $entry = null ) {
<<<<<<< HEAD
		$form_id         = $form['id'];
=======
		$form_id         = absint( $form['id'] );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();

		$id       = (int) $this->id;
		$field_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";

		$currency = $is_entry_detail && ! empty( $entry ) ? $entry['currency'] : '';

		$price = ! empty( $value ) ? $value : $this->basePrice;
		if ( empty( $price ) ) {
			$price = 0;
		}

<<<<<<< HEAD
=======
		$price = esc_attr( $price );

>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		return "<div class='ginput_container'>
					<input type='hidden' name='input_{$id}' value='{$price}' class='gform_hidden'/>
					<span class='ginput_shipping_price' id='{$field_id}'>" . GFCommon::to_money( $price, $currency ) . '</span>
				</div>';
	}

	public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {
		return GFCommon::to_money( $value, $currency );
	}

	public function sanitize_settings() {
		parent::sanitize_settings();
		$price_number    = GFCommon::to_number( $this->basePrice );
		$this->basePrice = GFCommon::to_money( $price_number );
	}
}

GF_Fields::register( new GF_Field_SingleShipping() );