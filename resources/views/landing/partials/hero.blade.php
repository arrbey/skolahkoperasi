<section id="hero" class="relative isolate min-h-screen overflow-hidden bg-neutral-950 pt-28 sm:pt-32">
    <img src="{{ $hero['image_path'] ?? 'https://picsum.photos/seed/koperasi-hero/1600/1000' }}" alt="Pelatihan koperasi berbasis komunitas" class="absolute inset-0 -z-20 h-full w-full object-cover">
    <div class="absolute inset-0 -z-10 bg-neutral-950/70"></div>
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-neutral-950/75 via-neutral-950/35 to-neutral-950/80"></div>

    <div class="mx-auto flex min-h-[calc(100vh-7rem)] max-w-7xl items-center px-5 pb-20 pt-10 sm:px-6 lg:px-8">
        <div class="max-w-4xl text-white">
            <p class="font-display text-sm font-extrabold uppercase tracking-[0.28em] text-red-200">Skolah Koperasi</p>
            <h1 class="mt-6 font-display text-4xl font-extrabold leading-[1.02] tracking-[-0.06em] sm:text-6xl lg:text-7xl">
                {{ $hero['headline'] ?? 'Bangun Koperasi Desa yang Tertib dan Tangguh' }}
            </h1>
            <p class="mt-7 max-w-2xl text-lg leading-8 text-white/80 sm:text-xl">
                {{ $hero['subheading'] ?? 'Pelatihan praktis untuk pengurus koperasi, komunitas, dan mitra daerah.' }}
            </p>
            <div class="mt-9 flex flex-col gap-4 sm:flex-row sm:items-center">
                <a href="{{ route('home') }}#{{ $hero['cta_target'] ?? 'brochures' }}" class="inline-flex justify-center rounded-full bg-[#CC0000] px-8 py-4 text-base font-extrabold text-white shadow-xl shadow-black/25 transition hover:-translate-y-0.5 hover:bg-[#990000]">{{ $hero['cta_label'] ?? 'Lihat Program' }}</a>
                <a href="{{ route('home') }}#contact" class="inline-flex justify-center rounded-full border border-white/35 bg-white/10 px-8 py-4 text-base font-extrabold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white hover:text-neutral-950">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>
