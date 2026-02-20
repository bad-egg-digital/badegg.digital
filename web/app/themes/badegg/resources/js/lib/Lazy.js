export default function LazyLoadInit()
{
  document.addEventListener('DOMContentLoaded', LazyLoad());
}

function LazyLoad() {

  const lazyElements = [].slice.call(
    document.querySelectorAll('img.lazy, .lazy-bg')
  );

  if ('IntersectionObserver' in window) {
    const lazyObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        loadLazyElement(el);
        observer.unobserve(el);
      });
    });

    lazyElements.forEach(el => lazyObserver.observe(el));
  } else {
    // Optional fallback: load everything immediately
    lazyElements.forEach(el => {
      if (el.tagName === 'IMG' && el.dataset.src) {
        el.src = el.dataset.src;
      } else if (el.dataset.bg) {
        el.style.backgroundImage = `url("${el.dataset.bg}")`;
      }
    });
  }
}

function loadLazyElement(el, cache = false) {
  if (el.tagName === 'IMG') {
    if (el.dataset.src) el.src = el.dataset.src;
    if (el.dataset.srcset) el.srcset = el.dataset.srcset;

    el.classList.remove('lazy');

  } else if (el.dataset.bg) {
    el.style.backgroundImage = `url("${el.dataset.bg}")`;

    el.classList.remove('lazy-bg');
    el.classList.add('lazy-loaded');
  }

  if(cache) {
    console.log('loaded lazy img from cache');
  }
}
