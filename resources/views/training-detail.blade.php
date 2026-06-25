<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteName = $settings['site_name'] ?? 'Skolah Koperasi';
        $title = $brochure->title.' | '.$siteName;
        $description = str($brochure->description)->limit(155);
        $image = $brochure->image_path ?: 'https://picsum.photos/seed/koperasi-detail/1200/800';
    @endphp
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ str_starts_with($image, 'http') ? $image : url($image) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family:'Inter',ui-sans-serif,system-ui,sans-serif; color:#171717; background:#fff; }
        h1,h2,h3,.font-display { font-family:'Plus Jakarta Sans',ui-sans-serif,system-ui,sans-serif; }
        .red-grid { background-image:linear-gradient(rgba(204,0,0,.08) 1px,transparent 1px),linear-gradient(90deg,rgba(204,0,0,.08) 1px,transparent 1px); background-size:34px 34px; }
    </style>
</head>
<body class="antialiased selection:bg-[#CC0000] selection:text-white">
    @include('landing.partials.navbar')

    <main class="pt-24">
        <section class="relative overflow-hidden bg-neutral-950 text-white">
            <div class="absolute inset-0 opacity-35"><img src="{{ $image }}" alt="{{ $brochure->title }}" class="h-full w-full object-cover"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-black via-black/80 to-[#650000]/80"></div>
            <div class="red-grid absolute inset-0 opacity-30"></div>
            <div class="relative mx-auto grid max-w-7xl gap-10 px-5 py-20 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8 lg:py-28 lg:items-center">
                <div>
                    <a href="{{ route('home') }}#brochures" class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-extrabold backdrop-blur transition hover:bg-white/20">← Kembali ke Program</a>
                    <p class="mt-8 text-sm font-black uppercase tracking-[0.24em] text-red-200">Detail Training</p>
                    <h1 class="mt-4 font-display text-4xl font-black tracking-[-0.04em] sm:text-6xl">{{ $brochure->title }}</h1>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-white/80">{{ $brochure->description }}</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ $brochure->cta_url }}" target="_blank" rel="noopener" class="rounded-full bg-[#CC0000] px-7 py-4 font-black text-white shadow-2xl shadow-red-950/40 transition hover:-translate-y-1 hover:bg-[#990000]">{{ $brochure->cta_label ?: 'Daftar Pelatihan' }}</a>
                        <a href="{{ route('home') }}#contact" class="rounded-full border border-white/25 px-7 py-4 font-black text-white transition hover:bg-white hover:text-neutral-950">Konsultasi Dulu</a>
                    </div>
                </div>
                <div class="rounded-[2rem] border border-white/10 bg-white/10 p-3 shadow-2xl shadow-black/30 backdrop-blur-xl">
                    <img src="{{ $image }}" alt="Preview {{ $brochure->title }}" class="aspect-[4/3] w-full rounded-[1.5rem] object-cover">
                </div>
            </div>
        </section>

        <section class="bg-[#F7F7F7] py-16">
            <div class="mx-auto grid max-w-7xl gap-8 px-5 sm:px-6 lg:grid-cols-[.8fr_1.2fr] lg:px-8">
                <aside class="grid gap-4 self-start rounded-[2rem] bg-white p-6 shadow-xl shadow-black/5 ring-1 ring-black/5">
                    @foreach ([['Durasi', $brochure->duration], ['Biaya', $brochure->price], ['Lokasi/Metode', $brochure->location], ['Sasaran Peserta', $brochure->target_participants]] as [$label, $value])
                        <div class="rounded-2xl bg-neutral-50 p-4">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#CC0000]">{{ $label }}</p>
                            <p class="mt-2 font-bold leading-7 text-neutral-800">{{ $value ?: 'Dapat disesuaikan' }}</p>
                        </div>
                    @endforeach
                </aside>

                <article class="rounded-[2rem] bg-white p-6 shadow-xl shadow-black/5 ring-1 ring-black/5 sm:p-10">
                    <p class="text-sm font-black uppercase tracking-[0.22em] text-[#CC0000]">Materi Program</p>
                    <h2 class="mt-3 font-display text-3xl font-black tracking-[-0.03em]">Apa yang akan dipelajari?</h2>
                    <div class="mt-6 whitespace-pre-line text-lg leading-8 text-neutral-700">{{ $brochure->detail ?: $brochure->description }}</div>
                </article>
            </div>
        </section>

        @if($relatedBrochures->isNotEmpty())
            <section class="bg-white py-16">
                <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
                    <h2 class="font-display text-3xl font-black tracking-[-0.03em]">Program lain yang relevan</h2>
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        @foreach($relatedBrochures as $item)
                            <a href="{{ route('training.show', $item) }}" class="group overflow-hidden rounded-[1.7rem] border border-neutral-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-2xl hover:shadow-black/10">
                                <img src="{{ $item->image_path ?: 'https://picsum.photos/seed/koperasi-brosur/900/680' }}" alt="{{ $item->title }}" class="h-44 w-full object-cover transition duration-500 group-hover:scale-105">
                                <div class="p-5">
                                    <h3 class="font-display text-lg font-black">{{ $item->title }}</h3>
                                    <p class="mt-2 line-clamp-2 text-sm leading-6 text-neutral-600">{{ $item->description }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>

    @include('landing.partials.footer')
</body>
</html>
