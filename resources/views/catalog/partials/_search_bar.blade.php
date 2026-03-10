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
    <form action="{{ route('autos.index') }}" method="GET" class="search-bar">
        {{-- Truco Senior: Si hay filtros activos en el sidebar, los mantenemos aquí como campos ocultos --}}
        @if(request('nuevo')) <input type="hidden" name="nuevo" value="1"> @endif
        @if(request('seminuevo')) <input type="hidden" name="seminuevo" value="1"> @endif
        @if(request('consignacion')) <input type="hidden" name="consignacion" value="1"> @endif

        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Buscar por Marca / Modelo / Año / Color">

        <button type="submit" class="btn-buscar">
            <span>Buscar</span> <i class="bi bi-search"></i>
        </button>
    </form>
</div>