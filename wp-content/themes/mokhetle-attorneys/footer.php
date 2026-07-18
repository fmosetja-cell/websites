<?php
/**
 * Footer: firm sitemap columns, sticky call/WhatsApp actions, wp_footer().
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div>
				<div class="logo" style="color:var(--white); margin-bottom:12px;"><span class="mark" style="border-color:var(--bronze);">M</span> <?php bloginfo( 'name' ); ?></div>
				<p style="font-size:.85rem; color:var(--silver);">Accessible. Efficient. Responsive. Technologically sophisticated. Serving individuals, businesses and public institutions since 2014.</p>
			</div>
			<div><h4>Practice Areas</h4>
				<a href="<?php echo esc_url( mok_url( 'personal-injury' ) ); ?>">Personal Injury &amp; Medical Negligence</a>
				<a href="#">Civil Litigation</a>
				<a href="#">Labour &amp; Employment</a>
				<a href="#">Municipal &amp; Public-Sector</a>
			</div>
			<div><h4>Firm</h4>
				<a href="<?php echo esc_url( mok_url( 'about' ) ); ?>">About Us</a>
				<a href="<?php echo esc_url( mok_url( 'forensic-investigations' ) ); ?>">Forensic Investigations</a>
				<a href="<?php echo esc_url( mok_url( 'correspondent-attorney-services' ) ); ?>">Correspondent Services</a>
				<a href="<?php echo esc_url( mok_url( 'ai-legal-assistant' ) ); ?>">AI Legal Assistant</a>
				<a href="<?php echo esc_url( mok_url( 'client-portal' ) ); ?>">Client Portal</a>
			</div>
			<div><h4>Legal</h4>
				<a href="#">Privacy &amp; POPIA Notice</a>
				<a href="#">Website Terms &amp; Disclaimer</a>
				<a href="<?php echo esc_url( mok_url( 'contact' ) ); ?>">Contact Us</a>
			</div>
		</div>
		<div class="footer-bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. Reg. No. <?php echo esc_html( mok_opt( 'reg_no' ) ); ?>. All rights reserved.</span>
			<span><?php echo esc_html( mok_opt( 'address' ) ); ?></span>
		</div>
	</div>
</footer>

<div class="sticky-actions">
	<a class="call" href="tel:<?php echo esc_attr( mok_opt( 'phone_tel' ) ); ?>" aria-label="Call <?php bloginfo( 'name' ); ?>">&#128222;</a>
	<a class="whatsapp" href="<?php echo esc_url( mok_opt( 'whatsapp' ) ); ?>" aria-label="Message us on WhatsApp" target="_blank" rel="noopener">&#128172;</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
