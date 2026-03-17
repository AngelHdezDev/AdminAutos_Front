<div class="filter-accordion-body">
    <div class="year-grid">
        @php
            $years = range(date('Y') + 1, 2011);
            $selectedYears = request()->query('years', []);
            if (!is_array($selectedYears))
                $selectedYears = [$selectedYears];
        @endphp

        @foreach($years as $year)
            @php $isSelected = in_array($year, $selectedYears); @endphp

            <label class="year-pill {{ $isSelected ? 'active' : '' }}">
                <input type="checkbox" name="years[]" value="{{ $year }}" {{ $isSelected ? 'checked' : '' }}
                    onchange="this.form.submit()" style="display: none;">
                <span>{{ $year }}</span>
            </label>
        @endforeach
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/catalog/partials/filters/_accordion_years.css') }}">
@endpush