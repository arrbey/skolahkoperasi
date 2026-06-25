@extends('admin.layout')
@section('title','Pengaturan')
@section('content')
<div class="mb-8">
    <p class="text-sm font-black uppercase tracking-[0.22em] text-slate-400">Branding</p>
    <h1 class="mt-2 text-3xl font-black text-slate-950">Pengaturan Website</h1>
    <p class="mt-2 text-slate-600">Atur nama website, SEO, warna aksen, dan upload logo penuh untuk navbar/footer.</p>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="grid gap-6 rounded-[1.7rem] border border-slate-200 bg-white p-6 shadow-sm">
    @csrf @method('PUT')
    <div class="grid gap-6 lg:grid-cols-[1fr_.8fr]">
        <div class="grid gap-4">
            <input name="site_name" value="{{ old('site_name',$settings['site_name'] ?? '') }}" placeholder="Nama Website" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-slate-950">
            <textarea name="meta_description" rows="5" placeholder="Meta description" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-slate-950">{{ old('meta_description',$settings['meta_description'] ?? '') }}</textarea>
            <input name="accent_color" value="{{ old('accent_color',$settings['accent_color'] ?? '#CC0000') }}" placeholder="#CC0000" class="rounded-2xl border border-slate-200 p-3 outline-none focus:border-slate-950">
        </div>
        <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-5">
            <p class="font-black text-slate-950">Logo Website</p>
            <p class="mt-1 text-sm text-slate-500">Upload logo penuh transparan/PNG/SVG raster. Max 2MB.</p>
            @if(! empty($settings['logo']))
                <div class="mt-4 rounded-2xl bg-white p-4 ring-1 ring-slate-200"><img src="{{ $settings['logo'] }}" alt="Logo website" class="max-h-20 w-auto"></div>
            @else
                <div class="mt-4 grid h-24 place-items-center rounded-2xl bg-white text-sm font-bold text-slate-400 ring-1 ring-slate-200">Belum ada logo upload</div>
            @endif
            <input name="logo" type="file" accept="image/*" class="mt-4 w-full rounded-2xl border border-slate-200 bg-white p-3 text-sm">
        </div>
    </div>
    <button class="w-fit rounded-2xl bg-slate-950 px-6 py-3 font-black text-white transition hover:bg-slate-800">Simpan Pengaturan</button>
</form>
@endsection
