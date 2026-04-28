@extends('layouts.journey')

@section('title', 'Gifts')
@section('journey_back_url', route('user.gift.categories'))
@section('journey_hide_back', '0')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('journey-content')

<style>
.tdg-gift-shell {
    max-width: 1080px;
    margin: 0 auto 0;
    width: 100%;
}
.tdg-gift-copy {
    text-align: center;
    color: #dcd08f;
    text-shadow: 0 0 16px #000;
    margin-bottom: 26px;
}
.tdg-gift-copy h3 {
    font-size: 42px;
    margin-bottom: 8px;
}
.tdg-gift-copy p {
    font-size: 20px;
}
.tdg-selected-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 10px;
    padding: 8px 14px;
    border-radius: 999px;
    border: 1px solid rgba(220, 208, 143, 0.7);
    background: rgba(12, 12, 12, 0.28);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
}
.tdg-gift-grid {
    position: relative;
    padding: 0 44px 12px;
    max-width: 1140px;
    margin: 0 auto;
}
.tdg-gift-card {
    background: rgba(20, 20, 20, 0.35);
    border: 1px solid rgba(220, 208, 143, 0.45);
    border-radius: 16px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    height: 100%;
    min-height: 420px;
    max-width: 100%;
}
.tdg-gift-grid .swiper-slide {
    height: auto;
    display: flex;
}
.tdg-gift-grid .swiper-button-prev,
.tdg-gift-grid .swiper-button-next {
    color: #dcd08f;
    width: 34px;
    height: 34px;
    margin-top: -22px;
    border-radius: 999px;
    background: rgba(12, 12, 12, 0.45);
    border: 1px solid rgba(220, 208, 143, 0.6);
}
.tdg-gift-grid .swiper-button-prev::after,
.tdg-gift-grid .swiper-button-next::after {
    font-size: 13px;
    font-weight: 700;
}
.tdg-gift-grid .swiper-pagination {
    bottom: -2px !important;
}
.tdg-gift-grid .swiper-pagination-bullet {
    background: rgba(220, 208, 143, 0.45);
    opacity: 1;
}
.tdg-gift-grid .swiper-pagination-bullet-active {
    background: #dcd08f;
}
.tdg-gift-card img {
    width: 220px;
    height: 220px;
    object-fit: contain;
}
.tdg-gift-card h4 {
    color: #fff;
    margin: 10px 0;
    font-size: 22px;
}
.tdg-gift-price {
    color: #dcd08f;
    font-size: 34px;
    margin-bottom: 10px;
}
.claim-btn {
    border: 1px solid #dcd08f;
    padding: 10px 18px;
    border-radius: 30px;
    background: rgba(0, 0, 0, 0.2);
    color: #dcd08f;
    font-size: 18px;
    cursor: pointer;
}
.tdg-charity-wrap {
    margin-top: 26px;
    display: flex;
    justify-content: center;
}
.tdg-charity-wrap img {
    max-width: 140px;
}

.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(5px);
    align-items: center;
    justify-content: center;
}
.modal[style*="display: flex"],
.modal[style*="display: block"] {
    display: flex !important;
}
.modal-content {
    background: linear-gradient(145deg, #1b2f1f 0%, #101a12 100%);
    margin: auto;
    padding: 0;
    border: 2px solid rgba(255, 255, 255, 0.35);
    border-radius: 15px;
    width: 90%;
    max-width: 1000px;
    max-height: 95vh;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    animation: modalSlideIn 0.3s ease-out;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

/* Already Claimed Modal - Wider and Better UI */
#alreadyClaimedModal .modal-content {
    max-width: 800px;
    width: 95%;
    border: 3px solid #dcd08f;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.6), 0 0 30px rgba(220, 208, 143, 0.3);
    animation: modalSlideIn 0.4s ease-out;
}

#alreadyClaimedModal .modal-header {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    padding: 25px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

#alreadyClaimedModal .modal-header h2 {
    flex: 1;
    text-align: center;
    font-size: 28px;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

#alreadyClaimedModal .modal-header .close {
    transition: transform 0.3s ease, opacity 0.3s ease;
    cursor: pointer;
    line-height: 1;
    padding: 5px;
}

