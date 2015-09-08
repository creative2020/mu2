<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
Requirements: php5.5.*
*/
/////////////////////////////////////////////////////////////////////////////////////////////// 2020 ACF Fields

if(function_exists('acf_add_options_page')) { 
 
	acf_add_options_page();
	acf_add_options_sub_page('Homepage');
	acf_add_options_sub_page('Footer');
 
}

/////////////////////////////////////////////////

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'tt_homepage',
	'title' => 'Homepage',
	'fields' => array (
		array (
			'key' => 'tt_field',
			'label' => 'TT Field Name',
			'name' => 'tt_field',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
       
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-homepage',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;