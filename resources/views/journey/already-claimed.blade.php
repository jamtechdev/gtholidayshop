@extends('layouts.journey')

@section('title', 'Already Claimed')
@section('journey_back_url', route('user.gift.categories'))

@section('journey-content')
@php
    $categoryName = strtolower($category->name ?? '');
    $giftImage = 'gift1.png';
    if (strpos($categoryName, 'technology') !== false || strpos($categoryName, 'tech') !== false) {
        $giftImage = 'gift2.png';
    } elseif (strpos($categoryName, 'merchandise') !== false || strpos($categoryName, 'merch') !== false) {
        $giftImage = 'gift3.png';
    }
    $displayCategoryName = $category->name ?? 'your selected gift';
    $giftImages = is_array($gift?->image ?? null) ? $gift->image : (is_string($gift?->image ?? null) && $gift->image ? [$gift->image] : []);
    $displayImage = count($giftImages) > 0
        ? asset('storage/' . $giftImages[0])
        : ($category && $category->image ? asset('storage/' . $category->image) : asset('images/' . $giftImage));
    $displayGiftName = $gift->name ?? 'Gift';
@endphp

<main class="tdg_main-wrapper tdg-page-enter">
    <section class="tdg-status-shell">
    <div class="tdg-status-card">
        <div>
            <img src="{{ $displayImage }}" class="tdg-status-image" alt="{{ $displayCategoryName }}" />
        </div>
        <div>
            <p class="tdg-status-kicker">You have already claimed {{ strtolower($displayCategoryName) }}.</p>
            <h2 class="tdg-status-title">Gift Already Claimed</h2>
            <p class="tdg-status-text" style="margin-bottom: 10px;">
                <strong>Gift Label:</strong> {{ $displayCategoryName }}<br>
                <strong>Claimed Gift:</strong> {{ $displayGiftName }}
            </p>
            <p class="tdg-status-text">
                Our records show that you've already claimed your gift for this year.
            </p>
        </div>
    </div>
    </section>
</main>
@endsection