#alreadyClaimedModal .modal-header .close:hover {
    transform: rotate(90deg) scale(1.2);
    opacity: 0.8;
}

#alreadyClaimedModal .modal-body {
    padding: 50px 60px;
    background: linear-gradient(135deg, #2a2a2a 0%, #1f1f1f 100%);
    position: relative;
}

#alreadyClaimedModal .warning-icon-container {
    display: flex;
    align-items: flex-start;
    gap: 30px;
    margin-bottom: 30px;
    text-align: left;
}

#alreadyClaimedModal .warning-icon {
    font-size: 80px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.4));
    flex-shrink: 0;
    animation: pulse 2s ease-in-out infinite;
}

#alreadyClaimedModal .message-content {
    flex: 1;
}

#alreadyClaimedModal .message-content h3 {
    color: #ffffff;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

#alreadyClaimedModal .message-content p {
    color: #e0e0e0;
    line-height: 1.9;
    font-size: 17px;
    margin-bottom: 15px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

#alreadyClaimedModal .message-content a {
    color: #0a0c3f;
    font-weight: 700;
    text-decoration: none;
    background: linear-gradient(135deg, #dcd08f 0%, #f0e68c 100%);
    padding: 4px 12px;
    border-radius: 6px;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(220, 208, 143, 0.4);
}

#alreadyClaimedModal .message-content a:hover {
    background: linear-gradient(135deg, #f0e68c 0%, #dcd08f 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 208, 143, 0.6);
}

#alreadyClaimedModal .modal-actions {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid rgba(220, 208, 143, 0.2);
}

#alreadyClaimedModal .btn-ok {
    min-width: 180px;
    background: linear-gradient(135deg, #dcd08f 0%, #b8a85a 100%);
    color: #1a1a1a;
    font-weight: 700;
    font-size: 16px;
    padding: 14px 40px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(220, 208, 143, 0.4);
}

#alreadyClaimedModal .btn-ok:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(220, 208, 143, 0.6);
    background: linear-gradient(135deg, #e8dc9f 0%, #c4b87a 100%);
}

#alreadyClaimedModal .btn-ok:active {
    transform: translateY(-1px);
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@media (max-width: 768px) {
    #alreadyClaimedModal .modal-content {
        width: 98%;
        max-width: 100%;
    }

    #alreadyClaimedModal .modal-body {
        padding: 30px 25px;
    }

    #alreadyClaimedModal .warning-icon-container {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }

    #alreadyClaimedModal .warning-icon {
        font-size: 60px;
        margin: 0 auto;
    }
}
@keyframes modalSlideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
.modal-header {
    background: linear-gradient(135deg, #2f8a2b 0%, #246a22 100%);
    padding: 15px 30px;
    border-radius: 13px 13px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-shrink: 0;
}
.modal-header h2 {
    margin: 0;
    color: #ffffff;
    font-size: 24px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}
@media screen and (max-width: 667.99px) {
    .modal-header {
        padding: 12px 15px;
    }
    .modal-header h2 {
        font-size: 16px;
        letter-spacing: 0.5px;
    }
    .close {
        font-size: 24px;
    }
    .modal-content {
        width: 95%;
        max-height: 98vh;
    }
}
.close {
    color: #ffffff;
    font-size: 32px;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s;
    line-height: 1;
}
.close:hover,
.close:focus {
    transform: rotate(90deg);
    color: #d5ffd2;
}
.modal-body {
    padding: 30px;
    overflow-y: auto;
    flex: 1;
    max-height: calc(95vh - 80px);
}
@media screen and (max-width: 667.99px) {
    .modal-body {
        padding: 15px 12px;
        max-height: calc(95vh - 70px);
    }
}
.form-group {
    margin-bottom: 15px;
}
@media screen and (max-width: 667.99px) {
    .form-group {
        margin-bottom: 12px;
    }
}
.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #b9ef9f;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.form-group input,
.form-group select {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #444;
    border-radius: 8px;
    background-color: #1a1a1a;
    color: #fff;
    font-size: 16px;
    transition: all 0.3s;
    box-sizing: border-box;
}
@media screen and (max-width: 667.99px) {
    .form-group input,
    .form-group select {
        padding: 10px 12px;
        font-size: 16px;
    }
    .form-group label {
        font-size: 12px;
        margin-bottom: 6px;
    }
}
.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #6fd652;
    background-color: #182319;
    box-shadow: 0 0 10px rgba(111, 214, 82, 0.35);
}
.form-group input::placeholder {
    color: #666;
}
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

