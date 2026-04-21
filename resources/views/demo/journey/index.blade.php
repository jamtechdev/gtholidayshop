@extends('layouts.journey')

@section('title', 'Journey Start')
@section('journey_back_url', route('demo.login'))

@section('journey-content')
<main class="tdg_main-wrapper tdg-page-enter">
    <div class="tdg_inner-wrapper">
        <div class="tdg_gallery-box">
            <div class="tdg_gallery tdg-puzzle-gallery">
                <div class="tdg_gallery-item" style="--tdg-delay: 0;">
                    <img src="{{ asset('td-green/images/gallery-1.png') }}" alt="Gallery 1" />
                </div>
                <div class="tdg_gallery-item" style="--tdg-delay: 1;">
                    <img src="{{ asset('td-green/images/gallery-2.png') }}" alt="Gallery 2" />
                </div>
                <div class="tdg_gallery-item" style="--tdg-delay: 2;">
                    <img src="{{ asset('td-green/images/gallery-3.png') }}" alt="Gallery 3" />
                </div>
            </div>
            <p>
                Our employees are the driving force behind everything we achieve,
                bringing dedication, creativity, and resilience to their work every day.
                We appreciate your commitment not only to excellence, but to supporting
                each another and building a strong, positive workplace culture.
            </p>
            <a class="tdg-button tdg-puzzle-cta" href="{{ route('demo.gift.categories') }}">Continue</a>
        </div>
    </div>
</main>
@endsection
