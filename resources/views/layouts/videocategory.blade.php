@extends('layouts.journey')

@section('title', 'Video Categories')
@section('journey_back_url', route('user.journey'))

@section('journey-content')
@php
    $isPostVideo = (($mode ?? 'intro') === 'post');
@endphp

@include('partials.video-loader', [
    'id' => $isPostVideo ? 'postGiftVideoLoader' : 'introVideoLoader',
    'src' => asset('images/firework.mp4'),
    'nextUrl' => $nextUrl ?? route('user.gift.categories'),
    'autoRedirectMs' => 7000,
    'title' => $isPostVideo ? 'Thank You! Your Gift Claim Was Submitted' : 'Welcome',
    'subtitle' => $isPostVideo ? 'Please wait, we are taking you to your claim status.' : 'Get ready to choose your gift.',
    'showButtons' => true,
])
@endsection
