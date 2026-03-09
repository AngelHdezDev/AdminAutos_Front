<div class="results-count">972 Resultados</div>

<div class="cars-grid sidebar-open" id="carsGrid">
    @php
        $autos = [
            ['name' => 'Audi Q5 2018', 'meta' => '5 PTS. DYNAMIC, 2.0T | 148,697 Km', 'price' => '$5,713', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$269,000 precio de liquidación', 'market' => 'Precio 23% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/audi.com', 'img' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Chirey ARRIZO 8 2024', 'meta' => '4 PTS. LUXURY, 1.6T | 0 Km', 'price' => '$12,104', 'currency' => 'MXN/mensuales*', 'contado' => 'Contado 569,900 MXN', 'market' => null, 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/chery.com', 'img' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e?w=600&h=380&fit=crop&q=75', 'badges' => ['nuevo', 'consignacion'], 'disp' => false],
            ['name' => 'Ford Explorer 2022', 'meta' => '5 PTS. ST, BI-TURBO | 110,481 Km', 'price' => '$12,955', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$610,000 precio de liquidación', 'market' => 'Precio 22% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/ford.com', 'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Volvo XC40 2024', 'meta' => '5 PTS. ULTIMATE, B4 | 20,615 Km', 'price' => '$16,234', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$764,400 precio de liquidación', 'market' => 'Precio 16% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/volvo.com', 'img' => 'https://images.unsplash.com/photo-1592586726924-c2e9a01d4d7e?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Honda CR-V 2021', 'meta' => '5 PTS. TOURING, 1.5T | 54,320 Km', 'price' => '$8,450', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$398,000 precio de liquidación', 'market' => 'Precio 15% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/honda.com', 'img' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Kia Sportage 2023', 'meta' => '5 PTS. EX, 2.0L | 18,450 Km', 'price' => '$10,870', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$512,000 precio de liquidación', 'market' => 'Precio 15% menor al mercado', 'location' => 'GDL - Lopez Mateos', 'brand_logo' => 'https://logo.clearbit.com/kia.com', 'img' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => true],
            ['name' => 'Nissan X-Trail 2022', 'meta' => '5 PTS. ADVANCE, 2.5L | 42,100 Km', 'price' => '$7,990', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$376,000 precio de liquidación', 'market' => 'Precio 14% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/nissan.com', 'img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Mazda CX-5 2023', 'meta' => '5 PTS. GRAND TOURING | 9,870 Km', 'price' => '$11,640', 'currency' => 'MXN/mensuales*', 'contado' => 'Contado 548,000 MXN', 'market' => null, 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/mazda.com', 'img' => 'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Toyota Highlander 2020', 'meta' => '5 PTS. XLE, 8 PAS. | 160,760 Km', 'price' => '$9,557', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$450,000 precio de liquidación', 'market' => 'Precio 13% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/toyota.com', 'img' => 'https://images.unsplash.com/photo-1564456895-0b85e7a6f6a4?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Ford Escape 2024', 'meta' => '5 PTS. ACTIVE, HEV | 27,664 Km', 'price' => '$9,982', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$470,000 precio de liquidación', 'market' => 'Precio 13% menor al mercado', 'location' => 'GDL - Lopez Mateos', 'brand_logo' => 'https://logo.clearbit.com/ford.com', 'img' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Suzuki ERTIGA 2023', 'meta' => '5 PTS. XL7, 1.5L | 99,557 Km', 'price' => '$6,371', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$300,000 precio de liquidación', 'market' => 'Precio 12% menor al mercado', 'location' => 'SLP - Toyota Lomas', 'brand_logo' => 'https://logo.clearbit.com/suzuki.com', 'img' => 'https://images.unsplash.com/photo-1605559424843-9873732e7a49?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
            ['name' => 'Honda Odyssey 2025', 'meta' => '5 PTS. BLACK EDITION | 11,348 Km', 'price' => '$19,964', 'currency' => 'MXN/mensuales*', 'liquidacion' => '$940,000 precio de liquidación', 'market' => 'Precio 10% menor al mercado', 'location' => 'SLP - Honda Carranza', 'brand_logo' => 'https://logo.clearbit.com/honda.com', 'img' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=600&h=380&fit=crop&q=75', 'badges' => [], 'disp' => false],
        ];
    @endphp

    @foreach($autos as $auto)
        <div class="car-card">
            <div class="car-card-img-wrap">
                <img src="{{ $auto['img'] }}" alt="{{ $auto['name'] }}" loading="lazy">
                @if(!empty($auto['badges']))
                    <div class="car-badges">
                        @if(in_array('nuevo', $auto['badges']))<span class="badge-nuevo"><i class="bi bi-plus"></i>
                        Nuevo 0km</span>@endif
                        @if(in_array('consignacion', $auto['badges']))<span class="badge-consignacion">En
                        consignación</span>@endif
                    </div>
                @endif
            </div>
            <div class="car-card-body">
                <div class="car-card-header">
                    <div class="car-card-title">{{ $auto['name'] }}</div>
                    <img src="{{ $auto['brand_logo'] }}" alt="" class="brand-logo" onerror="this.style.display='none'">
                </div>
                <div class="car-card-meta">{{ $auto['meta'] }}</div>
                <div class="car-price">{{ $auto['price'] }} <small>{{ $auto['currency'] }}</small></div>
                @if(!empty($auto['liquidacion']))<span class="badge-liquidacion">{{ $auto['liquidacion'] }}</span>@endif
                @if(!empty($auto['contado']))
                <div class="car-price-contado">{{ $auto['contado'] }}</div>@endif
                @if(!empty($auto['market']))
                <div class="car-market"><i class="bi bi-graph-down-arrow"></i> {{ $auto['market'] }}</div>@endif
                <div class="car-location">
                    <i class="bi bi-geo-alt"></i>
                    <span>{{ $auto['location'] }}</span>
                    @if($auto['disp'])<span class="disp-badge">DISP</span>@endif
                </div>
            </div>
        </div>
    @endforeach
</div>