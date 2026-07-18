# Mokhetle Attorneys Inc. — Elementor build

An Elementor Pro version of the approved "Homepage 2" design, so the firm can
edit every page visually. It has two parts:

1. **A child theme** — `wp-content/themes/mokhetle-elementor-child/` (parent:
   **Hello Elementor**). It loads the firm's full design system (palette, fonts,
   and every component class) plus Elementor-structure overrides, so native
   Elementor widgets inherit the exact look.
2. **Importable page templates** — `elementor/templates/*.json`. Each page is
   rebuilt with **native Elementor widgets** (Heading, Text Editor, Button,
   Icon Box, Icon List, Accordion) styled through the design-system CSS classes,
   with HTML widgets only where a native widget can't represent the content
   (see "HTML-widget exceptions" below).

## Prerequisites

- WordPress 6.0+
- **Elementor** (free) and **Elementor Pro** — Pro is used for Theme Builder
  (site header/footer) and the Form widget (real enquiry submissions).
- **Hello Elementor** theme installed (the parent).

## Install

1. **Themes.** Install *Hello Elementor*, then install & **activate** the child
   theme `mokhetle-elementor-child` (Appearance → Themes; upload the folder or
   the whole `wp-content/themes` if deploying files directly).
2. **Fonts/colours (optional but recommended).** The design system already sets
   fonts and colours via CSS, so you can leave Elementor's Global styles as-is.
   If you prefer Elementor to manage them, set the Global Kit primary font to
   **Jost**, headings to **Cormorant Garamond**, and add the palette from
   `docs/` (bronze `#A8834F`, charcoal `#2B2A28`, beige `#F4EEE3`).
3. **Import each page template:**
   - Templates → Saved Templates → **Import Templates** → upload the nine files
     in `elementor/templates/` (`home.json`, `about.json`, …).
   - Create a WordPress Page for each (Pages → Add New), then in the Elementor
     editor for that page: folder icon → **My Templates** → **Insert** the
     matching template.
   - Give each page the slug used in the links: `about`, `practice-areas`,
     `personal-injury`, `forensic-investigations`,
     `correspondent-attorney-services`, `ai-legal-assistant`, `client-portal`,
     `contact`; set the Home page as the static front page
     (Settings → Reading).
4. **Header & footer.** Build these once in **Elementor Theme Builder**
   (Templates → Theme Builder → Header / Footer). The prototype's exact header
   (utility bar + mega-menu) and footer markup are in
   `reference/static-prototype/` and in the classic theme's `header.php` /
   `footer.php` if you want to reproduce them, or use the design-system classes
   (`.utility-bar`, `.site-header`, `.mega-menu`, `.site-footer`).

## HTML-widget exceptions (by necessity, not choice)

These are script-driven or bespoke and can't be native widgets:

- **AI Legal Assistant chat** (`ai-legal-assistant`, `personal-injury`) — the
  simulated intake flow. Rendered as an HTML widget (`.assistant-panel
  [data-assistant]`); the child theme's `main.js` drives it.
- **Client Portal mockup** (`client-portal`) — the static dashboard preview.
- **Enquiry / instruction forms** (`contact`, `correspondent`, home) — rendered
  as HTML forms wired to `main.js` for the demo message. **For real
  submissions, replace each with a native Elementor Pro Form widget** (drag it
  in, add your fields + email action). This is the one place a native widget is
  strongly recommended over the imported HTML.

## Known touch-ups after import

I couldn't run Elementor in the build environment, so verify/adjust these once
imported (they're cosmetic, not structural):

- **Section vertical spacing.** Padding is set conservatively; nudge per section
  to taste.
- **Icons.** Icon Box widgets use Font Awesome icons (e.g. `fa-handshake`); swap
  any you'd prefer. The prototype used abstract glyphs — the FA choices are a
  reasonable, editable stand-in.
- **Practice-card numbers.** The prototype's 1–7 number badges aren't part of
  the native Icon Box; add them via each widget's icon or a number if wanted.
- **Column widths on mobile.** Confirm the multi-column rows stack as expected
  (Elementor handles this, but check the 7-card grid rows).

## Section → widget mapping (reference)

| Prototype section | Elementor representation |
|---|---|
| Eyebrow + H2 section head | Heading (`.eyebrow`) + Heading |
| Value pillars | Icon Box `.pillar` in a 4-column row |
| Practice-area cards | Icon Box `.practice-card`, grid as stacked inner-section rows of 4 |
| Director / two-column | 2 columns: Image/HTML portrait + Heading/Text/Button |
| Selected experience (dark) | Section `.band-dark` + 3× Icon Box `.experience-card` |
| Capability checklists | Icon List `.mok-cols-2` (check icons) |
| FAQ | Accordion `.mok-faq` |
| Buttons | Button widget with `.btn`/`.btn-primary`/`.btn-outline` classes |
| Hero / CTA button rows | HTML widget (exact `.hero-ctas` markup) |
| AI chat, portal, forms | HTML widget (see exceptions) |

The generator that produced these templates lives in
`elementor/build/generate.js` (run `node elementor/build/generate.js` to
regenerate `elementor/templates/*.json`). The JSON in `templates/` is the
output and is what you import.
