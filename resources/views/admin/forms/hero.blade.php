@extends('admin.layout')
@section('title','Hero')
@section('content')
<div class="mb-8">
    <p class="text-sm font-black uppercase tracking-[0.22em] text-red-700">Landing Page</p>
    <h1 class="mt-2 text-3xl font-black text-slate-950">Hero Section</h1>
    <p class="mt-2 text-slate-600">Atur headline utama, CTA, dan upload gambar hero.</p>
</div>

<form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data" class="grid gap-6 rounded-[1.7rem] bg-white p-6 shadow-xl shadow-slate-200/70 ring-1 ring-slate-200/70">
    @csrf @method('PUT')
    <div class="grid gap-6 lg:grid-cols-[1fr_.8fr]">
        <div class="grid gap-4">
            <label class="grid gap-2 text-sm font-bold text-slate-700">Headline
                <input name="title" value="{{ old('title',$hero->title) }}" placeholder="Headline" class="rounded-2xl border border-slate-200 p-3 outline-none transition focus:border-red-500 focus:ring-4 focus:ring-red-100">
            </label>
            <label class="grid gap-2 text-sm font-bold text-slate-700">Subheading
                <textarea name="content" rows="5" placeholder="Subheading" class="rounded-2xl border border-slate-200 p-3 outline-none transition focus:border-red-500 focus:ring-4 focus:ring-red-100">{{ old('content',$hero->content) }}</textarea>
            </label>
            <div class="grid gap-4 sm:grid-cols-2">
                <label class="grid gap-2 text-sm font-bold text-slate-700">Label CTA
                    <input name="cta_label" value="{{ old('cta_label',$hero->cta_label) }}" placeholder="Label CTA" class="rounded-2xl border border-slate-200 p-3 outline-none transition focus:border-red-500 focus:ring-4 focus:ring-red-100">
                </label>
                <label class="grid gap-2 text-sm font-bold text-slate-700">URL CTA
                    <input name="cta_url" value="{{ old('cta_url',$hero->cta_url) }}" placeholder="#brochures / URL" class="rounded-2xl border border-slate-200 p-3 outline-none transition focus:border-red-500 focus:ring-4 focus:ring-red-100">
                </label>
            </div>
        </div>
        <div class="rounded-[1.5rem] border border-dashed border-red-200 bg-red-50/50 p-5">
            <p class="font-black text-slate-950">Gambar Hero</p>
            <p class="mt-1 text-sm text-slate-500">Upload JPG/PNG/WebP max 4MB, atau isi URL manual.</p>
            @if($hero->image_path)
                <img src="{{ $hero->image_path }}" alt="Preview gambar hero" class="mt-4 aspect-video w-full rounded-2xl object-cover shadow-lg">
            @else
                <div class="mt-4 grid aspect-video place-items-center rounded-2xl bg-white text-sm font-bold text-slate-400">Belum ada gambar</div>
            @endif
            <input name="image" type="file" accept="image/*" class="mt-4 w-full rounded-2xl border border-slate-200 bg-white p-3 text-sm">
            <input name="image_path" value="{{ old('image_path',$hero->image_path) }}" placeholder="URL gambar manual /storage/..." class="mt-3 w-full rounded-2xl border border-slate-200 p-3 text-sm outline-none focus:border-red-500">
        </div>
    </div>
    <button class="w-fit rounded-2xl bg-gradient-to-r from-red-600 to-orange-500 px-6 py-3 font-black text-white shadow-lg shadow-red-900/20 transition hover:-translate-y-1">Simpan Hero</button>
</form>
@endsection
