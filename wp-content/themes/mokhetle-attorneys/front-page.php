<?php
/**
 * Front page — Mokhetle Attorneys Inc. (Homepage 2 "Modern Approachable" design).
 *
 * Converted from the approved static prototype.
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<style>
/* Concept 2 — Modern Approachable: warm, rounded, friendly.
     Hero now matches the Selected Institutional Experience band (charcoal). */
  .hero-approachable{
    background:var(--charcoal); color:var(--silver-light);
    padding:112px 0 96px; position:relative; overflow:hidden;
  }
  .hero-approachable::before{
    content:""; position:absolute; width:560px; height:560px; border-radius:50%;
    background:radial-gradient(circle at 32% 32%, rgba(168,131,79,.3), rgba(168,131,79,0) 68%);
    top:-230px; right:-170px;
  }
  .hero-approachable::after{
    content:""; position:absolute; width:360px; height:360px; border-radius:50%;
    background:radial-gradient(circle, rgba(255,255,255,.06), rgba(255,255,255,0) 70%);
    bottom:-180px; left:-120px;
  }
  .hero-approachable h1{ color:var(--white); }
  .hero-approachable .eyebrow{ color:var(--bronze); }
  .hero-approachable .btn-outline{ border-color:rgba(255,255,255,.5); color:var(--white); }
  .hero-approachable .btn-outline:hover{ background:rgba(255,255,255,.12); border-color:rgba(255,255,255,.5); }
  .hero-approachable .portrait-frame{
    border-radius:var(--radius-lg); position:relative; z-index:2;
    background:rgba(255,255,255,.06); border-color:rgba(255,255,255,.25); color:var(--silver-light);
  }
  .pillar{ border-radius:var(--radius-lg); }
  .practice-card{ border-radius:var(--radius-lg); }
  .practice-card .num{ background:var(--beige); width:38px; height:38px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:1.1rem; }
  .experience-card{ border-radius:var(--radius-lg); }
  .assistant-panel{ border-radius:var(--radius-lg); }

  /* Seam divider so the hero reads as its own band above the beige page background */
  #intro{ padding-top:64px; }
  #intro .section-head{ position:relative; }
