@extends('layouts.journey')

@section('title', 'Claimed')
@section('journey_back_url', route('demo.gift.categories'))

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
    $displayImage = $category && $category->image ? asset('storage/' . $category->image) : asset('images/' . $giftImage);
@endphp

<main class="tdg_main-wrapper tdg-page-enter">
    <section class="tdg-status-shell">
    <div class="tdg-status-card">
        <div>
            <img src="{{ $displayImage }}" class="tdg-status-image" alt="{{ $displayCategoryName }}" />
        </div>
        <div>
            <p class="tdg-status-kicker">You have chosen {{ strtolower($displayCategoryName) }}.</p>
            <h2 class="tdg-status-title">Your gift is on the way to you.</h2>
            <p class="tdg-status-text">
                Graphtech is ready to help you drive efficiency, creativity, and measurable results in 2026.
                Let’s start the conversation - your next big initiative could be just one email/meeting away.
            </p>
            <div class="tdg-status-actions">
                <a href="mailto:Mike.mikyska@thinkgraphtech.com" class="tdg-chip-btn">Email Mike</a>
                <a href="mailto:Mike.mikyska@thinkgraphtech.com" class="tdg-chip-btn">Mike.mikyska@thinkgraphtech.com</a>
            </div>
        </div>
    </div>
    </section>
</main>
@endsection
