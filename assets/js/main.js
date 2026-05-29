/**
 * Golden Bee theme scripts.
 */
(function () {
  'use strict';

  // Mobile menu toggle
  const menuToggle = document.getElementById('mobile-menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const primaryNav = document.getElementById('primary-nav');

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('hidden');
      if (primaryNav) {
        primaryNav.classList.toggle('hidden');
        primaryNav.classList.toggle('flex');
        primaryNav.classList.toggle('flex-col');
      }
    });
  }

  // Mobile accordion
  document.querySelectorAll('.mobile-accordion-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const target = document.getElementById(btn.getAttribute('data-target'));
      if (target) {
        target.classList.toggle('hidden');
      }
    });
  });

  // Hero slider
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
      dot.classList.toggle('!bg-white', i === currentSlide);
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
        resetInterval();
      });
    });
    slideInterval = setInterval(nextSlide, 5000);
    function resetInterval() {
      clearInterval(slideInterval);
      slideInterval = setInterval(nextSlide, 5000);
    }
  }

  // Desktop mega menu (full-width under nav)
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

  // WooCommerce product loop as grid
  const productList = document.querySelector('.products');
  if (productList) {
    productList.classList.add(
      'grid',
      'gap-4',
      'sm:grid-cols-2',
      'lg:grid-cols-3',
      'xl:grid-cols-4',
      'list-none',
      'p-0'
    );
  }
})();
