<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Login')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    {{-- WRAPPER --}}
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">
        <div class="text-center mb-6">
            {{-- <div class="mx-auto bg-blue-500 text-white w-20 h-16 rounded-2xl flex items-center justify-center text-3xl font-bold">
                SHBK
            </div> --}}
            <h1 class="mt-3 text-xl font-semibold text-gray-800">
                Santosa Hospital Bandung Kopo
            </h1>
            <p class="text-gray-500 text-sm">Silakan login untuk melanjutkan</p>
        </div>

        {{-- HALAMAN LOGIN --}}
        @yield('content')
    </div>
    <script>
    function validateNik() {
        const nikInput = document.getElementById("FingerprintID");
        const errorText = document.getElementById("fp-error");

        // Hapus semua karakter selain angka
        nikInput.value = nikInput.value.replace(/[^0-9]/g, '');

        // Validasi panjang minimal (opsional)
        if (nikInput.value.length > 0 && nikInput.value.length < 8) {
            errorText.textContent = "NIK minimal 8 digit.";
            errorText.classList.remove("hidden");
        } else {
            errorText.classList.add("hidden");
        }
    }
    </script>

</body>
</html>
