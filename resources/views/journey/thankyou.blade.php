@extends('layouts.journey')

@section('title', 'Claimed')
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

  <!-- Bubbles -->
    <div class="bubbles">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

  <div class="thankyou-card">
        
        <div class="logo" style='margin-bottom:20px;'>
                    <img src="{{ asset('td-green/images/td-green.png') }}" alt="TD Green" />

        </div>

        <h1 class='tdg-status-title'>Thank You</h1>
        <!-- <hr> -->

        <!-- <div class="divider">
            <span></span>
            <p class="tdg-status-text">Welcome</p>
            <span></span>
        </div> -->

        <p class="tdg-status-text">
           For support, contact us at: 
           <br> <a href="" style='text-decoration:none;color:white;'>example@gmail.com</a> 
        </p>

        <a href="mailto:Mike.mikyska@thinkgraphtech.com" class="tdg-button tdg-puzzle-cta">
           Submit
        </a>

    </div>
</main>
@endsection
