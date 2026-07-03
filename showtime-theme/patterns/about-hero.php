<?php
/**
 * Title: About hero
 * Slug: showtime/about-hero
 * Categories: showtime
 * Viewport width: 1400
 *
 * 480px photo band: display-xl "Since 2010" + mono caption.
 *
 * @package showtime
 */

$showtime_img = esc_url( get_theme_file_uri( 'assets/images/placeholder-wide.png' ) );
?>
<!-- wp:cover {"url":"<?php echo $showtime_img; ?>","dimRatio":0,"isDark":true,"minHeight":480,"minHeightUnit":"px","tagName":"section","className":"st-hero st-hero--short","layout":{"type":"default"}} -->
<section class="wp-block-cover is-dark st-hero st-hero--short" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $showtime_img; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"level":1,"className":"st-hero-title"} -->
<h1 class="wp-block-heading st-hero-title">Since 2010</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"st-caption st-caption--white st-hero-caption"} -->
<p class="st-caption st-caption--white st-hero-caption">Showtime Entertainment &mdash; Klerksdorp &middot; Sandton</p>
<!-- /wp:paragraph -->
</div></section>
<!-- /wp:cover -->
