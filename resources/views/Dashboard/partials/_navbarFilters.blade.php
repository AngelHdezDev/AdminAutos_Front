{{-- ===== NAVBAR FILTERS ===== --}}
<nav class="navbar-filters">

    {{-- Filtros desktop --}}
    <div class="filter-links desktop-only">
        <a href="#" class="filter-link" onclick="toggleMarcaDropdown(this); return false;">
            Marca y modelo <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
        <a href="#" class="filter-link">
            Tipo de auto <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
        <a href="#" class="filter-link">
            Año <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
        <a href="#" class="filter-link">
            Precio <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
        <a href="#" class="filter-link">
            Ubicación <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
    </div>

    <span class="referral-text">¡Refiere a tus amigos y gana $5,000!</span>

    {{-- Dropdown desktop --}}
    <div class="marca-dropdown" id="marcaDropdown">

        {{-- Área del slider con flechas --}}
        <div class="marca-dropdown-inner">

            <button class="nav-arrow prev" id="prevBtn" onclick="moveSlider(-1)" disabled>
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="slider-window">
                <div class="slider-track" id="marcaSlider">
                    @foreach($marcas as $marca)
                        <div class="marca-col">
                            <div class="marca-col-header">
                                <img src="{{ config('app.admin_storage') . $marca->imagen }}"
                                     alt="{{ $marca->nombre }}"
                                     onerror="this.style.display='none'">
                                <span class="marca-col-name">{{ $marca->nombre }}</span>
                            </div>
                            <ul class="modelo-list">
                                @foreach($marca->autos->take(5) as $autoAgrupado)
                                    <li>
                                        <a href="{{ route('dashboard', ['marca' => $marca->nombre, 'modelo' => $autoAgrupado->modelo]) }}">
                                            {{ $autoAgrupado->modelo }}
                                        </a>
                                        <span class="modelo-count">({{ $autoAgrupado->total }})</span>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('dashboard', ['marca' => $marca->nombre]) }}" class="ver-todos-modelo">
                                Ver todos <i class="bi bi-chevron-right" style="font-size:0.7rem"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="nav-arrow next" id="nextBtn" onclick="moveSlider(1)">
                <i class="bi bi-chevron-right"></i>
            </button>

        </div>

        {{-- Paginación pegada al borde inferior del dropdown --}}
        <div class="slider-pagination" id="sliderPagination"></div>

    </div>

</nav>

{{-- ===== PANEL MÓVIL ===== --}}
<div class="mobile-filters-panel" id="mobileFiltersPanel">
    <div class="mobile-filters-header">
        <h3>Filtros</h3>
        <button class="mobile-filters-close" onclick="toggleMobileMenu()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="mobile-filters-content">

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Marca y modelo</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <div class="mobile-marca-list">
                    @foreach($marcas as $marca)
                        <div class="mobile-marca-item">
                            <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                                <img src="{{ config('app.admin_storage') . $marca->imagen }}"
                                     alt="{{ $marca->nombre }}"
                                     onerror="this.style.display='none'">
                                <span>{{ $marca->nombre }}</span>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <div class="mobile-modelos-list">
                                @foreach($marca->autos as $autoAgrupado)
                                    <a href="{{ route('dashboard', ['marca' => $marca->nombre, 'modelo' => $autoAgrupado->modelo]) }}">
                                        {{ $autoAgrupado->modelo }} ({{ $autoAgrupado->total }})
                                    </a>
                                @endforeach
                                <a href="{{ route('dashboard', ['marca' => $marca->nombre]) }}"
                                   style="color:var(--dalton-blue);font-weight:700;">
                                    Ver todos →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('dashboard') }}" class="mobile-ver-todos">Ver todas las marcas</a>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Tipo de auto</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <label class="mobile-checkbox"><input type="checkbox"> SUV</label>
                <label class="mobile-checkbox"><input type="checkbox"> Sedán</label>
                <label class="mobile-checkbox"><input type="checkbox"> Hatchback</label>
                <label class="mobile-checkbox"><input type="checkbox"> Pickup</label>
                <label class="mobile-checkbox"><input type="checkbox"> Coupé</label>
                <label class="mobile-checkbox"><input type="checkbox"> Convertible</label>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Año</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <label class="mobile-radio"><input type="radio" name="year"> 2024</label>
                <label class="mobile-radio"><input type="radio" name="year"> 2023</label>
                <label class="mobile-radio"><input type="radio" name="year"> 2022</label>
                <label class="mobile-radio"><input type="radio" name="year"> 2021</label>
                <label class="mobile-radio"><input type="radio" name="year"> 2020</label>
                <label class="mobile-radio"><input type="radio" name="year"> 2019</label>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Precio</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <div class="mobile-price-range">
                    <input type="range" min="0" max="1000000" step="10000" value="500000">
                    <div class="mobile-price-inputs">
                        <input type="number" placeholder="Mín" value="0">
                        <input type="number" placeholder="Máx" value="1000000">
                    </div>
                    <div class="mobile-price-presets">
                        <button class="price-preset">$0 - $200k</button>
                        <button class="price-preset">$200k - $400k</button>
                        <button class="price-preset">$400k - $600k</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Ubicación</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <select class="mobile-select">
                    <option>Todas las ubicaciones</option>
                    <option>Ciudad de México</option>
                    <option>Monterrey</option>
                    <option>Guadalajara</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                </select>
            </div>
        </div>

    </div>

    <div class="mobile-filters-footer">
        <button class="mobile-btn mobile-btn-outline" onclick="clearMobileFilters()">Limpiar</button>
        <button class="mobile-btn mobile-btn-primary" onclick="applyMobileFilters()">Aplicar</button>
    </div>
