/**
 * Support Hours component
 * - Staggered reveal-on-scroll
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('support-hours');
    if (!section) return;

    if (section.dataset.supInit === '1') return;
    section.dataset.supInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       REVEAL — header, then cards one by one
       ========================================================== */
    var revealEls = section.querySelectorAll('[data-sup-reveal]');

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    // Stagger each child after the first reveal
                    var delay = Array.prototype.indexOf.call(revealEls, entry.target) * 180;
                    setTimeout(function () {
                        entry.target.classList.add('is-visible');
                    }, delay);

                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -80px 0px'
        });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }
})();