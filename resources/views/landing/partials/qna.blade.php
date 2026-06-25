<section id="qna" class="section-pad bg-[#F5F5F5]" x-data="{ open: 0 }">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-6 lg:grid-cols-[.7fr_1.3fr] lg:px-8">
        <div class="lg:sticky lg:top-28 lg:self-start">
            <p class="text-sm font-extrabold uppercase tracking-[0.22em] text-[#CC0000]">QnA</p>
            <h2 class="mt-4 font-display text-3xl font-extrabold tracking-[-0.03em] sm:text-5xl">Pertanyaan umum sebelum ikut pelatihan.</h2>
            <img src="{{ $qnaImage }}" alt="Diskusi koperasi" class="mt-8 hidden rounded-[2rem] object-cover shadow-xl shadow-black/10 lg:block">
        </div>
        <div class="space-y-4">
            @foreach ($qnas as $index => $qna)
                <div class="rounded-[1.5rem] bg-white shadow-sm ring-1 ring-black/5">
                    <button type="button" class="flex w-full items-center justify-between gap-6 p-6 text-left" @click="open = open === {{ $index }} ? null : {{ $index }}" :aria-expanded="open === {{ $index }}">
                        <span class="font-display text-lg font-extrabold tracking-[-0.02em]">{{ $qna['question'] }}</span>
                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#CC0000] text-xl font-bold text-white" x-text="open === {{ $index }} ? '-' : '+'"></span>
                    </button>
                    <div x-show="open === {{ $index }}" x-transition class="px-6 pb-6 text-neutral-600"><p class="leading-7">{{ $qna['answer'] }}</p></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
