{{-- ============================================================
     APEXBOOKS — TOP CLIENTS MARQUEE
     Three rows moving in opposite directions
     ============================================================ --}}
<section class="top-clients-section" id="topClientsSection">

    <div class="top-clients-header">
        <h2 class="top-clients-title">Trusted by top teams</h2>
        <p class="top-clients-subtitle">
            Thousands of businesses rely on Apexbooks to keep their finances
            accurate, compliant, and always up to date.
        </p>
    </div>

    <div class="marquee">

        {{-- ROW 1 — moves right --}}
        <div class="marquee-row marquee-row-1">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'SystemsLtd',      'initial' => 'SL', 'color' => '#8E7AC7', 'posts' => '151', 'views' => '358,920'])
                @include('Component.TopClientCard', ['name' => 'TechVision',      'initial' => 'TV', 'color' => '#5a9de0', 'posts' => '157', 'views' => '899,480'])
                @include('Component.TopClientCard', ['name' => 'NexGen',          'initial' => 'NG', 'color' => '#e0a85a', 'posts' => '142', 'views' => '485,580'])
                @include('Component.TopClientCard', ['name' => 'AlphaCorp',       'initial' => 'AC', 'color' => '#5ac9a8', 'posts' => '48',  'views' => '462,880'])
                @include('Component.TopClientCard', ['name' => 'GlobalTex',       'initial' => 'GT', 'color' => '#e05a8e', 'posts' => '29',  'views' => '318,720'])
                @include('Component.TopClientCard', ['name' => 'PrimeTrade',      'initial' => 'PT', 'color' => '#8E7AC7', 'posts' => '40',  'views' => '308,640'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'SystemsLtd',      'initial' => 'SL', 'color' => '#8E7AC7', 'posts' => '151', 'views' => '358,920'])
                @include('Component.TopClientCard', ['name' => 'TechVision',      'initial' => 'TV', 'color' => '#5a9de0', 'posts' => '157', 'views' => '899,480'])
                @include('Component.TopClientCard', ['name' => 'NexGen',          'initial' => 'NG', 'color' => '#e0a85a', 'posts' => '142', 'views' => '485,580'])
                @include('Component.TopClientCard', ['name' => 'AlphaCorp',       'initial' => 'AC', 'color' => '#5ac9a8', 'posts' => '48',  'views' => '462,880'])
                @include('Component.TopClientCard', ['name' => 'GlobalTex',       'initial' => 'GT', 'color' => '#e05a8e', 'posts' => '29',  'views' => '318,720'])
                @include('Component.TopClientCard', ['name' => 'PrimeTrade',      'initial' => 'PT', 'color' => '#8E7AC7', 'posts' => '40',  'views' => '308,640'])
            </div>
        </div>

        {{-- ROW 2 — moves left --}}
        <div class="marquee-row marquee-row-2">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'InnovateCo',      'initial' => 'IC', 'color' => '#5a9de0', 'posts' => '36',  'views' => '300,080'])
                @include('Component.TopClientCard', ['name' => 'CloudNine',       'initial' => 'CN', 'color' => '#e05a8e', 'posts' => '89',  'views' => '295,320'])
                @include('Component.TopClientCard', ['name' => 'DataFlow',        'initial' => 'DF', 'color' => '#5ac9a8', 'posts' => '49',  'views' => '288,110'])
                @include('Component.TopClientCard', ['name' => 'SmartBiz',        'initial' => 'SB', 'color' => '#e0a85a', 'posts' => '80',  'views' => '254,550'])
                @include('Component.TopClientCard', ['name' => 'VertexLogic',     'initial' => 'VL', 'color' => '#8E7AC7', 'posts' => '22',  'views' => '236,130'])
                @include('Component.TopClientCard', ['name' => 'OmniGroup',       'initial' => 'OG', 'color' => '#5a9de0', 'posts' => '67',  'views' => '230,450'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'InnovateCo',      'initial' => 'IC', 'color' => '#5a9de0', 'posts' => '36',  'views' => '300,080'])
                @include('Component.TopClientCard', ['name' => 'CloudNine',       'initial' => 'CN', 'color' => '#e05a8e', 'posts' => '89',  'views' => '295,320'])
                @include('Component.TopClientCard', ['name' => 'DataFlow',        'initial' => 'DF', 'color' => '#5ac9a8', 'posts' => '49',  'views' => '288,110'])
                @include('Component.TopClientCard', ['name' => 'SmartBiz',        'initial' => 'SB', 'color' => '#e0a85a', 'posts' => '80',  'views' => '254,550'])
                @include('Component.TopClientCard', ['name' => 'VertexLogic',     'initial' => 'VL', 'color' => '#8E7AC7', 'posts' => '22',  'views' => '236,130'])
                @include('Component.TopClientCard', ['name' => 'OmniGroup',       'initial' => 'OG', 'color' => '#5a9de0', 'posts' => '67',  'views' => '230,450'])
            </div>
        </div>

        {{-- ROW 3 — moves right --}}
        <div class="marquee-row marquee-row-3">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'ApexTrade',       'initial' => 'AT', 'color' => '#e0a85a', 'posts' => '51', 'views' => '214,820'])
                @include('Component.TopClientCard', ['name' => 'BlueChip',        'initial' => 'BC', 'color' => '#5ac9a8', 'posts' => '72', 'views' => '208,440'])
                @include('Component.TopClientCard', ['name' => 'Starlight',       'initial' => 'SL', 'color' => '#e05a8e', 'posts' => '38', 'views' => '198,900'])
                @include('Component.TopClientCard', ['name' => 'SynergyTech',     'initial' => 'ST', 'color' => '#8E7AC7', 'posts' => '64', 'views' => '185,320'])
                @include('Component.TopClientCard', ['name' => 'NextWave',        'initial' => 'NW', 'color' => '#5a9de0', 'posts' => '94', 'views' => '172,600'])
                @include('Component.TopClientCard', ['name' => 'CoreFinance',     'initial' => 'CF', 'color' => '#e0a85a', 'posts' => '55', 'views' => '160,410'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'ApexTrade',       'initial' => 'AT', 'color' => '#e0a85a', 'posts' => '51', 'views' => '214,820'])
                @include('Component.TopClientCard', ['name' => 'BlueChip',        'initial' => 'BC', 'color' => '#5ac9a8', 'posts' => '72', 'views' => '208,440'])
                @include('Component.TopClientCard', ['name' => 'Starlight',       'initial' => 'SL', 'color' => '#e05a8e', 'posts' => '38', 'views' => '198,900'])
                @include('Component.TopClientCard', ['name' => 'SynergyTech',     'initial' => 'ST', 'color' => '#8E7AC7', 'posts' => '64', 'views' => '185,320'])
                @include('Component.TopClientCard', ['name' => 'NextWave',        'initial' => 'NW', 'color' => '#5a9de0', 'posts' => '94', 'views' => '172,600'])
                @include('Component.TopClientCard', ['name' => 'CoreFinance',     'initial' => 'CF', 'color' => '#e0a85a', 'posts' => '55', 'views' => '160,410'])
            </div>
        </div>

    </div>
</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/topclients.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/topclients.js') }}" defer></script>
    @endpush
@endonce