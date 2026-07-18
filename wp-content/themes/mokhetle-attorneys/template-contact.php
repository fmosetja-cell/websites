<?php
/**
 * Template Name: Mokhetle — Contact
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<style>
.map-placeholder{ background:var(--beige); border:1px dashed var(--silver); border-radius:var(--radius-md); height:280px; display:flex; align-items:center; justify-content:center; color:var(--charcoal-70); font-size:.85rem; text-align:center; padding:20px; }
</style>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / Contact Us</div>

  <section class="inner-hero">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Get In Touch</span>
        <h1>We're Here to Help</h1>
        <p>Whether you are an individual, a business, an instructing attorney, or a public institution, our team is ready to assist. Reach us directly using the details below, or submit an enquiry through the form or our AI Legal Assistant.</p>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container two-col">
      <div>
        <h3>Office Details</h3>
        <p>
          📞 <a href="tel:+27183812910">(018) 381 2910/1</a><br>
          ✉️ <a href="mailto:info@mokhetleinc.co.za">info@mokhetleinc.co.za</a><br>
          📍 18 Havenga Street, Golfview, Mahikeng, 2745<br>
          📮 P.O. Box 2843, Mahikeng, 2745<br>
          🕐 Monday–Friday: 08:00–17:00
        </p>
        <div class="badge-row"><span class="badge">Registration No. 2014/230750/21</span></div>
        <div class="map-placeholder" style="margin-top:20px;">Interactive map to be embedded here — 18 Havenga Street, Golfview, Mahikeng, 2745</div>
      </div>
      <form data-demo-form>
        <div class="form-grid">
          <div class="field"><label for="cname">Full Name</label><input id="cname" required></div>
          <div class="field"><label for="cemail">Email Address</label><input id="cemail" type="email" required></div>
          <div class="field"><label for="cphone">Phone Number</label><input id="cphone" type="tel"></div>
          <div class="field"><label for="ctopic">How can we help you?</label>
            <select id="ctopic"><option>Personal Injury / RAF</option><option>Medical Negligence</option><option>Civil Litigation</option><option>Labour Matter</option><option>Municipal / Public Sector</option><option>Commercial / Corporate</option><option>Forensic Investigation</option><option>Correspondent Instruction</option><option>General Enquiry</option></select>
          </div>
          <div class="field full"><label for="cmsg">Your Message</label><textarea id="cmsg" rows="5" required></textarea></div>
          <div class="field full"><label style="display:flex; align-items:flex-start; gap:8px; font-weight:400;"><input type="checkbox" style="width:auto;" required> I consent to Mokhetle Attorneys Inc. processing the information above in line with the POPIA Privacy Notice, for the purpose of responding to my enquiry.</label></div>
          <div class="field full"><button class="btn btn-primary" type="submit">Submit Enquiry →</button></div>
          <div class="form-msg full"></div>
        </div>
      </form>
    </div>
  </section>

  <section style="text-align:center;">
    <div class="container">
      <h2>Prefer a guided enquiry?</h2>
      <div class="hero-ctas" style="justify-content:center;">
        <a class="btn btn-primary" href="<?php echo esc_url( mok_url('ai-legal-assistant') ); ?>">Start with the AI Legal Assistant</a>
        <a class="btn btn-outline" href="https://wa.me/27000000000" target="_blank" rel="noopener">Message us on WhatsApp</a>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
