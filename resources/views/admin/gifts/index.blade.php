@extends('layouts.admin')

@section('title', 'Gifts')
@section('page-title', 'Gifts')

@section('admin-content')
<div class="card admin-user-toolbar compact-toolbar">
    <div>
        <h3 class="section-title">All Gifts</h3>
        <p class="admin-list-text section-subtitle">Select Gift Label first, then view/manage gifts.</p>
    </div>
    <div class="toolbar-actions">
        @if($selectedCategoryId)
            <a href="{{ route('admin.gifts.create', ['category_id' => $selectedCategoryId]) }}" class="admin-btn">Add Gift</a>
        @else
            <a href="{{ route('admin.gifts.create') }}" class="admin-btn">Add Gift</a>
        @endif
    </div>
</div>

@if(session('status'))
<div style="margin-bottom: 1.5rem; padding: 1rem; background: #d1fae5; color: #065f46; border-radius: 12px; border: 1px solid #a7f3d0;">
    {{ session('status') }}
</div>
@endif

<div class="card labels-card">
    <h3 class="section-title">Gift Labels</h3>
    <div class="label-grid">
        @foreach($categories as $category)
            <div class="label-card {{ (int)$selectedCategoryId === (int)$category->id ? 'is-active' : '' }}">
                <div class="label-card-title">{{ $category->name }}</div>
                <div class="label-card-count">{{ $category->gifts_count }} gifts</div>
                <a class="admin-btn-sm" href="{{ route('admin.gifts.index', ['category_id' => $category->id]) }}">View Gifts</a>
            </div>
        @endforeach
    </div>
</div>

@if($selectedCategoryId)
<div class="gift-grid-wrapper">
    <div class="gift-grid gift-grid-4 compact-gift-grid">
        @forelse($gifts as $gift)
            @php
                $images = is_array($gift->image) ? $gift->image : (is_string($gift->image) && $gift->image ? [$gift->image] : []);
            @endphp
            <div class="gift-card compact-gift-card">
                <div class="gift-image compact-gift-image">
                    @if(count($images) > 0)
                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $gift->name }}">
                    @else
                        <div class="gift-no-image">🎁</div>
                    @endif
                </div>
                <div class="gift-content">
                    <div class="gift-title">{{ $gift->name }}</div>
                    <div class="gift-category">
                        <span class="category-badge">{{ $gift->category->name }}</span>
                    </div>
                    @if(count($images) > 1)
                    <div class="thumb-grid">
                        @foreach(array_slice($images, 0, 8) as $img)
                            <img src="{{ asset('storage/' . $img) }}" alt="{{ $gift->name }}" class="thumb-item">
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="gift-actions">
                    <a href="{{ route('admin.gifts.edit', $gift) }}" class="admin-btn-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.gifts.destroy', $gift) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-btn-sm admin-btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="card" style="padding:1rem;">
                <p style="margin:0; color:#6b7280;">No gifts found in this category.</p>
            </div>
        @endforelse
    </div>

    @include('partials.admin.pagination', [
    'paginator' => $gifts,
    'itemLabel' => 'gifts'
    ])
</div>
@else
<div class="card empty-state">
    <div class="empty-icon">🧩</div>
    <h4>Select a Gift Label</h4>
    <p>Click <strong>View Gifts</strong> on any Gift Label card to manage gifts.</p>
</div>
@endif

<style>
.compact-toolbar {
    margin-bottom: 1rem;
}

.section-title {
    margin-bottom: 0.2rem;
}

.section-subtitle {
    margin: 0;
}

.labels-card {
    margin-bottom: 1rem;
}

.label-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
    gap: 0.7rem;
}

.label-card {
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 0.65rem;
    background: #fff;
}

.label-card.is-active {
    background: #ecfdf3;
    border-color: #86efac;
}

.label-card-title {
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.2rem;
    font-size: 0.95rem;
}

.label-card-count {
    font-size: 0.78rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.compact-gift-grid {
    margin-bottom: 1.25rem;
}

.compact-gift-card {
    border-radius: 14px !important;
    padding: 0.75rem !important;
}

.compact-gift-image {
    max-height: 150px !important;
    padding: 6px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.compact-gift-image img {
    max-width: 72% !important;
    max-height: 72% !important;
    object-fit: contain !important;
}

.thumb-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 5px;
    margin-top: 0.45rem;
}

.thumb-item {
    width: 100%;
    height: 42px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #e5e7eb;
}

.empty-state {
    text-align: center;
    padding: 3rem 1.25rem;
}

.empty-state .empty-icon {
    font-size: 2.5rem;
    margin-bottom: 0.65rem;
    opacity: 0.35;
}

.empty-state h4 {
    color: #374151;
    margin-bottom: 0.35rem;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 0;
}
</style>
@endsection