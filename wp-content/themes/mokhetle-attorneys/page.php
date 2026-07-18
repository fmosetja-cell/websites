<?php
/**
 * Generic page template.
 *
 * Renders a standard WordPress Page (title + editor content) inside the firm's
 * inner-page hero band. Used for pages that don't have a bespoke template —
 * e.g. the future Privacy & POPIA Notice and Website Terms pages.
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="inner-hero">
		<div class="container">
			<nav class="breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <?php the_title(); ?>
			</nav>
			<div class="section-head">
				<span class="eyebrow">Mokhetle Attorneys Inc.</span>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</section>

	<main id="main">
		<section>
			<div class="container" style="max-width:820px;">
				<?php the_content(); ?>
			</div>
		</section>
	</main>
	<?php
endwhile;

get_footer();