</style>
<main id="main">
<section class="hero-approachable hero hero-seam">
    <div class="container hero-grid">
      <div>
        <span class="eyebrow">Mokhetle Attorneys Inc. · Since 2014</span>
        <h1>Experienced Legal Counsel. Strategic Solutions. Trusted Representation.</h1>
        <p class="lead" style="max-width:520px; color:var(--silver-light);">We provide responsive legal representation, advisory services, forensic investigations and dispute-resolution solutions to individuals, businesses and public-sector institutions.</p>
        <div class="hero-ctas">
          <a class="btn btn-primary" href="<?php echo esc_url( mok_url('contact') ); ?>">Speak to an Attorney</a>
          <a class="btn btn-outline" href="<?php echo esc_url( mok_url('ai-legal-assistant') ); ?>">Start a Secure Enquiry</a>
        </div>
        <div class="hero-ctas-secondary">
          <a href="<?php echo esc_url( mok_url('practice-areas') ); ?>">Explore Our Services →</a>
          <a href="<?php echo esc_url( mok_url('correspondent-attorney-services') ); ?>">Correspondent Instructions →</a>
        </div>
      </div>
      <div class="portrait-frame">Firm exterior / consultation-setting photography to be supplied by the firm</div>
    </div>
  </section>

  <section id="intro">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Who We Are</span>
        <h2>Accessible. Efficient. Responsive. Technologically Sophisticated.</h2>
        <p>Mokhetle Attorneys Inc. delivers intelligent, solution-driven legal services to individuals, businesses, municipalities and government institutions, with professionalism, integrity and purpose.</p>
      </div>
      <div class="pillars">
        <div class="pillar"><div class="icon">◆</div><h3>Client-Centred</h3><p>We listen, we understand, we deliver.</p></div>
        <div class="pillar"><div class="icon">◇</div><h3>Ethical &amp; Dependable</h3><p>Upholding the highest standards of professional conduct.</p></div>
        <div class="pillar"><div class="icon">▣</div><h3>Technology-Enabled</h3><p>AI-assisted intake for faster, more transparent service.</p></div>
        <div class="pillar"><div class="icon">▤</div><h3>Institutionally Trusted</h3><p>Proven experience across the public and private sectors.</p></div>
      </div>
    </div>
  </section>

  <section class="tag-band" id="practice-areas">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Our Practice Areas</span>
        <h2>Comprehensive Legal Solutions</h2>
      </div>
      <div class="practice-grid">
        <div class="practice-card"><span class="num">1</span><h3>Personal Injury &amp; Medical Negligence</h3><p>RAF claims, medical negligence claims and personal injury litigation.</p><a class="link" href="<?php echo esc_url( mok_url('personal-injury') ); ?>">Learn more →</a></div>
        <div class="practice-card"><span class="num">2</span><h3>Civil Litigation</h3><p>Urgent applications, High Court litigation, appeals and commercial disputes.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">3</span><h3>Labour &amp; Employment Law</h3><p>CCMA, Labour Court, disciplinary hearings and workplace investigations.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">4</span><h3>Municipal &amp; Public-Sector Law</h3><p>Advisory services, by-laws, governance and compliance.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">5</span><h3>Commercial &amp; Corporate Law</h3><p>Contracts, legal opinions, due diligence and governance advisory.</p><a class="link" href="#">Learn more →</a></div>
        <div class="practice-card"><span class="num">6</span><h3>Forensic Investigations</h3><p>Forensic audits, asset tracing and irregular expenditure reviews.</p><a class="link" href="<?php echo esc_url( mok_url('forensic-investigations') ); ?>">Learn more →</a></div>
        <div class="practice-card"><span class="num">7</span><h3>Correspondent Attorney Services</h3><p>Local support for High Court matters on behalf of instructing attorneys.</p><a class="link" href="<?php echo esc_url( mok_url('correspondent-attorney-services') ); ?>">Learn more →</a></div>
      </div>
    </div>
  </section>

  <section>
    <div class="container director-block">
      <div class="portrait-frame">Portrait of Edgeworth Mokhetle — to be supplied by the firm</div>
      <div>
        <span class="eyebrow">Our Director</span>
        <h2>Edgeworth Mokhetle</h2>
        <p style="color:var(--bronze-dark); font-weight:600; margin-bottom:14px;">B.Proc, LLB · Admitted Attorney of the High Court of South Africa (2000)</p>
        <p>Edgeworth Mokhetle is a seasoned legal practitioner admitted as an attorney of the High Court of South Africa in September 2000. He has served as a legal adviser and lectured in law, and brings extensive experience in personal injury, medical negligence, labour law and dispute resolution. He was formerly a partner of Kgomo, Mokhetle and Tlou Attorneys.</p>
        <a class="btn btn-outline btn-sm" href="<?php echo esc_url( mok_url('about') ); ?>">View Full Profile →</a>
      </div>
    </div>
  </section>

  <section class="band-dark" id="experience">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow" style="color:var(--bronze);">Selected Institutional Experience</span>
        <h2 style="color:var(--white);">Trusted by Institutions. Proven in Practice.</h2>
      </div>
      <div class="experience-grid">
        <div class="experience-card" style="background:rgba(255,255,255,.06);"><h3 style="color:var(--white);">Municipal &amp; Governance Advisory</h3><p>Policy, by-law and governance framework support for public-sector clients.</p></div>
        <div class="experience-card" style="background:rgba(255,255,255,.06);"><h3 style="color:var(--white);">Forensic &amp; Compliance Investigations</h3><p>Forensic audits into irregular expenditure, procurement and governance matters.</p></div>
        <div class="experience-card" style="background:rgba(255,255,255,.06);"><h3 style="color:var(--white);">Public-Sector Litigation</h3><p>High Court litigation on behalf of institutional clients.</p></div>
      </div>
      <p class="confirm-note">Specific client names are withheld pending confirmation of permission to disclose each relationship.</p>
    </div>
  </section>

  <section>
    <div class="container two-col">
      <div>
        <span class="eyebrow">Forensic Investigations &amp; Legal Audits</span>
        <h2>Uncover. Analyse. Resolve.</h2>
        <p>Our investigation and forensic auditing services assist institutions in detecting fraud, mitigating risk and strengthening governance through evidence-led insights and actionable recommendations.</p>
        <a class="btn btn-outline btn-sm" href="<?php echo esc_url( mok_url('forensic-investigations') ); ?>">View Capabilities →</a>
      </div>
      <div class="check-grid">
        <div class="check-item"><span class="tick">✓</span> Forensic investigations</div>
        <div class="check-item"><span class="tick">✓</span> Fraud risk assessments</div>
        <div class="check-item"><span class="tick">✓</span> Irregular expenditure reviews</div>
        <div class="check-item"><span class="tick">✓</span> Commissions of enquiry</div>
        <div class="check-item"><span class="tick">✓</span> Asset tracing and recovery</div>
        <div class="check-item"><span class="tick">✓</span> Procurement and governance investigations</div>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container">
      <div class="assistant-panel" style="max-width:640px; margin:0 auto; text-align:center;">
        <span class="eyebrow" style="color:var(--bronze);">AI-Powered Legal Intake</span>
        <h2 style="color:var(--white);">Start Your Matter Intelligently</h2>
        <p style="color:var(--silver-light);">The Mokhetle Legal Assistant guides you through a secure intake process and connects you with the right person at our firm.</p>
        <a class="btn btn-primary btn-sm" href="<?php echo esc_url( mok_url('ai-legal-assistant') ); ?>">Try the Assistant →</a>
        <p class="disclaimer">The information provided by this assistant is general in nature and does not constitute legal advice.</p>
      </div>
    </div>
  </section>

  <section id="faq">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Frequently Asked Questions</span>
        <h2>Common Questions, Answered</h2>
      </div>
      <div style="max-width:760px; margin:0 auto;">
        <div class="faq-item open">
          <button class="faq-q">Does Mokhetle Attorneys Inc. handle Road Accident Fund claims? <span class="plus">+</span></button>
          <div class="faq-a"><p>Yes. Our personal injury practice assists with Road Accident Fund and third-party motor vehicle accident claims, assessed on their own facts and merits.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Can you act as correspondent attorney in Mahikeng? <span class="plus">+</span></button>
          <div class="faq-a"><p>Yes. Given our proximity to the North West Division of the High Court, we assist instructing attorneys with filing, service and local appearances.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Do you assist municipalities and government institutions? <span class="plus">+</span></button>
          <div class="faq-a"><p>Yes, across advisory, governance, compliance and forensic investigation work.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q">Is my information kept confidential? <span class="plus">+</span></button>
          <div class="faq-a"><p>Yes, in line with our POPIA obligations and legal professional privilege.</p></div>
        </div>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container two-col">
      <div>
        <span class="eyebrow">Get In Touch</span>
        <h2>We're Here to Help</h2>
        <p>📞 <a href="tel:+27183812910">(018) 381 2910/1</a><br>
        ✉️ <a href="mailto:info@mokhetleinc.co.za">info@mokhetleinc.co.za</a><br>
        📍 18 Havenga Street, Golfview, Mahikeng, 2745<br>
        🕐 Mon–Fri: 08:00–17:00</p>
        <div class="badge-row"><span class="badge">Registration No. 2014/230750/21</span></div>
      </div>
      <form data-demo-form>
        <div class="form-grid">
          <div class="field"><label for="name2">Full Name</label><input id="name2" required></div>
          <div class="field"><label for="email2">Email Address</label><input id="email2" type="email" required></div>
          <div class="field"><label for="phone2">Phone Number</label><input id="phone2" type="tel"></div>
          <div class="field"><label for="topic2">How can we help you?</label>
            <select id="topic2"><option>Personal Injury / RAF</option><option>Medical Negligence</option><option>Civil Litigation</option><option>Labour Matter</option><option>Municipal / Public Sector</option><option>Commercial / Corporate</option><option>Forensic Investigation</option><option>Correspondent Instruction</option></select>
          </div>
          <div class="field full"><label for="msg2">Your Message</label><textarea id="msg2" rows="4"></textarea></div>
          <div class="field full"><button class="btn btn-primary" type="submit">Submit Enquiry →</button></div>
          <div class="form-msg full"></div>
        </div>
      </form>
    </div>
  </section>

  <section style="text-align:center; background:var(--beige);">
    <div class="container">
      <h2>Ready to discuss your matter?</h2>
      <div class="hero-ctas" style="justify-content:center;">
        <a class="btn btn-primary" href="<?php echo esc_url( mok_url('contact') ); ?>">Speak to an Attorney</a>
        <a class="btn btn-outline" href="<?php echo esc_url( mok_url('ai-legal-assistant') ); ?>">Start a Secure Enquiry</a>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
