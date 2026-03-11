<div class="filter-accordion-body">
    <div class="km-filter">
        <div class="km-inputs">
            <div class="km-input-group">
                <label>Precio Mínimo</label>
                <div class="km-input-wrap">
                    <input type="text" id="priceMinInput" value="$50,000" readonly>
                </div>
            </div>
            <div class="km-input-group">
                <label>Precio Máximo</label>
                <div class="km-input-wrap">
                    <input type="text" id="priceMaxInput" value="$3,500,000" readonly>
                </div>
            </div>
        </div>

        <!-- Slider doble -->
        <div class="km-slider-wrap">
            <div class="km-slider-track">
                <div class="km-slider-range" id="priceRange"></div>
            </div>
            <input type="range" id="priceMin" name="price_min" class="km-thumb km-thumb-min" min="50000" max="3500000"
                value="50000" step="1000">
            <input type="range" id="priceMax" name="price_max" class="km-thumb km-thumb-max" min="50000" max="3500000"
                value="3500000" step="1000">
        </div>
    </div>
</div>

<script>
    (function () {
        const MIN_PRECIO = 50000;  // Cambiado de 0 a 50000
        const MAX_PRECIO = 3500000;
        const STEP = 1000;

        const inputMin = document.getElementById('priceMin');
        const inputMax = document.getElementById('priceMax');
        const labelMin = document.getElementById('priceMinInput');
        const labelMax = document.getElementById('priceMaxInput');
        const range = document.getElementById('priceRange');

        if (!inputMin || !inputMax || !labelMin || !labelMax || !range) return;

        function formatPrecio(val) {
            if (val <= MIN_PRECIO) return '$50,000';  // Mostrar mínimo correcto
            if (val >= MAX_PRECIO) return '$3,500,000';
            return '$' + Number(val).toLocaleString('es-MX');
        }

        function updateSlider() {
            let minVal = parseInt(inputMin.value);
            let maxVal = parseInt(inputMax.value);

            // Validar que no se crucen y respetar mínimo de 50000
            if (minVal < MIN_PRECIO) {
                minVal = MIN_PRECIO;
                inputMin.value = minVal;
            }
            if (maxVal < MIN_PRECIO) {
                maxVal = MIN_PRECIO + STEP;
                inputMax.value = maxVal;
            }
            
            if (minVal > maxVal - STEP) {
                minVal = Math.max(MIN_PRECIO, maxVal - STEP);
                inputMin.value = minVal;
            }
            if (maxVal < minVal + STEP) {
                maxVal = Math.min(MAX_PRECIO, minVal + STEP);
                inputMax.value = maxVal;
            }

            const minPct = ((minVal - MIN_PRECIO) / (MAX_PRECIO - MIN_PRECIO)) * 100;
            const maxPct = ((maxVal - MIN_PRECIO) / (MAX_PRECIO - MIN_PRECIO)) * 100;

            range.style.left = minPct + '%';
            range.style.width = (maxPct - minPct) + '%';

            labelMin.value = formatPrecio(minVal);
            labelMax.value = formatPrecio(maxVal);
        }

        inputMin.addEventListener('input', updateSlider);
        inputMax.addEventListener('input', updateSlider);

        function applyPriceFilter() {
            const form = document.getElementById('filterForm');
            if (form) {
                form.submit();
            }
        }

        inputMin.addEventListener('change', applyPriceFilter);
        inputMax.addEventListener('change', applyPriceFilter);

        // Inicializar con valores del query string si existen
        const params = new URLSearchParams(window.location.search);
        let minValue = MIN_PRECIO;
        let maxValue = MAX_PRECIO;
        
        if (params.get('price_min')) {
            minValue = Math.max(MIN_PRECIO, Math.min(MAX_PRECIO, parseInt(params.get('price_min'))));
            inputMin.value = minValue;
        }
        if (params.get('price_max')) {
            maxValue = Math.max(MIN_PRECIO, Math.min(MAX_PRECIO, parseInt(params.get('price_max'))));
            inputMax.value = maxValue;
        }

        // Validar que min no sea mayor que max y respetar mínimo
        if (minValue >= maxValue) {
            inputMin.value = MIN_PRECIO;
            inputMax.value = MAX_PRECIO;
        }

        updateSlider();
    })();
</script>

<style>
    /* =============================================
   Filtro de Kilometraje — dual range slider
   ============================================= */

    .km-filter {
        padding: 4px 0 20px;
    }

    /* Inputs Mínimo / Máximo */
    .km-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-bottom: 20px;
    }

    .km-input-group label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--dalton-muted);
        margin-bottom: 5px;
    }

    .km-input-wrap input {
        width: 100%;
        border: 1.5px solid var(--dalton-border);
        border-radius: 8px;
        padding: 8px 12px;
        font-family: 'Manrope', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--dalton-text);
        background: white;
        outline: none;
        transition: border-color 0.15s;
        cursor: default;
    }

    .km-input-wrap input:focus {
        border-color: var(--dalton-blue);
    }

    /* ===== Slider doble ===== */
    .km-slider-wrap {
        position: relative;
        height: 20px;
        margin: 0 4px;
    }

    /* Track base (gris) */
    .km-slider-track {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--dalton-border);
        border-radius: 4px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    /* Rango activo (azul) */
    .km-slider-range {
        position: absolute;
        height: 100%;
        background: var(--dalton-blue);
        border-radius: 4px;
    }

    /* Los dos inputs range superpuestos */
    .km-thumb {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        height: 4px;
        background: transparent;
        pointer-events: none;
        -webkit-appearance: none;
        appearance: none;
        outline: none;
        margin: 0;
    }

    /* Thumb handle */
    .km-thumb::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: var(--dalton-blue);
        border: 2.5px solid white;
        box-shadow: 0 1px 6px rgba(26, 92, 229, 0.35);
        cursor: pointer;
        pointer-events: all;
        transition: box-shadow 0.15s, transform 0.15s;
    }

    .km-thumb::-moz-range-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: var(--dalton-blue);
        border: 2.5px solid white;
        box-shadow: 0 1px 6px rgba(26, 92, 229, 0.35);
        cursor: pointer;
        pointer-events: all;
    }

    .km-thumb::-webkit-slider-thumb:hover {
        box-shadow: 0 0 0 6px rgba(26, 92, 229, 0.15);
        transform: scale(1.1);
    }

    /* z-index: el thumb más cercano al extremo va encima */
    .km-thumb-min {
        z-index: 3;
    }

    .km-thumb-max {
        z-index: 4;
    }
</style>