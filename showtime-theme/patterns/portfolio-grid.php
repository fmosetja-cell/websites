<?php
/**
 * Title: Portfolio card grid
 * Slug: showtime/portfolio-grid
 * Categories: showtime
 * Viewport width: 1400
 *
 * Query loop over the `portfolio` custom post type. Each card:
 * hairline border, 24px padding, 16:9 featured image, mono
 * "location — year" tag (showtime_event_meta), title, serif excerpt.
 *
 * @package showtime
 */
?>
<!-- wp:group {"tagName":"section","className":"st-section st-portfolio-section","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-portfolio-section">
<!-- wp:query {"queryId":11,"query":{"perPage":12,"pages":0,"offset":0,"postType":"portfolio","order":"desc","orderBy":"date","inherit":true}} -->
<div class="wp-block-query">
<!-- wp:post-template {"className":"st-pgrid"} -->
<!-- wp:group {"tagName":"article","className":"st-pcard","layout":{"type":"default"}} -->
<article class="wp-block-group st-pcard">
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"showtime_event_meta"}}}},"className":"st-caption"} -->
<p class="st-caption"></p>
<!-- /wp:paragraph -->

<!-- wp:post-title {"level":3,"isLink":true} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false} /-->
</article>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">No portfolio entries yet.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
</section>
<!-- /wp:group -->