</div>

{{-- Backdrops --}}
<div class="dropdown-backdrop" id="dropdownBackdrop" onclick="closeDropdown()"></div>
<div class="mobile-backdrop"   id="mobileBackdrop"   onclick="toggleMobileMenu()"></div>


<style>
/* ===== NAVBAR FILTERS ===== */
.navbar-filters {
    background: white;
    border-bottom: 1px solid var(--dalton-border);
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 52px;
    z-index: 1000;
    width: 100%;
}
.desktop-only { display: flex; flex: 1; margin-right: 20px; }
.filter-link {
    padding: 14px 16px;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--dalton-text);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    border-bottom: 2px solid transparent;
    transition: all 0.2s;
    white-space: nowrap;
    cursor: pointer;
}
.filter-link:hover { color: var(--dalton-red); border-bottom-color: var(--dalton-red); }
.filter-link.active {
    color: var(--dalton-red) !important;
    border-bottom-color: var(--dalton-red) !important;
    background: none !important;
}
.referral-text {
    font-size: 0.78rem;
    font-weight: 700;
    white-space: nowrap;
    color: var(--dalton-text);
    flex-shrink: 0;
}

/* ===== DROPDOWN — layout flex columna ===== */
.marca-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 0 0 16px 16px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    border: 1px solid var(--dalton-border);
    border-top: none;
    z-index: 999;
    display: none;
    /* flex columna: slider arriba, paginación abajo */
    flex-direction: column;
    overflow: hidden;
}
.marca-dropdown.open {
    display: flex;
    animation: slideDown 0.2s ease-out;
}
@keyframes slideDown {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Inner: contiene flechas + slider-window */
.marca-dropdown-inner {
    position: relative;
    display: flex;
    align-items: center;
    padding: 28px 56px; /* lateral para las flechas */
}

/* Ventana que recorta */
.slider-window {
    width: 100%;
    overflow: hidden;
}

/* Track: fila horizontal de marcas */
.slider-track {
    display: flex;
    transition: transform 0.4s ease-in-out;
}

/* Cada marca: 1/6 del slider-window */
.marca-col {
    flex: 0 0 16.6667%;
    min-width: 16.6667%;
    padding: 16px 20px;
    border-right: 1px solid var(--dalton-border);
    box-sizing: border-box;
}
.marca-col:last-child { border-right: none; }

.marca-col-header {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid var(--dalton-border);
}
.marca-col-header img { width: 32px; height: 24px; object-fit: contain; }
.marca-col-name { font-size: 0.9rem; font-weight: 800; }

.modelo-list { list-style: none; padding: 0; margin: 0 0 12px; }
.modelo-list li { padding: 5px 0; display: flex; align-items: baseline; gap: 4px; }
.modelo-list a {
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--dalton-text);
    text-decoration: none;
    transition: color 0.15s;
}
.modelo-list a:hover { color: var(--dalton-blue); }
.modelo-count { font-size: 0.75rem; color: var(--dalton-muted); white-space: nowrap; }

.ver-todos-modelo {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--dalton-blue);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.ver-todos-modelo:hover { text-decoration: underline; }

