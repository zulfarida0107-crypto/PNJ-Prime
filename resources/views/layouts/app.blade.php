<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') — PNJ Prime RTPU</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">
    @php
        $pengguna = auth()->user();
        $namaPengguna = $pengguna->nama_lengkap ?? 'Admin Kepala RTPU';
        $peranPengguna = match ($pengguna->role ?? 'admin') {
            'admin' => 'Superadmin Unit RTPU',
            'dosen' => 'Dosen Pengusul',
            'mhs' => 'Mahasiswa',
            'mitra' => 'Mitra Industri',
            'pimpinan' => 'Pimpinan PNJ',
            'p3m' => 'Admin P3M',
            'rtpu' => 'Admin RTPU',
            default => 'Pengguna PNJ Prime',
        };
        $inisial = collect(explode(' ', $namaPengguna))
            ->take(2)
            ->map(fn ($kata) => mb_strtoupper(mb_substr($kata, 0, 1)))
            ->implode('');
        $menuAktif = trim($__env->yieldContent('nav', 'dashboard'));
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside
            id="app-sidebar"
            class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col bg-[#1b2433] text-slate-300 transition-transform duration-200 lg:static lg:translate-x-0"
        >
            <div class="flex h-16 items-center gap-3 px-5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-teal-500 text-white shadow-sm">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21h18" />
                        <path d="M5 21V7l7-4 7 4v14" />
                        <path d="M9 21v-6h6v6" />
                    </svg>
                </span>
                <div class="leading-tight">
                    <p class="text-sm font-semibold text-white">PNJ Prime RTPU</p>
                    <p class="text-[11px] text-slate-400">Admin Operations Portal</p>
                </div>
            </div>

            <nav class="mt-2 flex-1 space-y-1 px-3">
                <a href="{{ url('/dashboard') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $menuAktif === 'dashboard' ? 'bg-teal-500 text-white shadow-sm' : 'hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                    </svg>
                    Beranda Dashboard
                </a>

                <a href="{{ url('/pesanan') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $menuAktif === 'pesanan' ? 'bg-teal-500 text-white shadow-sm' : 'hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M8 6h13" />
                        <path d="M8 12h13" />
                        <path d="M8 18h13" />
                        <path d="M3 6h.01" />
                        <path d="M3 12h.01" />
                        <path d="M3 18h.01" />
                    </svg>
                    <span class="flex-1">Validasi Pesanan</span>
                    <span class="rounded-full bg-red-500 px-1.5 py-0.5 text-[10px] font-semibold text-white">5</span>
                </a>

                <a href="{{ url('/katalog') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $menuAktif === 'katalog' ? 'bg-teal-500 text-white shadow-sm' : 'hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                    Manajemen Katalog
                </a>

                <a href="{{ url('/laporan') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $menuAktif === 'laporan' ? 'bg-teal-500 text-white shadow-sm' : 'hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 3v18h18" />
                        <path d="M7 14l4-4 4 4 6-6" />
                    </svg>
                    Laporan Keuangan
                </a>

                <a href="{{ url('/pengaturan') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $menuAktif === 'pengaturan' ? 'bg-teal-500 text-white shadow-sm' : 'hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3" />
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                    </svg>
                    Pengaturan Admin
                </a>
            </nav>

            <div class="mt-auto border-t border-white/10 px-3 py-4">
                <a href="{{ url('/bantuan') }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium hover:bg-white/5 hover:text-white">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                    </svg>
                    Bantuan &amp; Panduan
                </a>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-left text-sm font-medium text-rose-300 hover:bg-white/5 hover:text-rose-200">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div
            id="sidebar-overlay"
            class="fixed inset-0 z-30 hidden bg-slate-900/40 lg:hidden"
        ></div>

        {{-- Konten utama --}}
        <div class="flex min-h-screen flex-1 flex-col">
            <header class="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-slate-200 bg-white/90 px-4 backdrop-blur lg:px-6">
                <button
                    id="sidebar-toggle"
                    type="button"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-600 lg:hidden"
                    aria-label="Buka menu"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <label class="relative hidden min-w-0 flex-1 md:block">
                    <svg class="pointer-events-none absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <input
                        type="search"
                        placeholder="Cari pesanan, mahasiswa, atau aset lab..."
                        class="h-10 w-full max-w-xl rounded-full border border-slate-200 bg-slate-50 pr-4 pl-10 text-sm text-slate-700 outline-none ring-teal-500/30 placeholder:text-slate-400 focus:border-teal-400 focus:bg-white focus:ring-2"
                    >
                </label>

                <div class="ml-auto flex items-center gap-3">
                    <button type="button" class="relative inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-500 hover:bg-slate-100" aria-label="Notifikasi">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                        <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-500"></span>
                    </button>

                    <div class="flex items-center gap-3 rounded-full border border-slate-200 py-1 pr-3 pl-1">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-teal-500 text-xs font-semibold text-white">
                            {{ $inisial }}
                        </span>
                        <div class="hidden leading-tight sm:block">
                            <p class="text-sm font-semibold text-slate-800">{{ $namaPengguna }}</p>
                            <p class="text-[11px] text-slate-500">{{ $peranPengguna }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('app-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggle = document.getElementById('sidebar-toggle');

        const tutupSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        };

        toggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', tutupSidebar);
    </script>
    @stack('scripts')
</body>
</html>
