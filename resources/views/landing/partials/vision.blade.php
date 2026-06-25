<section id="vision" class="section-pad bg-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.75fr_1.25fr]">
            <div><p class="text-sm font-extrabold uppercase tracking-[0.22em] text-[#CC0000]">Visi dan Misi</p><h2 class="mt-4 font-display text-3xl font-extrabold tracking-[-0.03em] text-neutral-950 sm:text-5xl">Belajar koperasi dengan arah yang jelas.</h2></div>
            <div class="rounded-[2rem] bg-[#F5F5F5] p-6 sm:p-8 lg:p-10">
                <p class="text-xl font-semibold leading-9 text-neutral-900">{{ $vision }}</p>
                <div class="mt-8 grid gap-4">
                    @foreach ($missions as $mission)
                        <div class="flex gap-4 rounded-2xl bg-white p-5 shadow-sm"><span class="mt-1 h-3 w-3 shrink-0 rounded-full bg-[#CC0000]"></span><p class="leading-7 text-neutral-700">{{ $mission }}</p></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
