# Recommended Technology Stack

## Phase 1 (this deliverable)
Static semantic HTML5, modern CSS (custom properties, Grid/Flexbox, no CSS framework), and lightweight vanilla JavaScript (no framework) for interactivity — nav toggle, FAQ accordion, sticky buttons, and the simulated AI intake flow. This keeps the prototype fast, dependency-free, and trivially portable into any CMS later.

## Recommended production stack
- **CMS**: WordPress (Advanced Custom Fields + a custom block theme, not a page-builder like Elementor) if the firm wants in-house content editing without a developer; alternatively a headless CMS (e.g. a Git-based CMS or a small headless service) paired with a static-site generator if long-term maintainability and performance matter more than in-house editing ease. Given the brief's explicit "future WordPress or headless CMS conversion" note, either path is compatible with this HTML/CSS structure since components were built to be reusable and content-first.
- **Hosting**: Any South Africa-aware CDN-backed host (e.g. a provider with a Johannesburg/Cape Town edge or at minimum strong African routing) to keep load times reasonable on mobile data connections, per the brief's requirement.
- **Forms & enquiry routing**: A form backend with server-side validation and spam protection, emailing enquiries to the firm and, if desired, logging to a lightweight database or CRM for the "enquiry-status tracking" feature described in the brief.
- **AI Legal Assistant (future real version)**: A rules-first triage flow (as prototyped) backed by a language model only for free-text summarisation/classification, never for legal conclusions — with a mandatory human-attorney review step before any enquiry is treated as accepted. All AI outputs stored and logged for POPIA accountability; no AI response should be presented to a user as legal advice.
- **Secure Client Portal (future)**: Standard authenticated web-app patterns (e.g. server-rendered or SPA + API, with role-based access control), document storage with encryption at rest, and audit logging for POPIA consent records. This is a separate, larger engineering project from the marketing site and should be scoped independently once the firm confirms appetite and budget.
- **Analytics & SEO**: Privacy-conscious analytics (cookie-consent gated), structured data (LegalService/Attorney schema, FAQPage schema, LocalBusiness schema) as already reflected in the page markup groundwork.

## What was deliberately avoided
No heavy JS frameworks (React/Vue/Angular) were used for the prototype — the brief asks for lightweight, maintainable, non-heavy tooling, and a production CMS build is a separate decision from this design-review phase.
