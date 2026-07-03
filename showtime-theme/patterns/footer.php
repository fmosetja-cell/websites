<?php
/**
 * Title: Footer
 * Slug: showtime/footer
 * Categories: showtime
 * Inserter: no
 *
 * Four-column footer: Company, Services, Offices, Connect — then hairline,
 * centered copyright and the wordmark.
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
<div class="st-footer">
	<div class="st-footer-inner">
		<div class="st-footer-grid">
			<div class="st-footer-col">
				<p class="st-caption">Company</p>
				<a href="<?php echo $showtime_about; ?>">About</a>
				<a href="<?php echo $showtime_services; ?>">Services</a>
				<a href="<?php echo $showtime_portfolio; ?>">Portfolio</a>
				<a href="<?php echo $showtime_contact; ?>">Contact</a>
			</div>
			<div class="st-footer-col">
				<p class="st-caption">Services</p>
				<a href="<?php echo $showtime_services; ?>">Event management</a>
				<a href="<?php echo $showtime_services; ?>">Sound &amp; stage</a>
				<a href="<?php echo $showtime_services; ?>">Tents &amp; marquees</a>
				<a href="<?php echo $showtime_services; ?>">Exhibitions</a>
			</div>
			<div class="st-footer-col">
				<p class="st-caption">Offices</p>
				<span>02 Mahogany Street, Klerksdorp</span>
				<span>7B Tempest Road, Sandton</span>
				<span>018 462 6091 &middot; 011 884 3335</span>
			</div>
			<div class="st-footer-col">
				<p class="st-caption">Connect</p>
				<a href="mailto:info@showtimeentertainment.co.za">info@showtimeentertainment.co.za</a>
				<span>Instagram</span>
				<span>Facebook</span>
			</div>
		</div>
		<div class="st-footer-bottom">
			<p class="st-footer-copy">&copy; 2026 Showtime Entertainment. All rights reserved.</p>
			<a class="st-wordmark" href="<?php echo $showtime_home; ?>">Showtime</a>
		</div>
	</div>
</div>
<!-- /wp:html -->
