<?php
/**
 * Title: Contact — details + quote form
 * Slug: showtime/contact
 * Categories: showtime
 * Viewport width: 1400
 *
 * Two-column layout (1fr / 1.2fr): office details left, underline-input
 * quote form right. The form posts to admin-post.php (see functions.php);
 * feedback tags are shown from the ?enquiry= query arg.
 *
 * @package showtime
 */

$showtime_action = esc_url( admin_url( 'admin-post.php' ) );
?>
<!-- wp:group {"tagName":"section","className":"st-section st-contact","layout":{"type":"default"}} -->
<section class="wp-block-group st-section st-contact">
<!-- wp:group {"className":"st-contact-header","layout":{"type":"default"}} -->
<div class="wp-block-group st-contact-header"><!-- wp:paragraph {"className":"st-caption"} -->
<p class="st-caption">Contact</p>
<!-- /wp:paragraph --><!-- wp:heading {"level":1,"className":"st-h1-lg"} -->
<h1 class="wp-block-heading st-h1-lg">Enquire</h1>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="st-contact-grid">
	<div class="st-details">
		<div class="st-detail">
			<p class="st-caption">North West office</p>
			<p class="st-detail-body">02 Mahogany Street, Klerkindustrial<br>Klerksdorp, 2571</p>
			<p class="st-caption st-detail-phones">018 462 6091 &middot; 082 677 6312</p>
		</div>
		<div class="st-detail">
			<p class="st-caption">Gauteng office</p>
			<p class="st-detail-body">7B Tempest Road, Morningside<br>Sandton, 2196</p>
			<p class="st-caption st-detail-phones">011 884 3335 &middot; 076 026 8286</p>
		</div>
		<div class="st-detail">
			<p class="st-caption">Email</p>
			<a class="st-email" href="mailto:info@showtimeentertainment.co.za">info@showtimeentertainment.co.za</a>
		</div>
	</div>
	<div class="st-form" id="quote-form">
		<p class="st-caption">Request a quote</p>
		<form method="post" action="<?php echo $showtime_action; ?>" novalidate>
			<input type="hidden" name="action" value="showtime_quote">
			<p class="st-hp"><label>Website <input type="text" name="st_website" tabindex="-1" autocomplete="off"></label></p>
			<div class="st-form-grid">
				<input type="text" name="st_name" placeholder="Name" aria-label="Name" required>
				<input type="email" name="st_email" placeholder="Email address" aria-label="Email address" required>
				<input type="tel" name="st_phone" placeholder="Phone" aria-label="Phone">
				<input type="text" name="st_type" placeholder="Event type &mdash; gala, conference, activation&hellip;" aria-label="Event type">
				<input type="text" name="st_date" placeholder="Event date" aria-label="Event date">
				<input type="text" name="st_guests" placeholder="Expected guests" aria-label="Expected guests">
			</div>
			<textarea name="st_message" rows="4" placeholder="Tell us about the event" aria-label="Tell us about the event"></textarea>
			<div class="st-form-actions">
				<button type="submit" class="st-btn">Send enquiry</button>
				<span class="st-tag st-tag--success" hidden>Received &mdash; we will be in touch</span>
				<span class="st-tag st-tag--warning" hidden>Name and email are required</span>
			</div>
		</form>
	</div>
</div>
<!-- /wp:html -->
</section>
<!-- /wp:group -->
