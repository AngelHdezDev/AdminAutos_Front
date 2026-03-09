@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/catalog.css') }}" rel="stylesheet">
@endpush

<body>

    @include('catalog.partials._search_bar')
    @include('catalog.partials._brands')

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeMobileSidebar()"></div>

    <div class="catalog-layout">

        @include('catalog.partials._filter_offers')

        <main class="catalog-main">
            @include('catalog.partials._toolbar')
            @include('catalog.partials._cars_grid')

            <div class="pagination-wrap">
                <a href="#" class="page-btn arrow"><i class="bi bi-chevron-left"></i></a>
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">2</a>
                <a href="#" class="page-btn">3</a>
                <a href="#" class="page-btn">4</a>
                <a href="#" class="page-btn">5</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-btn">81</a>
                <a href="#" class="page-btn arrow"><i class="bi bi-chevron-right"></i></a>
            </div>
        </main>
    </div>
</body>

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush