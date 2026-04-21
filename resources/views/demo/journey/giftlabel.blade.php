@extends('layouts.journey')

@section('title', 'Gift Categories')
@section('journey_back_url', route('demo.journey'))

@section('journey-content')
<main class="tdg_main-wrapper tdg-page-enter">
    <div class="tdg_inner-wrapper">
        <div class="tdg_heading-section tdg_grid-heading">
            <h1>EMPLOYEE</h1>
            <p>Appreciation</p>
        </div>
        <div class="tdg_icon-grid tdg-puzzle-grid">
            @php
                $iconMap = [
                    0 => 'icon-1.png',
                    1 => 'icon-2.png',
                    2 => 'icon-3.png',
                ];
            @endphp
            @forelse($categories->values() as $index => $category)
                <a href="{{ route('demo.gifts.byCategory', $category) }}" class="tdg_icon-item" style="--tdg-delay: {{ $index }};">
                    <div class="tdg_icon-box">
                        @if(!empty($category->image))
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" />
                        @else
                            <img src="{{ asset('td-green/images/' . $iconMap[$index % 3]) }}" alt="{{ $category->name }}" />
                        @endif
                    </div>
                    <p class="tdg_icon-title">{{ strtoupper($category->name) }}</p>
                </a>
            @empty
                <p class="tdg-empty">No categories available right now.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
