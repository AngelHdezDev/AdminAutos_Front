<!-- Navbar filters - sticky -->
<nav class="navbar-filters">
    <!-- Versión desktop de los filtros -->
    <div class="filter-links desktop-only">
        <a href="#" class="filter-link" onclick="toggleMarcaDropdown(this); return false;">
            Marca y modelo <i class="bi bi-chevron-down" style="font-size:0.7rem"></i>
        </a>
        <a href="#" class="filter-link">Tipo de auto <i class="bi bi-chevron-down" style="font-size:0.7rem"></i></a>
        <a href="#" class="filter-link">Año <i class="bi bi-chevron-down" style="font-size:0.7rem"></i></a>
        <a href="#" class="filter-link">Precio <i class="bi bi-chevron-down" style="font-size:0.7rem"></i></a>
        <a href="#" class="filter-link">Ubicación <i class="bi bi-chevron-down" style="font-size:0.7rem"></i></a>
    </div>


    <span class="referral-text">¡Refiere a tus amigos y gana $5,000!</span>

    <!-- Dropdown DENTRO del navbar pero absolute (solo desktop) -->
    <div class="marca-dropdown" id="marcaDropdown">
        <div class="marca-dropdown-inner">
            <div class="marca-cols">
                @foreach($marcas as $marca)
                    <div class="marca-col">
                        <div class="marca-col-header">
                            {{-- Laravel llamará automáticamente al método getGetImagenAttribute --}}
                            <img src="{{ $marca->get_imagen }}" alt="{{ $marca->nombre }}"
                               >
                            <span class="marca-col-name">{{ $marca->nombre }}</span>
                        </div>
                        <ul class="modelo-list">
                            {{--
                            En el controlador usamos groupBy('modelo'),
                            así que iteramos sobre los autos de esta marca
                            --}}
                            @foreach($marca->autos as $autoAgrupado)
                                <li>
                                    <a
                                        href="{{ route('dashboard', ['marca' => $marca->nombre, 'modelo' => $autoAgrupado->modelo]) }}">
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

            {{-- Paginación (Opcional: solo si manejas muchas marcas) --}}
            <div class="marca-dropdown-pagination">
                <button class="mdp-btn" disabled><i class="bi bi-chevron-left"></i></button>
                <button class="mdp-btn active">1</button>
                <span class="mdp-dots">...</span>
                <button class="mdp-btn"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>
    </div>
</nav>

