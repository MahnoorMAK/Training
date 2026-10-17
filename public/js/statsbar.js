/* ============================================================
   STATS NAVBAR
   Bar spreads slowly, text appears fast, numbers count fast.
   ============================================================ */
(function () {
    'use strict';

    function initStatsBar() {
        const section = document.getElementById('statsBar');
        if (!section) return;

        const items = section.querySelectorAll('.stats-nav-item');
        if (!items.length) return;

        let hasAnimated = false;

        function easeOutExpo(t) {
            return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        }

        function animateNumber(el, target, duration, decimals) {
            const numberEl = el.querySelector('.stats-nav-number');
            const startTime = performance.now();

            function tick(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = easeOutExpo(progress);
                const value = eased * target;

                if (decimals > 0) {
                    numberEl.textContent = value.toFixed(decimals);
                } else {
                    numberEl.textContent = Math.floor(value).toLocaleString();
                }

                if (progress < 1) {
                    requestAnimationFrame(tick);
                } else {
                    numberEl.textContent = decimals > 0
                        ? target.toFixed(decimals)
                        : Math.floor(target).toLocaleString();
                }
            }

            requestAnimationFrame(tick);
        }

        function reveal() {
            if (hasAnimated) return;
            hasAnimated = true;

            section.classList.add('is-visible');

            items.forEach(function (item, i) {
                const target = parseFloat(item.dataset.target || '0');
                const decimals = parseInt(item.dataset.decimals || '0', 10);
                
                // Start counting right as the text starts fading in (300ms)
                // Stagger each counter by 400ms
                const delay = 300 + (i * 400); 

                setTimeout(function () {
                    // Fast count duration (1.2 seconds)
                    animateNumber(item, target, 1200, decimals);
                }, delay);
            });
        }

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        reveal();
                        observer.unobserve(section);
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '0px 0px -50px 0px'
            });

            observer.observe(section);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initStatsBar);
    } else {
        initStatsBar();
    }
})();