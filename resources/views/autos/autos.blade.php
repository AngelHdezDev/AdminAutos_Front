@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/catalog.css') }}" rel="stylesheet">
@endpush

<body>

    <nav class="navbar-top">
        <a href="#" class="logo">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <path d="M7 21 C7 13 13 5 21 5" stroke="#e8001c" stroke-width="3" stroke-linecap="round" />
                <circle cx="21" cy="5" r="4" fill="#e8001c" />
            </svg>
            <span class="logo-text">Dalton<span>Seminuevos</span></span>
            <span
                style="background:#e8001c;color:white;font-size:0.55rem;font-weight:800;border-radius:3px;padding:1px 4px;margin-left:2px;">.com</span>
        </a>
        <div class="navbar-top-actions">
            <button class="btn-vender">Vender mi auto</button>
            <button class="btn-comprar">Comprar un auto</button>
            <div class="navbar-top-divider"></div>
            <button class="btn-user"><i class="bi bi-person"></i></button>
        </div>
        <button class="btn-mobile-nav" onclick="openMobileSidebar()"><i class="bi bi-sliders"></i></button>
    </nav>

    <div class="search-bar-wrap">
        <div class="search-bar">
            <input type="text" placeholder="Buscar por Marca / Modelo / Año / Color">
            <button class="btn-buscar"><span>Buscar</span> <i class="bi bi-search"></i></button>
        </div>
    </div>

    <div class="marcas-bar" id="marcasBar">
        @php
            $marcasBar = [
                ['name' => 'Toyota', 'logo' => 'https://logo.clearbit.com/toyota.com'],
                ['name' => 'Byd', 'logo' => 'https://logo.clearbit.com/byd.com'],
                ['name' => 'Honda', 'logo' => 'https://logo.clearbit.com/honda.com'],
                ['name' => 'Mazda', 'logo' => 'https://logo.clearbit.com/mazda.com'],
                ['name' => 'Nissan', 'logo' => 'https://logo.clearbit.com/nissan.com'],
                ['name' => 'Chevrolet', 'logo' => 'https://logo.clearbit.com/chevrolet.com'],
                ['name' => 'Kia', 'logo' => 'https://logo.clearbit.com/kia.com'],
                ['name' => 'Hyundai', 'logo' => 'https://logo.clearbit.com/hyundai.com'],
                ['name' => 'Seat', 'logo' => 'https://logo.clearbit.com/seat.com'],
                ['name' => 'Volkswagen', 'logo' => 'https://logo.clearbit.com/volkswagen.com'],
                ['name' => 'Chirey', 'logo' => 'https://logo.clearbit.com/chery.com'],
                ['name' => 'Land Rover', 'logo' => 'https://logo.clearbit.com/landrover.com'],
            ];
        @endphp
        @foreach($marcasBar as $m)
            <button class="marca-btn">
                <img src="{{ $m['logo'] }}" alt="{{ $m['name'] }}" onerror="this.style.display='none'" width="20"
                    height="16">
                {{ $m['name'] }}
            </button>
        @endforeach
        <button class="marcas-more"><i class="bi bi-chevron-right"></i></button>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeMobileSidebar()"></div>

    <div class="catalog-layout">

        <aside class="sidebar" id="sidebar">
            <div class="sidebar-mobile-header">
                <h6>Filtros</h6>
                <button class="btn-close-sidebar" onclick="closeMobileSidebar()"><i class="bi bi-x-lg"></i></button>
            </div>

            <div class="filter-section-title">Tipo de oferta</div>
            <label class="filter-check-label"><input type="checkbox"> Nuevos 0km ⭐</label>
            <label class="filter-check-label"><input type="checkbox"> Seminuevos</label>
            <label class="filter-check-label"><input type="checkbox"> Autos en liquidación 🔥</label>
            <label class="filter-check-label"><input type="checkbox"> En consignación</label>

            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-car-front filter-icon"></i> Marcas y modelos</span><i
                    class="bi bi-chevron-down"></i>
            </button>
            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-currency-dollar filter-icon"></i> Precio</span><i class="bi bi-chevron-down"></i>
            </button>
            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-calendar3 filter-icon"></i> Año</span><i class="bi bi-chevron-down"></i>
            </button>
            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-geo-alt filter-icon"></i> Ubicación</span><i class="bi bi-chevron-down"></i>
            </button>
            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-speedometer2 filter-icon"></i> Kilometraje</span><i
                    class="bi bi-chevron-down"></i>
            </button>
            <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
                <span><i class="bi bi-sliders filter-icon"></i> Filtros avanzados</span><i
                    class="bi bi-chevron-down"></i>
            </button>
        </aside>

        <main class="catalog-main">
            <div class="catalog-toolbar">
                <button class="btn-toggle-filters" id="toggleFiltersBtn" onclick="toggleFilters()">
                    Ocultar filtros <i class="bi bi-sliders"></i>
                </button>
                <div class="sort-wrap">
                    <span>Ordenar por:</span>
                    <div class="sort-dropdown-wrap">
                        <button class="sort-btn" onclick="toggleSort()">
                            🔥 Mayor Descue... <i class="bi bi-chevron-down" style="font-size:0.75rem"></i>
                        </button>
                        <div class="sort-dropdown" id="sortDropdown">
                            <div class="sort-dropdown-label">Ordenar por</div>
                            <div class="sort-option active" onclick="selectSort(this)">🔥 Mayor Descuento 🔥</div>
                            <div class="sort-option" onclick="selectSort(this)">Menor precio</div>
                            <div class="sort-option" onclick="selectSort(this)">Mayor precio</div>
                            <div class="sort-option" onclick="selectSort(this)">Más nuevos</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="results-count">972 Resultados</div>

            <div class="cars-grid sidebar-open" id="carsGrid">
                @php
                    $autos = [
                        ['name' => 'Audi Q5 2018', 'meta' => '5 PTS. DYNAMIC, 2.0T | 148,697 Km', 'price' => '$5,713', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$269,000 precio de liquidación', 'market' => 'Precio 23% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/audi.com', 'img' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Chirey ARRIZO 8 2024', 'meta' => '4 PTS. LUXURY, 1.6T | 0 Km', 'price' => '$12,104', 'currency' => 'MXN/mensuales*', 'contado' => 'Contado 569,900 MXN', 'market' => null, 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/chery.com', 'img' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=600&h=380&fit=crop&q=75', 'badges' => ['nuevo', 'consignacion'], 'disp' => false],
                        ['name' => 'Ford Explorer 2022', 'meta' => '5 PTS. ST, BI-TURBO | 110,481 Km', 'price' => '$12,955', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$610,000 precio de liquidación', 'market' => 'Precio 22% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/ford.com', 'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Volvo XC40 2024', 'meta' => '5 PTS. ULTIMATE, B4 | 20,615 Km', 'price' => '$16,234', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$764,400 precio de liquidación', 'market' => 'Precio 16% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/volvo.com', 'img' => 'https://images.unsplash.com/photo-1592586726924-c2e9a01d4d7e?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Honda CR-V 2021', 'meta' => '5 PTS. TOURING, 1.5T | 54,320 Km', 'price' => '$8,450', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$398,000 precio de liquidación', 'market' => 'Precio 15% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/honda.com', 'img' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Kia Sportage 2023', 'meta' => '5 PTS. EX, 2.0L | 18,450 Km', 'price' => '$10,870', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$512,000 precio de liquidación', 'market' => 'Precio 15% menor al mercado', 'location' => 'GDL - Lopez Mateos', 'brand_logo' => 'https://logo.clearbit.com/kia.com', 'img' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => true],
                        ['name' => 'Nissan X-Trail 2022', 'meta' => '5 PTS. ADVANCE, 2.5L | 42,100 Km', 'price' => '$7,990', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$376,000 precio de liquidación', 'market' => 'Precio 14% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/nissan.com', 'img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Mazda CX-5 2023', 'meta' => '5 PTS. GRAND TOURING | 9,870 Km', 'price' => '$11,640', 'currency' => 'MXN/mensuales*', 'contado' => 'Contado 548,000 MXN', 'market' => null, 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/mazda.com', 'img' => 'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Toyota Highlander 2020', 'meta' => '5 PTS. XLE, 8 PAS. | 160,760 Km', 'price' => '$9,557', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$450,000 precio de liquidación', 'market' => 'Precio 13% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/toyota.com', 'img' => 'https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Ford Escape 2024', 'meta' => '5 PTS. ACTIVE, HEV | 27,664 Km', 'price' => '$9,982', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$470,000 precio de liquidación', 'market' => 'Precio 13% menor al mercado', 'location' => 'GDL - Lopez Mateos', 'brand_logo' => 'https://logo.clearbit.com/ford.com', 'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Suzuki ERTIGA 2023', 'meta' => '5 PTS. XL7, 1.5L | 99,557 Km', 'price' => '$6,371', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$300,000 precio de liquidación', 'market' => 'Precio 12% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/suzuki.com', 'img' => 'https://images.unsplash.com/photo-1605559424843-9873732e7a49?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                        ['name' => 'Honda Odyssey 2025', 'meta' => '5 PTS. BLACK EDITION | 11,348 Km', 'price' => '$19,964', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$940,000 precio de liquidación', 'market' => 'Precio 10% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/honda.com', 'img' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
                    ];
                @endphp

                @foreach($autos as $auto)
                    <div class="car-card">
                        <div class="car-card-img-wrap">
                            <img src="{{ $auto['img'] }}" alt="{{ $auto['name'] }}" loading="lazy">
                            @if(!empty($auto['badges']))
                                <div class="car-badges">
                                    @if(in_array('nuevo', $auto['badges']))<span class="badge-nuevo"><i class="bi bi-plus"></i>
                                    Nuevo 0km</span>@endif
                                    @if(in_array('consignacion', $auto['badges']))<span class="badge-consignacion">En
                                    consignación</span>@endif
                                </div>
                            @endif
                        </div>
                        <div class="car-card-body">
                            <div class="car-card-header">
                                <div class="car-card-title">{{ $auto['name'] }}</div>
                                <img src="{{ $auto['brand_logo'] }}" alt="" class="brand-logo"
                                    onerror="this.style.display='none'">
                            </div>
                            <div class="car-card-meta">{{ $auto['meta'] }}</div>
                            <div class="car-price">{{ $auto['price'] }} <small>{{ $auto['currency'] }}</small></div>
                            @if(!empty($auto['liquidacion']))<span
                            class="badge-liquidacion">{{ $auto['liquidacion'] }}</span>@endif
                            @if(!empty($auto['contado']))
                            <div class="car-price-contado">{{ $auto['contado'] }}</div>@endif
                            @if(!empty($auto['market']))
                            <div class="car-market"><i class="bi bi-graph-down-arrow"></i> {{ $auto['market'] }}</div>@endif
                            <div class="car-location">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $auto['location'] }}</span>
                                @if($auto['disp'])<span class="disp-badge">DISP</span>@endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrap">
                <a href="#" class="page-btn arrow"><i class="bi bi-chevron-left"></i></a>
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">2</a>
                <a href="#" class="page-btn">3</a>
                <a href="#" class="page-btn">4</a>
                <a href="#" class="page-btn">5</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-btn">81</a>
                <a href="#" class="page-btn arrow"><i class="bi bi-chevron-right"></i></a>
            </div>
        </main>
    </div>

    
</body>

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush