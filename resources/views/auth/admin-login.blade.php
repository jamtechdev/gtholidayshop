@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<header class="tdg_header tdg_header--center tdg-login-logo-puzzle">
    <img src="{{ asset('td-green/images/td-green.png') }}" alt="TD Green" />
</header>
<main class="tdg_main-wrapper tdg-login-page">
    <div class="tdg_inner-wrapper">
        <div class="tdg_heading-section tdg-login-heading">
            <h1>ADMIN</h1>
            <p>Access</p>
        </div>
        <form method="POST" action="{{ route('admin.login.submit') }}" class="tdg-form tdg-login-form">
            @csrf
            <input type="email" name="email" placeholder="ADMIN LOGIN" value="{{ old('email') }}" required />
            <input type="password" name="password" placeholder="PASSWORD" autocomplete="off" required />
            <button class="tdg-button" type="submit">ENTER</button>
        </form>
    </div>
</main>
@endsection