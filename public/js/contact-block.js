/**
 * Contact Block
 * - Reveal-on-scroll:
 *     • Info card #1 + form fade in together
 *     • Then cards #2, #3, #4 appear one by one
 * - Contact form submission (demo)
 * - Card hover enhancement (magnetic tilt)
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var block = document.querySelector('[data-ctb]');
    if (!block) return;

    if (block.dataset.ctbInit === '1') return;
    block.dataset.ctbInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       1. REVEAL ON SCROLL
       Card #1 + form reveal together.
       Cards #2–#4 follow one by one.
       ========================================================== */

    var infoCards = block.querySelectorAll('.ctb__card');
    var formWrap  = block.querySelector('.ctb__form-wrap');

    // Delay between each FOLLOW-UP card (ms).
    // Higher = slower, more spaced-out reveal.
    var CARD_STAGGER = 500;

    // Delay after card #1 + form before card #2 starts (ms).
    // Gives the first pair a moment to settle.
    var INITIAL_PAUSE = 900;

    function revealSequence() {
        if (!infoCards.length) return;

        // ---- STEP 1: Card #1 + Form appear together ----
        infoCards[0].classList.add('is-visible');
        if (formWrap) formWrap.classList.add('is-visible');

        // ---- STEP 2: Cards #2, #3, #4 appear one by one ----
        var remainingCards = Array.prototype.slice.call(infoCards, 1);

        remainingCards.forEach(function (card, i) {
            setTimeout(function () {
                card.classList.add('is-visible');
            }, INITIAL_PAUSE + (i * CARD_STAGGER));
        });
    }

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    revealSequence();
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -80px 0px'
        });

        io.observe(block);
    } else {
        // Fallback — show everything immediately
        infoCards.forEach(function (card) { card.classList.add('is-visible'); });
        if (formWrap) formWrap.classList.add('is-visible');
    }

    /* ==========================================================
       2. CONTACT FORM
       ========================================================== */
    var contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            var formData = {
                firstName: (document.getElementById('first_name') || {}).value || '',
                lastName:  (document.getElementById('last_name')  || {}).value || '',
                email:     (document.getElementById('email')      || {}).value || '',
                phone:     (document.getElementById('phone')      || {}).value || '',
                subject:   (document.getElementById('subject')    || {}).value || '',
                message:   (document.getElementById('message')    || {}).value || ''
            };

            formData.firstName = formData.firstName.trim();
            formData.lastName  = formData.lastName.trim();
            formData.email     = formData.email.trim();
            formData.phone     = formData.phone.trim();
            formData.message   = formData.message.trim();

            if (!formData.firstName || !formData.lastName ||
                !formData.email || !formData.subject || !formData.message) {
                alert('Please fill in all required fields before submitting.');
                return;
            }

            console.log('Contact form submitted:', formData);

            alert('Thanks, ' + formData.firstName + "! We'll be in touch soon.");
            contactForm.reset();
        });
    }

    /* ==========================================================
       3. SUBTLE MOUSE TILT ON INFO CARDS
       ========================================================== */
    if (reduced) return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    infoCards.forEach(function (card) {
        var frameId = null;
        var targetX = 0, targetY = 0;
        var currentX = 0, currentY = 0;
        var running = false;

        function onMove(e) {
            var rect = card.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width  - 0.5;
            var y = (e.clientY - rect.top)  / rect.height - 0.5;

            targetX = x * 4;
            targetY = -y * 4;

            if (!running) {
                running = true;
                frameId = requestAnimationFrame(step);
            }
        }

        function onLeave() {
            targetX = 0;
            targetY = 0;
            if (!running) {
                running = true;
                frameId = requestAnimationFrame(step);
            }
        }

        function step() {
            var dx = targetX - currentX;
            var dy = targetY - currentY;

            currentX += dx * 0.15;
            currentY += dy * 0.15;

            card.style.transform =
                'translateY(' + (currentY === 0 && currentX === 0 ? 0 : -4) + 'px) ' +
                'perspective(800px) rotateX(' + currentY.toFixed(2) + 'deg) rotateY(' + currentX.toFixed(2) + 'deg)';

            if (Math.abs(dx) < 0.05 && Math.abs(dy) < 0.05) {
                currentX = targetX;
                currentY = targetY;
                running = false;
                if (targetX === 0 && targetY === 0) {
                    card.style.transform = '';
                }
                return;
            }

            frameId = requestAnimationFrame(step);
        }

        card.addEventListener('mousemove', onMove);
        card.addEventListener('mouseleave', onLeave);
    });
})();