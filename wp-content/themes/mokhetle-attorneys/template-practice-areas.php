<?php
/**
 * Template Name: Mokhetle — Practice Areas
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<style>
.filter-row{ display:flex; gap:10px; flex-wrap:wrap; margin-bottom:32px; }
  .filter-row button{ background:var(--white); border:1px solid var(--silver); border-radius:999px; padding:8px 16px; font-size:.82rem; font-family:var(--font-sans); font-weight:600; cursor:pointer; color:var(--charcoal); }
  .filter-row button.active, .filter-row button:hover{ background:var(--bronze); color:var(--white); border-color:var(--bronze); }
</style>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / Practice Areas</div>
  <section class="inner-hero">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Our Practice Areas</span>
        <h1>Comprehensive Legal Solutions</h1>
        <p>Mokhetle Attorneys Inc. advises and represents individuals, businesses and public-sector institutions across seven core practice areas. Use the filters below to find the service line relevant to your matter.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="filter-row">
        <button class="active">All</button><button>Individuals</button><button>Business</button><button>Municipal &amp; Public Sector</button><button>Instructing Attorneys</button>
      </div>
      <div class="practice-grid">
        <div class="practice-card"><span class="num">1</span><h3>Personal Injury &amp; Medical Negligence</h3><p>Road Accident Fund claims, third-party motor vehicle claims, medical negligence claims, and personal injury litigation, including assessment and management of damages claims.</p><a class="link" href="<?php echo esc_url( mok_url('personal-injury') ); ?>">Learn more →</a></div>
        <div class="practice-card"><span class="num">2</span><h3>Civil Litigation</h3><p>Urgent and semi-urgent applications, High Court litigation, civil appeals and reviews, insolvency proceedings, commercial litigation and general dispute resolution.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">3</span><h3>Labour &amp; Employment Law</h3><p>CCMA and bargaining council matters, Labour Court matters, mediation and arbitration, disciplinary hearings, workplace investigations and labour-law advisory and training.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">4</span><h3>Municipal &amp; Public-Sector Law</h3><p>Municipal legal advisory services, drafting and review of policies and by-laws, delegation-of-powers frameworks, service-level agreements, lease agreements and property disputes.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">5</span><h3>Commercial &amp; Corporate Law</h3><p>Commercial contracts, legal opinions, commercial transactions, legal due diligence, property and asset-register advisory, contract review and corporate governance advisory.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">6</span><h3>Forensic Investigations &amp; Legal Audits</h3><p>Forensic and legal audits, commissions of enquiry, asset tracing and recovery, and investigation of irregular expenditure, procurement and governance matters.</p><a class="link" href="<?php echo esc_url( mok_url('forensic-investigations') ); ?>">Learn more →</a></div>
        <div class="practice-card"><span class="num">7</span><h3>Correspondent Attorney Services</h3><p>Filing and issuing of court documents, court appearances, service of legal documents, matter monitoring and urgent High Court instructions in Mahikeng.</p><a class="link" href="<?php echo esc_url( mok_url('correspondent-attorney-services') ); ?>">Learn more →</a></div>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container two-col">
      <div>
        <span class="eyebrow">Not Sure Where to Start?</span>
        <h2>Let Our AI Legal Assistant Help</h2>
        <p>The Mokhetle Legal Assistant can ask a few brief questions and route your enquiry to the right practice area and the right person at our firm.</p>
        <a class="btn btn-primary btn-sm" href="<?php echo esc_url( mok_url('ai-legal-assistant') ); ?>">Start a Secure Enquiry →</a>
      </div>
      <div>
        <span class="eyebrow">Prefer to Speak Directly?</span>
        <h2>Contact Our Team</h2>
        <p>📞 <a href="tel:+27183812910">(018) 381 2910/1</a> &nbsp; ✉️ <a href="mailto:info@mokhetleinc.co.za">info@mokhetleinc.co.za</a></p>
        <a class="btn btn-outline btn-sm" href="<?php echo esc_url( mok_url('contact') ); ?>">Contact Us →</a>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
