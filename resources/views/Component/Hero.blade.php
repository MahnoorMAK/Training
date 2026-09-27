{{-- ============================================================
     APEXBOOKS — HERO SECTION
     Full-screen split hero with framed auto-slider
     ============================================================ --}}
<section class="apex-hero">

    {{-- ==================== LEFT: TEXT ==================== --}}
    <div class="apex-hero-text">

        <div class="apex-hero-badge">
            <span class="badge-dot"></span>
            Trusted by 12,000+ finance teams
        </div>

        <h1 class="apex-hero-title">
            Financial clarity<br>
            <span class="accent">for modern business.</span>
        </h1>

        <p class="apex-hero-subtitle">
            Automate your accounting, understand your numbers in real time,
            and make confident decisions — all from a single platform built
            for the way modern teams work.
        </p>

        <div class="apex-hero-actions">
            <a href="/register" class="apex-btn-primary">
                Get started free
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor"><path d="M10.3 3.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4L14.6 11H3a1 1 0 1 1 0-2h11.6L10.3 4.7a1 1 0 0 1 0-1.4z"/></svg>
            </a>
            <a href="/Service" class="apex-btn-ghost">
                See how it works
            </a>
        </div>

        <div class="apex-hero-stats">
            <div class="stat">
                <div class="stat-value">$2.4B+</div>
                <div class="stat-label">Reconciled annually</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <div class="stat-value">99.98%</div>
                <div class="stat-label">Uptime guarantee</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <div class="stat-value">4.9/5</div>
                <div class="stat-label">Customer rating</div>
            </div>
        </div>
    </div>

    {{-- ==================== RIGHT: SLIDER ==================== --}}
    <div class="apex-hero-visual">

        {{-- Frame stack (aesthetic depth) --}}
        <div class="apex-frame-stack">
            <div class="frame frame-behind-1"></div>
            <div class="frame frame-behind-2"></div>
            <div class="frame frame-behind-3"></div>
        </div>

        {{-- Slider --}}
        <div class="apex-slider">
            <div class="slider-track">

                {{-- Slide 1 --}}
                <div class="slide active">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1600&auto=format&fit=crop" alt="Accounting workspace">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Real-time dashboards</span>
                        <span class="slide-caption-sub">Live financial KPIs at a glance</span>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1600&auto=format&fit=crop" alt="Financial analytics">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Advanced analytics</span>
                        <span class="slide-caption-sub">See the story behind your numbers</span>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1600&auto=format&fit=crop" alt="Team collaboration">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Built for teams</span>
                        <span class="slide-caption-sub">Collaborate on the numbers that matter</span>
                    </div>
                </div>

                {{-- Slide 4 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=1600&auto=format&fit=crop" alt="Growth chart">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Grow with confidence</span>
                        <span class="slide-caption-sub">Reports that turn data into decisions</span>
                    </div>
                </div>

            </div>

            {{-- Progress dots --}}
            <div class="slider-dots">
                <button class="dot active" data-index="0"></button>
                <button class="dot" data-index="1"></button>
                <button class="dot" data-index="2"></button>
                <button class="dot" data-index="3"></button>
            </div>
        </div>
    </div>

</section>

<style>
/* ============================================================
   HERO SECTION
   ============================================================ */
.apex-hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: calc(100vh - 80px);
    width: 100%;
    background: #F8F9FC;
    overflow: hidden;
    position: relative;
}

[data-theme="dark"] .apex-hero {
    background: #0e0e12;
}

/* ============================================================
   LEFT — TEXT
   ============================================================ */
.apex-hero-text {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 80px 80px 80px 96px;
    position: relative;
    z-index: 2;
}

/* Badge */
.apex-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    background: rgba(126, 107, 181, 0.1);
    color: #7E6BB5;
    border: 1px solid rgba(126, 107, 181, 0.2);
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.02em;
    margin-bottom: 32px;
    align-self: flex-start;
    animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
}

.badge-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10B981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    animation: pulseDot 2s ease-in-out infinite;
}

@keyframes pulseDot {
    0%, 100% { transform: scale(1); }
    50%      { transform: scale(1.2); }
}

[data-theme="dark"] .apex-hero-badge {
    background: rgba(139, 92, 246, 0.15);
    color: #a78bfa;
    border-color: rgba(139, 92, 246, 0.3);
}

