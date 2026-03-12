<div class="filter-accordion-body" id="marcasAccordionBody">

    {{-- Buscador interno --}}
    <div class="marca-search-wrap">
        <input type="text" id="marcaSearchInput" class="marca-search-input"
               placeholder="Buscar marca..."
               oninput="filterMarcas(this.value)" autocomplete="off">
        <i class="bi bi-search marca-search-icon"></i>
    </div>

    {{-- Lista de marcas con scroll --}}
    <div class="marca-scroll-container">
        <ul class="marca-list" id="marcaList">
            @foreach($marcas as $marca)
                <li class="marca-item" data-marca="{{ strtolower($marca->nombre) }}">
                    <div class="marca-row">
                        <label class="marca-check-label">
                            <input type="checkbox" name="marcas[]"
                                   value="{{ $marca->id_marca }}"
                                   class="marca-checkbox"
                                   {{ in_array($marca->id_marca, (array) request()->query('marcas', [])) ? 'checked' : '' }}
                                   onchange="applyFilters()">

                            @if($marca->imagen)
                                <img src="{{ $marca->getImagen }}" alt="{{ $marca->nombre }}" class="marca-logo-sm"
                                     onerror="this.style.display='none'">
                            @else
                                <span class="marca-logo-sm"></span>
                            @endif

                            <span class="marca-nombre">{{ $marca->nombre }}</span>
                            <span class="marca-count">({{ $marca->autos_count }})</span>
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div>

<script>
// Función de búsqueda: muestra solo las marcas que coinciden
function filterMarcas(query) {
    const q = query.toLowerCase().trim();
    const items = document.querySelectorAll('#marcaList .marca-item');
    items.forEach(item => {
        const marca = item.dataset.marca || '';
        if (marca.includes(q)) {
            item.style.display = ''; // mostrar
        } else {
            item.style.display = 'none'; // ocultar
        }
    });
}

// Aplica los filtros seleccionados (recarga con los parámetros)
function applyFilters() {
    const marcas = Array.from(document.querySelectorAll('.marca-checkbox:checked')).map(c => c.value);
    const url = new URL(window.location.href);
    url.searchParams.delete('marcas[]');
    marcas.forEach(m => url.searchParams.append('marcas[]', m));
    url.searchParams.delete('page');
    window.location.href = url.toString();
}

// Al cargar la página, aseguramos que todas las marcas sean visibles
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('#marcaList .marca-item');
    items.forEach(item => item.style.display = '');
});
</script>

<style>
/* Contenedor con scroll */
.marca-scroll-container {
    max-height: 300px; /* Ajusta esta altura según necesites */
    overflow-y: auto;
    overflow-x: hidden;
    border: 1px solid var(--dalton-border);
    border-radius: 8px;
    padding: 4px 8px;
    margin-top: 8px;
}

/* Estilo de la barra de scroll (opcional) */
.marca-scroll-container::-webkit-scrollbar {
    width: 6px;
}
.marca-scroll-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.marca-scroll-container::-webkit-scrollbar-thumb {
    background: var(--dalton-blue);
    border-radius: 10px;
}

/* =============================================
   Sidebar — Marcas y modelos (resto de estilos)
   ============================================= */
.sidebar {
    overflow-y: auto;
    overflow-x: hidden;
}

.filter-accordion-body {
    overflow: visible;
    max-height: none;
    opacity: 1;
    transition: opacity 0.25s ease;
}

.filter-accordion-body.collapsed {
    overflow: hidden;
    max-height: 0 !important;
    opacity: 0;
}

.marca-search-wrap {
    position: relative;
    margin: 10px 0 14px;
}

.marca-search-input {
    width: 100%;
    height: 38px;
    border: 1.5px solid var(--dalton-border);
    border-radius: 8px;
    padding: 0 36px 0 12px;
    font-family: 'Manrope', sans-serif;
    font-size: 0.82rem;
    color: var(--dalton-text);
    background: white;
    outline: none;
    transition: border-color 0.15s;
}

.marca-search-input:focus {
    border-color: var(--dalton-blue);
}

.marca-search-input::placeholder {
    color: var(--dalton-muted);
}

.marca-search-icon {
    position: absolute;
    right: 11px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--dalton-blue);
    font-size: 0.88rem;
    pointer-events: none;
}

.marca-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.marca-item {
    border-bottom: 1px solid var(--dalton-border);
}

.marca-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 0;
    gap: 6px;
}

.marca-check-label {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    flex: 1;
    min-width: 0;
}

.marca-check-label input[type="checkbox"] {
    width: 15px;
    height: 15px;
    accent-color: var(--dalton-blue);
    cursor: pointer;
    flex-shrink: 0;
}

.marca-logo-sm {
    width: 26px;
    height: 20px;
    object-fit: contain;
    flex-shrink: 0;
    display: block;
}

.marca-nombre {
    font-size: 0.83rem;
    font-weight: 700;
    color: var(--dalton-text);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.marca-count {
    font-size: 0.78rem;
    color: var(--dalton-muted);
    font-weight: 500;
    white-space: nowrap;
    flex-shrink: 0;
}
</style>