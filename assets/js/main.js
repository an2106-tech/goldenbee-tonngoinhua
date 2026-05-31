/**
 * Golden Bee theme scripts.
 */
(function () {
  'use strict';

  const siteHeader = document.getElementById('site-header');
  if (siteHeader) {
    const onScroll = function () {
      siteHeader.classList.toggle('is-stuck', window.scrollY > 80);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  const menuToggle = document.getElementById('mobile-menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('hidden');
    });
  }

  document.querySelectorAll('.mobile-accordion-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const target = document.getElementById(btn.getAttribute('data-target'));
      if (target) {
        target.classList.toggle('hidden');
      }
    });
  });

  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.hero-dot');
  let currentSlide = 0;
  let slideInterval;

  function showSlide(index) {
    if (!slides.length) return;
    currentSlide = (index + slides.length) % slides.length;
    slides.forEach(function (slide, i) {
      slide.classList.toggle('active', i === currentSlide);
      slide.style.display = i === currentSlide ? 'block' : 'none';
    });
    dots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === currentSlide);
    });
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  if (slides.length > 1) {
    slides.forEach(function (slide, i) {
      slide.style.display = i === 0 ? 'block' : 'none';
    });
    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        showSlide(parseInt(dot.getAttribute('data-slide'), 10));
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 4000);
      });
    });
    slideInterval = setInterval(nextSlide, 4000);
  }

  const navProducts = document.getElementById('nav-products');
  const megaMenu = document.getElementById('mega-menu-products');
  if (navProducts && megaMenu) {
    let hideTimer;
    const openMenu = function () {
      clearTimeout(hideTimer);
      megaMenu.classList.add('is-open');
      megaMenu.setAttribute('aria-hidden', 'false');
    };
    const closeMenu = function () {
      hideTimer = setTimeout(function () {
        megaMenu.classList.remove('is-open');
        megaMenu.setAttribute('aria-hidden', 'true');
      }, 120);
    };
    navProducts.addEventListener('mouseenter', openMenu);
    navProducts.addEventListener('mouseleave', closeMenu);
    megaMenu.addEventListener('mouseenter', openMenu);
    megaMenu.addEventListener('mouseleave', closeMenu);
  }

  const productList = document.querySelector('.woocommerce .products');
  if (productList && !productList.classList.contains('products-grid-home')) {
    productList.classList.add('products-grid-home');
  }

  const backToTop = document.getElementById('back-to-top');
  if (backToTop) {
    backToTop.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
})();
