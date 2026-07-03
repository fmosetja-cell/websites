<?php
/**
 * Title: About body
 * Slug: showtime/about-body
 * Categories: showtime
 * Viewport width: 1400
 *
 * Who we are, Mission / Vision, Why Showtime rows, Who we serve band.
 *
 * @package showtime
 */
?>
<!-- wp:group {"tagName":"section","className":"st-section st-about-who","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-about-who">
<!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">Who we are</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"st-serif st-serif--strong"} -->
<p class="st-serif st-serif--strong">Events are more than gatherings &mdash; they are platforms for communication, celebration and shared experience. Showtime Entertainment brings planning, technical production, sound, staging, furniture, marquees and exhibition infrastructure under one roof, for clients from government departments to private families.</p>
<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"st-section st-mv-section","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-mv-section">
<!-- wp:group {"className":"st-mv","layout":{"type":"default"}} -->
<div class="wp-block-group st-mv">
<!-- wp:group {"className":"st-mv-cell","layout":{"type":"default"}} -->
<div class="wp-block-group st-mv-cell"><!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">Mission</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"st-serif"} -->
<p class="st-serif">Top-level event planning and management &mdash; high-quality delivery, skilled people, and a standing commitment to exceed what the client expected.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"st-mv-cell","layout":{"type":"default"}} -->
<div class="wp-block-group st-mv-cell"><!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">Vision</p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"st-serif"} -->
<p class="st-serif">To be the preferred partner for reliable, hassle-free, cost-effective events &mdash; turning client ideas into occasions that last in memory.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"st-section st-why","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-why">
<!-- wp:heading {"level":2,"className":"st-why-title"} -->
<h2 class="wp-block-heading st-why-title">Why Showtime</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"st-why-rows","layout":{"type":"default"}} -->
<div class="wp-block-group st-why-rows">
<?php
$showtime_claims = array(
	array( '01', 'One provider, the whole event' ),
	array( '02', 'Corporate, public, cultural &amp; government experience' ),
	array( '03', 'Intimate functions to mass events' ),
	array( '04', 'Personalised client service' ),
	array( '05', 'Reliable supplier &amp; technical coordination' ),
);
foreach ( $showtime_claims as $showtime_claim ) :
	?>
<!-- wp:group {"className":"st-why-row","layout":{"type":"default"}} -->
<div class="wp-block-group st-why-row"><!-- wp:paragraph {"className":"st-srow-index"} -->
<p class="st-srow-index"><?php echo $showtime_claim[0]; ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"st-why-claim"} -->
<p class="st-why-claim"><?php echo $showtime_claim[1]; ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"st-serve","layout":{"type":"default"}} -->
<section class="wp-block-group st-serve">
<!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">Who we serve</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"st-serve-list"} -->
<p class="st-serve-list">Government &amp; public entities &middot; Municipalities &middot; Corporates &middot; NGOs &middot; Educational institutions &middot; Tourism &amp; hospitality &middot; Promoters &middot; Communities &amp; private clients &middot; Brands</p>
<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
