{{-- ============================================================
     resources/views/Component/self-service.blade.php
     Self-service hub — FAQ · Help Center · Login · Track ticket
     Usage: @include('Component.self-service')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/self-service.css') }}">
    @endpush
@endonce

<section class="self" id="self-service" data-self>

    {{-- Header --}}
    <header class="self__head" data-self-reveal>
        <span class="self__eyebrow">
            <span class="self__eyebrow-dot"></span>
            Self-Service &amp; Help
        </span>
        <h2 class="self__title">
            Find answers <span class="self__title-accent">in seconds.</span>
        </h2>
        <p class="self__subtitle">
            Most questions are answered instantly in our knowledge base. Skip the
            wait — get what you need, right now.
        </p>
    </header>

    {{-- Grid --}}
    <div class="self__grid">

        {{-- Card 1 — FAQ --}}
        <a href="/faqs" class="self__card" data-self-reveal>
            <div class="self__card-icon self__card-icon--faq">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                    <line x1="12" y1="17" x2="12.01" y2="17"/>
                </svg>
            </div>

            <div class="self__card-body">
                <h3 class="self__card-title">Frequently Asked Questions</h3>
                <p class="self__card-desc">
                    Quick answers to the most common questions about pricing, setup, and features.
                </p>

                <span class="self__card-cta">
                    Browse FAQs
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>

            <span class="self__card-shine" aria-hidden="true"></span>
        </a>

        {{-- Card 2 — Help Center --}}
        <a href="/help" class="self__card" data-self-reveal>
            <div class="self__card-icon self__card-icon--help">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>

            <div class="self__card-body">
                <h3 class="self__card-title">Help Center</h3>
                <p class="self__card-desc">
                    Guides, tutorials, and API references — organized by topic and role.
                </p>

                <span class="self__card-cta">
                    Open Help Center
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>

            <span class="self__card-shine" aria-hidden="true"></span>
        </a>

        {{-- Card 3 — Track Ticket --}}
        <a href="/support/tickets" class="self__card" data-self-reveal>
            <div class="self__card-icon self__card-icon--track">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    <path d="M11 8v3l2 2"/>
                </svg>
            </div>

            <div class="self__card-body">
                <h3 class="self__card-title">Track My Ticket</h3>
                <p class="self__card-desc">
                    Already raised a query? Check its status, see replies, and add updates.
                </p>

                <span class="self__card-cta">
                    View my tickets
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>

            <span class="self__card-shine" aria-hidden="true"></span>
        </a>

        {{-- Card 4 — Login --}}
        <a href="/login" class="self__card self__card--login" data-self-reveal>
            <div class="self__card-icon self__card-icon--login">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                    <polyline points="10 17 15 12 10 7"/>
                    <line x1="15" y1="12" x2="3" y2="12"/>
                </svg>
            </div>

            <div class="self__card-body">
                <h3 class="self__card-title">Sign In to Your Account</h3>
                <p class="self__card-desc">
                    Landed here by mistake? Head to your dashboard to manage everything.
                </p>

                <span class="self__card-cta">
                    Go to login
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </span>
            </div>

            <span class="self__card-shine" aria-hidden="true"></span>
        </a>

    </div>

    {{-- Bottom support line --}}
    <p class="self__footer" data-self-reveal>
        Still can't find what you need?
        <a href="#contact-form">Contact our team</a>
        — we typically reply within one business day.
    </p>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/self-service.js') }}" defer></script>
    @endpush
@endonce