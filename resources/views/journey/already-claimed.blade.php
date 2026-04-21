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
    $displayImage = $category && $category->image ? asset('storage/' . $category->image) : asset('images/' . $giftImage);
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
            <p class="tdg-status-text">
                Our records show that you've already claimed your gift for this year.
                If this is unexpected or you have questions, please contact us at
                <a href="mailto:info@thinkgraphtech.com?subject=Gift Claim Inquiry&body=Hello,%0D%0A%0D%0AI have a question about my gift claim.">info@thinkgraphtech.com</a>.
            </p>
        </div>
    </div>
    </section>
</main>
@endsection
