{{-- ============================================================
     resources/views/Component/gallery.blade.php
     "LEDGEINVO" — images form the word via SVG text mask
     Hover any letter to expand it into a full image card.
     Usage: @include('Component.gallery')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    @endpush
@endonce

@php
    $letters = [
        ['char' => 'L', 'src' => 'Assets/img6.jpeg',  'alt' => 'Financial planning session'],
        ['char' => 'E', 'src' => 'Assets/img7.jpeg',  'alt' => 'Tax documents review'],
        ['char' => 'D', 'src' => 'Assets/img8.jpeg',  'alt' => 'Bookkeeping ledger'],
        ['char' => 'G', 'src' => 'Assets/img9.jpeg',  'alt' => 'Team reviewing cash flow'],
        ['char' => 'E', 'src' => 'Assets/img10.jpeg', 'alt' => 'Client tax consultation'],
        ['char' => 'I', 'src' => 'Assets/img11.jpeg', 'alt' => 'Invoicing on laptop'],
        ['char' => 'N', 'src' => 'Assets/img12.jpeg', 'alt' => 'VAT filing preparation'],
        ['char' => 'V', 'src' => 'Assets/img13.jpeg', 'alt' => 'Year-end audit checklist'],
        ['char' => 'O', 'src' => 'Assets/Poster.jpg', 'alt' => 'Business accounts spreadsheet'],
    ];
@endphp

<section class="gallery-section" id="gallery" data-gallery>
    <div class="gallery-wrap">

        <div class="gallery-row">
            @foreach ($letters as $index => $item)
                <div
                    class="gallery-item"
                    data-gallery-item
                    data-gallery-index="{{ $index }}"
                    role="button"
                    tabindex="0"
                    aria-label="View image: {{ $item['alt'] }}">

                    <div class="gallery-clip-wrap">
                        <img
                            src="{{ asset($item['src']) }}"
                            alt="{{ $item['alt'] }}"
                            class="gallery-img"
                            loading="lazy">
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@once
    @push('scripts')
        <script src="{{ asset('js/gallery.js') }}" defer></script>
    @endpush
@endonce