/* =========================================================
   Mokhetle Attorneys Inc. — Shared prototype behaviour
   Vanilla JS only. No external dependencies, no network calls.
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

  /* ---- Mobile nav toggle ---- */
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('nav.main-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('nav-open');
      if (open) {
        nav.style.display = 'flex';
        nav.style.flexDirection = 'column';
        nav.style.position = 'absolute';
        nav.style.top = '100%';
        nav.style.left = '0';
        nav.style.right = '0';
        nav.style.background = '#fff';
        nav.style.padding = '20px 24px';
        nav.style.boxShadow = '0 18px 40px -20px rgba(22,21,19,.25)';
      } else {
        nav.style.display = 'none';
      }
    });
  }

  /* ---- FAQ accordion ---- */
  document.querySelectorAll('.faq-item .faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      var wasOpen = item.classList.contains('open');
      item.parentElement.querySelectorAll('.faq-item').forEach(function (i) { i.classList.remove('open'); });
      if (!wasOpen) item.classList.add('open');
    });
  });

  /* ---- Generic enquiry form (no real submission — prototype only) ---- */
  document.querySelectorAll('form[data-demo-form]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var msg = form.querySelector('.form-msg');
      if (!msg) return;
      msg.className = 'form-msg success';
      msg.style.display = 'block';
      msg.textContent = 'Thank you. This is a design prototype — no enquiry has actually been sent. In production this would notify the relevant department and generate a reference number.';
      form.reset();
    });
  });

  /* ---- Reference number generator (simulated, client-side only) ---- */
  window.generateReference = function (prefix) {
    var n = Math.floor(100000 + (Date.parse(new Date()) % 900000));
    return (prefix || 'MOK') + '-' + new Date().getFullYear() + '-' + n;
  };

  /* ---- AI Legal Assistant simulated chat engine ---- */
  initAssistants();
});

/* =========================================================
   Simulated AI intake flow engine.
   IMPORTANT: this is a scripted, front-end-only simulation for
   design review. No message is sent anywhere, no AI model is
   called, and nothing typed here is stored.
   ========================================================= */
