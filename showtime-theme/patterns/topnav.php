<?php
/**
 * Title: Top nav + menu overlay
 * Slug: showtime/topnav
 * Categories: showtime
 * Inserter: no
 *
 * Transparent 56px nav overlaying the page top, plus the full-screen
 * pure-black menu overlay (toggled by assets/js/showtime.js).
 *
 * @package showtime
 */

$showtime_home      = esc_url( home_url( '/' ) );
$showtime_services  = esc_url( home_url( '/services/' ) );
$showtime_about     = esc_url( home_url( '/about/' ) );
$showtime_contact   = esc_url( home_url( '/contact/' ) );
$showtime_portfolio = get_post_type_archive_link( 'portfolio' );
$showtime_portfolio = esc_url( $showtime_portfolio ? $showtime_portfolio : home_url( '/portfolio/' ) );
?>
<!-- wp:html -->
<div class="st-topnav">
	<button type="button" class="st-navlink st-menu-open" aria-expanded="false" aria-controls="st-menu-overlay">Menu</button>
	<a class="st-wordmark" href="<?php echo $showtime_home; ?>">Showtime</a>
	<a class="st-navlink st-navlink--end" href="<?php echo $showtime_contact; ?>">Enquire</a>
</div>
<div id="st-menu-overlay" class="st-overlay" hidden>
	<div class="st-overlay-bar">
		<button type="button" class="st-navlink st-menu-close">Close</button>
		<span class="st-wordmark">Showtime</span>
		<span></span>
	</div>
	<nav class="st-overlay-links" aria-label="<?php esc_attr_e( 'Site', 'showtime' ); ?>">
		<a class="st-overlay-link" href="<?php echo $showtime_home; ?>">Home</a>
		<a class="st-overlay-link" href="<?php echo $showtime_services; ?>">Services</a>
		<a class="st-overlay-link" href="<?php echo $showtime_portfolio; ?>">Portfolio</a>
		<a class="st-overlay-link" href="<?php echo $showtime_about; ?>">About</a>
		<a class="st-overlay-link" href="<?php echo $showtime_contact; ?>">Contact</a>
	</nav>
	<div class="st-overlay-foot">
		<span class="st-caption">Klerksdorp &middot; Sandton &mdash; Est. 2010</span>
	</div>
</div>
<!-- /wp:html -->
