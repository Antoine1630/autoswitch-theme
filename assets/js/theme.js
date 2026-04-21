(function () {
  'use strict';

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ===== Nav scroll state =====
  var nav  = document.getElementById('nav');
  var hero = document.getElementById('accueil');

  function updateNav() {
    if (!nav) return;
    var threshold = hero ? (hero.offsetHeight - 80) : 400;
    nav.classList.toggle('scrolled', window.scrollY > 40);
    if (hero) {
      nav.classList.toggle('on-hero', window.scrollY < threshold);
    }
  }
  window.addEventListener('scroll', updateNav, { passive: true });
  updateNav();

  // ===== Mobile menu =====
  var hamburger   = document.getElementById('hamburger');
  var mobileMenu  = document.getElementById('mobileMenu');
  var mobileClose = document.getElementById('mobileClose');

  if (hamburger && mobileMenu)   hamburger.addEventListener('click',  function () { mobileMenu.classList.add('open'); });
  if (mobileClose && mobileMenu) mobileClose.addEventListener('click', function () { mobileMenu.classList.remove('open'); });
  document.querySelectorAll('.ml').forEach(function (a) {
    a.addEventListener('click', function () { if (mobileMenu) mobileMenu.classList.remove('open'); });
  });

  // ===== FAQ accordion =====
  document.querySelectorAll('.faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item    = btn.closest('.faq-item');
      var wasOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function (i) { i.classList.remove('open'); });
      if (!wasOpen) item.classList.add('open');
    });
  });

  // ===== Smooth scroll avec offset =====
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var href = a.getAttribute('href');
      if (!href || href === '#') return;
      var target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();
      var y = target.getBoundingClientRect().top + window.scrollY - 60;
      window.scrollTo({ top: y, behavior: reduceMotion ? 'auto' : 'smooth' });
    });
  });

  // ===== Formulaire simple =====
  var form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function (e) {
      var prenom = document.getElementById('prenom');
      var tel    = document.getElementById('tel');
      if (!prenom || !tel || !prenom.value.trim() || !tel.value.trim()) {
        e.preventDefault();
        alert('Veuillez renseigner au minimum votre prénom et votre téléphone.');
        return;
      }
      var success = document.getElementById('form-success');
      if (success) {
        setTimeout(function () {
          form.style.display = 'none';
          success.style.display = 'block';
        }, 400);
      }
    });
  }

  // ===== Split hero title into words for staggered reveal =====
  // Keep existing inline markup (em, br) and wrap text nodes' words in
  // <span class="word"><span class="word-inner">…</span></span>.
  function splitWords(root) {
    if (!root || root.dataset.wordsSplit === '1') return;
    var walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, null, false);
    var nodes  = [];
    while (walker.nextNode()) nodes.push(walker.currentNode);

    nodes.forEach(function (node) {
      var text = node.nodeValue;
      if (!text || !text.trim()) return;
      var frag  = document.createDocumentFragment();
      var parts = text.split(/(\s+)/);
      parts.forEach(function (part) {
        if (!part) return;
        if (/^\s+$/.test(part)) {
          frag.appendChild(document.createTextNode(part));
        } else {
          var wrap  = document.createElement('span');
          wrap.className = 'word';
          var inner = document.createElement('span');
          inner.className = 'word-inner';
          inner.textContent = part;
          wrap.appendChild(inner);
          frag.appendChild(wrap);
        }
      });
      node.parentNode.replaceChild(frag, node);
    });
    root.dataset.wordsSplit = '1';
  }

  var heroTitle = document.querySelector('.hero-title');
  if (heroTitle && !reduceMotion) {
    splitWords(heroTitle);
    // Trigger on next frame so the transition actually animates.
    requestAnimationFrame(function () {
      requestAnimationFrame(function () { heroTitle.classList.add('is-in'); });
    });
  } else if (heroTitle) {
    heroTitle.classList.add('is-in');
  }

  // ===== Tag stagger groups automatically =====
  // These selectors map to existing layout blocks in front-page.php.
  var GROUP_SELECTORS = [
    '.services-grid',
    '.steps',
    '.feature-list',
    '.gallery-scroll',
    '.t-grid',
    '.faq-wrap',
    '.stats'
  ];
  GROUP_SELECTORS.forEach(function (sel) {
    document.querySelectorAll(sel).forEach(function (el) {
      if (!el.hasAttribute('data-reveal-group')) el.setAttribute('data-reveal-group', '');
    });
  });

  // ===== Reveal on scroll (standard + groups + images) =====
  function revealAll() {
    document.querySelectorAll('.reveal, [data-reveal-group], .reveal-img').forEach(function (el) {
      el.classList.add('in');
    });
  }

  if (reduceMotion || !('IntersectionObserver' in window)) {
    revealAll();
  } else {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('in');
        io.unobserve(entry.target);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, [data-reveal-group], .reveal-img').forEach(function (el) {
      io.observe(el);
    });
  }

  // ===== Parallax on hero background =====
  var heroImage = document.querySelector('.hero-image');
  if (heroImage && !reduceMotion) {
    var ticking = false;
    function applyParallax() {
      var y = window.scrollY;
      if (y > window.innerHeight) { ticking = false; return; }
      heroImage.style.transform = 'translate3d(0,' + (y * 0.25) + 'px,0) scale(1.06)';
      ticking = false;
    }
    window.addEventListener('scroll', function () {
      if (!ticking) { window.requestAnimationFrame(applyParallax); ticking = true; }
    }, { passive: true });
  }

  // ===== Count-up for stats =====
  // Parses the numeric prefix (e.g. "+250", "21", "96") and animates it;
  // preserves any trailing inline markup like <span>j</span> or <span>%</span>.
  function countUp(el) {
    if (el.dataset.countDone === '1') return;
    el.dataset.countDone = '1';

    var originalHTML = el.innerHTML;
    var match = originalHTML.match(/^([+\-]?)(\d+)([\s\S]*)$/);
    if (!match) return;

    var sign   = match[1] || '';
    var target = parseInt(match[2], 10);
    var suffix = match[3] || '';
    if (isNaN(target) || target === 0) return;

    var duration = 1100;
    var start    = null;

    function frame(ts) {
      if (!start) start = ts;
      var p   = Math.min(1, (ts - start) / duration);
      var eased = 1 - Math.pow(1 - p, 3);
      var val = Math.round(target * eased);
      el.innerHTML = sign + val + suffix;
      if (p < 1) requestAnimationFrame(frame);
      else       el.innerHTML = sign + target + suffix;
    }
    requestAnimationFrame(frame);
  }

  var stats = document.querySelectorAll('.stat-item .num');
  if (stats.length) {
    if (reduceMotion || !('IntersectionObserver' in window)) {
      // Leave values as-is.
    } else {
      var statsIO = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          countUp(entry.target);
          statsIO.unobserve(entry.target);
        });
      }, { threshold: 0.4 });
      stats.forEach(function (el) { statsIO.observe(el); });
    }
  }
})();
