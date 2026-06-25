@extends('admin.layout')
@section('title','Brosur')
@section('content')
<div class="mb-8">
    <p class="text-sm font-black uppercase tracking-[0.22em] text-red-700">Konten Program</p>
    <h1 class="mt-2 text-3xl font-black text-slate-950">Brosur Pelatihan</h1>
    <p class="mt-2 text-slate-600">Kelola program pelatihan, upload gambar, CTA, dan status tampil.</p>
</div>

<form method="POST" action="{{ route('admin.brochures.store') }}" enctype="multipart/form-data" class="grid gap-4 rounded-[1.7rem] bg-white p-6 shadow-xl shadow-slate-200/70 ring-1 ring-slate-200/70">
    @csrf
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div><p class="text-sm font-black uppercase tracking-[0.18em] text-red-700">Tambah Baru</p><h2 class="text-2xl font-black text-slate-950">Brosur</h2></div>
        <span class="rounded-full bg-red-50 px-4 py-2 text-xs font-black text-red-700">Upload aktif</span>
    </div>
    <div class="grid gap-4 lg:grid-cols-2">
        <input name="title" placeholder="Judul" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="cta_url" placeholder="URL CTA" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <textarea name="description" placeholder="Deskripsi singkat untuk kartu" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100 lg:col-span-2"></textarea>
        <textarea name="detail" rows="6" placeholder="Detail materi / rundown / benefit program" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100 lg:col-span-2"></textarea>
        <input name="duration" placeholder="Durasi, contoh: 2 hari" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="price" placeholder="Biaya, contoh: Hubungi admin" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="location" placeholder="Lokasi/Metode, contoh: Online / In-house" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="target_participants" placeholder="Sasaran peserta" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="image" type="file" accept="image/*" class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-sm">
        <input name="image_path" placeholder="URL gambar manual /storage/..." class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="cta_label" value="Daftar Pelatihan" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
        <input name="order" type="number" value="0" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500 focus:ring-4 focus:ring-red-100">
    </div>
    <label class="text-sm font-bold text-slate-600"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
    <button class="w-fit rounded-2xl bg-gradient-to-r from-red-600 to-orange-500 px-6 py-3 font-black text-white shadow-lg shadow-red-900/20 transition hover:-translate-y-1">Tambah Brosur</button>
</form>

<div class="mt-8 grid gap-5">
    @foreach($items as $item)
        <article class="overflow-hidden rounded-[1.7rem] bg-white shadow-xl shadow-slate-200/70 ring-1 ring-slate-200/70">
            <div class="grid gap-0 lg:grid-cols-[280px_1fr]">
                <div class="bg-slate-100 p-4">
                    @if($item->image_path)
                        <img src="{{ $item->image_path }}" alt="Preview {{ $item->title }}" class="aspect-[4/3] w-full rounded-2xl object-cover shadow-lg">
                    @else
                        <div class="grid aspect-[4/3] place-items-center rounded-2xl bg-white text-sm font-bold text-slate-400">Belum ada gambar</div>
                    @endif
                </div>
                <div class="p-6">
                    <form id="brochure-update-{{ $item->id }}" method="POST" action="{{ route('admin.brochures.update',$item) }}" enctype="multipart/form-data" class="grid gap-3">
                        @csrf
                        @method('PUT')
                        <input name="title" value="{{ $item->title }}" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                        <textarea name="description" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">{{ $item->description }}</textarea>
                        <textarea name="detail" rows="6" placeholder="Detail materi / rundown / benefit program" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">{{ $item->detail }}</textarea>
                        <div class="grid gap-3 sm:grid-cols-2">
                            <input name="duration" value="{{ $item->duration }}" placeholder="Durasi" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="price" value="{{ $item->price }}" placeholder="Biaya" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="location" value="{{ $item->location }}" placeholder="Lokasi/Metode" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="target_participants" value="{{ $item->target_participants }}" placeholder="Sasaran peserta" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="image" type="file" accept="image/*" class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-sm">
                            <input name="image_path" value="{{ $item->image_path }}" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="cta_url" value="{{ $item->cta_url }}" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="cta_label" value="{{ $item->cta_label }}" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <input name="order" type="number" value="{{ $item->order }}" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-red-500">
                            <label class="rounded-2xl bg-slate-50 p-3 text-sm font-bold text-slate-600"><input type="checkbox" name="is_active" value="1" @checked($item->is_active)> Aktif</label>
                        </div>
                    </form>
                    <div class="mt-4 flex gap-2">
                        @if($item->slug)
                            <a href="{{ route('training.show', $item) }}" target="_blank" class="rounded-2xl border border-slate-300 px-5 py-2 font-black text-slate-700">Preview Detail</a>
                        @endif
                        <button form="brochure-update-{{ $item->id }}" class="rounded-2xl bg-slate-950 px-5 py-2 font-black text-white">Simpan</button>
                        <form method="POST" action="{{ route('admin.brochures.destroy',$item) }}">
                            @csrf
                            @method('DELETE')
                            <button class="rounded-2xl border border-red-700 px-5 py-2 font-black text-red-700">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>
@endsection
