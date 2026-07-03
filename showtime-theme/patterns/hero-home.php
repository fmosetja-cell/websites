<?php
/**
 * Title: Home hero
 * Slug: showtime/hero-home
 * Categories: showtime
 * Viewport width: 1400
 *
 * Full-bleed 92vh photo hero: display-xl headline, mono caption,
 * "Discover" pill pinned near the bottom.
 *
 * @package showtime
 */

$showtime_hero     = esc_url( get_theme_file_uri( 'assets/images/placeholder-hero.png' ) );
$showtime_services = esc_url( home_url( '/services/' ) );
?>
<!-- wp:cover {"url":"<?php echo $showtime_hero; ?>","dimRatio":0,"isDark":true,"minHeight":92,"minHeightUnit":"vh","tagName":"section","className":"st-hero","layout":{"type":"default"}} -->
<section class="wp-block-cover is-dark st-hero" style="min-height:92vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $showtime_hero; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"level":1,"className":"st-hero-title"} -->
<h1 class="wp-block-heading st-hero-title">The show begins</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"st-caption st-caption--white st-hero-caption"} -->
<p class="st-caption st-caption--white st-hero-caption">Event management &amp; production &mdash; South Africa</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"st-hero-cta"} -->
<div class="wp-block-buttons st-hero-cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $showtime_services; ?>">Discover</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div></section>
<!-- /wp:cover -->
