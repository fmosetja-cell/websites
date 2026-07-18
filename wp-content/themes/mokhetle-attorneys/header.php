<?php
/**
 * Header: document head, utility bar, sticky site header and mega-menu navigation.
 *
 * The navigation is rendered as bespoke markup (not wp_nav_menu) so the
 * prototype's mega-menu layout is reproduced exactly. Internal links resolve to
 * real WordPress permalinks via mok_url(); contact details come from mok_opt()
 * (Appearance → Customize → Firm Contact Details).
 *
 * @package Mokhetle_Attorneys
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
<a class="skip-link" href="#main">Skip to content</a>

<div class="utility-bar">
	<div class="container">
		<div class="u-links">
			<a href="tel:<?php echo esc_attr( mok_opt( 'phone_tel' ) ); ?>">&#128222; <?php echo esc_html( mok_opt( 'phone_display' ) ); ?></a>
			<a href="mailto:<?php echo esc_attr( mok_opt( 'email' ) ); ?>"><?php echo esc_html( mok_opt( 'email' ) ); ?></a>
			<span><?php echo esc_html( mok_opt( 'hours' ) ); ?></span>
		</div>
		<div class="u-links"><a href="<?php echo esc_url( mok_url( 'client-portal' ) ); ?>">Client Portal Login &rarr;</a></div>
	</div>
</div>

<header class="site-header">
	<div class="container nav-row">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
			<span class="mark">M</span>
			<span><?php bloginfo( 'name' ); ?><span class="sub">Attorneys &middot; Notaries &middot; Conveyancers</span></span>
		</a>
		<nav class="main-nav" aria-label="Primary">
			<ul>
				<li><a class="nav-link" href="<?php echo esc_url( mok_url( 'about' ) ); ?>">About</a></li>
				<li class="has-mega">
					<a class="nav-link" href="<?php echo esc_url( mok_url( 'practice-areas' ) ); ?>">Practice Areas <span class="caret">&#9662;</span></a>
					<div class="mega-menu">
						<div class="col featured">
							<h4>Not sure where to start?</h4>
							<p>Tell us briefly what's going on and we'll point you to the right service — or start a guided enquiry with our AI Legal Assistant.</p>
							<a class="btn btn-primary btn-sm" href="<?php echo esc_url( mok_url( 'ai-legal-assistant' ) ); ?>">Start a Secure Enquiry &rarr;</a>
						</div>
						<div class="col"><h4>Litigation</h4>
							<a href="<?php echo esc_url( mok_url( 'personal-injury' ) ); ?>">Personal Injury &amp; Medical Negligence</a>
							<a href="#">Civil Litigation</a>
						</div>
						<div class="col"><h4>Advisory</h4>
							<a href="#">Labour &amp; Employment Law</a>
							<a href="#">Municipal &amp; Public-Sector Law</a>
							<a href="#">Commercial &amp; Corporate Law</a>
						</div>
						<div class="col"><h4>Specialist</h4>
							<a href="<?php echo esc_url( mok_url( 'forensic-investigations' ) ); ?>">Forensic Investigations &amp; Legal Audits</a>
							<a href="<?php echo esc_url( mok_url( 'correspondent-attorney-services' ) ); ?>">Correspondent Attorney Services</a>
						</div>
						<div class="col"><h4>Resources</h4>
							<a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">Frequently Asked Questions</a>
							<a href="<?php echo esc_url( mok_url( 'ai-legal-assistant' ) ); ?>">AI Legal Assistant</a>
						</div>
					</div>
				</li>
				<li><a class="nav-link" href="<?php echo esc_url( home_url( '/#experience' ) ); ?>">Selected Experience</a></li>
				<li><a class="nav-link" href="<?php echo esc_url( mok_url( 'ai-legal-assistant' ) ); ?>">AI Assistant</a></li>
				<li><a class="nav-link" href="<?php echo esc_url( mok_url( 'contact' ) ); ?>">Contact</a></li>
			</ul>
		</nav>
		<div class="nav-cta">
			<a class="btn btn-primary btn-sm" href="<?php echo esc_url( mok_url( 'contact' ) ); ?>">Speak to an Attorney</a>
			<button class="nav-toggle" aria-label="Toggle navigation">&#9776;</button>
		</div>
	</div>
</header>
