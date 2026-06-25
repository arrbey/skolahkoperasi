<section id="why" class="section-pad bg-[#F5F5F5]">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="mb-12 flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
            <div class="max-w-2xl"><p class="text-sm font-extrabold uppercase tracking-[0.22em] text-[#CC0000]">Kenapa kami</p><h2 class="mt-4 font-display text-3xl font-extrabold tracking-[-0.03em] sm:text-5xl">Kuat di kelas, berguna di lapangan.</h2></div>
            <p class="max-w-md text-base leading-7 text-neutral-600">Setiap sesi dirancang agar peserta pulang dengan alur kerja, contoh dokumen, dan keputusan yang lebih rapi.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ($benefits as $benefit)
                <article class="group flex min-h-[260px] flex-col rounded-[var(--radius-card)] bg-white p-6 shadow-sm ring-1 ring-black/5 transition hover:-translate-y-1 hover:shadow-xl hover:shadow-black/10">
                    <div class="flex items-center justify-between">
                        <span class="grid h-14 w-14 place-items-center rounded-2xl bg-[#CC0000]/8 text-3xl">{{ $benefit['icon'] }}</span>
                        <span class="h-9 w-9 rounded-full border border-[#CC0000]/20 transition group-hover:bg-[#CC0000]"></span>
                    </div>
                    <div class="mt-8">
                        <h3 class="font-display text-xl font-extrabold tracking-[-0.02em]">{{ $benefit['title'] }}</h3>
                        <p class="mt-3 leading-7 text-neutral-600">{{ $benefit['description'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
