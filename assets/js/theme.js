(function () {
  'use strict';

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

  if (hamburger && mobileMenu)  hamburger.addEventListener('click',  function () { mobileMenu.classList.add('open'); });
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
      window.scrollTo({ top: y, behavior: 'smooth' });
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
      // Si on utilise mailto (pas Contact Form 7), on laisse passer
      var success = document.getElementById('form-success');
      if (success) {
        setTimeout(function () {
          form.style.display = 'none';
          success.style.display = 'block';
        }, 400);
      }
    });
  }

  // ===== Reveal on scroll =====
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) entry.target.classList.add('in');
      });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
  }
})();
