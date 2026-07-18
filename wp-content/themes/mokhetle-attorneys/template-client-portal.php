<?php
/**
 * Template Name: Mokhetle — Client Portal
 *
 * Converted from the approved static prototype (Homepage 2 design system).
 *
 * @package Mokhetle_Attorneys
 */

get_header();
?>
<main id="main">
<div class="container breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> / Secure Client Portal</div>

  <section class="inner-hero">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Secure Client Portal — Concept Preview</span>
        <h1>Secure. Convenient. Connected.</h1>
        <p>The portal below is a visual concept for a future secure client portal. It is not a working system, requires no login, and every name, matter and figure shown is placeholder data — no real client information has been used.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="demo-flag" style="max-width:900px; margin:0 auto 24px;">Concept preview only — dummy data. No login is required and no real client information is displayed.</div>

      <div class="portal-shell" style="max-width:960px; margin:0 auto;">
        <div class="portal-topbar">
          <span>Mokhetle Client Portal</span>
          <span>Signed in as: Demo Client — <a href="#" style="color:var(--silver-light); text-decoration:underline;">Log out</a></span>
        </div>
        <div class="portal-body">
          <ul class="portal-nav">
            <li class="active">Dashboard</li>
            <li>My Matters</li>
            <li>Documents</li>
            <li>Messages</li>
            <li>Payments &amp; Invoices</li>
            <li>Consultation History</li>
            <li>Profile &amp; Consent</li>
          </ul>
          <div class="portal-main">
            <div class="portal-stat-row">
              <div class="portal-stat"><b>2</b><span>Active Matters</span></div>
              <div class="portal-stat"><b>7</b><span>Documents on File</span></div>
              <div class="portal-stat"><b>1</b><span>Unread Message</span></div>
            </div>
            <h3>Recent Activity</h3>
            <table class="portal-table">
              <thead><tr><th>Date</th><th>Matter</th><th>Update</th><th>Status</th></tr></thead>
              <tbody>
                <tr><td>12 Jul 2026</td><td>Ref: MOK-2026-1042 (Sample)</td><td>Document uploaded by attorney</td><td><span class="tag done">Reviewed</span></td></tr>
                <tr><td>05 Jul 2026</td><td>Ref: MOK-2026-0988 (Sample)</td><td>Matter status updated</td><td><span class="tag">In progress</span></td></tr>
                <tr><td>28 Jun 2026</td><td>Ref: MOK-2026-1042 (Sample)</td><td>Consultation completed</td><td><span class="tag done">Complete</span></td></tr>
              </tbody>
            </table>
            <h3 style="margin-top:24px;">Outstanding Document Checklist</h3>
            <div class="check-grid">
              <div class="check-item"><span class="tick">☐</span> Certified copy of ID document (sample)</div>
              <div class="check-item"><span class="tick">☐</span> Proof of address (sample)</div>
              <div class="check-item"><span class="tick">✓</span> Signed POPIA consent form (sample)</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="tag-band">
    <div class="container">
      <div class="section-head center">
        <span class="eyebrow">Planned Features</span>
        <h2>What the Portal Will Offer</h2>
      </div>
      <div class="check-grid">
        <div class="check-item"><span class="tick">✓</span> Secure login</div>
        <div class="check-item"><span class="tick">✓</span> Matter status tracking</div>
        <div class="check-item"><span class="tick">✓</span> Upcoming appointments &amp; court dates</div>
        <div class="check-item"><span class="tick">✓</span> Document upload and download</div>
        <div class="check-item"><span class="tick">✓</span> Secure messaging</div>
        <div class="check-item"><span class="tick">✓</span> Requests for information</div>
        <div class="check-item"><span class="tick">✓</span> Outstanding document checklist</div>
        <div class="check-item"><span class="tick">✓</span> Invoices and statements</div>
        <div class="check-item"><span class="tick">✓</span> Consultation history</div>
        <div class="check-item"><span class="tick">✓</span> Notifications</div>
        <div class="check-item"><span class="tick">✓</span> POPIA consent records</div>
      </div>
      <p class="confirm-note">The portal is a future engineering project, scoped separately from this website design phase — see the technology-stack recommendation for detail.</p>
    </div>
  </section>
</main>
<?php
get_footer();
