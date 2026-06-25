@extends('admin.layout')
@section('title','Visi Misi')
@section('content')
<h1 class="text-3xl font-extrabold">Visi & Misi</h1>
<form method="POST" action="{{ route('admin.vision.update') }}" class="mt-6 grid gap-5 rounded-3xl bg-white p-6 shadow-sm">@csrf @method('PUT')
    <label class="font-bold">Visi</label>
    <textarea name="vision" rows="4" class="rounded-2xl border p-3">{{ old('vision',$vision->content) }}</textarea>
    <label class="font-bold">Misi</label>
    @for($i=0;$i<5;$i++)
        <textarea name="missions[]" rows="2" placeholder="Misi {{ $i+1 }}" class="rounded-2xl border p-3">{{ old("missions.$i", $missions[$i]->content ?? '') }}</textarea>
    @endfor
    <button class="w-fit rounded-full bg-red-700 px-6 py-3 font-bold text-white">Simpan</button>
</form>
@endsection
