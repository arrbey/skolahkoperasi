<section id="brochures" class="section-pad bg-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[.8fr_1.2fr] lg:items-end">
            <div><p class="text-sm font-extrabold uppercase tracking-[0.22em] text-[#CC0000]">Brosur pelatihan</p><h2 class="mt-4 font-display text-3xl font-extrabold tracking-[-0.03em] sm:text-5xl">Pilih program sesuai kebutuhan lembaga.</h2></div>
            <p class="text-lg leading-8 text-neutral-600">Geser kartu untuk melihat program pendidikan, pelatihan, pengembangan SDM, dan pendampingan koperasi.</p>
        </div>

        <div class="relative mt-12">
            <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-10 bg-gradient-to-r from-white to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-10 bg-gradient-to-l from-white to-transparent"></div>
            <div class="flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth pb-6 [scrollbar-width:thin]">
                @forelse ($brochures as $brochure)
                    @php($image = $brochure['image_path'] ?? 'https://picsum.photos/seed/koperasi-brosur/900/680')
                    <article class="group flex w-[82vw] shrink-0 snap-start flex-col overflow-hidden rounded-[2rem] border border-neutral-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-2xl hover:shadow-black/10 sm:w-[420px] lg:w-[390px]">
                        <img src="{{ $image }}" alt="Brosur {{ $brochure['title'] ?? 'Pelatihan koperasi' }}" class="h-60 w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                        <div class="flex flex-1 flex-col p-6">
                            <h3 class="font-display text-xl font-extrabold tracking-[-0.02em]">{{ $brochure['title'] ?? 'Program Pelatihan' }}</h3>
                            <p class="mt-3 flex-1 leading-7 text-neutral-600">{{ $brochure['description'] ?? 'Program pelatihan koperasi yang dapat disesuaikan dengan kebutuhan lembaga.' }}</p>
                            <a href="{{ $brochure['cta_url'] ?? 'https://skolah.com/daftar' }}" target="_blank" rel="noopener" class="mt-6 inline-flex w-full justify-center rounded-full bg-[#CC0000] px-5 py-3 font-extrabold text-white transition hover:bg-[#990000]">{{ $brochure['cta_label'] ?? 'Daftar Pelatihan' }}</a>
                        </div>
                    </article>
                @empty
                    <div class="w-full rounded-[2rem] border border-dashed border-neutral-300 bg-[#F5F5F5] p-8 text-neutral-600">Belum ada brosur aktif. Silakan tambah melalui admin CMS.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
