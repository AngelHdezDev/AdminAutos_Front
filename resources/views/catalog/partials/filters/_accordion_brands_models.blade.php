<div class="filter-accordion-body" id="marcasAccordionBody">

    {{-- Buscador interno --}}
    <div class="marca-search-wrap">
        <input type="text" id="marcaSearchInput" class="marca-search-input" placeholder="Buscar marca..."
            oninput="filterMarcas(this.value)" autocomplete="off">
        <i class="bi bi-search marca-search-icon"></i>
    </div>

    {{-- Lista de marcas --}}
    <ul class="marca-list" id="marcaList">
        @foreach($marcas as $marca)
            <li class="marca-item" data-marca="{{ strtolower($marca->nombre) }}">

                <div class="marca-row">
                    <label class="marca-check-label">
                        <input type="checkbox" name="marcas[]" {{-- Usamos id_marca porque es tu PrimaryKey --}}
                            value="{{ $marca->id_marca }}" class="marca-checkbox" {{ in_array($marca->id_marca, (array) request()->query('marcas', [])) ? 'checked' : '' }} onchange="applyFilters()">

                        {{-- Usamos el atributo dinámico getImagen que definiste en el modelo --}}
                        @if($marca->imagen)
                            <img src="{{ $marca->getImagen }}" alt="{{ $marca->nombre }}" class="marca-logo-sm"
                                onerror="this.style.display='none'">
                        @else
                            <span class="marca-logo-sm" style="display:inline-block; width:20px;"></span>
                        @endif

                        <span class="marca-nombre">{{ $marca->nombre }}</span>
                        <span class="marca-count">({{ $marca->autos_count }})</span>
                    </label>

                    {{-- Nota: Se eliminó el botón de "plus" y la lista de modelos porque --}}
                    {{-- el modelo Marca no tiene esa relación definida. --}}
                </div>
            </li>
        @endforeach
    </ul>

    @if($marcas->count() > 10)
        <button class="ver-mas-marcas-btn" id="verMasMarcasBtn" onclick="toggleVerMas(this)" type="button">
            Ver más marcas <i class="bi bi-plus"></i>
        </button>
    @endif
</div>

<style>
    /* =============================================
   Sidebar — Marcas y modelos
   ============================================= */

    /* --- Buscador interno --- */
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

    /* --- Lista de marcas --- */
    .marca-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .marca-item {
        border-bottom: 1px solid var(--dalton-border);
    }

    /* Ocultar marcas más allá de las primeras 10 */
    .marca-item.hidden-marca {
        display: none;
    }

    /* --- Fila de marca --- */
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

    /* Botón +/- expandir modelos */
    .marca-toggle-btn {
        background: none;
        border: none;
        cursor: pointer;
        color: var(--dalton-muted);
        font-size: 1rem;
        padding: 2px 4px;
        line-height: 1;
        flex-shrink: 0;
        transition: color 0.15s;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
    }

    .marca-toggle-btn:hover {
        color: var(--dalton-blue);
    }

    .marca-toggle-btn.open {
        color: var(--dalton-text);
    }

    /* --- Lista de modelos --- */
    .modelo-list {
        list-style: none;
        margin: 0;
        padding: 0 0 6px 30px;
        overflow: hidden;
        max-height: 600px;
        transition: max-height 0.3s ease, opacity 0.25s ease;
        opacity: 1;
    }

    .modelo-list.collapsed {
        max-height: 0;
        opacity: 0;
    }

    .modelo-item {
        padding: 4px 0;
    }

    .modelo-check-label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .modelo-check-label input[type="checkbox"] {
        width: 14px;
        height: 14px;
        accent-color: var(--dalton-blue);
        cursor: pointer;
        flex-shrink: 0;
    }

    .modelo-nombre {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--dalton-text);
    }

    /* --- Ver más marcas --- */
    .ver-mas-marcas-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        color: var(--dalton-blue);
        font-family: 'Manrope', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        padding: 12px 0 4px;
        transition: opacity 0.15s;
    }

    .ver-mas-marcas-btn:hover {
        opacity: 0.75;
    }

    .ver-mas-marcas-btn i {
        font-size: 0.9rem;
    }
</style>

