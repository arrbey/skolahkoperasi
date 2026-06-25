@extends('admin.layout')
@section('title','Kontak')
@section('content')
<h1 class="text-3xl font-extrabold">Kontak</h1>
<form method="POST" action="{{ route('admin.contact.update') }}" class="mt-6 grid gap-5 rounded-3xl bg-white p-6 shadow-sm">@csrf @method('PUT')
    <textarea name="address" rows="3" placeholder="Alamat" class="rounded-2xl border p-3">{{ old('address',$contact->address) }}</textarea>
    <input name="phone" value="{{ old('phone',$contact->phone) }}" placeholder="Telepon" class="rounded-2xl border p-3">
    <input name="email" value="{{ old('email',$contact->email) }}" placeholder="Email" class="rounded-2xl border p-3">
    <input name="whatsapp_number" value="{{ old('whatsapp_number',$contact->whatsapp_number) }}" placeholder="Nomor WhatsApp" class="rounded-2xl border p-3">
    <textarea name="maps_embed_url" rows="2" placeholder="Google Maps embed URL" class="rounded-2xl border p-3">{{ old('maps_embed_url',$contact->maps_embed_url) }}</textarea>
    <button class="w-fit rounded-full bg-red-700 px-6 py-3 font-bold text-white">Simpan</button>
</form>
@endsection
