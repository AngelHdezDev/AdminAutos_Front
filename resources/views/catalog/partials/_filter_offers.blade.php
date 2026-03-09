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