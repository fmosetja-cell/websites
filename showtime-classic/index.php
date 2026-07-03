<?php
/**
 * Fallback template: archive / blog / search listing.
 *
 * @package showtime-classic
 */

get_header();
?>

<main class="st-main">
	<section class="st-section st-page-header">
		<?php if ( is_search() ) : ?>
		<p class="st-caption"><?php esc_html_e( 'Search', 'showtime-classic' ); ?></p>
		<h1 class="st-h1-lg"><?php echo esc_html( get_search_query() ); ?></h1>
		<?php elseif ( is_archive() ) : ?>
		<h1 class="st-h1-lg"><?php echo wp_kses_post( get_the_archive_title() ); ?></h1>
		<?php else : ?>
		<h1 class="st-h1-lg"><?php single_post_title(); ?></h1>
		<?php endif; ?>
	</section>

	<section class="st-section st-listing">
		<?php if ( have_posts() ) : ?>
		<div class="st-rows">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
			<article class="st-row">
				<p class="st-caption"><?php echo esc_html( get_the_date() ); ?></p>
				<h2 class="st-row-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="st-row-excerpt"><?php the_excerpt(); ?></div>
			</article>
			<?php endwhile; ?>
		</div>
		<div class="st-pagination">
			<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
		</div>
		<?php else : ?>
		<p class="st-caption"><?php esc_html_e( 'Nothing found.', 'showtime-classic' ); ?></p>
		<?php endif; ?>
	</section>
</main>

<?php
get_footer();
