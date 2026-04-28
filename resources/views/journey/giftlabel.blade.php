@extends('layouts.journey')

@section('title', 'Gift Categories')
@section('journey_back_url', route('user.journey'))

@section('journey-content')
<main class="tdg_main-wrapper tdg-page-enter">
    <div class="tdg_inner-wrapper">
        <div class="tdg_heading-section tdg_grid-heading">
            <h1>EMPLOYEE</h1>
            <p>Appreciation</p>
        </div>

      
        <div class="tdg_icon-grid custom-card-grid">
    @forelse($categories->values() as $index => $category)
        <a href="{{ route('user.gifts.byCategory', $category) }}" class="custom-card  tdg-card-tag" >

            <div class="card-image bg-white tdg_icon-box " >
                @if(!empty($category->image))
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                @else
                    <img src="{{ asset('td-green/images/icon-1.png') }}" alt="{{ $category->name }}">
                @endif
            </div>

            <div class="card-content tdg_icon-item-content text-center" style='margin-top:20px;'>
                <p class=''>{{ strtoupper($category->name) }}</p>
            </div>

        </a>
    @empty
        <p class="tdg-empty">No categories available right now.</p>
    @endforelse
</div>
    </div>
</main>
@endsection
