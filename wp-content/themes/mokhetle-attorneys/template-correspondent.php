<?php
/**
 * Template Name: Mokhetle — Correspondent Services
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / <a href="<?php echo esc_url( mok_url('practice-areas') ); ?>">Practice Areas</a> / Correspondent Attorney Services</div>

  <section class="inner-hero">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">Correspondent Attorney Services</span>
        <h1>Local Support for High Court Matters in Mahikeng</h1>
        <p>Mokhetle Attorneys Inc. is conveniently located near the North West Division of the High Court in Mahikeng, and regularly assists instructing attorneys from other regions with correspondent work. We understand that a reliable local correspondent is essential to keeping matters on track — our team is set up to respond quickly to instructions and to keep instructing attorneys informed at every step.</p>
        <a class="btn btn-primary" href="#instruction-form">Submit a Correspondent Instruction</a>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="check-grid">
        <div class="check-item"><span class="tick">✓</span> Filing and issuing court documents</div>
        <div class="check-item"><span class="tick">✓</span> Court appearances</div>
        <div class="check-item"><span class="tick">✓</span> Service of legal documents</div>
        <div class="check-item"><span class="tick">✓</span> Matter monitoring</div>
        <div class="check-item"><span class="tick">✓</span> Local procedural support</div>
        <div class="check-item"><span class="tick">✓</span> Urgent High Court instructions</div>
      </div>
    </div>
  </section>

  <section id="instruction-form" class="tag-band">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Submit an Instruction</span>
        <h2>Correspondent Instruction Form</h2>
        <p>Please provide the details below so we can action your instruction promptly. This is a prototype form — no instruction is actually transmitted.</p>
      </div>
      <form data-demo-form style="max-width:760px; margin:0 auto;">
        <div class="form-grid">
          <div class="field"><label for="ia">Instructing Attorney</label><input id="ia" required></div>
          <div class="field"><label for="firm">Law Firm</label><input id="firm" required></div>
          <div class="field"><label for="court">Court &amp; Division</label><input id="court" placeholder="e.g. North West Division, Mahikeng"></div>
          <div class="field"><label for="caseno">Case Number</label><input id="caseno"></div>
          <div class="field full"><label for="parties">Parties</label><input id="parties" placeholder="e.g. A obo Minor v Road Accident Fund"></div>
          <div class="field"><label for="naturef">Nature of Instruction</label>
            <select id="naturef"><option>Filing of documents</option><option>Court appearance</option><option>Service of documents</option><option>Matter monitoring</option><option>Urgent application</option></select>
          </div>
          <div class="field"><label for="apptdate">Appearance / Filing Date</label><input id="apptdate" type="date"></div>
          <div class="field full"><label for="docs">Documents Requiring Filing or Service</label><textarea id="docs" rows="3"></textarea></div>
          <div class="field full"><button class="btn btn-primary" type="submit">Submit Instruction →</button></div>
          <div class="form-msg full"></div>
        </div>
      </form>
    </div>
  </section>
</main>
<?php
get_footer();
