@extends('layouts.app')

@section('body_class', 'admin-body')

@push('styles')
@vite(['resources/css/app.css'])
<style>
.admin-body .admin-layout {
    background:
        radial-gradient(circle at 0 0, rgba(181, 255, 167, 0.28) 0, transparent 52%),
        radial-gradient(circle at 100% 0, rgba(116, 226, 95, 0.24) 0, transparent 52%),
        radial-gradient(circle at 0 100%, rgba(74, 193, 63, 0.2) 0, transparent 58%),
        radial-gradient(circle at 100% 100%, rgba(46, 138, 35, 0.18) 0, transparent 58%) !important;
    background-color: #a8b4cf !important;
}

.admin-body .sidebar {
    background: radial-gradient(circle at 0 0, rgba(9, 40, 18, 0.9) 0, rgba(7, 27, 13, 0.98) 55%, rgba(5, 22, 10, 1) 100%) !important;
}

.admin-body .sidebar-logo,
.admin-body .navbar-user-avatar {
    background: radial-gradient(circle at 30% 0, #62d84f 0, #3fb834 45%, #2a8e25 100%) !important;
    box-shadow: 0 12px 24px rgba(63, 184, 52, 0.5), 0 0 0 1px rgba(248, 250, 252, 0.35) !important;
}

.admin-body .nav-link.active,
.admin-body .logout-btn,
.admin-body .admin-btn,
.admin-body .admin-btn-sm {
    background: linear-gradient(120deg, #4bc13f, #2f8a2b) !important;
    box-shadow: 0 12px 24px rgba(63, 184, 52, 0.42), 0 0 0 1px rgba(248, 250, 252, 0.6) !important;
}

.admin-body .navbar {
    background: radial-gradient(circle at 0 0, rgba(185, 255, 172, 0.14) 0, transparent 55%),
        radial-gradient(circle at 100% 100%, rgba(6, 30, 12, 0.92) 0, rgba(7, 27, 13, 0.98) 42%, rgba(4, 20, 9, 1) 100%) !important;
}

.admin-body .card {
    background: radial-gradient(circle at 0 0, rgba(255, 255, 255, 0.95) 0, rgba(248, 252, 248, 0.98) 35%, rgba(228, 240, 228, 1) 100%) !important;
}

.admin-body .stats-grid {
    display: grid !important;
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 1rem !important;
    margin-top: 0.5rem !important;
}

.admin-body .stat-card {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 0.75rem !important;
    text-decoration: none !important;
    border-radius: 18px !important;
    padding: 1rem 1.1rem !important;
    background: radial-gradient(circle at 0 0, rgba(255, 255, 255, 0.95) 0, rgba(248, 252, 248, 0.98) 35%, rgba(228, 240, 228, 1) 100%) !important;
    border: 1px solid rgba(46, 138, 35, 0.25) !important;
    box-shadow: 0 12px 24px rgba(15, 23, 42, 0.14) !important;
}

.admin-body .stat-card-content {
    min-width: 0 !important;
}

.admin-body .stat-card-value {
    font-size: 2rem !important;
    font-weight: 800 !important;
    line-height: 1 !important;
    color: #14532d !important;
    margin: 0 0 0.35rem 0 !important;
}

.admin-body .stat-card-label {
    font-size: 0.78rem !important;
    text-transform: uppercase !important;
    letter-spacing: 0.08em !important;
    color: #3f3f46 !important;
    font-weight: 600 !important;
}

.admin-body .stat-card-icon {
    width: 44px !important;
    height: 44px !important;
    border-radius: 999px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    background: linear-gradient(120deg, #4bc13f, #2f8a2b) !important;
    box-shadow: 0 8px 18px rgba(63, 184, 52, 0.35) !important;
    font-size: 1.2rem !important;
}

@media (max-width: 1100px) {
    .admin-body .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }
}

@media (max-width: 640px) {
    .admin-body .stats-grid {
        grid-template-columns: 1fr !important;
    }
}

.admin-body .gift-grid {
    display: grid !important;
    gap: 1.1rem !important;
}

.admin-body .gift-grid.gift-grid-4 {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
}

.admin-body .gift-card {
    background: radial-gradient(circle at 0 0, rgba(255, 255, 255, 0.95) 0, rgba(248, 252, 248, 0.98) 35%, rgba(228, 240, 228, 1) 100%) !important;
    border-radius: 22px !important;
    border: 1px solid rgba(46, 138, 35, 0.2) !important;
    box-shadow: 0 12px 24px rgba(15, 23, 42, 0.14) !important;
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
}

.admin-body .gift-image {
    position: relative !important;
    width: 100% !important;
    aspect-ratio: 4 / 3 !important;
    min-height: 170px !important;
    max-height: 220px !important;
    background: linear-gradient(180deg, rgba(226, 232, 240, 0.75), rgba(203, 213, 225, 0.45)) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    overflow: hidden !important;
}

.admin-body .gift-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block !important;
}

.admin-body .gift-content {
    padding: 0.95rem 1rem 0.65rem !important;
}

.admin-body .gift-actions {
    padding: 0 1rem 1rem !important;
    display: flex !important;
    gap: 0.45rem !important;
    flex-wrap: wrap !important;
}

@media (max-width: 1200px) {
    .admin-body .gift-grid.gift-grid-4 {
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    }
}

@media (max-width: 900px) {
    .admin-body .gift-grid.gift-grid-4 {
        grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }
}

@media (max-width: 640px) {
    .admin-body .gift-grid.gift-grid-4 {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endpush

@section('content')
<div class="admin-layout">
    @include('partials.admin.sidebar')

    <main class="main-content">
        @include('partials.admin.navbar')
        @yield('admin-content')
    </main>
</div>
@endsection
