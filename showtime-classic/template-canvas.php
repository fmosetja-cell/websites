<?php
/**
 * Template Name: Canvas (page builder)
 * Template Post Type: page
 *
 * Full-bleed content between the site header and footer — no title,
 * no container padding. Made for Elementor and other page builders.
 *
 * @package showtime-classic
 */

get_header();
?>

<main class="st-main st-canvas">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php
get_footer();
