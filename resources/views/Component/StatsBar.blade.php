{{-- ============================================================
     APEXBOOKS — STATS BAR
     Animated, scroll-triggered stat strip
     ============================================================ --}}
<section class="stats-bar" id="statsBar">
    <div class="shimmer-top"></div>
    <div class="stats-bar-inner">

        <div class="stats-bar-item" data-target="10000" data-suffix="+">
            <div class="stats-bar-value">
                <span class="stats-bar-number">0</span><span class="stats-bar-suffix">+</span>
            </div>
            <div class="stats-bar-label">Businesses Trust Us</div>
        </div>

        <div class="stats-bar-item" data-target="99.9" data-suffix="%" data-decimals="1">
            <div class="stats-bar-value">
                <span class="stats-bar-number">0</span><span class="stats-bar-suffix">%</span>
            </div>
            <div class="stats-bar-label">Uptime Guarantee</div>
        </div>

        <div class="stats-bar-item" data-target="24" data-suffix="/7">
            <div class="stats-bar-value">
                <span class="stats-bar-number">0</span><span class="stats-bar-suffix">/7</span>
            </div>
            <div class="stats-bar-label">Customer Support</div>
        </div>

        <div class="stats-bar-item" data-target="50" data-suffix="+">
            <div class="stats-bar-value">
                <span class="stats-bar-number">0</span><span class="stats-bar-suffix">+</span>
            </div>
            <div class="stats-bar-label">Countries Worldwide</div>
        </div>

    </div>
</section>

{{-- Load once --}}
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/statsbar.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/statsbar.js') }}" defer></script>
    @endpush
@endonce