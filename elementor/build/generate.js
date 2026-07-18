/* =========================================================================
   Elementor template generator — Mokhetle Attorneys Inc.
   Emits importable Elementor page templates (native widgets + design-system
   CSS classes) into /home/user/websites/elementor/templates/.
   Schema: Elementor export v0.4 (section / column / widget).
   ========================================================================= */
const fs = require('fs');
const OUT = require("path").resolve(__dirname, "../templates");
fs.mkdirSync(OUT, { recursive: true });

const BLOCKS = __dirname + "/blocks";
const portalShell = fs.readFileSync(BLOCKS + '/portal-shell.html', 'utf8');
const portalFlag  = fs.readFileSync(BLOCKS + '/portal-flag.html', 'utf8');

const U = {
  home: '/', about: '/about/', practice: '/practice-areas/', pi: '/personal-injury/',
  forensic: '/forensic-investigations/', corr: '/correspondent-attorney-services/',
  ai: '/ai-legal-assistant/', portal: '/client-portal/', contact: '/contact/',
};

// ---- id generator (unique 7-char ids) ----
let _id = 0;
const nid = () => 'mok' + ('0000' + (++_id).toString(16)).slice(-4);

// ---- element builders ----
const widget = (widgetType, settings) => ({ id: nid(), elType: 'widget', settings, elements: [], widgetType });

function section(opts) {
  const { classes = '', structure = '10', contentWidth = 'boxed', bg = null, padTop = 88, padBottom = 88, elements = [] } = opts;
  const s = { structure, content_width: contentWidth, gap: 'default' };
  const cls = ('mok-band ' + classes).trim();
  s._css_classes = cls;
  s.padding = { unit: 'px', top: String(padTop), right: '0', bottom: String(padBottom), left: '0', isLinked: false };
  if (bg) { s.background_background = 'classic'; s.background_color = bg; }
  return { id: nid(), elType: 'section', settings: s, elements, isInner: false };
}
function innerSection(opts) { const sec = section(opts); sec.isInner = true; sec.settings._css_classes = ('mok-grid-row ' + (opts.classes || '')).trim(); sec.settings.padding = { unit: 'px', top: '0', right: '0', bottom: '0', left: '0', isLinked: true }; return sec; }

/* Build a wrapping-safe card grid: legacy Elementor sections do NOT wrap
   columns, so a grid of N cards is rendered as stacked inner-section rows of
   `per` columns each (empty columns pad the final row to keep alignment). */
function gridRows(cards, per, cardClass) {
  const rows = [];
  const size = Math.round(100 / per);
  const struct = per === 4 ? '40' : per === 3 ? '30' : '20';
  for (let i = 0; i < cards.length; i += per) {
    const slice = cards.slice(i, i + per);
    const cols = slice.map(c => column(size, [ iconbox(c[0], c[1], c[2], { classes: cardClass, link: c[3] }) ]));
    while (cols.length < per) cols.push(column(size, []));
    rows.push(innerSection({ structure: struct, elements: cols }));
  }
  return rows;
}
function cardBand(eyebrow, h2, p, cards, bandClass, bg, cardClass) {
  return [
    section({ classes: bandClass, bg, structure: '10', elements: [ sectionHead(eyebrow, h2, p) ] }),
    section({ classes: bandClass, bg, structure: '10', padTop: 0, padBottom: 88, elements: [ column(100, gridRows(cards, 4, cardClass)) ] }),
  ];
}

function column(size, elements = [], extra = {}) {
  return { id: nid(), elType: 'column', settings: Object.assign({ _column_size: size, _inline_size: null }, extra), elements, isInner: false };
}

const heading = (title, o = {}) => {
  const s = { title, header_size: o.size || 'h2' };
  if (o.classes) s._css_classes = o.classes;
  if (o.align) { s.align = o.align; }
  return widget('heading', s);
};
const text = (html, o = {}) => { const s = { editor: html }; if (o.classes) s._css_classes = o.classes; if (o.align) s.align = o.align; return widget('text-editor', s); };
const button = (t, url, o = {}) => {
  const s = { text: t, link: { url, is_external: '', nofollow: '' }, _css_classes: (o.classes || 'btn btn-primary') };
  if (o.align) s.align = o.align;
  s.button_type = ''; s.size = 'sm';
  return widget('button', s);
};
const iconbox = (icon, title, desc, o = {}) => {
  const lib = icon.startsWith('far ') ? 'fa-regular' : 'fa-solid';
  const s = { selected_icon: { value: icon, library: lib }, title_text: title, description_text: desc, position: o.position || 'top' };
  if (o.classes) s._css_classes = o.classes;
  if (o.link) s.link = { url: o.link, is_external: '', nofollow: '' };
  if (o.titleSize) s.title_size = o.titleSize;
  return widget('icon-box', s);
};
const htmlw = (html, o = {}) => { const s = { html }; if (o.classes) s._css_classes = o.classes; return widget('html', s); };
const spacer = (px) => widget('spacer', { space: { unit: 'px', size: px } });
const divider = () => widget('divider', {});
const iconlist = (items, o = {}) => {
  const s = { view: 'traditional', icon_list: items.map(t => ({ text: t, selected_icon: { value: 'fas fa-check', library: 'fa-solid' }, _id: nid().slice(3) })) };
  if (o.classes) s._css_classes = o.classes;
  if (o.cols === 2) { s._css_classes = ((o.classes || '') + ' mok-cols-2').trim(); }
  return widget('icon-list', s);
};
const accordion = (items, o = {}) => {
  const s = { tabs: items.map(it => ({ tab_title: it.q, tab_content: it.a, _id: nid().slice(3) })) };
  s._css_classes = (o.classes || 'mok-faq');
  return widget('accordion', s);
};

