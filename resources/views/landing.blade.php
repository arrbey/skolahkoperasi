<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteName = $settings['site_name'] ?? 'Skolah Koperasi';
        $metaDescription = $settings['meta_description'] ?? 'LPK pelatihan koperasi untuk pengurus desa, anggota aktif, dan mitra komunitas di Indonesia.';
        $heroImage = $hero['image_path'] ?? config('company.hero.image_path');
    @endphp
    <title>{{ $siteName }} | Pelatihan & Pengembangan Koperasi</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $siteName }} | Pelatihan & Pengembangan Koperasi">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($heroImage)<meta property="og:image" content="{{ str_starts_with($heroImage, 'http') ? $heroImage : url($heroImage) }}">@endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root { --color-primary:#CC0000; --color-primary-dark:#990000; --space-section:clamp(4.5rem,8vw,7rem); --radius-card:1.75rem; }
        body { font-family:'Inter',ui-sans-serif,system-ui,sans-serif; color:#1A1A1A; background:#fff; }
        h1,h2,h3,.font-display { font-family:'Plus Jakarta Sans',ui-sans-serif,system-ui,sans-serif; }
        .section-pad { padding-top:var(--space-section); padding-bottom:var(--space-section); }
        .red-grid { background-image:linear-gradient(rgba(204,0,0,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(204,0,0,.06) 1px,transparent 1px); background-size:32px 32px; }
    </style>
</head>
<body class="antialiased selection:bg-[#CC0000] selection:text-white">
    @include('landing.partials.navbar')
    <main>
        @include('landing.partials.hero')
        @include('landing.partials.vision')
        @include('landing.partials.why')
        @include('landing.partials.brochures')
        @include('landing.partials.qna')
        @include('landing.partials.contact')
    </main>
    @include('landing.partials.footer')
</body>
</html>
