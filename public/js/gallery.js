(function () {
    'use strict';

    var section = document.getElementById('gallery');
    if (!section) return;

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    section.classList.add('is-visible');
                    observer.unobserve(section);
                }
            });
        }, { threshold: 0.2 });
        observer.observe(section);
    } else {
        section.classList.add('is-visible');
    }
})();