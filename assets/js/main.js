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

  document.querySelectorAll('.gb-product-detail .quantity').forEach(function (quantity) {
    const input = quantity.querySelector('input.qty');
    if (!input || quantity.querySelector('.gb-qty-button')) return;

    const minus = document.createElement('button');
    const plus = document.createElement('button');
    minus.type = 'button';
    plus.type = 'button';
    minus.className = 'gb-qty-button gb-qty-button--minus';
    plus.className = 'gb-qty-button gb-qty-button--plus';
    minus.textContent = '-';
    plus.textContent = '+';
    minus.setAttribute('aria-label', 'Giam so luong');
    plus.setAttribute('aria-label', 'Tang so luong');

    quantity.insertBefore(minus, input);
    quantity.appendChild(plus);

    function changeQuantity(delta) {
      const step = parseFloat(input.getAttribute('step')) || 1;
      const min = parseFloat(input.getAttribute('min')) || 0;
      const maxAttr = input.getAttribute('max');
      const max = maxAttr ? parseFloat(maxAttr) : Infinity;
      const current = parseFloat(input.value) || min || 0;
      const next = Math.min(max, Math.max(min, current + delta * step));
      input.value = Number.isInteger(step) ? String(Math.round(next)) : String(next);
      input.dispatchEvent(new Event('change', { bubbles: true }));
    }

    minus.addEventListener('click', function () {
      changeQuantity(-1);
    });

    plus.addEventListener('click', function () {
      changeQuantity(1);
    });
  });

  document.querySelectorAll('.gb-product-detail form.variations_form').forEach(function (form) {
    const selects = Array.from(form.querySelectorAll('select'));
    if (!selects.length) return;

    function updateVariationState() {
      const hasSelection = selects.some(function (select) {
        return select.value !== '';
      });
      form.classList.toggle('gb-has-selected-variation', hasSelection);
    }

    selects.forEach(function (select) {
      select.addEventListener('change', updateVariationState);
    });

    form.querySelectorAll('.reset_variations').forEach(function (reset) {
      reset.addEventListener('click', function () {
        window.setTimeout(updateVariationState, 0);
      });
    });

    updateVariationState();
  });

  document.querySelectorAll('.gb-product-tabs-like').forEach(function (tabs) {
    const links = Array.from(tabs.querySelectorAll('.gb-product-tab-nav a[data-gb-tab]'));
    const panels = Array.from(tabs.querySelectorAll('.gb-product-tab-panel'));
    if (!links.length || !panels.length) return;

    function activateTab(targetId) {
      links.forEach(function (link) {
        link.classList.toggle('is-active', link.getAttribute('data-gb-tab') === targetId);
      });

      panels.forEach(function (panel) {
        panel.classList.toggle('is-active', panel.id === targetId);
      });
    }

    links.forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault();
        activateTab(link.getAttribute('data-gb-tab'));
      });
    });
  });

  function initProductGalleries() {
    document.querySelectorAll('.gb-product-detail .woocommerce-product-gallery').forEach(function (gallery) {
      const viewport = gallery.querySelector('.flex-viewport');
      const trigger = gallery.querySelector('.woocommerce-product-gallery__trigger');
      const thumbs = Array.from(gallery.querySelectorAll('.flex-control-thumbs img'));
      if (!viewport) return;

      if (trigger && trigger.parentElement !== viewport) {
        viewport.appendChild(trigger);
      }

      if (thumbs.length < 2 || viewport.querySelector('.gb-product-gallery-nav')) return;

      const nav = document.createElement('div');
      const prev = document.createElement('button');
      const next = document.createElement('button');
      nav.className = 'gb-product-gallery-nav';
      prev.type = 'button';
      next.type = 'button';
      prev.className = 'gb-product-gallery-arrow gb-product-gallery-arrow--prev';
      next.className = 'gb-product-gallery-arrow gb-product-gallery-arrow--next';
      prev.setAttribute('aria-label', 'Anh truoc');
      next.setAttribute('aria-label', 'Anh tiep theo');
      prev.textContent = '‹';
      next.textContent = '›';
      nav.appendChild(prev);
      nav.appendChild(next);
      viewport.appendChild(nav);

      function currentThumbIndex() {
        const active = thumbs.findIndex(function (thumb) {
          return thumb.classList.contains('flex-active');
        });
        return active >= 0 ? active : 0;
      }

      function go(delta) {
        const index = currentThumbIndex();
        const nextIndex = (index + delta + thumbs.length) % thumbs.length;
        thumbs[nextIndex].click();
      }

      prev.addEventListener('click', function () {
        go(-1);
      });

      next.addEventListener('click', function () {
        go(1);
      });
    });
  }

  initProductGalleries();
  window.addEventListener('load', initProductGalleries);
  [250, 700, 1400].forEach(function (delay) {
    window.setTimeout(initProductGalleries, delay);
  });

  document.querySelectorAll('.gb-product-related-wrap section.related.products').forEach(function (related) {
    const track = related.querySelector('ul.products');
    if (!track) return;

    const items = Array.from(track.children);
    if (items.length <= 4) return;

    track.classList.add('gb-related-carousel-track');

    const prev = document.createElement('button');
    const next = document.createElement('button');
    prev.type = 'button';
    next.type = 'button';
    prev.className = 'gb-related-carousel-btn gb-related-carousel-btn--prev';
    next.className = 'gb-related-carousel-btn gb-related-carousel-btn--next';
    prev.setAttribute('aria-label', 'San pham truoc');
    next.setAttribute('aria-label', 'San pham tiep theo');
    prev.textContent = '‹';
    next.textContent = '›';
    related.appendChild(prev);
    related.appendChild(next);

    let page = 0;
    let pageCount = 1;
    let perView = 4;

    function getPerView() {
      return window.matchMedia('(max-width: 849px)').matches ? 2 : 4;
    }

    function updateRelatedCarousel() {
      perView = getPerView();
      pageCount = Math.max(1, Math.ceil(items.length / perView));
      if (page >= pageCount) page = pageCount - 1;
      const first = items[0];
      const gap = parseFloat(window.getComputedStyle(track).columnGap || '0') || 0;
      const shift = first ? page * perView * (first.getBoundingClientRect().width + gap) : 0;
      track.style.transform = 'translateX(-' + shift + 'px)';
      prev.disabled = page === 0;
      next.disabled = page >= pageCount - 1;
    }

    prev.addEventListener('click', function () {
      page = Math.max(0, page - 1);
      updateRelatedCarousel();
    });

    next.addEventListener('click', function () {
      page = Math.min(pageCount - 1, page + 1);
      updateRelatedCarousel();
    });

    window.addEventListener('resize', updateRelatedCarousel);
    updateRelatedCarousel();
  });

  const mediaSlider = document.querySelector('[data-media-slider]');
  if (mediaSlider) {
    const track = mediaSlider.querySelector('.media-quotes-track');
    const slides = mediaSlider.querySelectorAll('.media-quote-slide');
    const prevBtn = mediaSlider.querySelector('.media-slider-prev');
    const nextBtn = mediaSlider.querySelector('.media-slider-next');
    const dotsWrap = mediaSlider.querySelector('.media-slider-dots');
    let pageIndex = 0;
    let perView = 1;
    let pageCount = 1;
    let autoTimer;

    function getPerView() {
      if (window.matchMedia('(min-width: 1024px)').matches) return 3;
      if (window.matchMedia('(min-width: 768px)').matches) return 2;
      return 1;
    }

    function updateLayout() {
      perView = getPerView();
      pageCount = Math.max(1, Math.ceil(slides.length / perView));
      if (pageIndex >= pageCount) {
        pageIndex = 0;
      }
      const first = slides[0];
      if (first) {
        const shift = pageIndex * perView * first.offsetWidth;
        track.style.transform = 'translateX(-' + shift + 'px)';
      }
      if (dotsWrap) {
        const needDots = dotsWrap.children.length !== pageCount;
        if (needDots) {
          dotsWrap.innerHTML = '';
          for (let i = 0; i < pageCount; i++) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'media-slider-dot';
            dot.setAttribute('aria-label', 'Trang ' + (i + 1));
            dot.addEventListener('click', function () {
              pageIndex = i;
              updateLayout();
              resetAuto();
            });
            dotsWrap.appendChild(dot);
          }
        }
        dotsWrap.querySelectorAll('.media-slider-dot').forEach(function (dot, i) {
          dot.classList.toggle('is-active', i === pageIndex);
        });
      }
    }

    function go(delta) {
      pageIndex = (pageIndex + delta + pageCount) % pageCount;
      updateLayout();
    }

    function resetAuto() {
      clearInterval(autoTimer);
      if (pageCount > 1) {
        autoTimer = setInterval(function () {
          go(1);
        }, 6000);
      }
    }

    if (prevBtn) prevBtn.addEventListener('click', function () { go(-1); resetAuto(); });
    if (nextBtn) nextBtn.addEventListener('click', function () { go(1); resetAuto(); });
    window.addEventListener('resize', updateLayout);
    updateLayout();
    resetAuto();
  }

  // Dai Ly Form Handler
  const daiLyForm = document.querySelector('.dai-ly-page__form');
  if (daiLyForm) {
    daiLyForm.addEventListener('submit', function (e) {
      e.preventDefault();
      
      const submitBtn = this.querySelector('[type="submit"]');
      const originalBtnText = submitBtn.textContent;
      submitBtn.disabled = true;
      submitBtn.textContent = 'Đang gửi...';

      const formData = new FormData(this);
      
      fetch(goldenbeeData.ajaxUrl, {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert(data.data.message);
          daiLyForm.reset();
        } else {
          alert('Lỗi: ' + data.data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra. Vui lòng thử lại.');
      })
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = originalBtnText;
      });
    });
  }
})();