@media screen and (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr !important;
        gap: 12px;
    }
}

@media screen and (max-width: 480px) {
    .form-row {
        grid-template-columns: 1fr !important;
        gap: 10px;
    }
}
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    justify-content: flex-end;
}
@media screen and (max-width: 667.99px) {
    .form-actions {
        margin-top: 15px;
        gap: 10px;
    }
}
.btn {
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
}
@media screen and (max-width: 667.99px) {
    .form-actions {
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }
    .btn {
        width: 100%;
        padding: 12px 20px;
        font-size: 14px;
    }
}
.btn-primary {
    background: linear-gradient(135deg, #4bc13f 0%, #2f8a2b 100%);
    color: #ffffff;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(75, 193, 63, 0.45);
}
.btn-secondary {
    background: #2a2a2a;
    color: #fff;
}
.btn-secondary:hover {
    background: #3a3a3a;
    transform: translateY(-2px);
}
/* Swiper Styles */
.gift-swiper {
    width: 220px;
    height: 320px;
}
.gift-swiper .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
}
.gift-swiper .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: 50% 20%;
}
.gift-swiper .swiper-pagination {
    bottom: -30px;
}
.gift-swiper .swiper-pagination-bullet {
    background: #dcd08f;
    opacity: 0.5;
}
.gift-swiper .swiper-pagination-bullet-active {
    opacity: 1;
}
@media screen and (max-width: 768px) {
    .tdg-gift-copy h3 {
        font-size: 30px;
    }
    .tdg-gift-copy p {
        font-size: 17px;
    }
    .gift-swiper,
    .tdg-gift-card img {
        width: 170px;
        height: 170px;
    }
    .tdg-gift-card {
        min-height: 360px;
    }
    .tdg-gift-grid {
        padding: 0 8px 12px;
    }
    .tdg-gift-grid .swiper-button-prev,
    .tdg-gift-grid .swiper-button-next {
        display: none;
    }
}

@media screen and (min-width: 1024px) {
    .tdg-gift-grid .swiper-wrapper {
        align-items: stretch;
    }
    .tdg-gift-grid .swiper-slide {
        width: calc((100% - 32px) / 3) !important;
    }
}
</style>

