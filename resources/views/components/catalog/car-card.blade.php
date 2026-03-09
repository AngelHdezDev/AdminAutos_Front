@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/catalog.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- 1. Buscador Superior --}}
    @include('catalog.partials._search_bar')

    <div class="catalog-layout">
        {{-- 2. Sidebar con Partials --}}
        <aside class="sidebar" id="sidebar">
            @include('catalog.partials._filter_offers')
            @include('catalog.partials._filter_accordion')
        </aside>

        <main class="catalog-main">
            @include('catalog.partials._toolbar')

            {{-- 3. Grid usando el Componente --}}
            <div class="cars-grid sidebar-open" id="carsGrid">
                @foreach($autos as $auto)
                    <x-catalog.car-card :auto="$auto" />
                @endforeach
            </div>

            @include('catalog.partials._pagination')
        </main>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/catalog.js') }}"></script>
@endpush