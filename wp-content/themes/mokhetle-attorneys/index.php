<?php
/**
 * Fallback template.
 *
 * Used for the blog index, archives, search and any query without a more
 * specific template. The bespoke marketing pages use front-page.php and the
 * template-*.php files.
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="inner-hero">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">Mokhetle Attorneys Inc.</span>
			<h1><?php echo esc_html( wp_get_document_title() ); ?></h1>
		</div>
	</div>
</section>

<main id="main">
	<section>
		<div class="container">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<article <?php post_class(); ?> style="margin-bottom:40px;">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div><?php the_content(); ?></div>
					</article>
					<?php
				}
				the_posts_pagination();
			} else {
				echo '<p>Nothing found.</p>';
			}
			?>
		</div>
	</section>
</main>
<?php
get_footer();