<!-- Panel lateral de filtros para móvil (versión hamburguesa completa) -->
<div class="mobile-filters-panel" id="mobileFiltersPanel">
    <div class="mobile-filters-header">
        <h3>Filtros</h3>
        <button class="mobile-filters-close" onclick="toggleMobileMenu()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="mobile-filters-content">
        <!-- Aquí van TODOS los filtros en formato hamburguesa -->
        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Marca y modelo</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <div class="mobile-marca-list">
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/chery.com" alt="" onerror="this.style.display='none'">
                            <span>Chirey</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">Tiggo 8 Pro Max (2)</a>
                            <a href="#">ARRIZO 8 (4)</a>
                            <a href="#">TIGGO 2 PRO (2)</a>
                            <a href="#">Tiggo 7 Pro (8)</a>
                            <a href="#">Tiggo 8 Pro (3)</a>
                            <a href="#">Tiggo 4 Pro (1)</a>
                            <a href="#">OMODA C5 (2)</a>
                        </div>
                    </div>
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/landrover.com" alt=""
                                onerror="this.style.display='none'">
                            <span>Land Rover</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">Discovery (1)</a>
                            <a href="#">Discovery Sport (1)</a>
                        </div>
                    </div>
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/kia.com" alt="" onerror="this.style.display='none'">
                            <span>Kia</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">Sorento (13)</a>
                            <a href="#">Niro (9)</a>
                            <a href="#">Soul (11)</a>
                            <a href="#">Seltos (26)</a>
                            <a href="#">Sportage (17)</a>
                            <a href="#">SONET (3)</a>
                            <a href="#">EV6 (1)</a>
                            <a href="#">Forte (9)</a>
                            <a href="#">Stinger (1)</a>
                        </div>
                    </div>
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/chevrolet.com" alt=""
                                onerror="this.style.display='none'">
                            <span>Chevrolet</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">Traverse (2)</a>
                            <a href="#">Tahoe (7)</a>
                            <a href="#">Captiva (37)</a>
                            <a href="#">Tracker (6)</a>
                            <a href="#">Cavalier (3)</a>
                            <a href="#">Aveo (8)</a>
                            <a href="#">Equinox (1)</a>
                            <a href="#">Express (2)</a>
                            <a href="#">Onix (7)</a>
                        </div>
                    </div>
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/volvo.com" alt="" onerror="this.style.display='none'">
                            <span>Volvo</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">XC90 (6)</a>
                            <a href="#">XC40 (6)</a>
                            <a href="#">C40 (3)</a>
                            <a href="#">XC60 (4)</a>
                            <a href="#">EX30 (1)</a>
                        </div>
                    </div>
                    <div class="mobile-marca-item">
                        <div class="mobile-marca-header" onclick="toggleMobileModelos(this)">
                            <img src="https://logo.clearbit.com/chrysler.com" alt=""
                                onerror="this.style.display='none'">
                            <span>Chrysler</span>
                            <i class="bi bi-chevron-down"></i>
                        </div>
                        <div class="mobile-modelos-list">
                            <a href="#">Pacifica (1)</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="mobile-ver-todos">Ver todas las marcas</a>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Tipo de auto</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <label class="mobile-checkbox">
                    <input type="checkbox"> SUV
                </label>
                <label class="mobile-checkbox">
                    <input type="checkbox"> Sedán
                </label>
                <label class="mobile-checkbox">
                    <input type="checkbox"> Hatchback
                </label>
                <label class="mobile-checkbox">
                    <input type="checkbox"> Pickup
                </label>
                <label class="mobile-checkbox">
                    <input type="checkbox"> Coupé
                </label>
                <label class="mobile-checkbox">
                    <input type="checkbox"> Convertible
                </label>
            </div>
        </div>

        <div class="mobile-filter-group">
            <div class="mobile-filter-group-header" onclick="toggleMobileSubmenu(this)">
                <span>Año</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <div class="mobile-filter-submenu">
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2024
                </label>
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2023
                </label>
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2022
                </label>
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2021
                </label>
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2020
                </label>
                <label class="mobile-radio">
                    <input type="radio" name="year"> 2019
                </label>
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

<!-- Backdrops -->
<div class="dropdown-backdrop" id="dropdownBackdrop" onclick="closeDropdown()"></div>
<div class="mobile-backdrop" id="mobileBackdrop" onclick="toggleMobileMenu()"></div>

