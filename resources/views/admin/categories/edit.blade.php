@extends('layouts.admin')

@section('title', 'Edit Gift Label')
@section('page-title', 'Edit Gift Label')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')
        <div class="admin-form-section">
            <p class="admin-form-section-title">Gift Label Details</p>
            <div class="form-group">
            <label class="form-label">Label Name</label>
            <input type="text" name="name" class="form-input" placeholder="Enter gift label name" value="{{ $category->name }}" required>
            </div>
        </div>

        <div class="admin-form-section">
            <div class="form-group">
            <label class="form-label">Label Icon / Image</label>
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="Current image" class="admin-form-preview">
            @endif
            <input type="file" name="image" class="form-input" accept="image/*">
            </div>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Update Gift Label</button>
        </div>
    </form>
</div>
@endsection