const sectionHead = (eyebrow, h2, p, center = true) => {
  const els = [ heading(eyebrow, { size: 'h6', classes: 'eyebrow' }), heading(h2, { size: 'h2' }) ];
  if (p) els.push(text('<p>' + p + '</p>'));
  return column(100, els, center ? { _css_classes: 'mok-center' } : {});
};

// ---- bespoke HTML blocks ----
const portraitFrame = (label) => htmlw('<div class="portrait-frame">' + label + '</div>');
const aiPanel = () => htmlw(
  '<div class="assistant-panel" data-assistant>\n' +
  '  <div class="chat-window"></div>\n' +
  '  <div class="chat-input-row">\n' +
  '    <input type="text" placeholder="Type your message&hellip;" aria-label="Your message" disabled>\n' +
  '    <button type="button">Send</button>\n' +
  '  </div>\n' +
  '  <p class="disclaimer">The information provided by this assistant is general in nature and does not constitute legal advice. An attorney-client relationship is only created after the firm formally accepts an instruction.</p>\n' +
  '</div>'
);
const contactForm = () => htmlw(
  '<form data-demo-form>\n' +
  '  <div class="form-grid">\n' +
  '    <div class="field"><label>Full Name</label><input required></div>\n' +
  '    <div class="field"><label>Email Address</label><input type="email" required></div>\n' +
  '    <div class="field"><label>Phone Number</label><input type="tel"></div>\n' +
  '    <div class="field"><label>How can we help you?</label><select><option>Personal Injury / RAF</option><option>Medical Negligence</option><option>Civil Litigation</option><option>Labour Matter</option><option>Municipal / Public Sector</option><option>Commercial / Corporate</option><option>Forensic Investigation</option><option>Correspondent Instruction</option><option>General Enquiry</option></select></div>\n' +
  '    <div class="field full"><label>Your Message</label><textarea rows="4"></textarea></div>\n' +
  '    <div class="field full"><label style="flex-direction:row;align-items:flex-start;gap:8px;font-weight:400;"><input type="checkbox" style="width:auto;margin-top:4px;"> I consent to Mokhetle Attorneys Inc. processing the information above in line with the POPIA Privacy Notice, for the purpose of responding to my enquiry.</label></div>\n' +
  '    <div class="field full"><button class="btn btn-primary" type="submit">Submit Enquiry &rarr;</button></div>\n' +
  '    <div class="form-msg full"></div>\n' +
  '  </div>\n' +
  '</form>'
);
const correspondentForm = () => htmlw(
  '<form data-demo-form>\n' +
  '  <div class="form-grid">\n' +
  '    <div class="field"><label>Instructing Attorney</label><input required></div>\n' +
  '    <div class="field"><label>Law Firm</label><input></div>\n' +
  '    <div class="field"><label>Court &amp; Division</label><input></div>\n' +
  '    <div class="field"><label>Case Number</label><input></div>\n' +
  '    <div class="field full"><label>Parties</label><input></div>\n' +
  '    <div class="field"><label>Nature of Instruction</label><select><option>Filing of documents</option><option>Court appearance</option><option>Service of documents</option><option>Matter monitoring</option><option>Urgent application</option></select></div>\n' +
  '    <div class="field"><label>Appearance / Filing Date</label><input type="date"></div>\n' +
  '    <div class="field full"><label>Documents Requiring Filing or Service</label><textarea rows="3"></textarea></div>\n' +
  '    <div class="field full"><button class="btn btn-primary" type="submit">Submit Instruction &rarr;</button></div>\n' +
  '    <div class="form-msg full"></div>\n' +
  '  </div>\n' +
  '</form>'
);

const innerHero = (eyebrow, h1, crumb) => section({
  classes: 'inner-hero', bg: '#2B2A28', padTop: 60, padBottom: 52, structure: '10',
  elements: [ column(100, [
    text('<a href="' + U.home + '">Home</a> / ' + crumb, { classes: 'breadcrumb' }),
    heading(eyebrow, { size: 'h6', classes: 'eyebrow' }),
    heading(h1, { size: 'h1' }),
  ]) ],
});

