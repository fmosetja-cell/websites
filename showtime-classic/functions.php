<?php
/**
 * Showtime Classic — classic theme for page-builder workflows.
 *
 * @package showtime-classic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SHOWTIME_CLASSIC_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function showtime_classic_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'html5',
		array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu overlay', 'showtime-classic' ),
		)
	);

	// Editor reflects the dark canvas + brand type.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );

	if ( ! isset( $GLOBALS['content_width'] ) ) {
		$GLOBALS['content_width'] = 1280;
	}
}
add_action( 'after_setup_theme', 'showtime_classic_setup' );

/**
 * Footer widget areas (four brand columns).
 */
function showtime_classic_widgets_init() {
	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( /* translators: %d: column number. */ __( 'Footer column %d', 'showtime-classic' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => __( 'Shown in the four-column site footer.', 'showtime-classic' ),
				'before_widget' => '<div id="%1$s" class="st-footer-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="st-caption st-caption--white">',
				'after_title'   => '</p>',
			)
		);
	}
}
add_action( 'widgets_init', 'showtime_classic_widgets_init' );

/**
 * Styles and scripts.
 */
function showtime_classic_enqueue() {
	wp_enqueue_style(
		'showtime-classic',
		get_theme_file_uri( 'assets/css/main.css' ),
		array(),
		SHOWTIME_CLASSIC_VERSION
	);
	wp_enqueue_script(
		'showtime-classic',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		SHOWTIME_CLASSIC_VERSION,
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'showtime_classic_enqueue' );

/**
 * Customizer: the "Enquire" nav button target and the overlay footer note.
 */
function showtime_classic_customize( $wp_customize ) {
	$wp_customize->add_section(
		'showtime_options',
		array(
			'title'    => __( 'Showtime options', 'showtime-classic' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'showtime_enquire_url',
		array(
			'default'           => '/contact/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'showtime_enquire_url',
		array(
			'label'       => __( '"Enquire" button link', 'showtime-classic' ),
			'description' => __( 'Where the top-right nav button points.', 'showtime-classic' ),
			'section'     => 'showtime_options',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'showtime_overlay_note',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'showtime_overlay_note',
		array(
			'label'       => __( 'Menu overlay note', 'showtime-classic' ),
			'description' => __( 'Small mono caption at the bottom of the menu overlay, e.g. "Klerksdorp · Sandton — Est. 2010". Leave empty to hide.', 'showtime-classic' ),
			'section'     => 'showtime_options',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'showtime_classic_customize' );
