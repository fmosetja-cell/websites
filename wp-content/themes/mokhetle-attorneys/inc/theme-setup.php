<?php
/**
 * One-time content scaffolding.
 *
 * On theme activation this creates every page the theme ships (assigning the
 * correct page template), sets the static front page, and builds the primary
 * navigation menu — so a fresh WordPress install shows the finished site
 * immediately, with no manual page creation or import step.
 *
 * Idempotent: existing pages (matched by slug) are reused, never duplicated, so
 * re-activating the theme is safe.
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create/ensure all theme pages and return a slug => post ID map.
 *
 * @return array
 */
function mok_ensure_pages() {
	$ids = array();

	foreach ( mok_pages() as $slug => $data ) {
		$existing = get_page_by_path( $slug );

		if ( $existing ) {
			$page_id = $existing->ID;
		} else {
			$page_id = wp_insert_post(
				array(
					'post_title'   => $data['title'],
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '', // Content is rendered by the page template.
					'comment_status' => 'closed',
					'ping_status'    => 'closed',
				)
			);
		}

		if ( $page_id && ! is_wp_error( $page_id ) ) {
			$ids[ $slug ] = $page_id;
			if ( ! empty( $data['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $data['template'] );
			}
		}
	}

	return $ids;
}

/**
 * Set the static front page to the "home" page.
 *
 * @param array $ids Slug => ID map.
 */
function mok_set_front_page( $ids ) {
	if ( empty( $ids['home'] ) ) {
		return;
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $ids['home'] );
}

/**
 * Build the primary navigation menu and assign it to the 'primary' location.
 *
 * The visible header renders bespoke mega-menu markup for design fidelity; this
 * menu is created so the site still has an editable menu in Appearance → Menus
 * that a future editor can wire the header to if they prefer.
 *
 * @param array $ids Slug => ID map.
 */
function mok_build_primary_menu( $ids ) {
	$menu_name = 'Primary';
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
	} else {
		$menu_id = $menu->term_id;
	}

	if ( is_wp_error( $menu_id ) ) {
		return;
	}

	// Only populate once, to avoid duplicate items on re-activation.
	$items = wp_get_nav_menu_items( $menu_id );
	if ( empty( $items ) ) {
		$order = 1;
		foreach ( array( 'about', 'practice-areas', 'ai-legal-assistant', 'contact' ) as $slug ) {
			if ( empty( $ids[ $slug ] ) ) {
				continue;
			}
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-object-id' => $ids[ $slug ],
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-position'  => $order++,
				)
			);
		}
	}

	$locations            = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Run the full setup routine when the theme is activated.
 */
function mok_activate() {
	$ids = mok_ensure_pages();
	mok_set_front_page( $ids );
	mok_build_primary_menu( $ids );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'mok_activate' );
