@extends('layouts.app')

@section('title', 'Validasi Pesanan')
@section('nav', 'pesanan')

@section('content')
<div class="space-y-6">

    {{-- ============================================================ --}}
    {{-- BREADCRUMB & PAGE HEADER                                      --}}
    {{-- ============================================================ --}}
    <div>
        <nav class="mb-1 flex items-center gap-1.5 text-xs text-slate-400">
            <a href="{{ url('/dashboard') }}" class="hover:text-teal-600">Dashboard</a>
            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m9 18 6-6-6-6"/>
            </svg>
            <span class="font-medium text-teal-600">Validasi Pesanan</span>
        </nav>

        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Validasi Pesanan &amp; Antrean</h1>
                <p class="mt-0.5 text-sm text-slate-500">Kelola, tinjau dokumen, dan setujui permohonan peminjaman aset laboratorium.</p>
            </div>

            {{-- Summary Stats --}}
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 bg-white px-4 py-2.5 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                    <div class="text-xs text-slate-500">Menunggu Tindakan:</div>
                    <div class="text-sm font-bold text-slate-800">5 <span class="font-normal text-slate-400">Antrean</span></div>
                </div>
                <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 bg-white px-4 py-2.5 shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-teal-500"></span>
                    <div class="text-xs text-slate-500">Selesai Hari Ini:</div>
                    <div class="text-sm font-bold text-slate-800">12 <span class="font-normal text-slate-400">Disetujui</span></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- FILTER & TOOLBAR                                              --}}
    {{-- ============================================================ --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <div class="flex flex-wrap items-center gap-3">
            {{-- Search --}}
            <label class="relative flex-1 min-w-[180px]">
                <svg class="pointer-events-none absolute top-1/2 left-3 h-4 w-4 -translate-y-1/2 text-slate-400"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>
                <input type="search" placeholder="Cari ID atau nama..."
                       class="h-9 w-full rounded-lg border border-slate-200 bg-slate-50 pr-3 pl-9 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:border-teal-400 focus:bg-white focus:ring-2 focus:ring-teal-500/20">
            </label>

            {{-- Status Filter --}}
            <select class="h-9 rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm text-slate-600 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-500/20">
                <option>Semua Status</option>
                <option>Menunggu Approval</option>
                <option>Disetujui</option>
                <option>Ditolak</option>
            </select>

            {{-- Kategori Lab Filter --}}
            <select class="h-9 rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm text-slate-600 outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-500/20">
                <option>Kategori Lab</option>
                <option>Lab Presisi</option>
                <option>Lab Instrumentasi &amp; Kimia</option>
                <option>Lab Manufaktur Aditif</option>
                <option>Lab Uji Bahan &amp; Metalurgi</option>
                <option>Workshop Fabrikasi Presisi</option>
                <option>Lab Polimer &amp; Komposit</option>
            </select>

            {{-- Date Picker --}}
            <button type="button"
                    class="inline-flex h-9 items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 text-sm text-slate-600 hover:bg-slate-100">
                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                Pilih Tanggal
            </button>

            <div class="ml-auto flex items-center gap-2">
                {{-- Setujui & Terbitkan Invoice (bulk action) --}}
                <button type="button"
                        class="inline-flex h-9 items-center gap-2 rounded-lg px-4 text-sm font-semibold text-white shadow-sm transition hover:opacity-90 active:scale-95"
                        style="background-color: #00998a;">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Setujui &amp; Terbitkan Invoice
                </button>

                {{-- Ekspor Data --}}
                <button type="button"
                        class="inline-flex h-9 items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    <svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Ekspor Data
                </button>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- DATA TABLE                                                    --}}
    {{-- ============================================================ --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-sm">
                {{-- Table Head --}}
                <thead>
                    <tr class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                        <th class="w-10 px-4 py-3">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </th>
                        <th class="px-4 py-3">ID Pesanan</th>
                        <th class="px-4 py-3">Detail Pemesan</th>
                        <th class="px-4 py-3">Item / Layanan</th>
                        <th class="px-4 py-3">Jadwal &amp; Lokasi</th>
                        <th class="px-4 py-3">Dokumen</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    {{-- ===================================================== --}}
                    {{-- ROW 1 — PT. Telkom Indonesia (Menunggu Approval)        --}}
                    {{-- ===================================================== --}}
                    <tr class="bg-teal-50/40 transition hover:bg-teal-50">
                        <td class="px-4 py-4">
                            <input type="checkbox" checked
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-teal-100 px-2.5 py-1 font-mono text-xs font-semibold text-teal-700">
                                #ORD-20261016-092
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">PT. Telkom Indonesia</p>
                            <p class="text-xs text-slate-500">Mitra B2B Eksternal</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">Sewa Mesin CNC 5-Axis (DPPL-5X)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Kebutuhan Fabrikasi Benda Kerja Tugas Akhir</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">16 Okt 2026, 08.00 – 12.00 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Lab Presisi Kampus Utama</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                1 File
                                <span class="text-slate-400">(Proposal_Bagas.pdf)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Menunggu Approval
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button"
                                    class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:opacity-90 active:scale-95"
                                    style="background-color: #00998a;">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                Setujui &amp; Terbitkan Invoice
                            </button>
                        </td>
                    </tr>

                    {{-- ===================================================== --}}
                    {{-- ROW 2 — PT. Astra Honda Motor                          --}}
                    {{-- ===================================================== --}}
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs font-semibold text-slate-600">
                                #ORD-20261016-088
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">PT. Astra Honda Motor</p>
                            <p class="text-xs text-slate-500">Mitra Industri Otomotif</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">Spektrofotometer UV-Vis Rig (SPO-88)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Analisis Spektrometri Sensor Optik</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">17 Okt 2026, 13.00 – 17.00 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Lab Instrumentasi &amp; Kimia</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                2 Berkas
                                <span class="text-slate-400">(K3 &amp; Proposal)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Menunggu Approval
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col gap-1.5">
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #00998a;">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Setujui
                                </button>
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">
                                    Tinjau Detail
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- ===================================================== --}}
                    {{-- ROW 3 — Bank Mandiri                                    --}}
                    {{-- ===================================================== --}}
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs font-semibold text-slate-600">
                                #ORD-20261015-074
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">Bank Mandiri</p>
                            <p class="text-xs text-slate-500">Mitra Perbankan &amp; Keuangan</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">3D Metal Printer SLM Industrial (SLM-300)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Prototyping Titanium Turbine Blade</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">19 Okt 2026, 09.00 – 15.00 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Lab Manufaktur Aditif</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                1 File
                                <span class="text-slate-400">(Format_CAD_Spec.pdf)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Menunggu Approval
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col gap-1.5">
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #00998a;">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Setujui
                                </button>
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">
                                    Tinjau Detail
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- ===================================================== --}}
                    {{-- ROW 4 — PT. Indofood Sukses Makmur                     --}}
                    {{-- ===================================================== --}}
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs font-semibold text-slate-600">
                                #ORD-20261015-061
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">PT. Indofood Sukses Makmur</p>
                            <p class="text-xs text-slate-500">Mitra Industri Pangan</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">Uji Tarik &amp; Kekerasan Logam UTM (UTM-100kN)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Pengujian Komposit Tembaga-Aluminium</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">20 Okt 2026, 10.00 – 14.00 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Lab Uji Bahan &amp; Metalurgi</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                1 File
                                <span class="text-slate-400">(Surat_Pengantar.pdf)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                Draft / Review
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col gap-1.5">
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #00998a;">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Setujui
                                </button>
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">
                                    Tinjau Detail
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- ===================================================== --}}
                    {{-- ROW 5 — PT. Pertamina (Persero)                        --}}
                    {{-- ===================================================== --}}
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs font-semibold text-slate-600">
                                #ORD-20261014-049
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">PT. Pertamina (Persero)</p>
                            <p class="text-xs text-slate-500">Mitra BUMN Energi</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">Mesin Laser Cutting CO2 150W (LC-150)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Pemotongan Pelat Akrilik Enclosure Drone</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">22 Okt 2026, 08.30 – 11.30 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Workshop Fabrikasi Presisi</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                2 Berkas
                                <span class="text-slate-400">(DXF_Design &amp; K3)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Menunggu Approval
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col gap-1.5">
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-white transition hover:opacity-90"
                                        style="background-color: #00998a;">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Setujui
                                </button>
                                <button type="button"
                                        class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">
                                    Tinjau Detail
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- ===================================================== --}}
                    {{-- ROW 6 — PT. PLN (Persero)                              --}}
                    {{-- ===================================================== --}}
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <input type="checkbox"
                                   class="h-4 w-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block rounded-md bg-slate-100 px-2.5 py-1 font-mono text-xs font-semibold text-slate-600">
                                #ORD-20261014-032
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-semibold text-slate-800">PT. PLN (Persero)</p>
                            <p class="text-xs text-slate-500">Mitra BUMN Kelistrikan</p>
                        </td>
                        <td class="px-4 py-4 max-w-[200px]">
                            <p class="font-medium text-slate-700">Rheometer Rotasional Dinamis (RHO-20)</p>
                            <p class="mt-0.5 text-xs text-slate-500 leading-relaxed">Karakterisasi Viskositas Bio-Lubricant</p>
                        </td>
                        <td class="px-4 py-4">
                            <p class="font-medium text-slate-700">23 Okt 2026, 09.00 – 12.00 WIB</p>
                            <p class="mt-0.5 text-xs text-slate-500">Lab Polimer &amp; Komposit</p>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                1 File
                                <span class="text-slate-400">(Riset_BRIN_Grant.pdf)</span>
                            </button>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-teal-500"></span>
                                Disetujui
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <button type="button"
                                    class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                Lihat Invoice
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- ============================================================ --}}
        {{-- PAGINATION & SUMMARY                                          --}}
        {{-- ============================================================ --}}
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 px-4 py-3">
            <p class="text-xs text-slate-500">Menampilkan 1–10 dari <span class="font-semibold text-slate-700">45</span> total permohonan</p>

            <div class="flex items-center gap-1">
                {{-- Prev --}}
                <button type="button"
                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-50 disabled:opacity-40"
                        disabled>
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </button>

                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-xs font-semibold text-white" style="background-color:#00998a;">1</button>
                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-xs text-slate-600 hover:bg-slate-50">2</button>
                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-xs text-slate-600 hover:bg-slate-50">3</button>
                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-xs text-slate-600 hover:bg-slate-50">4</button>
                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-xs text-slate-600 hover:bg-slate-50">5</button>

                {{-- Next --}}
                <button type="button"
                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-50">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- INFO FOOTER CARDS                                             --}}
    {{-- ============================================================ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        {{-- Card 1 --}}
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-600">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </span>
            <div>
                <p class="text-sm font-semibold text-slate-800">Validasi Berlapis K3 &amp; SOP</p>
                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                    Seluruh peminjam wajib mengunggah sertifikat induksi keselamatan lab sebelum berkas disetujui.
                </p>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-500">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
            </span>
            <div>
                <p class="text-sm font-semibold text-slate-800">SLA Persetujuan Otomatis</p>
                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                    Permohonan pending melebihi 48 jam akan ditandai eskalasi ke Koordinator Bidang RTPU.
                </p>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-500">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                    <line x1="8" y1="21" x2="16" y2="21"/>
                    <line x1="12" y1="17" x2="12" y2="21"/>
                </svg>
            </span>
            <div>
                <p class="text-sm font-semibold text-slate-800">Sinkronisasi Billing Terpusat</p>
                <p class="mt-0.5 text-xs leading-relaxed text-slate-500">
                    Tarif sewa alat komersil dan hibah riset langsung terintegrasi dengan modul Laporan Keuangan.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
