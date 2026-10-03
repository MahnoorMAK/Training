{{-- ============================================================
     APEXBOOKS — SCROLL HIGHLIGHT HEADING
     Words fade in from gray to full color as you scroll
     ============================================================ --}}
<section class="scroll-highlight-section" id="scrollHighlight">
    <div class="scroll-highlight-inner">

        <div class="scroll-highlight-eyebrow">About our company</div>

        <h2 class="scroll-highlight-heading" id="scrollHighlightHeading">
            <span class="sh-word">Helping</span>
            <span class="sh-word">individuals</span>
            <span class="sh-word">and</span>
            <span class="sh-word">businesses</span>
            <span class="sh-word">build</span>
            <span class="sh-word">a</span>
            <span class="sh-word">stronger</span>
            <span class="sh-word">financial</span>
            <span class="sh-word">future</span>
            <span class="sh-word">through</span>
            <span class="sh-word">expert</span>
            <span class="sh-word">insights,</span>
            <span class="sh-word">strategic</span>
            <span class="sh-word">planning</span>
            <span class="sh-word">and</span>
            <span class="sh-word">proven</span>
            <span class="sh-word">solutions</span>
        </h2>

    </div>
</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/scroll-highlight.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/scroll-highlight.js') }}" defer></script>
    @endpush
@endonce