<main class="tdg_main-wrapper tdg-page-enter">
    <div class="tdg_inner-wrapper">
    <div class="tdg-gift-shell">

        @php
            // Determine which images to use based on category name
            $categoryName = strtolower($category->name ?? '');
            $chooseImage = 'choose.png'; // default
            $giftImage = 'gift1.png'; // default
            $giftBoxImage = 'giftbox.png'; // default
            $categoryType = 'default';
            $categoryMeta = [
                'title' => 'Choose Your Perfect Gift',
                'subtitle' => 'Pick your favorite item and continue to claim it.',
                'claimLabel' => 'Claim Gift',
                'modalTitle' => 'Claim Your Gift',
            ];

            if (strpos($categoryName, 'technology') !== false || strpos($categoryName, 'tech') !== false) {
                $categoryType = 'technology';
                $chooseImage = 'techno.png';
                $giftImage = 'gift2.png';
                $giftBoxImage = 'headphone.png';
                $categoryMeta = [
                    'title' => 'Technology Collection',
                    'subtitle' => 'Smart picks for productivity, comfort, and everyday performance.',
                    'claimLabel' => 'Claim Tech Gift',
                    'modalTitle' => 'Claim Technology Gift',
                ];
            } elseif (strpos($categoryName, 'merchandise') !== false || strpos($categoryName, 'merch') !== false) {
                $categoryType = 'merchandise';
                $chooseImage = 'chooseMerge.png';
                $giftImage = 'gift3.png';
                $giftBoxImage = 'giftbox.png';
                $categoryMeta = [
                    'title' => 'Apparel Collection',
                    'subtitle' => 'Signature branded items selected for style and daily use.',
                    'claimLabel' => 'Claim Apparel Gift',
                    'modalTitle' => 'Claim Apparel Gift',
                ];
            } else {
                // Donation or default
                $chooseImage = 'choose.png';
                $giftImage = 'gift1.png';
                $giftBoxImage = 'giftbox.png';
                if (strpos($categoryName, 'donation') !== false || strpos($categoryName, 'home') !== false) {
                    $categoryType = 'donation';
                    $categoryMeta = [
                        'title' => 'Home & Donation Collection',
                        'subtitle' => 'Choose a meaningful gift or support a cause through your selection.',
                        'claimLabel' => 'Claim Home Gift',
                        'modalTitle' => 'Claim Home / Donation Gift',
                    ];
                }
            }
        @endphp
        <div class="tdg-gift-copy">
            <h3>{{ $categoryMeta['title'] }}</h3>
            <p>{{ $categoryMeta['subtitle'] }}</p>
            <div class="tdg-selected-label">
                <span>Selected Label:</span>
                <span>{{ strtoupper($category->name ?? 'N/A') }}</span>
            </div>
        </div>

        @if(isset($gifts) && $gifts->count() > 0)
            <div class="tdg-gift-grid swiper" id="tdgGiftRowSwiper">
                <div class="swiper-wrapper">
                @foreach($gifts as $gift)
                    @php
                        $images = is_array($gift->image) ? $gift->image : (is_string($gift->image) && $gift->image ? [$gift->image] : []);
                        $imageCount = count($images);
                    @endphp
                    <div class="tdg-gift-card swiper-slide">
                        @if($imageCount > 0)
                            @if($imageCount > 1)
                                <div class="swiper gift-swiper">
    <div class="swiper-wrapper">
        @foreach($images as $img)
            <div class="swiper-slide">
                <div class="gift-card">
                    <img src="{{ asset('storage/'.$img) }}" alt="{{ $gift->name }}">
                </div>
            </div>
        @endforeach
    </div>

    <div class="swiper-pagination"></div>
</div>
                            @else
                                <img src="{{ asset('storage/'.$images[0]) }}" alt="{{ $gift->name }}"/>
                            @endif
                        @else
                            <img src="{{ asset('images/'.$giftBoxImage) }}" alt="{{ $gift->name }}"/>
                        @endif
                        <h4>{{ $gift->name }}</h4>
                        @if (strtolower($category->name ?? '') === 'donation')
                            <div class="tdg-gift-price"><sup>$</sup>20</div>
                        @endif
                        <button class="claim-btn" type="button" onclick="openModal({{ $category->id }}, '{{ strtolower($category->name) }}', {{ $gift->id }}, @js($gift->name), @js($imageCount > 0 ? asset('storage/'.$images[0]) : asset('images/'.$giftBoxImage)))">{{ $categoryMeta['claimLabel'] }}</button>
                    </div>
                @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        @else
            <div class="tdg-gift-grid">
                <div class="tdg-gift-card">
                    <img src="{{ asset('images/giftbox.png') }}" alt="Gift" />
                    <h4>Gift</h4>
                    <button class="claim-btn" type="button" onclick="openModal({{ $category->id }}, '{{ strtolower($category->name) }}', null, 'Gift', @js(asset('images/giftbox.png')))">{{ $categoryMeta['claimLabel'] }}</button>
                </div>
            </div>
        @endif

        @if (strtolower($category->name ?? '') === 'donation')
            <div class="tdg-charity-wrap">
                <a href="https://www.wildheartministries.net/" target="_blank" title="Visit Wild Heart Ministries">
                    <img src="{{ asset('images/location.png') }}" alt="Wild Heart Ministries" />
                </a>
            </div>
        @endif
    </div>
    </div>
</main>

