@extends('layouts.admin')

@section('title', 'Add Gift')
@section('page-title', 'Add Gift')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.gifts.store') }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        <div class="admin-form-section">
            <p class="admin-form-section-title">Gift Details</p>
            <div class="admin-form-grid admin-form-grid-2">
                <div class="form-group">
                    <label class="form-label">Gift Label</label>
                    <select name="category_id" class="form-input" required>
                        <option value="">Select Gift Label</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Gift Name</label>
                    <input type="text" name="name" class="form-input" placeholder="Enter gift name" value="{{ old('name') }}" required>
                    @error('name')
                        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">Images</p>
            <div class="form-group">
            <label class="form-label">Gift Images</label>
            <input type="file" name="images[]" class="form-input" accept="image/*" multiple required>
            <p class="form-hint">You can select multiple images. They will be displayed in a swiper on the frontend.</p>
            @error('images')
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            @error('images.*')
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Create Gift</button>
        </div>
    </form>
</div>
@endsection