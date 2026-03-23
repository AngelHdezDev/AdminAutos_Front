{{-- ===== PANEL MÓVIL ===== --}}
<div class="mobile-filters-panel" id="mobileFiltersPanel">

    <div class="mobile-filters-header">
        <h3>Filtros</h3>
        <button class="mobile-filters-close" onclick="toggleMobileMenu()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="mobile-filters-content">

        {{-- Marca y modelo --}}
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
                                <img src="{{ config('app.admin_storage') . $marca->imagen }}" alt="{{ $marca->nombre }}"
                                    onerror="this.style.display='none'">
                                <span>{{ $marca->nombre }}</span>
                                <i class="bi bi-chevron-down"></i>
                            </div>

                            <div class="mobile-modelos-list">
                                {{-- Integración de los modelos con su respectivo contador --}}
                                @foreach($marca->autos->take(5) as $autoAgrupado)
                                                        <a href="{{ route('autos.index', [
                                        'marcas[]' => $marca->id_marca,
                                        'modelos[]' => $autoAgrupado->modelo
                                    ]) }}">
                                                            {{ $autoAgrupado->modelo }}
                                                            <span class="modelo-count" style="font-size: 0.8rem; opacity: 0.7;">
                                                                ({{ $autoAgrupado->total }})
                                                            </span>
                                                        </a>
                                @endforeach

                                {{-- Enlace "Ver todos" ajustado a la ruta correcta --}}
                                <a href="{{ route('autos.index', ['marcas[]' => $marca->id_marca]) }}"
                                    style="color:var(--dalton-blue); font-weight:700; border-top: 1px solid rgba(0,0,0,0.05); margin-top: 5px; padding-top: 10px;">
                                    Ver todos <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('autos.index') }}" class="mobile-ver-todos">Ver todas las marcas</a>
            </div>
        </div>

        {{-- Tipo de auto --}}
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

        {{-- Año --}}
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

        {{-- Precio --}}
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

        {{-- Ubicación --}}
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
<div class="mobile-backdrop" id="mobileBackdrop" onclick="toggleMobileMenu()"></div>