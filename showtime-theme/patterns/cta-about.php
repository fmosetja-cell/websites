<?php
/**
 * Title: CTA band — Meet us
 * Slug: showtime/cta-about
 * Categories: showtime
 * Viewport width: 1400
 *
 * @package showtime
 */

$showtime_img     = esc_url( get_theme_file_uri( 'assets/images/placeholder-169.png' ) );
$showtime_contact = esc_url( home_url( '/contact/' ) );
?>
<!-- wp:cover {"url":"<?php echo $showtime_img; ?>","dimRatio":0,"isDark":true,"tagName":"section","className":"st-cta","layout":{"type":"default"}} -->
<section class="wp-block-cover is-dark st-cta"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $showtime_img; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"level":2,"className":"st-cta-title"} -->
<h2 class="wp-block-heading st-cta-title">Meet us in Klerksdorp or Sandton</h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $showtime_contact; ?>">Contact</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div></section>
<!-- /wp:cover -->