<!-- Error Modal for Already Claimed -->
<div id="alreadyClaimedModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Already Claimed</h2>
            <span class="close" onclick="closeAlreadyClaimedModal()" style="color: white; font-size: 32px; font-weight: bold; cursor: pointer; transition: transform 0.2s;">&times;</span>
        </div>
        <div class="modal-body">
            <div class="warning-icon-container">
                <div class="warning-icon">⚠️</div>
                <div class="message-content">
                    <h3>Gift Already Claimed</h3>
                    <p>
                        Our records show that you've already claimed your gift for this year.
                    </p>
                    <p>
                        If this is unexpected or you have questions, please contact us at
                        <a href="mailto:info@thinkgraphtech.com">info@thinkgraphtech.com</a>
                        so we can assist you.
                    </p>
                </div>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-ok" onclick="closeAlreadyClaimedModal()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="giftDetailsModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modal-title">Add Gift Details</h2>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form id="giftDetailsForm" method="POST">
                @csrf
                <input type="hidden" name="category_id" id="category_id" value="">
                <input type="hidden" name="redirect_to" value="{{ (isset($demoMode) && $demoMode) ? route('demo.claimed') : route('user.video.categories', ['next' => route('user.thankyou'), 'mode' => 'post']) }}">
                <input type="hidden" name="gift_id" id="gift_id" value="">

                <div id="selectedGiftPreview" style="display:none; margin-bottom: 14px; padding: 12px; border: 1px solid rgba(220,208,143,.35); border-radius: 10px; background: rgba(20,20,20,.35);">
                    <div style="display:flex; align-items:center; gap: 12px;">
                        <img id="selectedGiftImage" src="" alt="Selected gift" style="width:72px; height:72px; object-fit:contain; border-radius: 6px; background: rgba(255,255,255,.06);">
                        <div>
                            <div style="color:#dcd08f; font-size:12px; text-transform: uppercase;">Selected Gift</div>
                            <div id="selectedGiftName" style="color:#fff; font-weight:700;"></div>
                        </div>
                    </div>
                </div>

                <!-- First Name and Last Name in one row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">First Name *</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name *</label>
                        <input type="text" id="lastname" name="lastname" required placeholder="Enter your last name">
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder="your@email.com" value="{{ old('email', optional(auth()->user())->email) }}">
                </div>

                <!-- Street Address #1 -->
                <div class="form-group">
                    <label for="street_address">Street Address #1 *</label>
                    <input type="text" id="street_address" name="street_address" required placeholder="Enter street address">
                </div>

                <!-- Street Address #2 -->
                <div class="form-group">
                    <label for="street_address2">Street Address #2</label>
                    <input type="text" id="street_address2" name="street_address2" placeholder="Enter street address (optional)">
                </div>

                <!-- Country and State in one row -->
                <div class="form-row">

                    <div class="form-group">
                        <label for="city">City *</label>
                        <input type="text" id="city" name="city" required placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="state">State *</label>
                        <input type="text" id="state" name="state" required maxlength="2" placeholder="XX" pattern="[A-Z]{2}" style="text-transform: uppercase;">
                    </div>
                </div>

                <!-- City and Postal Code in one row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="zip">Postal Code *</label>
                        <input type="text" id="zip" name="zip" required maxlength="5" placeholder="12345" pattern="[0-9]{5}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="Country">
                    </div>

                </div>

                <!-- Phone Number and Company in one row -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="telephone">Phone Number *</label>
                        <input type="tel" id="telephone" name="telephone" required autocomplete="tel" placeholder="Enter phone number">
                        <input type="hidden" id="country_code" name="country_code" value="">
                    </div>
                    <div class="form-group">
                        <label for="company">Company (Optional)</label>
                        <input type="text" id="company" name="company" placeholder="Enter company name">
                    </div>
                </div>

                <!-- Hidden field for charity selection - default wildheart for donation category -->
                <input type="hidden" id="charity_selection" name="charity_selection" value="">

                <div class="form-actions">
                    @if(isset($demoMode) && $demoMode)
                        <div style="text-align: center; padding: 20px 0;">
                            <p style="color: #dcd08f; font-size: 16px; line-height: 1.6; margin: 0;">
                                For more information about this holiday gifting experience, contact us at <a href="mailto:info@thinkgraphtech.com" style="color: #dcd08f; text-decoration: underline; font-weight: 600;">info@thinkgraphtech.com</a>.
                            </p>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="closeModal()" style="width: 100%;">Close</button>
                    @else
                        <button type="submit" class="btn btn-primary">Submit & Continue</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Check if user has already claimed for this category
const hasClaimed = @json($hasClaimed ?? false);
const demoMode = @json($demoMode ?? false);
const categoryModalTitle = @json($categoryMeta['modalTitle']);
const loggedInEmail = @json(old('email', optional(auth()->user())->email));

