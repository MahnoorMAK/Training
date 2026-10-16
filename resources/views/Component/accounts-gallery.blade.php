{{-- ============================================================
     resources/views/Component/accounts-gallery.blade.php
     Hover-expand gallery — accounts imagery
     Usage: @include('Component.accounts-gallery')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/accounts-gallery.css') }}">
    @endpush
@endonce

@php
    $images = [
        ['src' => 'Assets/img6.jpeg', 'alt' => 'Financial planning session',    'code' => '# 01'],
        ['src' => 'Assets/img7.jpeg', 'alt' => 'Tax documents review',          'code' => '# 02'],
        ['src' => 'Assets/img8.jpeg', 'alt' => 'Bookkeeping ledger',            'code' => '# 03'],
        ['src' => 'Assets/img9.jpeg', 'alt' => 'Team reviewing cash flow',      'code' => '# 04'],
        ['src' => 'Assets/img10.jpeg', 'alt' => 'Client tax consultation',       'code' => '# 05'],
        ['src' => 'Assets/img11.jpeg', 'alt' => 'Invoicing on laptop',           'code' => '# 06'],
        ['src' => 'Assets/img12.jpeg', 'alt' => 'VAT filing preparation',        'code' => '# 07'],
        ['src' => 'Assets/img13.jpeg', 'alt' => 'Year-end audit checklist',      'code' => '# 08'],
        ['src' => 'Assets/Poster.jpg', 'alt' => 'Business accounts spreadsheet', 'code' => '# 09'],
    ];
@endphp

<section class="acc-gallery-section" id="accounts-gallery" data-acc-gallery>
    <div class="acc-gallery-wrap">

        <div class="acc-gallery-row">
            @foreach ($images as $index => $img)
                <div
                    class="acc-gallery-item {{ $index === 1 ? 'is-active' : '' }}"
                    data-acc-gallery-item
                    data-acc-index="{{ $index }}"
                    role="button"
                    tabindex="0"
                    aria-label="View image: {{ $img['alt'] }}">

                    {{-- Dark gradient overlay — visible only when active --}}
                    <div class="acc-gallery-overlay" data-acc-overlay></div>

                    {{-- Caption — visible only when active --}}
                    <div class="acc-gallery-caption" data-acc-caption>
                        <p>{{ $img['code'] }}</p>
                    </div>

                    <img
                        src="{{ asset($img['src']) }}"
                        alt="{{ $img['alt'] }}"
                        class="acc-gallery-img"
                        loading="lazy">
                </div>
            @endforeach
        </div>

    </div>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/accounts-gallery.js') }}" defer></script>
    @endpush
@endonce