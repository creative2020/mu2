<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class GF_Field_Address extends GF_Field {

	public $type = 'address';

	function get_form_editor_field_settings() {
		return array(
			'conditional_logic_field_setting',
			'prepopulate_field_setting',
			'error_message_setting',
			'label_setting',
			'admin_label_setting',
			'label_placement_setting',
			'sub_label_placement_setting',
			'default_input_values_setting',
			'input_placeholders_setting',
			'address_setting',
			'rules_setting',
			'copy_values_option',
			'description_setting',
			'visibility_setting',
			'css_class_setting',
		);
	}

	public function get_form_editor_field_title() {
<<<<<<< HEAD
		return __( 'Address', 'gravityforms' );
=======
		return esc_attr__( 'Address', 'gravityforms' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	function validate( $value, $form ) {

		if ( $this->isRequired ) {
			$copy_values_option_activated = $this->enableCopyValuesOption && rgpost( 'input_' . $this->id . '_copy_values_activated' );
			if ( $copy_values_option_activated ) {
				// validation will occur in the source field
				return;
			}

			$street  = rgpost( 'input_' . $this->id . '_1' );
			$city    = rgpost( 'input_' . $this->id . '_3' );
			$state   = rgpost( 'input_' . $this->id . '_4' );
			$zip     = rgpost( 'input_' . $this->id . '_5' );
			$country = rgpost( 'input_' . $this->id . '_6' );

			if ( empty( $street ) && ! $this->get_input_property( $this->id . '.1', 'isHidden' )
			     || empty( $city ) && ! $this->get_input_property( $this->id . '.3', 'isHidden' )
			     || empty( $zip ) && ! $this->get_input_property( $this->id . '.5', 'isHidden' )
			     || ( empty( $state ) && ! ( $this->hideState || $this->get_input_property( $this->id . '.4', 'isHidden' ) ) )
			     || ( empty( $country ) && ! ( $this->hideCountry || $this->get_input_property( $this->id . '.6', 'isHidden' ) ) )
			) {
				$this->failed_validation  = true;
<<<<<<< HEAD
				$this->validation_message = empty( $this->errorMessage ) ? __( 'This field is required. Please enter a complete address.', 'gravityforms' ) : $this->errorMessage;
=======
				$this->validation_message = empty( $this->errorMessage ) ? esc_html__( 'This field is required. Please enter a complete address.', 'gravityforms' ) : $this->errorMessage;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}
		}
	}

	public function get_value_submission( $field_values, $get_from_post_global_var = true ) {

		$value = parent::get_value_submission( $field_values, $get_from_post_global_var );
<<<<<<< HEAD
		$value[ $this->id . '_copy_values_activated' ] = rgpost( 'input_' . $this->id . '_copy_values_activated' );
=======
		$value[ $this->id . '_copy_values_activated' ] = (bool) rgpost( 'input_' . $this->id . '_copy_values_activated' );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		return $value;
	}

	public function get_field_input( $form, $value = '', $entry = null ) {

		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();
		$is_admin = $is_entry_detail || $is_form_editor;

<<<<<<< HEAD
		$form_id  = $form['id'];
=======
		$form_id  = absint( $form['id'] );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		$id       = intval( $this->id );
		$field_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";
		$form_id  = ( $is_entry_detail || $is_form_editor ) && empty( $form_id ) ? rgget( 'id' ) : $form_id;

		$disabled_text = $is_form_editor ? "disabled='disabled'" : '';
		$class_suffix  = $is_entry_detail ? '_admin' : '';

		$form_sub_label_placement  = rgar( $form, 'subLabelPlacement' );
		$field_sub_label_placement = $this->subLabelPlacement;
		$is_sub_label_above        = $field_sub_label_placement == 'above' || ( empty( $field_sub_label_placement ) && $form_sub_label_placement == 'above' );
<<<<<<< HEAD
		$sub_label_class_attribute = $field_sub_label_placement == 'hidden_label' ? "class='hidden_sub_label'" : '';
=======
		$sub_label_class_attribute = $field_sub_label_placement == 'hidden_label' ? "class='hidden_sub_label screen-reader-text'" : '';
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		$street_value  = '';
		$street2_value = '';
		$city_value    = '';
		$state_value   = '';
		$zip_value     = '';
		$country_value = '';

		if ( is_array( $value ) ) {
			$street_value  = esc_attr( rgget( $this->id . '.1', $value ) );
			$street2_value = esc_attr( rgget( $this->id . '.2', $value ) );
			$city_value    = esc_attr( rgget( $this->id . '.3', $value ) );
			$state_value   = esc_attr( rgget( $this->id . '.4', $value ) );
			$zip_value     = esc_attr( rgget( $this->id . '.5', $value ) );
			$country_value = esc_attr( rgget( $this->id . '.6', $value ) );
		}

		//Inputs
		$address_street_field_input  = GFFormsModel::get_input( $this, $this->id . '.1' );
		$address_street2_field_input = GFFormsModel::get_input( $this, $this->id . '.2' );
		$address_city_field_input    = GFFormsModel::get_input( $this, $this->id . '.3' );
		$address_state_field_input   = GFFormsModel::get_input( $this, $this->id . '.4' );
		$address_zip_field_input     = GFFormsModel::get_input( $this, $this->id . '.5' );
		$address_country_field_input = GFFormsModel::get_input( $this, $this->id . '.6' );

		//Placeholders
		$street_placeholder_attribute  = GFCommon::get_input_placeholder_attribute( $address_street_field_input );
		$street2_placeholder_attribute = GFCommon::get_input_placeholder_attribute( $address_street2_field_input );
		$city_placeholder_attribute    = GFCommon::get_input_placeholder_attribute( $address_city_field_input );
		$zip_placeholder_attribute     = GFCommon::get_input_placeholder_attribute( $address_zip_field_input );

		$address_types = $this->get_address_types( $form_id );
		$addr_type     = empty( $this->addressType ) ? 'international' : $this->addressType;
		$address_type  = $address_types[ $addr_type ];

<<<<<<< HEAD
		$state_label  = empty( $address_type['state_label'] ) ? __( 'State', 'gravityforms' ) : $address_type['state_label'];
		$zip_label    = empty( $address_type['zip_label'] ) ? __( 'Zip Code', 'gravityforms' ) : $address_type['zip_label'];
=======
		$state_label  = empty( $address_type['state_label'] ) ? esc_html__( 'State', 'gravityforms' ) : $address_type['state_label'];
		$zip_label    = empty( $address_type['zip_label'] ) ? esc_html__( 'Zip Code', 'gravityforms' ) : $address_type['zip_label'];
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		$hide_country = ! empty( $address_type['country'] ) || $this->hideCountry || rgar( $address_country_field_input, 'isHidden' );

		if ( empty( $country_value ) ) {
			$country_value = $this->defaultCountry;
		}

		if ( empty( $state_value ) ) {
			$state_value = $this->defaultState;
		}

		$country_placeholder = GFCommon::get_input_placeholder_value( $address_country_field_input );
		$country_list        = $this->get_country_dropdown( $country_value, $country_placeholder );

		//changing css classes based on field format to ensure proper display
		$address_display_format = apply_filters( 'gform_address_display_format', 'default', $this );
		$city_location          = $address_display_format == 'zip_before_city' ? 'right' : 'left';
		$zip_location           = $address_display_format != 'zip_before_city' && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ? 'right' : 'left'; // support for $this->hideState legacy property
		$state_location         = $address_display_format == 'zip_before_city' ? 'left' : 'right';
		$country_location       = $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ? 'left' : 'right'; // support for $this->hideState legacy property

		//labels
<<<<<<< HEAD
		$address_street_sub_label  = rgar( $address_street_field_input, 'customLabel' ) != '' ? $address_street_field_input['customLabel'] : __( 'Street Address', 'gravityforms' );
		$address_street_sub_label  = apply_filters( 'gform_address_street_{$form_id}', apply_filters( 'gform_address_street', $address_street_sub_label, $form_id ), $form_id );
		$address_street2_sub_label = rgar( $address_street2_field_input, 'customLabel' ) != '' ? $address_street2_field_input['customLabel'] : __( 'Address Line 2', 'gravityforms' );
		$address_street2_sub_label = apply_filters( "gform_address_street2_{$form_id}", apply_filters( 'gform_address_street2', $address_street2_sub_label, $form_id ), $form_id );
		$address_zip_sub_label     = rgar( $address_zip_field_input, 'customLabel' ) != '' ? $address_zip_field_input['customLabel'] : $zip_label;
		$address_zip_sub_label     = apply_filters( "gform_address_zip_{$form_id}", apply_filters( 'gform_address_zip', $address_zip_sub_label, $form_id ), $form_id );
		$address_city_sub_label    = rgar( $address_city_field_input, 'customLabel' ) != '' ? $address_city_field_input['customLabel'] : __( 'City', 'gravityforms' );
		$address_city_sub_label    = apply_filters( "gform_address_city_{$form_id}", apply_filters( 'gform_address_city', $address_city_sub_label, $form_id ), $form_id );
		$address_state_sub_label   = rgar( $address_state_field_input, 'customLabel' ) != '' ? $address_state_field_input['customLabel'] : $state_label;
		$address_state_sub_label   = apply_filters( "gform_address_state_{$form_id}", apply_filters( 'gform_address_state', $address_state_sub_label, $form_id ), $form_id );
		$address_country_sub_label = rgar( $address_country_field_input, 'customLabel' ) != '' ? $address_country_field_input['customLabel'] : __( 'Country', 'gravityforms' );
		$address_country_sub_label = apply_filters( "gform_address_country_{$form_id}", apply_filters( 'gform_address_country', $address_country_sub_label, $form_id ), $form_id );
=======
		$address_street_sub_label  = rgar( $address_street_field_input, 'customLabel' ) != '' ? $address_street_field_input['customLabel'] : esc_html__( 'Street Address', 'gravityforms' );
		$address_street_sub_label  = gf_apply_filters( 'gform_address_street', $form_id, $address_street_sub_label, $form_id );
		$address_street_sub_label  = esc_html( $address_street_sub_label );
		$address_street2_sub_label = rgar( $address_street2_field_input, 'customLabel' ) != '' ? $address_street2_field_input['customLabel'] : esc_html__( 'Address Line 2', 'gravityforms' );
		$address_street2_sub_label = gf_apply_filters( 'gform_address_street2', $form_id, $address_street2_sub_label, $form_id );
		$address_street2_sub_label = esc_html( $address_street2_sub_label );
		$address_zip_sub_label     = rgar( $address_zip_field_input, 'customLabel' ) != '' ? $address_zip_field_input['customLabel'] : $zip_label;
		$address_zip_sub_label     = gf_apply_filters( 'gform_address_zip', $form_id, $address_zip_sub_label, $form_id );
		$address_zip_sub_label     = esc_html( $address_zip_sub_label );
		$address_city_sub_label    = rgar( $address_city_field_input, 'customLabel' ) != '' ? $address_city_field_input['customLabel'] : esc_html__( 'City', 'gravityforms' );
		$address_city_sub_label    = gf_apply_filters( 'gform_address_city', $form_id, $address_city_sub_label, $form_id );
		$address_city_sub_label    = esc_html( $address_city_sub_label );
		$address_state_sub_label   = rgar( $address_state_field_input, 'customLabel' ) != '' ? $address_state_field_input['customLabel'] : $state_label;
		$address_state_sub_label   = gf_apply_filters( 'gform_address_state', $form_id, $address_state_sub_label, $form_id );
		$address_state_sub_label   = esc_html( $address_state_sub_label );
		$address_country_sub_label = rgar( $address_country_field_input, 'customLabel' ) != '' ? $address_country_field_input['customLabel'] : esc_html__( 'Country', 'gravityforms' );
		$address_country_sub_label = gf_apply_filters( 'gform_address_country', $form_id, $address_country_sub_label, $form_id );
		$address_country_sub_label = esc_html( $address_country_sub_label );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		//address field
		$street_address = '';
		$tabindex       = $this->get_tabindex();
		$style          = ( $is_admin && rgar( $address_street_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
		if ( $is_admin || ! rgar( $address_street_field_input, 'isHidden' ) ) {
			if ( $is_sub_label_above ) {
<<<<<<< HEAD
				$street_address = " <span class='ginput_full{$class_suffix}' id='{$field_id}_1_container' {$style}>
                                                <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                                <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                            </span>";
			} else {
				$street_address = " <span class='ginput_full{$class_suffix}' id='{$field_id}_1_container' {$style}>
                                                <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                                <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                            </span>";
=======
				$street_address = " <span class='ginput_full{$class_suffix} address_line_1' id='{$field_id}_1_container' {$style}>
                                        <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                        <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                    </span>";
			} else {
				$street_address = " <span class='ginput_full{$class_suffix} address_line_1' id='{$field_id}_1_container' {$style}>
                                        <input type='text' name='input_{$id}.1' id='{$field_id}_1' value='{$street_value}' {$tabindex} {$disabled_text} {$street_placeholder_attribute}/>
                                        <label for='{$field_id}_1' id='{$field_id}_1_label' {$sub_label_class_attribute}>{$address_street_sub_label}</label>
                                    </span>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}
		}

		//address line 2 field
		$street_address2 = '';
		$style           = ( $is_admin && ( $this->hideAddress2 || rgar( $address_street2_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideAddress2 legacy property
		if ( $is_admin || ( ! $this->hideAddress2 && ! rgar( $address_street2_field_input, 'isHidden' ) ) ) {
			$tabindex = $this->get_tabindex();
			if ( $is_sub_label_above ) {
<<<<<<< HEAD
				$street_address2 = "<span class='ginput_full{$class_suffix}' id='{$field_id}_2_container' {$style}>
                                                <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                                <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                            </span>";
			} else {
				$street_address2 = "<span class='ginput_full{$class_suffix}' id='{$field_id}_2_container' {$style}>
                                                <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                                <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                            </span>";
=======
				$street_address2 = "<span class='ginput_full{$class_suffix} address_line_2' id='{$field_id}_2_container' {$style}>
                                        <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                        <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                    </span>";
			} else {
				$street_address2 = "<span class='ginput_full{$class_suffix} address_line_2' id='{$field_id}_2_container' {$style}>
                                        <input type='text' name='input_{$id}.2' id='{$field_id}_2' value='{$street2_value}' {$tabindex} {$disabled_text} {$street2_placeholder_attribute}/>
                                        <label for='{$field_id}_2' id='{$field_id}_2_label' {$sub_label_class_attribute}>{$address_street2_sub_label}</label>
                                    </span>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}
		}

		if ( $address_display_format == 'zip_before_city' ) {
			//zip field
			$zip      = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_zip_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_zip_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$zip = "<span class='ginput_{$zip_location}{$class_suffix}' id='{$field_id}_5_container' {$style}>
=======
					$zip = "<span class='ginput_{$zip_location}{$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                </span>";
				} else {
<<<<<<< HEAD
					$zip = "<span class='ginput_{$zip_location}{$class_suffix}' id='{$field_id}_5_container' {$style}>
=======
					$zip = "<span class='ginput_{$zip_location}{$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                </span>";
				}
			}

			//city field
			$city     = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_city_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_city_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$city = "<span class='ginput_{$city_location}{$class_suffix}' id='{$field_id}_3_container' {$style}>
=======
					$city = "<span class='ginput_{$city_location}{$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                 </span>";
				} else {
<<<<<<< HEAD
					$city = "<span class='ginput_{$city_location}{$class_suffix}' id='{$field_id}_3_container' {$style}>
=======
					$city = "<span class='ginput_{$city_location}{$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                 </span>";
				}
			}

			//state field
			$style = ( $is_admin && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideState legacy property
			if ( $is_admin || ( ! $this->hideState && ! rgar( $address_state_field_input, 'isHidden' ) ) ) {
				$state_field = $this->get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id );
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$state = "<span class='ginput_{$state_location}{$class_suffix}' id='{$field_id}_4_container' {$style}>
=======
					$state = "<span class='ginput_{$state_location}{$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                           <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>{$address_state_sub_label}</label>
                                           $state_field
                                      </span>";
				} else {
<<<<<<< HEAD
					$state = "<span class='ginput_{$state_location}{$class_suffix}' id='{$field_id}_4_container' {$style}>
=======
					$state = "<span class='ginput_{$state_location}{$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                           $state_field
                                           <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>{$address_state_sub_label}</label>
                                      </span>";
				}
			} else {
				$state = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.4' id='%s_4' value='%s'/>", $id, $field_id, $state_value );
			}
		} else {

			//city field
			$city     = '';
			$tabindex = $this->get_tabindex();
			$style    = ( $is_admin && rgar( $address_city_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_city_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$city = "<span class='ginput_{$city_location}{$class_suffix}' id='{$field_id}_3_container' {$style}>
=======
					$city = "<span class='ginput_{$city_location}{$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                 </span>";
				} else {
<<<<<<< HEAD
					$city = "<span class='ginput_{$city_location}{$class_suffix}' id='{$field_id}_3_container' {$style}>
=======
					$city = "<span class='ginput_{$city_location}{$class_suffix} address_city' id='{$field_id}_3_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <input type='text' name='input_{$id}.3' id='{$field_id}_3' value='{$city_value}' {$tabindex} {$disabled_text} {$city_placeholder_attribute}/>
                                    <label for='{$field_id}_3' id='{$field_id}_3_label' {$sub_label_class_attribute}>{$address_city_sub_label}</label>
                                 </span>";
				}
			}

			//state field
			$style = ( $is_admin && ( $this->hideState || rgar( $address_state_field_input, 'isHidden' ) ) ) ? "style='display:none;'" : ''; // support for $this->hideState legacy property
			if ( $is_admin || ( ! $this->hideState && ! rgar( $address_state_field_input, 'isHidden' ) ) ) {
				$state_field = $this->get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id );
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$state = "<span class='ginput_{$state_location}{$class_suffix}' id='{$field_id}_4_container' {$style}>
=======
					$state = "<span class='ginput_{$state_location}{$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                        <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>$address_state_sub_label</label>
                                        $state_field
                                      </span>";
				} else {
<<<<<<< HEAD
					$state = "<span class='ginput_{$state_location}{$class_suffix}' id='{$field_id}_4_container' {$style}>
=======
					$state = "<span class='ginput_{$state_location}{$class_suffix} address_state' id='{$field_id}_4_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                        $state_field
                                        <label for='{$field_id}_4' id='{$field_id}_4_label' {$sub_label_class_attribute}>$address_state_sub_label</label>
                                      </span>";
				}
			} else {
				$state = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.4' id='%s_4' value='%s'/>", $id, $field_id, $state_value );
			}

			//zip field
			$zip      = '';
			$tabindex = GFCommon::get_tabindex();
			$style    = ( $is_admin && rgar( $address_zip_field_input, 'isHidden' ) ) ? "style='display:none;'" : '';
			if ( $is_admin || ! rgar( $address_zip_field_input, 'isHidden' ) ) {
				if ( $is_sub_label_above ) {
<<<<<<< HEAD
					$zip = "<span class='ginput_{$zip_location}{$class_suffix}' id='{$field_id}_5_container' {$style}>
=======
					$zip = "<span class='ginput_{$zip_location}{$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                </span>";
				} else {
<<<<<<< HEAD
					$zip = "<span class='ginput_{$zip_location}{$class_suffix}' id='{$field_id}_5_container' {$style}>
=======
					$zip = "<span class='ginput_{$zip_location}{$class_suffix} address_zip' id='{$field_id}_5_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                    <input type='text' name='input_{$id}.5' id='{$field_id}_5' value='{$zip_value}' {$tabindex} {$disabled_text} {$zip_placeholder_attribute}/>
                                    <label for='{$field_id}_5' id='{$field_id}_5_label' {$sub_label_class_attribute}>{$address_zip_sub_label}</label>
                                </span>";
				}
			}
		}

		if ( $is_admin || ! $hide_country ) {
			$style    = $hide_country ? "style='display:none;'" : '';
			$tabindex = $this->get_tabindex();
			if ( $is_sub_label_above ) {
<<<<<<< HEAD
				$country = "<span class='ginput_{$country_location}{$class_suffix}' id='{$field_id}_6_container' {$style}>
=======
				$country = "<span class='ginput_{$country_location}{$class_suffix} address_country' id='{$field_id}_6_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                        <label for='{$field_id}_6' id='{$field_id}_6_label' {$sub_label_class_attribute}>{$address_country_sub_label}</label>
                                        <select name='input_{$id}.6' id='{$field_id}_6' {$tabindex} {$disabled_text}>{$country_list}</select>
                                    </span>";
			} else {
<<<<<<< HEAD
				$country = "<span class='ginput_{$country_location}{$class_suffix}' id='{$field_id}_6_container' {$style}>
=======
				$country = "<span class='ginput_{$country_location}{$class_suffix} address_country' id='{$field_id}_6_container' {$style}>
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
                                        <select name='input_{$id}.6' id='{$field_id}_6' {$tabindex} {$disabled_text}>{$country_list}</select>
                                        <label for='{$field_id}_6' id='{$field_id}_6_label' {$sub_label_class_attribute}>{$address_country_sub_label}</label>
                                    </span>";
			}
		} else {
			$country = sprintf( "<input type='hidden' class='gform_hidden' name='input_%d.6' id='%s_6' value='%s'/>", $id, $field_id, $country_value );
		}

		$inputs = $address_display_format == 'zip_before_city' ? $street_address . $street_address2 . $zip . $city . $state . $country : $street_address . $street_address2 . $city . $state . $zip . $country;

		$copy_values_option = '';
		$input_style        = '';
		if ( ( $this->enableCopyValuesOption || $is_form_editor ) && ! $is_entry_detail ) {
			$copy_values_style      = $is_form_editor && ! $this->enableCopyValuesOption ? "style='display:none;'" : '';
			$copy_values_is_checked = isset( $value[$this->id . '_copy_values_activated'] ) ? $value[$this->id . '_copy_values_activated'] == true : $this->copyValuesOptionDefault == true;
			$copy_values_checked    = checked( true, $copy_values_is_checked, false );
			$copy_values_option     = "<div id='{$field_id}_copy_values_option_container' class='copy_values_option_container' {$copy_values_style}>
                                        <input type='checkbox' id='{$field_id}_copy_values_activated' class='copy_values_activated' value='1' name='input_{$id}_copy_values_activated' {$disabled_text} {$copy_values_checked}/>
                                        <label for='{$field_id}_copy_values_activated' id='{$field_id}_copy_values_option_label' class='copy_values_option_label inline'>{$this->copyValuesOptionLabel}</label>
                                    </div>";
			if ( $copy_values_is_checked ) {
				$input_style = "style='display:none;'";
			}
		}

		$css_class = $this->get_css_class();

		return "    {$copy_values_option}
                    <div class='ginput_complex{$class_suffix} ginput_container {$css_class}' id='$field_id' {$input_style}>
                        {$inputs}
                    <div class='gf_clear gf_clear_complex'></div>
                </div>";
	}

	public function get_css_class() {

		$address_street_field_input  = GFFormsModel::get_input( $this, $this->id . '.1' );
		$address_street2_field_input = GFFormsModel::get_input( $this, $this->id . '.2' );
		$address_city_field_input    = GFFormsModel::get_input( $this, $this->id . '.3' );
		$address_state_field_input   = GFFormsModel::get_input( $this, $this->id . '.4' );
		$address_zip_field_input     = GFFormsModel::get_input( $this, $this->id . '.5' );
		$address_country_field_input = GFFormsModel::get_input( $this, $this->id . '.6' );

		$css_class = '';
		if ( ! rgar( $address_street_field_input, 'isHidden' ) ) {
			$css_class .= 'has_street ';
		}
		if ( ! rgar( $address_street2_field_input, 'isHidden' ) ) {
			$css_class .= 'has_street2 ';
		}
		if ( ! rgar( $address_city_field_input, 'isHidden' ) ) {
			$css_class .= 'has_city ';
		}
		if ( ! rgar( $address_state_field_input, 'isHidden' ) ) {
			$css_class .= 'has_state ';
		}
		if ( ! rgar( $address_zip_field_input, 'isHidden' ) ) {
			$css_class .= 'has_zip ';
		}
		if ( ! rgar( $address_country_field_input, 'isHidden' ) ) {
			$css_class .= 'has_country ';
		}

		return trim( $css_class );
	}

	public function get_address_types( $form_id ) {

		$addressTypes = array(
<<<<<<< HEAD
			'international' => array( 'label' => __( 'International', 'gravityforms' ), 'zip_label' => apply_filters( "gform_address_zip_{$form_id}", apply_filters( 'gform_address_zip', __( 'ZIP / Postal Code', 'gravityforms' ), $form_id ), $form_id ), 'state_label' => apply_filters( "gform_address_state_{$form_id}", apply_filters( 'gform_address_state', __( 'State / Province / Region', 'gravityforms' ), $form_id ), $form_id ) ),
			'us'            => array( 'label' => __( 'United States', 'gravityforms' ), 'zip_label' => apply_filters( "gform_address_zip_{$form_id}", apply_filters( 'gform_address_zip', __( 'ZIP Code', 'gravityforms' ), $form_id ), $form_id ), 'state_label' => apply_filters( "gform_address_state_{$form_id}", apply_filters( 'gform_address_state', __( 'State', 'gravityforms' ), $form_id ), $form_id ), 'country' => 'United States', 'states' => array_merge( array( '' ), $this->get_us_states() ) ),
			'canadian'      => array( 'label' => __( 'Canadian', 'gravityforms' ), 'zip_label' => apply_filters( "gform_address_zip_{$form_id}", apply_filters( 'gform_address_zip', __( 'Postal Code', 'gravityforms' ), $form_id ), $form_id ), 'state_label' => apply_filters( "gform_address_state_{$form_id}", apply_filters( 'gform_address_state', __( 'Province', 'gravityforms' ), $form_id ), $form_id ), 'country' => 'Canada', 'states' => array_merge( array( '' ), $this->get_canadian_provinces() ) )
		);

		return apply_filters( "gform_address_types_{$form_id}", apply_filters( 'gform_address_types', $addressTypes, $form_id ), $form_id );
=======
			'international' => array( 'label'       => esc_html__( 'International', 'gravityforms' ),
			                          'zip_label'   => gf_apply_filters( 'gform_address_zip', $form_id, esc_html__( 'ZIP / Postal Code', 'gravityforms' ), $form_id ),
			                          'state_label' => gf_apply_filters( 'gform_address_state', $form_id, esc_html__( 'State / Province / Region', 'gravityforms' ), $form_id )
			),
			'us'            => array(
				'label'       => esc_html__( 'United States', 'gravityforms' ),
				'zip_label'   => gf_apply_filters( 'gform_address_zip', $form_id, esc_html__( 'ZIP Code', 'gravityforms' ), $form_id ),
				'state_label' => gf_apply_filters( 'gform_address_state', $form_id, esc_html__( 'State', 'gravityforms' ), $form_id ),
				'country'     => 'United States',
				'states'      => array_merge( array( '' ), $this->get_us_states() )
			),
			'canadian'      => array(
				'label'       => esc_html__( 'Canadian', 'gravityforms' ),
				'zip_label'   => gf_apply_filters( 'gform_address_zip', $form_id, esc_html__( 'Postal Code', 'gravityforms' ), $form_id ),
				'state_label' => gf_apply_filters( 'gform_address_state', $form_id, esc_html__( 'Province', 'gravityforms' ), $form_id ),
				'country'     => 'Canada',
				'states'      => array_merge( array( '' ), $this->get_canadian_provinces() )
			)
		);

		return gf_apply_filters( 'gform_address_types', $form_id, $addressTypes, $form_id );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	public function get_state_field( $id, $field_id, $state_value, $disabled_text, $form_id ) {

		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();
		$is_admin = $is_entry_detail || $is_form_editor;


		$state_dropdown_class = $state_text_class = $state_style = $text_style = $state_field_id = '';

		if ( empty( $state_value ) ) {
			$state_value = $this->defaultState;

			//for backwards compatibility (canadian address type used to store the default state into the defaultProvince property)
			if ( $this->addressType == 'canadian' && ! empty($this->defaultProvince) ) {
				$state_value = $this->defaultProvince;
			}
		}

		$address_type        = empty($this->addressType) ? 'international' : $this->addressType;
		$address_types       = $this->get_address_types( $form_id );
		$has_state_drop_down = isset( $address_types[ $address_type ]['states'] ) && is_array( $address_types[ $address_type ]['states'] );

		if ( $is_admin && RG_CURRENT_VIEW != 'entry' ) {
			$state_dropdown_class = "class='state_dropdown'";
			$state_text_class     = "class='state_text'";
			$state_style          = ! $has_state_drop_down ? "style='display:none;'" : '';
			$text_style           = $has_state_drop_down ? "style='display:none;'" : '';
			$state_field_id       = '';
		} else {
			//id only displayed on front end
			$state_field_id = "id='" . $field_id . "_4'";
		}

		$tabindex         = $this->get_tabindex();
		$state_input      = GFFormsModel::get_input( $this, $this->id . '.4' );
		$sate_placeholder = GFCommon::get_input_placeholder_value( $state_input );
		$states           = empty( $address_types[ $address_type ]['states'] ) ? array() : $address_types[ $address_type ]['states'];
		$state_dropdown   = sprintf( "<select name='input_%d.4' %s $tabindex %s $state_dropdown_class $state_style>%s</select>", $id, $state_field_id, $disabled_text, $this->get_state_dropdown( $states, $state_value, $sate_placeholder ) );

		$tabindex                    = $this->get_tabindex();
		$state_placeholder_attribute = GFCommon::get_input_placeholder_attribute( $state_input );
		$state_text                  = sprintf( "<input type='text' name='input_%d.4' %s value='%s' {$tabindex} %s {$state_text_class} {$text_style} {$state_placeholder_attribute}/>", $id, $state_field_id, $state_value, $disabled_text );

		if ( $is_admin && RG_CURRENT_VIEW != 'entry' ) {
			return $state_dropdown . $state_text;
		} elseif ( $has_state_drop_down ) {
			return $state_dropdown;
		} else {
			return $state_text;
		}
	}

	public function get_countries() {
		return apply_filters(
			'gform_countries', array(
<<<<<<< HEAD
				__( 'Afghanistan', 'gravityforms' ), __( 'Albania', 'gravityforms' ), __( 'Algeria', 'gravityforms' ), __( 'American Samoa', 'gravityforms' ), __( 'Andorra', 'gravityforms' ), __( 'Angola', 'gravityforms' ), __( 'Antigua and Barbuda', 'gravityforms' ), __( 'Argentina', 'gravityforms' ), __( 'Armenia', 'gravityforms' ), __( 'Australia', 'gravityforms' ), __( 'Austria', 'gravityforms' ), __( 'Azerbaijan', 'gravityforms' ), __( 'Bahamas', 'gravityforms' ), __( 'Bahrain', 'gravityforms' ), __( 'Bangladesh', 'gravityforms' ), __( 'Barbados', 'gravityforms' ), __( 'Belarus', 'gravityforms' ), __( 'Belgium', 'gravityforms' ), __( 'Belize', 'gravityforms' ), __( 'Benin', 'gravityforms' ), __( 'Bermuda', 'gravityforms' ), __( 'Bhutan', 'gravityforms' ), __( 'Bolivia', 'gravityforms' ), __( 'Bosnia and Herzegovina', 'gravityforms' ), __( 'Botswana', 'gravityforms' ), __( 'Brazil', 'gravityforms' ), __( 'Brunei', 'gravityforms' ), __( 'Bulgaria', 'gravityforms' ), __( 'Burkina Faso', 'gravityforms' ), __( 'Burundi', 'gravityforms' ), __( 'Cambodia', 'gravityforms' ), __( 'Cameroon', 'gravityforms' ), __( 'Canada', 'gravityforms' ), __( 'Cape Verde', 'gravityforms' ), __( 'Cayman Islands', 'gravityforms' ), __( 'Central African Republic', 'gravityforms' ), __( 'Chad', 'gravityforms' ), __( 'Chile', 'gravityforms' ), __( 'China', 'gravityforms' ), __( 'Colombia', 'gravityforms' ), __( 'Comoros', 'gravityforms' ), __( 'Congo, Democratic Republic of the', 'gravityforms' ), __( 'Congo, Republic of the', 'gravityforms' ), __( 'Costa Rica', 'gravityforms' ), __( 'C&ocirc;te d\'Ivoire', 'gravityforms' ), __( 'Croatia', 'gravityforms' ), __( 'Cuba', 'gravityforms' ), __( 'Cyprus', 'gravityforms' ), __( 'Czech Republic', 'gravityforms' ), __( 'Denmark', 'gravityforms' ), __( 'Djibouti', 'gravityforms' ), __( 'Dominica', 'gravityforms' ), __( 'Dominican Republic', 'gravityforms' ), __( 'East Timor', 'gravityforms' ), __( 'Ecuador', 'gravityforms' ), __( 'Egypt', 'gravityforms' ), __( 'El Salvador', 'gravityforms' ), __( 'Equatorial Guinea', 'gravityforms' ), __( 'Eritrea', 'gravityforms' ), __( 'Estonia', 'gravityforms' ), __( 'Ethiopia', 'gravityforms' ), __( 'Faroe Islands', 'gravityforms' ), __( 'Fiji', 'gravityforms' ), __( 'Finland', 'gravityforms' ), __( 'France', 'gravityforms' ), __( 'French Polynesia', 'gravityforms' ), __( 'Gabon', 'gravityforms' ),
				__( 'Gambia', 'gravityforms' ), _x( 'Georgia', 'Country', 'gravityforms' ), __( 'Germany', 'gravityforms' ), __( 'Ghana', 'gravityforms' ), __( 'Greece', 'gravityforms' ), __( 'Greenland', 'gravityforms' ), __( 'Grenada', 'gravityforms' ), __( 'Guam', 'gravityforms' ), __( 'Guatemala', 'gravityforms' ), __( 'Guinea', 'gravityforms' ), __( 'Guinea-Bissau', 'gravityforms' ), __( 'Guyana', 'gravityforms' ), __( 'Haiti', 'gravityforms' ), __( 'Honduras', 'gravityforms' ), __( 'Hong Kong', 'gravityforms' ), __( 'Hungary', 'gravityforms' ), __( 'Iceland', 'gravityforms' ), __( 'India', 'gravityforms' ), __( 'Indonesia', 'gravityforms' ), __( 'Iran', 'gravityforms' ), __( 'Iraq', 'gravityforms' ), __( 'Ireland', 'gravityforms' ), __( 'Israel', 'gravityforms' ), __( 'Italy', 'gravityforms' ), __( 'Jamaica', 'gravityforms' ), __( 'Japan', 'gravityforms' ), __( 'Jordan', 'gravityforms' ), __( 'Kazakhstan', 'gravityforms' ), __( 'Kenya', 'gravityforms' ), __( 'Kiribati', 'gravityforms' ), __( 'North Korea', 'gravityforms' ), __( 'South Korea', 'gravityforms' ), __( 'Kosovo', 'gravityforms' ), __( 'Kuwait', 'gravityforms' ), __( 'Kyrgyzstan', 'gravityforms' ), __( 'Laos', 'gravityforms' ), __( 'Latvia', 'gravityforms' ), __( 'Lebanon', 'gravityforms' ), __( 'Lesotho', 'gravityforms' ), __( 'Liberia', 'gravityforms' ), __( 'Libya', 'gravityforms' ), __( 'Liechtenstein', 'gravityforms' ), __( 'Lithuania', 'gravityforms' ), __( 'Luxembourg', 'gravityforms' ), __( 'Macedonia', 'gravityforms' ), __( 'Madagascar', 'gravityforms' ), __( 'Malawi', 'gravityforms' ), __( 'Malaysia', 'gravityforms' ), __( 'Maldives', 'gravityforms' ), __( 'Mali', 'gravityforms' ), __( 'Malta', 'gravityforms' ), __( 'Marshall Islands', 'gravityforms' ), __( 'Mauritania', 'gravityforms' ), __( 'Mauritius', 'gravityforms' ), __( 'Mexico', 'gravityforms' ), __( 'Micronesia', 'gravityforms' ), __( 'Moldova', 'gravityforms' ), __( 'Monaco', 'gravityforms' ), __( 'Mongolia', 'gravityforms' ), __( 'Montenegro', 'gravityforms' ), __( 'Morocco', 'gravityforms' ), __( 'Mozambique', 'gravityforms' ), __( 'Myanmar', 'gravityforms' ), __( 'Namibia', 'gravityforms' ), __( 'Nauru', 'gravityforms' ), __( 'Nepal', 'gravityforms' ), __( 'Netherlands', 'gravityforms' ), __( 'New Zealand', 'gravityforms' ),
				__( 'Nicaragua', 'gravityforms' ), __( 'Niger', 'gravityforms' ), __( 'Nigeria', 'gravityforms' ), __( 'Northern Mariana Islands', 'gravityforms' ), __( 'Norway', 'gravityforms' ), __( 'Oman', 'gravityforms' ), __( 'Pakistan', 'gravityforms' ), __( 'Palau', 'gravityforms' ), __( 'Palestine, State of', 'gravityforms' ), __( 'Panama', 'gravityforms' ), __( 'Papua New Guinea', 'gravityforms' ), __( 'Paraguay', 'gravityforms' ), __( 'Peru', 'gravityforms' ), __( 'Philippines', 'gravityforms' ), __( 'Poland', 'gravityforms' ), __( 'Portugal', 'gravityforms' ), __( 'Puerto Rico', 'gravityforms' ), __( 'Qatar', 'gravityforms' ), __( 'Romania', 'gravityforms' ), __( 'Russia', 'gravityforms' ), __( 'Rwanda', 'gravityforms' ), __( 'Saint Kitts and Nevis', 'gravityforms' ), __( 'Saint Lucia', 'gravityforms' ), __( 'Saint Vincent and the Grenadines', 'gravityforms' ), __( 'Samoa', 'gravityforms' ), __( 'San Marino', 'gravityforms' ), __( 'Sao Tome and Principe', 'gravityforms' ), __( 'Saudi Arabia', 'gravityforms' ), __( 'Senegal', 'gravityforms' ), __( 'Serbia and Montenegro', 'gravityforms' ), __( 'Seychelles', 'gravityforms' ), __( 'Sierra Leone', 'gravityforms' ), __( 'Singapore', 'gravityforms' ), __( 'Sint Maarten', 'gravityforms' ), __( 'Slovakia', 'gravityforms' ), __( 'Slovenia', 'gravityforms' ), __( 'Solomon Islands', 'gravityforms' ), __( 'Somalia', 'gravityforms' ), __( 'South Africa', 'gravityforms' ), __( 'Spain', 'gravityforms' ), __( 'Sri Lanka', 'gravityforms' ), __( 'Sudan', 'gravityforms' ), __( 'Sudan, South', 'gravityforms' ), __( 'Suriname', 'gravityforms' ), __( 'Swaziland', 'gravityforms' ), __( 'Sweden', 'gravityforms' ), __( 'Switzerland', 'gravityforms' ), __( 'Syria', 'gravityforms' ), __( 'Taiwan', 'gravityforms' ), __( 'Tajikistan', 'gravityforms' ), __( 'Tanzania', 'gravityforms' ), __( 'Thailand', 'gravityforms' ), __( 'Togo', 'gravityforms' ), __( 'Tonga', 'gravityforms' ), __( 'Trinidad and Tobago', 'gravityforms' ), __( 'Tunisia', 'gravityforms' ), __( 'Turkey', 'gravityforms' ), __( 'Turkmenistan', 'gravityforms' ), __( 'Tuvalu', 'gravityforms' ), __( 'Uganda', 'gravityforms' ), __( 'Ukraine', 'gravityforms' ), __( 'United Arab Emirates', 'gravityforms' ), __( 'United Kingdom', 'gravityforms' ),
				__( 'United States', 'gravityforms' ), __( 'Uruguay', 'gravityforms' ), __( 'Uzbekistan', 'gravityforms' ), __( 'Vanuatu', 'gravityforms' ), __( 'Vatican City', 'gravityforms' ), __( 'Venezuela', 'gravityforms' ), __( 'Vietnam', 'gravityforms' ), __( 'Virgin Islands, British', 'gravityforms' ), __( 'Virgin Islands, U.S.', 'gravityforms' ), __( 'Yemen', 'gravityforms' ), __( 'Zambia', 'gravityforms' ), __( 'Zimbabwe', 'gravityforms' ),
=======
				esc_html__( 'Afghanistan', 'gravityforms' ), esc_html__( 'Albania', 'gravityforms' ), esc_html__( 'Algeria', 'gravityforms' ), esc_html__( 'American Samoa', 'gravityforms' ), esc_html__( 'Andorra', 'gravityforms' ), esc_html__( 'Angola', 'gravityforms' ), esc_html__( 'Antigua and Barbuda', 'gravityforms' ), esc_html__( 'Argentina', 'gravityforms' ), esc_html__( 'Armenia', 'gravityforms' ), esc_html__( 'Australia', 'gravityforms' ), esc_html__( 'Austria', 'gravityforms' ), esc_html__( 'Azerbaijan', 'gravityforms' ), esc_html__( 'Bahamas', 'gravityforms' ), esc_html__( 'Bahrain', 'gravityforms' ), esc_html__( 'Bangladesh', 'gravityforms' ), esc_html__( 'Barbados', 'gravityforms' ), esc_html__( 'Belarus', 'gravityforms' ), esc_html__( 'Belgium', 'gravityforms' ), esc_html__( 'Belize', 'gravityforms' ), esc_html__( 'Benin', 'gravityforms' ), esc_html__( 'Bermuda', 'gravityforms' ), esc_html__( 'Bhutan', 'gravityforms' ), esc_html__( 'Bolivia', 'gravityforms' ), esc_html__( 'Bosnia and Herzegovina', 'gravityforms' ), esc_html__( 'Botswana', 'gravityforms' ), esc_html__( 'Brazil', 'gravityforms' ), esc_html__( 'Brunei', 'gravityforms' ), esc_html__( 'Bulgaria', 'gravityforms' ), esc_html__( 'Burkina Faso', 'gravityforms' ), esc_html__( 'Burundi', 'gravityforms' ), esc_html__( 'Cambodia', 'gravityforms' ), esc_html__( 'Cameroon', 'gravityforms' ), esc_html__( 'Canada', 'gravityforms' ), esc_html__( 'Cape Verde', 'gravityforms' ), esc_html__( 'Cayman Islands', 'gravityforms' ), esc_html__( 'Central African Republic', 'gravityforms' ), esc_html__( 'Chad', 'gravityforms' ), esc_html__( 'Chile', 'gravityforms' ), esc_html__( 'China', 'gravityforms' ), esc_html__( 'Colombia', 'gravityforms' ), esc_html__( 'Comoros', 'gravityforms' ), esc_html__( 'Congo, Democratic Republic of the', 'gravityforms' ), esc_html__( 'Congo, Republic of the', 'gravityforms' ), esc_html__( 'Costa Rica', 'gravityforms' ), esc_html__( "Côte d'Ivoire", 'gravityforms' ), esc_html__( 'Croatia', 'gravityforms' ), esc_html__( 'Cuba', 'gravityforms' ), esc_html__( 'Cyprus', 'gravityforms' ), esc_html__( 'Czech Republic', 'gravityforms' ), esc_html__( 'Denmark', 'gravityforms' ), esc_html__( 'Djibouti', 'gravityforms' ), esc_html__( 'Dominica', 'gravityforms' ), esc_html__( 'Dominican Republic', 'gravityforms' ), esc_html__( 'East Timor', 'gravityforms' ), esc_html__( 'Ecuador', 'gravityforms' ), esc_html__( 'Egypt', 'gravityforms' ), esc_html__( 'El Salvador', 'gravityforms' ), esc_html__( 'Equatorial Guinea', 'gravityforms' ), esc_html__( 'Eritrea', 'gravityforms' ), esc_html__( 'Estonia', 'gravityforms' ), esc_html__( 'Ethiopia', 'gravityforms' ), esc_html__( 'Faroe Islands', 'gravityforms' ), esc_html__( 'Fiji', 'gravityforms' ), esc_html__( 'Finland', 'gravityforms' ), esc_html__( 'France', 'gravityforms' ), esc_html__( 'French Polynesia', 'gravityforms' ), esc_html__( 'Gabon', 'gravityforms' ),
				esc_html__( 'Gambia', 'gravityforms' ), _x( 'Georgia', 'Country', 'gravityforms' ), esc_html__( 'Germany', 'gravityforms' ), esc_html__( 'Ghana', 'gravityforms' ), esc_html__( 'Greece', 'gravityforms' ), esc_html__( 'Greenland', 'gravityforms' ), esc_html__( 'Grenada', 'gravityforms' ), esc_html__( 'Guam', 'gravityforms' ), esc_html__( 'Guatemala', 'gravityforms' ), esc_html__( 'Guinea', 'gravityforms' ), esc_html__( 'Guinea-Bissau', 'gravityforms' ), esc_html__( 'Guyana', 'gravityforms' ), esc_html__( 'Haiti', 'gravityforms' ), esc_html__( 'Honduras', 'gravityforms' ), esc_html__( 'Hong Kong', 'gravityforms' ), esc_html__( 'Hungary', 'gravityforms' ), esc_html__( 'Iceland', 'gravityforms' ), esc_html__( 'India', 'gravityforms' ), esc_html__( 'Indonesia', 'gravityforms' ), esc_html__( 'Iran', 'gravityforms' ), esc_html__( 'Iraq', 'gravityforms' ), esc_html__( 'Ireland', 'gravityforms' ), esc_html__( 'Israel', 'gravityforms' ), esc_html__( 'Italy', 'gravityforms' ), esc_html__( 'Jamaica', 'gravityforms' ), esc_html__( 'Japan', 'gravityforms' ), esc_html__( 'Jordan', 'gravityforms' ), esc_html__( 'Kazakhstan', 'gravityforms' ), esc_html__( 'Kenya', 'gravityforms' ), esc_html__( 'Kiribati', 'gravityforms' ), esc_html__( 'North Korea', 'gravityforms' ), esc_html__( 'South Korea', 'gravityforms' ), esc_html__( 'Kosovo', 'gravityforms' ), esc_html__( 'Kuwait', 'gravityforms' ), esc_html__( 'Kyrgyzstan', 'gravityforms' ), esc_html__( 'Laos', 'gravityforms' ), esc_html__( 'Latvia', 'gravityforms' ), esc_html__( 'Lebanon', 'gravityforms' ), esc_html__( 'Lesotho', 'gravityforms' ), esc_html__( 'Liberia', 'gravityforms' ), esc_html__( 'Libya', 'gravityforms' ), esc_html__( 'Liechtenstein', 'gravityforms' ), esc_html__( 'Lithuania', 'gravityforms' ), esc_html__( 'Luxembourg', 'gravityforms' ), esc_html__( 'Macedonia', 'gravityforms' ), esc_html__( 'Madagascar', 'gravityforms' ), esc_html__( 'Malawi', 'gravityforms' ), esc_html__( 'Malaysia', 'gravityforms' ), esc_html__( 'Maldives', 'gravityforms' ), esc_html__( 'Mali', 'gravityforms' ), esc_html__( 'Malta', 'gravityforms' ), esc_html__( 'Marshall Islands', 'gravityforms' ), esc_html__( 'Mauritania', 'gravityforms' ), esc_html__( 'Mauritius', 'gravityforms' ), esc_html__( 'Mexico', 'gravityforms' ), esc_html__( 'Micronesia', 'gravityforms' ), esc_html__( 'Moldova', 'gravityforms' ), esc_html__( 'Monaco', 'gravityforms' ), esc_html__( 'Mongolia', 'gravityforms' ), esc_html__( 'Montenegro', 'gravityforms' ), esc_html__( 'Morocco', 'gravityforms' ), esc_html__( 'Mozambique', 'gravityforms' ), esc_html__( 'Myanmar', 'gravityforms' ), esc_html__( 'Namibia', 'gravityforms' ), esc_html__( 'Nauru', 'gravityforms' ), esc_html__( 'Nepal', 'gravityforms' ), esc_html__( 'Netherlands', 'gravityforms' ), esc_html__( 'New Zealand', 'gravityforms' ),
				esc_html__( 'Nicaragua', 'gravityforms' ), esc_html__( 'Niger', 'gravityforms' ), esc_html__( 'Nigeria', 'gravityforms' ), esc_html__( 'Northern Mariana Islands', 'gravityforms' ), esc_html__( 'Norway', 'gravityforms' ), esc_html__( 'Oman', 'gravityforms' ), esc_html__( 'Pakistan', 'gravityforms' ), esc_html__( 'Palau', 'gravityforms' ), esc_html__( 'Palestine, State of', 'gravityforms' ), esc_html__( 'Panama', 'gravityforms' ), esc_html__( 'Papua New Guinea', 'gravityforms' ), esc_html__( 'Paraguay', 'gravityforms' ), esc_html__( 'Peru', 'gravityforms' ), esc_html__( 'Philippines', 'gravityforms' ), esc_html__( 'Poland', 'gravityforms' ), esc_html__( 'Portugal', 'gravityforms' ), esc_html__( 'Puerto Rico', 'gravityforms' ), esc_html__( 'Qatar', 'gravityforms' ), esc_html__( 'Romania', 'gravityforms' ), esc_html__( 'Russia', 'gravityforms' ), esc_html__( 'Rwanda', 'gravityforms' ), esc_html__( 'Saint Kitts and Nevis', 'gravityforms' ), esc_html__( 'Saint Lucia', 'gravityforms' ), esc_html__( 'Saint Vincent and the Grenadines', 'gravityforms' ), esc_html__( 'Samoa', 'gravityforms' ), esc_html__( 'San Marino', 'gravityforms' ), esc_html__( 'Sao Tome and Principe', 'gravityforms' ), esc_html__( 'Saudi Arabia', 'gravityforms' ), esc_html__( 'Senegal', 'gravityforms' ), esc_html__( 'Serbia', 'gravityforms' ), esc_html__( 'Seychelles', 'gravityforms' ), esc_html__( 'Sierra Leone', 'gravityforms' ), esc_html__( 'Singapore', 'gravityforms' ), esc_html__( 'Sint Maarten', 'gravityforms' ), esc_html__( 'Slovakia', 'gravityforms' ), esc_html__( 'Slovenia', 'gravityforms' ), esc_html__( 'Solomon Islands', 'gravityforms' ), esc_html__( 'Somalia', 'gravityforms' ), esc_html__( 'South Africa', 'gravityforms' ), esc_html__( 'Spain', 'gravityforms' ), esc_html__( 'Sri Lanka', 'gravityforms' ), esc_html__( 'Sudan', 'gravityforms' ), esc_html__( 'Sudan, South', 'gravityforms' ), esc_html__( 'Suriname', 'gravityforms' ), esc_html__( 'Swaziland', 'gravityforms' ), esc_html__( 'Sweden', 'gravityforms' ), esc_html__( 'Switzerland', 'gravityforms' ), esc_html__( 'Syria', 'gravityforms' ), esc_html__( 'Taiwan', 'gravityforms' ), esc_html__( 'Tajikistan', 'gravityforms' ), esc_html__( 'Tanzania', 'gravityforms' ), esc_html__( 'Thailand', 'gravityforms' ), esc_html__( 'Togo', 'gravityforms' ), esc_html__( 'Tonga', 'gravityforms' ), esc_html__( 'Trinidad and Tobago', 'gravityforms' ), esc_html__( 'Tunisia', 'gravityforms' ), esc_html__( 'Turkey', 'gravityforms' ), esc_html__( 'Turkmenistan', 'gravityforms' ), esc_html__( 'Tuvalu', 'gravityforms' ), esc_html__( 'Uganda', 'gravityforms' ), esc_html__( 'Ukraine', 'gravityforms' ), esc_html__( 'United Arab Emirates', 'gravityforms' ), esc_html__( 'United Kingdom', 'gravityforms' ),
				esc_html__( 'United States', 'gravityforms' ), esc_html__( 'Uruguay', 'gravityforms' ), esc_html__( 'Uzbekistan', 'gravityforms' ), esc_html__( 'Vanuatu', 'gravityforms' ), esc_html__( 'Vatican City', 'gravityforms' ), esc_html__( 'Venezuela', 'gravityforms' ), esc_html__( 'Vietnam', 'gravityforms' ), esc_html__( 'Virgin Islands, British', 'gravityforms' ), esc_html__( 'Virgin Islands, U.S.', 'gravityforms' ), esc_html__( 'Yemen', 'gravityforms' ), esc_html__( 'Zambia', 'gravityforms' ), esc_html__( 'Zimbabwe', 'gravityforms' ),
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			)
		);
	}

	public function get_country_code( $country_name ) {
		$codes = $this->get_country_codes();

		return rgar( $codes, strtoupper( $country_name ) );
	}

	public function get_country_codes() {
		$codes = array(
<<<<<<< HEAD
			__( 'AFGHANISTAN', 'gravityforms' )                       => 'AF',
			__( 'ALBANIA', 'gravityforms' )                           => 'AL',
			__( 'ALGERIA', 'gravityforms' )                           => 'DZ',
			__( 'AMERICAN SAMOA', 'gravityforms' )                    => 'AS',
			__( 'ANDORRA', 'gravityforms' )                           => 'AD',
			__( 'ANGOLA', 'gravityforms' )                            => 'AO',
			__( 'ANTIGUA AND BARBUDA', 'gravityforms' )               => 'AG',
			__( 'ARGENTINA', 'gravityforms' )                         => 'AR',
			__( 'ARMENIA', 'gravityforms' )                           => 'AM',
			__( 'AUSTRALIA', 'gravityforms' )                         => 'AU',
			__( 'AUSTRIA', 'gravityforms' )                           => 'AT',
			__( 'AZERBAIJAN', 'gravityforms' )                        => 'AZ',
			__( 'BAHAMAS', 'gravityforms' )                           => 'BS',
			__( 'BAHRAIN', 'gravityforms' )                           => 'BH',
			__( 'BANGLADESH', 'gravityforms' )                        => 'BD',
			__( 'BARBADOS', 'gravityforms' )                          => 'BB',
			__( 'BELARUS', 'gravityforms' )                           => 'BY',
			__( 'BELGIUM', 'gravityforms' )                           => 'BE',
			__( 'BELIZE', 'gravityforms' )                            => 'BZ',
			__( 'BENIN', 'gravityforms' )                             => 'BJ',
			__( 'BERMUDA', 'gravityforms' )                           => 'BM',
			__( 'BHUTAN', 'gravityforms' )                            => 'BT',
			__( 'BOLIVIA', 'gravityforms' )                           => 'BO',
			__( 'BOSNIA AND HERZEGOVINA', 'gravityforms' )            => 'BA',
			__( 'BOTSWANA', 'gravityforms' )                          => 'BW',
			__( 'BRAZIL', 'gravityforms' )                            => 'BR',
			__( 'BRUNEI', 'gravityforms' )                            => 'BN',
			__( 'BULGARIA', 'gravityforms' )                          => 'BG',
			__( 'BURKINA FASO', 'gravityforms' )                      => 'BF',
			__( 'BURUNDI', 'gravityforms' )                           => 'BI',
			__( 'CAMBODIA', 'gravityforms' )                          => 'KH',
			__( 'CAMEROON', 'gravityforms' )                          => 'CM',
			__( 'CANADA', 'gravityforms' )                            => 'CA',
			__( 'CAPE VERDE', 'gravityforms' )                        => 'CV',
			__( 'CAYMAN ISLANDS', 'gravityforms' )                    => 'KY',
			__( 'CENTRAL AFRICAN REPUBLIC', 'gravityforms' )          => 'CF',
			__( 'CHAD', 'gravityforms' )                              => 'TD',
			__( 'CHILE', 'gravityforms' )                             => 'CL',
			__( 'CHINA', 'gravityforms' )                             => 'CN',
			__( 'COLOMBIA', 'gravityforms' )                          => 'CO',
			__( 'COMOROS', 'gravityforms' )                           => 'KM',
			__( 'CONGO, DEMOCRATIC REPUBLIC OF THE', 'gravityforms' ) => 'CD',
			__( 'CONGO, REPUBLIC OF THE', 'gravityforms' )            => 'CG',
			__( 'COSTA RICA', 'gravityforms' )                        => 'CR',
			__( 'C&OCIRC;TE D\'IVOIRE', 'gravityforms' )              => 'CI',
			__( 'CROATIA', 'gravityforms' )                           => 'HR',
			__( 'CUBA', 'gravityforms' )                              => 'CU',
			__( 'CYPRUS', 'gravityforms' )                            => 'CY',
			__( 'CZECH REPUBLIC', 'gravityforms' )                    => 'CZ',
			__( 'DENMARK', 'gravityforms' )                           => 'DK',
			__( 'DJIBOUTI', 'gravityforms' )                          => 'DJ',
			__( 'DOMINICA', 'gravityforms' )                          => 'DM',
			__( 'DOMINICAN REPUBLIC', 'gravityforms' )                => 'DO',
			__( 'EAST TIMOR', 'gravityforms' )                        => 'TL',
			__( 'ECUADOR', 'gravityforms' )                           => 'EC',
			__( 'EGYPT', 'gravityforms' )                             => 'EG',
			__( 'EL SALVADOR', 'gravityforms' )                       => 'SV',
			__( 'EQUATORIAL GUINEA', 'gravityforms' )                 => 'GQ',
			__( 'ERITREA', 'gravityforms' )                           => 'ER',
			__( 'ESTONIA', 'gravityforms' )                           => 'EE',
			__( 'ETHIOPIA', 'gravityforms' )                          => 'ET',
			__( 'FAROE ISLANDS', 'gravityforms' )                     => 'FO',
			__( 'FIJI', 'gravityforms' )                              => 'FJ',
			__( 'FINLAND', 'gravityforms' )                           => 'FI',
			__( 'FRANCE', 'gravityforms' )                            => 'FR',
			__( 'GABON', 'gravityforms' )                             => 'GA',
			__( 'GAMBIA', 'gravityforms' )                            => 'GM',
			_x( 'GEORGIA', 'Country', 'gravityforms' )                => 'GE',
			__( 'GERMANY', 'gravityforms' )                           => 'DE',
			__( 'GHANA', 'gravityforms' )                             => 'GH',
			__( 'GREECE', 'gravityforms' )                            => 'GR',
			__( 'GREENLAND', 'gravityforms' )                         => 'GL',
			__( 'GRENADA', 'gravityforms' )                           => 'GD',
			__( 'GUAM', 'gravityforms' )                              => 'GU',
			__( 'GUATEMALA', 'gravityforms' )                         => 'GT',
			__( 'GUINEA', 'gravityforms' )                            => 'GN',
			__( 'GUINEA-BISSAU', 'gravityforms' )                     => 'GW',
			__( 'GUYANA', 'gravityforms' )                            => 'GY',
			__( 'HAITI', 'gravityforms' )                             => 'HT',
			__( 'HONDURAS', 'gravityforms' )                          => 'HN',
			__( 'HONG KONG', 'gravityforms' )                         => 'HK',
			__( 'HUNGARY', 'gravityforms' )                           => 'HU',
			__( 'ICELAND', 'gravityforms' )                           => 'IS',
			__( 'INDIA', 'gravityforms' )                             => 'IN',
			__( 'INDONESIA', 'gravityforms' )                         => 'ID',
			__( 'IRAN', 'gravityforms' )                              => 'IR',
			__( 'IRAQ', 'gravityforms' )                              => 'IQ',
			__( 'IRELAND', 'gravityforms' )                           => 'IE',
			__( 'ISRAEL', 'gravityforms' )                            => 'IL',
			__( 'ITALY', 'gravityforms' )                             => 'IT',
			__( 'JAMAICA', 'gravityforms' )                           => 'JM',
			__( 'JAPAN', 'gravityforms' )                             => 'JP',
			__( 'JORDAN', 'gravityforms' )                            => 'JO',
			__( 'KAZAKHSTAN', 'gravityforms' )                        => 'KZ',
			__( 'KENYA', 'gravityforms' )                             => 'KE',
			__( 'KIRIBATI', 'gravityforms' )                          => 'KI',
			__( 'NORTH KOREA', 'gravityforms' )                       => 'KP',
			__( 'SOUTH KOREA', 'gravityforms' )                       => 'KR',
			__( 'KOSOVO', 'gravityforms' )                            => 'KV',
			__( 'KUWAIT', 'gravityforms' )                            => 'KW',
			__( 'KYRGYZSTAN', 'gravityforms' )                        => 'KG',
			__( 'LAOS', 'gravityforms' )                              => 'LA',
			__( 'LATVIA', 'gravityforms' )                            => 'LV',
			__( 'LEBANON', 'gravityforms' )                           => 'LB',
			__( 'LESOTHO', 'gravityforms' )                           => 'LS',
			__( 'LIBERIA', 'gravityforms' )                           => 'LR',
			__( 'LIBYA', 'gravityforms' )                             => 'LY',
			__( 'LIECHTENSTEIN', 'gravityforms' )                     => 'LI',
			__( 'LITHUANIA', 'gravityforms' )                         => 'LT',
			__( 'LUXEMBOURG', 'gravityforms' )                        => 'LU',
			__( 'MACEDONIA', 'gravityforms' )                         => 'MK',
			__( 'MADAGASCAR', 'gravityforms' )                        => 'MG',
			__( 'MALAWI', 'gravityforms' )                            => 'MW',
			__( 'MALAYSIA', 'gravityforms' )                          => 'MY',
			__( 'MALDIVES', 'gravityforms' )                          => 'MV',
			__( 'MALI', 'gravityforms' )                              => 'ML',
			__( 'MALTA', 'gravityforms' )                             => 'MT',
			__( 'MARSHALL ISLANDS', 'gravityforms' )                  => 'MH',
			__( 'MAURITANIA', 'gravityforms' )                        => 'MR',
			__( 'MAURITIUS', 'gravityforms' )                         => 'MU',
			__( 'MEXICO', 'gravityforms' )                            => 'MX',
			__( 'MICRONESIA', 'gravityforms' )                        => 'FM',
			__( 'MOLDOVA', 'gravityforms' )                           => 'MD',
			__( 'MONACO', 'gravityforms' )                            => 'MC',
			__( 'MONGOLIA', 'gravityforms' )                          => 'MN',
			__( 'MONTENEGRO', 'gravityforms' )                        => 'ME',
			__( 'MOROCCO', 'gravityforms' )                           => 'MA',
			__( 'MOZAMBIQUE', 'gravityforms' )                        => 'MZ',
			__( 'MYANMAR', 'gravityforms' )                           => 'MM',
			__( 'NAMIBIA', 'gravityforms' )                           => 'NA',
			__( 'NAURU', 'gravityforms' )                             => 'NR',
			__( 'NEPAL', 'gravityforms' )                             => 'NP',
			__( 'NETHERLANDS', 'gravityforms' )                       => 'NL',
			__( 'NEW ZEALAND', 'gravityforms' )                       => 'NZ',
			__( 'NICARAGUA', 'gravityforms' )                         => 'NI',
			__( 'NIGER', 'gravityforms' )                             => 'NE',
			__( 'NIGERIA', 'gravityforms' )                           => 'NG',
			__( 'NORTHERN MARIANA ISLANDS', 'gravityforms' )          => 'MP',
			__( 'NORWAY', 'gravityforms' )                            => 'NO',
			__( 'OMAN', 'gravityforms' )                              => 'OM',
			__( 'PAKISTAN', 'gravityforms' )                          => 'PK',
			__( 'PALAU', 'gravityforms' )                             => 'PW',
			__( 'PALESTINE, STATE OF', 'gravityforms' )               => 'PS',
			__( 'PANAMA', 'gravityforms' )                            => 'PA',
			__( 'PAPUA NEW GUINEA', 'gravityforms' )                  => 'PG',
			__( 'PARAGUAY', 'gravityforms' )                          => 'PY',
			__( 'PERU', 'gravityforms' )                              => 'PE',
			__( 'PHILIPPINES', 'gravityforms' )                       => 'PH',
			__( 'POLAND', 'gravityforms' )                            => 'PL',
			__( 'PORTUGAL', 'gravityforms' )                          => 'PT',
			__( 'PUERTO RICO', 'gravityforms' )                       => 'PR',
			__( 'QATAR', 'gravityforms' )                             => 'QA',
			__( 'ROMANIA', 'gravityforms' )                           => 'RO',
			__( 'RUSSIA', 'gravityforms' )                            => 'RU',
			__( 'RWANDA', 'gravityforms' )                            => 'RW',
			__( 'SAINT KITTS AND NEVIS', 'gravityforms' )             => 'KN',
			__( 'SAINT LUCIA', 'gravityforms' )                       => 'LC',
			__( 'SAINT VINCENT AND THE GRENADINES', 'gravityforms' )  => 'VC',
			__( 'SAMOA', 'gravityforms' )                             => 'WS',
			__( 'SAN MARINO', 'gravityforms' )                        => 'SM',
			__( 'SAO TOME AND PRINCIPE', 'gravityforms' )             => 'ST',
			__( 'SAUDI ARABIA', 'gravityforms' )                      => 'SA',
			__( 'SENEGAL', 'gravityforms' )                           => 'SN',
			__( 'SERBIA AND MONTENEGRO', 'gravityforms' )             => 'RS',
			__( 'SEYCHELLES', 'gravityforms' )                        => 'SC',
			__( 'SIERRA LEONE', 'gravityforms' )                      => 'SL',
			__( 'SINGAPORE', 'gravityforms' )                         => 'SG',
			__( 'SINT MAARTEN', 'gravityforms' )                      => 'SX',
			__( 'SLOVAKIA', 'gravityforms' )                          => 'SK',
			__( 'SLOVENIA', 'gravityforms' )                          => 'SI',
			__( 'SOLOMON ISLANDS', 'gravityforms' )                   => 'SB',
			__( 'SOMALIA', 'gravityforms' )                           => 'SO',
			__( 'SOUTH AFRICA', 'gravityforms' )                      => 'ZA',
			__( 'SPAIN', 'gravityforms' )                             => 'ES',
			__( 'SRI LANKA', 'gravityforms' )                         => 'LK',
			__( 'SUDAN', 'gravityforms' )                             => 'SD',
			__( 'SUDAN, SOUTH', 'gravityforms' )                      => 'SS',
			__( 'SURINAME', 'gravityforms' )                          => 'SR',
			__( 'SWAZILAND', 'gravityforms' )                         => 'SZ',
			__( 'SWEDEN', 'gravityforms' )                            => 'SE',
			__( 'SWITZERLAND', 'gravityforms' )                       => 'CH',
			__( 'SYRIA', 'gravityforms' )                             => 'SY',
			__( 'TAIWAN', 'gravityforms' )                            => 'TW',
			__( 'TAJIKISTAN', 'gravityforms' )                        => 'TJ',
			__( 'TANZANIA', 'gravityforms' )                          => 'TZ',
			__( 'THAILAND', 'gravityforms' )                          => 'TH',
			__( 'TOGO', 'gravityforms' )                              => 'TG',
			__( 'TONGA', 'gravityforms' )                             => 'TO',
			__( 'TRINIDAD AND TOBAGO', 'gravityforms' )               => 'TT',
			__( 'TUNISIA', 'gravityforms' )                           => 'TN',
			__( 'TURKEY', 'gravityforms' )                            => 'TR',
			__( 'TURKMENISTAN', 'gravityforms' )                      => 'TM',
			__( 'TUVALU', 'gravityforms' )                            => 'TV',
			__( 'UGANDA', 'gravityforms' )                            => 'UG',
			__( 'UKRAINE', 'gravityforms' )                           => 'UA',
			__( 'UNITED ARAB EMIRATES', 'gravityforms' )              => 'AE',
			__( 'UNITED KINGDOM', 'gravityforms' )                    => 'GB',
			__( 'UNITED STATES', 'gravityforms' )                     => 'US',
			__( 'URUGUAY', 'gravityforms' )                           => 'UY',
			__( 'UZBEKISTAN', 'gravityforms' )                        => 'UZ',
			__( 'VANUATU', 'gravityforms' )                           => 'VU',
			__( 'VATICAN CITY', 'gravityforms' )                      => 'VA',
			__( 'VENEZUELA', 'gravityforms' )                         => 'VE',
			__( 'VIRGIN ISLANDS, BRITISH', 'gravityforms' )           => 'VG',
			__( 'VIRGIN ISLANDS, U.S.', 'gravityforms' )              => 'VI',
			__( 'VIETNAM', 'gravityforms' )                           => 'VN',
			__( 'YEMEN', 'gravityforms' )                             => 'YE',
			__( 'ZAMBIA', 'gravityforms' )                            => 'ZM',
			__( 'ZIMBABWE', 'gravityforms' )                          => 'ZW',
=======
			esc_html__( 'AFGHANISTAN', 'gravityforms' )                       => 'AF',
			esc_html__( 'ALBANIA', 'gravityforms' )                           => 'AL',
			esc_html__( 'ALGERIA', 'gravityforms' )                           => 'DZ',
			esc_html__( 'AMERICAN SAMOA', 'gravityforms' )                    => 'AS',
			esc_html__( 'ANDORRA', 'gravityforms' )                           => 'AD',
			esc_html__( 'ANGOLA', 'gravityforms' )                            => 'AO',
			esc_html__( 'ANTIGUA AND BARBUDA', 'gravityforms' )               => 'AG',
			esc_html__( 'ARGENTINA', 'gravityforms' )                         => 'AR',
			esc_html__( 'ARMENIA', 'gravityforms' )                           => 'AM',
			esc_html__( 'AUSTRALIA', 'gravityforms' )                         => 'AU',
			esc_html__( 'AUSTRIA', 'gravityforms' )                           => 'AT',
			esc_html__( 'AZERBAIJAN', 'gravityforms' )                        => 'AZ',
			esc_html__( 'BAHAMAS', 'gravityforms' )                           => 'BS',
			esc_html__( 'BAHRAIN', 'gravityforms' )                           => 'BH',
			esc_html__( 'BANGLADESH', 'gravityforms' )                        => 'BD',
			esc_html__( 'BARBADOS', 'gravityforms' )                          => 'BB',
			esc_html__( 'BELARUS', 'gravityforms' )                           => 'BY',
			esc_html__( 'BELGIUM', 'gravityforms' )                           => 'BE',
			esc_html__( 'BELIZE', 'gravityforms' )                            => 'BZ',
			esc_html__( 'BENIN', 'gravityforms' )                             => 'BJ',
			esc_html__( 'BERMUDA', 'gravityforms' )                           => 'BM',
			esc_html__( 'BHUTAN', 'gravityforms' )                            => 'BT',
			esc_html__( 'BOLIVIA', 'gravityforms' )                           => 'BO',
			esc_html__( 'BOSNIA AND HERZEGOVINA', 'gravityforms' )            => 'BA',
			esc_html__( 'BOTSWANA', 'gravityforms' )                          => 'BW',
			esc_html__( 'BRAZIL', 'gravityforms' )                            => 'BR',
			esc_html__( 'BRUNEI', 'gravityforms' )                            => 'BN',
			esc_html__( 'BULGARIA', 'gravityforms' )                          => 'BG',
			esc_html__( 'BURKINA FASO', 'gravityforms' )                      => 'BF',
			esc_html__( 'BURUNDI', 'gravityforms' )                           => 'BI',
			esc_html__( 'CAMBODIA', 'gravityforms' )                          => 'KH',
			esc_html__( 'CAMEROON', 'gravityforms' )                          => 'CM',
			esc_html__( 'CANADA', 'gravityforms' )                            => 'CA',
			esc_html__( 'CAPE VERDE', 'gravityforms' )                        => 'CV',
			esc_html__( 'CAYMAN ISLANDS', 'gravityforms' )                    => 'KY',
			esc_html__( 'CENTRAL AFRICAN REPUBLIC', 'gravityforms' )          => 'CF',
			esc_html__( 'CHAD', 'gravityforms' )                              => 'TD',
			esc_html__( 'CHILE', 'gravityforms' )                             => 'CL',
			esc_html__( 'CHINA', 'gravityforms' )                             => 'CN',
			esc_html__( 'COLOMBIA', 'gravityforms' )                          => 'CO',
			esc_html__( 'COMOROS', 'gravityforms' )                           => 'KM',
			esc_html__( 'CONGO, DEMOCRATIC REPUBLIC OF THE', 'gravityforms' ) => 'CD',
			esc_html__( 'CONGO, REPUBLIC OF THE', 'gravityforms' )            => 'CG',
			esc_html__( 'COSTA RICA', 'gravityforms' )                        => 'CR',
			esc_html__( "CÔTE D'IVOIRE", 'gravityforms' )                     => 'CI',
			esc_html__( 'CROATIA', 'gravityforms' )                           => 'HR',
			esc_html__( 'CUBA', 'gravityforms' )                              => 'CU',
			esc_html__( 'CYPRUS', 'gravityforms' )                            => 'CY',
			esc_html__( 'CZECH REPUBLIC', 'gravityforms' )                    => 'CZ',
			esc_html__( 'DENMARK', 'gravityforms' )                           => 'DK',
			esc_html__( 'DJIBOUTI', 'gravityforms' )                          => 'DJ',
			esc_html__( 'DOMINICA', 'gravityforms' )                          => 'DM',
			esc_html__( 'DOMINICAN REPUBLIC', 'gravityforms' )                => 'DO',
			esc_html__( 'EAST TIMOR', 'gravityforms' )                        => 'TL',
			esc_html__( 'ECUADOR', 'gravityforms' )                           => 'EC',
			esc_html__( 'EGYPT', 'gravityforms' )                             => 'EG',
			esc_html__( 'EL SALVADOR', 'gravityforms' )                       => 'SV',
			esc_html__( 'EQUATORIAL GUINEA', 'gravityforms' )                 => 'GQ',
			esc_html__( 'ERITREA', 'gravityforms' )                           => 'ER',
			esc_html__( 'ESTONIA', 'gravityforms' )                           => 'EE',
			esc_html__( 'ETHIOPIA', 'gravityforms' )                          => 'ET',
			esc_html__( 'FAROE ISLANDS', 'gravityforms' )                     => 'FO',
			esc_html__( 'FIJI', 'gravityforms' )                              => 'FJ',
			esc_html__( 'FINLAND', 'gravityforms' )                           => 'FI',
			esc_html__( 'FRANCE', 'gravityforms' )                            => 'FR',
			esc_html__( 'GABON', 'gravityforms' )                             => 'GA',
			esc_html__( 'GAMBIA', 'gravityforms' )                            => 'GM',
			esc_html( _x( 'GEORGIA', 'Country', 'gravityforms' ) )            => 'GE',
			esc_html__( 'GERMANY', 'gravityforms' )                           => 'DE',
			esc_html__( 'GHANA', 'gravityforms' )                             => 'GH',
			esc_html__( 'GREECE', 'gravityforms' )                            => 'GR',
			esc_html__( 'GREENLAND', 'gravityforms' )                         => 'GL',
			esc_html__( 'GRENADA', 'gravityforms' )                           => 'GD',
			esc_html__( 'GUAM', 'gravityforms' )                              => 'GU',
			esc_html__( 'GUATEMALA', 'gravityforms' )                         => 'GT',
			esc_html__( 'GUINEA', 'gravityforms' )                            => 'GN',
			esc_html__( 'GUINEA-BISSAU', 'gravityforms' )                     => 'GW',
			esc_html__( 'GUYANA', 'gravityforms' )                            => 'GY',
			esc_html__( 'HAITI', 'gravityforms' )                             => 'HT',
			esc_html__( 'HONDURAS', 'gravityforms' )                          => 'HN',
			esc_html__( 'HONG KONG', 'gravityforms' )                         => 'HK',
			esc_html__( 'HUNGARY', 'gravityforms' )                           => 'HU',
			esc_html__( 'ICELAND', 'gravityforms' )                           => 'IS',
			esc_html__( 'INDIA', 'gravityforms' )                             => 'IN',
			esc_html__( 'INDONESIA', 'gravityforms' )                         => 'ID',
			esc_html__( 'IRAN', 'gravityforms' )                              => 'IR',
			esc_html__( 'IRAQ', 'gravityforms' )                              => 'IQ',
			esc_html__( 'IRELAND', 'gravityforms' )                           => 'IE',
			esc_html__( 'ISRAEL', 'gravityforms' )                            => 'IL',
			esc_html__( 'ITALY', 'gravityforms' )                             => 'IT',
			esc_html__( 'JAMAICA', 'gravityforms' )                           => 'JM',
			esc_html__( 'JAPAN', 'gravityforms' )                             => 'JP',
			esc_html__( 'JORDAN', 'gravityforms' )                            => 'JO',
			esc_html__( 'KAZAKHSTAN', 'gravityforms' )                        => 'KZ',
			esc_html__( 'KENYA', 'gravityforms' )                             => 'KE',
			esc_html__( 'KIRIBATI', 'gravityforms' )                          => 'KI',
			esc_html__( 'NORTH KOREA', 'gravityforms' )                       => 'KP',
			esc_html__( 'SOUTH KOREA', 'gravityforms' )                       => 'KR',
			esc_html__( 'KOSOVO', 'gravityforms' )                            => 'KV',
			esc_html__( 'KUWAIT', 'gravityforms' )                            => 'KW',
			esc_html__( 'KYRGYZSTAN', 'gravityforms' )                        => 'KG',
			esc_html__( 'LAOS', 'gravityforms' )                              => 'LA',
			esc_html__( 'LATVIA', 'gravityforms' )                            => 'LV',
			esc_html__( 'LEBANON', 'gravityforms' )                           => 'LB',
			esc_html__( 'LESOTHO', 'gravityforms' )                           => 'LS',
			esc_html__( 'LIBERIA', 'gravityforms' )                           => 'LR',
			esc_html__( 'LIBYA', 'gravityforms' )                             => 'LY',
			esc_html__( 'LIECHTENSTEIN', 'gravityforms' )                     => 'LI',
			esc_html__( 'LITHUANIA', 'gravityforms' )                         => 'LT',
			esc_html__( 'LUXEMBOURG', 'gravityforms' )                        => 'LU',
			esc_html__( 'MACEDONIA', 'gravityforms' )                         => 'MK',
			esc_html__( 'MADAGASCAR', 'gravityforms' )                        => 'MG',
			esc_html__( 'MALAWI', 'gravityforms' )                            => 'MW',
			esc_html__( 'MALAYSIA', 'gravityforms' )                          => 'MY',
			esc_html__( 'MALDIVES', 'gravityforms' )                          => 'MV',
			esc_html__( 'MALI', 'gravityforms' )                              => 'ML',
			esc_html__( 'MALTA', 'gravityforms' )                             => 'MT',
			esc_html__( 'MARSHALL ISLANDS', 'gravityforms' )                  => 'MH',
			esc_html__( 'MAURITANIA', 'gravityforms' )                        => 'MR',
			esc_html__( 'MAURITIUS', 'gravityforms' )                         => 'MU',
			esc_html__( 'MEXICO', 'gravityforms' )                            => 'MX',
			esc_html__( 'MICRONESIA', 'gravityforms' )                        => 'FM',
			esc_html__( 'MOLDOVA', 'gravityforms' )                           => 'MD',
			esc_html__( 'MONACO', 'gravityforms' )                            => 'MC',
			esc_html__( 'MONGOLIA', 'gravityforms' )                          => 'MN',
			esc_html__( 'MONTENEGRO', 'gravityforms' )                        => 'ME',
			esc_html__( 'MOROCCO', 'gravityforms' )                           => 'MA',
			esc_html__( 'MOZAMBIQUE', 'gravityforms' )                        => 'MZ',
			esc_html__( 'MYANMAR', 'gravityforms' )                           => 'MM',
			esc_html__( 'NAMIBIA', 'gravityforms' )                           => 'NA',
			esc_html__( 'NAURU', 'gravityforms' )                             => 'NR',
			esc_html__( 'NEPAL', 'gravityforms' )                             => 'NP',
			esc_html__( 'NETHERLANDS', 'gravityforms' )                       => 'NL',
			esc_html__( 'NEW ZEALAND', 'gravityforms' )                       => 'NZ',
			esc_html__( 'NICARAGUA', 'gravityforms' )                         => 'NI',
			esc_html__( 'NIGER', 'gravityforms' )                             => 'NE',
			esc_html__( 'NIGERIA', 'gravityforms' )                           => 'NG',
			esc_html__( 'NORTHERN MARIANA ISLANDS', 'gravityforms' )          => 'MP',
			esc_html__( 'NORWAY', 'gravityforms' )                            => 'NO',
			esc_html__( 'OMAN', 'gravityforms' )                              => 'OM',
			esc_html__( 'PAKISTAN', 'gravityforms' )                          => 'PK',
			esc_html__( 'PALAU', 'gravityforms' )                             => 'PW',
			esc_html__( 'PALESTINE, STATE OF', 'gravityforms' )               => 'PS',
			esc_html__( 'PANAMA', 'gravityforms' )                            => 'PA',
			esc_html__( 'PAPUA NEW GUINEA', 'gravityforms' )                  => 'PG',
			esc_html__( 'PARAGUAY', 'gravityforms' )                          => 'PY',
			esc_html__( 'PERU', 'gravityforms' )                              => 'PE',
			esc_html__( 'PHILIPPINES', 'gravityforms' )                       => 'PH',
			esc_html__( 'POLAND', 'gravityforms' )                            => 'PL',
			esc_html__( 'PORTUGAL', 'gravityforms' )                          => 'PT',
			esc_html__( 'PUERTO RICO', 'gravityforms' )                       => 'PR',
			esc_html__( 'QATAR', 'gravityforms' )                             => 'QA',
			esc_html__( 'ROMANIA', 'gravityforms' )                           => 'RO',
			esc_html__( 'RUSSIA', 'gravityforms' )                            => 'RU',
			esc_html__( 'RWANDA', 'gravityforms' )                            => 'RW',
			esc_html__( 'SAINT KITTS AND NEVIS', 'gravityforms' )             => 'KN',
			esc_html__( 'SAINT LUCIA', 'gravityforms' )                       => 'LC',
			esc_html__( 'SAINT VINCENT AND THE GRENADINES', 'gravityforms' )  => 'VC',
			esc_html__( 'SAMOA', 'gravityforms' )                             => 'WS',
			esc_html__( 'SAN MARINO', 'gravityforms' )                        => 'SM',
			esc_html__( 'SAO TOME AND PRINCIPE', 'gravityforms' )             => 'ST',
			esc_html__( 'SAUDI ARABIA', 'gravityforms' )                      => 'SA',
			esc_html__( 'SENEGAL', 'gravityforms' )                           => 'SN',
			esc_html__( 'SERBIA', 'gravityforms' )                            => 'RS',
			esc_html__( 'SEYCHELLES', 'gravityforms' )                        => 'SC',
			esc_html__( 'SIERRA LEONE', 'gravityforms' )                      => 'SL',
			esc_html__( 'SINGAPORE', 'gravityforms' )                         => 'SG',
			esc_html__( 'SINT MAARTEN', 'gravityforms' )                      => 'SX',
			esc_html__( 'SLOVAKIA', 'gravityforms' )                          => 'SK',
			esc_html__( 'SLOVENIA', 'gravityforms' )                          => 'SI',
			esc_html__( 'SOLOMON ISLANDS', 'gravityforms' )                   => 'SB',
			esc_html__( 'SOMALIA', 'gravityforms' )                           => 'SO',
			esc_html__( 'SOUTH AFRICA', 'gravityforms' )                      => 'ZA',
			esc_html__( 'SPAIN', 'gravityforms' )                             => 'ES',
			esc_html__( 'SRI LANKA', 'gravityforms' )                         => 'LK',
			esc_html__( 'SUDAN', 'gravityforms' )                             => 'SD',
			esc_html__( 'SUDAN, SOUTH', 'gravityforms' )                      => 'SS',
			esc_html__( 'SURINAME', 'gravityforms' )                          => 'SR',
			esc_html__( 'SWAZILAND', 'gravityforms' )                         => 'SZ',
			esc_html__( 'SWEDEN', 'gravityforms' )                            => 'SE',
			esc_html__( 'SWITZERLAND', 'gravityforms' )                       => 'CH',
			esc_html__( 'SYRIA', 'gravityforms' )                             => 'SY',
			esc_html__( 'TAIWAN', 'gravityforms' )                            => 'TW',
			esc_html__( 'TAJIKISTAN', 'gravityforms' )                        => 'TJ',
			esc_html__( 'TANZANIA', 'gravityforms' )                          => 'TZ',
			esc_html__( 'THAILAND', 'gravityforms' )                          => 'TH',
			esc_html__( 'TOGO', 'gravityforms' )                              => 'TG',
			esc_html__( 'TONGA', 'gravityforms' )                             => 'TO',
			esc_html__( 'TRINIDAD AND TOBAGO', 'gravityforms' )               => 'TT',
			esc_html__( 'TUNISIA', 'gravityforms' )                           => 'TN',
			esc_html__( 'TURKEY', 'gravityforms' )                            => 'TR',
			esc_html__( 'TURKMENISTAN', 'gravityforms' )                      => 'TM',
			esc_html__( 'TUVALU', 'gravityforms' )                            => 'TV',
			esc_html__( 'UGANDA', 'gravityforms' )                            => 'UG',
			esc_html__( 'UKRAINE', 'gravityforms' )                           => 'UA',
			esc_html__( 'UNITED ARAB EMIRATES', 'gravityforms' )              => 'AE',
			esc_html__( 'UNITED KINGDOM', 'gravityforms' )                    => 'GB',
			esc_html__( 'UNITED STATES', 'gravityforms' )                     => 'US',
			esc_html__( 'URUGUAY', 'gravityforms' )                           => 'UY',
			esc_html__( 'UZBEKISTAN', 'gravityforms' )                        => 'UZ',
			esc_html__( 'VANUATU', 'gravityforms' )                           => 'VU',
			esc_html__( 'VATICAN CITY', 'gravityforms' )                      => 'VA',
			esc_html__( 'VENEZUELA', 'gravityforms' )                         => 'VE',
			esc_html__( 'VIRGIN ISLANDS, BRITISH', 'gravityforms' )           => 'VG',
			esc_html__( 'VIRGIN ISLANDS, U.S.', 'gravityforms' )              => 'VI',
			esc_html__( 'VIETNAM', 'gravityforms' )                           => 'VN',
			esc_html__( 'YEMEN', 'gravityforms' )                             => 'YE',
			esc_html__( 'ZAMBIA', 'gravityforms' )                            => 'ZM',
			esc_html__( 'ZIMBABWE', 'gravityforms' )                          => 'ZW',
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		);

		return $codes;
	}

	public function get_us_states() {
		return apply_filters(
			'gform_us_states', array(
<<<<<<< HEAD
				__( 'Alabama', 'gravityforms' ), __( 'Alaska', 'gravityforms' ), __( 'Arizona', 'gravityforms' ), __( 'Arkansas', 'gravityforms' ),
				__( 'California', 'gravityforms' ), __( 'Colorado', 'gravityforms' ), __( 'Connecticut', 'gravityforms' ), __( 'Delaware', 'gravityforms' ),
				__( 'District of Columbia', 'gravityforms' ), __( 'Florida', 'gravityforms' ), _x( 'Georgia', 'US State', 'gravityforms' ),
				__( 'Hawaii', 'gravityforms' ), __( 'Idaho', 'gravityforms' ), __( 'Illinois', 'gravityforms' ), __( 'Indiana', 'gravityforms' ),
				__( 'Iowa', 'gravityforms' ), __( 'Kansas', 'gravityforms' ), __( 'Kentucky', 'gravityforms' ), __( 'Louisiana', 'gravityforms' ),
				__( 'Maine', 'gravityforms' ), __( 'Maryland', 'gravityforms' ), __( 'Massachusetts', 'gravityforms' ), __( 'Michigan', 'gravityforms' ),
				__( 'Minnesota', 'gravityforms' ), __( 'Mississippi', 'gravityforms' ), __( 'Missouri', 'gravityforms' ), __( 'Montana', 'gravityforms' ),
				__( 'Nebraska', 'gravityforms' ), __( 'Nevada', 'gravityforms' ), __( 'New Hampshire', 'gravityforms' ), __( 'New Jersey', 'gravityforms' ),
				__( 'New Mexico', 'gravityforms' ), __( 'New York', 'gravityforms' ), __( 'North Carolina', 'gravityforms' ),
				__( 'North Dakota', 'gravityforms' ), __( 'Ohio', 'gravityforms' ), __( 'Oklahoma', 'gravityforms' ), __( 'Oregon', 'gravityforms' ),
				__( 'Pennsylvania', 'gravityforms' ), __( 'Rhode Island', 'gravityforms' ), __( 'South Carolina', 'gravityforms' ),
				__( 'South Dakota', 'gravityforms' ), __( 'Tennessee', 'gravityforms' ), __( 'Texas', 'gravityforms' ), __( 'Utah', 'gravityforms' ),
				__( 'Vermont', 'gravityforms' ), __( 'Virginia', 'gravityforms' ), __( 'Washington', 'gravityforms' ), __( 'West Virginia', 'gravityforms' ),
				__( 'Wisconsin', 'gravityforms' ), __( 'Wyoming', 'gravityforms' ), __( 'Armed Forces Americas', 'gravityforms' ),
				__( 'Armed Forces Europe', 'gravityforms' ), __( 'Armed Forces Pacific', 'gravityforms' ),
=======
				esc_html__( 'Alabama', 'gravityforms' ), esc_html__( 'Alaska', 'gravityforms' ), esc_html__( 'Arizona', 'gravityforms' ), esc_html__( 'Arkansas', 'gravityforms' ),
				esc_html__( 'California', 'gravityforms' ), esc_html__( 'Colorado', 'gravityforms' ), esc_html__( 'Connecticut', 'gravityforms' ), esc_html__( 'Delaware', 'gravityforms' ),
				esc_html__( 'District of Columbia', 'gravityforms' ), esc_html__( 'Florida', 'gravityforms' ), _x( 'Georgia', 'US State', 'gravityforms' ),
				esc_html__( 'Hawaii', 'gravityforms' ), esc_html__( 'Idaho', 'gravityforms' ), esc_html__( 'Illinois', 'gravityforms' ), esc_html__( 'Indiana', 'gravityforms' ),
				esc_html__( 'Iowa', 'gravityforms' ), esc_html__( 'Kansas', 'gravityforms' ), esc_html__( 'Kentucky', 'gravityforms' ), esc_html__( 'Louisiana', 'gravityforms' ),
				esc_html__( 'Maine', 'gravityforms' ), esc_html__( 'Maryland', 'gravityforms' ), esc_html__( 'Massachusetts', 'gravityforms' ), esc_html__( 'Michigan', 'gravityforms' ),
				esc_html__( 'Minnesota', 'gravityforms' ), esc_html__( 'Mississippi', 'gravityforms' ), esc_html__( 'Missouri', 'gravityforms' ), esc_html__( 'Montana', 'gravityforms' ),
				esc_html__( 'Nebraska', 'gravityforms' ), esc_html__( 'Nevada', 'gravityforms' ), esc_html__( 'New Hampshire', 'gravityforms' ), esc_html__( 'New Jersey', 'gravityforms' ),
				esc_html__( 'New Mexico', 'gravityforms' ), esc_html__( 'New York', 'gravityforms' ), esc_html__( 'North Carolina', 'gravityforms' ),
				esc_html__( 'North Dakota', 'gravityforms' ), esc_html__( 'Ohio', 'gravityforms' ), esc_html__( 'Oklahoma', 'gravityforms' ), esc_html__( 'Oregon', 'gravityforms' ),
				esc_html__( 'Pennsylvania', 'gravityforms' ), esc_html__( 'Rhode Island', 'gravityforms' ), esc_html__( 'South Carolina', 'gravityforms' ),
				esc_html__( 'South Dakota', 'gravityforms' ), esc_html__( 'Tennessee', 'gravityforms' ), esc_html__( 'Texas', 'gravityforms' ), esc_html__( 'Utah', 'gravityforms' ),
				esc_html__( 'Vermont', 'gravityforms' ), esc_html__( 'Virginia', 'gravityforms' ), esc_html__( 'Washington', 'gravityforms' ), esc_html__( 'West Virginia', 'gravityforms' ),
				esc_html__( 'Wisconsin', 'gravityforms' ), esc_html__( 'Wyoming', 'gravityforms' ), esc_html__( 'Armed Forces Americas', 'gravityforms' ),
				esc_html__( 'Armed Forces Europe', 'gravityforms' ), esc_html__( 'Armed Forces Pacific', 'gravityforms' ),
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			)
		);
	}

	public function get_us_state_code( $state_name ) {
		$states = array(
<<<<<<< HEAD
			strtoupper( __( 'Alabama', 'gravityforms' ) )               => 'AL',
			strtoupper( __( 'Alaska', 'gravityforms' ) )                => 'AK',
			strtoupper( __( 'Arizona', 'gravityforms' ) )               => 'AZ',
			strtoupper( __( 'Arkansas', 'gravityforms' ) )              => 'AR',
			strtoupper( __( 'California', 'gravityforms' ) )            => 'CA',
			strtoupper( __( 'Colorado', 'gravityforms' ) )              => 'CO',
			strtoupper( __( 'Connecticut', 'gravityforms' ) )           => 'CT',
			strtoupper( __( 'Delaware', 'gravityforms' ) )              => 'DE',
			strtoupper( __( 'District of Columbia', 'gravityforms' ) )  => 'DC',
			strtoupper( __( 'Florida', 'gravityforms' ) )               => 'FL',
			strtoupper( _x( 'Georgia', 'US State', 'gravityforms' ) )   => 'GA',
			strtoupper( __( 'Hawaii', 'gravityforms' ) )                => 'HI',
			strtoupper( __( 'Idaho', 'gravityforms' ) )                 => 'ID',
			strtoupper( __( 'Illinois', 'gravityforms' ) )              => 'IL',
			strtoupper( __( 'Indiana', 'gravityforms' ) )               => 'IN',
			strtoupper( __( 'Iowa', 'gravityforms' ) )                  => 'IA',
			strtoupper( __( 'Kansas', 'gravityforms' ) )                => 'KS',
			strtoupper( __( 'Kentucky', 'gravityforms' ) )              => 'KY',
			strtoupper( __( 'Louisiana', 'gravityforms' ) )             => 'LA',
			strtoupper( __( 'Maine', 'gravityforms' ) )                 => 'ME',
			strtoupper( __( 'Maryland', 'gravityforms' ) )              => 'MD',
			strtoupper( __( 'Massachusetts', 'gravityforms' ) )         => 'MA',
			strtoupper( __( 'Michigan', 'gravityforms' ) )              => 'MI',
			strtoupper( __( 'Minnesota', 'gravityforms' ) )             => 'MN',
			strtoupper( __( 'Mississippi', 'gravityforms' ) )           => 'MS',
			strtoupper( __( 'Missouri', 'gravityforms' ) )              => 'MO',
			strtoupper( __( 'Montana', 'gravityforms' ) )               => 'MT',
			strtoupper( __( 'Nebraska', 'gravityforms' ) )              => 'NE',
			strtoupper( __( 'Nevada', 'gravityforms' ) )                => 'NV',
			strtoupper( __( 'New Hampshire', 'gravityforms' ) )         => 'NH',
			strtoupper( __( 'New Jersey', 'gravityforms' ) )            => 'NJ',
			strtoupper( __( 'New Mexico', 'gravityforms' ) )            => 'NM',
			strtoupper( __( 'New York', 'gravityforms' ) )              => 'NY',
			strtoupper( __( 'North Carolina', 'gravityforms' ) )        => 'NC',
			strtoupper( __( 'North Dakota', 'gravityforms' ) )          => 'ND',
			strtoupper( __( 'Ohio', 'gravityforms' ) )                  => 'OH',
			strtoupper( __( 'Oklahoma', 'gravityforms' ) )              => 'OK',
			strtoupper( __( 'Oregon', 'gravityforms' ) )                => 'OR',
			strtoupper( __( 'Pennsylvania', 'gravityforms' ) )          => 'PA',
			strtoupper( __( 'Rhode Island', 'gravityforms' ) )          => 'RI',
			strtoupper( __( 'South Carolina', 'gravityforms' ) )        => 'SC',
			strtoupper( __( 'South Dakota', 'gravityforms' ) )          => 'SD',
			strtoupper( __( 'Tennessee', 'gravityforms' ) )             => 'TN',
			strtoupper( __( 'Texas', 'gravityforms' ) )                 => 'TX',
			strtoupper( __( 'Utah', 'gravityforms' ) )                  => 'UT',
			strtoupper( __( 'Vermont', 'gravityforms' ) )               => 'VT',
			strtoupper( __( 'Virginia', 'gravityforms' ) )              => 'VA',
			strtoupper( __( 'Washington', 'gravityforms' ) )            => 'WA',
			strtoupper( __( 'West Virginia', 'gravityforms' ) )         => 'WV',
			strtoupper( __( 'Wisconsin', 'gravityforms' ) )             => 'WI',
			strtoupper( __( 'Wyoming', 'gravityforms' ) )               => 'WY',
			strtoupper( __( 'Armed Forces Americas', 'gravityforms' ) ) => 'AA',
			strtoupper( __( 'Armed Forces Europe', 'gravityforms' ) )   => 'AE',
			strtoupper( __( 'Armed Forces Pacific', 'gravityforms' ) )  => 'AP',
=======
			strtoupper( esc_html__( 'Alabama', 'gravityforms' ) )               => 'AL',
			strtoupper( esc_html__( 'Alaska', 'gravityforms' ) )                => 'AK',
			strtoupper( esc_html__( 'Arizona', 'gravityforms' ) )               => 'AZ',
			strtoupper( esc_html__( 'Arkansas', 'gravityforms' ) )              => 'AR',
			strtoupper( esc_html__( 'California', 'gravityforms' ) )            => 'CA',
			strtoupper( esc_html__( 'Colorado', 'gravityforms' ) )              => 'CO',
			strtoupper( esc_html__( 'Connecticut', 'gravityforms' ) )           => 'CT',
			strtoupper( esc_html__( 'Delaware', 'gravityforms' ) )              => 'DE',
			strtoupper( esc_html__( 'District of Columbia', 'gravityforms' ) )  => 'DC',
			strtoupper( esc_html__( 'Florida', 'gravityforms' ) )               => 'FL',
			strtoupper( _x( 'Georgia', 'US State', 'gravityforms' ) )           => 'GA',
			strtoupper( esc_html__( 'Hawaii', 'gravityforms' ) )                => 'HI',
			strtoupper( esc_html__( 'Idaho', 'gravityforms' ) )                 => 'ID',
			strtoupper( esc_html__( 'Illinois', 'gravityforms' ) )              => 'IL',
			strtoupper( esc_html__( 'Indiana', 'gravityforms' ) )               => 'IN',
			strtoupper( esc_html__( 'Iowa', 'gravityforms' ) )                  => 'IA',
			strtoupper( esc_html__( 'Kansas', 'gravityforms' ) )                => 'KS',
			strtoupper( esc_html__( 'Kentucky', 'gravityforms' ) )              => 'KY',
			strtoupper( esc_html__( 'Louisiana', 'gravityforms' ) )             => 'LA',
			strtoupper( esc_html__( 'Maine', 'gravityforms' ) )                 => 'ME',
			strtoupper( esc_html__( 'Maryland', 'gravityforms' ) )              => 'MD',
			strtoupper( esc_html__( 'Massachusetts', 'gravityforms' ) )         => 'MA',
			strtoupper( esc_html__( 'Michigan', 'gravityforms' ) )              => 'MI',
			strtoupper( esc_html__( 'Minnesota', 'gravityforms' ) )             => 'MN',
			strtoupper( esc_html__( 'Mississippi', 'gravityforms' ) )           => 'MS',
			strtoupper( esc_html__( 'Missouri', 'gravityforms' ) )              => 'MO',
			strtoupper( esc_html__( 'Montana', 'gravityforms' ) )               => 'MT',
			strtoupper( esc_html__( 'Nebraska', 'gravityforms' ) )              => 'NE',
			strtoupper( esc_html__( 'Nevada', 'gravityforms' ) )                => 'NV',
			strtoupper( esc_html__( 'New Hampshire', 'gravityforms' ) )         => 'NH',
			strtoupper( esc_html__( 'New Jersey', 'gravityforms' ) )            => 'NJ',
			strtoupper( esc_html__( 'New Mexico', 'gravityforms' ) )            => 'NM',
			strtoupper( esc_html__( 'New York', 'gravityforms' ) )              => 'NY',
			strtoupper( esc_html__( 'North Carolina', 'gravityforms' ) )        => 'NC',
			strtoupper( esc_html__( 'North Dakota', 'gravityforms' ) )          => 'ND',
			strtoupper( esc_html__( 'Ohio', 'gravityforms' ) )                  => 'OH',
			strtoupper( esc_html__( 'Oklahoma', 'gravityforms' ) )              => 'OK',
			strtoupper( esc_html__( 'Oregon', 'gravityforms' ) )                => 'OR',
			strtoupper( esc_html__( 'Pennsylvania', 'gravityforms' ) )          => 'PA',
			strtoupper( esc_html__( 'Rhode Island', 'gravityforms' ) )          => 'RI',
			strtoupper( esc_html__( 'South Carolina', 'gravityforms' ) )        => 'SC',
			strtoupper( esc_html__( 'South Dakota', 'gravityforms' ) )          => 'SD',
			strtoupper( esc_html__( 'Tennessee', 'gravityforms' ) )             => 'TN',
			strtoupper( esc_html__( 'Texas', 'gravityforms' ) )                 => 'TX',
			strtoupper( esc_html__( 'Utah', 'gravityforms' ) )                  => 'UT',
			strtoupper( esc_html__( 'Vermont', 'gravityforms' ) )               => 'VT',
			strtoupper( esc_html__( 'Virginia', 'gravityforms' ) )              => 'VA',
			strtoupper( esc_html__( 'Washington', 'gravityforms' ) )            => 'WA',
			strtoupper( esc_html__( 'West Virginia', 'gravityforms' ) )         => 'WV',
			strtoupper( esc_html__( 'Wisconsin', 'gravityforms' ) )             => 'WI',
			strtoupper( esc_html__( 'Wyoming', 'gravityforms' ) )               => 'WY',
			strtoupper( esc_html__( 'Armed Forces Americas', 'gravityforms' ) ) => 'AA',
			strtoupper( esc_html__( 'Armed Forces Europe', 'gravityforms' ) )   => 'AE',
			strtoupper( esc_html__( 'Armed Forces Pacific', 'gravityforms' ) )  => 'AP',
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		);

		$code = isset( $states[ strtoupper( $state_name ) ] ) ? $states[ strtoupper( $state_name ) ] : strtoupper( $state_name );

		return $code;
	}


	public function get_canadian_provinces() {
<<<<<<< HEAD
		return array( __( 'Alberta', 'gravityforms' ), __( 'British Columbia', 'gravityforms' ), __( 'Manitoba', 'gravityforms' ), __( 'New Brunswick', 'gravityforms' ), __( 'Newfoundland & Labrador', 'gravityforms' ), __( 'Northwest Territories', 'gravityforms' ), __( 'Nova Scotia', 'gravityforms' ), __( 'Nunavut', 'gravityforms' ), __( 'Ontario', 'gravityforms' ), __( 'Prince Edward Island', 'gravityforms' ), __( 'Quebec', 'gravityforms' ), __( 'Saskatchewan', 'gravityforms' ), __( 'Yukon', 'gravityforms' ) );
=======
		return array( esc_html__( 'Alberta', 'gravityforms' ), esc_html__( 'British Columbia', 'gravityforms' ), esc_html__( 'Manitoba', 'gravityforms' ), esc_html__( 'New Brunswick', 'gravityforms' ), esc_html__( 'Newfoundland & Labrador', 'gravityforms' ), esc_html__( 'Northwest Territories', 'gravityforms' ), esc_html__( 'Nova Scotia', 'gravityforms' ), esc_html__( 'Nunavut', 'gravityforms' ), esc_html__( 'Ontario', 'gravityforms' ), esc_html__( 'Prince Edward Island', 'gravityforms' ), esc_html__( 'Quebec', 'gravityforms' ), esc_html__( 'Saskatchewan', 'gravityforms' ), esc_html__( 'Yukon', 'gravityforms' ) );
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

	}

	public function get_state_dropdown( $states, $selected_state = '', $placeholder = '' ) {
		$str = '';
		foreach ( $states as $code => $state ) {
			if ( is_numeric( $code ) ) {
				$code = $state;
			}
			if ( empty( $state ) ) {
				$state = $placeholder;
			}
			$selected = $code == $selected_state ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $code ) . "' $selected>" . esc_html( $state ) . '</option>';
		}

		return $str;
	}

	public function get_us_state_dropdown( $selected_state = '' ) {
		$states = array_merge( array( '' ), $this->get_us_states() );
		$str    = '';
		foreach ( $states as $code => $state ) {
			if ( is_numeric( $code ) ) {
				$code = $state;
			}

			$selected = $code == $selected_state ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $code ) . "' $selected>" . esc_html( $state ) . '</option>';
		}

		return $str;
	}

	public function get_canadian_provinces_dropdown( $selected_province = '' ) {
		$states = array_merge( array( '' ), $this->get_canadian_provinces() );
		$str    = '';
		foreach ( $states as $state ) {
			$selected = $state == $selected_province ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $state ) . "' $selected>" . esc_html( $state ) . '</option>';
		}

		return $str;
	}

	public function get_country_dropdown( $selected_country = '', $placeholder = '' ) {
		$str       = '';
		$selected_country = strtolower( $selected_country );
		$countries = array_merge( array( '' ), $this->get_countries() );
		foreach ( $countries as $code => $country ) {
			if ( is_numeric( $code ) ) {
				$code = $country;
			}
			if ( empty( $country ) ) {
				$country = $placeholder;
			}
			$selected = strtolower( $code ) == $selected_country ? "selected='selected'" : '';
			$str .= "<option value='" . esc_attr( $code ) . "' $selected>" . esc_html( $country ) . '</option>';
		}

		return $str;
	}

	public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {
		if ( is_array( $value ) ) {
			$street_value  = trim( rgget( $this->id . '.1', $value ) );
			$street2_value = trim( rgget( $this->id . '.2', $value ) );
			$city_value    = trim( rgget( $this->id . '.3', $value ) );
			$state_value   = trim( rgget( $this->id . '.4', $value ) );
			$zip_value     = trim( rgget( $this->id . '.5', $value ) );
			$country_value = trim( rgget( $this->id . '.6', $value ) );

			$line_break = $format == 'html' ? '<br />' : "\n";

			$address_display_format = apply_filters( 'gform_address_display_format', 'default', $this );
			if ( $address_display_format == 'zip_before_city' ) {
				/*
                Sample:
                3333 Some Street
                suite 16
                2344 City, State
                Country
                */

				$addr_ary   = array();
				$addr_ary[] = $street_value;

				if ( ! empty( $street2_value ) ) {
					$addr_ary[] = $street2_value;
				}

				$zip_line = trim( $zip_value . ' ' . $city_value );
				$zip_line .= ! empty( $zip_line ) && ! empty( $state_value ) ? ", {$state_value}" : $state_value;
				$zip_line = trim( $zip_line );
				if ( ! empty( $zip_line ) ) {
					$addr_ary[] = $zip_line;
				}

				if ( ! empty( $country_value ) ) {
					$addr_ary[] = $country_value;
				}

				$address = implode( '<br />', $addr_ary );

			} else {
				$address = $street_value;
				$address .= ! empty( $address ) && ! empty( $street2_value ) ? $line_break . $street2_value : $street2_value;
				$address .= ! empty( $address ) && ( ! empty( $city_value ) || ! empty( $state_value ) ) ? $line_break . $city_value : $city_value;
				$address .= ! empty( $address ) && ! empty( $city_value ) && ! empty( $state_value ) ? ", $state_value" : $state_value;
				$address .= ! empty( $address ) && ! empty( $zip_value ) ? " $zip_value" : $zip_value;
				$address .= ! empty( $address ) && ! empty( $country_value ) ? $line_break . $country_value : $country_value;
			}

			//adding map link
			$map_link_disabled = apply_filters( 'gform_disable_address_map_link', false );
			if ( ! empty( $address ) && $format == 'html' && ! $map_link_disabled ) {
				$address_qs = str_replace( $line_break, ' ', $address ); //replacing <br/> and \n with spaces
				$address_qs = urlencode( $address_qs );
				$address .= "<br/><a href='http://maps.google.com/maps?q={$address_qs}' target='_blank' class='map-it-link'>Map It</a>";
			}

			return $address;
		} else {
			return '';
		}
	}

	public function get_input_property( $input_id, $property_name ) {
		$input = GFFormsModel::get_input( $this, $input_id );

		return rgar( $input, $property_name );
	}

	public function sanitize_settings() {
		parent::sanitize_settings();
		if ( $this->addressType ) {
			$this->addressType = wp_strip_all_tags( $this->addressType );
		}

		if ( $this->defaultCountry ) {
			$this->defaultCountry = wp_strip_all_tags( $this->defaultCountry );
		}

		if ( $this->defaultProvince ) {
			$this->defaultProvince = wp_strip_all_tags( $this->defaultProvince );
		}

	}
