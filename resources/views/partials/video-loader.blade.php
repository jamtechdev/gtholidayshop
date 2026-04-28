@php
    $loaderId = $id ?? 'videoLoader';
    $loaderVideoId = $loaderId . 'Video';
    $loaderSrc = $src ?? asset('images/firework.mp4');
    $loaderNextUrl = $nextUrl ?? null;
    $loaderAutoRedirectMs = (int) ($autoRedirectMs ?? 5000);
    $loaderTitle = $title ?? 'Please wait...';
    $loaderSubtitle = $subtitle ?? '';
    $loaderShowButtons = (bool) ($showButtons ?? true);
@endphp

<div class="video-loader-shell" id="{{ $loaderId }}">
    <div class="video-loader-overlay"></div>
    <div class="video-loader-frame">
        <video
            id="{{ $loaderVideoId }}"
            class="video-loader-player"
            autoplay
            muted
            playsinline
            preload="auto"
            controlslist="nodownload noplaybackrate noremoteplayback"
            disablepictureinpicture
            oncontextmenu="return false;"
        >
            <source src="{{ $loaderSrc }}" type="video/mp4">
        </video>
    </div>

    <div class="video-loader-content">
        <h2>{{ $loaderTitle }}</h2>
        @if($loaderSubtitle)
            <p>{{ $loaderSubtitle }}</p>
        @endif

        @if($loaderShowButtons && $loaderNextUrl)
            <div class="video-loader-actions">
                <a class="video-loader-btn primary" href="{{ $loaderNextUrl }}">Continue</a>
                <a class="video-loader-btn secondary" href="{{ $loaderNextUrl }}">Skip</a>
            </div>
        @endif
    </div>
</div>

@once
<style>
.video-loader-shell {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #000;
    overflow: hidden;
}

.video-loader-player {
    width: 100%;
    height: 100%;
    object-fit: cover;
    background: #000;
}

.video-loader-frame {
    position: absolute;
    inset: 0;
    width: 100vw;
    height: 100vh;
    border-radius: 0;
    border: 2px solid rgba(220, 208, 143, 0.55);
    box-shadow:
        0 0 0 1px rgba(255, 255, 255, 0.2) inset,
        0 20px 60px rgba(0, 0, 0, 0.55),
        0 0 0 1px rgba(255, 255, 255, 0.2) inset;
    overflow: hidden;
    background: #000;
}

.video-loader-frame::before {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 0;
    z-index: 3;
}

.video-loader-player {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    background: #000;
}

.video-loader-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0, 0, 0, .25), rgba(0, 0, 0, .62));
    z-index: 1;
}

.video-loader-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: #fff;
    padding: 20px;
    width: min(1180px, 92vw);
}

.video-loader-content h2 {
    margin: 0;
    font-size: clamp(24px, 3.1vw, 42px);
    text-shadow: 0 8px 22px rgba(0, 0, 0, .35);
}

.video-loader-content p {
    margin: 10px 0 0;
    font-size: clamp(14px, 1.4vw, 20px);
    color: #dcd08f;
}

.video-loader-actions {
    margin-top: 18px;
    display: flex;
    gap: 10px;
    justify-content: center;
}

.video-loader-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 700;
    padding: 10px 18px;
}

.video-loader-btn.primary {
    background: #dcd08f;
    color: #151515;
}

.video-loader-btn.secondary {
    border: 1px solid rgba(255,255,255,.65);
    background: rgba(0, 0, 0, .35);
    color: #fff;
}
</style>
@endonce

@if($loaderNextUrl)
<script>
(() => {
    const root = document.getElementById(@json($loaderId));
    if (!root) return;

    const video = document.getElementById(@json($loaderVideoId));
    if (video) {
        video.removeAttribute('controls');
        video.play().catch(() => {});
    }

    window.setTimeout(() => {
        window.location.href = @json($loaderNextUrl);
    }, {{ $loaderAutoRedirectMs }});
})();
</script>
@endif

