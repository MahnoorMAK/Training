{{-- ============================================================
     APEXBOOKS — MEGA MENU NAVBAR
     Smooth dropdown with staggered items + dual-layer links
     ============================================================ --}}
<nav class="mm-nav" id="mmNav">

    <div class="mm-container">

        {{-- Logo --}}
        <a href="/" class="mm-logo">
            <div class="mm-logo-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF" fill-opacity="0.95"/>
                    <path d="M3 7.5V16.5L12 22V13L3 7.5Z" fill="#FFFFFF" fill-opacity="0.65"/>
                    <path d="M21 7.5V16.5L12 22V13L21 7.5Z" fill="#FFFFFF" fill-opacity="0.85"/>
                </svg>
            </div>
            <span>LedgeInvo</span>
        </a>

        {{-- Nav links --}}
        <ul class="mm-menu">

            {{-- Simple link --}}
            <li class="mm-item">
                <a href="/" class="mm-link">
                    <span class="mm-link-text">
                        <span class="mm-link-inner">Home</span>
                        <span class="mm-link-inner mm-link-inner-dup">Home</span>
                    </span>
                </a>
            </li>

            {{-- Mega menu item --}}
            <li class="mm-item mm-has-mega">
                <button type="button" class="mm-link mm-link-toggle">
                    <span class="mm-link-text">
                        <span class="mm-link-inner">Services</span>
                        <span class="mm-link-inner mm-link-inner-dup">Services</span>
                    </span>
                    <svg class="mm-caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>

                {{-- Mega panel --}}
                <div class="mm-mega">
                    <div class="mm-mega-inner">

                        <div class="mm-mega-col">
                            <div class="mm-mega-heading">Accounting</div>
                            <ul class="mm-mega-list">
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h11l5 5v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"/><path d="M15 4v5h5"/><path d="M8 13h8M8 17h5"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Double-Entry Ledger</span>
                                        <span class="mm-mega-desc">Balanced, audit-ready records</span>
                                    </span>
                                </a></li>
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Budget Planning</span>
                                        <span class="mm-mega-desc">Forecast and track variance</span>
                                    </span>
                                </a></li>
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Payment Tracking</span>
                                        <span class="mm-mega-desc">Real-time cash flow visibility</span>
                                    </span>
                                </a></li>
                            </ul>
                        </div>

                        <div class="mm-mega-col">
                            <div class="mm-mega-heading">Operations</div>
                            <ul class="mm-mega-list">
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Asset Tracking</span>
                                        <span class="mm-mega-desc">Complete lifecycle visibility</span>
                                    </span>
                                </a></li>
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Retainer Invoicing</span>
                                        <span class="mm-mega-desc">Automated recurring billing</span>
                                    </span>
                                </a></li>
                                <li><a href="#">
                                    <span class="mm-mega-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                                    </span>
                                    <span class="mm-mega-text">
                                        <span class="mm-mega-title">Goal Tracking</span>
                                        <span class="mm-mega-desc">KPI dashboards and alerts</span>
                                    </span>
                                </a></li>
                            </ul>
                        </div>

                        <div class="mm-mega-col mm-mega-feature">
                            <div class="mm-mega-heading">Featured</div>
                            <a href="#" class="mm-feature-card">
                                <div class="mm-feature-img">
                                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=600&auto=format&fit=crop" alt="">
                                </div>
                                <div class="mm-feature-text">
                                    <span class="mm-feature-title">Financial Analytics Suite</span>
                                    <span class="mm-feature-desc">See every metric at a glance</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </li>

            {{-- Second mega item --}}
            <li class="mm-item mm-has-mega">
                <button type="button" class="mm-link mm-link-toggle">
                    <span class="mm-link-text">
                        <span class="mm-link-inner">Solutions</span>
                        <span class="mm-link-inner mm-link-inner-dup">Solutions</span>
                    </span>
                    <svg class="mm-caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>

                <div class="mm-mega">
                    <div class="mm-mega-inner">
                        <div class="mm-mega-col">
                            <div class="mm-mega-heading">By Industry</div>
                            <ul class="mm-mega-list">
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">Startups</span><span class="mm-mega-desc">Books that scale with you</span></span></a></li>
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">Enterprises</span><span class="mm-mega-desc">Multi-entity consolidation</span></span></a></li>
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">Accountants</span><span class="mm-mega-desc">Manage client books</span></span></a></li>
                            </ul>
                        </div>
                        <div class="mm-mega-col">
                            <div class="mm-mega-heading">By Role</div>
                            <ul class="mm-mega-list">
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">Founders</span><span class="mm-mega-desc">Stay close to your numbers</span></span></a></li>
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">CFOs</span><span class="mm-mega-desc">Board-ready reports</span></span></a></li>
                                <li><a href="#"><span class="mm-mega-text"><span class="mm-mega-title">Operations</span><span class="mm-mega-desc">Automate the busywork</span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            {{-- Simple link --}}
            <li class="mm-item">
                <a href="/About" class="mm-link">
                    <span class="mm-link-text">
                        <span class="mm-link-inner">About</span>
                        <span class="mm-link-inner mm-link-inner-dup">About</span>
                    </span>
                </a>
            </li>

            {{-- Simple link --}}
            <li class="mm-item">
                <a href="/Contact" class="mm-link">
                    <span class="mm-link-text">
                        <span class="mm-link-inner">Contact</span>
                        <span class="mm-link-inner mm-link-inner-dup">Contact</span>
                    </span>
                </a>
            </li>

        </ul>

        {{-- Actions --}}
        <div class="mm-actions">
            <a href="/Login1" class="mm-btn mm-btn-ghost">
                <span>Login</span>
            </a>
            <a href="/register" class="mm-btn mm-btn-primary">
                <span>Get Started</span>
                <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor"><path d="M10.3 3.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4L14.6 11H3a1 1 0 1 1 0-2h11.6L10.3 4.7a1 1 0 0 1 0-1.4z"/></svg>
            </a>
        </div>
    </div>
</nav>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/megamenu.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/megamenu.js') }}" defer></script>
    @endpush
@endonce