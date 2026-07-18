<?php
/**
 * Mokhetle Attorneys Inc. theme functions.
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

define( 'MOK_THEME_VERSION', '1.0.0' );

/**
 * Map of the pages this theme ships. Keyed by slug.
 *
 * 'template' is the page-template file (null for the front page, which uses
 * front-page.php automatically). The setup routine (inc/theme-setup.php) reads
 * this same map to create the pages on activation.
 *
 * @return array
 */
function mok_pages() {
	return array(
		'home' => array(
			'title'    => 'Home',
			'template' => null, // front-page.php is used automatically.
			'front'    => true,
		),
		'about' => array(
			'title'    => 'About the Firm',
			'template' => 'template-about.php',
		),
		'practice-areas' => array(
			'title'    => 'Practice Areas',
			'template' => 'template-practice-areas.php',
		),
		'personal-injury' => array(
			'title'    => 'Personal Injury & RAF Claims',
			'template' => 'template-personal-injury.php',
		),
		'forensic-investigations' => array(
			'title'    => 'Forensic Investigations & Legal Audits',
			'template' => 'template-forensic.php',
		),
		'correspondent-attorney-services' => array(
			'title'    => 'Correspondent Attorney Services',
			'template' => 'template-correspondent.php',
		),
		'ai-legal-assistant' => array(
			'title'    => 'AI Legal Assistant',
			'template' => 'template-ai-assistant.php',
		),
		'client-portal' => array(
			'title'    => 'Secure Client Portal',
			'template' => 'template-client-portal.php',
		),
		'contact' => array(
			'title'    => 'Contact Us',
			'template' => 'template-contact.php',
		),
	);
}

/**
 * Return the permalink for one of the theme's pages by slug.
 *
 * Falls back to a root-relative URL if the page has not been created yet, so
 * templates never emit a broken/empty href during first render.
 *
 * @param string $slug Page slug.
 * @return string
 */
function mok_url( $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Firm contact details, editable in Appearance → Customize → Firm Contact Details.
 *
 * Defaults come from the approved brief (see docs/05-content-gaps.md); the firm
 * should reconfirm them before go-live.
 *
 * @param string $key Detail key.
 * @return string
 */
function mok_opt( $key ) {
	$defaults = array(
		'phone_display' => '(018) 381 2910/1',
		'phone_tel'     => '+27183812910',
		'email'         => 'info@mokhetleinc.co.za',
		'address'       => '18 Havenga Street, Golfview, Mahikeng, 2745',
		'hours'         => 'Mon–Fri: 08:00–17:00',
		'whatsapp'      => 'https://wa.me/27000000000',
		'reg_no'        => '2014/230750/21',
	);
	$default = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'mok_' . $key, $default );
}

/**
 * Theme setup: supports, menus, image sizes.
 */
function mok_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus(
		array(
			'primary'         => __( 'Primary Menu', 'mokhetle-attorneys' ),
			'footer_practice' => __( 'Footer — Practice Areas', 'mokhetle-attorneys' ),
			'footer_firm'     => __( 'Footer — Firm', 'mokhetle-attorneys' ),
			'footer_legal'    => __( 'Footer — Legal', 'mokhetle-attorneys' ),
		)
	);
}
add_action( 'after_setup_theme', 'mok_setup' );

/**
 * Enqueue fonts, styles and scripts.
 */
function mok_assets() {
	// Google Fonts — Cormorant Garamond (serif) + Jost (sans), matching the prototype.
	wp_enqueue_style(
		'mok-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// WordPress requires the theme's style.css to be present in the DOM.
	wp_enqueue_style( 'mok-style', get_stylesheet_uri(), array( 'mok-fonts' ), MOK_THEME_VERSION );

	// The actual design system.
	wp_enqueue_style(
		'mok-main',
		get_theme_file_uri( 'assets/css/main.css' ),
		array( 'mok-style' ),
		MOK_THEME_VERSION
	);

	// Shared prototype behaviour (nav toggle, FAQ accordion, forms, AI intake demo).
	wp_enqueue_script(
		'mok-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		MOK_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'mok_assets' );

// Includes.
require get_theme_file_path( 'inc/theme-setup.php' );
require get_theme_file_path( 'inc/customizer.php' );
