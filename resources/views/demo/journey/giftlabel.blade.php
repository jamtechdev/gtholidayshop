@extends('layouts.journey')

@section('title', 'Gift Categories')
@section('journey_back_url', route('demo.journey'))

@section('journey-content')
<style>
/* Gift categories (demo): readable text on green background */
.tdg-gift-categories .tdg_heading-section.tdg_grid-heading {
    max-width: 42rem;
    margin-left: auto;
    margin-right: auto;
    padding: 22px 18px;
    border-radius: 14px;
    background: rgba(0, 0, 0, 0.48);
    border: 1px solid rgba(255, 255, 255, 0.14);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35);
}
.tdg-gift-categories .tdg_heading-section.tdg_grid-heading h1 {
    color: #ffffff;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.95), 0 2px 14px rgba(0, 0, 0, 0.75);
}
.tdg-gift-categories .tdg_heading-section.tdg_grid-heading p {
    color: #f3f4f6;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.9);
}
.tdg-gift-categories .tdg_icon-item {
    background: rgba(0, 0, 0, 0.52);
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 16px;
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.35);
}
.tdg-gift-categories .tdg_icon-item:hover {
    border-color: rgba(255, 255, 255, 0.3) !important;
}
.tdg-gift-categories .tdg_icon-title {
    color: #ffffff;
    font-weight: 700;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.95), 0 2px 12px rgba(0, 0, 0, 0.55);
}
.tdg-gift-categories .tdg-empty {
    display: block;
    max-width: 36rem;
    margin: 24px auto 0;
    padding: 18px 22px;
    border-radius: 12px;
    background: rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #f9fafb;
    font-size: 1.125rem;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.85);
}
@media (max-width: 768px) {
    .tdg-gift-categories .tdg_heading-section.tdg_grid-heading {
        padding: 18px 14px;
    }
}
</style>
<main class="tdg_main-wrapper tdg-page-enter tdg-gift-categories">
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
