<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Admin Skolah Koperasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-100 text-neutral-900">
    <main class="mx-auto max-w-3xl px-6 py-12">
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-red-700 hover:text-red-800">Kembali ke Dashboard</a>
        <section class="mt-6 rounded-3xl bg-white p-8 shadow-sm ring-1 ring-black/5">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-red-700">Modul CMS</p>
            <h1 class="mt-3 text-3xl font-extrabold">{{ $title }}</h1>
            <p class="mt-4 leading-7 text-neutral-600">Route admin sudah disiapkan. Form CRUD, validasi, upload gambar, dan koneksi database dapat ditambahkan pada tahap implementasi CMS berikutnya.</p>
        </section>
    </main>
</body>
</html>
