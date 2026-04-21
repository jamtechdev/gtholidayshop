<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Holiday Gift App')</title>
    <link rel="stylesheet" href="{{ asset('td-green/style.css') }}">
    @stack('styles')
    @include('partials.toastr')
</head>
<body class="@yield('body_class', 'tdg_body')">
    @yield('content')
    @stack('scripts')
</body>
</html>
