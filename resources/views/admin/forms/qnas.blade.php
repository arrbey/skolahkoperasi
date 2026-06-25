@extends('admin.layout')
@section('title','QnA')
@section('content')
<div class="mb-8">
    <p class="text-sm font-bold uppercase tracking-[0.18em] text-red-700">Konten</p>
    <h1 class="mt-2 text-3xl font-extrabold">QnA</h1>
    <p class="mt-2 text-neutral-600">Kelola pertanyaan umum yang tampil di halaman publik.</p>
</div>

<form method="POST" action="{{ route('admin.qna-image.update') }}" enctype="multipart/form-data" class="mb-8 grid gap-4 rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
    @csrf
    @method('PUT')
    <h2 class="font-bold">Gambar QnA</h2>
    <p class="text-sm text-neutral-600">Ganti gambar yang tampil di section QnA halaman depan.</p>
    @if($qnaSection?->image_path)
        <img src="{{ $qnaSection->image_path }}" alt="Preview gambar QnA" class="aspect-video w-full max-w-xl rounded-2xl object-cover shadow-lg">
    @endif
    <input name="image" type="file" accept="image/*" class="rounded-2xl border border-neutral-200 bg-white p-3 text-sm">
    <input name="image_path" value="{{ old('image_path',$qnaSection?->image_path) }}" placeholder="URL gambar manual /storage/..." class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <button class="w-fit rounded-full bg-neutral-900 px-6 py-3 font-bold text-white">Simpan Gambar</button>
</form>

<form method="POST" action="{{ route('admin.qnas.store') }}" class="grid gap-4 rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
    @csrf
    <h2 class="font-bold">Tambah QnA</h2>
    <input name="question" placeholder="Pertanyaan" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <textarea name="answer" placeholder="Jawaban" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700"></textarea>
    <input name="order" type="number" value="0" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
    <label class="text-sm font-semibold text-neutral-600"><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
    <button class="w-fit rounded-full bg-red-700 px-6 py-3 font-bold text-white hover:bg-red-800">Tambah</button>
</form>

<div class="mt-8 grid gap-4">
    @foreach($items as $item)
        <article class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-black/5">
            <form id="qna-update-{{ $item->id }}" method="POST" action="{{ route('admin.qnas.update',$item) }}" class="grid gap-3">
                @csrf
                @method('PUT')
                <input name="question" value="{{ $item->question }}" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
                <textarea name="answer" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">{{ $item->answer }}</textarea>
                <input name="order" type="number" value="{{ $item->order }}" class="rounded-2xl border border-neutral-200 p-3 outline-none focus:border-red-700">
                <label class="text-sm font-semibold text-neutral-600"><input type="checkbox" name="is_active" value="1" @checked($item->is_active)> Aktif</label>
            </form>
            <div class="mt-4 flex gap-2">
                <button form="qna-update-{{ $item->id }}" class="rounded-full bg-neutral-900 px-5 py-2 font-bold text-white">Simpan</button>
                <form method="POST" action="{{ route('admin.qnas.destroy',$item) }}">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-full border border-red-700 px-5 py-2 font-bold text-red-700">Hapus</button>
                </form>
            </div>
        </article>
    @endforeach
</div>
@endsection
