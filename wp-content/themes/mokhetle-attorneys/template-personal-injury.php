<?php
/**
 * Template Name: Mokhetle — Personal Injury & RAF
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / <a href="<?php echo esc_url( mok_url('practice-areas') ); ?>">Practice Areas</a> / Personal Injury &amp; RAF Claims</div>

  <section class="inner-hero">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Personal Injury &amp; Medical Negligence</span>
        <h1>Road Accident Fund &amp; Personal Injury Claims</h1>
        <p>Mokhetle Attorneys Inc. assists individuals who have been injured in motor vehicle accidents or as a result of medical negligence to pursue the compensation they are entitled to under South African law. Every matter is assessed on its own facts, evidence and merits — we do not estimate or guarantee compensation amounts before a proper assessment has been carried out.</p>
        <div class="hero-ctas"><a class="btn btn-primary" href="#raf-intake">Start Your RAF Enquiry</a><a class="btn btn-ghost-light" href="<?php echo esc_url( mok_url('contact') ); ?>">Speak to an Attorney</a></div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="check-grid">
        <div class="check-item"><span class="tick">✓</span> Road Accident Fund claims</div>
        <div class="check-item"><span class="tick">✓</span> Third-party motor vehicle accident claims</div>
        <div class="check-item"><span class="tick">✓</span> Medical negligence claims</div>
        <div class="check-item"><span class="tick">✓</span> Personal injury litigation</div>
        <div class="check-item"><span class="tick">✓</span> Assessment and management of damages claims</div>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">What to Expect</span>
        <h2>How a Road Accident Fund Claim Typically Proceeds</h2>
      </div>
      <div class="practice-grid" style="grid-template-columns:repeat(4,1fr);">
        <div class="practice-card"><span class="num">1</span><h3>Initial Consultation</h3><p>We gather the facts of the accident, your injuries, and any documentation already available.</p></div>
        <div class="practice-card"><span class="num">2</span><h3>Investigation &amp; Documentation</h3><p>Collection of medical records, police reports and supporting evidence to build the claim.</p></div>
        <div class="practice-card"><span class="num">3</span><h3>Submission &amp; Negotiation</h3><p>Lodging the claim and engaging with the Road Accident Fund on your behalf.</p></div>
        <div class="practice-card"><span class="num">4</span><h3>Resolution</h3><p>Settlement negotiation or, where necessary, litigation to bring the matter to a conclusion.</p></div>
      </div>
    </div>
  </section>

  <section id="raf-intake">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">AI-Assisted RAF Intake</span>
        <h2>Start Your Road Accident Fund Enquiry</h2>
        <p>The assistant below will ask a short set of questions specific to Road Accident Fund and personal injury matters. This is a simulated, front-end-only demonstration — no information is transmitted or stored.</p>
      </div>
      <div class="assistant-panel" style="max-width:640px; margin:0 auto;" data-assistant>
        <div class="chat-window"></div>
        <div class="chat-input-row"><input type="text" placeholder="Type your answer…" disabled><button type="button">Send</button></div>
        <p class="disclaimer">The information provided by this assistant is general in nature and does not constitute legal advice. An attorney-client relationship is only created after the firm formally accepts an instruction.</p>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
