<div class="filter-accordion-body">
    <div class="km-filter">
        <div class="km-inputs">
            <div class="km-input-group">
                <label>Mínimo</label>
                <div class="km-input-wrap">
                    <input type="text" id="kmMinInput" value="1Km" readonly>
                </div>
            </div>
            <div class="km-input-group">
                <label>Máximo</label>
                <div class="km-input-wrap">
                    <input type="text" id="kmMaxInput" value="500,000Km" readonly>
                </div>
            </div>
        </div>

        <!-- Slider doble -->
        <div class="km-slider-wrap">
            <div class="km-slider-track">
                <div class="km-slider-range" id="kmRange"></div>
            </div>
            <input type="range" id="kmMin" name="km_min" class="km-thumb km-thumb-min" min="0" max="500000" value="0" step="1000">
            <input type="range" id="kmMax" name="km_max" class="km-thumb km-thumb-max" min="0" max="500000" value="500000"
                step="1000">
        </div>
    </div>
</div>

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

<script>
    /**
 * Dual range slider — Kilometraje
 * Pegar antes de </body>
 */
    (function () {
        const MIN_KM = 0;
        const MAX_KM = 500000;
        const STEP = 1000;

        const inputMin = document.getElementById('kmMin');
        const inputMax = document.getElementById('kmMax');
        const labelMin = document.getElementById('kmMinInput');
        const labelMax = document.getElementById('kmMaxInput');
        const range = document.getElementById('kmRange');

        if (!inputMin) return; // guard por si la sección no está en la página

        function formatKm(val) {
            if (val <= MIN_KM) return '1Km';
            return Number(val).toLocaleString('es-MX') + 'Km';
        }

        function updateSlider() {
            const minVal = parseInt(inputMin.value);
            const maxVal = parseInt(inputMax.value);

            // Evitar cruce
            if (minVal >= maxVal) {
                inputMin.value = maxVal - STEP;
            }

            const minPct = ((parseInt(inputMin.value) - MIN_KM) / (MAX_KM - MIN_KM)) * 100;
            const maxPct = ((maxVal - MIN_KM) / (MAX_KM - MIN_KM)) * 100;

            range.style.left = minPct + '%';
            range.style.width = (maxPct - minPct) + '%';

            labelMin.value = formatKm(inputMin.value);
            labelMax.value = formatKm(maxVal);
        }

        inputMin.addEventListener('input', updateSlider);
        inputMax.addEventListener('input', updateSlider);

        // Sustituye la función applyKmFilter de tu script por esta:
        function applyKmFilter() {
            const form = document.getElementById('filterForm');
            if (form) {
                // Asegúrate de que los inputs tengan el atributo 'name' para que el form los mande
                inputMin.setAttribute('name', 'km_min');
                inputMax.setAttribute('name', 'km_max');
                form.submit();
            }
        }

        inputMin.addEventListener('change', applyKmFilter);
        inputMax.addEventListener('change', applyKmFilter);

        // Init con valores del query string si existen
        const params = new URLSearchParams(window.location.search);
        if (params.get('km_min')) {
            inputMin.value = params.get('km_min');
        }
        if (params.get('km_max')) {
            inputMax.value = params.get('km_max');
        }

        updateSlider(); // render inicial
    })();
</script>