const ctaBand = () => section({
  classes: '', bg: '#F4EEE3', structure: '10',
  elements: [ column(100, [
    heading('Ready to discuss your matter?', { size: 'h2', align: 'center' }),
    htmlw('<div class="hero-ctas" style="justify-content:center;"><a class="btn btn-primary" href="' + U.contact + '">Speak to an Attorney</a> <a class="btn btn-outline" href="' + U.ai + '">Start a Secure Enquiry</a></div>'),
  ], { _css_classes: 'mok-center' }) ],
});

// ---- page wrapper ----
const page = (title, sections) => ({ content: sections, page_settings: [], version: '0.4', title, type: 'page' });

function write(name, obj) {
  const p = OUT + '/' + name + '.json';
  fs.writeFileSync(p, JSON.stringify(obj, null, 2));
  return p;
}

/* ========================= HOME (front page) ========================= */
const home = page('Mokhetle — Home', [
  // 1. Hero
  section({
    classes: 'hero-approachable', bg: '#2B2A28', structure: '20', padTop: 112, padBottom: 96,
    elements: [
      column(55, [
        heading('Mokhetle Attorneys Inc. · Since 2014', { size: 'h6', classes: 'eyebrow' }),
        heading('Experienced Legal Counsel. Strategic Solutions. Trusted Representation.', { size: 'h1' }),
        text('<p style="max-width:520px;">We provide responsive legal representation, advisory services, forensic investigations and dispute-resolution solutions to individuals, businesses and public-sector institutions.</p>'),
        htmlw('<div class="hero-ctas"><a class="btn btn-primary" href="' + U.contact + '">Speak to an Attorney</a> <a class="btn btn-outline" href="' + U.ai + '">Start a Secure Enquiry</a></div>' +
              '<div class="hero-ctas-secondary"><a href="' + U.practice + '">Explore Our Services &rarr;</a> <a href="' + U.corr + '">Correspondent Instructions &rarr;</a></div>'),
      ]),
      column(45, [ portraitFrame('Firm exterior / consultation-setting photography to be supplied by the firm') ]),
    ],
  }),
  // 2. Intro + pillars
  section({
    structure: '10',
    elements: [ sectionHead('Who We Are', 'Accessible. Efficient. Responsive. Technologically Sophisticated.',
      'Mokhetle Attorneys Inc. delivers intelligent, solution-driven legal services to individuals, businesses, municipalities and government institutions, with professionalism, integrity and purpose.') ],
  }),
  section({
    structure: '40', padTop: 0, padBottom: 88,
    elements: [
      column(25, [ iconbox('fas fa-handshake', 'Client-Centred', 'We listen, we understand, we deliver.', { classes: 'pillar' }) ]),
      column(25, [ iconbox('fas fa-scale-balanced', 'Ethical &amp; Dependable', 'Upholding the highest standards of professional conduct.', { classes: 'pillar' }) ]),
      column(25, [ iconbox('fas fa-microchip', 'Technology-Enabled', 'AI-assisted intake for faster, more transparent service.', { classes: 'pillar' }) ]),
      column(25, [ iconbox('fas fa-building-columns', 'Institutionally Trusted', 'Proven experience across the public and private sectors.', { classes: 'pillar' }) ]),
    ],
  }),
  // 3. Practice areas
  ...cardBand('Our Practice Areas', 'Comprehensive Legal Solutions', null, [
    ['fas fa-car-burst', 'Personal Injury &amp; Medical Negligence', 'RAF claims, medical negligence claims and personal injury litigation.', U.pi],
    ['fas fa-gavel', 'Civil Litigation', 'Urgent applications, High Court litigation, appeals and commercial disputes.', U.contact],
    ['fas fa-people-group', 'Labour &amp; Employment Law', 'CCMA, Labour Court, disciplinary hearings and workplace investigations.', U.contact],
    ['fas fa-landmark', 'Municipal &amp; Public-Sector Law', 'Advisory services, by-laws, governance and compliance.', U.contact],
    ['fas fa-file-signature', 'Commercial &amp; Corporate Law', 'Contracts, legal opinions, due diligence and governance advisory.', U.contact],
    ['fas fa-magnifying-glass-chart', 'Forensic Investigations', 'Forensic audits, asset tracing and irregular expenditure reviews.', U.forensic],
    ['fas fa-scale-unbalanced', 'Correspondent Attorney Services', 'Local support for High Court matters on behalf of instructing attorneys.', U.corr],
  ], 'tag-band', '#FFFFFF', 'practice-card'),
  // 4. Director
  section({
    structure: '20',
    elements: [
      column(40, [ portraitFrame('Portrait of Edgeworth Mokhetle — to be supplied by the firm') ]),
      column(60, [
        heading('Our Director', { size: 'h6', classes: 'eyebrow' }),
        heading('Edgeworth Mokhetle', { size: 'h2' }),
        text('<p style="color:var(--bronze-dark); font-weight:600;">B.Proc, LLB · Admitted Attorney of the High Court of South Africa (2000)</p>'),
        text('<p>Edgeworth Mokhetle is a seasoned legal practitioner admitted as an attorney of the High Court of South Africa in September 2000. He has served as a legal adviser and lectured in law, and brings extensive experience in personal injury, medical negligence, labour law and dispute resolution. He was formerly a partner of Kgomo, Mokhetle and Tlou Attorneys.</p>'),
        button('View Full Profile &rarr;', U.about, { classes: 'btn btn-outline btn-sm' }),
      ]),
    ],
  }),
  // 5. Selected experience (dark)
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', padBottom: 0, elements: [ column(100, [
    heading('Selected Institutional Experience', { size: 'h6', classes: 'eyebrow' }),
    heading('Trusted by Institutions. Proven in Practice.', { size: 'h2' }),
  ]) ] }),
  section({
    classes: 'band-dark', bg: '#2B2A28', structure: '30', padTop: 24,
    elements: [
      column(33, [ iconbox('fas fa-landmark-dome', 'Municipal &amp; Governance Advisory', 'Policy, by-law and governance framework support for public-sector clients.', { classes: 'experience-card' }) ]),
      column(33, [ iconbox('fas fa-file-shield', 'Forensic &amp; Compliance Investigations', 'Forensic audits into irregular expenditure, procurement and governance matters.', { classes: 'experience-card' }) ]),
      column(33, [ iconbox('fas fa-scale-balanced', 'Public-Sector Litigation', 'High Court litigation on behalf of institutional clients.', { classes: 'experience-card' }) ]),
    ],
  }),
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', padTop: 0, elements: [ column(100, [
    text('<p class="confirm-note">Specific client names are withheld pending confirmation of permission to disclose each relationship.</p>'),
  ]) ] }),
  // 6. Forensic two-col
  section({
    structure: '20',
    elements: [
      column(50, [
        heading('Forensic Investigations &amp; Legal Audits', { size: 'h6', classes: 'eyebrow' }),
        heading('Uncover. Analyse. Resolve.', { size: 'h2' }),
        text('<p>Our investigation and forensic auditing services assist institutions in detecting fraud, mitigating risk and strengthening governance through evidence-led insights and actionable recommendations.</p>'),
        button('View Capabilities &rarr;', U.forensic, { classes: 'btn btn-outline btn-sm' }),
      ]),
      column(50, [ iconlist(['Forensic investigations', 'Fraud risk assessments', 'Irregular expenditure reviews', 'Commissions of enquiry', 'Asset tracing and recovery', 'Procurement and governance investigations'], { cols: 2 }) ]),
    ],
  }),
  // 7. AI panel
  section({ classes: 'tag-band', bg: '#FFFFFF', structure: '10', elements: [ column(100, [
    htmlw('<div class="assistant-panel" style="max-width:640px; margin:0 auto; text-align:center;">' +
      '<span class="eyebrow" style="color:var(--bronze);">AI-Powered Legal Intake</span>' +
      '<h2 style="color:var(--white);">Start Your Matter Intelligently</h2>' +
      '<p style="color:var(--silver-light);">The Mokhetle Legal Assistant guides you through a secure intake process and connects you with the right person at our firm.</p>' +
      '<a class="btn btn-primary btn-sm" href="' + U.ai + '">Try the Assistant &rarr;</a>' +
      '<p class="disclaimer">The information provided by this assistant is general in nature and does not constitute legal advice.</p></div>'),
  ]) ] }),
  // 8. FAQ
  section({ structure: '10', elements: [ sectionHead('Frequently Asked Questions', 'Common Questions, Answered', null) ] }),
  section({ structure: '10', padTop: 0, elements: [ column(100, [ accordion([
    { q: 'Does Mokhetle Attorneys Inc. handle Road Accident Fund claims?', a: 'Yes. Our personal injury practice assists with Road Accident Fund and third-party motor vehicle accident claims, assessed on their own facts and merits.' },
    { q: 'Can you act as correspondent attorney in Mahikeng?', a: 'Yes. Given our proximity to the North West Division of the High Court, we assist instructing attorneys with filing, service and local appearances.' },
    { q: 'Do you assist municipalities and government institutions?', a: 'Yes, across advisory, governance, compliance and forensic investigation work.' },
    { q: 'Is my information kept confidential?', a: 'Yes, in line with our POPIA obligations and legal professional privilege.' },
  ]) ], { _css_classes: 'mok-narrow' }) ] }),
  // 9. Contact
  section({ classes: 'tag-band', bg: '#FFFFFF', structure: '20', elements: [
    column(50, [
      heading('Get In Touch', { size: 'h6', classes: 'eyebrow' }),
      heading("We're Here to Help", { size: 'h2' }),
      text('<p>&#128222; <a href="tel:+27183812910">(018) 381 2910/1</a><br>&#9993; <a href="mailto:info@mokhetleinc.co.za">info@mokhetleinc.co.za</a><br>&#128205; 18 Havenga Street, Golfview, Mahikeng, 2745<br>&#128336; Mon–Fri: 08:00–17:00</p>'),
      htmlw('<div class="badge-row"><span class="badge">Registration No. 2014/230750/21</span></div>'),
    ]),
    column(50, [ contactForm() ]),
  ] }),
  // 10. CTA
  ctaBand(),
]);
write('home', home);

