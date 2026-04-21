@extends('layouts.app')

@section('content')
    @php
        $isDemoJourney = request()->is('2025season/*');
        $logoutRoute = $isDemoJourney ? route('demo.logout') : route('user.logout');
        $backUrl = trim($__env->yieldContent('journey_back_url'));
        $hideBack = trim($__env->yieldContent('journey_hide_back')) === '1';
        $forceShowBack = request()->routeIs('user.gifts.byCategory', 'demo.gifts.byCategory');
        if ($forceShowBack) {
            $hideBack = false;
        }
        if ($backUrl === '') {
            $backUrl = url()->previous();
        }
    @endphp

    <header class="tdg_header">
        @if(!$hideBack)
            <a href="{{ $backUrl }}" class="tdg-page-back tdg-page-back-header">Back</a>
        @else
            <span></span>
        @endif
        <img src="{{ asset('td-green/images/td-green.png') }}" alt="TD Green" />
        <form method="POST" action="{{ $logoutRoute }}" class="tdg-logout-form">
            @csrf
            <button type="submit" class="tdg-logout-btn" aria-label="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                </svg>
            </button>
        </form>
    </header>

    @yield('journey-content')
@endsection
