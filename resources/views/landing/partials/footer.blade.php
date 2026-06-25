<footer class="bg-neutral-950 text-white">
    <div class="mx-auto max-w-7xl px-5 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_.7fr_.8fr_1fr]">
            <div>
                <a href="{{ route('home') }}#hero" class="inline-flex items-center">
                    @if(! empty($settings['logo']))
                        <img src="{{ $settings['logo'] }}" alt="{{ $settings['site_name'] ?? 'LPK Sekolah Koperasi' }}" class="h-14 w-auto rounded bg-white p-2">
                    @else
                        <span class="font-display text-2xl font-extrabold">{{ $settings['site_name'] ?? 'LPK Sekolah Koperasi' }}</span>
                    @endif
                </a>
                <p class="mt-5 max-w-md leading-7 text-white/65">{{ $settings['meta_description'] ?? 'Pusat pelatihan dan pendidikan bidang perkoperasian untuk membangun kompetensi dan menguatkan koperasi.' }}</p>
                <p class="mt-6 rounded-2xl bg-white/8 p-4 text-sm font-semibold text-white/75 ring-1 ring-white/10">Koperasi kuat, Indonesia hebat.</p>
            </div>

            <div>
                <h3 class="font-display text-lg font-extrabold">Navigasi</h3>
                <div class="mt-5 grid gap-3 text-sm font-semibold text-white/65">
                    <a class="transition hover:text-white" href="{{ route('home') }}#hero">Beranda</a>
                    @foreach ($navigation as $item)
                        <a class="transition hover:text-white" href="{{ route('home') }}#{{ $item['target'] }}">{{ $item['label'] }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="font-display text-lg font-extrabold">Program</h3>
                <div class="mt-5 grid gap-3 text-sm font-semibold text-white/65">
                    <span>Pendidikan</span>
                    <span>Pelatihan</span>
                    <span>Pengembangan SDM</span>
                    <span>Konsultasi & Pendampingan</span>
                    <span>Jaringan & Kolaborasi</span>
                </div>
            </div>

            <div>
                <h3 class="font-display text-lg font-extrabold">Kontak</h3>
                <div class="mt-5 space-y-3 text-sm leading-6 text-white/65">
                    <p>{{ $contact['address'] ?? 'Pusat Pelatihan & Pendidikan Bidang Perkoperasian' }}</p>
                    <p>{{ $contact['phone'] ?? '+62 812 3456 7890' }}</p>
                    <p>{{ $contact['email'] ?? 'halo@sekolahkoperasi.id' }}</p>
                </div>
                @if(! empty($contact['whatsapp_number']))
                    <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contact['whatsapp_number']) }}" target="_blank" rel="noopener" class="mt-6 inline-flex rounded-full bg-[#CC0000] px-5 py-3 text-sm font-extrabold text-white transition hover:bg-[#990000]">WhatsApp Kami</a>
                @endif
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-white/10 pt-6 text-sm text-white/50 md:flex-row md:items-center md:justify-between">
            <p>© {{ date('Y') }} {{ $settings['site_name'] ?? 'LPK Sekolah Koperasi' }}. All rights reserved.</p>
            <p>Pusat pelatihan & pendidikan bidang perkoperasian.</p>
        </div>
    </div>
</footer>