/* Title */
.apex-hero-title {
    font-size: clamp(2.5rem, 4.5vw, 4rem);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.03em;
    color: #1E293B;
    margin-bottom: 24px;
    animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
}

.apex-hero-title .accent {
    background: linear-gradient(135deg, #8E7AC7 0%, #7E6BB5 50%, #5a4a8a 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

[data-theme="dark"] .apex-hero-title {
    color: #f9fafb;
}

/* Subtitle */
.apex-hero-subtitle {
    font-size: 1.075rem;
    line-height: 1.7;
    color: #64748B;
    max-width: 520px;
    margin-bottom: 40px;
    animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
}

[data-theme="dark"] .apex-hero-subtitle {
    color: #9ca3af;
}

/* Buttons */
.apex-hero-actions {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 56px;
    animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
}

.apex-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 26px;
    background: linear-gradient(135deg, #8E7AC7 0%, #7E6BB5 50%, #6A589D 100%);
    color: #fff;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 10px 24px -8px rgba(126, 107, 181, 0.6);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.apex-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 16px 32px -10px rgba(126, 107, 181, 0.75);
}

.apex-btn-primary svg {
    transition: transform 0.3s ease;
}

.apex-btn-primary:hover svg {
    transform: translateX(4px);
}

.apex-btn-ghost {
    display: inline-flex;
    align-items: center;
    padding: 14px 26px;
    background: transparent;
    color: #1E293B;
    font-size: 0.95rem;
    font-weight: 600;
    border: 1.5px solid #E2E8F0;
    border-radius: 10px;
    text-decoration: none;
    transition: border-color 0.2s, color 0.2s;
}

.apex-btn-ghost:hover {
    border-color: #7E6BB5;
    color: #7E6BB5;
}

[data-theme="dark"] .apex-btn-ghost {
    color: #f9fafb;
    border-color: #2d2d2d;
}
[data-theme="dark"] .apex-btn-ghost:hover {
    border-color: #a78bfa;
    color: #a78bfa;
}

/* Stats */
.apex-hero-stats {
    display: flex;
    align-items: center;
    gap: 24px;
    padding-top: 32px;
    border-top: 1px solid #E2E8F0;
    animation: heroFadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
}

[data-theme="dark"] .apex-hero-stats {
    border-top-color: #2d2d2d;
}

.stat-divider {
    width: 1px;
    height: 32px;
    background: #E2E8F0;
}

[data-theme="dark"] .stat-divider {
    background: #2d2d2d;
}

.stat-value {
    font-size: 1.35rem;
    font-weight: 800;
    color: #1E293B;
    letter-spacing: -0.02em;
    margin-bottom: 2px;
}

.stat-label {
    font-size: 0.78rem;
    color: #64748B;
    font-weight: 500;
}

[data-theme="dark"] .stat-value { color: #f9fafb; }
[data-theme="dark"] .stat-label { color: #9ca3af; }

@keyframes heroFadeUp {
    0%   { opacity: 0; transform: translateY(24px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* ============================================================
   RIGHT — SLIDER
   ============================================================ */
.apex-hero-visual {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 80px 96px 80px 40px;
    overflow: hidden;
}

/* Framed stack behind the slider */
.apex-frame-stack {
    position: absolute;
    inset: 80px 96px 80px 40px;
    pointer-events: none;
}

.frame {
    position: absolute;
    border-radius: 24px;
    border: 1.5px solid rgba(126, 107, 181, 0.35);
    background: transparent;
}

.frame-behind-1 {
    inset: 0;
    transform: translate(20px, 20px) rotate(3deg);
    animation: frameDrift1 12s ease-in-out infinite;
}

.frame-behind-2 {
    inset: 0;
    transform: translate(40px, 40px) rotate(6deg);
    border-color: rgba(126, 107, 181, 0.2);
    animation: frameDrift2 14s ease-in-out infinite;
}

.frame-behind-3 {
    inset: 0;
    transform: translate(60px, 60px) rotate(9deg);
    border-color: rgba(126, 107, 181, 0.1);
    animation: frameDrift3 16s ease-in-out infinite;
}

@keyframes frameDrift1 {
    0%, 100% { transform: translate(20px, 20px) rotate(3deg); }
    50%      { transform: translate(14px, 14px) rotate(1.5deg); }
}

@keyframes frameDrift2 {
    0%, 100% { transform: translate(40px, 40px) rotate(6deg); }
    50%      { transform: translate(30px, 30px) rotate(3.5deg); }
}

@keyframes frameDrift3 {
    0%, 100% { transform: translate(60px, 60px) rotate(9deg); }
    50%      { transform: translate(48px, 48px) rotate(6deg); }
}

/* Slider container */
.apex-slider {
    position: relative;
    width: 100%;
    max-width: 580px;
    aspect-ratio: 4 / 5;
    border-radius: 24px;
    overflow: hidden;
    box-shadow:
        0 40px 80px -20px rgba(30, 24, 48, 0.35),
        0 0 0 1px rgba(126, 107, 181, 0.15);
    animation: sliderFloat 8s ease-in-out infinite;
    z-index: 2;
}

@keyframes sliderFloat {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-12px); }
}

/* Track holds all slides */
.slider-track {
    position: relative;
    width: 100%;
    height: 100%;
}

/* Individual slide */
.slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    transform: scale(1.05);
    transition: opacity 1s ease-in-out, transform 6s ease-out;
    z-index: 1;
}

.slide.active {
    opacity: 1;
    transform: scale(1);
    z-index: 2;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Caption */
.slide-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 40px 32px 28px;
    background: linear-gradient(to top, rgba(15, 12, 25, 0.9) 0%, rgba(15, 12, 25, 0.6) 50%, transparent 100%);
    display: flex;
    flex-direction: column;
    gap: 4px;
    transform: translateY(8px);
    opacity: 0;
    transition: opacity 0.6s ease 0.3s, transform 0.6s ease 0.3s;
}

.slide.active .slide-caption {
    opacity: 1;
    transform: translateY(0);
}

.slide-caption-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #fff;
    letter-spacing: -0.01em;
}

.slide-caption-sub {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.75);
}

/* Progress dots */
.slider-dots {
    position: absolute;
    bottom: 28px;
    right: 28px;
    display: flex;
    gap: 8px;
    z-index: 5;
}

.dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.35);
    cursor: pointer;
    padding: 0;
    transition: all 0.3s ease;
}