<style>
    /* NAVBAR FILTERS - contenedor sticky */
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

    /* Versión desktop */
    .desktop-only {
        display: flex;
        flex: 1;
        margin-right: 20px;
    }

    /* Versión móvil (oculta en desktop) */
    .mobile-header {
        display: none;
        flex: 1;
    }

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

    .filter-link:hover {
        color: var(--dalton-red);
        border-bottom-color: var(--dalton-red);
    }

    .filter-link.active {
        color: var(--dalton-red);
        border-bottom-color: var(--dalton-red);
    }

    .referral-text {
        font-size: 0.78rem;
        font-weight: 700;
        white-space: nowrap;
        color: var(--dalton-text);
        flex-shrink: 0;
    }

    /* Dropdown desktop */
    .marca-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        border: 1px solid var(--dalton-border);
        border-top: none;
        z-index: 999;
        display: none;
    }

    .marca-dropdown.open {
        display: block;
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .marca-dropdown-inner {
        padding: 28px 32px 20px;
    }

    .marca-cols {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        border: 1.5px solid var(--dalton-border);
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 24px;
    }

    .marca-col {
        padding: 18px 20px 16px;
        border-right: 1px solid var(--dalton-border);
    }

    .marca-col:last-child {
        border-right: none;
    }

    .marca-col-header {
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 12px;
        margin-bottom: 12px;
        border-bottom: 1px solid var(--dalton-border);
    }

    .marca-col-header img {
        width: 32px;
        height: 24px;
        object-fit: contain;
    }

    .marca-col-name {
        font-size: 0.9rem;
        font-weight: 800;
    }

    .modelo-list {
        list-style: none;
        padding: 0;
        margin: 0 0 12px;
    }

    .modelo-list li {
        padding: 5px 0;
        display: flex;
        align-items: baseline;
        gap: 4px;
    }

    .modelo-list a {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--dalton-text);
        text-decoration: none;
    }

    .modelo-list a:hover {
        color: var(--dalton-blue);
    }

    .modelo-count {
        font-size: 0.75rem;
        color: var(--dalton-muted);
    }

    .ver-todos-modelo {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--dalton-blue);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .ver-todos-modelo:hover {
        text-decoration: underline;
    }

    .marca-dropdown-pagination {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
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
    }

    .mdp-btn:hover:not(:disabled) {
        border-color: var(--dalton-blue);
        color: var(--dalton-blue);
    }

    .mdp-btn.active {
        background: var(--dalton-blue);
        border-color: var(--dalton-blue);
        color: white;
    }

    .mdp-btn:disabled {
        opacity: 0.35;
        cursor: not-allowed;
    }

    .mdp-dots {
        font-size: 0.85rem;
        color: var(--dalton-muted);
        font-weight: 700;
    }

    .dropdown-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 998;
    }

    .dropdown-backdrop.open {
        display: block;
    }

    /* ===== ESTILOS MÓVIL (MENÚ HAMBURGUESA) ===== */
    .mobile-menu-toggle {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 8px;
    }

    .hamburger-icon {
        width: 24px;
        height: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .hamburger-icon span {
        width: 100%;
        height: 2.5px;
        background: var(--dalton-text);
        border-radius: 2px;
        transition: all 0.3s;
    }

    .mobile-menu-text {
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Panel lateral móvil */
    .mobile-filters-panel {
        position: fixed;
        top: 0;
        right: -100%;
        width: 85%;
        max-width: 400px;
        height: 100vh;
        background: white;
        z-index: 1002;
        transition: right 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .mobile-filters-panel.open {
        right: 0;
    }

    .mobile-filters-header {
        padding: 20px;
        border-bottom: 1px solid var(--dalton-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-filters-header h3 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
    }

    .mobile-filters-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 5px;
        color: var(--dalton-text);
    }

    .mobile-filters-content {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
    }

    .mobile-filter-group {
        margin-bottom: 15px;
        border: 1px solid var(--dalton-border);
        border-radius: 10px;
        overflow: hidden;
    }

    .mobile-filter-group-header {
        padding: 15px;
        background: #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.2s;
    }

    .mobile-filter-group-header:hover {
        background: #e9ecef;
    }

    .mobile-filter-group-header i {
        transition: transform 0.3s;
    }

    .mobile-filter-group-header.active i {
        transform: rotate(180deg);
    }

    .mobile-filter-submenu {
        display: none;
        padding: 15px;
        background: white;
        border-top: 1px solid var(--dalton-border);
    }

    .mobile-filter-submenu.open {
        display: block;
    }

    /* Estilos para elementos dentro del submenu */
    .mobile-marca-list {
        max-height: 300px;
        overflow-y: auto;
    }

    .mobile-marca-item {
        margin-bottom: 10px;
    }

    .mobile-marca-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
    }

    .mobile-marca-header img {
        width: 24px;
        height: 18px;
        object-fit: contain;
    }

    .mobile-marca-header i {
        margin-left: auto;
        transition: transform 0.3s;
    }

    .mobile-marca-header.active i {
        transform: rotate(180deg);
    }

    .mobile-modelos-list {
        display: none;
        padding: 10px 10px 10px 44px;
    }

    .mobile-modelos-list.open {
        display: block;
    }

    .mobile-modelos-list a {
        display: block;
        padding: 8px 0;
        color: var(--dalton-text);
        text-decoration: none;
        font-size: 0.9rem;
        border-bottom: 1px dashed var(--dalton-border);
    }

    .mobile-modelos-list a:last-child {
        border-bottom: none;
    }

    .mobile-ver-todos {
        display: block;
        padding: 10px;
        text-align: center;
        color: var(--dalton-blue);
        text-decoration: none;
        font-weight: 600;
        margin-top: 10px;
    }

    .mobile-checkbox,
    .mobile-radio {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 0;
        cursor: pointer;
    }

    .mobile-checkbox input,
    .mobile-radio input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .mobile-price-range {
        padding: 10px 0;
    }

    .mobile-price-range input[type=range] {
        width: 100%;
        margin-bottom: 15px;
    }

    .mobile-price-inputs {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .mobile-price-inputs input {
        flex: 1;
        padding: 8px;
        border: 1px solid var(--dalton-border);
        border-radius: 6px;
    }

    .mobile-price-presets {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .price-preset {
        flex: 1 1 calc(33.33% - 8px);
        padding: 8px;
        background: #f8f9fa;
        border: 1px solid var(--dalton-border);
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .price-preset:hover {
        background: #e9ecef;
    }

    .mobile-select {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--dalton-border);
        border-radius: 8px;
        background: white;
        font-size: 0.9rem;
    }

    .mobile-filters-footer {
        padding: 20px;
        border-top: 1px solid var(--dalton-border);
        display: flex;
        gap: 10px;
    }

    .mobile-btn {
        flex: 1;
        padding: 14px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.95rem;
    }

    .mobile-btn-primary {
        background: var(--dalton-red, #dc3545);
        color: white;
    }

    .mobile-btn-primary:hover {
        background: #bb2d3b;
    }

    .mobile-btn-outline {
        background: white;
        border: 1.5px solid var(--dalton-border);
        color: var(--dalton-text);
    }

    .mobile-btn-outline:hover {
        background: #f8f9fa;
    }

    .mobile-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1001;
    }

    .mobile-backdrop.open {
        display: block;
    }

    /* ===== RESPONSIVE BREAKPOINTS ===== */

    /* Tablets y laptops pequeñas */
    @media screen and (max-width: 1200px) {
        .marca-cols {
            grid-template-columns: repeat(3, 1fr);
        }

        .marca-dropdown-inner {
            padding: 20px;
        }
    }

    /* Tablets */
    @media screen and (max-width: 992px) {
        .navbar-filters {
            padding: 0 16px;
        }

        .referral-text {
            font-size: 0.7rem;
            max-width: 140px;
            text-align: right;
        }
    }

    /* Móviles - activar menú hamburguesa */
    @media screen and (max-width: 768px) {
        .navbar-filters {
            top: 0;
            padding: 0 16px;
        }

        .desktop-only {
            display: none;
            /* Ocultar filtros desktop */
        }

        .mobile-header {
            display: block;
            /* Mostrar header móvil */
        }

        .referral-text {
            display: none;
            /* Ocultar texto de referido */
        }

        .marca-dropdown {
            display: none !important;
            /* Ocultar dropdown desktop */
        }
    }

    /* Móviles pequeños */
    @media screen and (max-width: 576px) {
        .navbar-filters {
            padding: 0 12px;
        }

        .mobile-filters-panel {
            width: 90%;
        }

        .mobile-menu-text {
            font-size: 0.85rem;
        }
    }
</style>

<script>
    // Funciones para desktop dropdown
    function toggleMarcaDropdown(btn) {
        if (window.innerWidth <= 768) {
            // En móvil, abrir panel de filtros
            toggleMobileMenu();
            return;
        }

        const dropdown = document.getElementById('marcaDropdown');
        const backdrop = document.getElementById('dropdownBackdrop');
        const isOpen = dropdown.classList.contains('open');

        closeDropdown();

        if (!isOpen) {
            dropdown.classList.add('open');
            backdrop.classList.add('open');
            btn.classList.add('active');
            const icon = btn.querySelector('i');
            if (icon) {
                icon.className = 'bi bi-chevron-up';
                icon.style.fontSize = '0.7rem';
            }
        }
    }

    function closeDropdown() {
        const dropdown = document.getElementById('marcaDropdown');
        const backdrop = document.getElementById('dropdownBackdrop');

        dropdown.classList.remove('open');
        backdrop.classList.remove('open');

        document.querySelectorAll('.filter-link').forEach(b => {
            b.classList.remove('active');
            const icon = b.querySelector('i');
            if (icon) {
                icon.className = 'bi bi-chevron-down';
                icon.style.fontSize = '0.7rem';
            }
        });
    }

    // Funciones para móvil (menú hamburguesa)
    function toggleMobileMenu() {
        const panel = document.getElementById('mobileFiltersPanel');
        const backdrop = document.getElementById('mobileBackdrop');

        panel.classList.toggle('open');
        backdrop.classList.toggle('open');

        // Animar icono hamburguesa
        const hamburgerIcon = document.querySelector('.hamburger-icon');
        if (panel.classList.contains('open')) {
            hamburgerIcon.style.transform = 'rotate(90deg)';
        } else {
            hamburgerIcon.style.transform = 'rotate(0)';
        }
    }

    function toggleMobileSubmenu(header) {
        const submenu = header.nextElementSibling;
        const icon = header.querySelector('i');

        header.classList.toggle('active');
        submenu.classList.toggle('open');
    }

    function toggleMobileModelos(header) {
        const modelosList = header.nextElementSibling;
        const icon = header.querySelector('i');

        header.classList.toggle('active');
        modelosList.classList.toggle('open');
    }

    function clearMobileFilters() {
        // Limpiar todos los inputs
        document.querySelectorAll('.mobile-filters-panel input[type="checkbox"], .mobile-filters-panel input[type="radio"]').forEach(input => {
            input.checked = false;
        });

        document.querySelectorAll('.mobile-filters-panel input[type="range"]').forEach(input => {
            input.value = input.min || 0;
        });

        document.querySelectorAll('.mobile-filters-panel input[type="number"]').forEach(input => {
            input.value = '';
        });
    }

    function applyMobileFilters() {
        // Aquí iría la lógica para aplicar filtros
        console.log('Filtros aplicados');
        toggleMobileMenu(); // Cerrar panel después de aplicar
    }

    // Cerrar con Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            closeDropdown();

            const mobilePanel = document.getElementById('mobileFiltersPanel');
            if (mobilePanel.classList.contains('open')) {
                toggleMobileMenu();
            }
        }
    });

    // Ajustar comportamiento según tamaño de pantalla
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            // Asegurar que el panel móvil esté cerrado en desktop
            const mobilePanel = document.getElementById('mobileFiltersPanel');
            const mobileBackdrop = document.getElementById('mobileBackdrop');

            if (mobilePanel.classList.contains('open')) {
                mobilePanel.classList.remove('open');
                mobileBackdrop.classList.remove('open');
            }

            // Restaurar icono hamburguesa
            const hamburgerIcon = document.querySelector('.hamburger-icon');
            if (hamburgerIcon) {
                hamburgerIcon.style.transform = 'rotate(0)';
            }
        }
    });
</script>