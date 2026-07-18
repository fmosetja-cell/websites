<?php
/**
 * Template Name: Mokhetle — AI Legal Assistant
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / AI Legal Assistant</div>

  <section class="inner-hero">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Mokhetle Legal Assistant</span>
        <h1>Start Your Matter Intelligently</h1>
        <p>The assistant below asks a short series of questions to understand who you are and what your matter involves, then routes it to the right department. It supports individuals, businesses, instructing attorneys, and municipal or government institutions, with dedicated question sets for Road Accident Fund claims, medical negligence, labour matters, municipal instructions and correspondent instructions.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="demo-flag" style="max-width:640px; margin:0 auto 20px;">This is a functional front-end demonstration using simulated, scripted responses. No AI model is called, no data is transmitted, and nothing typed here is stored anywhere.</div>
      <div class="assistant-panel" style="max-width:640px; margin:0 auto;" data-assistant>
        <div class="chat-window"></div>
        <div class="chat-input-row"><input type="text" placeholder="Type your answer…" disabled><button type="button">Send</button></div>
        <p class="disclaimer">The information provided by this assistant is general in nature and does not constitute legal advice. An attorney-client relationship is only created after the firm formally accepts an instruction.</p>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Capabilities</span>
        <h2>What the Assistant Can Do</h2>
      </div>
      <div class="check-grid">
        <div class="check-item"><span class="tick">✓</span> Intelligent practice-area routing</div>
        <div class="check-item"><span class="tick">✓</span> Preliminary conflict-check data capture</div>
        <div class="check-item"><span class="tick">✓</span> Matter-reference generation</div>
        <div class="check-item"><span class="tick">✓</span> Secure document upload (future)</div>
        <div class="check-item"><span class="tick">✓</span> Automatic email acknowledgements (future)</div>
        <div class="check-item"><span class="tick">✓</span> Attorney notification workflows (future)</div>
        <div class="check-item"><span class="tick">✓</span> Enquiry-status tracking (future)</div>
        <div class="check-item"><span class="tick">✓</span> WhatsApp integration (future)</div>
        <div class="check-item"><span class="tick">✓</span> Human handover at any stage</div>
        <div class="check-item"><span class="tick">✓</span> Multilingual support (future)</div>
      </div>
    </div>
  </section>

  <section class="band-dark">
    <div class="container min-statement" style="max-width:720px; margin:0 auto; text-align:center;">
      <span class="eyebrow" style="color:var(--bronze);">What the Assistant Will Never Do</span>
      <h2 style="color:var(--white);">No Guarantees. No Advice. No Shortcuts.</h2>
      <p>The assistant will never guarantee a legal outcome, estimate compensation as a confirmed amount, provide a definitive legal opinion, create an attorney-client relationship automatically, make a decision without attorney review, or expose confidential client information. Every enquiry is reviewed by a Mokhetle Attorneys Inc. attorney before it is treated as accepted.</p>
    </div>
  </section>
</main>
<?php
get_footer();
