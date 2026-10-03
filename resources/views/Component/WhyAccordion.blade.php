
<section class="why-section" id="whySection">

    <div class="why-header">
        <h2 class="why-title">Why Use Apexbooks?</h2>
    </div>

    <div class="why-list">

        {{-- Item 1 (open by default) --}}
        <div class="why-item is-open">
            <button class="why-trigger" type="button" aria-expanded="true">
                <span>Professional Double-Entry Precision</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Ensure absolute accuracy in your financial records with our robust double-entry system.
                    Every transaction is automatically balanced for bulletproof audit trails. Our system
                    validates every entry to prevent errors, giving you peace of mind during tax season
                    and financial audits.
                </div>
            </div>
        </div>

        {{-- Item 2 --}}
        <div class="why-item">
            <button class="why-trigger" type="button" aria-expanded="false">
                <span>Strategic Asset Life-Cycle Management</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Track every asset from acquisition to disposal. Automatically calculate depreciation,
                    log maintenance history, and monitor performance. Get proactive alerts before assets
                    lose value or need replacement — so you can plan capital expenditure with confidence.
                </div>
            </div>
        </div>

        {{-- Item 3 --}}
        <div class="why-item">
            <button class="why-trigger" type="button" aria-expanded="false">
                <span>Dynamic Budget Planning &amp; Analysis</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Build department-level budgets and compare them against real-time actuals. Variance
                    analysis highlights exactly where you're over or under, so you can adjust allocations
                    mid-quarter — not after it's too late. Roll forward last year's numbers in one click.
                </div>
            </div>
        </div>

        {{-- Item 4 --}}
        <div class="why-item">
            <button class="why-trigger" type="button" aria-expanded="false">
                <span>Unified Business Module Ecosystem</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Sales, purchases, inventory, payroll, and accounting all share the same data. No more
                    syncing between tools or reconciling duplicates. Everything updates in real time, so
                    your financial statements are always accurate to the minute.
                </div>
            </div>
        </div>

        {{-- Item 5 --}}
        <div class="why-item">
            <button class="why-trigger" type="button" aria-expanded="false">
                <span>Seamless Payment Integration</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Connect banks, payment gateways, and invoice systems natively. Transactions import
                    automatically and categorize themselves — no manual entry. Reconcile accounts in
                    minutes, not hours, with smart matching rules you control.
                </div>
            </div>
        </div>

        {{-- Item 6 --}}
        <div class="why-item">
            <button class="why-trigger" type="button" aria-expanded="false">
                <span>Powerful Reporting &amp; Analytics</span>
                <svg class="why-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </button>
            <div class="why-panel">
                <div class="why-panel-inner">
                    Generate P&amp;L, balance sheet, cash flow, and custom reports in seconds. Interactive
                    dashboards surface the metrics that matter, with drill-downs into any line item.
                    Export to Excel or share live links with your team and stakeholders.
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Load once --}}
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/whyaccordion.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/whyaccordion.js') }}" defer></script>
    @endpush
@endonce