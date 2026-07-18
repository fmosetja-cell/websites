# Mokhetle Attorneys Inc. — Website Strategy (Phase 1)

## Source-of-truth note

Two source documents were provided for this project: a detailed written brief (firm facts, practice areas, AI architecture) and a screenshot of an existing homepage design. The two disagreed on several factual points — physical address, phone number, director identity, team composition, and institutional client names. Per instruction from the firm, **the written brief is treated as the accurate source for all firm facts** in this phase (address: 18 Havenga Street, Golfview, Mahikeng; director: Edgeworth Mokhetle; registration number 2014/230750/21, etc.). The screenshot has been used only as a loose visual/layout reference, not as a source of facts.

Two items from the written brief could not be populated because no supporting detail was supplied, and per the brief's own instruction ("do not invent... attorneys... client testimonials") they have been left as placeholders rather than fabricated:

- **Team members other than the director.** No associates, candidate attorneys, or support staff were named in the brief. The "Our Team" pattern is designed but populated with role placeholders, not invented names or photos.
- **Named institutional clients.** The brief describes categories of institutional experience (municipal investigations, public-sector advisory, forensic audits, etc.) but supplies no specific client names, and explicitly requires permission confirmation before publishing any client relationship. The "Selected Experience" section is built to display named clients once the firm confirms both the names and permission to disclose them; it currently shows category descriptions only.

Every other page of unconfirmed or judgment-call content is flagged in `05-content-gaps.md`.

## Positioning

Mokhetle Attorneys Inc. is positioned as an established (since 2014), technologically capable South African law firm serving both private clients and public-sector/institutional clients from Mahikeng. The core differentiators, per the brief, are:

1. **Breadth with depth** — personal injury/RAF and medical negligence work sits alongside civil litigation, labour law, municipal/public-sector advisory, commercial/corporate law, and forensic investigations. Few firms in the region credibly span both plaintiff personal-injury work and institutional governance/forensic work; this breadth is the headline differentiator.
2. **Institutional trust** — the firm's public-sector and municipal advisory experience (governance, by-laws, compliance, forensic audits) signals a firm that public institutions can rely on for sensitive, high-scrutiny work.
3. **Geographic advantage** — proximity to the North West Division of the High Court in Mahikeng makes correspondent-attorney work a genuine, defensible service line, not an afterthought.
4. **Technology-enabled access** — an AI-assisted intake flow and (future) secure client portal reduce friction for first contact and give the firm a modern, responsive image without overstating what AI can do (the brief is explicit that AI must never replace attorney judgement).

## Tone of voice

Professional South African English; confident but not boastful. Language draws from the brief's approved vocabulary (experienced, responsive, strategic, client-focused, confidential, results-oriented, technology-enabled) and avoids the disallowed superlatives (best, guaranteed, always win, instant compensation, no-risk).

## Information architecture priorities

- Practice areas need a two-level structure: a practice-area overview page, plus dedicated pages for the two service lines with the most public search demand and richest intake flows (Personal Injury/RAF and Medical Negligence are combined under one lead practice area in the mega menu per the brief's structure, but RAF has its own detailed intake flow given its transactional nature).
- Correspondent Attorney Services and Forensic Investigations are elevated to top-level navigation items (not buried under "Practice Areas") because they serve a different buyer (instructing attorneys; audit committees/institutions) who need to find these services fast.
- The AI Legal Assistant and Client Portal are both surfaced from the homepage and from the main navigation, since they are stated product differentiators, but both carry persistent disclaimers that they are administrative/preliminary tools, not legal advice or a substitute for attorney engagement.

## What this phase delivers vs. what comes next

This phase delivers strategy, sitemap, content hierarchy, five homepage design concepts, mockups for the eight priority inner pages, a working static HTML/CSS/JS prototype (no build tooling), a simulated (non-AI-backed) front-end demonstration of the intake flow, a technology-stack recommendation, and a content/approvals checklist. It does **not** yet include: the remaining practice-area sub-pages beyond the one worked example, a real AI/LLM integration, a real client-portal backend, WordPress/Elementor conversion, or final photography. Those follow once a homepage concept is chosen.
