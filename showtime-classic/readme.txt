=== Showtime Classic ===
Contributors: showtime
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Classic (PHP-template) edition of the Showtime Entertainment theme, built
for page-builder workflows. Ships the brand chrome only — no hard-coded
content anywhere.

== Description ==

What the theme provides:
* Pure-black canvas with the brand type system: Saira Condensed (display),
  EB Garamond (serif body), JetBrains Mono (labels) — self-hosted woff2,
  weight 400 only, no CDN calls
* Transparent 56px top nav: MENU button, centered wordmark (site title),
  ENQUIRE button (link set in the Customizer)
* Full-screen black menu overlay driven by a normal WordPress menu
* Four-column footer driven by widgets, with hairline, copyright and
  wordmark
* Pill-outline button class (.st-btn) and brand CSS variables (--st-*)
  you can reuse inside the page builder

What it does NOT provide: pages, posts, portfolio entries or any copy.
Every page template renders the_content, so all content is built by you
(Elementor, the block editor, or plain HTML).

== Setup ==

1. Copy `showtime-classic` to wp-content/themes/ and activate.
2. Appearance → Menus: create a menu (Home, Services, Portfolio, About,
   Contact…) and assign it to the "Menu overlay" location.
3. Appearance → Customize → Showtime options: set the "Enquire" button
   link and (optionally) the small note at the bottom of the menu
   overlay, e.g. "Klerksdorp · Sandton — Est. 2010".
4. Appearance → Widgets: fill the four footer columns (text/HTML widgets
   work well — give each a title like COMPANY, SERVICES, OFFICES, CONNECT).
5. Build pages. For Elementor, assign the page template "Canvas (page
   builder)" (Page → Template) to get full-bleed content between the
   site header and footer — or use Elementor's own Full Width template.
6. Brand styling inside the builder: backgrounds #000000 / #0d0d0d,
   headings Saira Condensed 400 uppercase with wide letter-spacing,
   body EB Garamond, labels JetBrains Mono 11px uppercase +2px tracking,
   hairlines #262626, buttons transparent with 1px white outline and
   pill radius. The CSS variables in assets/css/main.css list every token.

== Fonts ==

Saira Condensed, EB Garamond and JetBrains Mono are Google Fonts released
under the SIL Open Font License 1.1, self-hosted in assets/fonts/.
