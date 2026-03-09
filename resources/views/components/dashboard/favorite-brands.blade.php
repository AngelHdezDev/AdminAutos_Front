<section>
    <div class="section-header">
        <h2 class="section-title">Tenemos tu marca favorita</h2>
    </div>

    <div class="marcas-scroll mb-4">
        @foreach($marcas as $marca)
            <button class="marca-pill">
                @if($marca->imagen)
                    <img src="{{ config('app.admin_storage') . $marca->imagen }}" alt="{{ $marca->nombre }}" width="20"
                        height="20" class="brand-logo"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">
                    <i class="bi bi-image" style="display: none; font-size: 1.2rem; margin-right: 5px; color: #6c757d;"></i>
                @else
                    <i class="bi bi-image" style="font-size: 1.2rem; margin-right: 5px; color: #6c757d;"></i>
                @endif

                {{ $marca->nombre }}
            </button>
        @endforeach
    </div>

    <div class="cars-scroll">
        @foreach($autos as $auto)
            <div class="car-card">
                <div class="car-img-container"
                    style="position: relative; background: #f8f9fa; height: 160px; overflow: hidden;">
                    {{-- Imagen del auto --}}
                    <img class="car-card-img"
                        src="{{ config('app.admin_storage') . ($auto->thumbnail->imagen ?? 'default.jpg') }}"
                        alt="{{ $auto->modelo }}" style="width: 100%; height: 100%; object-fit: cover;"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    {{-- Placeholder que solo se ve si la imagen falla --}}
                    <div class="placeholder-car"
                        style="display: none; height: 100%; width: 100%; align-items: center; justify-content: center; flex-direction: column; color: #adb5bd;">
                        <i class="bi bi-image" style="font-size: 2.5rem;"></i>
                        <span style="font-size: 0.8rem;">Imagen no disponible</span>
                    </div>
                </div>

                <div class="car-card-body">
                    <div class="car-card-title">{{ $auto->marca->nombre }} {{ $auto->modelo }} {{ $auto->anio }}</div>
                    <div class="car-card-meta">{{ $auto->puertas }} PTS. | {{ number_format($auto->kilometraje) }} km</div>
                    <div class="car-card-price">${{ number_format($auto->precio, 2) }} <small>MXN</small></div>

                    @if($auto->precio_liquidacion)
                        <span class="badge-liquidacion">${{ number_format($auto->precio_liquidacion) }} precio de
                            liquidación</span>
                    @endif

                    {{-- Tip: Aquí puedes usar la ubicación real si la tienes en el modelo --}}
                    <div class="car-card-location">
                        <i class="bi bi-geo-alt"></i> {{ $auto->ubicacion ?? 'Ubicación no disponible' }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>