@extends('layouts.app')

@section('title', 'Autos - VMS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <!-- ===== TOP NAVBAR ===== -->
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
    </nav>

   @include('Dashboard.Navbar')
    <!-- ===== HERO ===== -->
    <div class="hero">
        <div class="hero-bg">
            <video autoplay muted loop playsinline poster="imagen-de-respaldo.jpg">
                <source src="https://www.daltonseminuevos.com.mx/assets/videos/landing/hero.mp4" type="video/mp4">
                Tu navegador no soporta videos.
            </video>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>El auto que buscas, con el respaldo que mereces</h1>
            <p>Compra y venta de autos seminuevos con garantía</p>
            <div class="hero-search">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Buscar por marca, modelo o tipo...">
            </div>
            <div class="hero-tags">
                <span class="hero-tag">Sedanes</span>
                <span class="hero-tag">Desde $3,500</span>
                <span class="hero-tag">Garantía</span>
                <span class="hero-tag">¡Liquidaciones! 🔥</span>
                <span class="hero-tag">Financiamiento con "Dalton Credit"</span>
                <span class="hero-tag">SUV's Familiares</span>
            </div>
        </div>
    </div>

    <!-- ===== TIPO DE AUTO — SVGs inline, sin imágenes externas, sin layout shift ===== -->
    <section>
        <div class="section-header">
            <h2 class="section-title">Tipo de auto</h2>
            <a href="#" class="ver-todos">Ver todos <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="tipo-auto-grid">

            <!-- Híbridos -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="24" width="114" height="20" rx="6" fill="#d1d5db" />
                        <path d="M21 24 C26 10 37 8 52 8 L73 8 C89 8 100 10 105 24Z" fill="#9ca3af" />
                        <circle cx="29" cy="44" r="9" fill="#374151" />
                        <circle cx="29" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="91" cy="44" r="9" fill="#374151" />
                        <circle cx="91" cy="44" r="5" fill="#9ca3af" />
                        <rect x="31" y="12" width="19" height="9" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="54" y="12" width="19" height="9" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <circle cx="100" cy="13" r="7" fill="#22c55e" />
                        <text x="96.5" y="17.5" font-size="8" fill="white" font-weight="bold">⚡</text>
                    </svg>
                </div>
                <div class="tipo-name">Híbridos</div>
            </div>

            <!-- SUV's -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="20" width="116" height="24" rx="6" fill="#d1d5db" />
                        <path d="M14 20 C17 5 31 4 50 4 L78 4 C97 4 109 7 111 20Z" fill="#9ca3af" />
                        <circle cx="27" cy="44" r="9" fill="#374151" />
                        <circle cx="27" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="93" cy="44" r="9" fill="#374151" />
                        <circle cx="93" cy="44" r="5" fill="#9ca3af" />
                        <rect x="17" y="8" width="22" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="43" y="8" width="22" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="69" y="8" width="22" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                    </svg>
                </div>
                <div class="tipo-name">SUV's</div>
            </div>

            <!-- Sedán -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="26" width="114" height="18" rx="5" fill="#d1d5db" />
                        <path d="M23 26 C28 14 40 12 56 12 L73 12 C89 12 99 14 104 26Z" fill="#9ca3af" />
                        <circle cx="29" cy="44" r="9" fill="#374151" />
                        <circle cx="29" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="91" cy="44" r="9" fill="#374151" />
                        <circle cx="91" cy="44" r="5" fill="#9ca3af" />
                        <rect x="31" y="15" width="19" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="54" y="15" width="19" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                    </svg>
                </div>
                <div class="tipo-name">Sedán</div>
            </div>

            <!-- Pick-Up's -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="23" width="116" height="21" rx="5" fill="#d1d5db" />
                        <path d="M14 23 C17 11 29 9 47 9 L62 9 L62 23Z" fill="#9ca3af" />
                        <rect x="62" y="15" width="50" height="8" rx="2" fill="#b0b8c8" opacity="0.7" />
                        <circle cx="27" cy="44" r="9" fill="#374151" />
                        <circle cx="27" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="96" cy="44" r="9" fill="#374151" />
                        <circle cx="96" cy="44" r="5" fill="#9ca3af" />
                        <rect x="18" y="13" width="18" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="39" y="13" width="16" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                    </svg>
                </div>
                <div class="tipo-name">Pick - Up's</div>
            </div>

            <!-- Hatchback -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="24" width="114" height="20" rx="5" fill="#d1d5db" />
                        <path d="M21 24 C25 12 37 10 53 10 L82 10 C97 10 104 16 106 24Z" fill="#9ca3af" />
                        <circle cx="29" cy="44" r="9" fill="#374151" />
                        <circle cx="29" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="91" cy="44" r="9" fill="#374151" />
                        <circle cx="91" cy="44" r="5" fill="#9ca3af" />
                        <rect x="29" y="13" width="18" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="51" y="13" width="26" height="8" rx="2" fill="#bfdbfe" opacity="0.9" />
                    </svg>
                </div>
                <div class="tipo-name">Hatchback</div>
            </div>

            <!-- Minivan -->
            <div class="tipo-auto-card">
                <div class="tipo-svg-wrap">
                    <svg viewBox="0 0 120 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="19" width="116" height="25" rx="6" fill="#d1d5db" />
                        <path d="M11 19 C13 4 27 3 44 3 L86 3 C103 3 113 6 115 19Z" fill="#9ca3af" />
                        <circle cx="24" cy="44" r="9" fill="#374151" />
                        <circle cx="24" cy="44" r="5" fill="#9ca3af" />
                        <circle cx="96" cy="44" r="9" fill="#374151" />
                        <circle cx="96" cy="44" r="5" fill="#9ca3af" />
                        <rect x="15" y="7" width="16" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="35" y="7" width="16" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="55" y="7" width="16" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                        <rect x="75" y="7" width="16" height="10" rx="2" fill="#bfdbfe" opacity="0.9" />
                    </svg>
                </div>
                <div class="tipo-name">Minivan</div>
            </div>

        </div>
    </section>

    <div class="section-divider"></div>

    <!-- ===== TU AUTO SEGÚN TU NECESIDAD ===== -->
    <section>
        <div class="section-header">
            <h2 class="section-title">Tu auto según tu necesidad</h2>
        </div>
        <div class="necesidad-tabs">
            <button class="necesidad-tab active">Pasajeros (820)</button>
            <button class="necesidad-tab">Estilo de vida (758)</button>
            <button class="necesidad-tab">Uso diario (876)</button>
            <button class="necesidad-tab">Tipo de combustible (223)</button>
        </div>
        <div class="necesidad-scroll">

            <div class="necesidad-card">
                <img src="https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=460&h=600&fit=crop&q=75"
                    alt="Familiar 4 o más" loading="lazy" width="230" height="300">
                <div class="necesidad-card-overlay"></div>
                <div class="necesidad-card-content">
                    <h5>Familiar 4 o más</h5><small>570 auto disponibles</small>
                    <button class="btn-ver-modelos">Ver modelos <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <div class="necesidad-card">
                <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=460&h=600&fit=crop&q=75"
                    alt="2 o 3 pasajeros" loading="lazy" width="230" height="300">
                <div class="necesidad-card-overlay"></div>
                <div class="necesidad-card-content">
                    <h5>2 o 3 pasajeros</h5><small>250 auto disponibles</small>
                    <button class="btn-ver-modelos">Ver modelos <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <div class="necesidad-card">
                <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=460&h=600&fit=crop&q=75"
                    alt="Espacio para mascota" loading="lazy" width="230" height="300">
                <div class="necesidad-card-overlay"></div>
                <div class="necesidad-card-content">
                    <h5>Espacio para mascota</h5><small>570 auto disponibles</small>
                    <button class="btn-ver-modelos">Ver modelos <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <div class="necesidad-card">
                <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=460&h=600&fit=crop&q=75"
                    alt="7 o más pasajeros" loading="lazy" width="230" height="300">
                <div class="necesidad-card-overlay"></div>
                <div class="necesidad-card-content">
                    <h5>7 o más pasajeros</h5><small>570 auto disponibles</small>
                    <button class="btn-ver-modelos">Ver modelos <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

            <div class="necesidad-card">
                <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=460&h=600&fit=crop&q=75"
                    alt="Viaja seguro con tu bebé" loading="lazy" width="230" height="300">
                <div class="necesidad-card-overlay"></div>
                <div class="necesidad-card-content">
                    <h5>Viaja seguro con tu bebé</h5><small>709 auto disponibles</small>
                    <button class="btn-ver-modelos">Ver modelos <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>

        </div>
    </section>

    <div class="section-divider"></div>

    <!-- ===== TENEMOS TU MARCA FAVORITA ===== -->
    <section>
        <div class="section-header">
            <h2 class="section-title">Tenemos tu marca favorita</h2>
        </div>
        <div class="marcas-scroll mb-4">
            @php
                $marcas = [
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
                ];
            @endphp
            @foreach($marcas as $marca)
                <button class="marca-pill">
                    <img src="{{ $marca['logo'] }}" alt="{{ $marca['name'] }}" onerror="this.style.display='none'" width="20"
                        height="20">
                    {{ $marca['name'] }}
                </button>
            @endforeach
        </div>

        <div class="cars-scroll">
            @php
                $autos = [
                    ['name' => 'Audi Q5 2018', 'meta' => '5 PTS. D... | 148,697 km', 'price' => '$5,713.02', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$269,000 precio de liquidación', 'market' => 'Precio 23% menor al mercado', 'location' => 'Honda Carranza, SLP', 'img' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=510&h=320&fit=crop&q=75'],
                    ['name' => 'CUPRA LEON 2022', 'meta' => '5 PTS. H... | 95,525 km', 'price' => '$9,132.33', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$430,000 precio de liquidación', 'market' => 'Precio 22% menor al mercado', 'location' => 'Honda Carranza, SLP', 'img' => 'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?w=510&h=320&fit=crop&q=75'],
                    ['name' => 'Ford Explorer 2022', 'meta' => '5 PTS. S... | 110,481 km', 'price' => '$12,955.17', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$610,000 precio de liquidación', 'market' => 'Precio 22% menor al mercado', 'location' => 'Toyota Lomas, SLP', 'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=510&h=320&fit=crop&q=75'],
                    ['name' => 'Chevrolet Onix 2022', 'meta' => '4 PTS. LS... | 73,776 km', 'price' => '$4,077.69', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$192,000 precio de liquidación', 'market' => 'Precio 20% menor al mercado', 'location' => 'Centro Magno, GDL', 'img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=510&h=320&fit=crop&q=75'],
                    ['name' => 'Toyota TUNDRA 2020', 'meta' => '4 PTS. E... | 112,108 km', 'price' => '$14,123.26', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$665,000 precio de liquidación', 'market' => 'Precio 17% menor al mercado', 'location' => 'Honda Carranza, SLP', 'img' => 'https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=510&h=320&fit=crop&q=75'],
                ];
            @endphp
            @foreach($autos as $auto)
                <div class="car-card">
                    <img class="car-card-img" src="{{ $auto['img'] }}" alt="{{ $auto['name'] }}" loading="lazy" width="255"
                        height="160">
                    <div class="car-card-body">
                        <div class="car-card-title">{{ $auto['name'] }}</div>
                        <div class="car-card-meta">{{ $auto['meta'] }}</div>
                        <div class="car-card-price">{{ $auto['price'] }} <small>{{ $auto['currency'] }}</small></div>
                        <span class="badge-liquidacion">{{ $auto['liquidacion'] }}</span>
                        <div class="car-card-market"><i class="bi bi-graph-down-arrow"></i> {{ $auto['market'] }}</div>
                        <div class="car-card-location"><i class="bi bi-geo-alt"></i> {{ $auto['location'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===== HERRAMIENTAS DE COMPRA ===== -->
    <div class="herramientas-section">
        <h2 class="section-title text-white mb-4">Herramientas de compra</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="herramienta-card">
                    <h5>¿No sabes cuánto pagar por mes?</h5>
                    <p>Calcula tu pago ideal y encuentra autos que se ajusten a tu presupuesto.</p>
                    <div class="herramienta-icon">🧮</div>
                    <a href="#" class="herramienta-link">Calculadora de pagos <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="herramienta-card">
                    <h5>Cambia de auto, sin pagar todo</h5>
                    <p>Deja tu auto y paga solo la diferencia. Sin pagar el precio completo.</p>
                    <div class="herramienta-icon">🤝</div>
                    <a href="#" class="herramienta-link">Valora tu auto <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="herramienta-card">
                    <h5>Compra seguro. Maneja tranquilo.</h5>
                    <p>Con nuestra Garantía Platino estás cubierto hasta por 3 años o 60,000 km.</p>
                    <div class="herramienta-icon">🛡️</div>
                    <a href="#" class="herramienta-link">Conoce tu cobertura <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== REFERRAL BANNER ===== -->
    <section>
        <div class="referral-banner">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="referral-avatars">
                    <img src="https://i.pravatar.cc/80?img=1" alt="" width="40" height="40">
                    <img src="https://i.pravatar.cc/80?img=2" alt="" width="40" height="40">
                    <img src="https://i.pravatar.cc/80?img=3" alt="" width="40" height="40">
                </div>
                <div class="referral-text-block">
                    <h5>¿Conoces a alguien que quiera vender su auto?</h5>
                    <p>Refiérelo y gana $5,000 al cerrar la venta.</p>
                </div>
            </div>
            <button class="btn-referir">Referir amigo <i class="bi bi-arrow-right"></i></button>
        </div>
    </section>

    <!-- ===== NUESTRAS UBICACIONES ===== -->
    <section class="ubicaciones-section">
        <h2 class="section-title mb-4">Nuestras ubicaciones</h2>
        <div class="ubicaciones-map">
            <div class="ubicaciones-list">
                <div class="ubicaciones-search">
                    <input type="text" placeholder="Buscar por dirección, código pos...">
                    <button class="btn-buscar-ub">Buscar</button>
                </div>
                <div class="ubicacion-count">14 ubicaciones</div>
                @php
                    $ubicaciones = [
                        ['name' => 'Dalton Seminuevos Copilco', 'status' => 'Abierto hasta las 7:00 p.m.', 'address' => 'Av. Universidad 2060, Coyoacán 04360 CDMX', 'phone' => '+52 55 5001 0000'],
                        ['name' => 'Dalton Seminuevos León', 'status' => 'Abierto hasta las 8:00 p.m.', 'address' => 'Blvd. Adolfo López Mateos #3423, León, Gto.', 'phone' => '+52 444 447 3334'],
                        ['name' => 'Dalton Seminuevos La Calma', 'status' => 'Abierto hasta las 7:00 p.m.', 'address' => 'Av. Guadalupe 6030, Zapopan, Jalisco', 'phone' => '+52 33 1234 5678'],
                        ['name' => 'Dalton Seminuevos Polanco', 'status' => 'Abierto hasta las 7:00 p.m.', 'address' => 'Av. Horacio 1855, Polanco, CDMX', 'phone' => '+52 55 5002 0000'],
                    ];
                @endphp
                @foreach($ubicaciones as $ub)
                    <div class="ubicacion-item">
                        <img src="https://images.unsplash.com/photo-1562519776-18a373b990d4?w=120&h=100&fit=crop&q=70"
                            alt="{{ $ub['name'] }}" width="60" height="50" loading="lazy">
                        <div class="ubicacion-info">
                            <h6>{{ $ub['name'] }}</h6>
                            <span class="open">{{ $ub['status'] }}</span>
                            <address>{{ $ub['address'] }}<br>{{ $ub['phone'] }}</address>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="map-placeholder">
                <i class="bi bi-map" style="font-size:2.5rem;color:#9ca3af"></i>
                <span style="color:var(--dalton-muted)">Mapa de ubicaciones</span>
                <small style="font-size:0.75rem;color:#9ca3af">Integrar Google Maps API aquí</small>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALES ===== -->
    <section class="testimonial-section">
        <p class="hashtag">#TuSeminuevoEnUnClic</p>
        <h2 class="section-title text-center mb-4">Compra con confianza. Estas son<br>algunas experiencias reales.</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card tall">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400&h=760&fit=crop&q=75"
                    alt="Familia Gutiérrez" loading="lazy" width="400" height="380">
                <div class="testimonial-overlay"></div>
                <div class="testimonial-badge"><i class="bi bi-star-fill"></i> Guadalajara, Jal</div>
                <div class="testimonial-quote">
                    <p>"El proceso fue rápido, claro y me entregaron el auto en excelentes condiciones."</p><small>Familia
                        Gutiérrez</small>
                </div>
            </div>
            <div class="testimonial-card short">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=620&fit=crop&q=75"
                    alt="Raúl López" loading="lazy" width="400" height="310">
                <div class="testimonial-overlay"></div>
                <div class="testimonial-badge"><i class="bi bi-star-fill"></i> Ciudad de México</div>
                <div class="testimonial-quote">
                    <p>"Dalton Seminuevos es una opción ideal para estrenar auto a buen precio."</p><small>Raúl López y
                        Jorge Martínez</small>
                </div>
            </div>
            <div class="testimonial-card short">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=620&fit=crop&q=75"
                    alt="Esteban Ortíz" loading="lazy" width="400" height="310">
                <div class="testimonial-overlay"></div>
                <div class="testimonial-badge"><i class="bi bi-star-fill"></i> San Luis Potosí</div>
                <div class="testimonial-quote">
                    <p>"Me ayudaron a encontrar justo el auto que necesitaba y todo fue muy transparente."</p><small>Esteban
                        Ortíz</small>
                </div>
            </div>
            <div class="testimonial-card tall">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=760&fit=crop&q=75"
                    alt="Angela Ramírez" loading="lazy" width="400" height="380">
                <div class="testimonial-overlay"></div>
                <div class="testimonial-badge"><i class="bi bi-star-fill"></i> Tepic, Nayarit</div>
                <div class="testimonial-quote">
                    <p>"Muy buena atención. Recomiendo Dalton Seminuevos si buscas confianza y buen trato."</p><small>Angela
                        Ramírez</small>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <div class="google-rating-bar">
                <strong style="font-size:1rem;color:#4285f4">Google</strong>
                <span style="font-weight:700">Excelente</span>
                <span style="color:#f59e0b;font-size:1.1rem">★★★★★</span>
                <strong>4.8</strong>
                <span style="color:var(--dalton-muted);font-size:0.85rem">| 4411 reseñas</span>
            </div>
        </div>

        <div class="review-cards">
            @php
                $reviews = [
                    ['initial' => 'J', 'color' => '#e8001c', 'name' => 'Juan Manuel Hernánd...', 'time' => 'hace 3 días', 'text' => 'La experiencia es muy satisfactoria y muy fácil hacer el trámite'],
                    ['initial' => 'A', 'color' => '#6b7280', 'name' => 'Ara Fermoso', 'time' => 'hace 3 días', 'text' => 'Muy buena atención, amabilidad y explicación excelente a cualquier duda, gracias Carol Rodríguez por todo tu apoyo!!'],
                    ['initial' => 'K', 'color' => '#1a2a4a', 'name' => 'Karina edith Gutierrez', 'time' => 'hace 3 días', 'text' => 'Excelente servicio y atención de nuestro vendedor MARTIN REGALADO'],
                ];
            @endphp
            @foreach($reviews as $r)
                <div class="review-card">
                    <div class="review-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <div class="reviewer-avatar" style="background:{{ $r['color'] }}">{{ $r['initial'] }}</div>
                            <div>
                                <div style="font-size:0.82rem;font-weight:700">{{ $r['name'] }}</div>
                                <div style="font-size:0.72rem;color:var(--dalton-muted)">{{ $r['time'] }}</div>
                            </div>
                        </div>
                        <i class="bi bi-google" style="color:#4285f4"></i>
                    </div>
                    <div class="review-stars">★★★★★ <i class="bi bi-check-circle-fill"
                            style="color:var(--dalton-blue);font-size:0.75rem"></i></div>
                    <p class="review-text mt-2">{{ $r['text'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-end mt-2">
            <small style="color:var(--dalton-muted);font-size:0.72rem">Verificado por: Trustindex ⓘ</small>
        </div>
    </section>

    <div class="section-divider"></div>

    <!-- ===== CATÁLOGO DE MARCAS ===== -->
    <section>
        <h2 class="section-title mb-4">Nuestro catálogo de marcas</h2>
        @php
            $catalogoMarcas = [
                ['name' => 'Chirey', 'count' => 56],
                ['name' => 'Land rover', 'count' => 2],
                ['name' => 'Kia', 'count' => 111],
                ['name' => 'Chevrolet', 'count' => 97],
                ['name' => 'Volvo', 'count' => 20],
                ['name' => 'Chrysler', 'count' => 1],
                ['name' => 'Byd', 'count' => 62],
                ['name' => 'Toyota', 'count' => 141],
                ['name' => 'Volkswagen', 'count' => 34],
                ['name' => 'Bmw', 'count' => 10],
                ['name' => 'Hyundai', 'count' => 39],
                ['name' => 'Honda', 'count' => 77],
                ['name' => 'Gmc', 'count' => 8],
                ['name' => 'Nissan', 'count' => 64],
                ['name' => 'Ford', 'count' => 16],
                ['name' => 'Audi', 'count' => 5],
                ['name' => 'Jeep', 'count' => 14],
                ['name' => 'Mercedes benz', 'count' => 10],
                ['name' => 'Mazda', 'count' => 17],
                ['name' => 'Renault', 'count' => 34],
                ['name' => 'Dodge', 'count' => 22],
                ['name' => 'Mitsubishi', 'count' => 9],
                ['name' => 'Lexus', 'count' => 1],
                ['name' => 'Peugeot', 'count' => 4],
                ['name' => 'Suzuki', 'count' => 13],
            ];
        @endphp
        <div class="row">
            @foreach(array_chunk($catalogoMarcas, 5) as $chunk)
                <div class="col">
                    @foreach($chunk as $m)
                        <div class="catalogo-item">
                            <a href="#">{{ $m['name'] }} <span style="color:var(--dalton-muted)">({{ $m['count'] }})</span></a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        <div style="color:white;font-weight:800;font-size:1.1rem;margin-bottom:20px;">
            Dalton<span style="color:var(--dalton-red)">Seminuevos</span>
            <span
                style="background:var(--dalton-red);color:white;font-size:0.55rem;font-weight:800;border-radius:3px;padding:1px 4px;margin-left:3px;">.com</span>
        </div>
        <div class="footer-social">
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#"><i class="bi bi-tiktok"></i></a>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="footer-col-title">Marcas</div>
                <div class="row">
                    <div class="col-4">
                        <ul class="footer-links">
                            <li><a href="#">Honda</a></li>
                            <li><a href="#">Ford</a></li>
                            <li><a href="#">Land Rover</a></li>
                            <li><a href="#">Omoda</a></li>
                            <li><a href="#">BMW</a></li>
                            <li><a href="#">Dodge</a></li>
                            <li><a href="#">Renault</a></li>
                            <li><a href="#">Volkswagen</a></li>
                            <li><a href="#">Chevrolet</a></li>
                            <li><a href="#">Nissan</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="footer-links">
                            <li><a href="#">Hyundai</a></li>
                            <li><a href="#">Mazda</a></li>
                            <li><a href="#">Mini</a></li>
                            <li><a href="#">Kia</a></li>
                            <li><a href="#">GMC</a></li>
                            <li><a href="#">Lexus</a></li>
                            <li><a href="#">Chirey</a></li>
                            <li><a href="#">Fiat</a></li>
                            <li><a href="#">Jeep</a></li>
                            <li><a href="#">Suzuki</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul class="footer-links">
                            <li><a href="#">Audi</a></li>
                            <li><a href="#">Cupra</a></li>
                            <li><a href="#">Ram</a></li>
                            <li><a href="#">Seat</a></li>
                            <li><a href="#">Peugeot</a></li>
                            <li><a href="#">Mitsubishi</a></li>
                            <li><a href="#">Toyota</a></li>
                            <li><a href="#">JAC</a></li>
                            <li><a href="#">MG</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-col-title">Venta</div>
                <ul class="footer-links mb-3">
                    <li><a href="#">Vende tu auto</a></li>
                    <li><a href="#">Valúa tu Auto</a></li>
                    <li><a href="#">¿Cómo Vender?</a></li>
                </ul>
                <div class="footer-col-title">Compra</div>
                <ul class="footer-links mb-3">
                    <li><a href="#">Busca un auto</a></li>
                    <li><a href="#">Buen Fin</a></li>
                    <li><a href="#">Hot Sale</a></li>
                    <li><a href="#">Catálogo</a></li>
                </ul>
                <div class="footer-col-title">Legales</div>
                <ul class="footer-links mb-3">
                    <li><a href="#">Aviso de privacidad</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Garantía Dalton</a></li>
                </ul>
                <div class="footer-col-title">Contáctanos</div>
                <ul class="footer-links">
                    <li><a href="#">seminuevos@dalton.com.mx</a></li>
                    <li><a href="#">Atención al cliente</a></li>
                    <li><a href="#">Mapa del sitio</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="footer-col-title">Ubicaciones</div>
                <strong style="color:white;font-size:0.85rem">CDMX</strong>
                <ul class="footer-links mt-1 mb-3">
                    <li><a href="#">Dalton Seminuevos Copilco</a></li>
                    <li><a href="#">Dalton Seminuevos Polanco</a></li>
                    <li><a href="#">Dalton Seminuevos Mariano Escobedo</a></li>
                    <li><a href="#">Dalton Seminuevos Rio San Joaquín</a></li>
                </ul>
                <strong style="color:white;font-size:0.85rem">Colima</strong>
                <ul class="footer-links mt-1 mb-3">
                    <li><a href="#">Dalton Seminuevos Colima</a></li>
                </ul>
                <strong style="color:white;font-size:0.85rem">Guadalajara</strong>
                <ul class="footer-links mt-1">
                    <li><a href="#">Dalton Seminuevos La Calma</a></li>
                    <li><a href="#">Dalton Seminuevos López Mateos</a></li>
                    <li><a href="#">Dalton Seminuevos Magno</a></li>
                    <li><a href="#">Dalton Seminuevos Niños Heroes</a></li>
                    <li><a href="#">Dalton Seminuevos Colomos Country</a></li>
                    <li><a href="#">Dalton Seminuevos GAEN</a></li>
                    <li><a href="#">Dalton Seminuevos Galerías</a></li>
                    <li><a href="#">Dalton Seminuevos Patria</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="footer-col-title">&nbsp;</div>
                <strong style="color:white;font-size:0.85rem">San Luis Potosí</strong>
                <ul class="footer-links mt-1 mb-3">
                    <li><a href="#">Dalton Seminuevos Carretera 57</a></li>
                    <li><a href="#">Dalton Seminuevos Lomas</a></li>
                </ul>
                <strong style="color:white;font-size:0.85rem">Tepic, Nayarit</strong>
                <ul class="footer-links mt-1 mb-3">
                    <li><a href="#">Dalton Seminuevos Jacars</a></li>
                </ul>
                <strong style="color:white;font-size:0.85rem">León, Guanajuato</strong>
                <ul class="footer-links mt-1">
                    <li><a href="#">Dalton Seminuevos León</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            © {{ date('Y') }} DaltonSeminuevos. Todos los derechos reservados.
        </div>
    </footer>

    <!-- ===== COOKIE BANNER ===== -->
    <div class="cookie-banner" id="cookieBanner">
        <p>🍪 <a href="#">Aviso de Cookies</a> Utilizamos cookies para brindarte la mejor experiencia en nuestro sitio web.
            Si continúas usando nuestro sitio web, acepta el uso de cookies en <a href="#">Aviso de privacidad</a></p>
        <button class="btn-aceptar" onclick="document.getElementById('cookieBanner').style.display='none'">Aceptar</button>
    </div>

@endsection