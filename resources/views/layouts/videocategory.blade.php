@extends('layouts.journey')

@section('title', 'Video Categories')
@section('journey_back_url', route('user.journey'))

@section('journey-content')
<main class="tdg_main-wrapper tdg-page-enter">
    <div class="tdg_inner-wrapper">

        <!-- <div class="tdg_heading-section tdg_grid-heading">
            <h1>EMPLOYEE</h1>
            <p>Appreciation</p>
        </div> -->

        <div class="video-fullscreen-wrapper">
    <!-- <iframe 
        class="fullscreen-video"
        src="https://www.youtube.com/embed/KwvyfS9Icyc?autoplay=1&mute=1&loop=1&playlist=KwvyfS9Icyc&controls=0&modestbranding=1&rel=0"
        frameborder="0"
        allow="autoplay; fullscreen"
        allowfullscreen>
    </iframe> -->
<video controls autoplay muted loop playsinline class="fullscreen-video">
    <source src="{{ asset('images/firework.mp4') }}" type="video/mp4">
</video>
</div>
            <a class="tdg-button tdg-puzzle-cta" href="{{ route('user.gift.categories') }}">Continue</a>

    </div>
    
</main>
@endsection
