{{-- ============================================================
     resources/views/Component/social-channels.blade.php
     Social media · Community · App stores
     Usage: @include('Component.social-channels')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/social-channels.css') }}">
    @endpush
@endonce

<section class="soc" id="social-channels" data-soc>

    {{-- Header --}}
    <header class="soc__head" data-soc-reveal>
        <span class="soc__eyebrow">
            <span class="soc__eyebrow-dot"></span>
            Social &amp; Community
        </span>
        <h2 class="soc__title">
            Join the <span class="soc__title-accent">conversation.</span>
        </h2>
        <p class="soc__subtitle">
            Follow us, join our community, or take Apexbooks with you on the go —
            wherever you work, we're one tap away.
        </p>
    </header>

    {{-- Grid --}}
    <div class="soc__grid">

        {{-- Group 1 — Social Profiles --}}
        <div class="soc__group" data-soc-reveal>
            <h3 class="soc__group-title">Follow Apexbooks</h3>

            <div class="soc__links">

                <a href="https://twitter.com/apexbooks" target="_blank" rel="noopener" class="soc__link" aria-label="Twitter / X">
                    <span class="soc__link-icon soc__link-icon--twitter">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23 4.94c-.82.36-1.7.6-2.62.72a4.55 4.55 0 0 0 2-2.51c-.88.52-1.85.9-2.89 1.1A4.54 4.54 0 0 0 11.7 8.4c0 .35.04.7.11 1.03A12.87 12.87 0 0 1 2.5 4.5a4.53 4.53 0 0 0 1.4 6.05 4.5 4.5 0 0 1-2.05-.57v.06c0 2.2 1.56 4.03 3.63 4.45a4.56 4.56 0 0 1-2.05.08 4.54 4.54 0 0 0 4.24 3.15A9.1 9.1 0 0 1 1 19.54a12.83 12.83 0 0 0 6.95 2.04c8.34 0 12.9-6.9 12.9-12.9 0-.2 0-.39-.01-.58A9.2 9.2 0 0 0 23 4.94z"/>
                        </svg>
                    </span>
                    <span class="soc__link-body">
                        <strong>Twitter / X</strong>
                        <small>@apexbooks</small>
                    </span>
                    <span class="soc__link-arrow">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H8M17 7V16"/>
                        </svg>
                    </span>
                </a>

                <a href="https://linkedin.com/company/apexbooks" target="_blank" rel="noopener" class="soc__link" aria-label="LinkedIn">
                    <span class="soc__link-icon soc__link-icon--linkedin">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.36V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0z"/>
                        </svg>
                    </span>
                    <span class="soc__link-body">
                        <strong>LinkedIn</strong>
                        <small>Company page</small>
                    </span>
                    <span class="soc__link-arrow">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H8M17 7V16"/>
                        </svg>
                    </span>
                </a>

                <a href="https://facebook.com/apexbooks" target="_blank" rel="noopener" class="soc__link" aria-label="Facebook">
                    <span class="soc__link-icon soc__link-icon--facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.24.19 2.24.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12z"/>
                        </svg>
                    </span>
                    <span class="soc__link-body">
                        <strong>Facebook</strong>
                        <small>/apexbooks</small>
                    </span>
                    <span class="soc__link-arrow">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H8M17 7V16"/>
                        </svg>
                    </span>
                </a>

                <a href="https://instagram.com/apexbooks" target="_blank" rel="noopener" class="soc__link" aria-label="Instagram">
                    <span class="soc__link-icon soc__link-icon--instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </span>
                    <span class="soc__link-body">
                        <strong>Instagram</strong>
                        <small>@apexbooks</small>
                    </span>
                    <span class="soc__link-arrow">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H8M17 7V16"/>
                        </svg>
                    </span>
                </a>

            </div>
        </div>

        {{-- Group 2 — Community --}}
        <div class="soc__group" data-soc-reveal>
            <h3 class="soc__group-title">Community Forum</h3>

            <a href="https://community.apexbooks.com" target="_blank" rel="noopener" class="soc__feature soc__feature--community">
                <div class="soc__feature-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        <line x1="8" y1="9" x2="16" y2="9"/>
                        <line x1="8" y1="13" x2="13" y2="13"/>
                    </svg>
                </div>

                <div class="soc__feature-body">
                    <h4>Join 12,000+ finance pros</h4>
                    <p>
                        Ask questions, share best practices, and get answers from other
                        accountants and business owners using Apexbooks.
                    </p>
                    <span class="soc__feature-cta">
                        Visit Community
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </span>
                </div>

                <span class="soc__feature-shine" aria-hidden="true"></span>
            </a>
        </div>

        {{-- Group 3 — App Stores --}}
        <div class="soc__group soc__group--wide" data-soc-reveal>
            <h3 class="soc__group-title">Get the mobile app</h3>

            <div class="soc__stores">

                <a href="https://apps.apple.com/app/apexbooks" target="_blank" rel="noopener" class="soc__store" aria-label="Download on the App Store">
                    <span class="soc__store-icon">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.05 12.04c-.03-2.87 2.34-4.24 2.44-4.31-1.33-1.94-3.4-2.21-4.13-2.24-1.76-.18-3.43 1.04-4.32 1.04-.89 0-2.27-1.01-3.73-.98-1.92.03-3.69 1.11-4.68 2.83-2 3.46-.51 8.59 1.43 11.4.95 1.37 2.08 2.91 3.57 2.86 1.43-.06 1.97-.93 3.7-.93 1.73 0 2.21.93 3.72.9 1.54-.03 2.51-1.4 3.45-2.78 1.09-1.6 1.54-3.15 1.56-3.23-.03-.01-3-1.15-3.03-4.56zM14.13 3.56c.79-.96 1.33-2.29 1.18-3.61-1.14.05-2.53.76-3.35 1.72-.74.85-1.39 2.21-1.22 3.51 1.27.1 2.58-.64 3.39-1.62z"/>
                        </svg>
                    </span>
                    <span class="soc__store-text">
                        <small>Download on the</small>
                        <strong>App Store</strong>
                    </span>
                </a>

                <a href="https://play.google.com/store/apps/details?id=com.apexbooks" target="_blank" rel="noopener" class="soc__store" aria-label="Get it on Google Play">
                    <span class="soc__store-icon">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3.6 1.7c-.4.2-.6.6-.6 1.1v18.4c0 .5.2.9.6 1.1l.1.1 10.3-10.3v-.2L3.6 1.7zM17.5 8.1l-3.1 3.1 3.1 3.1 3.7-2.1c1-.6 1-1.5 0-2.1l-3.7-2zM6.3.6l10.4 5.9-2.8 2.8L6.3.6zM6.3 23.4l7.6-8.7 2.8 2.8-10.4 5.9z"/>
                        </svg>
                    </span>
                    <span class="soc__store-text">
                        <small>Get it on</small>
                        <strong>Google Play</strong>
                    </span>
                </a>

                <a href="https://appgallery.huawei.com/app/apexbooks" target="_blank" rel="noopener" class="soc__store" aria-label="Explore it on AppGallery">
                    <span class="soc__store-icon">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/>
                            <path d="M12 22V12"/>
                            <path d="M22 7l-10 5"/>
                            <path d="M2 7l10 5"/>
                        </svg>
                    </span>
                    <span class="soc__store-text">
                        <small>Explore it on</small>
                        <strong>AppGallery</strong>
                    </span>
                </a>

            </div>
        </div>

    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/social-channels.js') }}" defer></script>
    @endpush
@endonce