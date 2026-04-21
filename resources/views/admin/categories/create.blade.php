@extends('layouts.admin')

@section('title', 'Add Gift Label')
@section('page-title', 'Add Gift Label')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        <div class="admin-form-section">
            <p class="admin-form-section-title">Gift Label Details</p>
            <div class="form-group">
            <label class="form-label">Label Name</label>
            <input type="text" name="name" class="form-input" placeholder="Enter gift label name" required>
            </div>
        </div>

        <div class="admin-form-section">
            <div class="form-group">
            <label class="form-label">Label Icon / Image</label>
            <input type="file" name="image" class="form-input" accept="image/*">
            </div>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Create Gift Label</button>
        </div>
    </form>
</div>
@endsection