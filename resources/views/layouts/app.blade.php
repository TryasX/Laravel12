<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>

    @livewireStyles
</head>

<body class="flex bg-gray-100">

{{-- SIDEBAR --}}
{{-- <aside class="w-64 bg-white h-screen fixed left-0 top-0 px-3 py-6 shadow-sm"> --}}
<aside
  class="fixed left-0 top-0 z-40 w-66 h-screen bg-white px-3 py-6 shadow-sm"
>

    {{-- LOGO --}}
    <div class="flex items-center gap-3 px-2 mb-8">
        <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto">
        <span class="text-lg font-semibold text-gray-800">Santosa Hospital</span>
    </div>

    @php
        function active($path) {
            return request()->is($path)
                ? 'bg-blue-100 text-blue-600 font-semibold'
                : 'text-gray-700';
        }
    @endphp

    {{-- NAV --}}
    <nav class="flex flex-col justify-between h-[calc(100vh-100px)]">

        <div class="space-y-1">
            <a href="/home" wire:navigate
               class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-blue-50 transition {{ active('home') }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                Dashboard
            </a>

            <a href="/inpatient" wire:navigate
               class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-blue-50 transition {{ active('inpatient') }}">
                <i data-lucide="list" class="w-5 h-5"></i>
                Pasien Dalam Perawatan
            </a>

            <a href="/skl" wire:navigate
               class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-blue-50 transition {{ active('skl') }}">
                <i data-lucide="users" class="w-5 h-5"></i>
                Surat Keterangan Lahir
            </a>

            <a href="/diagnosa" wire:navigate
               class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-blue-50 transition {{ active('diagnosa*') }}">
                <i data-lucide="stethoscope" class="w-5 h-5"></i>
                Pemeriksaan / Diagnosa
            </a>
        </div>

        {{-- USER --}}
        <div class="relative">
            <button id="userMenuBtn"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-blue-50 transition">

                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                     class="w-10 h-10 rounded-full">

                <div class="text-left text-xs">
                    <div>{{ Auth::user()->employee?->EmployeeName }}</div>
                    <div class="text-gray-500">{{ Auth::user()->FingerPrintID }}</div>
                </div>

                <i data-lucide="chevron-down" class="ml-auto w-5 h-5"></i>
            </button>

            <div id="userDropdown"
                class="hidden absolute bottom-14 left-0 w-full bg-gray-50 rounded-xl shadow-lg">
                <a href="/profile" 
                   class="flex items-center gap-3 px-4 py-2 hover:bg-blue-50">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full flex items-center gap-3 px-4 py-2 text-red-600 hover:bg-red-50">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </nav>
</aside>

{{-- CONTENT --}}
<main class="ml-64 w-full p-8" >
    @yield('content')
    {{-- {{ $slot }} --}}
</main>




{{-- GLOBAL JS --}}
<script> lucide.createIcons(); </script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    /* =============================
       ICON (LUCIDE)
    ============================= */
    if (window.lucide) {
            lucide.createIcons();
        }

    /* =============================
       USER DROPDOWN
    ============================= */
    const userBtn = document.getElementById("userMenuBtn");
    const userMenu = document.getElementById("userDropdown");

    if (userBtn && userMenu) {
        userBtn.addEventListener("click", e => {
            e.stopPropagation();
            userMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", e => {
            if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add("hidden");
            }
        });
    }

    /* =============================
       VALIDASI NO RM + FETCH DATA IBU
    ============================= */
    const rmInput = document.getElementById('no_rm');
    const rmError = document.getElementById('rm_error');

    if (rmInput && rmError) {

        // hanya angka
        rmInput.addEventListener('input', () => {
            rmInput.value = rmInput.value.replace(/\D/g, '');

            if (rmInput.value && rmInput.value.length !== 6) {
                rmInput.classList.add('border-red-500');
                rmError.classList.remove('hidden');
            } else {
                rmInput.classList.remove('border-red-500');
                rmError.classList.add('hidden');
            }
        });

        // ENTER ambil data ibu
        rmInput.addEventListener('keydown', e => {
            if (e.key !== 'Enter') return;
            e.preventDefault();

            if (rmInput.value.length !== 6) {
                rmInput.classList.add('border-red-500');
                rmError.classList.remove('hidden');
                return;
            }

            fetch(`/api/pasien/${rmInput.value}`)
                .then(res => res.json())
                .then(data => {
                    if (!data || data.error) {
                        alert('Data tidak ditemukan');
                        return;
                    }

                    document.querySelector('[name="nama_ibu"]').value = data.NamaIbu ?? '';
                    document.querySelector('[name="nik_ibu"]').value = data.NIK ?? '';
                    document.querySelector('[name="alamat_ibu"]').value = data.Alamat ?? '';
                    document.querySelector('[name="alamat_ayah"]').value = data.Alamat ?? '';
                    document.querySelector('[name="pekerjaan_ibu"]').value = data.Pekerjaan ?? '';
                    document.querySelector('[name="goldar_ibu"]').value = data.GolDar ?? '';
                })
                .catch(() => alert('Gagal mengambil data pasien'));
        });
    }

    /* =============================
       AUTO HARI DARI TANGGAL
    ============================= */
    const tglLahir = document.getElementById('tgl_lahir');
    const hariLahir = document.getElementById('hari_lahir');
    const hariMap = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

    if (tglLahir && hariLahir) {
        tglLahir.addEventListener('change', () => {
            const d = new Date(tglLahir.value);
            if (!isNaN(d)) {
                hariLahir.value = hariMap[d.getDay()];
            }
        });
    }

    /* =============================
       PREVIEW / PRINT PDF
    ============================= */
    const previewBtn = document.getElementById('previewBtn');
    const printBtn   = document.getElementById('printBtn');
    const saveBtn    = document.getElementById('saveBtn');
    const form       = document.getElementById('sklForm');

    function submitPdf(url) {
        if (!form) {
            alert('Form tidak ditemukan');
            return;
        }
        form.action = url;
        form.method = 'POST';
        form.target = '_blank';
        form.submit();
    }

    previewBtn?.addEventListener('click', () => submitPdf('/skl/preview'));
    printBtn?.addEventListener('click', () => submitPdf('/skl/print'));
    saveBtn?.addEventListener('click', () => {
        alert('Simpan logic belum diimplementasikan 😄');
    });

    /* =============================
       DOKTER → HIDDEN INPUT
    ============================= */
    const dokterSelect = document.querySelector('[name="dokter_fingerprint"]');
    if (dokterSelect) {
        dokterSelect.addEventListener('change', function () {
            const opt = this.options[this.selectedIndex];
            document.querySelector('[name="nama_dokter"]').value = opt.dataset.nama || '';
            document.querySelector('[name="no_sip"]').value     = opt.dataset.sip || '';
        });
    }

});
</script>


@livewireScripts
</body>
</html>
