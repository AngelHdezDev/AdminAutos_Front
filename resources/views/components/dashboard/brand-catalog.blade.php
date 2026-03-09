<section class="brand-catalog-section mt-5">
    <h3 class="section-title mb-4">Nuestro catálogo de marcas</h3>
    
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-3">
        @foreach($marcas as $marca)
            <div class="col">
                <a href="{{ route('dashboard', ['marca' => $marca->nombre]) }}" class="brand-catalog-link text-decoration-none">
                    <span class="brand-name text-primary fw-bold">{{ $marca->nombre }}</span>
                    <span class="brand-count text-muted">({{ $marca->autos_count }})</span>
                </a>
            </div>
        @endforeach
    </div>
</section>

<style>
    .brand-catalog-link {
        display: block;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        transition: all 0.2s;
        font-size: 0.95rem;
    }
    .brand-catalog-link:hover {
        background-color: #f8f9fa;
        padding-left: 5px;
    }
</style>