/* ========================= ABOUT ========================= */
write('about', page('Mokhetle — About the Firm', [
  innerHero('About Mokhetle Attorneys Inc.', 'A Firm Built on Purpose, Since 2014', 'About the Firm'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">Mokhetle Attorneys Inc. (Registration No. 2014/230750/21) is a South African law firm based in Mahikeng, North West Province, delivering intelligent, solution-driven legal services to individuals, businesses, municipalities and government institutions. Since our establishment, we have built our practice on professionalism, integrity and purpose — and on achieving results that meet and exceed our clients&rsquo; expectations.</p>'),
  ]) ] }),
  section({ structure: '40', padTop: 0, elements: [
    column(25, [ iconbox('fas fa-handshake', 'Client-Centred', 'We listen, we understand, we deliver — for individual clients and institutional clients alike.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-shield-halved', 'Ethical &amp; Dependable', 'Upholding the highest standards of professional conduct in every matter we accept.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-microchip', 'Technology-Enabled', 'AI-assisted intake and a secure client portal for faster, more transparent service.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-building-columns', 'Institutionally Trusted', 'Proven advisory and forensic experience across the public and private sectors.', { classes: 'pillar' }) ]),
  ] }),
  section({ structure: '20', elements: [
    column(40, [ portraitFrame('Portrait of Edgeworth Mokhetle — to be supplied by the firm') ]),
    column(60, [
      heading('Our Director', { size: 'h6', classes: 'eyebrow' }),
      heading('Edgeworth Mokhetle', { size: 'h2' }),
      text('<p style="color:var(--bronze-dark); font-weight:600;">B.Proc, LLB · Admitted Attorney of the High Court of South Africa (September 2000)</p>'),
      text('<p>Edgeworth Mokhetle is a seasoned legal practitioner with extensive experience in litigation, public law, compliance and institutional advisory. He was admitted as an attorney of the High Court of South Africa in September 2000, and has since built a practice spanning personal injury and medical negligence litigation, labour law and broader dispute resolution.</p><p>Prior to establishing Mokhetle Attorneys Inc., he served as a legal adviser and lectured in law. He was formerly a partner of Kgomo, Mokhetle and Tlou Attorneys, and has participated in professional legal organisations and in the administration of attorney entrance examinations. He is passionate about delivering results that create value and promote justice for the firm&rsquo;s clients.</p>'),
      text('<p class="confirm-note">Note: this profile reflects the director&rsquo;s professional background as supplied for this website project. Further biographical detail can be added once reviewed and approved by the firm.</p>'),
    ]),
  ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ sectionHead('Our Team', 'Experienced. Focused. Committed.',
    'Mokhetle Attorneys Inc. is supported by a team of associates and support staff across our practice areas. Team profiles below are placeholders — no associate names, titles or photographs were supplied for this phase, and none have been invented. Please provide team details to populate this section.') ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '40', padTop: 0, elements: [
    column(25, [ htmlw('<div class="person-card"><div class="portrait-frame">Associate photo pending</div><h4>Associate Attorney</h4><span>Title to be confirmed</span></div>') ]),
    column(25, [ htmlw('<div class="person-card"><div class="portrait-frame">Associate photo pending</div><h4>Associate Attorney</h4><span>Title to be confirmed</span></div>') ]),
    column(25, [ htmlw('<div class="person-card"><div class="portrait-frame">Candidate photo pending</div><h4>Candidate Attorney</h4><span>Title to be confirmed</span></div>') ]),
    column(25, [ htmlw('<div class="person-card"><div class="portrait-frame">Staff photo pending</div><h4>Support Staff</h4><span>Title to be confirmed</span></div>') ]),
  ] }),
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', elements: [ column(100, [
    heading('Our Vision', { size: 'h6', classes: 'eyebrow', align: 'center' }),
    heading('Accessible. Efficient. Responsive. Technologically Sophisticated.', { size: 'h2', align: 'center' }),
    text('<p style="max-width:760px;margin:0 auto;text-align:center;">We aim to be a firm that individuals, businesses and institutions can rely on for responsive, well-considered legal counsel — supported by modern tools that make it easier to reach us and easier to stay informed about the progress of a matter.</p>'),
  ], { _css_classes: 'mok-center' }) ] }),
  ctaBand(),
]));

