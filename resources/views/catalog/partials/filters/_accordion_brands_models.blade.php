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
    // 1. Obtenemos el formulario lateral (marcas, precios, etc.)
    const filterForm = document.getElementById('filterForm'); 
    const formData = new FormData(filterForm);

    // 2. OBTENEMOS EL BUSCADOR SUPERIOR
    const mainSearch = document.getElementById('mainSearchInput');
    if (mainSearch) {
        // Agregamos el valor del buscador a los datos que se van a enviar
        formData.set('search', mainSearch.value);
    }

    // 3. Convertimos todo a una URL string
    const queryString = new URLSearchParams(formData).toString();

    // 4. Actualizamos la URL en el navegador (para que no se pierdan al refrescar)
    window.history.pushState({}, '', `${window.location.pathname}?${queryString}`);

    // Efecto visual de carga
    const container = document.getElementById('carsGridContainer');
    container.style.opacity = '0.5';

    // 5. Petición AJAX
    fetch(`${window.location.pathname}?${queryString}`, {
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(response => response.text())
    .then(html => {
        container.innerHTML = html;
        container.style.opacity = '1';
        
        // Si tienes el scroll opcional, déjalo aquí
        container.scrollIntoView({ behavior: 'smooth', block: 'start' });
    })
    .catch(error => console.error('Error:', error));
}

// Al cargar la página, aseguramos que todas las marcas sean visibles
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('#marcaList .marca-item');
    items.forEach(item => item.style.display = '');
});

document.addEventListener('click', function (e) {
    // Si el clic fue en un link de paginación dentro de nuestro contenedor
    if (e.target.closest('#carsGridContainer .pagination a')) {
        e.preventDefault(); // Detenemos la recarga de página
        const url = e.target.closest('a').href;
        
        fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
            .then(res => res.text())
            .then(html => {
                document.getElementById('carsGridContainer').innerHTML = html;
                window.scrollTo(0, 0);
            });
    }
});

</script>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/catalog/partials/filters/_accordion_brands_models.css') }}">
@endpush