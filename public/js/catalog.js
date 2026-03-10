
var sidebarOpen = true;
var isMobile = () => window.innerWidth <= 992;

function toggleFilters() {
    if (isMobile()) { openMobileSidebar(); return; }
    var sidebar = document.getElementById('sidebar');
    var grid = document.getElementById('carsGrid');
    var btn = document.getElementById('toggleFiltersBtn');
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        sidebar.classList.remove('hidden');
        grid.classList.add('sidebar-open');
        btn.innerHTML = 'Ocultar filtros <i class="bi bi-sliders"></i>';
    } else {
        sidebar.classList.add('hidden');
        grid.classList.remove('sidebar-open');
        btn.innerHTML = 'Mostrar filtros <i class="bi bi-sliders"></i>';
    }
}

function openMobileSidebar() {
    document.getElementById('sidebar').classList.add('mobile-open');
    document.getElementById('sidebarOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeMobileSidebar() {
    document.getElementById('sidebar').classList.remove('mobile-open');
    document.getElementById('sidebarOverlay').classList.remove('open');
    document.body.style.overflow = '';
}

window.addEventListener('resize', () => { if (!isMobile()) { closeMobileSidebar(); } });

function toggleAccordion(btn) {
    // 1. Efecto visual en el botón (flechita, color, etc.)
    btn.classList.toggle('open');

    // 2. Control del contenido
    var content = btn.nextElementSibling;

    // Si el contenido existe y es el div de filtros
    if (content && content.classList.contains('filter-accordion-content')) {
        if (content.style.maxHeight) {
            // Si tiene altura, lo cerramos
            content.style.maxHeight = null;
        } else {
            // Si no tiene altura, le damos la necesaria para que baje
            content.style.maxHeight = content.scrollHeight + "px";
        }
    }
}

function toggleSort() { document.getElementById('sortDropdown').classList.toggle('open'); }
function selectSort(el) {
    document.querySelectorAll('.sort-option').forEach(o => o.classList.remove('active'));
    el.classList.add('active');
    document.querySelector('.sort-btn').innerHTML = el.textContent.trim().substring(0, 16) + '... <i class="bi bi-chevron-down" style="font-size:0.75rem"></i>';
    document.getElementById('sortDropdown').classList.remove('open');
}
document.addEventListener('click', e => {
    var wrap = document.querySelector('.sort-dropdown-wrap');
    if (wrap && !wrap.contains(e.target)) document.getElementById('sortDropdown').classList.remove('open');
});
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMobileSidebar(); });

function applySort(value) {
    // 1. Obtenemos la URL actual y sus parámetros
    let url = new URL(window.location.href);

    // 2. Actualizamos o añadimos el parámetro 'sort'
    url.searchParams.set('sort', value);

    // 3. Reiniciamos a la página 1 para evitar errores si estábamos en la 5
    url.searchParams.set('page', '1');

    // 4. Redireccionamos
    window.location.href = url.toString();
}
