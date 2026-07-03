<?php
/**
 * Site header: transparent 56px nav + full-screen menu overlay.
 *
 * @package showtime-classic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'showtime-classic' ); ?></a>

<div class="st-topnav">
	<button type="button" class="st-navlink st-menu-open" aria-expanded="false" aria-controls="st-menu-overlay"><?php esc_html_e( 'Menu', 'showtime-classic' ); ?></button>
	<a class="st-wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	<a class="st-navlink st-navlink--end" href="<?php echo esc_url( get_theme_mod( 'showtime_enquire_url', '/contact/' ) ); ?>"><?php esc_html_e( 'Enquire', 'showtime-classic' ); ?></a>
</div>

<div id="st-menu-overlay" class="st-overlay" hidden>
	<div class="st-overlay-bar">
		<button type="button" class="st-navlink st-menu-close"><?php esc_html_e( 'Close', 'showtime-classic' ); ?></button>
		<span class="st-wordmark"><?php bloginfo( 'name' ); ?></span>
		<span></span>
	</div>
	<nav class="st-overlay-nav" aria-label="<?php esc_attr_e( 'Site', 'showtime-classic' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'st-overlay-links',
				'depth'          => 1,
				'fallback_cb'    => 'wp_page_menu',
			)
		);
		?>
	</nav>
	<?php $showtime_note = get_theme_mod( 'showtime_overlay_note', '' ); ?>
	<?php if ( $showtime_note ) : ?>
	<div class="st-overlay-foot">
		<span class="st-caption"><?php echo esc_html( $showtime_note ); ?></span>
	</div>
	<?php endif; ?>
</div>

<div id="content">
