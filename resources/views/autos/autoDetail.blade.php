<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }} - DaltonSeminuevos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --dark:   #1a1a1a;
            --red:    #e8001c;
            --blue:   #1a5ce5;
            --green:  #16a34a;
            --orange: #f97316;
            --text:   #111827;
            --muted:  #6b7280;
            --border: #e5e7eb;
            --bg:     #f9fafb;
            --navbar-h: 52px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Manrope', sans-serif; color: var(--text); background: var(--bg); }

        /* ── NAVBAR ── */
        .navbar-top {
            background: var(--dark);
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            height: var(--navbar-h);
        }
        .logo { display: flex; align-items: center; gap: 6px; text-decoration: none; }
        .logo-text { color: white; font-weight: 800; font-size: 1.1rem; }
        .logo-text span { color: var(--red); }
        .logo-dot { background: var(--red); color: white; font-size: 0.55rem; font-weight: 800; border-radius: 3px; padding: 1px 4px; }
        .nav-actions { display: flex; align-items: center; gap: 10px; }
        .btn-vender { background: transparent; border: 1.5px solid rgba(255,255,255,0.4); color: white; border-radius: 50px; padding: 6px 16px; font-size: 0.82rem; font-weight: 600; cursor: pointer; font-family: 'Manrope',sans-serif; }
        .btn-comprar { background: white; border: none; color: var(--dark); border-radius: 50px; padding: 6px 16px; font-size: 0.82rem; font-weight: 700; cursor: pointer; font-family: 'Manrope',sans-serif; }
        .btn-user { background: transparent; border: none; color: white; font-size: 1.25rem; cursor: pointer; }
        .nav-divider { width: 1px; height: 24px; background: rgba(255,255,255,0.2); }

        /* ── BREADCRUMB ── */
        .breadcrumb-bar {
            background: var(--dark);
            padding: 8px 24px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }
        .breadcrumb-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
        }
        .breadcrumb-inner a { color: rgba(255,255,255,0.5); text-decoration: none; transition: color 0.15s; }
        .breadcrumb-inner a:hover { color: white; }
        .breadcrumb-inner .sep { color: rgba(255,255,255,0.25); }
        .breadcrumb-inner .current { color: rgba(255,255,255,0.85); }

        /* ── MAIN WRAPPER ── */
        .page-wrap {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px 80px;
        }

        /* ── CAR HEADER ── */
        .car-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 24px 0 20px;
        }
        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 50px;
            padding: 4px 12px 4px 6px;
            margin-bottom: 10px;
        }
        .brand-pill img { width: 22px; height: 16px; object-fit: contain; }
        .brand-pill span { font-size: 0.78rem; font-weight: 700; }
        .car-title { font-size: 1.75rem; font-weight: 800; line-height: 1.15; margin-bottom: 8px; }
        .car-meta-row {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 0.82rem;
            color: var(--muted);
            flex-wrap: wrap;
        }
        .car-meta-row .dot { width: 4px; height: 4px; border-radius: 50%; background: var(--border); }
        .badge-consignacion-header { background: #1e40af; color: white; font-size: 0.7rem; font-weight: 700; padding: 3px 10px; border-radius: 4px; }
        .badge-nuevo-header { background: var(--blue); color: white; font-size: 0.7rem; font-weight: 700; padding: 3px 10px; border-radius: 4px; display: inline-flex; align-items: center; gap: 3px; }
        .btn-share { display: flex; align-items: center; gap: 6px; border: 1.5px solid var(--border); border-radius: 50px; padding: 8px 16px; font-size: 0.8rem; font-weight: 700; background: white; cursor: pointer; font-family: 'Manrope',sans-serif; color: var(--text); white-space: nowrap; flex-shrink: 0; }

        /* ── GALLERY ── */
        /* Desktop: dentro del detail-layout, con bordes y radius */
        .gallery-wrap {
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .gallery-main {
            position: relative;
            aspect-ratio: 16/10;
            background: #f0f0f0;
            overflow: hidden;
        }
        .gallery-main img { width: 100%; height: 100%; object-fit: cover; display: block; transition: opacity 0.15s ease; }
        .gallery-btn { position: absolute; background: rgba(255,255,255,0.92); border: none; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; cursor: pointer; backdrop-filter: blur(4px); transition: transform 0.15s; font-size: 0.9rem; color: var(--text); }
        .gallery-btn:hover { transform: scale(1.08); }
        .gallery-btn-expand { top: 14px; right: 14px; }
        .gallery-btn-prev   { left: 14px; top: 50%; transform: translateY(-50%); }
        .gallery-btn-next   { right: 14px; top: 50%; transform: translateY(-50%); }
        .gallery-btn-prev:hover, .gallery-btn-next:hover { transform: translateY(-50%) scale(1.08); }
        .gallery-counter { position: absolute; bottom: 14px; left: 14px; background: rgba(0,0,0,0.5); color: white; font-size: 0.72rem; font-weight: 700; padding: 5px 12px; border-radius: 50px; backdrop-filter: blur(4px); }
        .gallery-photos-btn { position: absolute; bottom: 14px; right: 14px; background: rgba(0,0,0,0.5); color: white; border: none; border-radius: 50px; padding: 6px 14px; font-size: 0.72rem; font-weight: 700; font-family: 'Manrope',sans-serif; cursor: pointer; display: flex; align-items: center; gap: 5px; backdrop-filter: blur(4px); }
        .gallery-thumbs { display: flex; gap: 6px; padding: 10px 12px; overflow-x: auto; scrollbar-width: none; background: white; }
        .gallery-thumbs::-webkit-scrollbar { display: none; }
        .thumb-item { width: 72px; height: 52px; border-radius: 8px; overflow: hidden; border: 2px solid transparent; cursor: pointer; flex-shrink: 0; transition: border-color 0.15s; background: var(--bg); }
        .thumb-item.active { border-color: var(--blue); }
        .thumb-item img { width: 100%; height: 100%; object-fit: cover; display: block; }

        /* ── DETAIL LAYOUT ── */
        .detail-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 28px;
            align-items: start;
        }

        /* ── SECTION CARD ── */
        .section-card { background: white; border: 1.5px solid var(--border); border-radius: 16px; padding: 22px; margin-bottom: 16px; }
        .section-title { font-size: 1rem; font-weight: 800; margin-bottom: 18px; display: flex; align-items: center; gap: 8px; }
        .section-title i { color: var(--red); font-size: 1rem; }

        /* ── SPECS GRID ── */
        .specs-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 0; }
        .spec-item { display: flex; align-items: center; gap: 12px; padding: 14px 0; border-bottom: 1px solid var(--border); }
        .spec-item:nth-last-child(-n+2) { border-bottom: none; }
        .spec-icon-wrap { width: 36px; height: 36px; border-radius: 10px; background: #fff1f2; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 0.95rem; color: var(--red); }
        .spec-label { font-size: 0.7rem; color: var(--muted); font-weight: 600; margin-bottom: 2px; }
        .spec-value { font-size: 0.88rem; font-weight: 700; }
        .descripcion-text { font-size: 0.875rem; color: var(--muted); line-height: 1.75; }

        /* ── SIDEBAR RIGHT ── */
        .sidebar-right { position: sticky; top: calc(var(--navbar-h) + 16px); }
        .price-card { background: white; border: 1.5px solid var(--border); border-radius: 20px; overflow: hidden; margin-bottom: 14px; }
        .price-card-top { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 22px; }
        .price-card-label { font-size: 0.72rem; color: rgba(255,255,255,0.5); font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 6px; }
        .price-card-amount { font-size: 2.2rem; font-weight: 800; color: white; line-height: 1; margin-bottom: 10px; }
        .price-card-amount small { font-size: 1rem; font-weight: 600; color: rgba(255,255,255,0.6); }
        .price-card-badges { display: flex; gap: 6px; flex-wrap: wrap; }
        .price-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 0.68rem; font-weight: 800; padding: 4px 10px; border-radius: 50px; }
        .price-badge-green { background: rgba(22,163,74,0.2); color: #4ade80; }
        .price-badge-red   { background: rgba(232,0,28,0.25);  color: #fca5a5; }
        .price-card-bottom { padding: 18px 22px; }
        .btn-interesa { width: 100%; background: var(--blue); color: white; border: none; border-radius: 50px; padding: 14px; font-size: 0.92rem; font-weight: 800; cursor: pointer; font-family: 'Manrope',sans-serif; transition: background 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 10px; }
        .btn-interesa:hover { background: #1748c5; }
        .btn-whatsapp { width: 100%; background: #22c55e; color: white; border: none; border-radius: 50px; padding: 13px; font-size: 0.88rem; font-weight: 800; cursor: pointer; font-family: 'Manrope',sans-serif; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s; }
        .btn-whatsapp:hover { background: #16a34a; }
        .price-disclaimer { font-size: 0.67rem; color: var(--muted); line-height: 1.5; margin-top: 10px; text-align: center; }
        .quick-facts { background: white; border: 1.5px solid var(--border); border-radius: 16px; padding: 18px; margin-bottom: 14px; }
        .quick-fact-item { display: flex; align-items: center; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid var(--border); font-size: 0.82rem; }
        .quick-fact-item:last-child { border-bottom: none; }
        .quick-fact-label { color: var(--muted); font-weight: 600; display: flex; align-items: center; gap: 7px; }
        .quick-fact-label i { color: var(--red); font-size: 0.85rem; }
        .quick-fact-value { font-weight: 700; }

        /* ── SIMILARES ── */
        .similares-section { margin-top: 32px; }
        .similares-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .similares-header h3 { font-size: 1.1rem; font-weight: 800; }

        .similares-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .similar-card {
            background: white;
            border-radius: 14px;
            border: 1.5px solid var(--border);
            overflow: hidden;
            cursor: pointer;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .similar-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,0.1); transform: translateY(-2px); }
        .similar-card > img { width: 100%; aspect-ratio: 4/3; object-fit: cover; display: block; background: var(--bg); }
        .similar-card-body { padding: 12px; }
        .similar-card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 2px; gap: 6px; }
        .similar-card-title { font-size: 0.82rem; font-weight: 800; }
        .similar-brand-logo { height: 16px; object-fit: contain; flex-shrink: 0; }
        .similar-card-meta { font-size: 0.68rem; color: var(--muted); margin-bottom: 8px; line-height: 1.4; }
        .similar-price { font-size: 0.92rem; font-weight: 800; color: var(--green); }
        .similar-price small { font-size: 0.65rem; font-weight: 600; color: var(--muted); }
        .similar-contado { font-size: 0.68rem; color: var(--muted); margin-top: 2px; }
        .similar-market { display: flex; align-items: center; gap: 4px; font-size: 0.68rem; color: var(--orange); font-weight: 700; margin-top: 6px; }

        /* ── STICKY BOTTOM BAR ── */
        .sticky-bar {
            display: none;
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: white;
            border-top: 1px solid var(--border);
            padding: 10px 16px 12px;
            z-index: 800;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.1);
        }
        .sticky-bar-top { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        .sticky-bar-price { font-size: 1.15rem; font-weight: 800; line-height: 1.1; }
        .sticky-bar-price small { font-size: 0.7rem; font-weight: 600; color: var(--muted); }
        .sticky-bar-sublabel { font-size: 0.65rem; color: var(--muted); font-weight: 600; margin-top: 1px; }
        .sticky-bar-actions { display: flex; gap: 8px; flex-shrink: 0; }
        .btn-sticky-wa { background: #22c55e; color: white; border: none; border-radius: 50px; padding: 10px 14px; font-weight: 800; font-size: 0.8rem; cursor: pointer; font-family: 'Manrope',sans-serif; display: flex; align-items: center; gap: 5px; white-space: nowrap; }
        .btn-sticky-cta { background: var(--blue); color: white; border: none; border-radius: 50px; padding: 10px 18px; font-weight: 800; font-size: 0.8rem; cursor: pointer; font-family: 'Manrope',sans-serif; white-space: nowrap; }

        /* ── FULLSCREEN MODAL ── */
        .fs-modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.95); z-index: 9999; align-items: center; justify-content: center; flex-direction: column; }
        .fs-modal.open { display: flex; }
        .fs-modal img { max-width: 90vw; max-height: 85vh; object-fit: contain; border-radius: 8px; }
        .fs-modal-close { position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.15); border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: white; font-size: 1rem; }
        .fs-modal-nav { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.15); border: none; border-radius: 50%; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: white; font-size: 1.1rem; }
        .fs-modal-prev { left: 20px; }
        .fs-modal-next { right: 20px; }
        .fs-counter { color: rgba(255,255,255,0.6); font-size: 0.8rem; margin-top: 14px; font-family: 'Manrope',sans-serif; }

        /* ═══════════════════════════════
           RESPONSIVE
        ═══════════════════════════════ */

        /* Tablet landscape */
        @media (max-width: 1024px) {
            .detail-layout { grid-template-columns: 1fr 300px; gap: 20px; }
            .car-title { font-size: 1.5rem; }
        }

        /* Tablet portrait */
        @media (max-width: 860px) {
            .detail-layout { grid-template-columns: 1fr; }
            .sidebar-right { position: static; }
            .sticky-bar { display: block; }
        }

        /* Mobile */
        @media (max-width: 640px) {

            /* Navbar */
            .navbar-top { padding: 0 16px; }
            .nav-actions .btn-vender,
            .nav-actions .btn-comprar,
            .nav-actions .nav-divider { display: none; }
            .breadcrumb-bar { padding: 8px 16px; }

            /* Reducir padding del page-wrap a 0 lateral
               para que la galería pueda ser edge-to-edge */
            .page-wrap { padding: 0 0 80px; }

            /* Car header con padding propio */
            .car-header {
                flex-direction: column;
                gap: 8px;
                padding: 16px 16px 14px;
                margin-bottom: 0;
            }
            .car-title { font-size: 1.25rem; }
            .btn-share { align-self: flex-start; }

            /* Galería edge-to-edge: sin padding lateral que bloquee */
            .gallery-wrap {
                border-radius: 0;
                border-left: none;
                border-right: none;
                border-top: none;
                margin-bottom: 0;
            }

            /* Secciones con padding lateral propio */
            .section-card {
                margin: 12px 16px 0;
                padding: 16px;
                border-radius: 14px;
            }

            /* Última section-card sin margen abajo para similares */
            .section-card:last-of-type { margin-bottom: 0; }

            /* Similares mobile: 1 columna */
            .similares-section { margin-top: 20px; padding: 0 16px; }
            .similares-grid { grid-template-columns: 1fr; }

            /* Specs en 1 columna */
            .specs-grid { grid-template-columns: 1fr; }
            .spec-item { border-bottom: 1px solid var(--border); }
            .spec-item:nth-last-child(-n+2) { border-bottom: 1px solid var(--border); }
            .spec-item:last-child { border-bottom: none; }

            /* Ocultar sidebar — sticky bar lo reemplaza */
            .sidebar-right { display: none; }
        }

        /* Extra pequeño */
        @media (max-width: 400px) {
            .car-title { font-size: 1.1rem; }
            .car-meta-row { font-size: 0.75rem; gap: 8px; }
            .price-card-amount { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

<!-- ── NAVBAR ── -->
<nav class="navbar-top">
    <a href="{{ route('dashboard') }}" class="logo">
        <svg width="26" height="26" viewBox="0 0 28 28" fill="none">
            <path d="M7 21 C7 13 13 5 21 5" stroke="#e8001c" stroke-width="3" stroke-linecap="round"/>
            <circle cx="21" cy="5" r="4" fill="#e8001c"/>
        </svg>
        <span class="logo-text">Dalton<span>Seminuevos</span></span>
        <span class="logo-dot">.com</span>
    </a>
    <div class="nav-actions">
        <button class="btn-vender">Vender mi auto</button>
        <button class="btn-comprar">Comprar un auto</button>
        <div class="nav-divider"></div>
        <button class="btn-user"><i class="bi bi-person"></i></button>
    </div>
</nav>

<!-- ── BREADCRUMB ── -->
<div class="breadcrumb-bar">
    <div class="breadcrumb-inner">
        <a href="{{ route('dashboard') }}"><i class="bi bi-house"></i></a>
        <span class="sep">/</span>
        <a href="{{ route('dashboard', ['marcas[]' => $auto->marca->id_marca]) }}">{{ $auto->marca->nombre }}</a>
        <span class="sep">/</span>
        <span class="current">{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }}</span>
    </div>
</div>

<!-- ── FULLSCREEN MODAL ── -->
<div class="fs-modal" id="fsModal">
    <button class="fs-modal-close" onclick="closeFsModal()"><i class="bi bi-x-lg"></i></button>
    <button class="fs-modal-nav fs-modal-prev" onclick="fsNav(-1)"><i class="bi bi-chevron-left"></i></button>
    <img id="fsModalImg" src="" alt="">
    <button class="fs-modal-nav fs-modal-next" onclick="fsNav(1)"><i class="bi bi-chevron-right"></i></button>
    <div class="fs-counter" id="fsCounter"></div>
</div>

<!-- ── MAIN ── -->
<div class="page-wrap">

    <!-- Car header -->
    <div class="car-header">
        <div>
            <div class="brand-pill">
                @if($auto->marca->imagen)
                    <img src="{{ config('app.admin_storage') . $marca->imagen }}" alt="{{ $auto->marca->nombre }}"
                         onerror="this.style.display='none'">
                @endif
                <span>{{ $auto->marca->nombre }}</span>
                <i class="bi bi-check-circle-fill" style="color:var(--blue);font-size:0.75rem;"></i>
            </div>
            <h1 class="car-title">{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }}</h1>
            <div class="car-meta-row">
                <span>{{ $auto->tipo }}</span>
                <span class="dot"></span>
                <span>{{ $auto->ocultar_kilometraje ? 'Km no disponible' : number_format($auto->kilometraje) . ' Km' }}</span>
                @if($auto->year == date('Y'))
                    <span class="dot"></span>
                    <span class="badge-nuevo-header"><i class="bi bi-plus"></i> Nuevo 0km</span>
                @endif
                @if($auto->consignacion)
                    <span class="dot"></span>
                    <span class="badge-consignacion-header">En consignación</span>
                @endif
            </div>
        </div>
        <button class="btn-share" onclick="shareAuto()">
            <i class="bi bi-share"></i> Compartir
        </button>
    </div>

    <!-- ── GALERÍA (fuera del detail-layout para edge-to-edge en mobile) ── -->
    <div class="gallery-wrap" id="gallerySection">
        <div class="gallery-main">
            <img id="mainImg"
                 src="{{ env('ADMIN_STORAGE_URL') . ($auto->thumbnail->imagen ?? $auto->imagenes->first()?->imagen) }}"
                 alt="{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }}"
                 loading="eager">
            <button class="gallery-btn gallery-btn-expand" onclick="openFsModal(currentIndex)">
                <i class="bi bi-arrows-angle-expand"></i>
            </button>
            <button class="gallery-btn gallery-btn-prev" onclick="galleryNav(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="gallery-btn gallery-btn-next" onclick="galleryNav(1)">
                <i class="bi bi-chevron-right"></i>
            </button>
            <div class="gallery-counter" id="galleryCounter">1 / {{ $auto->imagenes->count() }}</div>
            <button class="gallery-photos-btn" onclick="openFsModal(0)">
                <i class="bi bi-images"></i> Ver todas ({{ $auto->imagenes->count() }})
            </button>
        </div>
        <div class="gallery-thumbs" id="galleryThumbs">
            @foreach($auto->imagenes as $index => $imagen)
                <div class="thumb-item {{ $imagen->thumbnail ? 'active' : ($index === 0 ? 'active' : '') }}"
                     onclick="setGalleryIndex({{ $index }})">
                    <img src="{{ env('ADMIN_STORAGE_URL') . $imagen->imagen }}"
                         alt="{{ $auto->modelo }}" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>

    <!-- ── DETAIL LAYOUT ── -->
    <div class="detail-layout" style="margin-top:20px;">

        <!-- LEFT COLUMN -->
        <div>
            <!-- Características -->
            <div class="section-card">
                <div class="section-title"><i class="bi bi-sliders"></i> Características</div>
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon-wrap"><i class="bi bi-speedometer2"></i></div>
                        <div>
                            <div class="spec-label">Kilometraje</div>
                            <div class="spec-value">{{ $auto->ocultar_kilometraje ? 'No disponible' : number_format($auto->kilometraje) . ' Km' }}</div>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon-wrap"><i class="bi bi-fuel-pump"></i></div>
                        <div>
                            <div class="spec-label">Combustible</div>
                            <div class="spec-value">{{ $auto->combustible ?? '—' }}</div>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon-wrap"><i class="bi bi-palette2"></i></div>
                        <div>
                            <div class="spec-label">Color exterior</div>
                            <div class="spec-value">{{ $auto->color ?? '—' }}</div>
                        </div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon-wrap"><i class="bi bi-gear"></i></div>
                        <div>
                            <div class="spec-label">Transmisión</div>
                            <div class="spec-value">{{ $auto->transmision ?? 'Automática' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            @if($auto->descripcion)
            <div class="section-card">
                <div class="section-title"><i class="bi bi-file-text"></i> Descripción</div>
                <p class="descripcion-text">{{ $auto->descripcion }}</p>
            </div>
            @endif

            <!-- Similares — 3 cards, grid simple -->
            <div class="similares-section">
                <div class="similares-header">
                    <h3>Autos similares</h3>
                </div>
                <div class="similares-grid">
                    @php
                    $similares = [
                        ['name'=>'Kia Telluride 2022','meta'=>'EX, 3.8L V6 | 52,400 Km','price'=>'$12,100','unit'=>'MXN/mes','contado'=>'$570,000 MXN de contado','market'=>'4% menor al mercado','img'=>'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/kia.com'],
                        ['name'=>'Kia Telluride 2022','meta'=>'EX, 3.8L V6 | 52,400 Km','price'=>'$12,100','unit'=>'MXN/mes','contado'=>'$570,000 MXN de contado','market'=>'4% menor al mercado','img'=>'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/kia.com'],
                        ['name'=>'Ford Explorer 2021','meta'=>'ST, BI-TURBO V6 | 88,200 Km','price'=>'$11,800','unit'=>'MXN/mes','contado'=>'$556,000 MXN de contado','market'=>'8% menor al mercado','img'=>'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/ford.com'],
                        ['name'=>'Kia Telluride 2022','meta'=>'EX, 3.8L V6 | 52,400 Km','price'=>'$12,100','unit'=>'MXN/mes','contado'=>'$570,000 MXN de contado','market'=>'4% menor al mercado','img'=>'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/kia.com'],
                    ];
                    @endphp
                    @foreach($similares as $s)
                    <div class="similar-card">
                        <img src="{{ $s['img'] }}" alt="{{ $s['name'] }}" loading="lazy"
                             onerror="this.closest('.similar-card').style.display='none'">
                        <div class="similar-card-body">
                            <div class="similar-card-header">
                                <div class="similar-card-title">{{ $s['name'] }}</div>
                                <img src="{{ $s['logo'] }}" alt="" class="similar-brand-logo" onerror="this.style.display='none'">
                            </div>
                            <div class="similar-card-meta">{{ $s['meta'] }}</div>
                            <div class="similar-price">{{ $s['price'] }} <small>{{ $s['unit'] }}</small></div>
                            <div class="similar-contado">{{ $s['contado'] }}</div>
                            <div class="similar-market"><i class="bi bi-graph-down-arrow"></i> {{ $s['market'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end left -->

        <!-- RIGHT SIDEBAR -->
        <div class="sidebar-right">
            <div class="price-card">
                <div class="price-card-top">
                    <div class="price-card-label">Precio de contado</div>
                    <div class="price-card-amount">
                        ${{ number_format($auto->precio, 0, ',', '.') }} <small>MXN</small>
                    </div>
                    <div class="price-card-badges">
                        @if($auto->consignacion)
                            <span class="price-badge price-badge-red"><i class="bi bi-tag-fill"></i> En consignación</span>
                        @endif
                        <span class="price-badge price-badge-green"><i class="bi bi-shield-check"></i> Precio verificado</span>
                    </div>
                </div>
                <div class="price-card-bottom">
                    <button class="btn-interesa"><i class="bi bi-chat-dots-fill"></i> Me interesa</button>
                    <button class="btn-whatsapp"><i class="bi bi-whatsapp"></i> Contactar por WhatsApp</button>
                    <p class="price-disclaimer">Precio sujeto a disponibilidad. Consulta condiciones con un asesor.</p>
                </div>
            </div>

            <div class="quick-facts">
                <div class="quick-fact-item">
                    <span class="quick-fact-label"><i class="bi bi-calendar3"></i> Año</span>
                    <span class="quick-fact-value">{{ $auto->year }}</span>
                </div>
                <div class="quick-fact-item">
                    <span class="quick-fact-label"><i class="bi bi-speedometer2"></i> Kilometraje</span>
                    <span class="quick-fact-value">{{ $auto->ocultar_kilometraje ? 'No disp.' : number_format($auto->kilometraje) . ' Km' }}</span>
                </div>
                <div class="quick-fact-item">
                    <span class="quick-fact-label"><i class="bi bi-fuel-pump"></i> Combustible</span>
                    <span class="quick-fact-value">{{ $auto->combustible ?? '—' }}</span>
                </div>
                <div class="quick-fact-item">
                    <span class="quick-fact-label"><i class="bi bi-gear"></i> Transmisión</span>
                    <span class="quick-fact-value">{{ $auto->transmision ?? 'Automática' }}</span>
                </div>
                <div class="quick-fact-item">
                    <span class="quick-fact-label"><i class="bi bi-palette2"></i> Color</span>
                    <span class="quick-fact-value">{{ $auto->color ?? '—' }}</span>
                </div>
            </div>
        </div><!-- end sidebar -->

    </div><!-- end detail-layout -->
</div><!-- end page-wrap -->

<!-- ── STICKY BOTTOM BAR (mobile) ── -->
<div class="sticky-bar" id="stickyBar">
    <div class="sticky-bar-top">
        <div>
            <div class="sticky-bar-price">
                ${{ number_format($auto->precio, 0, ',', '.') }} <small>MXN</small>
            </div>
            <div class="sticky-bar-sublabel">Precio de contado</div>
        </div>
        <div class="sticky-bar-actions">
            <button class="btn-sticky-wa"><i class="bi bi-whatsapp"></i> WhatsApp</button>
            <button class="btn-sticky-cta">Me interesa</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const carImages = @json($auto->imagenes->map(fn($img) => env('ADMIN_STORAGE_URL') . $img->imagen)->values());
    let currentIndex = 0;

    function setGalleryIndex(idx) {
        currentIndex = idx;
        const mainImg = document.getElementById('mainImg');
        mainImg.style.opacity = '0';
        setTimeout(() => { mainImg.src = carImages[idx]; mainImg.style.opacity = '1'; }, 150);
        document.querySelectorAll('.thumb-item').forEach((t, i) => t.classList.toggle('active', i === idx));
        document.getElementById('galleryCounter').textContent = `${idx + 1} / ${carImages.length}`;
        const activeThumb = document.querySelectorAll('.thumb-item')[idx];
        if (activeThumb) activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
    }

    function galleryNav(dir) {
        let next = currentIndex + dir;
        if (next < 0) next = carImages.length - 1;
        if (next >= carImages.length) next = 0;
        setGalleryIndex(next);
    }

    function openFsModal(idx) {
        currentIndex = idx;
        document.getElementById('fsModalImg').src = carImages[idx];
        document.getElementById('fsCounter').textContent = `${idx + 1} / ${carImages.length}`;
        document.getElementById('fsModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeFsModal() {
        document.getElementById('fsModal').classList.remove('open');
        document.body.style.overflow = '';
    }

    function fsNav(dir) {
        let next = currentIndex + dir;
        if (next < 0) next = carImages.length - 1;
        if (next >= carImages.length) next = 0;
        currentIndex = next;
        document.getElementById('fsModalImg').src = carImages[next];
        document.getElementById('fsCounter').textContent = `${next + 1} / ${carImages.length}`;
    }

    document.getElementById('fsModal').addEventListener('click', e => { if (e.target === e.currentTarget) closeFsModal(); });
    document.addEventListener('keydown', e => {
        if (!document.getElementById('fsModal').classList.contains('open')) return;
        if (e.key === 'ArrowRight') fsNav(1);
        if (e.key === 'ArrowLeft')  fsNav(-1);
        if (e.key === 'Escape')     closeFsModal();
    });

    function shareAuto() {
        if (navigator.share) {
            navigator.share({ title: '{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }}', url: window.location.href });
        } else {
            navigator.clipboard?.writeText(window.location.href).then(() => alert('¡Enlace copiado!'));
        }
    }

    document.getElementById('mainImg').style.transition = 'opacity 0.15s ease';

</script>
</body>
</html>