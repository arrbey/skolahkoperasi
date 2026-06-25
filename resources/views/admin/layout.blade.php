<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard admin custom untuk mengelola konten Sekolah Koperasi.">
    <title>@yield('title', 'Dashboard Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',ui-sans-serif,system-ui,sans-serif;background:#f8fafc}
        .nav-active{background:#f1f5f9;color:#0f172a;border-color:#e2e8f0}
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
@php
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => '◈'],
        ['label' => 'Hero', 'route' => 'admin.hero.edit', 'icon' => '✦'],
        ['label' => 'Visi Misi', 'route' => 'admin.vision.edit', 'icon' => '◎'],
        ['label' => 'Keunggulan', 'route' => 'admin.benefits.index', 'icon' => '✺'],
        ['label' => 'Brosur', 'route' => 'admin.brochures.index', 'icon' => '▣'],
        ['label' => 'QnA', 'route' => 'admin.qnas.index', 'icon' => '?'],
        ['label' => 'Kontak', 'route' => 'admin.contact.edit', 'icon' => '☎'],
        ['label' => 'Pengaturan', 'route' => 'admin.settings.edit', 'icon' => '⚙'],
    ];
@endphp
<div class="min-h-screen lg:flex">
    <aside class="border-b border-slate-200 bg-white p-5 lg:fixed lg:inset-y-0 lg:left-0 lg:w-72 lg:border-b-0 lg:border-r">
        <div class="flex items-center gap-3">
            <span class="grid h-11 w-11 place-items-center rounded-2xl bg-slate-950 text-sm font-black text-white">SK</span>
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-slate-400">Custom CMS</p>
                <p class="text-lg font-black text-slate-950">Admin Panel</p>
            </div>
        </div>
        <nav class="mt-9 grid gap-1.5">
            @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}" class="group flex items-center gap-3 rounded-2xl border border-transparent px-4 py-3 text-sm font-bold text-slate-600 transition hover:border-slate-200 hover:bg-slate-50 hover:text-slate-950 {{ request()->routeIs($item['route']) ? 'nav-active' : '' }}">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-slate-100 text-base text-slate-500 transition group-hover:bg-white group-hover:text-slate-950">{{ $item['icon'] }}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
        <div class="mt-8 rounded-3xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-sm font-extrabold text-slate-950">Dashboard bersih</p>
            <p class="mt-1 text-xs leading-5 text-slate-500">Custom Blade CMS dengan warna netral, fokus ke konten.</p>
        </div>
    </aside>

    <div class="flex-1 lg:pl-72">
        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur-xl">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">Sekolah Koperasi</p>
                    @hasSection('header')
                        @yield('header')
                    @else
                        <h1 class="mt-1 text-2xl font-black tracking-tight text-slate-950">@yield('title', 'Dashboard')</h1>
                    @endif
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">Lihat Website</a>
                    <a href="{{ route('admin.password.edit') }}" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">Password</a>
                    <form method="POST" action="{{ route('admin.logout') }}">@csrf <button class="rounded-2xl bg-slate-950 px-4 py-2 text-sm font-bold text-white shadow-sm transition hover:bg-slate-800">Logout</button></form>
                </div>
            </div>
        </header>
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if(session('success'))<div class="mb-6 rounded-2xl bg-slate-50 p-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200">{{ session('success') }}</div>@endif
            @if($errors->any())<div class="mb-6 rounded-2xl bg-red-50 p-4 text-sm text-red-700 ring-1 ring-red-200"><ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            @yield('content')
        </main>
    </div>
</div>
@stack('scripts')
</body>
</html>
