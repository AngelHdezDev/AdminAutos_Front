<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ford Explorer 2022 - DaltonSeminuevos</title>
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
            --dalton-yellow: #eab308;
            --dalton-text: #111827;
            --dalton-muted: #6b7280;
            --dalton-border: #e5e7eb;
            --dalton-bg: #f9fafb;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Manrope', sans-serif; color: var(--dalton-text); background: white; margin: 0; }

        /* ===== NAVBAR TOP ===== */
        .navbar-top { background: var(--dalton-dark); padding: 10px 24px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 1000; height: 52px; }
        .logo { display: flex; align-items: center; gap: 6px; text-decoration: none; }
        .logo-text { color: white; font-weight: 800; font-size: 1.1rem; }
        .logo-text span { color: var(--dalton-red); }
        .navbar-top-actions { display: flex; align-items: center; gap: 10px; }
        .btn-vender { background: transparent; border: 1.5px solid rgba(255,255,255,0.5); color: white; border-radius: 50px; padding: 7px 18px; font-size: 0.82rem; font-weight: 600; cursor: pointer; font-family: 'Manrope',sans-serif; white-space: nowrap; }
        .btn-comprar { background: white; border: none; color: var(--dalton-dark); border-radius: 50px; padding: 7px 18px; font-size: 0.82rem; font-weight: 700; cursor: pointer; font-family: 'Manrope',sans-serif; }
        .navbar-top-divider { width: 1px; height: 28px; background: rgba(255,255,255,0.2); margin: 0 4px; }
        .btn-user { background: transparent; border: none; color: white; font-size: 1.3rem; cursor: pointer; }

        /* ===== BREADCRUMB ===== */
        .breadcrumb-bar {
            background: var(--dalton-dark);
            padding: 8px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .breadcrumb-links { display: flex; align-items: center; gap: 6px; font-size: 0.78rem; color: rgba(255,255,255,0.6); }
        .breadcrumb-links a { color: rgba(255,255,255,0.6); text-decoration: none; }
        .breadcrumb-links a:hover { color: white; }
        .breadcrumb-links .sep { color: rgba(255,255,255,0.3); }
        .breadcrumb-links .current { color: rgba(255,255,255,0.9); }
        .sku { font-size: 0.78rem; color: rgba(255,255,255,0.5); }

        /* ===== STICKY TABS (on scroll) ===== */
        .tabs-sticky {
            background: white;
            border-bottom: 1px solid var(--dalton-border);
            position: sticky;
            top: 52px;
            z-index: 900;
            display: none;
        }
        .tabs-sticky.visible { display: flex; }
        .tabs-sticky-inner { display: flex; padding: 0 24px; max-width: 960px; margin: 0 auto; }
        .tab-link {
            padding: 14px 28px;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--dalton-muted);
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
            cursor: pointer;
        }
        .tab-link.active { color: var(--dalton-blue); border-bottom-color: var(--dalton-blue); background: #eff6ff; border-radius: 8px 8px 0 0; }
        .tab-link:hover:not(.active) { color: var(--dalton-text); }

        /* ===== MAIN CONTENT ===== */
        .page-content { max-width: 1280px; margin: 0 auto; padding: 28px 24px; }

        /* Brand + title */
        .brand-line { display: flex; align-items: center; gap: 6px; margin-bottom: 6px; }
        .brand-line img { height: 18px; object-fit: contain; }
        .brand-name { font-size: 0.85rem; font-weight: 700; color: var(--dalton-text); }
        .verified-icon { color: var(--dalton-blue); font-size: 0.9rem; }
        .car-title { font-size: 2rem; font-weight: 800; margin: 0 0 8px; }
        .car-subtitle { display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--dalton-muted); margin-bottom: 24px; }
        .car-subtitle a { color: var(--dalton-blue); font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 4px; }
        .car-subtitle .sep { color: var(--dalton-border); }
        .share-btn { display: flex; align-items: center; gap: 6px; border: 1.5px solid var(--dalton-border); border-radius: 50px; padding: 6px 16px; font-size: 0.82rem; font-weight: 700; background: white; cursor: pointer; font-family: 'Manrope',sans-serif; color: var(--dalton-text); }

        /* ===== GALLERY ===== */
        .gallery-layout { display: grid; grid-template-columns: 80px 1fr; gap: 12px; margin-bottom: 24px; }
        .thumbnails { display: flex; flex-direction: column; gap: 8px; }
        .thumb {
            width: 80px;
            height: 64px;
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid transparent;
            cursor: pointer;
            flex-shrink: 0;
            background: var(--dalton-bg);
        }
        .thumb.active { border-color: var(--dalton-blue); }
        .thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .thumb-more { width: 80px; height: 64px; border-radius: 10px; background: rgba(0,0,0,0.06); display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; }
        .thumb-more i { font-size: 1.2rem; color: var(--dalton-muted); }

        .main-image-wrap {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #f0f0f0;
            aspect-ratio: 16/10;
        }
        .main-image-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .img-btn-expand { position: absolute; top: 14px; right: 14px; background: white; border: none; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
        .img-btn-next { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: white; border: none; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
        .img-btn-interior { position: absolute; bottom: 14px; left: 14px; background: rgba(0,0,0,0.55); color: white; border: none; border-radius: 50px; padding: 6px 14px; font-size: 0.75rem; font-weight: 700; font-family: 'Manrope',sans-serif; cursor: pointer; display: flex; align-items: center; gap: 5px; backdrop-filter: blur(4px); }
        .img-btn-all-photos { position: absolute; bottom: 14px; right: 14px; background: rgba(0,0,0,0.55); color: white; border: none; border-radius: 50px; padding: 6px 14px; font-size: 0.75rem; font-weight: 700; font-family: 'Manrope',sans-serif; cursor: pointer; display: flex; align-items: center; gap: 5px; backdrop-filter: blur(4px); }

        /* ===== DETAIL TABS ===== */
        .detail-tabs { display: flex; background: white; border: 1.5px solid var(--dalton-border); border-radius: 50px; padding: 4px; margin-bottom: 28px; }
        .detail-tab {
            flex: 1;
            text-align: center;
            padding: 10px 16px;
            font-size: 0.85rem;
            font-weight: 700;
            border-radius: 50px;
            cursor: pointer;
            color: var(--dalton-muted);
            transition: all 0.2s;
            border: none;
            background: none;
            font-family: 'Manrope',sans-serif;
        }
        .detail-tab.active { background: var(--dalton-blue); color: white; }

        /* ===== SECTION CARD ===== */
        .section-card { background: white; border: 1.5px solid var(--dalton-border); border-radius: 16px; padding: 24px; margin-bottom: 16px; }
        .section-card-title { font-size: 1.1rem; font-weight: 800; margin-bottom: 6px; }
        .section-card-sub { font-size: 0.83rem; color: var(--dalton-muted); margin-bottom: 20px; }
        .section-card-sub strong { color: var(--dalton-blue); }

        /* ===== SPECS GRID ===== */
        .specs-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
        .spec-item { display: flex; align-items: flex-start; gap: 10px; }
        .spec-icon { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--dalton-red); font-size: 1rem; }
        .spec-label { font-size: 0.72rem; color: var(--dalton-muted); font-weight: 600; margin-bottom: 2px; }
        .spec-value { font-size: 0.9rem; font-weight: 700; }
        .spec-divider { grid-column: 1 / -1; height: 1px; background: var(--dalton-border); }

        /* ===== HISTORIAL GRID ===== */
        .historial-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 16px; border-top: 1px solid var(--dalton-border); padding-top: 16px; }
        .historial-item { display: flex; align-items: flex-start; gap: 10px; }
        .historial-icon { width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--dalton-red); font-size: 0.95rem; }
        .historial-label { font-size: 0.72rem; color: var(--dalton-muted); font-weight: 600; margin-bottom: 1px; }
        .historial-value { font-size: 0.9rem; font-weight: 700; }

        /* ===== UBICACION CARD ===== */
        .ubicacion-card { display: flex; align-items: center; gap: 16px; border: 1.5px solid var(--dalton-border); border-radius: 14px; padding: 16px; }
        .ubicacion-card img { width: 120px; height: 90px; object-fit: cover; border-radius: 10px; flex-shrink: 0; display: block; }
        .ubicacion-name { font-size: 1rem; font-weight: 800; margin-bottom: 4px; }
        .ubicacion-address { font-size: 0.82rem; color: var(--dalton-muted); margin-bottom: 10px; }
        .ver-detalles { color: var(--dalton-blue); font-size: 0.82rem; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; }

        /* ===== GARANTIAS ===== */
        .garantia-section-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 20px; }
        .garantias-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; margin-bottom: 32px; }
        .garantia-card { background: var(--dalton-bg); border-radius: 14px; padding: 20px; display: flex; align-items: flex-start; gap: 14px; }
        .garantia-badge { width: 56px; height: 56px; flex-shrink: 0; }
        .garantia-badge-inner { width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, #b91c1c, #dc2626); display: flex; align-items: center; justify-content: center; }
        .garantia-badge-inner i { color: white; font-size: 1.4rem; }
        .garantia-title { font-weight: 800; font-size: 0.95rem; margin-bottom: 6px; }
        .garantia-desc { font-size: 0.8rem; color: var(--dalton-muted); line-height: 1.5; }

        /* ===== TOMAMOS TU AUTO ===== */
        .tomamos-banner {
            background: #2d3748;
            border-radius: 16px;
            padding: 28px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .tomamos-banner h4 { color: white; font-weight: 800; font-size: 1.2rem; margin-bottom: 6px; }
        .tomamos-banner p { color: rgba(255,255,255,0.75); font-size: 0.85rem; margin: 0; }
        .tomamos-banner p strong { color: white; }
        .btn-valorar { background: white; color: var(--dalton-dark); border: none; border-radius: 50px; padding: 10px 24px; font-weight: 800; font-size: 0.85rem; cursor: pointer; font-family: 'Manrope',sans-serif; white-space: nowrap; margin-top: 12px; display: inline-block; }
        .tomamos-car-img { width: 200px; height: 120px; object-fit: contain; flex-shrink: 0; }
        .dollar-signs { position: absolute; right: 220px; top: 10px; font-size: 1.5rem; color: rgba(255,255,255,0.1); line-height: 1; }

        /* ===== DESCRIPCION ===== */
        .descripcion-text { font-size: 0.87rem; color: var(--dalton-muted); line-height: 1.7; }

        /* ===== SIMILARES ===== */
        .similares-section { background: var(--dalton-bg); padding: 32px 24px; margin: 0 -24px; }
        .similares-title { font-size: 1.2rem; font-weight: 800; margin-bottom: 20px; }
        .similares-scroll { display: flex; gap: 14px; overflow-x: auto; padding-bottom: 8px; scrollbar-width: none; }
        .similares-scroll::-webkit-scrollbar { display: none; }

        .similar-card {
            min-width: 230px;
            width: 230px;
            background: white;
            border-radius: 14px;
            border: 1.5px solid var(--dalton-border);
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .similar-card:hover { box-shadow: 0 6px 20px rgba(0,0,0,0.1); transform: translateY(-2px); }
        .similar-card-img { width: 100%; aspect-ratio: 4/3; object-fit: cover; display: block; background: #f0f0f0; }
        .similar-card-body { padding: 12px; }
        .similar-card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 2px; }
        .similar-card-title { font-size: 0.88rem; font-weight: 800; }
        .similar-brand-logo { height: 18px; object-fit: contain; }
        .similar-card-meta { font-size: 0.7rem; color: var(--dalton-muted); margin-bottom: 10px; line-height: 1.4; }
        .similar-price { font-size: 1rem; font-weight: 800; color: var(--dalton-green); }
        .similar-price small { font-size: 0.68rem; font-weight: 600; color: var(--dalton-muted); }
        .similar-contado { font-size: 0.72rem; color: var(--dalton-muted); margin-top: 2px; }
        .similar-market { display: flex; align-items: center; gap: 4px; font-size: 0.7rem; color: var(--dalton-orange); font-weight: 700; margin-top: 8px; }

        /* ===== SIDEBAR (right) ===== */
        .detail-layout { display: grid; grid-template-columns: 1fr 320px; gap: 28px; align-items: start; }
        .sidebar-right { position: sticky; top: 64px; }

        /* Calculator card */
        .calc-card { border: 1.5px solid var(--dalton-border); border-radius: 16px; padding: 20px; background: white; margin-bottom: 16px; }
        .calc-title { font-size: 0.9rem; font-weight: 800; margin-bottom: 14px; display: flex; align-items: center; justify-content: space-between; }
        .calc-title a { font-size: 0.78rem; color: var(--dalton-blue); font-weight: 700; text-decoration: none; }

        .calc-tabs { display: flex; gap: 8px; margin-bottom: 16px; }
        .calc-tab {
            flex: 1;
            border: 1.5px solid var(--dalton-border);
            border-radius: 10px;
            padding: 8px 6px;
            text-align: center;
            cursor: pointer;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--dalton-muted);
            background: white;
            font-family: 'Manrope',sans-serif;
            transition: all 0.15s;
        }
        .calc-tab.active { border-color: var(--dalton-blue); background: var(--dalton-blue); color: white; }
        .calc-tab i { display: block; font-size: 1rem; margin-bottom: 3px; }

        .calc-price-box { background: #eff6ff; border-radius: 12px; padding: 14px 16px; margin-bottom: 14px; }
        .calc-price-label { font-size: 0.75rem; color: var(--dalton-muted); font-weight: 600; margin-bottom: 4px; }
        .calc-price-row { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
        .calc-price { font-size: 1.6rem; font-weight: 800; color: var(--dalton-text); }
        .calc-price sup { font-size: 0.9rem; }
        .calc-badge-market { background: var(--dalton-yellow); color: var(--dalton-text); font-size: 0.68rem; font-weight: 800; padding: 3px 8px; border-radius: 50px; display: flex; align-items: center; gap: 3px; white-space: nowrap; }
        .badge-liquidacion-calc { display: inline-flex; align-items: center; background: var(--dalton-red); color: white; font-size: 0.7rem; font-weight: 800; padding: 4px 10px; border-radius: 6px; margin-top: 8px; }

        /* Enganche slider */
        .calc-row-label { display: flex; align-items: center; justify-content: space-between; font-size: 0.8rem; font-weight: 700; margin-bottom: 8px; }
        .calc-row-label span:last-child { color: var(--dalton-text); font-weight: 800; }
        .calc-slider { width: 100%; accent-color: var(--dalton-blue); cursor: pointer; margin-bottom: 4px; }
        .calc-slider-labels { display: flex; justify-content: space-between; font-size: 0.68rem; color: var(--dalton-muted); font-weight: 600; margin-bottom: 16px; }
        .calc-plazo-labels { display: flex; justify-content: space-between; font-size: 0.7rem; color: var(--dalton-muted); font-weight: 600; margin-top: 4px; }

        /* CTA button */
        .btn-me-interesa { width: 100%; background: var(--dalton-blue); color: white; border: none; border-radius: 50px; padding: 14px; font-size: 0.95rem; font-weight: 800; cursor: pointer; font-family: 'Manrope',sans-serif; transition: background 0.2s; }
        .btn-me-interesa:hover { background: #1748c5; }
        .calc-disclaimer { font-size: 0.68rem; color: var(--dalton-muted); line-height: 1.5; margin-top: 12px; }

        /* Oferta card */
        .oferta-card { border: 1.5px solid var(--dalton-border); border-radius: 16px; padding: 18px; background: white; }
        .oferta-title { font-size: 0.85rem; font-weight: 800; color: var(--dalton-green); margin-bottom: 6px; }
        .oferta-desc { font-size: 0.82rem; color: var(--dalton-text); margin-bottom: 12px; line-height: 1.5; }
        .oferta-desc strong { font-weight: 800; }
        .oferta-meter { display: flex; align-items: center; justify-content: flex-end; }
        .meter-svg { width: 80px; height: 48px; }
        .oferta-ahorro { display: flex; align-items: center; gap: 6px; font-size: 0.82rem; margin: 10px 0; }
        .coin-icon { font-size: 1.1rem; }
        .oferta-row { display: flex; align-items: center; justify-content: space-between; font-size: 0.82rem; padding: 6px 0; border-bottom: 1px solid var(--dalton-border); }
        .oferta-row:last-of-type { border-bottom: none; }
        .oferta-row-label { color: var(--dalton-muted); font-weight: 600; }
        .oferta-row-value { font-weight: 700; }
        .oferta-row-value.green { color: var(--dalton-green); font-weight: 800; }
        .oferta-note { font-size: 0.68rem; color: var(--dalton-muted); margin-top: 8px; }

        /* ===== STICKY BOTTOM BAR ===== */
        .sticky-bottom {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: white;
            border-top: 1px solid var(--dalton-border);
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 800;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
        }
        .sticky-car-info { display: flex; align-items: center; gap: 14px; }
        .sticky-car-img { width: 70px; height: 50px; object-fit: cover; border-radius: 8px; display: block; }
        .sticky-price { font-size: 1rem; font-weight: 800; }
        .sticky-price small { font-size: 0.72rem; font-weight: 600; color: var(--dalton-muted); }
        .sticky-badge { background: var(--dalton-yellow); color: var(--dalton-text); font-size: 0.68rem; font-weight: 800; padding: 3px 9px; border-radius: 50px; display: inline-flex; align-items: center; gap: 3px; }
        .sticky-contado { font-size: 0.75rem; color: var(--dalton-muted); margin-top: 2px; }
        .btn-sticky-interesa { background: var(--dalton-blue); color: white; border: none; border-radius: 50px; padding: 12px 28px; font-weight: 800; font-size: 0.9rem; cursor: pointer; font-family: 'Manrope',sans-serif; white-space: nowrap; }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
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

<!-- ===== BREADCRUMB ===== -->
<div class="breadcrumb-bar">
    <div class="breadcrumb-links">
        <a href="#"><i class="bi bi-house"></i></a>
        <span class="sep">/</span>
        <a href="#">Ford</a>
        <span class="sep">/</span>
        <span class="current">Ford Explorer</span>
    </div>
    <span class="sku">SKU: SDTL 89064</span>
</div>

<!-- ===== STICKY TABS (appear on scroll) ===== -->
<div class="tabs-sticky" id="stickyTabs">
    <div class="tabs-sticky-inner">
        <a class="tab-link active" onclick="scrollToSection('caracteristicas')">Características</a>
        <a class="tab-link" onclick="scrollToSection('historial')">Historial</a>
        <a class="tab-link" onclick="scrollToSection('ubicacion')">Ubicación</a>
        <a class="tab-link" onclick="scrollToSection('garantias')">Garantías</a>
    </div>
</div>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-content">
    <!-- Header row -->
    <div class="d-flex align-items-start justify-content-between mb-2">
        <div>
            <div class="brand-line">
                <img src="https://logo.clearbit.com/ford.com" alt="Ford" onerror="this.style.display='none'">
                <span class="brand-name">Ford</span>
                <i class="bi bi-check-circle-fill verified-icon"></i>
            </div>
            <h1 class="car-title">Ford Explorer 2022</h1>
            <div class="car-subtitle">
                <span>5 Pts. St, Bi-turbo, V6, 3.0T., Ta10, ...</span>
                <span class="sep">|</span>
                <a href="#"><i class="bi bi-geo-alt-fill"></i> Toyota Lomas - San Luis Potosí</a>
            </div>
        </div>
        <button class="share-btn"><i class="bi bi-share"></i> Compartir</button>
    </div>

    <!-- Detail layout: main + sidebar -->
    <div class="detail-layout">

        <!-- LEFT COLUMN -->
        <div>
            <!-- Gallery -->
            <div class="gallery-layout" id="gallerySection">
                <div class="thumbnails">
                    <div class="thumb active" onclick="changeMainImg(this, 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=900&h=600&fit=crop&q=80')">
                        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=160&h=120&fit=crop&q=75" alt="">
                    </div>
                    <div class="thumb" onclick="changeMainImg(this, 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=900&h=600&fit=crop&q=80')">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=160&h=120&fit=crop&q=75" alt="">
                    </div>
                    <div class="thumb" onclick="changeMainImg(this, 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=900&h=600&fit=crop&q=80')">
                        <img src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=160&h=120&fit=crop&q=75" alt="">
                    </div>
                    <div class="thumb" onclick="changeMainImg(this, 'https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=900&h=600&fit=crop&q=80')">
                        <img src="https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=160&h=120&fit=crop&q=75" alt="">
                    </div>
                    <div class="thumb-more">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
                <div class="main-image-wrap">
                    <img id="mainImg" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=900&h=600&fit=crop&q=80" alt="Ford Explorer 2022">
                    <button class="img-btn-expand"><i class="bi bi-arrows-angle-expand" style="font-size:0.85rem"></i></button>
                    <button class="img-btn-next"><i class="bi bi-chevron-right"></i></button>
                    <button class="img-btn-interior"><i class="bi bi-person-seat-fill"></i> Interior</button>
                    <button class="img-btn-all-photos"><i class="bi bi-images"></i> Ver todas las fotos</button>
                </div>
            </div>

            <!-- Section tabs -->
            <div class="detail-tabs" id="detailTabs">
                <button class="detail-tab active" onclick="switchTab(this,'caracteristicas')">Características</button>
                <button class="detail-tab" onclick="switchTab(this,'historial')">Historial</button>
                <button class="detail-tab" onclick="switchTab(this,'ubicacion')">Ubicación</button>
                <button class="detail-tab" onclick="switchTab(this,'garantias')">Garantías</button>
            </div>

            <!-- CARACTERÍSTICAS -->
            <div id="caracteristicas">
                <div class="section-card">
                    <div class="section-card-title">Características</div>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-speedometer2"></i></div>
                            <div>
                                <div class="spec-label">Kilometraje</div>
                                <div class="spec-value">110,481 Km</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-fuel-pump"></i></div>
                            <div>
                                <div class="spec-label">Combustible</div>
                                <div class="spec-value">Gasolina</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-people"></i></div>
                            <div>
                                <div class="spec-label">Pasajeros</div>
                                <div class="spec-value">7 asientos</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-palette2"></i></div>
                            <div>
                                <div class="spec-label">Color exterior</div>
                                <div class="spec-value">Gris</div>
                            </div>
                        </div>
                        <div class="spec-divider"></div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-gear"></i></div>
                            <div>
                                <div class="spec-label">Transmisión</div>
                                <div class="spec-value">Automatica</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-person-seat"></i></div>
                            <div>
                                <div class="spec-label">Color interior</div>
                                <div class="spec-value">Negro</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <div class="spec-icon"><i class="bi bi-file-earmark-text"></i></div>
                            <div>
                                <div class="spec-label">IVA</div>
                                <div class="spec-value">Sí</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HISTORIAL -->
            <div id="historial">
                <div class="section-card">
                    <div class="section-card-title">Historial del auto</div>
                    <div class="section-card-sub">Inspeccionado en más de <strong>+150 puntos</strong> y respaldado por la garantía de calidad Dalton.</div>
                    <div class="historial-grid">
                        <div class="historial-item">
                            <div class="historial-icon"><i class="bi bi-person"></i></div>
                            <div>
                                <div class="historial-label">Historial de dueños</div>
                                <div class="historial-value">Único dueño</div>
                            </div>
                        </div>
                        <div class="historial-item">
                            <div class="historial-icon"><i class="bi bi-key"></i></div>
                            <div>
                                <div class="historial-label">Duplicado de llaves</div>
                                <div class="historial-value">Sí</div>
                            </div>
                        </div>
                        <div class="historial-item">
                            <div class="historial-icon"><i class="bi bi-file-text"></i></div>
                            <div>
                                <div class="historial-label">Manuales</div>
                                <div class="historial-value">No</div>
                            </div>
                        </div>
                        <div class="historial-item">
                            <div class="historial-icon"><i class="bi bi-tools"></i></div>
                            <div>
                                <div class="historial-label">Acondicionamiento</div>
                                <div class="historial-value">Pendiente</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UBICACION -->
            <div id="ubicacion">
                <h3 style="font-size:1.1rem;font-weight:800;margin-bottom:14px;">Ubicación de este auto</h3>
                <div class="ubicacion-card">
                    <img src="https://images.unsplash.com/photo-1562519776-18a373b990d4?w=240&h=180&fit=crop&q=75" alt="Dalton Toyota San Luis Potosí">
                    <div>
                        <div class="ubicacion-name">Dalton Toyota San Luis Potosí</div>
                        <div class="ubicacion-address">Cordillera de los Alpes 570, Lomas 4ta Secc, 78216 San Luis, S.L.P.</div>
                        <a href="#" class="ver-detalles">Ver detalles <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- GARANTIAS -->
            <div id="garantias" style="margin-top:24px;">
                <h3 class="garantia-section-title">¿Por qué elegir Dalton Seminuevos?</h3>
                <div class="garantias-grid">
                    <div class="garantia-card">
                        <div class="garantia-badge">
                            <div class="garantia-badge-inner"><i class="bi bi-shield-check"></i></div>
                        </div>
                        <div>
                            <div class="garantia-title">Más de 30 años de experiencia</div>
                            <div class="garantia-desc">Contamos con décadas de experiencia en compra y venta de autos, ofreciendo atención profesional y procesos seguros.</div>
                        </div>
                    </div>
                    <div class="garantia-card">
                        <div class="garantia-badge">
                            <div class="garantia-badge-inner"><i class="bi bi-clipboard2-check"></i></div>
                        </div>
                        <div>
                            <div class="garantia-title">Inspecciones claras y honestas</div>
                            <div class="garantia-desc">Mostramos cada detalle del auto: historial, puntos revisados y cualquier imperfección para que tomes decisiones informadas.</div>
                        </div>
                    </div>
                    <div class="garantia-card">
                        <div class="garantia-badge">
                            <div class="garantia-badge-inner"><i class="bi bi-currency-dollar"></i></div>
                        </div>
                        <div>
                            <div class="garantia-title">Financiamiento claro y sin estrés</div>
                            <div class="garantia-desc">Revisamos contigo las alternativas de crédito para que tomes decisiones seguras y alineadas a lo que necesitas.</div>
                        </div>
                    </div>
                </div>

                <!-- Tomamos tu auto banner -->
                <div class="tomamos-banner">
                    <div>
                        <h4>¡Tomamos tu auto a cuenta!</h4>
                        <p>Obtén crédito por tu auto y paga menos por <strong>Explorer 2022.</strong></p>
                        <button class="btn-valorar">Valorar tu auto</button>
                    </div>
                    <div class="dollar-signs">$ $ $<br>$ $ $</div>
                    <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=400&h=240&fit=crop&q=75" alt="Auto" class="tomamos-car-img">
                </div>
            </div>

            <!-- DESCRIPCION -->
            <div style="margin-top:24px; margin-bottom:8px;">
                <h3 style="font-size:1rem;font-weight:800;margin-bottom:10px;">Descripción</h3>
                <p class="descripcion-text">Ford explorer no caigas en estafas. En dalton seminuevos no solicitamos pagos por adelantado, verifica nuestros canales oficiales. Bienvenido a dalton seminuevos el lugar ideal para encontrar tu proximo auto con solo un clic. Adquiérelo desde el 20% de enganche y con plazos de hasta 60 meses. Conoce nuestra garantía de 3 años o hasta 60,000 km. También compramos tu auto y lo tomamos a cuenta. Estrena hoy mismo sku:sdtl 89064</p>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="sidebar-right">

            <!-- Calculator Card -->
            <div class="calc-card">
                <div class="calc-title">
                    Calculadora DaltonCredit<sup>®</sup>
                    <a href="#">Conoce más <i class="bi bi-info-circle"></i></a>
                </div>

                <div class="calc-tabs">
                    <button class="calc-tab active" onclick="switchCalcTab(this)">
                        <i class="bi bi-currency-dollar"></i> Crédito
                    </button>
                    <button class="calc-tab" onclick="switchCalcTab(this)">
                        <i class="bi bi-bookmark"></i> Apártalo
                    </button>
                    <button class="calc-tab" onclick="switchCalcTab(this)">
                        <i class="bi bi-cash-coin"></i> Contado
                    </button>
                </div>

                <div class="calc-price-box">
                    <div class="calc-price-label">Pago mensual estimado</div>
                    <div class="calc-price-row">
                        <div class="calc-price" id="calcPrice">$13,819<sup>*</sup></div>
                        <span class="calc-badge-market"><i class="bi bi-graph-down-arrow"></i> 22% menor al mercado</span>
                    </div>
                    <span class="badge-liquidacion-calc">$610,000 liquidación</span>
                </div>

                <!-- Enganche slider -->
                <div class="calc-row-label">
                    <span>Enganche <i class="bi bi-question-circle" style="font-size:0.8rem;color:var(--dalton-muted)"></i></span>
                    <span id="engancheVal">$122,000.00</span>
                </div>
                <input type="range" class="calc-slider" min="20" max="80" value="20" id="engancheSlider" oninput="updateEnganche(this.value)">
                <div class="calc-slider-labels">
                    <span>20%</span><span>30%</span><span>40%</span><span>50%</span><span>60%</span><span>70%</span><span>80%</span>
                </div>

                <!-- Plazo slider -->
                <div class="calc-row-label">
                    <span>Plazo del crédito <i class="bi bi-question-circle" style="font-size:0.8rem;color:var(--dalton-muted)"></i></span>
                    <span id="plazoVal">60 <small style="font-weight:600;color:var(--dalton-muted)">Meses</small></span>
                </div>
                <input type="range" class="calc-slider" min="0" max="5" value="5" id="plazoSlider" oninput="updatePlazo(this.value)">
                <div class="calc-plazo-labels">
                    <span>6</span><span>12</span><span>24</span><span>36</span><span>48</span><span>60</span>
                </div>

                <button class="btn-me-interesa mt-3">Me interesa este auto</button>
                <p class="calc-disclaimer">*Mensualidad estimada con fines informativos, no incluye seguro de vehículo, seguro de vida, ni comisión por apertura, en ningún caso puede significar compromiso alguno de DaltonSeminuevos.</p>
            </div>

            <!-- Oferta card -->
            <div class="oferta-card">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="oferta-title">¡EXCELENTE OFERTA!</div>
                        <div class="oferta-desc">Precio <strong>22% más bajo</strong> que el promedio del mercado.</div>
                    </div>
                    <!-- Speedometer SVG -->
                    <svg class="meter-svg" viewBox="0 0 80 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 44 A32 32 0 0 1 72 44" stroke="#e5e7eb" stroke-width="8" stroke-linecap="round" fill="none"/>
                        <path d="M8 44 A32 32 0 0 1 56 14" stroke="url(#meterGrad)" stroke-width="8" stroke-linecap="round" fill="none"/>
                        <defs>
                            <linearGradient id="meterGrad" x1="8" y1="44" x2="72" y2="44">
                                <stop offset="0%" stop-color="#22c55e"/>
                                <stop offset="50%" stop-color="#eab308"/>
                                <stop offset="100%" stop-color="#ef4444"/>
                            </linearGradient>
                        </defs>
                        <circle cx="57" cy="14" r="4" fill="#eab308"/>
                    </svg>
                </div>
                <div class="oferta-ahorro">
                    <span class="coin-icon">🪙</span>
                    <span style="font-size:0.82rem;">Ahorras hasta <strong>$170,000.00</strong></span>
                </div>
                <div class="oferta-row">
                    <span class="oferta-row-label">Precio promedio Mercado*</span>
                    <span class="oferta-row-value">$780,000.00*</span>
                </div>
                <div class="oferta-row">
                    <span class="oferta-row-label">Precio con Dalton</span>
                    <span class="oferta-row-value green">$610,000.00</span>
                </div>
                <p class="oferta-note">*Precio promedio calculado según análisis de autos similares en el mercado.</p>
            </div>

        </div><!-- end sidebar-right -->
    </div><!-- end detail-layout -->

    <!-- SIMILARES -->
    <div class="similares-section" style="margin-top:32px;">
        <h3 class="similares-title">Autos similares a tus favoritos</h3>
        <div class="similares-scroll">
            @php
            $similares = [
                ['name'=>'BYD TANG 2023','meta'=>'5 PTS. EV, 86 KWH, AUTONOMIA ... | 17,936 Km','price'=>'$13,323','unit'=>'MXN/*mes','contado'=>'$627,330 MXN de contado','market'=>'Precio 5% menor al mercado','img'=>'https://images.unsplash.com/photo-1592586726924-c2e9a01d4d7e?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/byd.com'],
                ['name'=>'BYD TANG 2023','meta'=>'5 PTS. EV, 86 KWH, AUTONOMIA ... | 25,251 Km','price'=>'$13,323','unit'=>'MXN/*mes','contado'=>'$627,330 MXN de contado','market'=>'Precio 5% menor al mercado','img'=>'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/byd.com'],
                ['name'=>'BYD TANG 2023','meta'=>'5 PTS. EV, 86 KWH, AUTONOMIA ... | 12,667 Km','price'=>'$13,386','unit'=>'MXN/*mes','contado'=>'$630,300 MXN de contado','market'=>'Precio 5% menor al mercado','img'=>'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/byd.com'],
                ['name'=>'BYD TANG 2023','meta'=>'5 PTS. EV, 86 KWH, AUTONOMIA ... | 22,434 Km','price'=>'$13,351','unit'=>'MXN/*mes','contado'=>'$628,650 MXN de contado','market'=>'Precio 5% menor al mercado','img'=>'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/byd.com'],
                ['name'=>'BYD TANG 2023','meta'=>'5 PTS. EV, 86 KWH, AUTONOMIA ... | 22,487 Km','price'=>'$13,756','unit'=>'MXN/*mes','contado'=>'$647,700 MXN de contado','market'=>'Precio 2% menor al mercado','img'=>'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=460&h=345&fit=crop&q=75','logo'=>'https://logo.clearbit.com/byd.com'],
            ];
            @endphp
            @foreach($similares as $s)
            <div class="similar-card">
                <img src="{{ $s['img'] }}" alt="{{ $s['name'] }}" class="similar-card-img" loading="lazy">
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

</div><!-- end page-content -->

<!-- ===== STICKY BOTTOM BAR ===== -->
<div class="sticky-bottom">
    <div class="sticky-car-info">
        <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=140&h=100&fit=crop&q=75" alt="" class="sticky-car-img">
        <div>
            <div class="sticky-price">$13,818.86<small>/mes*</small>
                <span class="sticky-badge" style="margin-left:8px;"><i class="bi bi-graph-down-arrow"></i> 22% menor al mercado</span>
            </div>
            <div class="sticky-contado">o $610,000.00 de contado</div>
        </div>
    </div>
    <button class="btn-sticky-interesa">Me interesa</button>
</div>

<!-- Spacer for sticky bar -->
<div style="height:72px;"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Gallery thumbnail switch
    function changeMainImg(thumb, src) {
        document.querySelectorAll('.thumb').forEach(function(t){ t.classList.remove('active'); });
        thumb.classList.add('active');
        document.getElementById('mainImg').src = src;
    }

    // Detail tabs
    function switchTab(btn, section) {
        document.querySelectorAll('.detail-tab').forEach(function(t){ t.classList.remove('active'); });
        btn.classList.add('active');
        var el = document.getElementById(section);
        if (el) { el.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    }

    // Sticky tabs on scroll
    window.addEventListener('scroll', function() {
        var tabs = document.getElementById('stickyTabs');
        var gallery = document.getElementById('gallerySection');
        if (gallery.getBoundingClientRect().bottom < 60) {
            tabs.classList.add('visible');
        } else {
            tabs.classList.remove('visible');
        }
    });

    function scrollToSection(id) {
        var el = document.getElementById(id);
        if (el) { el.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
        // update active tab
        document.querySelectorAll('.tab-link').forEach(function(t){ t.classList.remove('active'); });
        event.target.classList.add('active');
    }

    // Calculator tabs
    function switchCalcTab(btn) {
        document.querySelectorAll('.calc-tab').forEach(function(t){ t.classList.remove('active'); });
        btn.classList.add('active');
    }

    // Enganche slider
    var basePrice = 610000;
    function updateEnganche(val) {
        var amount = Math.round(basePrice * val / 100);
        document.getElementById('engancheVal').textContent = '$' + amount.toLocaleString('es-MX') + '.00';
        updateMonthly();
    }

    var plazos = [6, 12, 24, 36, 48, 60];
    function updatePlazo(idx) {
        var p = plazos[parseInt(idx)];
        document.getElementById('plazoVal').innerHTML = p + ' <small style="font-weight:600;color:var(--dalton-muted)">Meses</small>';
        updateMonthly();
    }

    function updateMonthly() {
        var engPct = parseInt(document.getElementById('engancheSlider').value) / 100;
        var plazoIdx = parseInt(document.getElementById('plazoSlider').value);
        var meses = plazos[plazoIdx];
        var financiado = basePrice * (1 - engPct);
        var rate = 0.018; // ~1.8% mensual
        var monthly = Math.round(financiado * rate / (1 - Math.pow(1 + rate, -meses)));
        document.getElementById('calcPrice').innerHTML = '$' + monthly.toLocaleString('es-MX') + '<sup>*</sup>';
    }
</script>
</body>
</html>