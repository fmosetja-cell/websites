<?php
/**
 * Customizer: firm contact details.
 *
 * Surfaces the details flagged in docs/05-content-gaps.md (phone, email,
 * address, hours, WhatsApp, registration number) as editable settings, so the
 * firm can confirm/update them in one place without touching template code.
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the "Firm Contact Details" section and its settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function mok_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'mok_contact',
		array(
			'title'       => __( 'Firm Contact Details', 'mokhetle-attorneys' ),
			'priority'    => 30,
			'description' => __( 'Used across the header utility bar, footer and Contact page. Confirm these before go-live.', 'mokhetle-attorneys' ),
		)
	);

	$fields = array(
		'phone_display' => array( 'Phone (display)', '(018) 381 2910/1', 'sanitize_text_field' ),
		'phone_tel'     => array( 'Phone (tel: link)', '+27183812910', 'sanitize_text_field' ),
		'email'         => array( 'Email address', 'info@mokhetleinc.co.za', 'sanitize_email' ),
		'address'       => array( 'Physical address', '18 Havenga Street, Golfview, Mahikeng, 2745', 'sanitize_text_field' ),
		'hours'         => array( 'Office hours', 'Mon–Fri: 08:00–17:00', 'sanitize_text_field' ),
		'whatsapp'      => array( 'WhatsApp link', 'https://wa.me/27000000000', 'esc_url_raw' ),
		'reg_no'        => array( 'Registration number', '2014/230750/21', 'sanitize_text_field' ),
	);

	$priority = 10;
	foreach ( $fields as $key => $field ) {
		list( $label, $default, $sanitize ) = $field;

		$wp_customize->add_setting(
			'mok_' . $key,
			array(
				'default'           => $default,
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'mok_' . $key,
			array(
				'label'    => $label,
				'section'  => 'mok_contact',
				'type'     => 'text',
				'priority' => $priority++,
			)
		);
	}
}
add_action( 'customize_register', 'mok_customize_register' );
