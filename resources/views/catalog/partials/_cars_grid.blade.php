<div class="results-count">
    {{ $autos->total() }} Resultados
</div>

<div class="cars-grid sidebar-open" id="carsGrid">
    @forelse($autos as $auto)
        <div class="car-card">
            <div class="car-card-img-wrap">
                @if($auto->thumbnail)
                    <img src="{{ env('ADMIN_STORAGE_URL') . $auto->thumbnail->imagen }}" alt="{{ $auto->modelo }}">
                @else
                    <div class="car-img-placeholder">
                        <i class="bi bi-image"></i>
                        <span>Imagen no disponible</span>
                    </div>
                @endif

                <div class="car-badges">
                    @if($auto->year == 2026)
                        <span class="badge-nuevo"><i class="bi bi-plus"></i> Nuevo 0km</span>
                    @endif
                    @if($auto->consignacion)
                        <span class="badge-consignacion">En consignación</span>
                    @endif
                </div>
            </div>

            <div class="car-card-body">
                <div class="car-card-header">
                    <div class="car-card-title">{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->year }}</div>
                    @if($auto->marca->logo)
                        <img src="{{ asset('storage/' . $auto->marca->logo) }}" class="brand-logo"
                            alt="Logo {{ $auto->marca->nombre }}">
                    @endif
                </div>

                <div class="car-card-meta">
                    {{ $auto->tipo }} |
                    {{ $auto->ocultar_kilometraje ? 'Kilometraje no disponible' : number_format($auto->kilometraje) . ' Km' }}
                </div>

                <div class="car-price">
                    {{-- Formato de moneda profesional --}}
                    ${{ number_format($auto->precio, 0) }} <small>MXN</small>
                </div>

                <div class="car-location">
                    <i class="bi bi-geo-alt"></i>
                    <span>No disponible</span> {{-- Aquí puedes mapear una relación de sucursales si la tienes --}}
                </div>
            </div>
        </div>
    @empty
        <div class="no-results">No se encontraron vehículos que coincidan con tu búsqueda.</div>
    @endforelse
</div>

{{-- Paginación dinámica de Laravel --}}
<div class="pagination-wrap">
    {{ $autos->links() }}
</div>