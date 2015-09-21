<?php
if ( ! class_exists( 'GFForms' ) ) {
	die();
}
?>

	<script type="text/javascript">
	var gforms_dragging = 0;
	var gforms_original_json;

	function DeleteCustomChoice() {
<<<<<<< HEAD
		if (!confirm("<?php _e( "Delete this custom choice list? 'OK' to delete, 'Cancel' to abort.", 'gravityforms' ) ?>"))
=======
		if (!confirm(<?php echo json_encode( __( "Delete this custom choice list? 'OK' to delete, 'Cancel' to abort.", 'gravityforms' ) ); ?>))
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			return;

		//Sending AJAX request
		jQuery.post( ajaxurl, {action: "gf_delete_custom_choice", name: gform_selected_custom_choice, gf_delete_custom_choice: "<?php echo wp_create_nonce( 'gf_delete_custom_choice' ) ?>"});

		//Updating UI
		delete gform_custom_choices[gform_selected_custom_choice];
		gform_selected_custom_choice = '';

		CloseCustomChoicesPanel();
		jQuery("#gfield_bulk_add_input").val('');
		InitBulkCustomPanel();
		LoadCustomChoices();
<<<<<<< HEAD
		DisplayCustomMessage("<?php _e( 'Item has been deleted.', 'gravityforms' )?>");
=======
		DisplayCustomMessage(<?php echo json_encode( esc_html__( 'Item has been deleted.', 'gravityforms' ) )?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	function SaveCustomChoices() {

		var name = jQuery('#custom_choice_name').val();
		if (name.length == 0) {
<<<<<<< HEAD
			alert("<?php _e( 'Please enter name.', 'gravityforms' ) ?>");
			return;
		}
		else if (gform_custom_choices[name] && name != gform_selected_custom_choice) {
			alert("<?php _e( 'This custom choice name is already in use. Please enter another name.', 'gravityforms' ) ?>");
=======
			alert(<?php echo json_encode( esc_html__( 'Please enter name.', 'gravityforms' ) ); ?>);
			return;
		}
		else if (gform_custom_choices[name] && name != gform_selected_custom_choice) {
			alert(<?php echo json_encode( esc_html__( 'This custom choice name is already in use. Please enter another name.', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			return;
		}

		var choices = jQuery('#gfield_bulk_add_input').val().split('\n');

		//Sending AJAX request
		jQuery.post(ajaxurl, {action: "gf_save_custom_choice", previous_name: gform_selected_custom_choice, new_name: name, choices: jQuery.toJSON(choices), gf_save_custom_choice: "<?php echo wp_create_nonce( 'gf_save_custom_choice' ) ?>"});

		//deleting existing custom choice
		if (gform_selected_custom_choice.length > 0)
			delete gform_custom_choices[gform_selected_custom_choice];

		//saving new custom choice
		gform_custom_choices[name] = choices;

		InitBulkCustomPanel();
		LoadCustomChoices();

<<<<<<< HEAD
		DisplayCustomMessage("<?php _e( 'Item has been saved.', 'gravityforms' )?>");
=======
		DisplayCustomMessage(<?php echo json_encode( esc_html__( 'Item has been saved.', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	function InitializeFormConditionalLogic() {
		var canHaveConditionalLogic = GetFirstRuleField() > 0;
		if (canHaveConditionalLogic) {
			jQuery("#form_button_conditional_logic").prop("disabled", false).prop("checked", form.button.conditionalLogic ? true : false);
			ToggleConditionalLogic(true, "form_button");
		}
		else {
			jQuery("#form_button_conditional_logic").prop("disabled", false).prop("checked", false);
<<<<<<< HEAD
			jQuery("#form_button_conditional_logic_container").show().html("<span class='instruction' style='margin-left:0'><?php _e( 'To use conditional logic, please create a field that supports conditional logic.', 'gravityforms' ) ?></span>");
=======
			jQuery("#form_button_conditional_logic_container").show().html("<span class='instruction' style='margin-left:0'>" + <?php echo json_encode( esc_html__( 'To use conditional logic, please create a field that supports conditional logic.', 'gravityforms' ) ); ?> + "</span>");
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
	}

	function InitPaginationOptions(isInit) {
		var speed = isInit ? "" : "slow";

		var pages = GetFieldsByType(["page"]);
		pages.push(new Array());
		var str = "<ul class='gform_page_names'>";

		var pageNameFields = jQuery(".gform_page_names input");
		for (var i = 0; i < pages.length; i++) {
			var pageName = form["pagination"] && form["pagination"]["pages"] && form["pagination"]["pages"][i] ? form["pagination"]["pages"][i].replace("'", "&#39") : "";
			if (pageNameFields.length > i && pageNameFields[i].value)
				pageName = pageNameFields[i].value;

<<<<<<< HEAD
			str += "<li><label class='inline' for='gform_pagename_" + i + "' ><?php _e( 'Page', 'gravityforms' ) ?> " + (i + 1) + "</label> <input type='text' class='fieldwidth-4' id='gform_pagename_" + i + "' value='" + pageName + "' /></li>";
=======
			str += "<li><label class='inline' for='gform_pagename_" + i + "' >" + <?php echo json_encode( esc_html__( 'Page', 'gravityforms' ) ); ?> + " " + (i + 1) + "</label> <input type='text' class='fieldwidth-4' id='gform_pagename_" + i + "' value='" + pageName + "' /></li>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
		str += "</ul>";

		jQuery("#page_names_container").html(str);

		if (jQuery("#pagination_type_none").is(":checked")) {
			jQuery(".gform_page_names input").val("");
			jQuery("#percentage_confirmation_page_name").val("");
			jQuery("#percentage_confirmation_display").prop("checked", false);

			jQuery("#page_names_setting").hide(speed);
			jQuery("#percentage_style_setting").hide(speed);
			jQuery("#percentage_confirmation_display_setting").hide(speed);
		}
		else if (jQuery("#pagination_type_percentage").is(":checked")) {
			var style = form["pagination"] && form["pagination"]["style"] ? form["pagination"]["style"] : "blue";
			jQuery("#percentage_style").val(style);

			if (style == "custom" && form["pagination"]["backgroundColor"]) {
				jQuery("#percentage_style_custom_bgcolor").val(form["pagination"]["backgroundColor"]);
				SetColorPickerColor("percentage_style_custom_bgcolor", form["pagination"]["backgroundColor"], "");
			}
			if (style == "custom" && form["pagination"]["color"]) {
				jQuery("#percentage_style_custom_color").val(form["pagination"]["color"]);
				SetColorPickerColor("percentage_style_custom_color", form["pagination"]["color"], "");
			}

			jQuery("#page_names_setting").show(speed);
			jQuery("#percentage_style_setting").show(speed);
			jQuery("#percentage_confirmation_display_setting").show(speed);
			jQuery("#percentage_confirmation_page_name_setting").show(speed);

			jQuery("#percentage_confirmation_display").prop("checked", form["pagination"] && form["pagination"]["display_progressbar_on_confirmation"] ? true : false);
			//set default text to Completed when displaying progress bar on confirmation is NOT checked
<<<<<<< HEAD
			var completion_text = form["pagination"] && form["pagination"]["display_progressbar_on_confirmation"] ? form["pagination"]["progressbar_completion_text"] : "<?php _e( 'Completed','gravityforms' ) ?>";
=======
			var completion_text = form["pagination"] && form["pagination"]["display_progressbar_on_confirmation"] ? form["pagination"]["progressbar_completion_text"] : <?php echo json_encode( esc_html__( 'Completed','gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			jQuery("#percentage_confirmation_page_name").val(completion_text);
		}
		else {
			jQuery("#percentage_style_setting").hide(speed);
			jQuery("#page_names_setting").show(speed);
			jQuery("#percentage_confirmation_display_setting").hide(speed);
			jQuery("#percentage_confirmation_page_name_setting").hide(speed);
			jQuery("percentage_confirmation_page_name").val("");
			jQuery("#percentage_confirmation_display").prop("checked", false);
		}

		TogglePercentageStyle(isInit);
		TogglePercentageConfirmationText(isInit);
	}

	function ShowSettings(element_id) {
		jQuery(".field_selected .field_edit_icon, .field_selected .form_edit_icon").removeClass("edit_icon_collapsed").addClass("edit_icon_expanded").html('<i class="fa fa-caret-up fa-lg"></i>');
		jQuery("#" + element_id).slideDown();
	}

	function HideSettings(element_id) {
		jQuery(".field_edit_icon, .form_edit_icon").removeClass("edit_icon_expanded").addClass("edit_icon_collapsed").html('<i class="fa fa-caret-down fa-lg"></i>');
		jQuery("#" + element_id).hide();
	}

	function TogglePostCategoryInitialItem(isInit) {
		var speed = isInit ? "" : "slow";

		if (jQuery("#gfield_post_category_initial_item_enabled").is(":checked")) {
			jQuery("#gfield_post_category_initial_item_container").show(speed);

			if (!isInit) {
<<<<<<< HEAD
				jQuery("#field_post_category_initial_item").val('<?php _e( 'Select a category', 'gravityforms' )?>');
=======
				jQuery("#field_post_category_initial_item").val(<?php echo json_encode( esc_html__( 'Select a category', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}
		}
		else {
			jQuery("#gfield_post_category_initial_item_container").hide(speed);
			jQuery("#field_post_category_initial_item").val('');
		}

	}

	function CreateInputNames(field) {
		var field_str = "", id, value, inputs;

		var inputType = GetInputType(field);
		var legacy = jQuery.inArray(inputType, ['date', 'email', 'time', 'password'])>-1;
		inputs = !legacy ? field['inputs'] : null;

		if (!inputs || GetInputType(field) == "checkbox") {
<<<<<<< HEAD
			field_str = "<label for='field_input_name' class='inline'><?php _e( 'Parameter Name:', 'gravityforms' ); ?>&nbsp;</label>";
			field_str += "<input type='text' value='" + field["inputName"] + "' id='field_input_name' />";
		}
		else {
			field_str = "<table><tr><td><strong>Field</strong></td><td><strong><?php _e( 'Parameter Name', 'gravityforms' ); ?></strong></td></tr>";
=======
			field_str = "<label for='field_input_name' class='inline'>" + <?php echo json_encode( esc_html__( 'Parameter Name:', 'gravityforms' ) ); ?> + "&nbsp;</label>";
			field_str += "<input type='text' value='" + field["inputName"] + "' id='field_input_name' />";
		}
		else {
			field_str = "<table><tr><td><strong>Field</strong></td><td><strong>" + <?php echo json_encode( esc_html__( 'Parameter Name', 'gravityforms' ) ); ?> + "</strong></td></tr>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			for (var i = 0; i < field["inputs"].length; i++) {
				id = field["inputs"][i]["id"];
				field_str += "<tr class='field_input_name_row' data-input_id='" + id + "' ><td><label for='field_input_" + id + "' class='inline'>" + field["inputs"][i]["label"] + "</label></td>";
				value = typeof field["inputs"][i]["name"] != 'undefined' ? field["inputs"][i]["name"] : '';
				field_str += "<td><input class='field_input_name' type='text' value='" + value + "' id='field_input_" + id + "' /></td></tr>";
			}
		}

		jQuery("#field_input_name_container").html(field_str);
	}

	function CreateDefaultValuesUI(field) {
		var field_str, defaultValue, inputName, inputId, id, inputs;

		if (!field['inputs']) {
<<<<<<< HEAD
			field_str = "<label for='field_single_default_value' class='inline'><?php _e( 'Default Value:', 'gravityforms' ); ?>&nbsp;</label>";
			defaultValue = typeof field["defaultValue"] != 'undefined' ? field["defaultValue"] : '';
			field_str += "<input type='text' value='" + defaultValue + "' id='field_single_default_value'/>";
		} else {
			field_str = "<table class='default_input_values'><tr><td><strong>Field</strong></td><td><strong><?php _e( 'Default Value', 'gravityforms' ); ?></strong></td></tr>";
=======
			field_str = "<label for='field_single_default_value' class='inline'>" + <?php echo json_encode( esc_html__( 'Default Value:', 'gravityforms' ) ); ?> + "&nbsp;</label>";
			defaultValue = typeof field["defaultValue"] != 'undefined' ? field["defaultValue"] : '';
			field_str += "<input type='text' value='" + defaultValue + "' id='field_single_default_value'/>";
		} else {
			field_str = "<table class='default_input_values'><tr><td><strong>Field</strong></td><td><strong>" + <?php echo json_encode( esc_html__( 'Default Value', 'gravityforms' ) ); ?> + "</strong></td></tr>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			for (var i = 0; i < field["inputs"].length; i++) {
				id = field["inputs"][i]["id"];
				inputName = 'input_' + id.toString();
				inputId = inputName.replace('.', '_');
				if (!document.getElementById(inputId) && jQuery('[name="' + inputName + '"]').length == 0) {
					continue;
				}
				field_str += "<tr class='default_input_value_row' data-input_id='" + id + "' id='input_default_value_row_" + inputId + "'><td><label for='field_default_value_" + id + "' class='inline'>" + field["inputs"][i]["label"] + "</label></td>";
				defaultValue = typeof field["inputs"][i]["defaultValue"] != 'undefined' ? field["inputs"][i]["defaultValue"] : '';
				field_str += "<td><input class='default_input_value' type='text' value='" + defaultValue + "' id='field_default_value_" + id + "' /></td></tr>";
			}
		}
		jQuery("#field_default_input_values_container").html(field_str);
	}

	function CreatePlaceholdersUI(field) {
		var field_str, placeholder, inputName, inputId, id;

		if (!field["inputs"]) {
<<<<<<< HEAD
			field_str = "<label for='field_single_placeholder' class='inline'><?php _e( 'Placeholder:', 'gravityforms' ); ?>&nbsp;</label>";
			placeholder = typeof field["placeholder"] != 'undefined' ? field["placeholder"] : '';
			field_str += "<input type='text' value='" + placeholder + "' id='field_single_placeholder' />";
		} else {
			field_str = "<table class='input_placeholders'><tr><td><strong>Field</strong></td><td><strong><?php _e( 'Placeholder', 'gravityforms' ); ?></strong></td></tr>";
=======
			field_str = "<label for='field_single_placeholder' class='inline'>" + <?php echo json_encode( esc_html__( 'Placeholder:', 'gravityforms' ) ); ?> + "&nbsp;</label>";
			placeholder = typeof field["placeholder"] != 'undefined' ? field["placeholder"] : '';
			field_str += "<input type='text' value='" + placeholder + "' id='field_single_placeholder' />";
		} else {
			field_str = "<table class='input_placeholders'><tr><td><strong>Field</strong></td><td><strong>" + <?php echo json_encode( esc_html__( 'Placeholder', 'gravityforms' ) ); ?> + "</strong></td></tr>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			for (var i = 0; i < field["inputs"].length; i++) {
				id = field["inputs"][i]["id"];
				inputName = 'input_' + id.toString();
				inputId = inputName.replace('.', '_');
				if (!document.getElementById(inputId) && jQuery('[name="' + inputName + '"]').length == 0) {
					continue;
				}
				field_str += "<tr class='input_placeholder_row' data-input_id='" + id + "' id='input_placeholder_row_" + inputId + "'><td><label for='field_placeholder_" + id + "' class='inline'>" + field["inputs"][i]["label"] + "</label></td>";
				placeholder = typeof field["inputs"][i]["placeholder"] != 'undefined' ? field["inputs"][i]["placeholder"] : '';
				placeholder = placeholder.replace(/'/g, "&#039;");
				field_str += "<td><input class='input_placeholder' type='text' value='" + placeholder + "' id='field_placeholder_" + id + "' /></td></tr>";
			}
		}

		jQuery("#field_input_placeholders_container").html(field_str);
	}

	function GetCustomizeInputsUI(field, showInputSwitches) {
		if (typeof showInputSwitches == 'undefined') {
			showInputSwitches = true;
		}
		var imagesUrl = '<?php echo GFCommon::get_base_url() . '/images/'?>';
		var html, customLabel, isHidden, title, img, input, inputId, id, inputName, defaultLabel, placeholder;

		if (!field['inputs']) {
<<<<<<< HEAD
			html = "<label for='field_single_input' class='inline'><?php _e( 'Sub-Label:', 'gravityforms' ); ?>&nbsp;</label>";
=======
			html = "<label for='field_single_input' class='inline'>" + <?php echo json_encode( esc_html__( 'Sub-Label:', 'gravityforms' ) ); ?> + "&nbsp;</label>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			customLabel = typeof field["customInputLabel"] != 'undefined' ? field["customInputLabel"] : '';
			html += "<input type='text' value='" + customLabel + "' id='field_single_custom_label' />";
		} else {
			html = "<table class='field_custom_inputs_ui'><tr>";
			if (showInputSwitches) {
				html += "<td></td>";
			}
<<<<<<< HEAD
			html += "<td><strong>Field</strong></td><td><strong><?php _e( 'Custom Sub-Label', 'gravityforms' ); ?></strong></td></tr>";
=======
			html += "<td><strong>Field</strong></td><td><strong>" + <?php echo json_encode( esc_html__( 'Custom Sub-Label', 'gravityforms' ) ); ?> + "</strong></td></tr>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			for (var i = 0; i < field["inputs"].length; i++) {
				input = field["inputs"][i];
				id = input.id;
				inputName = 'input_' + id.toString();
				inputId = inputName.replace('.', '_');
				if (jQuery('label[for="' + inputId + '"]').length == 0) {
					continue;
				}
				isHidden = typeof input.isHidden != 'undefined' && input.isHidden ? true : false;
<<<<<<< HEAD
				title = isHidden ? '<?php _e( 'Inactive', 'gravityforms' ); ?>' : '<?php _e( 'Active', 'gravityforms' ); ?>';
=======
				title = isHidden ? <?php echo json_encode( esc_html__( 'Inactive', 'gravityforms' ) ); ?> : <?php echo json_encode( esc_html__( 'Active', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				img = isHidden ? 'active0.png' : 'active1.png';
				html += "<tr data-input_id='" + id + "' class='field_custom_input_row field_custom_input_row_" + inputId + "'>";
				if (showInputSwitches) {
					html += "<td><img data-input_id='" + input.id + "' title='" + title + "' alt='" + title + "' class='input_active_icon' src='" + imagesUrl + img + "'/></td>";
				}
				if (isHidden) {
					jQuery("#input_" + inputId + "_container").toggle(!isHidden);
				}
				defaultLabel = typeof input.defaultLabel != 'undefined' ? input.defaultLabel : input.label;
				defaultLabel = defaultLabel.replace(/'/g, "&#039;");
				html += "<td><label id='field_custom_input_default_label_" + inputId + "' for='field_custom_input_label_" + input.id + "' class='inline'>" + defaultLabel + "</label></td>";
				customLabel = typeof input.customLabel != 'undefined' ? input.customLabel : '';
				customLabel = customLabel.replace(/'/g, "&#039;");
				html += "<td><input class='field_custom_input_default_label' type='text' placeholder='" + defaultLabel + "' value='" + customLabel + "' id='field_custom_input_label_" + input.id + "' /></td></tr>";
			}
		}

		return html;
	}

	function CreateCustomizeInputsUI(field) {
		var field_str = GetCustomizeInputsUI(field);
		jQuery("#field_customize_inputs_container").html(field_str);
	}

	function CreateInputLabelsUI(field) {
		var field_str = GetCustomizeInputsUI(field, false);
		jQuery("#field_sub_labels_container").html(field_str);
	}

	function SetCopyValuesOptionProperties(isEnabled) {
<<<<<<< HEAD
		var defaultLabel = '<?php _e( 'Same as previous', 'gravityforms' ) ?>';
=======
		var defaultLabel = <?php echo json_encode( esc_html__( 'Same as previous', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		SetFieldProperty('enableCopyValuesOption', isEnabled == true ? 1 : 0);
		SetFieldProperty('copyValuesOptionDefault', 0);
		SetFieldProperty('copyValuesOptionLabel', defaultLabel);
		var sourceFieldId = jQuery('#field_copy_values_option_field').val();
		SetFieldProperty('copyValuesOptionField', sourceFieldId);
	}

	function ToggleCopyValuesOption(isInit) {
		var speed = isInit ? "" : "slow";

		if (jQuery('#field_enable_copy_values_option').prop('checked')) {
			jQuery('#field_copy_values_container').show(speed);
			var field = GetSelectedField();
			jQuery('#field_copy_values_option_label').val(field.copyValuesOptionLabel);
			jQuery('.field_selected .copy_values_option_label').html(field.copyValuesOptionLabel);
			jQuery('.field_selected .copy_values_option_container').show();
		} else {
			jQuery('#field_copy_values_container').hide(speed);
			jQuery('#field_copy_values_option_default').prop('checked', false);
			jQuery('.field_selected .copy_values_option_container').hide();
		}
	}

	function ToggleInputHidden(img, inputId) {
		var isHidden = img.src.indexOf("active0.png") >= 0;
		if (isHidden) {
			img.src = img.src.replace("active0.png", "active1.png");
<<<<<<< HEAD
			jQuery(img).attr('title', '<?php _e( 'Active', 'gravityforms' ) ?>').attr('alt', '<?php _e( 'Active', 'gravityforms' ) ?>');
		}
		else {
			img.src = img.src.replace("active1.png", "active0.png");
			jQuery(img).attr('title', '<?php _e( 'Inactive', 'gravityforms' ) ?>').attr('alt', '<?php _e( 'Inactive', 'gravityforms' ) ?>');
=======
			jQuery(img).attr('title', <?php echo json_encode( esc_html__( 'Active', 'gravityforms' ) ); ?>).attr('alt', <?php echo json_encode( esc_html__( 'Active', 'gravityforms' ) ); ?>);
		}
		else {
			img.src = img.src.replace("active1.png", "active0.png");
			jQuery(img).attr('title', <?php echo json_encode( esc_html__( 'Inactive', 'gravityforms' ) ); ?>).attr('alt', <?php echo json_encode( esc_html__( 'Inactive', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
		SetInputHidden(!isHidden, inputId);

		return true;
	}


	function SetProductField(field) {
		var product_field_container = jQuery(".product_field_setting");

		//ignore product field if it is not configured for the current field
		if (!product_field_container.is(":visible"))
			return;

		var productFields = new Array();
		for (var i = 0; i < form["fields"].length; i++) {
			if (form["fields"][i]["type"] == "product")
				productFields.push(form["fields"][i]);
		}

		jQuery("#gform_no_product_field_message").remove();
		if (productFields.length < 1) {
<<<<<<< HEAD
			jQuery("#product_field").hide().after("<div id='gform_no_product_field_message'><?php _e( 'This field is not associated with a product. Please add a Product Field to the form.', 'gravityforms' ) ?></div>");
=======
			jQuery("#product_field").hide().after("<div id='gform_no_product_field_message'>" + <?php echo json_encode( esc_html__( 'This field is not associated with a product. Please add a Product Field to the form.', 'gravityforms' ) ); ?> + "</div>");
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
		else {
			var product_field = jQuery("#product_field");
			product_field.show();
			product_field.html("");
			var is_selected = false;
			for (var i = 0; i < productFields.length; i++) {
				selected = "";
				if (productFields[i]["id"] == field["productField"]) {
					selected = "selected='selected'";
					is_selected = true;
				}
				product_field.append("<option value='" + productFields[i]["id"] + "' " + selected + ">" + productFields[i]["label"] + "</option>");
			}

			//Adds existing product field if it is not found in the list (to prevent confusion)
			if (!is_selected && field["productField"] != "") {
<<<<<<< HEAD
				product_field.append("<option value='" + field["productField"] + "' selected='selected'>[<?php _e( 'Deleted Field', 'gravityforms' ) ?>]</option>");
=======
				product_field.append("<option value='" + field["productField"] + "' selected='selected'>[" + <?php echo json_encode( esc_html__( 'Deleted Field', 'gravityforms' ) ); ?> + "]</option>");
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}

		}
	}

	function LoadFieldConditionalLogic(isEnabled, objectType) {
		var obj = GetConditionalObject(objectType);
		if (isEnabled) {
			jQuery("#" + objectType + "_conditional_logic").prop("checked", obj.conditionalLogic ? true : false);
			jQuery("#" + objectType + "_conditional_logic").prop("disabled", false);
			ToggleConditionalLogic(true, objectType);


		}
		else {
			jQuery("#" + objectType + "_conditional_logic").prop("disabled", true).prop("checked", false);
<<<<<<< HEAD
			jQuery("#" + objectType + "_conditional_logic_container").show().html("<span class='instruction' style='margin-left:0'><?php _e( 'To use conditional logic, please create a field that supports conditional logic.', 'gravityforms' ) ?></span>");
=======
			jQuery("#" + objectType + "_conditional_logic_container").show().html("<span class='instruction' style='margin-left:0'>" + <?php echo json_encode( esc_html__( 'To use conditional logic, please create a field that supports conditional logic.', 'gravityforms' ) ); ?> + "</span>");
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
	}

	function GetCurrentCurrency() {
		<?php
		require_once('currency.php');
		$current_currency = RGCurrency::get_currency( GFCommon::get_currency() );
		?>
		var currency = new Currency(<?php echo GFCommon::json_encode( $current_currency )?>);
		return currency;
	}

	function ToggleColumns(isInit) {
		var speed = isInit ? "" : "slow";
		var field = GetSelectedField();

		if (jQuery('#field_columns_enabled').is(":checked")) {
			jQuery('#gfield_settings_columns_container').show(speed);

			if (!field.choices)
<<<<<<< HEAD
				field.choices = new Array(new Choice("<?php _e( 'Column 1', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Column 2', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Column 3', 'gravityforms' ); ?>"));
=======
				field.choices = new Array(new Choice(<?php echo json_encode( esc_html__( 'Column 1', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Column 2', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Column 3', 'gravityforms' ) ); ?>));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

			LoadFieldChoices(field, true);
		}
		else {
			field.choices = null;
			jQuery('#gfield_settings_columns_container').hide(speed);
		}

		UpdateFieldChoices(GetInputType(field));

	}

	function DuplicateTitleMessage() {
		jQuery("#please_wait_container").hide();
<<<<<<< HEAD
		alert('<?php _e( 'The form title you have entered is already taken. Please enter a unique form title', 'gravityforms' ); ?>');
=======
		alert(<?php echo json_encode( esc_html__( 'The form title you have entered is already taken. Please enter a unique form title', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	function ValidateForm() {
		var error = "";
		if (jQuery.trim(form.title).length == 0) {
<<<<<<< HEAD
			error = "<?php _e( 'Please enter a Title for this form. When adding the form to a page or post, you will have the option to hide the title.', 'gravityforms' ) ?>";
=======
			error = <?php echo json_encode( esc_html__( 'Please enter a Title for this form. When adding the form to a page or post, you will have the option to hide the title.', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}
		else {
			var last_page_break = -1;
			var has_option = false;
			var has_product = false;
			for (var i = 0; i < form["fields"].length; i++) {
				var field = form["fields"][i];
				switch (field["type"]) {
					case "page" :
						if (i == last_page_break + 1 || i == form["fields"].length - 1)
<<<<<<< HEAD
							error = "<?php _e( 'Your form currently has one ore more pages without any fields in it. Blank pages are a result of Page Breaks that are positioned as the first or last field in the form or right after to each other. Please adjust your Page Breaks and try again.', 'gravityforms' ) ?>";
=======
							error = <?php echo json_encode( esc_html__( 'Your form currently has one ore more pages without any fields in it. Blank pages are a result of Page Breaks that are positioned as the first or last field in the form or right after to each other. Please adjust your Page Breaks and try again.', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

						last_page_break = i;
						break;

					case "product" :
						has_product = true;
						if (jQuery.trim(field["label"]).length == 0)
<<<<<<< HEAD
							error = "<?php _e( 'Your form currently has a product field with a blank label. \\nPlease enter a label for all product fields.', 'gravityforms' ) ?>";
=======
							error = <?php echo json_encode( esc_html__( "Your form currently has a product field with a blank label.\nPlease enter a label for all product fields.", 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
						break;

					case "option" :
						has_option = true;
						break;
				}
			}
			if (has_option && !has_product) {
<<<<<<< HEAD
				error = "<?php _e( 'Your form currently has an option field without a product field.\\nYou must add a product field to your form.', 'gravityforms' ) ?>";
=======
				error = <?php echo json_encode( esc_html__( "Your form currently has an option field without a product field.\nYou must add a product field to your form.", 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			}
		}
		if (error) {
			jQuery("#please_wait_container").hide();
			alert(error);
			return false;
		}
		return true;
	}

	function SaveForm(isNew) {

		UpdateFormObject();

		if (!ValidateForm()) {
			return false;
		}

		// remove data that is no longer stored in the form object (as of 1.7)
		delete form.notification;
		delete form.autoResponder;
		delete form.notifications;
		delete form.confirmation;
		delete form.confirmations;

		//updating original json. used when verifying if there has been any changes unsaved changed before leaving the page
		var form_json = jQuery.toJSON(form);
		gforms_original_json = form_json;

		if (!isNew) {
			jQuery("#gform_meta").val(form_json);
			jQuery("#gform_update").submit();
		}
		else {
			jQuery("#please_wait_container").show();
			var mysack = new sack("<?php echo admin_url( 'admin-ajax.php' )?>");
			mysack.execute = 1;
			mysack.method = 'POST';
			mysack.setVar("action", "rg_save_form");
			mysack.setVar("rg_save_form", "<?php echo wp_create_nonce( 'rg_save_form' ) ?>");
			mysack.setVar("id", form.id);
			mysack.setVar("form", form_json);
			mysack.onError = function () {
<<<<<<< HEAD
				alert('<?php echo esc_js( __( 'Ajax error while saving form', 'gravityforms' ) ) ?>')
=======
				alert(<?php echo json_encode( __( 'Ajax error while saving form', 'gravityforms' ) ); ?>)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			};
			mysack.runAJAX();
		}

		return true;
	}

	function DeleteField(fieldId) {

<<<<<<< HEAD
		if (form.id == 0 || confirm('<?php _e( "Warning! Deleting this field will also delete all entry data associated with it. \'Cancel\' to stop. \'OK\' to delete", 'gravityforms' ); ?>')) {
=======
		if (form.id == 0 || confirm(<?php echo json_encode( __( "Warning! Deleting this field will also delete all entry data associated with it. 'Cancel' to stop. 'OK' to delete", 'gravityforms' ) ); ?>)) {
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

			jQuery('#gform_fields li#field_' + fieldId).addClass('gform_pending_delete');
			var mysack = new sack("<?php echo admin_url( 'admin-ajax.php' )?>");
			mysack.execute = 1;
			mysack.method = 'POST';
			mysack.setVar("action", "rg_delete_field");
			mysack.setVar("rg_delete_field", "<?php echo wp_create_nonce( 'rg_delete_field' ) ?>");
			mysack.setVar("form_id", form.id);
			mysack.setVar("field_id", fieldId);
			mysack.onError = function () {
<<<<<<< HEAD
				alert('<?php echo esc_js( __( 'Ajax error while deleting field.', 'gravityforms' ) ) ?>')
=======
				alert(<?php echo json_encode( esc_html__( 'Ajax error while deleting field.', 'gravityforms' ) ); ?>)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
			};
			mysack.runAJAX();

			return true;
		}
	}

	function SetDefaultValues( field, index ) {

		var inputType = GetInputType(field);
		switch (inputType) {

			case "post_category" :
<<<<<<< HEAD
				field.label = "<?php _e( 'Post Category', 'gravityforms' ); ?>";
=======
				field.label = <?php echo json_encode( esc_html__( 'Post Category', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;
				field.choices = new Array();
				field.displayAllCategories = true;
				field.inputType = 'select';
				break;

			case "section" :
<<<<<<< HEAD
				field.label = "<?php _e( 'Section Break', 'gravityforms' ); ?>";
=======
				field.label = <?php echo json_encode( esc_html__( 'Section Break', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;
				field["displayOnly"] = true;
				break;

			case "page" :
				field.label = "";
				field.inputs = null;
				field["displayOnly"] = true;
				field["nextButton"] = new Button();
<<<<<<< HEAD
				field["nextButton"]["text"] = "<?php _e( 'Next', 'gravityforms' ) ?>";
				field["previousButton"] = new Button();
				field["previousButton"]["text"] = "<?php _e( 'Previous', 'gravityforms' ) ?>";
				break;

			case "html" :
				field.label = "<?php _e( 'HTML Block', 'gravityforms' ); ?>";
=======
				field["nextButton"]["text"] = <?php echo json_encode( esc_html__( 'Next', 'gravityforms' ) ); ?>;
				field["previousButton"] = new Button();
				field["previousButton"]["text"] = <?php echo json_encode( esc_html__( 'Previous', 'gravityforms' ) ); ?>;
				break;

			case "html" :
				field.label = <?php echo json_encode( esc_html__( 'HTML Block', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;
				field["displayOnly"] = true;
				break;

			case "list" :
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'List', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'List', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				field.inputs = null;

				break;

			case "name" :
<<<<<<< HEAD
				if (!field.label)
					field.label = "<?php _e( 'Name', 'gravityforms' ); ?>";
=======
				if (!field.label){
					field.label = <?php echo json_encode( esc_html__( 'Name', 'gravityforms' ) ); ?>;
				}
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				field.id = parseFloat(field.id);
				field.nameFormat = "advanced";
				field.inputs = GetAdvancedNameFieldInputs(field, true, true, true);

				break;

			case "checkbox" :
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Untitled', 'gravityforms' ); ?>";

				if (!field.choices)
					field.choices = new Array(new Choice("<?php _e( 'First Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Second Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Third Choice', 'gravityforms' ); ?>"));
=======
					field.label = <?php echo json_encode( esc_html__( 'Untitled', 'gravityforms' ) ); ?>;

				if (!field.choices)
					field.choices = new Array(new Choice(<?php echo json_encode( esc_html__( 'First Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Second Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Third Choice', 'gravityforms' ) ); ?>));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				field.inputs = new Array();
				for (var i = 1; i <= field.choices.length; i++) {
					field.inputs.push(new Input(field.id + (i / 10), field.choices[i - 1].text));
				}

				break;
			case "radio" :
				if (!field.label)
					field.label = "<?php _e( 'Untitled', 'gravityforms' ); ?>";

				field.inputs = null;
				if (!field.choices) {
<<<<<<< HEAD
					field.choices = field["enablePrice"] ? new Array(new Choice("<?php _e( 'First Choice', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Second Choice', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Third Choice', 'gravityforms' ); ?>", "", "0.00"))
						: new Array(new Choice("<?php _e( 'First Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Second Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Third Choice', 'gravityforms' ); ?>"));
=======
					field.choices = field["enablePrice"] ? new Array(new Choice(<?php echo json_encode( esc_html__( 'First Choice', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Second Choice', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Third Choice', 'gravityforms' ) ); ?>, "", "0.00"))
						: new Array(new Choice(<?php echo json_encode( esc_html__( 'First Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Second Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Third Choice', 'gravityforms' ) ); ?>));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				}
				break;

			case "multiselect" :
			case "select" :
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Untitled', 'gravityforms' ); ?>";

				field.inputs = null;
				if (!field.choices) {
					field.choices = field["enablePrice"] ? new Array(new Choice("<?php _e( 'First Choice', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Second Choice', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Third Choice', 'gravityforms' ); ?>", "", "0.00"))
						: new Array(new Choice("<?php _e( 'First Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Second Choice', 'gravityforms' ); ?>"), new Choice("<?php _e( 'Third Choice', 'gravityforms' ); ?>"));
=======
					field.label = <?php echo json_encode( esc_html__( 'Untitled', 'gravityforms' ) ); ?>;

				field.inputs = null;
				if (!field.choices) {
					field.choices = field["enablePrice"] ? new Array(new Choice(<?php echo json_encode( esc_html__( 'First Choice', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Second Choice', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Third Choice', 'gravityforms' ) ); ?>, "", "0.00"))
						: new Array(new Choice(<?php echo json_encode( esc_html__( 'First Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Second Choice', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Third Choice', 'gravityforms' ) ); ?>));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				}
				break;
			case "address" :

				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Address', 'gravityforms' ); ?>";
				field.inputs = [new Input(field.id + 0.1, '<?php echo esc_js( apply_filters( 'gform_address_street_' . rgget( 'id' ), apply_filters( 'gform_address_street', __( 'Street Address', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>'), new Input(field.id + 0.2, '<?php echo esc_js( apply_filters( 'gform_address_street2_' . rgget( 'id' ), apply_filters( 'gform_address_street2', __( 'Address Line 2', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>'), new Input(field.id + 0.3, '<?php echo esc_js( apply_filters( 'gform_address_city_' . rgget( 'id' ), apply_filters( 'gform_address_city', __( 'City', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>'),
					new Input(field.id + 0.4, '<?php echo esc_js( apply_filters( 'gform_address_state_' . rgget( 'id' ), apply_filters( 'gform_address_state',__( 'State / Province', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>'), new Input(field.id + 0.5, '<?php echo esc_js( apply_filters( 'gform_address_zip_' . rgget( 'id' ), apply_filters( 'gform_address_zip', __( 'ZIP / Postal Code', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>'), new Input(field.id + 0.6, '<?php echo esc_js( apply_filters( 'gform_address_country_' . rgget( 'id' ), apply_filters( 'gform_address_country', __( 'Country', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>')];
=======
					field.label = <?php echo json_encode( esc_html__( 'Address', 'gravityforms' ) ); ?>;
				field.inputs = [new Input(field.id + 0.1, <?php echo json_encode( gf_apply_filters( 'gform_address_street', rgget( 'id' ), esc_html__( 'Street Address', 'gravityforms' ), rgget( 'id' ) ) ); ?>), new Input(field.id + 0.2, <?php echo json_encode( gf_apply_filters( 'gform_address_street2', rgget( 'id' ), esc_html__( 'Address Line 2', 'gravityforms' ), rgget( 'id' ) ) ); ?>), new Input(field.id + 0.3, <?php echo json_encode( gf_apply_filters( 'gform_address_city', rgget( 'id' ), esc_html__( 'City', 'gravityforms' ), rgget( 'id' ) ) ); ?>),
					new Input(field.id + 0.4, <?php echo json_encode( gf_apply_filters( 'gform_address_state', rgget( 'id' ), __( 'State / Province', 'gravityforms' ), rgget( 'id' ) ) ); ?>), new Input(field.id + 0.5, <?php echo json_encode( gf_apply_filters( 'gform_address_zip', rgget( 'id' ), esc_html__( 'ZIP / Postal Code', 'gravityforms' ), rgget( 'id' ) ) ); ?>), new Input(field.id + 0.6, <?php echo json_encode( gf_apply_filters( 'gform_address_country', rgget( 'id' ), esc_html__( 'Country', 'gravityforms' ), rgget( 'id' ) ) ); ?>)];
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "creditcard" :

				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Credit Card', 'gravityforms' ); ?>";
				var ccNumber, ccExpirationMonth, ccExpirationYear, ccSecruityCode, ccCardType, ccName;

				ccNumber = new Input(field.id + ".1", '<?php echo esc_js( apply_filters( 'gform_card_number_' . rgget( 'id' ), apply_filters( 'gform_card_number', __( 'Card Number', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
				ccExpirationMonth = new Input(field.id + ".2_month", '<?php echo esc_js( apply_filters( 'gform_card_expiration_' . rgget( 'id' ), apply_filters( 'gform_card_expiration', __( 'Expiration Month', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
				ccExpirationMonth.defaultLabel = '<?php echo esc_js( __( 'Expiration Date', 'gravityforms' ) ); ?>';
				ccExpirationYear = new Input(field.id + ".2_year", '<?php echo esc_js( apply_filters( 'gform_card_expiration_' . rgget( 'id' ), apply_filters( 'gform_card_expiration', __( 'Expiration Year', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
				ccSecruityCode = new Input(field.id + ".3", '<?php echo esc_js( apply_filters( 'gform_card_security_code_' . rgget( 'id' ), apply_filters( 'gform_card_security_code', __( 'Security Code', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
				ccCardType = new Input(field.id + ".4", '<?php echo esc_js( apply_filters( 'gform_card_type_' . rgget( 'id' ), apply_filters( 'gform_card_type',__( 'Card Type', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
				ccName = new Input(field.id + ".5", '<?php echo esc_js( apply_filters( 'gform_card_name_' . rgget( 'id' ), apply_filters( 'gform_card_name', __( 'Cardholder Name', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
=======
					field.label = <?php echo json_encode( esc_html__( 'Credit Card', 'gravityforms' ) ); ?>;
				var ccNumber, ccExpirationMonth, ccExpirationYear, ccSecruityCode, ccCardType, ccName;

				ccNumber = new Input(field.id + ".1", <?php echo json_encode( gf_apply_filters( 'gform_card_number', rgget( 'id' ), esc_html__( 'Card Number', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
				ccExpirationMonth = new Input(field.id + ".2_month", <?php echo json_encode( gf_apply_filters( 'gform_card_expiration', rgget( 'id' ), esc_html__( 'Expiration Month', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
				ccExpirationMonth.defaultLabel = <?php echo json_encode( esc_html__( 'Expiration Date', 'gravityforms' ) ); ?>;
				ccExpirationYear = new Input(field.id + ".2_year", <?php echo json_encode( gf_apply_filters( 'gform_card_expiration', rgget( 'id' ), esc_html__( 'Expiration Year', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
				ccSecruityCode = new Input(field.id + ".3", <?php echo json_encode( gf_apply_filters( 'gform_card_security_code', rgget( 'id' ), esc_html__( 'Security Code', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
				ccCardType = new Input(field.id + ".4", <?php echo json_encode( gf_apply_filters( 'gform_card_type', rgget( 'id' ), __( 'Card Type', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
				ccName = new Input(field.id + ".5", <?php echo json_encode( gf_apply_filters( 'gform_card_name', rgget( 'id' ), esc_html__( 'Cardholder Name', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = [ccNumber, ccExpirationMonth, ccExpirationYear, ccSecruityCode, ccCardType, ccName];
				break;
			case "email" :
				field.inputs = GetEmailFieldInputs(field);

				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Email', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Email', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				break;
			case "number" :
				field.inputs = null;

				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Number', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Number', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				if (!field.numberFormat)
					field.numberFormat = "decimal_dot";

				break;
			case "phone" :
				field.inputs = null;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Phone', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Phone', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.phoneFormat = "standard";
				break;
			case "date" :
				field.inputs = GetDateFieldInputs(field);
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Date', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Date', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "time" :
				field.inputs = GetTimeFieldInputs(field);
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Time', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Time', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "website" :
				field.inputs = null;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Website', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Website', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "password" :
				field.inputs = GetPasswordFieldInputs(field);
				field["displayOnly"] = true;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Password', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Password', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "fileupload" :
				field.inputs = null;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'File', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'File', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			case "hidden" :
				field.inputs = null;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Hidden Field', 'gravityforms' ); ?>";
				break;
			case "post_title" :
				field.inputs = null;
				field.label = "<?php _e( 'Post Title', 'gravityforms' ); ?>";
				break;
			case "post_content" :
				field.inputs = null;
				field.label = "<?php _e( 'Post Body', 'gravityforms' ); ?>";
				break;
			case "post_excerpt" :
				field.inputs = null;
				field.label = "<?php _e( 'Post Excerpt', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Hidden Field', 'gravityforms' ) ); ?>;
				break;
			case "post_title" :
				field.inputs = null;
				field.label = <?php echo json_encode( esc_html__( 'Post Title', 'gravityforms' ) ); ?>;
				break;
			case "post_content" :
				field.inputs = null;
				field.label = <?php echo json_encode( esc_html__( 'Post Body', 'gravityforms' ) ); ?>;
				break;
			case "post_excerpt" :
				field.inputs = null;
				field.label = <?php echo json_encode( esc_html__( 'Post Excerpt', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.size = "small";
				break;
			case "post_tags" :
				field.inputs = null;
<<<<<<< HEAD
				field.label = "<?php _e( 'Post Tags', 'gravityforms' ); ?>";
=======
				field.label = <?php echo json_encode( esc_html__( 'Post Tags', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.size = "large";
				break;
			case "post_custom_field" :
				field.inputs = null;
				if (!field.inputType)
					field.inputType = "text";
<<<<<<< HEAD
				field.label = "<?php _e( 'Post Custom Field', 'gravityforms' ); ?>";
				break;
			case "post_image" :
				field.label = "<?php _e( 'Post Image', 'gravityforms' ); ?>";
=======
				field.label = <?php echo json_encode( esc_html__( 'Post Custom Field', 'gravityforms' ) ); ?>;
				break;
			case "post_image" :
				field.label = <?php echo json_encode( esc_html__( 'Post Image', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;
				field["allowedExtensions"] = "jpg, jpeg, png, gif";
				break;
			case "captcha" :
				field.inputs = null;
				field["displayOnly"] = true;

<<<<<<< HEAD
				field.label = "<?php _e( 'Captcha', 'gravityforms' ); ?>";
=======
				field.label = <?php echo json_encode( esc_html__( 'Captcha', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				break;
			case "calculation" :
				field.enableCalculation = true;
			case "singleproduct" :
			case "product" :
			case "hiddenproduct" :
<<<<<<< HEAD
				field.label = '<?php _e( 'Product Name', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Product Name', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;

				if (!field.inputType)
					field.inputType = "singleproduct";

				if (field.inputType == "singleproduct" || field.inputType == "hiddenproduct" || field.inputType == "calculation") {
					//convert field id to a number so it isn't treated as a string
					//caused concatenation below instead of addition
					field_id = parseFloat(field.id);
<<<<<<< HEAD
					field.inputs = [new Input(field_id + 0.1, '<?php echo __( 'Name', 'gravityforms' ); ?>'), new Input(field_id + 0.2, '<?php echo __( 'Price', 'gravityforms' ); ?>'), new Input(field_id + 0.3, '<?php echo __( 'Quantity', 'gravityforms' ); ?>')];
=======
					field.inputs = [new Input(field_id + 0.1, <?php echo json_encode( esc_html__( 'Name', 'gravityforms' ) ); ?>), new Input(field_id + 0.2, <?php echo json_encode( esc_html__( 'Price', 'gravityforms' ) ); ?>), new Input(field_id + 0.3, <?php echo json_encode( esc_html__( 'Quantity', 'gravityforms' ) ); ?>)];
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					field.enablePrice = null;
				}

				productDependentFields = GetFieldsByType(["option", "quantity"]);
				for (var i = 0; i < productDependentFields.length; i++) {
					if (!productDependentFields[i]["productField"])
						productDependentFields[i]["productField"] = field.id;
				}
				break;
			case "singleshipping" :
			case "shipping" :
<<<<<<< HEAD
				field.label = '<?php _e( 'Shipping', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Shipping', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;

				if (!field.inputType)
					field.inputType = "singleshipping";

				if (field.inputType == "singleshipping")
					field.enablePrice = null;

				break;
			case "total" :
<<<<<<< HEAD
				field.label = '<?php _e( 'Total', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Total', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				field.inputs = null;

				break;

			case "option" :
<<<<<<< HEAD
				field.label = '<?php _e( 'Option', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Option', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				if (!field.inputType)
					field.inputType = "select";

				if (!field.choices) {
<<<<<<< HEAD
					field.choices = new Array(new Choice("<?php _e( 'First Option', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Second Option', 'gravityforms' ); ?>", "", "0.00"), new Choice("<?php _e( 'Third Option', 'gravityforms' ); ?>", "", "0.00"));
=======
					field.choices = new Array(new Choice(<?php echo json_encode( esc_html__( 'First Option', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Second Option', 'gravityforms' ) ); ?>, "", "0.00"), new Choice(<?php echo json_encode( esc_html__( 'Third Option', 'gravityforms' ) ); ?>, "", "0.00"));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				}
				field["enablePrice"] = true;

				productFields = GetFieldsByType(["product"]);
				if (productFields.length > 0)
					field["productField"] = productFields[0]["id"];

				break;
			case "donation" :

<<<<<<< HEAD
				field.label = '<?php _e( 'Donation', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Donation', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				if (!field.inputType)
					field.inputType = "donation";


				field.inputs = null;
				field.enablePrice = null;

				break;

			case "price" :

<<<<<<< HEAD
				field.label = '<?php _e( 'Price', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Price', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				if (!field.inputType)
					field.inputType = "price";

				field.inputs = null;
				field["enablePrice"] = null;

				break;

			case "quantity" :
<<<<<<< HEAD
				field.label = '<?php _e( 'Quantity', 'gravityforms' )?>';
=======
				field.label = <?php echo json_encode( esc_html__( 'Quantity', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

				if (!field.inputType)
					field.inputType = "number";

				productFields = GetFieldsByType(["product"]);
				if (productFields.length > 0)
					field["productField"] = productFields[0]["id"];

				if (!field.numberFormat)
					field.numberFormat = "decimal_dot";

				break;

			<?php do_action( 'gform_editor_js_set_default_values' ); ?>

			default :
				field.inputs = null;
				if (!field.label)
<<<<<<< HEAD
					field.label = "<?php _e( 'Untitled', 'gravityforms' ); ?>";
=======
					field.label = <?php echo json_encode( esc_html__( 'Untitled', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
				break;
		}

		if (window["SetDefaultValues_" + inputType])
			field = window["SetDefaultValues_" + inputType](field);
	}

	function GetAdvancedNameFieldInputs(field, prefixHidden, middleHidden, suffixHidden) {
<<<<<<< HEAD
		var prefixInput = new Input(field.id + '.2', '<?php echo esc_js( apply_filters( 'gform_name_prefix_' . rgget( 'id' ), apply_filters( 'gform_name_prefix', __( 'Prefix', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
		prefixInput.choices = GetDefaultPrefixChoices();
		prefixInput.isHidden = prefixHidden;

		var firstInput = new Input(field.id + '.3', '<?php echo apply_filters( 'gform_name_first_' . rgget( 'id' ), apply_filters( 'gform_name_first', __( 'First', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ); ?>');
		var middleInput = new Input(field.id + '.4', '<?php echo apply_filters( 'gform_name_middle_' . rgget( 'id' ), apply_filters( 'gform_name_middle', __( 'Middle', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ); ?>');
		middleInput.isHidden = middleHidden;

		var lastInput = new Input(field.id + '.6', '<?php echo apply_filters( 'gform_name_last_' . rgget( 'id' ), apply_filters( 'gform_name_last',__( 'Last', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ); ?>');
		var suffixInput = new Input(field.id + '.8', '<?php echo apply_filters( 'gform_name_suffix_' . rgget( 'id' ), apply_filters( 'gform_name_suffix',__( 'Suffix', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ); ?>');
=======
		var prefixInput = new Input(field.id + '.2', <?php echo json_encode( gf_apply_filters( 'gform_name_prefix', rgget( 'id' ), esc_html__( 'Prefix', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
		prefixInput.choices = GetDefaultPrefixChoices();
		prefixInput.isHidden = prefixHidden;

		var firstInput = new Input(field.id + '.3', <?php echo json_encode( gf_apply_filters( 'gform_name_first', rgget( 'id' ), esc_html__( 'First', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
		var middleInput = new Input(field.id + '.4', <?php echo json_encode( gf_apply_filters( 'gform_name_middle', rgget( 'id' ), esc_html__( 'Middle', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
		middleInput.isHidden = middleHidden;

		var lastInput = new Input(field.id + '.6', <?php echo json_encode( gf_apply_filters( 'gform_name_last', rgget( 'id' ), esc_html__( 'Last', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
		var suffixInput = new Input(field.id + '.8', <?php echo json_encode( gf_apply_filters( 'gform_name_suffix', rgget( 'id' ), esc_html__( 'Suffix', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		suffixInput.isHidden = suffixHidden;
		prefixInput.inputType = 'radio';

		return [prefixInput, firstInput, middleInput, lastInput, suffixInput];
	}

	function GetDateFieldInputs(field) {
		if (typeof field.dateType == 'undefined' || field.dateType == 'datepicker' || field.dateType == '') {
			return null;
		}

		var inputs, day, month, year;

		switch (field.dateType) {
			case 'datefield' :
<<<<<<< HEAD
				month = new Input(field.id + '.1', '<?php echo esc_js( _x( 'MM', 'Abbreviation: Month', 'gravityforms' ) )?>');
				day = new Input(field.id + '.2', '<?php echo esc_js( __( 'DD', 'gravityforms' ) )?>');
				year = new Input(field.id + '.3', '<?php echo esc_js( __( 'YYYY', 'gravityforms' ) )?>');
				break;
			case 'datedropdown' :
				month = new Input(field.id + '.1', '<?php echo esc_js( __( 'Month', 'gravityforms' ) )?>');
				month.placeholder = '<?php echo esc_js( __( 'Month', 'gravityforms' ) )?>';
				day = new Input(field.id + '.2', '<?php echo esc_js( 'Day', 'gravityforms' )?>');
				day.placeholder = '<?php echo esc_js( __( 'Day', 'gravityforms' ) )?>';
				year = new Input(field.id + '.3', '<?php echo esc_js( __( 'Year', 'gravityforms' ) )?>');
				year.placeholder = '<?php echo esc_js( __( 'Year', 'gravityforms' ) )?>';
=======
				month = new Input(field.id + '.1', <?php echo json_encode( _x( 'MM', 'Abbreviation: Month', 'gravityforms' ) ); ?>);
				day = new Input(field.id + '.2', <?php echo json_encode( esc_html__( 'DD', 'gravityforms' ) ); ?>);
				year = new Input(field.id + '.3', <?php echo json_encode( esc_html__( 'YYYY', 'gravityforms' ) ); ?>);
				break;
			case 'datedropdown' :
				month = new Input(field.id + '.1', <?php echo json_encode( esc_html__( 'Month', 'gravityforms' ) ); ?>);
				month.placeholder = <?php echo json_encode( esc_html__( 'Month', 'gravityforms' ) ); ?>;
				day = new Input(field.id + '.2', <?php echo json_encode( esc_html__( 'Day', 'gravityforms' ) );?>);
				day.placeholder = <?php echo json_encode( esc_html__( 'Day', 'gravityforms' ) ); ?>;
				year = new Input(field.id + '.3', <?php echo json_encode( esc_html__( 'Year', 'gravityforms' ) ); ?>);
				year.placeholder = <?php echo json_encode( esc_html__( 'Year', 'gravityforms' ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
				break;
			default:
		}

		inputs = [month, day, year];

		return inputs;
	}

	function GetTimeFieldInputs(field) {
		var min, hour, ampm;

<<<<<<< HEAD
		hour = new Input(field.id + '.1', '<?php echo esc_js( __( 'HH', 'gravityforms' ) )?>');
		min = new Input(field.id + '.2', '<?php echo esc_js( _x( 'MM', 'Abbreviation: Minutes', 'gravityforms' ) )?>');
		ampm = new Input(field.id + '.3', '<?php echo esc_js( __( 'AM/PM', 'gravityforms' ) )?>');
=======
		hour = new Input(field.id + '.1', <?php echo json_encode( esc_html__( 'HH', 'gravityforms' ) )?>);
		min = new Input(field.id + '.2', <?php echo json_encode( _x( 'MM', 'Abbreviation: Minutes', 'gravityforms' ) )?>);
		ampm = new Input(field.id + '.3', <?php echo json_encode( esc_html__( 'AM/PM', 'gravityforms' ) )?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		return [hour, min, ampm];
	}

	function GetEmailFieldInputs(field) {

		if (typeof field.emailConfirmEnabled == 'undefined' || field.emailConfirmEnabled == false) {
			return null;
		}

		var email, confirmation;

<<<<<<< HEAD
		email = new Input(field.id, "<?php echo esc_js( __( 'Enter Email', 'gravityforms' ) )?>");
		confirmation = new Input(field.id + '.2', '<?php echo esc_js( __( 'Confirm Email', 'gravityforms' ) )?>');
=======
		email = new Input(field.id, <?php echo json_encode( esc_html__( 'Enter Email', 'gravityforms' ) ); ?>);
		confirmation = new Input(field.id + '.2', <?php echo json_encode( esc_html__( 'Confirm Email', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		return [email, confirmation];
	}

	function GetPasswordFieldInputs(field) {

		var password, confirmation;

<<<<<<< HEAD
		password = new Input(field.id, '<?php echo esc_js( __( 'Enter Password', 'gravityforms' ) )?>');
		confirmation = new Input(field.id + '.2', '<?php echo esc_js( __( 'Confirm Password', 'gravityforms' ) )?>');
=======
		password = new Input(field.id, <?php echo json_encode( esc_html__( 'Enter Password', 'gravityforms' ) ); ?>);
		confirmation = new Input(field.id + '.2', <?php echo json_encode( esc_html__( 'Confirm Password', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		return [password, confirmation];
	}


	function UpgradeCreditCardField(field) {
		var legacyExpirationInput = GetInput(field, field.id + ".2");

		if (legacyExpirationInput) {
<<<<<<< HEAD
			var monthInput = new Input(field.id + ".2_month", '<?php echo esc_js( apply_filters( 'gform_card_expiration_' . rgget( 'id' ), apply_filters( 'gform_card_expiration', __( 'Expiration Month', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>');
			monthInput.defaultLabel = '<?php echo esc_js( __( 'Expiration Date', 'gravityforms' ) ); ?>';
			var yearInput = new Input(field.id + ".2_year", '<?php echo esc_js( __( 'Expiration Year', 'gravityforms' ) ); ?>');
			field.inputs.splice(1, 1, monthInput, yearInput);
			var nameInput = GetInput(field, field.id + ".5");
			nameInput.label = '<?php echo esc_js( apply_filters( 'gform_card_name_' . rgget( 'id' ), apply_filters( 'gform_card_name',__( 'Cardholder Name', 'gravityforms' ), rgget( 'id' ) ), rgget( 'id' ) ) ); ?>';
=======
			var monthInput = new Input(field.id + ".2_month", <?php echo json_encode( gf_apply_filters( 'gform_card_expiration', rgget( 'id' ), esc_html__( 'Expiration Month', 'gravityforms' ), rgget( 'id' ) ) ); ?>);
			monthInput.defaultLabel = <?php echo json_encode( esc_html__( 'Expiration Date', 'gravityforms' ) ); ?>;
			var yearInput = new Input(field.id + ".2_year", <?php echo json_encode( esc_html__( 'Expiration Year', 'gravityforms' ) ); ?>);
			field.inputs.splice(1, 1, monthInput, yearInput);
			var nameInput = GetInput(field, field.id + ".5");
			nameInput.label = <?php echo json_encode( gf_apply_filters( 'gform_card_name', rgget( 'id' ), __( 'Cardholder Name', 'gravityforms' ), rgget( 'id' ) ) ); ?>;
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		}

		return field;
	}

	function GetDefaultPrefixChoices() {
<<<<<<< HEAD
		return new Array(new Choice("<?php echo esc_js( __( 'Mr.', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Mrs.', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Miss', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Ms.', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Dr.', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Prof.', 'gravityforms' ) ); ?>"), new Choice("<?php echo esc_js( __( 'Rev.', 'gravityforms' ) ); ?>"));
=======
		return new Array(new Choice(<?php echo json_encode( esc_html__( 'Mr.', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Mrs.', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Miss', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Ms.', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Dr.', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Prof.', 'gravityforms' ) ); ?>), new Choice(<?php echo json_encode( esc_html__( 'Rev.', 'gravityforms' ) ); ?>));
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
	}

	function CreateField( id, type, index ) {
		var field = new Field(id, type);
		SetDefaultValues( field, index );

		if (field.type == "captcha") {
			<?php
			$publickey = get_option( 'rg_gforms_captcha_public_key' );
			$privatekey = get_option( 'rg_gforms_captcha_private_key' );
			if ( class_exists( 'ReallySimpleCaptcha' ) && ( empty( $publickey ) || empty( $privatekey ) ) ){
				?>
			field.captchaType = "simple_captcha";
			<?php
		}
		?>
		}
		return field;
	}

	function CanFieldBeAdded(type) {
		switch (type) {
			case "captcha" :
				if (GetFieldsByType(["captcha"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one reCAPTCHA field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one reCAPTCHA field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;

			case "shipping" :
				if (GetFieldsByType(["shipping"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one Shipping field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one Shipping field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;

			case "post_content" :
				if (GetFieldsByType(["post_content"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one Post Content field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one Post Content field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;
			case "post_title" :
				if (GetFieldsByType(["post_title"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one Post Title field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one Post Title field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;
			case "post_excerpt" :
				if (GetFieldsByType(["post_excerpt"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one Post Excerpt field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one Post Excerpt field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;
			case "creditcard" :
				if (GetFieldsByType(["creditcard"]).length > 0) {
<<<<<<< HEAD
					alert("<?php _e( 'Only one credit card field can be added to the form', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'Only one credit card field can be added to the form', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;
			case "quantity" :
			case "option" :
				if (GetFieldsByType(["product"]).length <= 0) {
<<<<<<< HEAD
					alert("<?php _e( 'You must add a product field to the form first', 'gravityforms' ) ?>");
=======
					alert(<?php echo json_encode( esc_html__( 'You must add a product field to the form first', 'gravityforms' ) ); ?>);
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
					return false;
				}
				break;
			default :
				return gform.applyFilters('gform_form_editor_can_field_be_added', true, type);
		}

		return true;
	}

	function StartAddField(type, index) {

		if (!CanFieldBeAdded(type)) {
			jQuery('#gform_adding_field_spinner').remove();
			return;
		}

		if (gf_vars["currentlyAddingField"] == true)
			return;

		gf_vars["currentlyAddingField"] = true;

		var nextId = GetNextFieldId();
		var field = CreateField( nextId, type, index );

		var mysack = new sack("<?php echo admin_url( 'admin-ajax.php' )?>?id=" + form.id);
		mysack.execute = 1;
		mysack.method = 'POST';
		mysack.setVar("action", "rg_add_field");
		mysack.setVar("rg_add_field", "<?php echo wp_create_nonce( 'rg_add_field' ) ?>");
		mysack.setVar("index", index);
		mysack.setVar("field", jQuery.toJSON(field));
		mysack.onError = function () {
<<<<<<< HEAD
			alert('<?php echo esc_js( __( 'Ajax error while adding field', 'gravityforms' ) ) ?>')
=======
			alert(<?php echo json_encode( esc_html__( 'Ajax error while adding field', 'gravityforms' ) ); ?>)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		};
		mysack.runAJAX();

		return true;
	}

	function DuplicateField(field, sourceFieldId) {

		jQuery.post(ajaxurl + "?id=" + form.id, {
				action            : "rg_duplicate_field",
				rg_duplicate_field: "<?php echo wp_create_nonce( 'rg_duplicate_field' ) ?>",
				field             : jQuery.toJSON(field),
				source_field_id   : sourceFieldId},
			function (data) {
				data = jQuery.evalJSON(data);
				EndDuplicateField(data["field"], data["fieldString"], data["sourceFieldId"]);
			}
		);

		return true;
	}

	function RefreshSelectedFieldPreview(callback) {
		if (!field)
			field = GetSelectedField();
		var fieldId = field.id,
			data = {'action': 'rg_refresh_field_preview', 'rg_refresh_field_preview': '<?php echo wp_create_nonce( 'rg_refresh_field_preview' ) ?>', 'field': jQuery.toJSON(field), 'formId': form.id};

		jQuery.post(ajaxurl, data,
			function (data) {
				jQuery('.field_selected').children().not('#field_settings').remove();
				jQuery("#field_" + fieldId).prepend(data.fieldString);

				SetFieldLabel(field.label);
				SetFieldSize(field.size);
				SetFieldDefaultValue(field.defaultValue);
				SetFieldDescription(field.description);
				SetFieldRequired(field.isRequired);
				InitializeFields();
				if (field["type"] == "address") {
					SetAddressType(false);
				}
				if (callback) {
					callback();
				}
			}, 'json'
		);

	}

	function StartChangeInputType(type, field) {
		if (type == "")
			return;

		jQuery("#field_settings").insertBefore("#gform_fields");

		if (!field)
			field = GetSelectedField();

		field["inputType"] = type;
		SetDefaultValues(field);

		var mysack = new sack("<?php echo admin_url( 'admin-ajax.php' )?>?id=" + form.id);
		mysack.execute = 1;
		mysack.method = 'POST';
		mysack.setVar("action", "rg_change_input_type");
		mysack.setVar("rg_change_input_type", "<?php echo wp_create_nonce( 'rg_change_input_type' ) ?>");
		mysack.setVar("field", jQuery.toJSON(field));
		mysack.onError = function () {
<<<<<<< HEAD
			alert('<?php echo esc_js( __( 'Ajax error while changing input type', 'gravityforms' ) ) ?>')
=======
			alert(<?php echo json_encode( esc_html__( 'Ajax error while changing input type', 'gravityforms' ) ); ?>)
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		};
		mysack.runAJAX();

		return true;
	}

	function GetFieldChoices(field) {
		if (field.choices == undefined)
			return "";

		var currency = GetCurrentCurrency();
		var str = "";
		for (var i = 0; i < field.choices.length; i++) {

			var checked = field.choices[i].isSelected ? "checked" : "";
			var inputType = GetInputType(field);
			var type = inputType == 'checkbox' ? 'checkbox' : 'radio';

			var value = field.enableChoiceValue ? String(field.choices[i].value) : field.choices[i].text;
			var price = field.choices[i].price ? currency.toMoney(field.choices[i].price) : "";
			if (!price){
				price = "";
			}


			str += "<li class='field-choice-row' data-input_type='" + inputType + "' data-index='" + i + "'>";
			str += "<i class='fa fa-sort field-choice-handle'></i> ";
			str += "<input type='" + type + "' class='gfield_choice_" + type + "' name='choice_selected' id='" + inputType + "_choice_selected_" + i + "' " + checked + " onclick=\"SetFieldChoice('" + inputType + "', " + i + ");\" /> ";
			str += "<input type='text' id='" + inputType + "_choice_text_" + i + "' value=\"" + field.choices[i].text.replace(/"/g, "&quot;") + "\" class='field-choice-input field-choice-text' />";
			str += "<input type='text' id='" + inputType + "_choice_value_" + i + "' value=\"" + value.replace(/"/g, "&quot;") + "\" class='field-choice-input field-choice-value' />";
			str += "<input type='text' id='" + inputType + "_choice_price_" + i + "' value=\"" + price.replace(/"/g, "&quot;") + "\" class='field-choice-input field-choice-price' />";

			if (window["gform_append_field_choice_option_" + field.type])
				str += window["gform_append_field_choice_option_" + field.type](field, i);

			str += gform.applyFilters('gform_append_field_choice_option', '', field, i);

			str += "<a class='gf_insert_field_choice' onclick=\"InsertFieldChoice(" + (i + 1) + ");\"><i class='gficon-add'></i></a>";


			if (field.choices.length > 1)
				str += "<a class='gf_delete_field_choice' onclick=\"DeleteFieldChoice(" + i + ");\"><i class='gficon-subtract'></i></a>";

			str += "</li>";

		}
		return str;
	}

	function GetInputChoices(input) {
		if (input.choices == undefined)
			return "";

		var str = "";
		var inputId = input.id.toString();
		for (var i = 0; i < input.choices.length; i++) {

			var checked = input.choices[i].isSelected ? "checked" : "";
			var inputType = GetInputType(input);
			var type = inputType == 'checkbox' ? 'checkbox' : 'radio';

			var value = input.enableChoiceValue ? String(input.choices[i].value) : input.choices[i].text;

			str += "<li class='field-choice-row' data-index='" + i + "' data-input_id='" + inputId + "'>";
			str += "<i class='fa fa-sort field-choice-handle'></i> ";
			str += "<input type='" + type + "' class='field-input-choice-" + inputId.replace('.', '_') + " gfield_choice_" + type + "' name='choice_selected' id='" + inputType + "_choice_selected_" + i + "' " + checked + " /> ";
			str += "<input type='text' id='" + inputType + "_choice_text_" + i + "' value=\"" + input.choices[i].text.replace(/"/g, "&quot;") + "\" class='field-choice-input field-choice-text' />";
			str += "<input type='text' id='" + inputType + "_choice_value_" + i + "' value=\"" + value.replace(/"/g, "&quot;") + "\" class='field-choice-input field-choice-value' />";

			str += "<a class='gf_insert_field_choice field-input-insert-choice'><i class='gficon-add'></i></a>";

			if (input.choices.length > 1)
				str += "<a class='gf_delete_field_choice field-input-delete-choice'><i class='gficon-subtract'></i></a>";

			str += "</li>";

		}
		return str;
	}

	function GetCaptchaUrl(pos) {
		if (pos == undefined)
			pos = "";

		var field = GetSelectedField();
		var size = field.simpleCaptchaSize == undefined ? "medium" : field.simpleCaptchaSize;
		var fg = field.simpleCaptchaFontColor == undefined ? "" : field.simpleCaptchaFontColor;
		var bg = field.simpleCaptchaBackgroundColor == undefined ? "" : field.simpleCaptchaBackgroundColor;

		var url = "<?php echo admin_url( 'admin-ajax.php?action=rg_captcha_image' )?>" + "&type=" + field.captchaType + "&pos=" + pos + "&size=" + size + "&fg=" + fg.replace("#", "%23") + "&bg=" + bg.replace("#", "%23");
		return url;
	}

	function SetFieldPhoneFormat(phoneFormat) {
<<<<<<< HEAD
		var instruction = phoneFormat == "standard" ? "<?php _e( 'Phone format:', 'gravityforms' ); ?> (###) ###-####" : "";
=======
		var instruction = phoneFormat == "standard" ? <?php echo json_encode( esc_html__( 'Phone format:', 'gravityforms' ) ); ?> + " (###) ###-####" : "";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836
		var display = phoneFormat == "standard" ? "block" : "none";

		jQuery(".field_selected .instruction").css('display', display).html(instruction);

		SetFieldProperty('phoneFormat', phoneFormat);
	}

	function LoadMessageVariables() {
<<<<<<< HEAD
		var options = "<option><?php _e( 'Select a field', 'gravityforms' ); ?></option><option value='{form_title}'><?php _e( 'Form Title', 'gravityforms' ); ?></option><option value='{date_mdy}'><?php _e( 'Date', 'gravityforms' ); ?> (mm/dd/yyyy)</option><option value='{date_dmy}'><?php _e( 'Date', 'gravityforms' ); ?> (dd/mm/yyyy)</option><option value='{ip}'><?php _e( 'User IP Address', 'gravityforms' ); ?></option><option value='{all_fields}'><?php _e( 'All Submitted Fields', 'gravityforms' ); ?></option>";
=======
		var options = "<option>" + <?php echo json_encode( esc_html__( 'Select a field', 'gravityforms' ) ); ?> + "</option><option value='{form_title}'>" + <?php echo json_encode( esc_html__( 'Form Title', 'gravityforms' ) ); ?> + "</option><option value='{date_mdy}'>" + <?php echo json_encode( esc_html__( 'Date', 'gravityforms' ) ); ?> + " (mm/dd/yyyy)</option><option value='{date_dmy}'>" + <?php echo json_encode( esc_html__( 'Date', 'gravityforms' ) ); ?> + " (dd/mm/yyyy)</option><option value='{ip}'>" + <?php echo json_encode( esc_html__( 'User IP Address', 'gravityforms' ) ); ?> + "</option><option value='{all_fields}'>" + <?php echo json_encode( esc_html__( 'All Submitted Fields', 'gravityforms' ) ); ?> + "</option>";
>>>>>>> c4ed0da5825345f6b0fe3527d88a7e02d1806836

		for (var i = 0; i < form.fields.length; i++)
			options += "<option value='{" + form.fields[i].label + ":" + form.fields[i].id + "}'>" + form.fields[i].label + "</option>";

		jQuery("#form_autoresponder_variable").html(options);
	}

	</script>

<?php wp_print_scripts( array( 'gform_form_editor' ) ); ?>

<?php do_action( 'gform_editor_js' ); ?>