/* ===== FLECHAS LATERALES ===== */
.nav-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: white;
    border: 1.5px solid var(--dalton-border);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.15s;
    color: var(--dalton-text);
    font-size: 0.85rem;
    flex-shrink: 0;
}
.nav-arrow:hover:not(:disabled) {
    border-color: var(--dalton-red);
    color: var(--dalton-red);
    box-shadow: 0 4px 12px rgba(232,0,28,0.15);
}
.nav-arrow:disabled { opacity: 0.3; cursor: not-allowed; }
.nav-arrow.prev { left: 12px; }
.nav-arrow.next { right: 12px; }

/* ===== PAGINACIÓN — pegada al borde inferior ===== */
.slider-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 14px 0 18px;
    border-top: 1px solid var(--dalton-border);
    flex-shrink: 0;
}

.mdp-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid var(--dalton-border);
    background: white;
    cursor: pointer;
    font-size: 0.82rem;
    font-weight: 700;
    font-family: 'Manrope', sans-serif;
    color: var(--dalton-text);
    transition: all 0.15s;
    line-height: 1;
}
.mdp-btn:hover:not(:disabled):not(.active) {
    border-color: var(--dalton-blue);
    color: var(--dalton-blue);
}
.mdp-btn.active {
    background: var(--dalton-blue);
    border-color: var(--dalton-blue);
    color: white;
}
.mdp-btn:disabled { opacity: 0.35; cursor: not-allowed; }

.mdp-dots {
    font-size: 0.85rem;
    color: var(--dalton-muted);
    font-weight: 700;
    line-height: 32px;
    user-select: none;
}

/* Backdrop */
.dropdown-backdrop {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.3);
    z-index: 998;
}
.dropdown-backdrop.open { display: block; }

/* ===== BOTÓN HAMBURGUESA ===== */
.btn-mobile-menu {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 4px 8px;
    line-height: 1;
}

/* ===== PANEL MÓVIL ===== */
.mobile-filters-panel {
    position: fixed;
    top: 0; right: -100%;
    width: 85%; max-width: 400px;
    height: 100vh;
    background: white;
    z-index: 1002;
    transition: right 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    box-shadow: -2px 0 10px rgba(0,0,0,0.12);
}
.mobile-filters-panel.open { right: 0; }

.mobile-filters-header {
    padding: 20px;
    border-bottom: 1px solid var(--dalton-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-shrink: 0;
}
.mobile-filters-header h3 { margin: 0; font-size: 1.1rem; font-weight: 800; }
.mobile-filters-close { background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--dalton-text); padding: 4px; }
.mobile-filters-content { flex: 1; overflow-y: auto; padding: 16px; }

