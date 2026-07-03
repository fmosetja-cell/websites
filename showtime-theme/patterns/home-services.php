<?php
/**
 * Title: Home services grid
 * Slug: showtime/home-services
 * Categories: showtime
 * Viewport width: 1400
 *
 * "The services" — 2-column grid of five photo cards; the fifth
 * (Exhibitions & infrastructure) spans both columns. All link to Services.
 *
 * @package showtime
 */

$showtime_services = esc_url( home_url( '/services/' ) );
$showtime_img_169  = esc_url( get_theme_file_uri( 'assets/images/placeholder-169.png' ) );
$showtime_img_wide = esc_url( get_theme_file_uri( 'assets/images/placeholder-wide.png' ) );
$showtime_img_thmb = esc_url( get_theme_file_uri( 'assets/images/placeholder-thumb.png' ) );

$showtime_cards = array(
	array( $showtime_img_169, 'Event management', 'Concept &middot; Coordination &middot; On-site delivery', '' ),
	array( $showtime_img_wide, 'Sound &amp; stage', '50 &ndash; 50,000 PAX &middot; In-house engineering', '' ),
	array( $showtime_img_thmb, 'Tents &amp; marquees', 'Engineered &middot; Two-storey &middot; Climate control', '' ),
	array( $showtime_img_169, 'Event furniture', 'VIP &middot; Banquet &middot; Up to 5,000 seated', '' ),
	array( $showtime_img_wide, 'Exhibitions &amp; infrastructure', 'Expo structures &middot; Activations &middot; Branding', ' st-card--wide' ),
);
?>
<!-- wp:group {"tagName":"section","className":"st-section st-home-services","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-home-services">
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">The services</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"st-cards","layout":{"type":"default"}} -->
<div class="wp-block-group st-cards">
<?php foreach ( $showtime_cards as $showtime_card ) : ?>
<!-- wp:group {"tagName":"article","className":"st-card<?php echo $showtime_card[3]; ?>","layout":{"type":"default"}} -->
<article class="wp-block-group st-card<?php echo $showtime_card[3]; ?>">
<!-- wp:image {"sizeSlug":"large","linkDestination":"custom","className":"st-card-media"} -->
<figure class="wp-block-image size-large st-card-media"><a href="<?php echo $showtime_services; ?>"><img src="<?php echo $showtime_card[0]; ?>" alt=""/></a></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"st-card-body","layout":{"type":"default"}} -->
<div class="wp-block-group st-card-body"><!-- wp:heading {"level":3,"className":"st-card-name"} -->
<h3 class="wp-block-heading st-card-name"><a href="<?php echo $showtime_services; ?>"><?php echo $showtime_card[1]; ?></a></h3>
<!-- /wp:heading --><!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption"><?php echo $showtime_card[2]; ?></p>
<!-- /wp:paragraph --><!-- wp:paragraph {"className":"st-card-linkline"} -->
<p class="st-card-linkline"><a class="st-card-link" href="<?php echo $showtime_services; ?>">Discover</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
</article>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
