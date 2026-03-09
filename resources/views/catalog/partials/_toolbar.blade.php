<div class="catalog-toolbar">
    <button class="btn-toggle-filters" id="toggleFiltersBtn" onclick="toggleFilters()">
        Ocultar filtros <i class="bi bi-sliders"></i>
    </button>
    <div class="sort-wrap">
        <span>Ordenar por:</span>
        <div class="sort-dropdown-wrap">
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