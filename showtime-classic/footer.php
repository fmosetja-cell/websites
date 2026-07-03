<?php
/**
 * Site footer: four widget columns, hairline, copyright, wordmark.
 *
 * @package showtime-classic
 */
?>
</div><!-- #content -->

<footer class="st-footer">
	<div class="st-footer-inner">
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
		<div class="st-footer-grid">
			<?php for ( $showtime_col = 1; $showtime_col <= 4; $showtime_col++ ) : ?>
			<div class="st-footer-col">
				<?php
				if ( is_active_sidebar( 'footer-' . $showtime_col ) ) {
					dynamic_sidebar( 'footer-' . $showtime_col );
				}
				?>
			</div>
			<?php endfor; ?>
		</div>
		<?php endif; ?>
		<div class="st-footer-bottom">
			<p class="st-footer-copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'showtime-classic' ); ?></p>
			<a class="st-wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
