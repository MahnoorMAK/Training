/* ============================================================
   STATS BAR — scroll-triggered reveal + number counting
   ============================================================ */
(function () {
    'use strict';

    function initStatsBar() {
        const bar = document.getElementById('statsBar');
        if (!bar) return;

        const items = bar.querySelectorAll('.stats-bar-item');
        if (!items.length) return;

        let hasAnimated = false;

        // Easing function for smooth counting
        function easeOutExpo(t) {
            return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        }

        // Animate a single number from 0 to target
        function animateNumber(el, target, duration, decimals, suffix) {
            const numberEl = el.querySelector('.stats-bar-number');
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

        // Reveal the whole bar and start counting
        function reveal() {
            if (hasAnimated) return;
            hasAnimated = true;

            bar.classList.add('is-visible');

            // Stagger each number animation
            items.forEach(function (item, i) {
                const target = parseFloat(item.dataset.target || '0');
                const decimals = parseInt(item.dataset.decimals || '0', 10);
                const suffix = item.dataset.suffix || '';
                const delay = 300 + i * 120;      // start after entrance

                setTimeout(function () {
                    animateNumber(item, target, 1800, decimals, suffix);
                }, delay);
            });
        }

        // IntersectionObserver — reveal when 30% is in view
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        reveal();
                        observer.unobserve(bar);
                    }
                });
            }, {
                threshold: 0.3,
                rootMargin: '0px 0px -60px 0px'
            });

            observer.observe(bar);
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