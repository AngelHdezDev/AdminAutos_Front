<div class="marcas-bar" id="marcasBar">
    @php
        $marcasBar = [
            ['name' => 'Toyota', 'logo' => 'https://logo.clearbit.com/toyota.com'],
            ['name' => 'Byd', 'logo' => 'https://logo.clearbit.com/byd.com'],
            ['name' => 'Honda', 'logo' => 'https://logo.clearbit.com/honda.com'],
            ['name' => 'Mazda', 'logo' => 'https://logo.clearbit.com/mazda.com'],
            ['name' => 'Nissan', 'logo' => 'https://logo.clearbit.com/nissan.com'],
            ['name' => 'Chevrolet', 'logo' => 'https://logo.clearbit.com/chevrolet.com'],
            ['name' => 'Kia', 'logo' => 'https://logo.clearbit.com/kia.com'],
            ['name' => 'Hyundai', 'logo' => 'https://logo.clearbit.com/hyundai.com'],
            ['name' => 'Seat', 'logo' => 'https://logo.clearbit.com/seat.com'],
            ['name' => 'Volkswagen', 'logo' => 'https://logo.clearbit.com/volkswagen.com'],
            ['name' => 'Chirey', 'logo' => 'https://logo.clearbit.com/chery.com'],
            ['name' => 'Land Rover', 'logo' => 'https://logo.clearbit.com/landrover.com'],
        ];
    @endphp
    @foreach($marcasBar as $m)
        <button class="marca-btn">
            <img src="{{ $m['logo'] }}" alt="{{ $m['name'] }}" onerror="this.style.display='none'" width="20" height="16">
            {{ $m['name'] }}
        </button>
    @endforeach
    <button class="marcas-more"><i class="bi bi-chevron-right"></i></button>
</div>