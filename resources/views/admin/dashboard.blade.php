@extends('admin.layout')
@section('title', 'Dashboard Admin | '.$siteName)
@section('header')
    <h1 class="mt-1 text-2xl font-black tracking-tight text-slate-950">Dashboard</h1>
@endsection
@section('content')
<div class="space-y-8">
    <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
        <div class="grid gap-8 lg:grid-cols-[1.5fr_.9fr] lg:items-center">
            <div>
                <p class="text-sm font-black uppercase tracking-[0.24em] text-slate-400">Custom Admin CMS</p>
                <h2 class="mt-4 max-w-3xl text-4xl font-black leading-tight text-slate-950 lg:text-5xl">Kelola {{ $siteName }} dengan dashboard custom yang bersih.</h2>
                <p class="mt-4 max-w-2xl text-slate-500">Edit hero, upload gambar, atur brosur, QnA, kontak, dan pengaturan website dari satu panel sederhana.</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('admin.hero.edit') }}" class="rounded-2xl bg-slate-950 px-5 py-3 text-sm font-black text-white shadow-sm transition hover:bg-slate-800">Edit Hero</a>
                    <a href="{{ route('admin.brochures.index') }}" class="rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-black text-slate-700 transition hover:bg-slate-50">Kelola Brosur</a>
                </div>
            </div>
            <div class="rounded-[1.7rem] border border-slate-200 bg-slate-50 p-5">
                <p class="text-sm font-bold text-slate-500">Status CMS</p>
                <div class="mt-4 grid gap-3">
                    <div class="rounded-2xl bg-white p-4 ring-1 ring-slate-200"><p class="text-3xl font-black text-slate-950">{{ array_sum($stats) }}</p><p class="text-sm text-slate-500">Total entri konten</p></div>
                    <div class="rounded-2xl bg-white p-4 text-slate-700 ring-1 ring-slate-200"><p class="font-black">Upload gambar aktif</p><p class="mt-1 text-sm text-slate-500">Hero + brosur via storage public</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([['Keunggulan',$stats['keunggulan']],['Brosur',$stats['brosur']],['QnA',$stats['qna']],['Visi',$stats['visi']]] as $card)
            <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <p class="text-sm font-bold text-slate-500">{{ $card[0] }}</p>
                <p class="mt-3 text-4xl font-black text-slate-950">{{ $card[1] }}</p>
            </article>
        @endforeach
    </section>

    <section class="grid gap-6 lg:grid-cols-[1fr_.9fr]">
        <div class="rounded-[1.7rem] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-4">
                <div><p class="text-sm font-black uppercase tracking-[0.18em] text-slate-400">Navigasi Cepat</p><h3 class="mt-1 text-2xl font-black text-slate-950">Kelola Konten</h3></div>
                <span class="rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-xs font-black text-slate-600">{{ count($sections) }} Menu</span>
            </div>
            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                @foreach ($sections as $section)
                    <a href="{{ route($section['route']) }}" class="group rounded-3xl border border-slate-200 bg-white p-5 transition hover:-translate-y-0.5 hover:bg-slate-50 hover:shadow-sm">
                        <p class="font-black text-slate-950">{{ $section['label'] }}</p>
                        <p class="mt-1 text-sm text-slate-500">Edit konten section</p>
                        <span class="mt-4 inline-flex text-sm font-black text-slate-700">Buka →</span>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="rounded-[1.7rem] border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-2xl font-black text-slate-950">Statistik Konten</h3>
            <div class="mt-6 h-80"><canvas id="contentChart"></canvas></div>
        </div>
    </section>

    <section class="rounded-[1.7rem] border border-slate-200 bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-black text-slate-950">Ringkasan Data</h3>
        <div class="mt-5 grid gap-4 md:grid-cols-3">
            <div class="rounded-3xl bg-slate-50 p-5"><p class="text-sm font-bold text-slate-500">Hero</p><p class="mt-2 truncate font-black text-slate-950">{{ $latest['hero']->title ?? 'Belum diatur' }}</p></div>
            <div class="rounded-3xl bg-slate-50 p-5"><p class="text-sm font-bold text-slate-500">Site Name</p><p class="mt-2 font-black text-slate-950">{{ $latest['contact'] }}</p></div>
            <div class="rounded-3xl bg-slate-50 p-5 text-slate-700"><p class="font-black">Catatan produksi</p><p class="mt-1 text-sm text-slate-500">Ganti password admin default sebelum publikasi.</p></div>
        </div>
    </section>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('contentChart');
if (ctx) new Chart(ctx, { type: 'doughnut', data: { labels: ['Keunggulan','Brosur','QnA','Visi'], datasets: [{ data: [{{ $stats['keunggulan'] }}, {{ $stats['brosur'] }}, {{ $stats['qna'] }}, {{ $stats['visi'] }}], backgroundColor: ['#0f172a','#334155','#64748b','#cbd5e1'], borderWidth: 0 }] }, options: { cutout: '72%', maintainAspectRatio: false, plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, font: { weight: 'bold' } } } } } });
</script>
@endpush
@endsection
