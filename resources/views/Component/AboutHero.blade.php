{{-- ============================================================
     APEXBOOKS — ABOUT HERO
     Full-screen parallax hero with word-by-word text animation
     ============================================================ --}}
<section class="about-hero" id="aboutHero">

    {{-- Fixed background image --}}
    <div class="about-hero-bg">
        <img
            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=2000&auto=format&fit=crop"
            alt="Accounting professional">
        <div class="about-hero-overlay"></div>
    </div>

    {{-- Hero content --}}
    <div class="about-hero-content">
        <div class="about-hero-inner">

            <div class="about-hero-eyebrow" data-hero-item>
                <span>About Apexbooks</span>
            </div>

            <h1 class="about-hero-title">
                <span class="about-hero-word">Building</span>
                <span class="about-hero-word">stronger</span><br>
                <span class="about-hero-word">financial</span>
                <span class="about-hero-word">foundations</span><br>
                <span class="about-hero-word">through</span>
                <span class="about-hero-word">expertise</span>
            </h1>

        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="about-hero-scroll" data-hero-item>
        <span>Scroll</span>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 12 15 18 9"/>
        </svg>
    </div>

</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/about-hero.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/about-hero.js') }}" defer></script>
    @endpush
@endonce