<header class="fixed inset-x-0 top-0 z-50 border-b border-black/5 bg-white/90 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-6 lg:px-8" aria-label="Navigasi utama">
        <a href="{{ route('home') }}#hero" class="flex items-center">
            @if(! empty($settings['logo']))
                <img src="{{ $settings['logo'] }}" alt="{{ $settings['site_name'] ?? 'LPK Sekolah Koperasi' }}" class="h-12 w-auto object-contain sm:h-14">
            @else
                <span class="font-display text-xl font-extrabold tracking-tight text-neutral-950">{{ $settings['site_name'] ?? 'LPK Sekolah Koperasi' }}</span>
            @endif
        </a>
        <div class="hidden items-center gap-7 text-sm font-semibold text-neutral-700 md:flex">
            @foreach ($navigation as $item)
                <a class="hover:text-[#CC0000]" href="{{ route('home') }}#{{ $item['target'] }}">{{ $item['label'] }}</a>
            @endforeach
        </div>
        <a href="{{ route('brochures') }}" class="rounded-full bg-[#CC0000] px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#990000]">Mulai</a>
    </nav>
</header>
