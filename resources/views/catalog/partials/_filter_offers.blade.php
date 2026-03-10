<aside class="sidebar" id="sidebar">
    <div class="sidebar-mobile-header">
        <h6>Filtros</h6>
        <button class="btn-close-sidebar" onclick="closeMobileSidebar()"><i class="bi bi-x-lg"></i></button>
    </div>
    <form action="{{ route('autos.index') }}" method="GET" id="filterForm">
        <input type="hidden" name="sort" id="hiddenSort" value="{{ request('sort', 'latest') }}">

        @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif

        <div class="filter-section-title">Tipo de oferta</div>
        <label class="filter-check-label">
            <input type="checkbox" name="nuevo" value="1" onchange="this.form.submit()" {{ request('nuevo') ? 'checked' : '' }}> Nuevos 0km ⭐
        </label>
        <!-- <label class="filter-check-label"><input type="checkbox"> Seminuevos</label>
        <label class="filter-check-label"><input type="checkbox"> Autos en liquidación 🔥</label> -->
        <label class="filter-check-label">
            <input type="checkbox" name="consignacion" value="1" onchange="this.form.submit()" 
                {{ request('consignacion') ? 'checked' : '' }}> En consignación
        </label>
    </form>

        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-car-front filter-icon"></i> Marcas y modelos</span><i class="bi bi-chevron-down"></i>
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
            <span><i class="bi bi-speedometer2 filter-icon"></i> Kilometraje</span><i class="bi bi-chevron-down"></i>
        </button>
        <button class="filter-accordion-btn" onclick="toggleAccordion(this)">
            <span><i class="bi bi-sliders filter-icon"></i> Filtros avanzados</span><i class="bi bi-chevron-down"></i>
        </button>
    
</aside>