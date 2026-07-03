=== Showtime Entertainment ===
Contributors: showtime
Requires at least: 6.5
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Austere-luxury block theme for Showtime Entertainment — event management &
production, est. 2010, Klerksdorp & Sandton, South Africa.

== Description ==

Five-page marketing site: Home, Services, Portfolio (custom post type),
About and Contact (quote-request form), plus a full-screen menu overlay.
Pure-black canvas, white uppercase wide-tracked display type (Saira
Condensed), monospace labels (JetBrains Mono), serif body copy
(EB Garamond), hairline dividers, pill-outline buttons — no shadows,
no gradients, weight 400 only.

== Setup ==

1. Copy the `showtime-theme` folder to `wp-content/themes/` and activate.
   On activation the theme seeds (once, never overwriting):
   * Pages: Home, Services, About, Contact (Home is set as the front page)
   * Six portfolio entries from the copy deck, with placeholder images
2. Permalinks: use "Post name" (Settings → Permalinks) so /portfolio/,
   /services/ etc. resolve.
3. Photography: replace the dark placeholders with real event photos —
   cool, dark, cinematic, 16:9 or wider, edge-to-edge crops. Hero images
   at least 2560px wide. Placeholders live in assets/images/ and in the
   media library after seeding.
4. Portfolio entries: Portfolio → Add entry. Title, excerpt (card copy),
   featured image, and the "Location — year (card tag)" field (shown in
   the sidebar's custom fields / meta panel) e.g. "Johannesburg — 2023".
5. Quote form: works out of the box — submissions are emailed to
   info@showtimeentertainment.co.za (change via the
   `showtime_quote_recipient` filter). Server-side validation requires
   name + email; a honeypot field blocks naive bots. For managed
   submissions swap in Fluent Forms / WPForms / Gravity Forms and style
   to the underline-input spec in assets/css/showtime.css.
6. Social links: the footer Instagram/Facebook entries are plain text
   until the client supplies URLs (edit patterns/footer.php).

== Fonts ==

Self-hosted in assets/fonts/ (no CDN calls — POPIA/GDPR):
* Saira Condensed 400 — display / wordmark
* EB Garamond 400 — body serif
* JetBrains Mono 400 — labels, nav, buttons, captions
All are Google Fonts released under the SIL Open Font License 1.1.
The design uses weight 400 only — no bold anywhere.

== Credits ==

Placeholder images generated for the design handoff; replace before launch.
