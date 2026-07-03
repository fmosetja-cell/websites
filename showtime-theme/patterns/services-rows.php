<?php
/**
 * Title: Services detail rows
 * Slug: showtime/services-rows
 * Categories: showtime
 * Viewport width: 1400
 *
 * Five 2-column service sections with hairline dividers. The photo
 * alternates sides (01 left, 02 right, …) via CSS nth-child order.
 *
 * @package showtime
 */

$showtime_img_169  = esc_url( get_theme_file_uri( 'assets/images/placeholder-169.png' ) );
$showtime_img_wide = esc_url( get_theme_file_uri( 'assets/images/placeholder-wide.png' ) );
$showtime_img_thmb = esc_url( get_theme_file_uri( 'assets/images/placeholder-thumb.png' ) );

$showtime_rows = array(
	array(
		'01',
		'Event management',
		'From first concept to final strike, one team carries the event &mdash; planning, suppliers, programme and on-site supervision.',
		array( 'Concept development', 'Planning &amp; coordination', 'Supplier &amp; stakeholder management', 'Programme &amp; logistics', 'Brand activations &amp; roadshows' ),
		$showtime_img_169,
	),
	array(
		'02',
		'Sound &amp; stage',
		'Systems specified to the room &mdash; or the stadium. Indoor events of fifty to open-air productions beyond fifty thousand, with qualified engineers in-house.',
		array( 'Professional sound system hire', 'Stage setup &amp; construction', 'Specialised lighting', 'Band &amp; DJ setup', 'Live technical support' ),
		$showtime_img_wide,
	),
	array(
		'03',
		'Event furniture',
		'Bespoke furniture, set up and supported for the full run &mdash; from VIP lounges to mass seating for five thousand.',
		array( 'VIP &amp; general seating', 'Lounge furniture', 'Banquet &amp; conference', 'Custom layouts', 'Multi-day setup &amp; support' ),
		$showtime_img_thmb,
	),
	array(
		'04',
		'Tents &amp; marquees',
		'Engineered shelter for any venue and any weather &mdash; finished with draping, decking, lighting and climate control.',
		array( 'Marquee hire &amp; setup', 'Two-storey structures', 'Floor decking', 'Draping &amp; d&eacute;cor infrastructure', 'Climate-controlled shelters' ),
		$showtime_img_169,
	),
	array(
		'05',
		'Exhibitions &amp; infrastructure',
		'Structures that carry the brand &mdash; exhibition builds, activation spaces and temporary infrastructure for conferences, expos and public events.',
		array( 'Exhibition infrastructure', 'Display &amp; activation spaces', 'Event branding support', 'Temporary event structures', 'Conference &amp; expo setup' ),
		$showtime_img_wide,
	),
);
?>
<!-- wp:group {"tagName":"section","className":"st-section st-services-list","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-services-list">
<?php foreach ( $showtime_rows as $showtime_row ) : ?>
<!-- wp:group {"className":"st-srow","layout":{"type":"default"}} -->
<div class="wp-block-group st-srow">
<!-- wp:image {"sizeSlug":"large","className":"st-srow-media"} -->
<figure class="wp-block-image size-large st-srow-media"><img src="<?php echo $showtime_row[4]; ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"st-srow-text-col","layout":{"type":"default"}} -->
<div class="wp-block-group st-srow-text-col"><!-- wp:paragraph {"className":"st-srow-index"} -->
<p class="st-srow-index"><?php echo $showtime_row[0]; ?></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":2,"className":"st-srow-title"} -->
<h2 class="wp-block-heading st-srow-title"><?php echo $showtime_row[1]; ?></h2>
<!-- /wp:heading --><!-- wp:paragraph {"className":"st-serif st-srow-text"} -->
<p class="st-serif st-srow-text"><?php echo $showtime_row[2]; ?></p>
<!-- /wp:paragraph --><!-- wp:group {"className":"st-srow-list","layout":{"type":"default"}} -->
<div class="wp-block-group st-srow-list">
<?php foreach ( $showtime_row[3] as $showtime_item ) : ?>
<!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption"><?php echo $showtime_item; ?></p>
<!-- /wp:paragraph -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<?php endforeach; ?>
</section>
<!-- /wp:group -->