/* ========================= PRACTICE AREAS ========================= */
const paCards = [
  ['fas fa-car-burst', 'Personal Injury &amp; Medical Negligence', 'Road Accident Fund claims, third-party motor vehicle claims, medical negligence claims, and personal injury litigation, including assessment and management of damages claims.', U.pi],
  ['fas fa-gavel', 'Civil Litigation', 'Urgent and semi-urgent applications, High Court litigation, civil appeals and reviews, insolvency proceedings, commercial litigation and general dispute resolution.', U.contact],
  ['fas fa-people-group', 'Labour &amp; Employment Law', 'CCMA and bargaining council matters, Labour Court matters, mediation and arbitration, disciplinary hearings, workplace investigations and labour-law advisory and training.', U.contact],
  ['fas fa-landmark', 'Municipal &amp; Public-Sector Law', 'Municipal legal advisory services, drafting and review of policies and by-laws, delegation-of-powers frameworks, service-level agreements, lease agreements and property disputes.', U.contact],
  ['fas fa-file-signature', 'Commercial &amp; Corporate Law', 'Commercial contracts, legal opinions, commercial transactions, legal due diligence, property and asset-register advisory, contract review and corporate governance advisory.', U.contact],
  ['fas fa-magnifying-glass-chart', 'Forensic Investigations &amp; Legal Audits', 'Forensic and legal audits, commissions of enquiry, asset tracing and recovery, and investigation of irregular expenditure, procurement and governance matters.', U.forensic],
  ['fas fa-scale-unbalanced', 'Correspondent Attorney Services', 'Filing and issuing of court documents, court appearances, service of legal documents, matter monitoring and urgent High Court instructions in Mahikeng.', U.corr],
];
write('practice-areas', page('Mokhetle — Practice Areas', [
  innerHero('Our Practice Areas', 'Comprehensive Legal Solutions', 'Practice Areas'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">Mokhetle Attorneys Inc. advises and represents individuals, businesses and public-sector institutions across seven core practice areas.</p>'),
  ]) ] }),
  section({ structure: '10', padTop: 0, elements: [ column(100, gridRows(paCards, 4, 'practice-card')) ] }),
  section({ classes: 'tag-band', bg: '#FFFFFF', structure: '20', elements: [
    column(50, [
      heading('Not Sure Where to Start?', { size: 'h6', classes: 'eyebrow' }),
      heading('Let Our AI Legal Assistant Help', { size: 'h2' }),
      text('<p>The Mokhetle Legal Assistant can ask a few brief questions and route your enquiry to the right practice area and the right person at our firm.</p>'),
      button('Start a Secure Enquiry &rarr;', U.ai, { classes: 'btn btn-primary btn-sm' }),
    ]),
    column(50, [
      heading('Prefer to Speak Directly?', { size: 'h6', classes: 'eyebrow' }),
      heading('Contact Our Team', { size: 'h2' }),
      text('<p>&#128222; (018) 381 2910/1 &nbsp; &#9993; info@mokhetleinc.co.za</p>'),
      button('Contact Us &rarr;', U.contact, { classes: 'btn btn-outline btn-sm' }),
    ]),
  ] }),
]));