// Function to show gift info in demo mode (view only, no claim)
function showGiftInfo(giftId, giftName) {
    if (demoMode) {
        // Open modal but show contact message instead of form
        const modal = document.getElementById('giftDetailsModal');
        const modalBody = modal.querySelector('.modal-body');
        const form = modal.querySelector('#giftDetailsForm');
        const modalTitle = document.getElementById('modal-title');
        
        // Update modal title
        if (modalTitle) {
            modalTitle.textContent = giftName || 'Gift Information';
        }
        
        // Hide the form and show contact message
        if (form) form.style.display = 'none';
        
        // Create or show contact message
        let contactMsg = modal.querySelector('.demo-contact-message');
        if (!contactMsg) {
            contactMsg = document.createElement('div');
            contactMsg.className = 'demo-contact-message';
            contactMsg.style.cssText = 'text-align: center; padding: 40px 20px;';
            modalBody.appendChild(contactMsg);
        }
        
        contactMsg.innerHTML = `
            <h3 style="color: #dcd08f; margin-bottom: 20px; font-size: 24px;">${giftName || 'Gift'}</h3>
            <p style="color: #dcd08f; font-size: 18px; line-height: 1.8; margin-bottom: 30px;">
                For more information about this holiday gifting experience, contact us at 
                <a href="mailto:info@thinkgraphtech.com" style="color: #dcd08f; text-decoration: underline; font-weight: 600;">info@thinkgraphtech.com</a>.
            </p>
            <button type="button" class="btn btn-secondary" onclick="closeModal()" style="width: 200px; margin: 0 auto;">Close</button>
        `;
        contactMsg.style.display = 'block';
        
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        return;
    }
    openModal(giftId, '');
}

function showGiftInfoDemo() {
    showGiftInfo(null, 'Gift');
}

function openModal(categoryId, categoryName = '', giftId = null, giftName = '', giftImage = '') {
    // In demo mode, show gift info instead
    if (demoMode) {
        showGiftInfoDemo();
        return;
    }
    
    if (hasClaimed) {
        toastr.error('Our records show that you\'ve already claimed your gift for this year. If this is unexpected or you have questions, please contact us at info@thinkgraphtech.com so we can assist you.', 'Already Claimed', {
            timeOut: 8000,
            progressBar: true
        });
        return;
    }
    
    // Hide demo contact message if it exists
    const contactMsg = document.querySelector('.demo-contact-message');
    if (contactMsg) contactMsg.style.display = 'none';
    
    // Show the form
    const form = document.getElementById('giftDetailsForm');
    if (form) form.style.display = 'block';

    // Keep user email prefilled unless user already typed something different
    const emailInput = document.getElementById('email');
    if (emailInput && loggedInEmail && !emailInput.value) {
        emailInput.value = loggedInEmail;
    }
    
    // Reset modal title
    const modalTitle = document.getElementById('modal-title');
    if (modalTitle) {
        modalTitle.textContent = categoryModalTitle || 'Add Gift Details';
    }

    document.getElementById('category_id').value = categoryId;
    const giftIdInput = document.getElementById('gift_id');
    if (giftIdInput) {
        giftIdInput.value = giftId || '';
    }

    // Keep selected gift in browser state through submit flow
    if (giftId || giftName || giftImage) {
        sessionStorage.setItem('selectedGift', JSON.stringify({
            id: giftId,
            name: giftName,
            image: giftImage
        }));
    }

    const selectedGiftPreview = document.getElementById('selectedGiftPreview');
    const selectedGiftName = document.getElementById('selectedGiftName');
    const selectedGiftImage = document.getElementById('selectedGiftImage');
    if (selectedGiftPreview && selectedGiftName && selectedGiftImage) {
        const selected = JSON.parse(sessionStorage.getItem('selectedGift') || '{}');
        if (selected.name || selected.image) {
            selectedGiftName.textContent = selected.name || 'Gift';
            selectedGiftImage.src = selected.image || '';
            selectedGiftPreview.style.display = 'block';
        } else {
            selectedGiftPreview.style.display = 'none';
        }
    }

    // Set default charity to wildheart for donation category (hidden)
    const charitySelectionField = document.getElementById('charity_selection');
    if (categoryName && categoryName.toLowerCase() === 'donation') {
        charitySelectionField.value = 'wildheart';
    } else {
        charitySelectionField.value = '';
    }

    const modal = document.getElementById('giftDetailsModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('giftDetailsModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
    
    // Hide demo contact message and show form again
    const contactMsg = modal.querySelector('.demo-contact-message');
    if (contactMsg) contactMsg.style.display = 'none';
    const form = modal.querySelector('#giftDetailsForm');
    if (form) form.style.display = 'block';
}

function closeModalWithConfirm() {
    alert('Please fill out the form to continue to the next page. All fields are required.');
}

// Auto-uppercase for state field
document.getElementById('state').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});