.mobile-filter-group { margin-bottom: 10px; border: 1px solid var(--dalton-border); border-radius: 10px; overflow: hidden; }
.mobile-filter-group-header {
    padding: 14px 16px;
    background: #f8f9fa;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-weight: 600;
    font-size: 0.9rem;
    transition: background 0.15s;
    user-select: none;
}
.mobile-filter-group-header:hover { background: #e9ecef; }
.mobile-filter-group-header i { transition: transform 0.25s; font-size: 0.8rem; }
.mobile-filter-group-header.active i { transform: rotate(180deg); }

.mobile-filter-submenu { display: none; padding: 14px 16px; background: white; border-top: 1px solid var(--dalton-border); }
.mobile-filter-submenu.open { display: block; }

.mobile-marca-list { max-height: 340px; overflow-y: auto; }
.mobile-marca-item { margin-bottom: 6px; }
.mobile-marca-header {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px; background: #f8f9fa;
    border-radius: 8px; cursor: pointer;
    font-weight: 600; font-size: 0.87rem; user-select: none;
}
.mobile-marca-header img { width: 24px; height: 18px; object-fit: contain; flex-shrink: 0; }
.mobile-marca-header i { margin-left: auto; transition: transform 0.25s; font-size: 0.72rem; color: var(--dalton-muted); }
.mobile-marca-header.active i { transform: rotate(180deg); }

.mobile-modelos-list { display: none; padding: 4px 10px 8px 46px; }
.mobile-modelos-list.open { display: block; }
.mobile-modelos-list a {
    display: block; padding: 7px 0;
    color: var(--dalton-text); text-decoration: none;
    font-size: 0.84rem; border-bottom: 1px solid var(--dalton-border);
    transition: color 0.15s;
}
.mobile-modelos-list a:last-child { border-bottom: none; }
.mobile-modelos-list a:hover { color: var(--dalton-blue); }
.mobile-ver-todos { display: block; padding: 10px; text-align: center; color: var(--dalton-blue); text-decoration: none; font-weight: 700; font-size: 0.85rem; margin-top: 6px; }

.mobile-checkbox, .mobile-radio { display: flex; align-items: center; gap: 10px; padding: 8px 0; cursor: pointer; font-size: 0.87rem; }
.mobile-checkbox input, .mobile-radio input { width: 18px; height: 18px; cursor: pointer; flex-shrink: 0; }

.mobile-price-range { padding: 6px 0; }
.mobile-price-range input[type=range] { width: 100%; margin-bottom: 12px; }
.mobile-price-inputs { display: flex; gap: 10px; margin-bottom: 12px; }
.mobile-price-inputs input { flex: 1; padding: 8px 10px; border: 1px solid var(--dalton-border); border-radius: 6px; font-family: 'Manrope', sans-serif; font-size: 0.85rem; }
.mobile-price-presets { display: flex; flex-wrap: wrap; gap: 8px; }
.price-preset { flex: 1 1 calc(33.33% - 8px); padding: 8px; background: #f8f9fa; border: 1px solid var(--dalton-border); border-radius: 6px; font-size: 0.76rem; cursor: pointer; transition: background 0.15s; font-family: 'Manrope', sans-serif; }
.price-preset:hover { background: #e9ecef; }
.mobile-select { width: 100%; padding: 11px 12px; border: 1px solid var(--dalton-border); border-radius: 8px; background: white; font-size: 0.87rem; font-family: 'Manrope', sans-serif; }

.mobile-filters-footer { padding: 16px 20px; border-top: 1px solid var(--dalton-border); display: flex; gap: 10px; flex-shrink: 0; }
.mobile-btn { flex: 1; padding: 13px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 0.9rem; font-family: 'Manrope', sans-serif; transition: all 0.15s; }
.mobile-btn-primary { background: var(--dalton-red); color: white; }
.mobile-btn-primary:hover { background: #c8001a; }
.mobile-btn-outline { background: white; border: 1.5px solid var(--dalton-border); color: var(--dalton-text); }
.mobile-btn-outline:hover { background: #f8f9fa; }

.mobile-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1001; }
.mobile-backdrop.open { display: block; }

/* ===== RESPONSIVE ===== */
@media screen and (max-width: 992px) {
    .navbar-filters { padding: 0 16px; }
    .referral-text  { font-size: 0.7rem; max-width: 140px; text-align: right; }
}
@media screen and (max-width: 768px) {
    .navbar-top-actions .btn-vender,
    .navbar-top-actions .btn-comprar,
    .navbar-top-actions .navbar-top-divider,
    .navbar-top-actions .btn-user { display: none; }
    .btn-mobile-menu   { display: block; }
    .navbar-filters    { display: none; }
    .dropdown-backdrop { display: none !important; }
    .marca-dropdown    { display: none !important; }
}
@media screen and (max-width: 576px) {
    .mobile-filters-panel { width: 90%; }
}
</style>


<script>
let currentStep = 0;

/* ===== PAGINACIÓN ===== */
function buildPagination(totalPages) {
    const container = document.getElementById('sliderPagination');
    if (!container) return;
    container.innerHTML = '';

    // Flecha izquierda
    const prev = document.createElement('button');
    prev.className = 'mdp-btn';
    prev.innerHTML = '<i class="bi bi-chevron-left" style="font-size:0.75rem"></i>';
    prev.disabled = currentStep === 0;
    prev.onclick = () => goToPage(currentStep - 1);
    container.appendChild(prev);

    // Números con lógica: 1, 2, ..., actual-1, actual, actual+1, ..., última
    for (let i = 0; i < totalPages; i++) {
        const isFirst   = i === 0;
        const isLast    = i === totalPages - 1;
        const isCurrent = i === currentStep;
        const isNear    = Math.abs(i - currentStep) <= 1;

        if (isFirst || isLast || isCurrent || isNear) {
            // Agregar "..." antes si hay salto desde el anterior elemento añadido
            const lastChild = container.lastElementChild;
            const lastIsBtn = lastChild && lastChild.classList.contains('mdp-btn');
            const lastNum   = lastIsBtn ? parseInt(lastChild.textContent) : null;
            if (lastNum !== null && i - lastNum > 1) {
                const dots = document.createElement('span');
                dots.className = 'mdp-dots';
                dots.textContent = '...';
                container.appendChild(dots);
            }

            const btn = document.createElement('button');
            btn.className = 'mdp-btn' + (isCurrent ? ' active' : '');
            btn.textContent = i + 1;
            btn.onclick = () => goToPage(i);
            container.appendChild(btn);
        }
    }

    // Flecha derecha
    const next = document.createElement('button');
    next.className = 'mdp-btn';
    next.innerHTML = '<i class="bi bi-chevron-right" style="font-size:0.75rem"></i>';
    next.disabled = currentStep === totalPages - 1;
    next.onclick = () => goToPage(currentStep + 1);
    container.appendChild(next);
}

function goToPage(page) {
    const track      = document.getElementById('marcaSlider');
    if (!track) return;
    const totalPages = Math.ceil(track.children.length / 6);
    currentStep = Math.max(0, Math.min(page, totalPages - 1));

    track.style.transform = `translateX(-${currentStep * 100}%)`;

    // Actualizar flechas laterales
    document.getElementById('prevBtn').disabled = (currentStep === 0);
    document.getElementById('nextBtn').disabled = (currentStep === totalPages - 1);

    // Redibujar paginación con página activa actualizada
    buildPagination(totalPages);
}

function moveSlider(direction) {
    goToPage(currentStep + direction);
}

/* ===== DROPDOWN DESKTOP ===== */
function toggleMarcaDropdown(btn) {
    if (window.innerWidth <= 768) { toggleMobileMenu(); return; }

    const dropdown = document.getElementById('marcaDropdown');
    const backdrop = document.getElementById('dropdownBackdrop');
    const isOpen   = dropdown.classList.contains('open');

    closeDropdown();

    if (!isOpen) {
        dropdown.classList.add('open');
        backdrop.classList.add('open');
        btn.classList.add('active');
        const icon = btn.querySelector('i');
        if (icon) { icon.className = 'bi bi-chevron-up'; icon.style.fontSize = '0.7rem'; }
    }
}

function closeDropdown() {
    const dropdown = document.getElementById('marcaDropdown');
    const backdrop = document.getElementById('dropdownBackdrop');
    if (!dropdown) return;
    dropdown.classList.remove('open');
    backdrop.classList.remove('open');
    document.querySelectorAll('.filter-link').forEach(b => {
        b.classList.remove('active');
        const icon = b.querySelector('i');
        if (icon) { icon.className = 'bi bi-chevron-down'; icon.style.fontSize = '0.7rem'; }
    });
}

/* ===== PANEL MÓVIL ===== */
function toggleMobileMenu() {
    const panel    = document.getElementById('mobileFiltersPanel');
    const backdrop = document.getElementById('mobileBackdrop');
    panel.classList.toggle('open');
    backdrop.classList.toggle('open');
    document.body.style.overflow = panel.classList.contains('open') ? 'hidden' : '';
}
function toggleMobileSubmenu(header) {
    header.classList.toggle('active');
    header.nextElementSibling.classList.toggle('open');
}
function toggleMobileModelos(header) {
    header.classList.toggle('active');
    header.nextElementSibling.classList.toggle('open');
}
function clearMobileFilters() {
    document.querySelectorAll('.mobile-filters-panel input[type="checkbox"], .mobile-filters-panel input[type="radio"]').forEach(i => i.checked = false);
    document.querySelectorAll('.mobile-filters-panel input[type="range"]').forEach(i => i.value = i.min || 0);
    document.querySelectorAll('.mobile-filters-panel input[type="number"]').forEach(i => i.value = '');
}
function applyMobileFilters() { toggleMobileMenu(); }

document.addEventListener('keydown', e => {
    if (e.key !== 'Escape') return;
    closeDropdown();
    const panel = document.getElementById('mobileFiltersPanel');
    if (panel && panel.classList.contains('open')) toggleMobileMenu();
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        const panel    = document.getElementById('mobileFiltersPanel');
        const backdrop = document.getElementById('mobileBackdrop');
        if (panel && panel.classList.contains('open')) {
            panel.classList.remove('open');
            backdrop.classList.remove('open');
            document.body.style.overflow = '';
        }
    }
});

/* Inicializar paginación al cargar */
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('marcaSlider');
    if (track) buildPagination(Math.ceil(track.children.length / 6));
});
</script>