/* ========================= PERSONAL INJURY ========================= */
write('personal-injury', page('Mokhetle — Personal Injury & RAF Claims', [
  innerHero('Personal Injury &amp; Medical Negligence', 'Road Accident Fund &amp; Personal Injury Claims', 'Practice Areas / Personal Injury &amp; RAF Claims'),
  section({ structure: '20', elements: [
    column(60, [
      text('<p>Mokhetle Attorneys Inc. assists individuals who have been injured in motor vehicle accidents or as a result of medical negligence to pursue the compensation they are entitled to under South African law. Every matter is assessed on its own facts, evidence and merits — we do not estimate or guarantee compensation amounts before a proper assessment has been carried out.</p>'),
      htmlw('<div class="hero-ctas"><a class="btn btn-primary" href="#raf-intake">Start Your RAF Enquiry</a> <a class="btn btn-outline" href="' + U.contact + '">Speak to an Attorney</a></div>'),
    ]),
    column(40, [ iconlist(['Road Accident Fund claims', 'Third-party motor vehicle accident claims', 'Medical negligence claims', 'Personal injury litigation', 'Assessment and management of damages claims']) ]),
  ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ sectionHead('What to Expect', 'How a Road Accident Fund Claim Typically Proceeds', null) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '40', padTop: 0, elements: [
    column(25, [ iconbox('fas fa-1', 'Initial Consultation', 'We gather the facts of the accident, your injuries, and any documentation already available.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-2', 'Investigation &amp; Documentation', 'Collection of medical records, police reports and supporting evidence to build the claim.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-3', 'Submission &amp; Negotiation', 'Lodging the claim and engaging with the Road Accident Fund on your behalf.', { classes: 'pillar' }) ]),
    column(25, [ iconbox('fas fa-4', 'Resolution', 'Settlement negotiation or, where necessary, litigation to bring the matter to a conclusion.', { classes: 'pillar' }) ]),
  ] }),
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', elements: [ column(100, [
    heading('AI-Assisted RAF Intake', { size: 'h6', classes: 'eyebrow', align: 'center' }),
    heading('Start Your Road Accident Fund Enquiry', { size: 'h2', align: 'center' }),
    text('<p style="max-width:640px;margin:0 auto 24px;text-align:center;">The assistant below will ask a short set of questions specific to Road Accident Fund and personal injury matters. This is a simulated, front-end-only demonstration — no information is transmitted or stored.</p>'),
    aiPanel(),
  ], { _css_classes: 'mok-narrow mok-center' }) ] }),
]));

