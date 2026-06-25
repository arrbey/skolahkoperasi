<section id="contact" class="section-pad bg-white">
    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-[2.25rem] bg-neutral-950 text-white shadow-2xl shadow-black/20">
            <div class="grid lg:grid-cols-[.9fr_1.1fr]">
                <div class="p-7 sm:p-10 lg:p-12">
                    <p class="text-sm font-extrabold uppercase tracking-[0.22em] text-red-300">Kontak</p>
                    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-[-0.03em] sm:text-5xl">Mari susun pelatihan koperasi untuk tim Anda.</h2>
                    <div class="mt-10 space-y-5 text-white/80">
                        <p><span class="font-bold text-white">Alamat:</span> {{ $contact['address'] ?? '-' }}</p>
                        <p><span class="font-bold text-white">Telepon:</span> {{ $contact['phone'] ?? '-' }}</p>
                        <p><span class="font-bold text-white">Email:</span> {{ $contact['email'] ?? '-' }}</p>
                    </div>
                    @if(! empty($contact['whatsapp_number']))
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contact['whatsapp_number']) }}" target="_blank" rel="noopener" class="mt-10 inline-flex rounded-full bg-[#CC0000] px-7 py-4 font-extrabold text-white transition hover:bg-red-700">Hubungi via WhatsApp</a>
                    @endif
                </div>
                <div class="min-h-[420px] bg-neutral-200">
                    @if(! empty($contact['maps_embed_url']))
                        <iframe src="{{ $contact['maps_embed_url'] }}" class="h-full min-h-[420px] w-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta lokasi Skolah Koperasi"></iframe>
                    @else
                        <div class="grid h-full min-h-[420px] place-items-center p-8 text-center text-neutral-600">Peta lokasi belum diatur.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