<script>
    /* ==============================================
   JS — Sidebar Marcas y Modelos
   Pegar antes de </body>
   ============================================== */

    const MARCAS_VISIBLE_LIMIT = 10;

    document.addEventListener('DOMContentLoaded', () => {
        initMarcasLimit();
        // Expandir automáticamente marcas que ya tienen filtro activo
        autoExpandActiveMarcas();
    });

    /* ---- Limitar marcas visibles ---- */
    function initMarcasLimit() {
        const items = document.querySelectorAll('#marcaList .marca-item');
        items.forEach((item, i) => {
            if (i >= MARCAS_VISIBLE_LIMIT) item.classList.add('hidden-marca');
        });
    }

    /* ---- Ver más / Ver menos ---- */
    function toggleVerMas(btn) {
        const items = document.querySelectorAll('#marcaList .marca-item.hidden-marca');
        const allHidden = document.querySelectorAll('#marcaList .marca-item');
        const isExpanded = btn.dataset.expanded === 'true';

        if (isExpanded) {
            // Colapsar — volver al límite
            allHidden.forEach((item, i) => {
                const index = Array.from(document.querySelectorAll('#marcaList .marca-item')).indexOf(item);
                if (index >= MARCAS_VISIBLE_LIMIT) item.classList.add('hidden-marca');
            });
            btn.innerHTML = 'Ver más marcas <i class="bi bi-plus"></i>';
            btn.dataset.expanded = 'false';
        } else {
            // Expandir todo
            document.querySelectorAll('#marcaList .marca-item.hidden-marca')
                .forEach(item => item.classList.remove('hidden-marca'));
            btn.innerHTML = 'Ver menos marcas <i class="bi bi-dash"></i>';
            btn.dataset.expanded = 'true';
        }
    }

    /* ---- Toggle modelos de una marca ---- */
    function toggleModelos(btn) {
        const marcaItem = btn.closest('.marca-item');
        const modeloList = marcaItem.querySelector('.modelo-list');
        const icon = btn.querySelector('i');

        if (!modeloList) return;

        const isOpen = !modeloList.classList.contains('collapsed');

        if (isOpen) {
            modeloList.classList.add('collapsed');
            icon.className = 'bi bi-plus';
            btn.classList.remove('open');
        } else {
            modeloList.classList.remove('collapsed');
            icon.className = 'bi bi-dash';
            btn.classList.add('open');
        }
    }

    /* ---- Auto-expandir marcas con filtros activos ---- */
    function autoExpandActiveMarcas() {
        document.querySelectorAll('.modelo-checkbox:checked').forEach(checkbox => {
            const marcaItem = checkbox.closest('.marca-item');
            const modeloList = marcaItem?.querySelector('.modelo-list');
            const toggleBtn = marcaItem?.querySelector('.marca-toggle-btn');

            if (modeloList && modeloList.classList.contains('collapsed')) {
                modeloList.classList.remove('collapsed');
                if (toggleBtn) {
                    toggleBtn.querySelector('i').className = 'bi bi-dash';
                    toggleBtn.classList.add('open');
                }
            }
        });
    }

    /* ---- Buscador interno ---- */
    function filterMarcas(query) {
        const q = query.trim().toLowerCase();
        const items = document.querySelectorAll('#marcaList .marca-item');

        items.forEach(item => {
            const marcaNombre = item.dataset.marca || '';
            const modeloNames = Array.from(item.querySelectorAll('.modelo-item'))
                .map(m => m.dataset.modelo || '');

            const marcaMatch = marcaNombre.includes(q);
            const modeloMatch = modeloNames.some(m => m.includes(q));

            if (q === '' || marcaMatch || modeloMatch) {
                item.classList.remove('hidden-marca');
                item.style.display = '';

                // Si la búsqueda apunta a un modelo, expande automáticamente
                if (q !== '' && modeloMatch && !marcaMatch) {
                    const modeloList = item.querySelector('.modelo-list');
                    const toggleBtn = item.querySelector('.marca-toggle-btn');
                    if (modeloList) {
                        modeloList.classList.remove('collapsed');
                        if (toggleBtn) {
                            toggleBtn.querySelector('i').className = 'bi bi-dash';
                            toggleBtn.classList.add('open');
                        }
                    }
                }

                // Filtrar modelos visibles dentro de la marca
                item.querySelectorAll('.modelo-item').forEach(modeloItem => {
                    const mn = modeloItem.dataset.modelo || '';
                    modeloItem.style.display = (q === '' || mn.includes(q) || marcaMatch) ? '' : 'none';
                });

            } else {
                item.style.display = 'none';
            }
        });
    }

    /* ---- Aplicar filtros (submit form o push URL) ---- */
    function applyFilters() {
        const marcas = Array.from(document.querySelectorAll('.marca-checkbox:checked')).map(c => c.value);
        const modelos = Array.from(document.querySelectorAll('.modelo-checkbox:checked')).map(c => c.value);

        const url = new URL(window.location.href);

        // Limpiar params anteriores
        url.searchParams.delete('marcas[]');
        url.searchParams.delete('modelos[]');

        marcas.forEach(m => url.searchParams.append('marcas[]', m));
        modelos.forEach(m => url.searchParams.append('modelos[]', m));

        // Resetear paginación al filtrar
        url.searchParams.delete('page');

        window.location.href = url.toString();
    }
</script>