@extends('admin.layout')
@section('title','Keunggulan')
@section('content')
<div class="mb-8">
    <p class="text-sm font-bold uppercase tracking-[0.18em] text-red-700">Konten</p>
    <h1 class="mt-2 text-3xl font-extrabold">Keunggulan</h1>
    <p class="mt-2 text-neutral-600">Kelola alasan utama kenapa lembaga memilih Skolah Koperasi.</p>
</div>

<form method="POST" action="{{ route('admin.benefits.store') }}" class="grid gap-4 rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
    @csrf
    <h2 class="font-bold">Tambah Keunggulan</h2>
    <input name="icon" placeholder="Icon / angka" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <input name="title" placeholder="Judul" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <textarea name="description" placeholder="Deskripsi" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700"></textarea>
    <input name="order" type="number" value="0" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <label class="text-sm font-semibold text-neutral-600"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
    <button class="w-fit rounded-full bg-red-700 px-6 py-3 font-bold text-white hover:bg-red-800">Tambah</button>
</form>

<div class="mt-8 grid gap-4">
    @foreach($items as $item)
        <article class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
            <form id="benefit-update-{{ $item->id }}" method="POST" action="{{ route('admin.benefits.update',$item) }}" class="grid gap-3">
                @csrf
                @method('PUT')
                <input name="icon" value="{{ $item->icon }}" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
                <input name="title" value="{{ $item->title }}" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
                <textarea name="description" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">{{ $item->description }}</textarea>
                <input name="order" type="number" value="{{ $item->order }}" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
                <label class="text-sm font-semibold text-neutral-600"><input type="checkbox" name="is_active" value="1" @checked($item->is_active)> Aktif</label>
            </form>
            <div class="mt-4 flex gap-2">
                <button form="benefit-update-{{ $item->id }}" class="rounded-full bg-neutral-900 px-5 py-2 font-bold text-white">Simpan</button>
                <form method="POST" action="{{ route('admin.benefits.destroy',$item) }}">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-full border border-red-700 px-5 py-2 font-bold text-red-700">Hapus</button>
                </form>
            </div>
        </article>
    @endforeach
</div>
@endsection
