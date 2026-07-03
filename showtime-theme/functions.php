<?php
/**
 * Showtime Entertainment block theme.
 *
 * @package showtime
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SHOWTIME_VERSION', '1.0.0' );

/**
 * Theme supports and editor styles.
 */
function showtime_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/showtime.css' );
}
add_action( 'after_setup_theme', 'showtime_setup' );

/**
 * Front-end styles and scripts.
 */
function showtime_enqueue_assets() {
	wp_enqueue_style(
		'showtime-styles',
		get_theme_file_uri( 'assets/css/showtime.css' ),
		array(),
		SHOWTIME_VERSION
	);
	wp_enqueue_script(
		'showtime-scripts',
		get_theme_file_uri( 'assets/js/showtime.js' ),
		array(),
		SHOWTIME_VERSION,
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'showtime_enqueue_assets' );

/**
 * Portfolio custom post type.
 *
 * Showtime adds past events as portfolio entries without touching code:
 * title, excerpt (card copy), featured image (16:9 card photo) and the
 * "location — year" line stored in the showtime_event_meta field.
 */
function showtime_register_portfolio() {
	register_post_type(
		'portfolio',
		array(
			'labels'       => array(
				'name'          => __( 'Portfolio', 'showtime' ),
				'singular_name' => __( 'Portfolio entry', 'showtime' ),
				'add_new_item'  => __( 'Add portfolio entry', 'showtime' ),
				'edit_item'     => __( 'Edit portfolio entry', 'showtime' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'portfolio' ),
			'menu_icon'    => 'dashicons-format-gallery',
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		)
	);

	register_post_meta(
		'portfolio',
		'showtime_event_meta',
		array(
			'type'              => 'string',
			'label'             => __( 'Location — year (card tag)', 'showtime' ),
			'description'       => __( 'Shown as the mono tag on portfolio cards, e.g. "Johannesburg — 2023".', 'showtime' ),
			'single'            => true,
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'showtime_register_portfolio' );

/**
 * Pattern category.
 */
function showtime_register_pattern_category() {
	register_block_pattern_category(
		'showtime',
		array( 'label' => __( 'Showtime', 'showtime' ) )
	);
}
add_action( 'init', 'showtime_register_pattern_category' );

/**
 * Quote-request form handler (front-end form posts to admin-post.php).
 *
 * Server-side validation: name and email required. Honeypot field for spam.
 * Sends the enquiry to the address filtered by `showtime_quote_recipient`.
 */
function showtime_handle_quote_form() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );
	$redirect = remove_query_arg( 'enquiry', $redirect );

	// Honeypot: real visitors never fill this. Pretend success for bots.
	if ( ! empty( $_POST['st_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'received', $redirect ) . '#quote-form' );
		exit;
	}

	$name   = isset( $_POST['st_name'] ) ? sanitize_text_field( wp_unslash( $_POST['st_name'] ) ) : '';
	$email  = isset( $_POST['st_email'] ) ? sanitize_email( wp_unslash( $_POST['st_email'] ) ) : '';
	$phone  = isset( $_POST['st_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['st_phone'] ) ) : '';
	$type   = isset( $_POST['st_type'] ) ? sanitize_text_field( wp_unslash( $_POST['st_type'] ) ) : '';
	$date   = isset( $_POST['st_date'] ) ? sanitize_text_field( wp_unslash( $_POST['st_date'] ) ) : '';
	$guests = isset( $_POST['st_guests'] ) ? sanitize_text_field( wp_unslash( $_POST['st_guests'] ) ) : '';
	$msg    = isset( $_POST['st_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['st_message'] ) ) : '';

	if ( '' === $name || '' === $email || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'missing', $redirect ) . '#quote-form' );
		exit;
	}

	$recipient = apply_filters( 'showtime_quote_recipient', 'info@showtimeentertainment.co.za' );

	$body  = "Quote request from the website\n\n";
	$body .= 'Name: ' . $name . "\n";
	$body .= 'Email: ' . $email . "\n";
	$body .= 'Phone: ' . $phone . "\n";
	$body .= 'Event type: ' . $type . "\n";
	$body .= 'Event date: ' . $date . "\n";
	$body .= 'Expected guests: ' . $guests . "\n\n";
	$body .= "About the event:\n" . $msg . "\n";

	wp_mail(
		$recipient,
		'Quote request — ' . $name,
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'enquiry', 'received', $redirect ) . '#quote-form' );
	exit;
}
add_action( 'admin_post_showtime_quote', 'showtime_handle_quote_form' );
add_action( 'admin_post_nopriv_showtime_quote', 'showtime_handle_quote_form' );

/**
 * Import a bundled placeholder image into the media library (used once by
 * the content seeder so portfolio cards are not empty until real event
 * photography arrives).
 *
 * @param string $filename File inside assets/images/.
 * @return int Attachment ID, or 0 on failure.
 */
function showtime_import_placeholder_image( $filename ) {
	$source = get_theme_file_path( 'assets/images/' . $filename );
	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$uploads = wp_upload_dir();
	if ( ! empty( $uploads['error'] ) ) {
		return 0;
	}

	$target = trailingslashit( $uploads['path'] ) . wp_unique_filename( $uploads['path'], $filename );
	if ( ! copy( $source, $target ) ) {
		return 0;
	}

	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/png',
			'post_title'     => __( 'Placeholder — replace with event photography', 'showtime' ),
			'post_status'    => 'inherit',
		),
		$target
	);

	if ( ! $attachment_id || is_wp_error( $attachment_id ) ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $target ) );

	return (int) $attachment_id;
}

/**
 * One-time content seed on theme activation: the five pages and the six
 * portfolio entries from the copy deck, plus front-page settings. Only runs
 * when the content does not exist yet — never overwrites.
 */
function showtime_seed_content() {
	if ( get_option( 'showtime_seeded' ) ) {
		return;
	}

	$pages = array(
		'home'     => __( 'Home', 'showtime' ),
		'services' => __( 'Services', 'showtime' ),
		'about'    => __( 'About', 'showtime' ),
		'contact'  => __( 'Contact', 'showtime' ),
	);

	$page_ids = array();
	foreach ( $pages as $slug => $title ) {
		$existing = get_page_by_path( $slug );
		if ( $existing instanceof WP_Post ) {
			$page_ids[ $slug ] = $existing->ID;
			continue;
		}
		$page_ids[ $slug ] = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_title'  => $title,
				'post_name'   => $slug,
			)
		);
	}

	if ( ! empty( $page_ids['home'] ) && ! is_wp_error( $page_ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', (int) $page_ids['home'] );
	}

	$entries = array(
		array( 'BRICS Summit', 'Johannesburg — 2023', 'Event infrastructure and technical support for one of the largest diplomatic gatherings on the continent.' ),
		array( 'Presidential Imbizo', 'North West — 2023', 'Staging, sound and mass seating for a national public engagement programme.' ),
		array( 'International Music & Cultural Week', 'Gaborone — 2018', 'Cross-border production support for a week of live performance and culture.' ),
		array( 'Unlocking Blockchain Conference', 'Johannesburg — 2018', 'Conference staging, exhibition infrastructure and full coordination.' ),
		array( 'National Tourism Career Expo', 'North West — 2018', 'Exhibition structures and event infrastructure for a provincial career expo.' ),
		array( 'Mebala Ya Rona Biodiversity Conference', 'North West — 2017 & 2018', 'Two consecutive editions of conference production and coordination.' ),
	);

	$has_portfolio = get_posts(
		array(
			'post_type'      => 'portfolio',
			'posts_per_page' => 1,
			'post_status'    => 'any',
			'fields'         => 'ids',
		)
	);

	if ( empty( $has_portfolio ) ) {
		$placeholders = array(
			showtime_import_placeholder_image( 'placeholder-169.png' ),
			showtime_import_placeholder_image( 'placeholder-wide.png' ),
			showtime_import_placeholder_image( 'placeholder-thumb.png' ),
		);

		// Insert oldest first so the archive (newest first) matches the design order.
		$position = count( $entries ) - 1;
		foreach ( array_reverse( $entries ) as $entry ) {
			$post_id = wp_insert_post(
				array(
					'post_type'    => 'portfolio',
					'post_status'  => 'publish',
					'post_title'   => $entry[0],
					'post_excerpt' => $entry[2],
				)
			);
			if ( $post_id && ! is_wp_error( $post_id ) ) {
				update_post_meta( $post_id, 'showtime_event_meta', $entry[1] );
				$thumb = $placeholders[ $position % 3 ];
				if ( $thumb ) {
					set_post_thumbnail( $post_id, $thumb );
				}
			}
			$position--;
		}
	}

	flush_rewrite_rules();
	update_option( 'showtime_seeded', 1 );
}
add_action( 'after_switch_theme', 'showtime_seed_content' );
