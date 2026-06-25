<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Skolah Koperasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="grid min-h-screen place-items-center bg-neutral-100 px-6 text-neutral-900">
    <main class="w-full max-w-md rounded-3xl bg-white p-8 shadow-sm ring-1 ring-black/5">
        <p class="text-sm font-bold uppercase tracking-[0.18em] text-red-700">Admin CMS</p>
        <h1 class="mt-3 text-3xl font-extrabold">Masuk</h1>
        <p class="mt-2 text-sm text-neutral-500">Kelola konten company profile Skolah Koperasi.</p>

        <form method="POST" action="{{ route('admin.login.store') }}" class="mt-8 space-y-5">
            @csrf
            <div>
                <label for="email" class="text-sm font-bold">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-2xl border border-neutral-200 px-4 py-3 outline-none focus:border-red-700">
                @error('email') <p class="mt-2 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password" class="text-sm font-bold">Password</label>
                <input id="password" name="password" type="password" required class="mt-2 w-full rounded-2xl border border-neutral-200 px-4 py-3 outline-none focus:border-red-700">
                @error('password') <p class="mt-2 text-sm text-red-700">{{ $message }}</p> @enderror
            </div>
            <label class="flex items-center gap-3 text-sm text-neutral-600">
                <input type="checkbox" name="remember" class="rounded border-neutral-300 text-red-700">
                Ingat saya
            </label>
            <button class="w-full rounded-full bg-red-700 px-5 py-3 font-bold text-white hover:bg-red-800">Masuk</button>
        </form>

        <p class="mt-6 rounded-2xl bg-neutral-100 p-4 text-sm text-neutral-600">Default lokal: admin@skolahkoperasi.test / password</p>
    </main>
</body>
</html>
