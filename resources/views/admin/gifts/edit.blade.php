@extends('layouts.admin')

@section('title', 'Edit Gift')
@section('page-title', 'Edit Gift')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.gifts.update', $gift) }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')
        <div class="admin-form-section">
            <p class="admin-form-section-title">Gift Details (Step-by-Step)</p>

            <div class="form-group">
                <label class="form-label">1) Select Category</label>
                <select name="category_id" class="form-input" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $gift->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">2) Gift Name</label>
                <input type="text" name="name" class="form-input" placeholder="Enter gift name" value="{{ old('name', $gift->name) }}" required>
                @error('name')
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">3) Gift Images</p>
            <div class="form-group">
            <label class="form-label">Current Images</label>
            @php
                $images = is_array($gift->image) ? $gift->image : (is_string($gift->image) && $gift->image ? [$gift->image] : []);
            @endphp
            @if(count($images) > 0)
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem;">
                    @foreach($images as $img)
                        <div style="position: relative; display: inline-block;" id="image-{{ $loop->index }}">
                            <img src="{{ asset('storage/' . $img) }}" alt="{{ $gift->name }}" style="width: 128px; height: 128px; object-fit: cover; border-radius: 8px; border: 1px solid #d1d5db;" id="img-{{ $loop->index }}">
                            <label for="remove-{{ $loop->index }}" style="position: absolute; top: -8px; right: -8px; background: #dc2626; color: white; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 14px; font-weight: bold; transition: opacity 0.2s;">
                                ×
                            </label>
                            <input type="checkbox" name="remove_images[]" value="{{ $img }}" id="remove-{{ $loop->index }}" style="display: none;" onchange="document.getElementById('img-{{ $loop->index }}').style.opacity = this.checked ? '0.5' : '1'; document.getElementById('image-{{ $loop->index }}').querySelector('label').style.opacity = this.checked ? '0.5' : '1';">
                        </div>
                    @endforeach
                </div>
                <p style="margin-top: 0.25rem; font-size: 0.75rem; color: #6b7280; margin-bottom: 0.5rem;">Click × on images to mark them for removal</p>
            @else
                <p style="margin-top: 0.25rem; font-size: 0.75rem; color: #6b7280; margin-bottom: 0.5rem;">No images currently</p>
            @endif
            
            <label class="form-label">Add New Images</label>
            <div id="gift-images-wrapper">
                <div class="gift-image-row" style="display:flex; gap:0.5rem; align-items:center; margin-bottom:0.5rem;">
                    <input type="file" name="images[]" class="form-input" accept="image/*">
                </div>
            </div>
            <button type="button" id="add-image-btn" class="admin-btn" style="margin-top:0.5rem;">+ Add More Image</button>
            <p class="form-hint" style="margin-top:0.5rem;">Use add more to upload multiple new images.</p>
            @error('images')
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            @error('images.*')
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">Live Preview Card</p>
            <div style="border:1px solid #e5e7eb;border-radius:12px;padding:1rem;background:#fff;">
                <p style="margin:0 0 .5rem 0;font-size:.75rem;color:#6b7280;text-transform:uppercase;letter-spacing:.06em;">Gift Name</p>
                <h3 id="gift-name-preview" style="margin:0 0 1rem 0;font-size:1.1rem;color:#111827;">{{ old('name', $gift->name) }}</h3>
                <div id="gift-image-preview-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(110px,1fr));gap:.6rem;">
                    @forelse($images as $img)
                        <div style="border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;">
                            <img src="{{ asset('storage/' . $img) }}" alt="{{ $gift->name }}" style="width:100%;height:90px;object-fit:cover;">
                            <div style="padding:.4rem;font-size:.7rem;color:#4b5563;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Current image</div>
                        </div>
                    @empty
                        <div style="border:1px dashed #d1d5db;border-radius:8px;padding:.8rem;text-align:center;color:#9ca3af;font-size:.85rem;">No image selected</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Update Gift</button>
        </div>
    </form>
</div>

<script>
(() => {
    const wrapper = document.getElementById('gift-images-wrapper');
    const addBtn = document.getElementById('add-image-btn');
    const nameInput = document.querySelector('input[name="name"]');
    const namePreview = document.getElementById('gift-name-preview');
    const imagePreviewGrid = document.getElementById('gift-image-preview-grid');

    addBtn.addEventListener('click', () => {
        const row = document.createElement('div');
        row.className = 'gift-image-row';
        row.style.display = 'flex';
        row.style.gap = '0.5rem';
        row.style.alignItems = 'center';
        row.style.marginBottom = '0.5rem';

        row.innerHTML = `
            <input type="file" name="images[]" class="form-input" accept="image/*">
            <button type="button" class="admin-btn remove-image-btn">Remove</button>
        `;

        wrapper.appendChild(row);
        updateImagePreview();
    });

    wrapper.addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-image-btn')) {
            event.target.closest('.gift-image-row')?.remove();
            updateImagePreview();
        }
    });

    wrapper.addEventListener('change', (event) => {
        if (event.target.type === 'file') {
            updateImagePreview();
        }
    });

    nameInput.addEventListener('input', () => {
        namePreview.textContent = nameInput.value.trim() || 'Enter gift name';
    });

    function updateImagePreview() {
        const fileInputs = Array.from(wrapper.querySelectorAll('input[type="file"]'));
        const files = fileInputs.flatMap((input) => Array.from(input.files || []));

        if (files.length === 0) {
            return;
        }

        imagePreviewGrid.innerHTML = '';
        files.forEach((file) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const card = document.createElement('div');
                card.style.border = '1px solid #e5e7eb';
                card.style.borderRadius = '8px';
                card.style.overflow = 'hidden';
                card.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}" style="width:100%;height:90px;object-fit:cover;">
                    <div style="padding:.4rem;font-size:.7rem;color:#4b5563;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${file.name}</div>
                `;
                imagePreviewGrid.appendChild(card);
            };
            reader.readAsDataURL(file);
        });
    }
})();
</script>
@endsection