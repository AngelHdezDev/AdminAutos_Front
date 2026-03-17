<div class="marcas-bar-container">

    {{-- Flecha izquierda --}}
    <button class="marcas-arrow marcas-arrow-left" id="marcasArrowLeft"
            onclick="scrollMarcas(-1)" aria-label="Anterior" type="button">
        <i class="bi bi-chevron-left"></i>
    </button>

    <div class="marcas-bar" id="marcasBar">
        @foreach($marcas->where('autos_count', '>', 0) as $m)
            <button type="button"
                class="marca-btn {{ in_array($m->id_marca, (array) request('marcas', [])) ? 'active' : '' }}"
                data-id="{{ $m->id_marca }}"
                onclick="toggleMarcaBar({{ $m->id_marca }}, this)">

                @if($m->imagen)
                    <img src="{{ $m->getImagen }}" alt="{{ $m->nombre }}"
                         onerror="this.style.display='none'" width="20" height="16">
                @endif

                <span class="marca-name-text">{{ $m->nombre }}</span>
                <span class="marca-count-pill">{{ $m->autos_count }}</span>
            </button>
        @endforeach
    </div>

    {{-- Flecha derecha --}}
    <button class="marcas-arrow marcas-arrow-right" id="marcasArrowRight"
            onclick="scrollMarcas(1)" aria-label="Siguiente" type="button">
        <i class="bi bi-chevron-right"></i>
    </button>

</div>

<style>
    .marcas-bar-container {
        position: relative;
        display: flex;
        align-items: center;
        background: #fff;
        padding: 10px 0;
        margin-bottom: 20px;
        gap: 6px;
    }

    /* Fade lateral para indicar que hay más contenido */
    .marcas-bar-container::before,
    .marcas-bar-container::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 48px;
        pointer-events: none;
        z-index: 1;
        transition: opacity 0.2s;
    }
    .marcas-bar-container::before {
        left: 38px;
        background: linear-gradient(to right, #fff, transparent);
        opacity: 0; /* se activa por JS */
    }
    .marcas-bar-container::after {
        right: 38px;
        background: linear-gradient(to left, #fff, transparent);
    }
    .marcas-bar-container.can-scroll-left::before  { opacity: 1; }
    .marcas-bar-container.can-scroll-right::after  { opacity: 0; }

    /* Barra de marcas */
    .marcas-bar {
        flex: 1;
        display: flex;
        gap: 8px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 4px 2px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }
    .marcas-bar::-webkit-scrollbar { display: none; }

    /* Botones de marca */
    .marca-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 14px;
        border-radius: 50px;
        border: 1.5px solid var(--dalton-border);
        background: white;
        color: var(--dalton-text);
        font-family: 'Manrope', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s ease;
        flex-shrink: 0;
        white-space: nowrap;
    }

    .marca-btn:hover:not(.active) {
        border-color: var(--dalton-red);
        color: var(--dalton-red);
    }

    .marca-btn.active {
        background: var(--dalton-dark);
        color: #fff;
        border-color: var(--dalton-dark);
    }

    .marca-count-pill {
        font-size: 0.72rem;
        font-weight: 600;
        opacity: 0.55;
        transition: opacity 0.15s;
    }
    .marca-btn:hover .marca-count-pill,
    .marca-btn.active .marca-count-pill {
        opacity: 1;
    }

    /* Flechas de navegación */
    .marcas-arrow {
        flex-shrink: 0;
        background: white;
        border: 1.5px solid var(--dalton-border);
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--dalton-muted);
        font-size: 0.8rem;
        transition: all 0.15s;
        z-index: 2;
    }
    .marcas-arrow:hover {
        border-color: var(--dalton-text);
        color: var(--dalton-text);
    }
    .marcas-arrow.hidden {
        opacity: 0;
        pointer-events: none;
    }
</style>

<script>
(function () {
    const bar       = document.getElementById('marcasBar');
    const container = bar?.closest('.marcas-bar-container');
    const arrowL    = document.getElementById('marcasArrowLeft');
    const arrowR    = document.getElementById('marcasArrowRight');

    /* ---- Actualizar estado de flechas según posición del scroll ---- */
    function updateArrows() {
        if (!bar || !arrowL || !arrowR) return;

        const atStart = bar.scrollLeft <= 4;
        const atEnd   = bar.scrollLeft + bar.clientWidth >= bar.scrollWidth - 4;

        arrowL.classList.toggle('hidden', atStart);
        arrowR.classList.toggle('hidden', atEnd);

        if (container) {
            container.classList.toggle('can-scroll-left', !atStart);
            container.classList.toggle('can-scroll-right', !atEnd);
        }
    }

    /* ---- Scroll al hacer clic en flecha ---- */
    window.scrollMarcas = function (direction) {
        if (!bar) return;
        bar.scrollBy({ left: 240 * direction, behavior: 'smooth' });
    };

    /* ---- Toggle marca: sincroniza con sidebar y aplica filtros ---- */
    window.toggleMarcaBar = function (idMarca, btnElement) {
        const checkbox = document.querySelector(`.marca-checkbox[value="${idMarca}"]`);

        if (checkbox) {
            checkbox.checked = !checkbox.checked;
        }

        btnElement.classList.toggle('active');

        if (typeof applyFilters === 'function') {
            applyFilters();
        }
    };

    /* ---- Sincronizar estado visual del bar con los checkboxes del sidebar ---- */
    function syncBarWithSidebar() {
        document.querySelectorAll('.marca-btn[data-id]').forEach(btn => {
            const id       = btn.dataset.id;
            const checkbox = document.querySelector(`.marca-checkbox[value="${id}"]`);
            if (checkbox) {
                btn.classList.toggle('active', checkbox.checked);
            }
        });
    }

    /* ---- Escuchar cambios en checkboxes del sidebar ---- */
    document.querySelectorAll('.marca-checkbox').forEach(cb => {
        cb.addEventListener('change', syncBarWithSidebar);
    });

    /* ---- Inicializar ---- */
    if (bar) {
        bar.addEventListener('scroll', updateArrows, { passive: true });
        updateArrows(); // Estado inicial
    }
})();
</script>