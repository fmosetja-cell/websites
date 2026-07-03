<?php
/**
 * 404 template.
 *
 * @package showtime-classic
 */

get_header();
?>

<main class="st-main">
	<section class="st-section st-404">
		<p class="st-caption">404</p>
		<h1 class="st-h1-lg"><?php esc_html_e( 'Nothing on this stage', 'showtime-classic' ); ?></h1>
		<p class="st-serif st-serif--strong st-lede"><?php esc_html_e( 'The page you are looking for does not exist or has moved.', 'showtime-classic' ); ?></p>
		<p class="st-404-cta"><a class="st-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'showtime-classic' ); ?></a></p>
	</section>
</main>

<?php
get_footer();
