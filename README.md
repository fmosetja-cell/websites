# Mokhetle Attorneys Inc. — WordPress site

WordPress conversion of the approved static prototype for **Mokhetle Attorneys Inc.**,
a Mahikeng-based law firm. The build follows the **"Homepage 2 — Modern Approachable"**
design concept (warm beige/champagne, charcoal and bronze palette; Cormorant Garamond +
Jost typography) and ports every prototype page faithfully into a custom WordPress theme.

## Two builds in this repo

The site is delivered two ways — pick the one that matches how you'll edit it:

- **Elementor Pro build** (`elementor/` + `wp-content/themes/mokhetle-elementor-child/`)
  — **the intended editing path.** A Hello Elementor child theme carrying the
  full design system, plus importable Elementor templates that rebuild every
  page with native widgets. See **`elementor/README.md`** for install/import.
- **Classic custom theme** (`wp-content/themes/mokhetle-attorneys/`) — a
  self-contained, page-builder-free theme that renders the whole site with no
  plugins. Kept as a reference/fallback and for anyone not using Elementor.

> Note: Elementor and block/FSE editing are different systems — this build
> targets **Elementor Pro**, not the block editor, per the chosen workflow.

## What's in here

```
elementor/templates/*.json                  Importable Elementor page templates (native widgets)
elementor/README.md                          Elementor install + import guide + widget mapping
wp-content/themes/mokhetle-elementor-child/  Hello Elementor child theme (design system + overrides)
wp-content/themes/mokhetle-attorneys/        Classic custom theme (plugin-free fallback)
export/mokhetle-content.xml                  WordPress import file (all pages) — portable "DB"
export/setup.sh                              One-command install + real MySQL dump (via Docker)
docker-compose.yml                           Local WordPress + MariaDB stack
docs/                                        Strategy, sitemap, content gaps, tech-stack (from the brief)
reference/static-prototype/                  The original static HTML prototype, for reference/diffing
```

## The theme

A **classic custom theme** (per the tech-stack recommendation in `docs/06-tech-stack.md` —
a custom theme, not a page builder). Highlights:

- **Faithful markup.** The shared design-system CSS and behaviour JS are lifted verbatim
  from the prototype into `assets/`. Each page's content is a page template
  (`front-page.php`, `template-*.php`).
- **Self-seeding.** On activation the theme **creates every page**, assigns the correct
  template, builds the primary menu, and sets the static front page — so a fresh WordPress
  install shows the finished site with **no manual setup or import**. (See
  `inc/theme-setup.php`. It's idempotent — re-activating never duplicates pages.)
- **Editable contact details.** Phone, email, address, hours, WhatsApp link and registration
  number are exposed under **Appearance → Customize → Firm Contact Details**
  (`inc/customizer.php`), so the details flagged in `docs/05-content-gaps.md` can be
  confirmed in one place.
- **Real permalinks.** All internal links resolve through `mok_url()` to WordPress
  permalinks, so nothing depends on the old `.html` filenames or the install location.

### Pages shipped

Home · About the Firm · Practice Areas · Personal Injury & RAF Claims ·
Forensic Investigations & Legal Audits · Correspondent Attorney Services ·
AI Legal Assistant · Secure Client Portal · Contact Us

The AI Legal Assistant is the prototype's **front-end-only simulated** intake flow (no real
AI, no data stored) and the Client Portal is a **static visual mockup** — both are marked as
such in-page and in `docs/05-content-gaps.md`. They are demonstrations, not working systems.

## Install it — three ways

**A. Drop-in theme (simplest).** Copy `wp-content/themes/mokhetle-attorneys/` into any
WordPress install and activate it (Appearance → Themes). The activation routine builds all
pages, the menu and the front page for you. Set permalinks to "Post name" under
Settings → Permalinks.

**B. Run the whole stack locally with Docker.** From the repo root:

```bash
docker compose up -d
./export/setup.sh
```

This installs WordPress, activates the theme, and writes a **real MySQL dump** to
`export/mokhetle-db.sql`. Then open <http://localhost:8080> (admin: `admin` / `mokhetle-admin`).

**C. Import the content into an existing site.** Activate the theme, then
Tools → Import → WordPress and upload `export/mokhetle-content.xml`. (Activation already
creates the pages, so this is only needed if you're importing into a site where the theme
is managed separately.)

## Still required before go-live

See `docs/05-content-gaps.md` for the full list. In short: the real firm **logo**, a
**director photograph** and any **team photos**, **site photography**, a confirmed
**institutional client list with permission to disclose**, the **POPIA notice** and
**Website Terms** copy, and the **WhatsApp Business number**. Confirm the contact details
(address, phone, email, registration number) in the Customizer before publishing.

## Notes

- Requires WordPress 6.0+ and PHP 7.4+.
- No build step, no framework, no page-builder dependency — plain PHP/CSS/vanilla JS.
- The theme's templates were rendered and screenshot-verified against the approved
  Homepage 2 concept during conversion.
