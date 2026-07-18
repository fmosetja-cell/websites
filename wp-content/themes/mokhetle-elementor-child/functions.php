<?php
/**
 * Mokhetle Attorneys — Elementor child theme.
 *
 * Parent: Hello Elementor. Loads the firm design system + Elementor-structure
 * overrides + the prototype behaviour JS (for the AI-assistant and portal HTML
 * widgets), on both the front end and inside the Elementor editor preview.
 *
 * @package Mokhetle_Elementor_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MOK_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue parent + child styles and scripts.
 */
function mok_child_assets() {
	// Google Fonts — Cormorant Garamond (serif) + Jost (sans).
	wp_enqueue_style(
		'mok-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Hello Elementor parent stylesheet.
	wp_enqueue_style(
		'hello-elementor-parent',
		get_template_directory_uri() . '/style.css',
		array( 'mok-fonts' ),
		MOK_CHILD_VERSION
	);

	// The firm's full design system (component classes: .pillar, .practice-card, etc.).
	wp_enqueue_style(
		'mok-design-system',
		get_stylesheet_directory_uri() . '/assets/css/design-system.css',
		array( 'hello-elementor-parent' ),
		MOK_CHILD_VERSION
	);

	// Bridges Elementor's section/column/widget DOM to the prototype layout.
	wp_enqueue_style(
		'mok-elementor-overrides',
		get_stylesheet_directory_uri() . '/assets/css/elementor-overrides.css',
		array( 'mok-design-system' ),
		MOK_CHILD_VERSION
	);

	// Prototype behaviour (FAQ accordion fallback, forms, AI intake demo, portal).
	wp_enqueue_script(
		'mok-behaviour',
		get_stylesheet_directory_uri() . '/assets/js/main.js',
		array(),
		MOK_CHILD_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'mok_child_assets' );

/**
 * Load the design system inside the Elementor editor so the canvas matches the
 * front end while building.
 */
function mok_child_editor_styles() {
	wp_enqueue_style( 'mok-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Jost:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'mok-design-system', get_stylesheet_directory_uri() . '/assets/css/design-system.css', array(), MOK_CHILD_VERSION );
	wp_enqueue_style( 'mok-elementor-overrides', get_stylesheet_directory_uri() . '/assets/css/elementor-overrides.css', array( 'mok-design-system' ), MOK_CHILD_VERSION );
}
add_action( 'elementor/editor/after_enqueue_styles', 'mok_child_editor_styles' );

/**
 * Register the firm's palette + fonts as an Elementor Global Kit style could be
 * done in the UI; here we expose the brand colours as CSS custom properties are
 * already in design-system.css. Nothing further required.
 */