<<<<<<< HEAD
=======

	public function get_value_export( $entry, $input_id = '', $use_text = false, $is_csv = false ) {
		if ( empty( $input_id ) ) {
			$input_id = $this->id;
		}

		if ( absint( $input_id ) == $input_id ) {
			$street_value  = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.1' ) ) );
			$street2_value = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.2' ) ) );
			$city_value    = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.3' ) ) );
			$state_value   = str_replace( '  ', ' ', trim( rgar( $entry, $input_id . '.4' ) ) );
			$zip_value     = trim( rgar( $entry, $input_id . '.5' ) );
			$country_value = $this->get_country_code( trim( rgar( $entry, $input_id . '.6' ) ) );

			$address = $street_value;
			$address .= ! empty( $address ) && ! empty( $street2_value ) ? "  $street2_value" : $street2_value;
			$address .= ! empty( $address ) && ( ! empty( $city_value ) || ! empty( $state_value ) ) ? ", $city_value," : $city_value;
			$address .= ! empty( $address ) && ! empty( $city_value ) && ! empty( $state_value ) ? "  $state_value" : $state_value;
			$address .= ! empty( $address ) && ! empty( $zip_value ) ? "  $zip_value," : $zip_value;
			$address .= ! empty( $address ) && ! empty( $country_value ) ? "  $country_value" : $country_value;

			return $address;
		} else {

			return rgar( $entry, $input_id );
		}
	}

>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
}

GF_Fields::register( new GF_Field_Address() );
