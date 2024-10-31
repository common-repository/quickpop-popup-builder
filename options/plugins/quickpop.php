<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'QuickPop by Brindle', 'mb-qp' ) )
	->where( 'post_type', '=', 'qp_popup' )
	->add_tab( __( 'Content', 'mb-qp' ), array(
		Field::make( 'separator', 'qp_headline_separator', __( 'Headline', 'mb-qp' ) ),
		Field::make( 'rich_text', 'qp_title', '' )
			->set_settings(array(
				'media_buttons' => false,
				'tinymce' => array(
					'toolbar1' => 'formatselect,bold,italic,alignleft,aligncenter,alignright',
					'height' => '100'
				),
				'quicktags' => false
			) )
			->set_default_value( '<h2>Enter Your Headline Here</h2>' ),
		Field::make( 'separator', 'qp_body_separator', __( 'Body', 'mb-qp' ) ),
		Field::make( 'rich_text', 'qp_body', '' )
			->set_default_value( 'Sign up now and receive custom offers and informative tips in building and marketing your software business.' ),
		Field::make( 'separator', 'qp_button_separator', __( 'Button', 'mb-qp' ) ),
		Field::make( 'text', 'qp_button_text', __( 'Button Text', 'mb-qp' ) )
			->set_default_value( 'Find Out More' ),
		Field::make( 'text', 'qp_button_link', __( 'Button Link', 'mb-qp' ) )
			->set_default_value( 'https://www.enterlink.com' ),
		Field::make( 'checkbox', 'qp_button_new_tab', __( 'Open in New Tab', 'mb-qp' ) ),
		Field::make( 'separator', 'qp_form_separator', __( 'Form', 'mb-qp' ) ),
		Field::make( 'text', 'qp_field_placeholder', __( 'Email Field', 'mb-qp' ) )
			->set_default_value( 'Enter your email...' ),
		Field::make( 'checkbox', 'qp_form_required', __( 'Required', 'mb-qp' ) )
			->set_default_value( 'yes' ),
		Field::make( 'text', 'qp_field_form_button_text', __( 'Form Button', 'mb-qp' ) )
			->set_default_value( 'Sign Up' ),
		Field::make( 'text', 'qp_field_form_message', __( 'Thank You Message', 'mb-qp' ) )
			->set_default_value( 'Submission received, thank you!' ),
		Field::make( 'html', 'qp_content_upsell', '' )
			->set_html( '<p class="qp-crb-upsell"><span class="qp-crb-upsell-logo"></span><em>Need more form options, advanced styling, and Mailchimp/Hubspot integration? <a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/">Try QuickPop Pro FREE</a></em></p>' ),
	) )
	->add_tab( __( 'Design', 'mb-qp' ), array(
		Field::make( 'separator', 'qp_include_separator', __( 'Include / Exclude', 'mb-qp' ) ),
		Field::make( 'checkbox', 'qp_include_button', __( 'Standard Button', 'mb-qp' ) )
			->set_width( 20 )
			->set_default_value( 'no' ),
		Field::make( 'checkbox', 'qp_include_form', __( 'Form', 'mb-qp' ) )
			->set_width( 20 )
			->set_default_value( 'yes' ),
		Field::make( 'separator', 'qp_style_separator', __( 'Style', 'mb-qp' ) ),
		Field::make( 'html', 'qp_bg_overlay_separator' )
		 ->set_html( '<h4 class="cf__separator cf__separator--small">Background/Overlay</h4>' ),
		Field::make( 'text', 'qp_overlay_opacity', __( 'Opacity', 'mb-qp' ) )
			->set_default_value( '84%' ),
		Field::make( 'color', 'qp_standard_button_color', __( 'Standard Button Color', 'mb-qp' ) )
			->set_default_value( '#ff2f73' ),
		Field::make( 'separator', 'qp_form_style_separator', __( 'Form Style', 'mb-qp' ) ),
		Field::make( 'color', 'qp_form_button_color', __( 'Form Button Color', 'mb-qp' ) )
			->set_default_value( '#4e83cb' ),
		Field::make( 'color', 'qp_form_field_background', __( 'Form Field Background', 'mb-qp' ) )
			->set_default_value( '#f9f9f9' )
			->set_width( 50 ),
		Field::make( 'color', 'qp_form_field_border', __( 'Form Field Border', 'mb-qp' ) )
			->set_default_value( '#e2e2e2' )
			->set_width( 50 ),
		Field::make( 'html', 'qp_design_upsell', '' )
			->set_html( '<p class="qp-crb-upsell"><span class="qp-crb-upsell-logo"></span><em>Build any popup you can imagine with advanced styling options. <a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/">Try QuickPop Pro FREE</a></em></p>' ),
	) )
	->add_tab( __( 'Settings', 'mb-qp' ), array(
		Field::make( 'separator', 'qp_status_separator', __( 'Status', 'mb-qp' ) ),
		Field::make( 'select', 'qp_status', '' )
			->add_options( array(
				'qp_enabled' => 'Enabled',
				'qp_disabled' => 'Disabled'
			) ),
		Field::make( 'separator', 'qp_settings_form_title', __( 'Form Title (for reference only)', 'mb-qp' ) ),
		Field::make( 'text', 'qp_form_title', '' )
			->set_default_value( 'Site-Wide Popup' ),
		Field::make( 'separator', 'qp_settings_visibility', __( 'Visibility', 'mb-qp' ) ),
		Field::make( 'select', 'qp_settings_display_pages', __( 'Display Popup', 'mb-qp' ) )
			->add_options( array(
				'qp_all' => 'All Pages',
				'qp_home' => 'Homepage'
			) ),
		Field::make( 'separator', 'qp_settings_events', __( 'Events', 'mb-qp' ) ),
		Field::make( 'text', 'qp_settings_delay', __( 'Delay', 'mb-qp' ) )
			->set_default_value( '5' )
			->set_help_text( 'seconds after page load' ),
		Field::make( 'html', 'qp_settings_upsell', '' )
			->set_html( '<p class="qp-crb-upsell"><span class="qp-crb-upsell-logo"></span><em>Additional Visibility and Event options are available when you. <a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/">Try QuickPop Pro FREE</a></em></p>' ),
	) );

if ( ! isset( $_COOKIE['qp_library_upsell_hidden'] ) ) {
	Container::make( 'post_meta', 'QP Sidebar' )
		->set_priority( 'low' )
		->where( 'post_type', '=', 'qp_popup' )
		->set_context( 'side' )
		->add_fields( array(
			Field::make( 'html', 'qp_single_post_sidebar', '' )
				->set_html( '<div class="qp-upsell-ad"><span class="qp-upsell-ad__image"></span><p><strong>Want even more features?</strong><br>Access advanced style options, popup events, advanced forms, integration with services like Mailchimp/Hubspot, and more. Upgrade now to create the ultimate library of popups!</p><a target="_blank" href="https://mybrindle.com/product/best-popup-builder-wordpress/" class="qp-upsell-ad__btn"><strong>Try QuickPop Pro FREE</strong><br>No risk 3 day free trial</a></div>' ),
		) );

}