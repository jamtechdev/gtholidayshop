@extends('layouts.admin')

@section('title', 'Add Gift')
@section('page-title', 'Add Gift')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.gifts.store') }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        <div class="admin-form-section">
            <p class="admin-form-section-title">Gift Details (Category + Multiple Gifts)</p>

            <div class="form-group">
                <label class="form-label">1) Select Category</label>
                <select name="category_id" class="form-input" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $selectedCategoryId ?? null) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">2) Add Gifts (Name + Image)</p>
            <div id="gift-cards-wrapper"></div>
            <button type="button" id="add-gift-card-btn" class="admin-btn gift-add-btn" style="margin-top:0.75rem;">
                <span aria-hidden="true">➕</span>
                <span>Add More Gift</span>
            </button>

            @error('gifts')
                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            @error('gifts.*.name')
                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            @error('gifts.*.images')
                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
            @error('gifts.*.images.*')
                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Create Gift</button>
        </div>
    </form>
</div>

<script>
(() => {
    const cardsWrapper = document.getElementById('gift-cards-wrapper');
    const addCardBtn = document.getElementById('add-gift-card-btn');
    let giftIndex = 0;

    function makeGiftCard(index) {
        const card = document.createElement('div');
        card.className = 'gift-input-card';
        card.dataset.index = String(index);
        card.style.border = '1px solid #e5e7eb';
        card.style.borderRadius = '10px';
        card.style.padding = '0.75rem';
        card.style.marginBottom = '0.75rem';
        card.style.background = '#fff';
        card.innerHTML = `
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.6rem;">
                <strong>Gift ${index + 1}</strong>
                <button type="button" class="remove-gift-btn icon-remove-btn" title="Remove gift">
                    <span aria-hidden="true">🗑️</span>
                </button>
            </div>
            <div class="form-group">
                <label class="form-label">Gift Name</label>
                <input type="text" name="gifts[${index}][name]" class="form-input js-gift-name" placeholder="Enter gift name" required>
            </div>
            <div class="form-group" style="margin-top:.6rem;">
                <label class="form-label">Gift Image(s)</label>
                <input type="file" name="gifts[${index}][images][]" class="form-input js-gift-images" accept="image/*" multiple required>
                <p class="form-hint">Each gift can have one or more images.</p>
            </div>
        `;
        return card;
    }

    function addGiftCard() {
        const card = makeGiftCard(giftIndex++);
        cardsWrapper.appendChild(card);
    }

    addCardBtn.addEventListener('click', addGiftCard);

    cardsWrapper.addEventListener('click', (event) => {
        const removeBtn = event.target.closest('.remove-gift-btn');
        if (!removeBtn) return;
        removeBtn.closest('.gift-input-card')?.remove();
    });

    addGiftCard();
})();
</script>
<style>
.gift-add-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
}

.icon-remove-btn {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    border: none;
    background: #dc2626;
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 8px 16px rgba(220, 38, 38, 0.25);
    transition: transform 0.2s ease, background 0.2s ease;
}

.icon-remove-btn:hover {
    background: #b91c1c;
    transform: translateY(-1px);
}
</style>
@endsection