/* ========================= FORENSIC ========================= */
write('forensic', page('Mokhetle — Forensic Investigations & Legal Audits', [
  innerHero('Forensic Investigations &amp; Legal Audits', 'Uncover. Analyse. Resolve.', 'Practice Areas / Forensic Investigations'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">Our investigation and forensic auditing services assist institutions in detecting fraud, mitigating risk and strengthening governance through evidence-led insights and actionable recommendations. This work is carried out with strict attention to evidentiary integrity and confidentiality, and findings are reported factually without overstating conclusions ahead of a completed investigation.</p>'),
  ]) ] }),
  section({ structure: '10', padTop: 0, elements: [ column(100, [ iconlist([
    'Forensic investigations', 'Fraud risk assessments', 'Irregular expenditure reviews', 'Lifestyle audits', 'Compliance &amp; ethics reviews', 'Expert testimony', 'Commissions of enquiry', 'Asset tracing and recovery', 'Investigation of procurement and governance matters', 'Review of material irregularities', 'Evidence management and reporting',
  ], { cols: 2 }) ]) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ sectionHead('Who We Work With', 'Institutional &amp; Governance Clients', null) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '30', padTop: 0, elements: [
    column(33, [ iconbox('fas fa-landmark', 'Municipal Investigations', 'Forensic review of municipal expenditure, procurement and governance concerns.', { classes: 'pillar' }) ]),
    column(33, [ iconbox('fas fa-scale-balanced', 'Public-Sector Legal Advisory', 'Advisory support to institutions navigating governance and compliance risk.', { classes: 'pillar' }) ]),
    column(33, [ iconbox('fas fa-file-shield', 'Governance Investigations', 'Investigations into material irregularities and governance failures.', { classes: 'pillar' }) ]),
  ] }),
  section({ structure: '10', elements: [ column(100, [
    text('<p class="confirm-note">Specific client and matter names are withheld pending confirmation of permission to disclose, and no findings from past investigations are disclosed here.</p>'),
  ]) ] }),
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', elements: [ column(100, [
    heading('Need to commission an investigation or audit?', { size: 'h2', align: 'center' }),
    text('<p style="text-align:center;">Speak to our team directly, or use the AI Legal Assistant to submit a preliminary, confidential enquiry.</p>'),
    htmlw('<div class="hero-ctas" style="justify-content:center;"><a class="btn btn-primary" href="' + U.contact + '">Speak to an Attorney</a> <a class="btn btn-outline" href="' + U.ai + '">Start a Secure Enquiry</a></div>'),
  ], { _css_classes: 'mok-center' }) ] }),
]));

/* ========================= CORRESPONDENT ========================= */
write('correspondent', page('Mokhetle — Correspondent Attorney Services', [
  innerHero('Correspondent Attorney Services', 'Local Support for High Court Matters in Mahikeng', 'Practice Areas / Correspondent Attorney Services'),
  section({ structure: '20', elements: [
    column(60, [
      text('<p>Mokhetle Attorneys Inc. is conveniently located near the North West Division of the High Court in Mahikeng, and regularly assists instructing attorneys from other regions with correspondent work. We understand that a reliable local correspondent is essential to keeping matters on track — our team is set up to respond quickly to instructions and to keep instructing attorneys informed at every step.</p>'),
      button('Submit a Correspondent Instruction', '#instruction', { classes: 'btn btn-primary' }),
    ]),
    column(40, [ iconlist(['Filing and issuing court documents', 'Court appearances', 'Service of legal documents', 'Matter monitoring', 'Local procedural support', 'Urgent High Court instructions']) ]),
  ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ column(100, [
    heading('Submit an Instruction', { size: 'h6', classes: 'eyebrow' }),
    heading('Correspondent Instruction Form', { size: 'h2' }),
    text('<p>Please provide the details below so we can action your instruction promptly. This is a prototype form — no instruction is actually transmitted.</p>'),
    correspondentForm(),
  ], { _css_classes: 'mok-narrow' }) ] }),
]));