.dot:hover {
    background: rgba(255, 255, 255, 0.6);
}

.dot.active {
    background: #fff;
    width: 26px;
    border-radius: 4px;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 1100px) {
    .apex-hero-text { padding: 60px 40px; }
    .apex-hero-visual { padding: 60px 40px 60px 20px; }
    .apex-frame-stack { inset: 60px 40px 60px 20px; }
}

@media (max-width: 900px) {
    .apex-hero {
        grid-template-columns: 1fr;
        min-height: auto;
    }

    .apex-hero-text {
        padding: 60px 24px 40px;
        text-align: center;
        align-items: center;
    }

    .apex-hero-badge { align-self: center; }
    .apex-hero-subtitle { margin-left: auto; margin-right: auto; }
    .apex-hero-actions { justify-content: center; }
    .apex-hero-stats { justify-content: center; flex-wrap: wrap; }
    .stat-divider { display: none; }

    .apex-hero-visual {
        padding: 40px 24px 60px;
    }

    .apex-frame-stack { display: none; }

    .apex-slider {
        max-width: 420px;
        aspect-ratio: 4 / 5;
        margin: 0 auto;
    }
}
</style>

<script>
/* ============================================================
   HERO SLIDER
   ============================================================ */
(function () {
    const slides = document.querySelectorAll('.apex-slider .slide');
    const dots = document.querySelectorAll('.apex-slider .dot');
    if (!slides.length) return;

    let current = 0;
    let timer = null;
    const INTERVAL = 4000; // 4 seconds

    function goTo(index) {
        slides[current].classList.remove('active');
        dots[current]?.classList.remove('active');

        current = (index + slides.length) % slides.length;

        slides[current].classList.add('active');
        dots[current]?.classList.add('active');
    }

    function next() {
        goTo(current + 1);
    }

    function start() {
        stop();
        timer = setInterval(next, INTERVAL);
    }

    function stop() {
        if (timer) clearInterval(timer);
        timer = null;
    }

    // Dots clickable
    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            goTo(parseInt(this.dataset.index, 10));
            start(); // restart timer
        });
    });

    // Pause when tab hidden (saves CPU)
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) stop();
        else start();
    });

    // Start
    start();
})();
</script>