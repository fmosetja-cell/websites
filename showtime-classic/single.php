<?php
/**
 * Single post template.
 *
 * @package showtime-classic
 */

get_header();
?>

<main class="st-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<section class="st-section st-page-header">
		<p class="st-caption"><?php echo esc_html( get_the_date() ); ?></p>
		<h1 class="st-h1-lg"><?php the_title(); ?></h1>
	</section>
	<section class="st-section st-content">
		<?php the_content(); ?>
	</section>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