/* ========================= AI ASSISTANT ========================= */
write('ai-assistant', page('Mokhetle — AI Legal Assistant', [
  innerHero('Mokhetle Legal Assistant', 'Start Your Matter Intelligently', 'AI Legal Assistant'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">The assistant below asks a short series of questions to understand who you are and what your matter involves, then routes it to the right department. It supports individuals, businesses, instructing attorneys, and municipal or government institutions, with dedicated question sets for Road Accident Fund claims, medical negligence, labour matters, municipal instructions and correspondent instructions.</p>'),
    text('<p class="confirm-note">This is a functional front-end demonstration using simulated, scripted responses. No AI model is called, no data is transmitted, and nothing typed here is stored anywhere.</p>'),
    aiPanel(),
  ], { _css_classes: 'mok-narrow' }) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ sectionHead('Capabilities', 'What the Assistant Can Do', null) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', padTop: 0, elements: [ column(100, [ iconlist([
    'Intelligent practice-area routing', 'Preliminary conflict-check data capture', 'Matter-reference generation', 'Secure document upload (future)', 'Automatic email acknowledgements (future)', 'Attorney notification workflows (future)', 'Enquiry-status tracking (future)', 'WhatsApp integration (future)', 'Human handover at any stage', 'Multilingual support (future)',
  ], { cols: 2 }) ], { _css_classes: 'mok-narrow' }) ] }),
  section({ classes: 'band-dark', bg: '#2B2A28', structure: '10', elements: [ column(100, [
    heading('What the Assistant Will Never Do', { size: 'h6', classes: 'eyebrow', align: 'center' }),
    heading('No Guarantees. No Advice. No Shortcuts.', { size: 'h2', align: 'center' }),
    text('<p style="max-width:760px;margin:0 auto;text-align:center;">The assistant will never guarantee a legal outcome, estimate compensation as a confirmed amount, provide a definitive legal opinion, create an attorney-client relationship automatically, make a decision without attorney review, or expose confidential client information. Every enquiry is reviewed by a Mokhetle Attorneys Inc. attorney before it is treated as accepted.</p>'),
  ], { _css_classes: 'mok-center' }) ] }),
]));

/* ========================= CLIENT PORTAL ========================= */
write('client-portal', page('Mokhetle — Secure Client Portal', [
  innerHero('Secure Client Portal — Concept Preview', 'Secure. Convenient. Connected.', 'Secure Client Portal'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">The portal below is a visual concept for a future secure client portal. It is not a working system, requires no login, and every name, matter and figure shown is placeholder data — no real client information has been used.</p>'),
    htmlw(portalFlag),
    htmlw(portalShell),
  ]) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ sectionHead('Planned Features', 'What the Portal Will Offer', null) ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', padTop: 0, elements: [ column(100, [ iconlist([
    'Secure login', 'Matter status tracking', 'Upcoming appointments &amp; court dates', 'Document upload and download', 'Secure messaging', 'Requests for information', 'Outstanding document checklist', 'Invoices and statements', 'Consultation history', 'Notifications', 'POPIA consent records',
  ], { cols: 2 }) ], { _css_classes: 'mok-narrow' }) ] }),
  section({ structure: '10', padTop: 0, elements: [ column(100, [
    text('<p class="confirm-note">The portal is a future engineering project, scoped separately from this website design phase — see the technology-stack recommendation for detail.</p>'),
  ]) ] }),
]));

/* ========================= CONTACT ========================= */
write('contact', page('Mokhetle — Contact Us', [
  innerHero('Get In Touch', "We're Here to Help", 'Contact Us'),
  section({ structure: '10', elements: [ column(100, [
    text('<p style="max-width:820px;">Whether you are an individual, a business, an instructing attorney, or a public institution, our team is ready to assist. Reach us directly using the details below, or submit an enquiry through the form or our AI Legal Assistant.</p>'),
  ]) ] }),
  section({ structure: '20', padTop: 0, elements: [
    column(50, [
      heading('Office Details', { size: 'h3' }),
      text('<p>&#128222; <a href="tel:+27183812910">(018) 381 2910/1</a><br>&#9993; <a href="mailto:info@mokhetleinc.co.za">info@mokhetleinc.co.za</a><br>&#128205; 18 Havenga Street, Golfview, Mahikeng, 2745<br>&#128238; P.O. Box 2843, Mahikeng, 2745<br>&#128336; Monday–Friday: 08:00–17:00</p>'),
      htmlw('<div class="badge-row"><span class="badge">Registration No. 2014/230750/21</span></div>'),
      htmlw('<div class="portrait-frame" style="aspect-ratio:16/7;margin-top:18px;">Interactive map to be embedded here — 18 Havenga Street, Golfview, Mahikeng, 2745</div>'),
    ]),
    column(50, [ contactForm() ]),
  ] }),
  section({ classes: 'tag-band', bg: '#F4EEE3', structure: '10', elements: [ column(100, [
    heading('Prefer a guided enquiry?', { size: 'h6', classes: 'eyebrow', align: 'center' }),
    heading('Start with the AI Legal Assistant', { size: 'h2', align: 'center' }),
    htmlw('<div class="hero-ctas" style="justify-content:center;"><a class="btn btn-primary" href="' + U.ai + '">Open the AI Legal Assistant</a> <a class="btn btn-outline" href="' + (process.env.MOK_WA || 'https://wa.me/27000000000') + '" target="_blank" rel="noopener">Message us on WhatsApp</a></div>'),
  ], { _css_classes: 'mok-center' }) ] }),
]));

console.log('Generated templates. Total elements:', _id);
console.log(fs.readdirSync(OUT).sort().join('\n'));
