<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - DaltonSeminuevos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --dalton-dark: #1a1a1a;
            --dalton-red: #e8001c;
            --dalton-blue: #1a5ce5;
            --dalton-green: #16a34a;
            --dalton-orange: #f97316;
            --dalton-text: #111827;
            --dalton-muted: #6b7280;
            --dalton-border: #e5e7eb;
            --dalton-bg: #f9fafb;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Manrope', sans-serif; color: var(--dalton-text); background: #fff; margin: 0; }

        /* ===== TOP NAVBAR ===== */
        .navbar-top {
            background: var(--dalton-dark);
            padding: 10px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 52px;
        }
        .logo { display: flex; align-items: center; gap: 6px; text-decoration: none; }
        .logo-text { color: white; font-weight: 800; font-size: 1.1rem; letter-spacing: -0.5px; }
        .logo-text span { color: var(--dalton-red); }
        .navbar-top-actions { display: flex; align-items: center; gap: 10px; }
        .btn-vender { background: transparent; border: 1.5px solid rgba(255,255,255,0.5); color: white; border-radius: 50px; padding: 7px 18px; font-size: 0.82rem; font-weight: 600; cursor: pointer; font-family: 'Manrope',sans-serif; white-space: nowrap; }
        .btn-vender:hover { border-color: white; }
        .btn-comprar { background: white; border: none; color: var(--dalton-dark); border-radius: 50px; padding: 7px 18px; font-size: 0.82rem; font-weight: 700; cursor: pointer; font-family: 'Manrope',sans-serif; }
        .navbar-top-divider { width: 1px; height: 28px; background: rgba(255,255,255,0.2); margin: 0 4px; }
        .btn-user { background: transparent; border: none; color: white; font-size: 1.3rem; cursor: pointer; }

        /* ===== SEARCH BAR ===== */
        .search-bar-wrap {
            background: white;
            border-bottom: 1px solid var(--dalton-border);
            padding: 10px 24px;
            position: sticky;
            top: 52px;
            z-index: 999;
        }
        .search-bar {
            display: flex;
            align-items: center;
            border: 1.5px solid var(--dalton-border);
            border-radius: 8px;
            padding: 0 16px;
            height: 44px;
            background: white;
        }
        .search-bar input {
            flex: 1;
            border: none;
            outline: none;
            font-family: 'Manrope',sans-serif;
            font-size: 0.9rem;
            color: var(--dalton-text);
            background: transparent;
        }
        .search-bar input::placeholder { color: var(--dalton-muted); }
        .btn-buscar {
            background: none;
            border: none;
            color: var(--dalton-blue);
            font-weight: 800;
            font-size: 0.9rem;
            font-family: 'Manrope',sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0;
            white-space: nowrap;
        }

        /* ===== MARCAS BAR ===== */
        .marcas-bar {
            background: white;
            border-bottom: 1px solid var(--dalton-border);
            padding: 12px 24px;
            display: flex;
            align-items: center;
            gap: 6px;
            overflow-x: auto;
            scrollbar-width: none;
            position: sticky;
            top: 106px;
            z-index: 998;
        }
        .marcas-bar::-webkit-scrollbar { display: none; }
        .marca-btn {
            display: flex;
            align-items: center;
            gap: 7px;
            border: 1.5px solid var(--dalton-border);
            border-radius: 50px;
            padding: 7px 14px;
            font-size: 0.82rem;
            font-weight: 700;
            cursor: pointer;
            background: white;
            color: var(--dalton-text);
            white-space: nowrap;
            font-family: 'Manrope',sans-serif;
            transition: all 0.15s;
            flex-shrink: 0;
        }
        .marca-btn:hover { border-color: var(--dalton-red); color: var(--dalton-red); }
        .marca-btn.active { border-color: var(--dalton-red); background: #fff1f2; color: var(--dalton-red); }
        .marca-btn img { width: 20px; height: 16px; object-fit: contain; display: block; }
        .marcas-more { background: none; border: none; cursor: pointer; color: var(--dalton-muted); font-size: 1rem; flex-shrink: 0; padding: 8px; }

        /* ===== LAYOUT ===== */
        .catalog-layout {
            display: flex;
            gap: 0;
            min-height: calc(100vh - 160px);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 290px;
            flex-shrink: 0;
            border-right: 1px solid var(--dalton-border);
            padding: 20px;
            background: white;
        }
        .sidebar.hidden { display: none; }

        .filter-section-title {
            font-size: 0.95rem;
            font-weight: 800;
            margin-bottom: 14px;
            color: var(--dalton-text);
        }

        .filter-check-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 0;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            color: var(--dalton-text);
        }
        .filter-check-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border: 1.5px solid var(--dalton-border);
            border-radius: 4px;
            accent-color: var(--dalton-blue);
            cursor: pointer;
        }
        .filter-check-label .badge-icon { font-size: 0.85rem; }

        .filter-divider { height: 1px; background: var(--dalton-border); margin: 16px 0; }

        .filter-accordion-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            background: none;
            border: none;
            padding: 12px 0;
            font-family: 'Manrope',sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--dalton-text);
            cursor: pointer;
            border-top: 1px solid var(--dalton-border);
        }
        .filter-accordion-btn i { font-size: 0.85rem; color: var(--dalton-muted); transition: transform 0.2s; }
        .filter-accordion-btn.open i { transform: rotate(180deg); }
        .filter-icon { margin-right: 6px; color: var(--dalton-muted); font-size: 0.9rem; }

        /* ===== MAIN CONTENT ===== */
        .catalog-main {
            flex: 1;
            min-width: 0;
            padding: 20px 24px;
            background: var(--dalton-bg);
        }

        /* ===== TOOLBAR ===== */
        .catalog-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .btn-toggle-filters {
            display: flex;
            align-items: center;
            gap: 7px;
            border: 1.5px solid var(--dalton-blue);
            border-radius: 50px;
            padding: 7px 16px;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--dalton-blue);
            background: white;
            cursor: pointer;
            font-family: 'Manrope',sans-serif;
            transition: all 0.15s;
        }
        .btn-toggle-filters:hover { background: #eff6ff; }

        .sort-wrap { display: flex; align-items: center; gap: 10px; font-size: 0.82rem; color: var(--dalton-muted); font-weight: 600; position: relative; }
        .sort-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1.5px solid var(--dalton-border);
            border-radius: 50px;
            padding: 7px 14px;
            font-size: 0.82rem;
            font-weight: 700;
            background: white;
            cursor: pointer;
            font-family: 'Manrope',sans-serif;
            color: var(--dalton-text);
        }
        .sort-dropdown {
            position: absolute;
            top: calc(100% + 6px);
            right: 0;
            background: white;
            border: 1px solid var(--dalton-border);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            min-width: 200px;
            z-index: 100;
            overflow: hidden;
            display: none;
        }
        .sort-dropdown.open { display: block; }
        .sort-dropdown-label { padding: 12px 16px 6px; font-size: 0.75rem; color: var(--dalton-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
        .sort-option {
            padding: 10px 16px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            color: var(--dalton-text);
            transition: background 0.15s;
        }
        .sort-option:hover { background: var(--dalton-bg); }
        .sort-option.active { color: var(--dalton-blue); font-weight: 800; }

        .results-count { font-size: 0.9rem; font-weight: 700; color: var(--dalton-text); margin-bottom: 16px; }

        /* ===== CAR GRID ===== */
        .cars-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }
        .cars-grid.sidebar-open {
            grid-template-columns: repeat(3, 1fr);
        }

        /* ===== CAR CARD ===== */
        .car-card {
            background: white;
            border-radius: 16px;
            border: 1.5px solid var(--dalton-border);
            overflow: hidden;
            cursor: pointer;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .car-card:hover {
            box-shadow: 0 8px 28px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        .car-card-img-wrap {
            position: relative;
            width: 100%;
            /* Fixed aspect ratio — sin layout shift */
            aspect-ratio: 16/10;
            background: #f0f0f0;
            overflow: hidden;
        }
        .car-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .car-badges {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .badge-nuevo {
            background: var(--dalton-blue);
            color: white;
            font-size: 0.68rem;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 3px;
        }
        .badge-consignacion {
            background: #1e40af;
            color: white;
            font-size: 0.68rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
        }

        .car-card-body { padding: 14px; }

        .car-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 3px;
            gap: 8px;
        }
        .car-card-title { font-weight: 800; font-size: 0.95rem; line-height: 1.2; }
        .brand-logo { width: 36px; height: 28px; object-fit: contain; flex-shrink: 0; display: block; }
        .car-card-meta { font-size: 0.73rem; color: var(--dalton-muted); margin-bottom: 12px; line-height: 1.4; }

        .car-price { font-weight: 800; font-size: 1.15rem; color: var(--dalton-green); margin-bottom: 2px; }
        .car-price small { font-size: 0.7rem; font-weight: 600; color: var(--dalton-muted); }
        .car-price-contado { font-size: 0.78rem; color: var(--dalton-muted); font-weight: 600; margin-top: 2px; }

        .badge-liquidacion {
            display: inline-flex;
            align-items: center;
            background: var(--dalton-red);
            color: white;
            font-size: 0.68rem;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 4px;
            margin-top: 4px;
        }

        .car-market {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            color: var(--dalton-orange);
            font-weight: 700;
            margin-top: 10px;
        }
        .car-market i { font-size: 0.8rem; }

        .car-location {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.73rem;
            color: var(--dalton-muted);
            margin-top: 8px;
            padding-top: 10px;
            border-top: 1px solid var(--dalton-border);
        }
        .disp-badge {
            margin-left: auto;
            background: var(--dalton-bg);
            border: 1px solid var(--dalton-border);
            border-radius: 4px;
            font-size: 0.65rem;
            font-weight: 800;
            padding: 2px 5px;
            color: var(--dalton-muted);
        }

        /* ===== PAGINATION ===== */
        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 32px;
            padding-bottom: 32px;
        }
        .page-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid var(--dalton-border);
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
            cursor: pointer;
            background: white;
            color: var(--dalton-text);
            font-family: 'Manrope',sans-serif;
            text-decoration: none;
            transition: all 0.15s;
        }
        .page-btn:hover { border-color: var(--dalton-blue); color: var(--dalton-blue); }
        .page-btn.active { background: var(--dalton-blue); border-color: var(--dalton-blue); color: white; }
        .page-btn.arrow { color: var(--dalton-muted); }
        .page-dots { font-size: 0.85rem; color: var(--dalton-muted); font-weight: 700; padding: 0 4px; }
    </style>
</head>
<body>

<!-- ===== TOP NAVBAR ===== -->
<nav class="navbar-top">
    <a href="#" class="logo">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
            <path d="M7 21 C7 13 13 5 21 5" stroke="#e8001c" stroke-width="3" stroke-linecap="round"/>
            <circle cx="21" cy="5" r="4" fill="#e8001c"/>
        </svg>
        <span class="logo-text">Dalton<span>Seminuevos</span></span>
        <span style="background:#e8001c;color:white;font-size:0.55rem;font-weight:800;border-radius:3px;padding:1px 4px;margin-left:2px;">.com</span>
    </a>
    <div class="navbar-top-actions">
        <button class="btn-vender">Vender mi auto</button>
        <button class="btn-comprar">Comprar un auto</button>
        <div class="navbar-top-divider"></div>
        <button class="btn-user"><i class="bi bi-person"></i></button>
    </div>
</nav>

<!-- ===== SEARCH BAR ===== -->
<div class="search-bar-wrap">
    <div class="search-bar">
        <input type="text" placeholder="Buscar por Marca / Modelo / Año / Color">
        <button class="btn-buscar">Buscar <i class="bi bi-search"></i></button>
    </div>
</div>

<!-- ===== MARCAS BAR ===== -->
<div class="marcas-bar">
    @php
    $marcasBar = [
        ['name' => 'Toyota', 'logo' => 'https://logo.clearbit.com/toyota.com'],
        ['name' => 'Byd',    'logo' => 'https://logo.clearbit.com/byd.com'],
        ['name' => 'Honda',  'logo' => 'https://logo.clearbit.com/honda.com'],
        ['name' => 'Mazda',  'logo' => 'https://logo.clearbit.com/mazda.com'],
        ['name' => 'Nissan', 'logo' => 'https://logo.clearbit.com/nissan.com'],
        ['name' => 'Chevrolet', 'logo' => 'https://logo.clearbit.com/chevrolet.com'],
        ['name' => 'Kia',    'logo' => 'https://logo.clearbit.com/kia.com'],
        ['name' => 'Hyundai','logo' => 'https://logo.clearbit.com/hyundai.com'],
        ['name' => 'Seat',   'logo' => 'https://logo.clearbit.com/seat.com'],
        ['name' => 'Volkswagen', 'logo' => 'https://logo.clearbit.com/volkswagen.com'],
        ['name' => 'Chirey', 'logo' => 'https://logo.clearbit.com/chery.com'],
        ['name' => 'Omoda',  'logo' => 'https://logo.clearbit.com/omoda.com'],
        ['name' => 'Mg',     'logo' => 'https://logo.clearbit.com/mgmotor.com'],
        ['name' => 'Land Rover', 'logo' => 'https://logo.clearbit.com/landrover.com'],
    ];
    @endphp
    @foreach($marcasBar as $m)
    <button class="marca-btn">
        <img src="{{ $m['logo'] }}" alt="{{ $m['name'] }}" onerror="this.style.display='none'" width="20" height="16">
        {{ $m['name'] }}
    </button>
    @endforeach
    <button class="marcas-more"><i class="bi bi-chevron-right"></i></button>
</div>

<!-- ===== MAIN LAYOUT ===== -->
<div class="catalog-layout" id="catalogLayout">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="filter-section-title">Tipo de oferta</div>
        <label class="filter-check-label">
            <input type="checkbox"> Nuevos 0km <span class="badge-icon">⭐</span>
        </label>
        <label class="filter-check-label">
            <input type="checkbox"> Seminuevos
        </label>
        <label class="filter-check-label">
            <input type="checkbox"> Autos en liquidación <span class="badge-icon">🔥</span>
        </label>
        <label class="filter-check-label">
            <input type="checkbox"> En consignación
        </label>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-car-front filter-icon"></i> Marcas y modelos</span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-currency-dollar filter-icon"></i> Precio</span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-calendar3 filter-icon"></i> Año</span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-geo-alt filter-icon"></i> Ubicación</span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-speedometer2 filter-icon"></i> Kilometraje</span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-sliders filter-icon"></i> Filtros avanzados</span>
            <i class="bi bi-chevron-down"></i>
        </button>
    </aside>

    <!-- MAIN -->
    <main class="catalog-main">
        <!-- Toolbar -->
        <div class="catalog-toolbar">
            <button class="btn-toggle-filters" id="toggleFiltersBtn" onclick="toggleFilters()">
                Mostrar filtros <i class="bi bi-sliders"></i>
            </button>
            <div class="sort-wrap">
                <span>Ordenar por:</span>
                <div style="position:relative">
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

        <!-- Cars Grid -->
        <div class="cars-grid" id="carsGrid">

            @php
            $autos = [
                [
                    'name' => 'Audi Q5 2018',
                    'meta' => '5 PTS. DYNAMIC, 2.0T, S TRONI... | 148,697 Km',
                    'price' => '$5,713',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$269,000 precio de liquidación',
                    'market' => 'Precio 23% menor al mercado',
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/audi.com',
                    'img' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Chirey ARRIZO 8 2024',
                    'meta' => '4 PTS. LUXURY, 1.6T, TA, PIEL... | 0 Km',
                    'price' => '$12,104',
                    'currency' => 'MXN/mensuales*',
                    'contado' => 'Contado 569,900 MXN',
                    'market' => null,
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/chery.com',
                    'img' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=600&h=380&fit=crop&q=75',
                    'badges' => ['nuevo', 'consignacion'],
                    'disp' => false,
                ],
                [
                    'name' => 'Ford Explorer 2022',
                    'meta' => '5 PTS. ST, BI-TURBO, V6, 3.0T... | 110,481 Km',
                    'price' => '$12,955',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$610,000 precio de liquidación',
                    'market' => 'Precio 22% menor al mercado',
                    'location' => 'SLP - Toyota Lomas',
                    'brand_logo' => 'https://logo.clearbit.com/ford.com',
                    'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Volvo XC40 2024',
                    'meta' => '5 PTS. ULTIMATE, B4, MHEV, 2.... | 20,615 Km',
                    'price' => '$16,234',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$764,400 precio de liquidación',
                    'market' => 'Precio 16% menor al mercado',
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/volvo.com',
                    'img' => 'https://images.unsplash.com/photo-1592586726924-c2e9a01d4d7e?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Honda CR-V 2021',
                    'meta' => '5 PTS. TOURING, 1.5T, TA, PIEL... | 54,320 Km',
                    'price' => '$8,450',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$398,000 precio de liquidación',
                    'market' => 'Precio 15% menor al mercado',
                    'location' => 'SLP - Toyota Lomas',
                    'brand_logo' => 'https://logo.clearbit.com/honda.com',
                    'img' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Kia Sportage 2023',
                    'meta' => '5 PTS. EX, 2.0L, TA, A/AC... | 18,450 Km',
                    'price' => '$10,870',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$512,000 precio de liquidación',
                    'market' => 'Precio 15% menor al mercado',
                    'location' => 'GDL - Lopez Mateos',
                    'brand_logo' => 'https://logo.clearbit.com/kia.com',
                    'img' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => true,
                ],
                [
                    'name' => 'Nissan X-Trail 2022',
                    'meta' => '5 PTS. ADVANCE, 2.5L, CVT... | 42,100 Km',
                    'price' => '$7,990',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$376,000 precio de liquidación',
                    'market' => 'Precio 14% menor al mercado',
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/nissan.com',
                    'img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Mazda CX-5 2023',
                    'meta' => '5 PTS. GRAND TOURING, 2.5L... | 9,870 Km',
                    'price' => '$11,640',
                    'currency' => 'MXN/mensuales*',
                    'contado' => 'Contado 548,000 MXN',
                    'market' => null,
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/mazda.com',
                    'img' => 'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Toyota Highlander 2020',
                    'meta' => '5 PTS. XLE, 8 PAS., V6, 3.5 L... | 160,760 Km',
                    'price' => '$9,557',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$450,000 precio de liquidación',
                    'market' => 'Precio 13% menor al mercado',
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/toyota.com',
                    'img' => 'https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Ford Escape 2024',
                    'meta' => '5 PTS. ACTIVE, HEV, 2.5L, TA... | 27,664 Km',
                    'price' => '$9,982',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$470,000 precio de liquidación',
                    'market' => 'Precio 13% menor al mercado',
                    'location' => 'GDL - Lopez Mateos',
                    'brand_logo' => 'https://logo.clearbit.com/ford.com',
                    'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Suzuki ERTIGA 2023',
                    'meta' => '5 PTS. XL7, 1.5L, TA, A/AC. A... | 99,557 Km',
                    'price' => '$6,371',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$300,000 precio de liquidación',
                    'market' => 'Precio 12% menor al mercado',
                    'location' => 'SLP - Toyota Lomas',
                    'brand_logo' => 'https://logo.clearbit.com/suzuki.com',
                    'img' => 'https://images.unsplash.com/photo-1605559424843-9873732e7a49?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
                [
                    'name' => 'Honda Odyssey 2025',
                    'meta' => '5 PTS. BLACK EDITION, V6, 3.5... | 11,348 Km',
                    'price' => '$19,964',
                    'currency' => 'MXN/mensuales*',
                    'liquidacion' => '$940,000 precio de liquidación',
                    'market' => 'Precio 10% menor al mercado',
                    'location' => 'SLP - Honda Carranza',
                    'brand_logo' => 'https://logo.clearbit.com/honda.com',
                    'img' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=600&h=380&fit=crop&q=75',
                    'badges' => [],
                    'disp' => false,
                ],
            ];
            @endphp

            @foreach($autos as $auto)
            <div class="car-card">
                <div class="car-card-img-wrap">
                    <img src="{{ $auto['img'] }}" alt="{{ $auto['name'] }}" loading="lazy">
                    @if(!empty($auto['badges']))
                    <div class="car-badges">
                        @if(in_array('nuevo', $auto['badges']))
                        <span class="badge-nuevo"><i class="bi bi-plus"></i> Nuevo de agencia 0km</span>
                        @endif
                        @if(in_array('consignacion', $auto['badges']))
                        <span class="badge-consignacion">En consignación</span>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="car-card-body">
                    <div class="car-card-header">
                        <div class="car-card-title">{{ $auto['name'] }}</div>
                        <img src="{{ $auto['brand_logo'] }}" alt="" class="brand-logo" onerror="this.style.display='none'">
                    </div>
                    <div class="car-card-meta">{{ $auto['meta'] }}</div>

                    <div class="car-price">{{ $auto['price'] }} <small>{{ $auto['currency'] }}</small></div>

                    @if(!empty($auto['liquidacion']))
                        <span class="badge-liquidacion">{{ $auto['liquidacion'] }}</span>
                    @endif
                    @if(!empty($auto['contado']))
                        <div class="car-price-contado">{{ $auto['contado'] }}</div>
                    @endif

                    @if(!empty($auto['market']))
                    <div class="car-market">
                        <i class="bi bi-graph-down-arrow"></i> {{ $auto['market'] }}
                    </div>
                    @endif

                    <div class="car-location">
                        <i class="bi bi-geo-alt"></i>
                        <span>{{ $auto['location'] }}</span>
                        @if($auto['disp'])
                        <span class="disp-badge">DISP</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Pagination -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var sidebarOpen = true;

    function toggleFilters() {
        var sidebar = document.getElementById('sidebar');
        var grid = document.getElementById('carsGrid');
        var btn = document.getElementById('toggleFiltersBtn');

        sidebarOpen = !sidebarOpen;

        if (sidebarOpen) {
            sidebar.classList.remove('hidden');
            grid.classList.add('sidebar-open');
            btn.innerHTML = 'Ocultar filtros <i class="bi bi-sliders"></i>';
        } else {
            sidebar.classList.add('hidden');
            grid.classList.remove('sidebar-open');
            btn.innerHTML = 'Mostrar filtros <i class="bi bi-sliders"></i>';
        }
    }

    // Start with sidebar open (matches screenshots)
    document.addEventListener('DOMContentLoaded', function() {
        toggleFilters(); // opens sidebar
    });

    function toggleAccordion(btn) {
        btn.classList.toggle('open');
    }

    function toggleSort() {
        document.getElementById('sortDropdown').classList.toggle('open');
    }

    function selectSort(el) {
        document.querySelectorAll('.sort-option').forEach(function(o) { o.classList.remove('active'); });
        el.classList.add('active');
        var label = el.textContent.trim();
        document.querySelector('.sort-btn').innerHTML = label.substring(0, 16) + '... <i class="bi bi-chevron-down" style="font-size:0.75rem"></i>';
        document.getElementById('sortDropdown').classList.remove('open');
    }

    // Close sort dropdown when clicking outside
    document.addEventListener('click', function(e) {
        var sortWrap = document.querySelector('.sort-wrap');
        if (sortWrap && !sortWrap.contains(e.target)) {
            document.getElementById('sortDropdown').classList.remove('open');
        }
    });
</script>
</body>
</html>