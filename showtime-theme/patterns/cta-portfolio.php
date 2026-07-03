<?php
/**
 * Title: CTA band — Your event next (flat)
 * Slug: showtime/cta-portfolio
 * Categories: showtime
 * Viewport width: 1400
 *
 * Flat surface-soft CTA band (no photo).
 *
 * @package showtime
 */

$showtime_contact = esc_url( home_url( '/contact/' ) );
?>
<!-- wp:group {"tagName":"section","className":"st-cta--flat","layout":{"type":"default"}} -->
<section class="wp-block-group st-cta--flat">
<!-- wp:heading {"level":2,"className":"st-cta-title"} -->
<h2 class="wp-block-heading st-cta-title">Your event next</h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $showtime_contact; ?>">Enquire</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