function initAssistants() {
  document.querySelectorAll('[data-assistant]').forEach(function (root) {
    var windowEl = root.querySelector('.chat-window');
    var inputRow = root.querySelector('.chat-input-row');
    var textInput = inputRow ? inputRow.querySelector('input') : null;
    var sendBtn = inputRow ? inputRow.querySelector('button') : null;
    var state = { step: 'welcome', category: null, subflow: null, answers: {}, popiaConsent: false };

    function addMsg(text, who) {
      var div = document.createElement('div');
      div.className = 'chat-msg ' + (who || 'bot');
      div.innerHTML = text;
      windowEl.appendChild(div);
      windowEl.scrollTop = windowEl.scrollHeight;
    }

    function addOptions(options) {
      var wrap = document.createElement('div');
      wrap.className = 'chat-options';
      options.forEach(function (opt) {
        var b = document.createElement('button');
        b.type = 'button';
        b.textContent = opt.label;
        b.addEventListener('click', function () {
          addMsg(opt.label, 'user');
          wrap.remove();
          opt.action();
        });
        wrap.appendChild(b);
      });
      windowEl.appendChild(wrap);
      windowEl.scrollTop = windowEl.scrollHeight;
    }

    function askFreeText(placeholder, onSubmit) {
      if (!textInput) return;
      textInput.placeholder = placeholder;
      textInput.disabled = false;
      textInput.focus();
      function handler() {
        var val = textInput.value.trim();
        if (!val) return;
        addMsg(val, 'user');
        textInput.value = '';
        textInput.removeEventListener('keypress', keyHandler);
        sendBtn.removeEventListener('click', handler);
        onSubmit(val);
      }
      function keyHandler(e) { if (e.key === 'Enter') handler(); }
      sendBtn.addEventListener('click', handler);
      textInput.addEventListener('keypress', keyHandler);
    }

    var categoryFlows = {
      'Road Accident Fund claim': [
        'What was the approximate date of the accident?',
        'Where did the accident take place?',
        'Were you the driver, a passenger, a pedestrian, or a cyclist?',
        'Briefly describe the injuries sustained.',
        'Do you have a police case (CAS) number, if opened?',
        'Which hospital or clinic provided treatment, if any?',
        'Are you currently employed, and has the injury affected your ability to work?',
        'Has another attorney previously been instructed on this matter?'
      ],
      'Medical negligence matter': [
        'Which healthcare institution or practitioner was involved?',
        'On what date did the treatment in question occur?',
        'What was the nature of the treatment received?',
        'What harm or injury do you believe resulted?',
        'Do you have access to the relevant medical records?',
        'Has this matter previously been reported to the institution, the HPCSA, or another body?'
      ],
      'Labour or employment matter': [
        'Are you an employer or an employee in this matter?',
        'What is the name of the employer involved?',
        'What type of dispute is this (e.g. dismissal, discipline, unfair labour practice)?',
        'Is there a disciplinary hearing date, and if so, when?',
        'Has a dismissal already taken place, and on what date?',
        'Has this matter been referred to the CCMA or a bargaining council?',
        'Are there any deadlines you are aware of (e.g. referral or appeal deadlines)?'
      ],
      'Municipal or public-sector instruction': [
        'What is the name of the institution or municipality?',
        'Which department is instructing, and who is the authorised contact person?',
        'What type of instruction is this (e.g. advisory, litigation, forensic, drafting)?',
        'Does this relate to a procurement or governance issue?',
        'What deliverable is required (e.g. opinion, policy, by-law, report)?',
        'Is there a submission or reporting deadline?'
      ],
      'Correspondent attorney instruction': [
        'What is the name of the instructing attorney and firm?',
        'Which court and division is this matter in?',
        'What is the case number, if allocated?',
        'Who are the parties to the matter?',
        'What is the nature of the instruction (e.g. filing, appearance, service)?',
        'Is there an appearance or filing date we should be aware of?',
        'Which documents require filing or service?'
      ]
    };

    function finish() {
      addMsg('Before we continue, please confirm: do you consent to Mokhetle Attorneys Inc. collecting and processing the information you have shared, in line with our POPIA Privacy Notice, for the purpose of assessing your enquiry?', 'bot');
      addOptions([
        { label: 'I consent', action: function () {
            state.popiaConsent = true;
            var ref = window.generateReference('MOK');
            addMsg('Thank you. Your reference number is <span class="ref-badge">' + ref + '</span>. This enquiry has been logged for review by the appropriate department — no attorney-client relationship is created until the firm formally accepts the instruction.', 'bot');
            addMsg('Is this matter urgent, and would you prefer a callback, email, WhatsApp message, or to book a consultation?', 'bot');
            addOptions([
              { label: 'Request a callback', action: function () { addMsg('Noted — someone from our team will call you as soon as possible during office hours (Mon–Fri, 08:00–17:00). This is a prototype, so no call will actually be placed.', 'bot'); } },
              { label: 'Book a consultation', action: function () { addMsg('Noted — in production this would open our consultation scheduler. This is a prototype, so no booking has actually been made.', 'bot'); } },
              { label: 'Start a new enquiry', action: function () { resetChat(); } }
            ]);
          } },
        { label: 'I do not consent', action: function () {
            addMsg('Understood. Without consent we are unable to log or route this enquiry. You are welcome to contact us directly by telephone on (018) 381 2910/1 or email info@mokhetleinc.co.za.', 'bot');
          } }
      ]);
    }

    function runFlow(category) {
      var questions = categoryFlows[category].slice();
      addMsg('Thank you. To help route your enquiry correctly, could I ask you a few brief questions? None of this constitutes legal advice, and you are welcome to skip anything you are not comfortable sharing.', 'bot');
      function next() {
        if (!questions.length) {
          addMsg('Lastly, could you provide the full names of all parties involved (for a preliminary conflict check), your full name, and the best way to reach you?', 'bot');
          askFreeText('Type your answer…', function () { finish(); });
          return;
        }
        var q = questions.shift();
        addMsg(q, 'bot');
        askFreeText('Type your answer…', function () { next(); });
      }
      next();
    }

    function askCategory() {
      addMsg('To make sure your enquiry reaches the right department, are you contacting us as:', 'bot');
      addOptions([
        { label: 'An individual', action: function () { chooseMatterType(); } },
        { label: 'A business', action: function () { chooseMatterType(); } },
        { label: 'An instructing attorney', action: function () { runFlow('Correspondent attorney instruction'); } },
        { label: 'A municipality or government institution', action: function () { runFlow('Municipal or public-sector instruction'); } }
      ]);
    }

    function chooseMatterType() {
      addMsg('What best describes your matter?', 'bot');
      addOptions([
        { label: 'Road Accident Fund claim', action: function () { runFlow('Road Accident Fund claim'); } },
        { label: 'Medical negligence', action: function () { runFlow('Medical negligence matter'); } },
        { label: 'Labour or employment matter', action: function () { runFlow('Labour or employment matter'); } },
        { label: 'Something else', action: function () {
            addMsg('No problem — please briefly describe your matter and we will route it to the right attorney.', 'bot');
            askFreeText('Describe your matter…', function () { finish(); });
          } }
      ]);
    }

    function resetChat() {
      windowEl.innerHTML = '';
      addMsg('Welcome back. I\'m the Mokhetle Legal Assistant. How can I help today?', 'bot');
      askCategory();
    }

    /* Boot sequence */
    addMsg('Hello, I\'m the Mokhetle Legal Assistant. I provide general information and help route enquiries to the right person at Mokhetle Attorneys Inc. — I do not provide legal advice, and no attorney-client relationship is formed through this chat.', 'bot');
    askCategory();
  });
}