// Handle form submission with AJAX
document.getElementById('giftDetailsForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Prevent submission in demo mode
    if (demoMode) {
        alert('For more information about this holiday gifting experience, contact us at info@thinkgraphtech.com.');
        return;
    }

    const form = this;
    const formData = new FormData(form);

    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;

    // Disable submit button
    submitBtn.disabled = true;
    submitBtn.textContent = 'Submitting...';

    const submitRoute = demoMode ? '{{ route("demo.gift-request.store") }}' : '{{ route("user.gift-request.store") }}';
    fetch(submitRoute, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json().catch(() => ({ success: true }));
        }
        return response.json().then(err => Promise.reject(err));
    })
    .then(data => {
        // Submit success: jump to post-submit video immediately
        document.getElementById('giftDetailsModal').style.display = 'none';
        document.body.style.overflow = 'auto';
        const redirectTo = form.querySelector('input[name="redirect_to"]').value;
        window.location.href = redirectTo;
    })
    .catch(error => {
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;

        // Check if it's an already claimed error
        if (error.error === 'already_claimed' || (error.message && error.message.includes('already claimed'))) {
            // Close form modal
            document.getElementById('giftDetailsModal').style.display = 'none';
            document.body.style.overflow = 'auto';

            // Show error in toastr
            const errorMessage = error.message || 'Our records show that you\'ve already claimed your gift for this year. If this is unexpected or you have questions, please contact us at info@thinkgraphtech.com so we can assist you.';
            toastr.error(errorMessage);
            return;
        }

        // Show error message in toastr
        let errorMessage = 'Please fill all required fields correctly.';
        if (error.errors) {
            const firstError = Object.values(error.errors)[0];
            errorMessage = Array.isArray(firstError) ? firstError[0] : firstError;
        } else if (error.message) {
            errorMessage = error.message;
        }

        toastr.error(errorMessage);
    });
});

</script>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
// Initialize Swiper for gift images after library loads
document.addEventListener('DOMContentLoaded', function() {
    // Wait for Swiper to be available
    if (typeof Swiper !== 'undefined') {
        initializeSwipers();
    } else {
        // Retry if Swiper isn't loaded yet
        setTimeout(function() {
            if (typeof Swiper !== 'undefined') {
                initializeSwipers();
            }
        }, 100);
    }

    function initializeSwipers() {
        const swipers = document.querySelectorAll('.gift-swiper');
        swipers.forEach(function(swiperEl) {
            const slideCount = swiperEl.querySelectorAll('.swiper-slide').length;
            new Swiper(swiperEl, {
                slidesPerView: 3,
                spaceBetween: 10,
                pagination: {
                    el: swiperEl.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                autoplay: slideCount > 1 ? {
                    delay: 3000,
                    disableOnInteraction: false,
                } : false,
                loop: slideCount > 1,
            });
        });
    }

    // Main gift cards slider: show 3 cards per view on desktop
    const giftRowSwiperEl = document.getElementById('tdgGiftRowSwiper');
    if (giftRowSwiperEl && typeof Swiper !== 'undefined') {
        new Swiper(giftRowSwiperEl, {
            loop: true,
            speed: 800,
            spaceBetween: 16,
            autoplay: {
                delay: 2600,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: giftRowSwiperEl.querySelector('.swiper-button-next'),
                prevEl: giftRowSwiperEl.querySelector('.swiper-button-prev'),
            },
            pagination: {
                el: giftRowSwiperEl.querySelector('.swiper-pagination'),
                clickable: true,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }
});
</script>
@endpush
@endsection
