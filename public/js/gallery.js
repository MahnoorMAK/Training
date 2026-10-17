/**
 * Gallery — "LEDGEINVO" letter-shaped images
 * Pure CSS hover expand. JS handles nothing but the entrance reveal.
 */
(function () {
    'use strict';

    var section = document.getElementById('gallery');
    if (!section) return;

    if (section.dataset.galleryInit === '1') return;
    section.dataset.galleryInit = '1';

    /* Optional entrance fade */
    var wrap = section.querySelector('.gallery-wrap');
    if (wrap) {
        requestAnimationFrame(function () {
            wrap.style.opacity = '1';
        });
    }
})();