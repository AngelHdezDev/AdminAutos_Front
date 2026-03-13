@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/catalog.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('catalog.partials._search_bar')
    @include('catalog.partials._brands')

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeMobileSidebar()"></div>

    <div class="catalog-layout">

        @include('catalog.partials._filter_offers')

        <main class="catalog-main">
            @include('catalog.partials._toolbar')
            <div id="carsGridContainer">
                @include('catalog.partials._cars_grid')
            </div>
        </main>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush