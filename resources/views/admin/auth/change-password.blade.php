@extends('admin.layout')
@section('title','Ganti Password')
@section('content')
<h1 class="text-3xl font-extrabold">Ganti Password</h1>
<form method="POST" action="{{ route('admin.password.update') }}" class="mt-6 grid gap-4 rounded-3xl bg-white p-6 shadow-sm">@csrf @method('PUT')
    <label class="font-bold">Password Lama</label>
    <input name="current_password" type="password" required class="rounded-2xl border p-3">
    <label class="font-bold">Password Baru</label>
    <input name="password" type="password" required class="rounded-2xl border p-3">
    <label class="font-bold">Konfirmasi Password Baru</label>
    <input name="password_confirmation" type="password" required class="rounded-2xl border p-3">
    <button class="w-fit rounded-full bg-red-700 px-6 py-3 font-bold text-white">Simpan</button>
</form>
@endsection
