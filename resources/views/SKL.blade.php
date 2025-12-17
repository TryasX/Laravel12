@extends('layouts.app')
@section('content')

<form id="sklForm" class="p-6 space-y-6">
@csrf

<!-- ================= INFORMASI BAYI ================= -->
<div class="border rounded-xl shadow p-4 bg-white">
    <h2 class="font-bold text-lg mb-4">Informasi Bayi</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium">Nama Bayi</label>
            <input type="text" class="w-full border rounded p-2" name="nama_bayi" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Jenis Kelamin</label>
            <div class="flex items-center space-x-4 mt-1">
                <label class="flex items-center space-x-1">
                    <input type="radio" name="gender" value="Laki-laki"> <span>Laki - Laki</span>
                </label>
                <label class="flex items-center space-x-1">
                    <input type="radio" name="gender" value="Perempuan"> <span>Perempuan</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium">Bayi Lahir Pada</label>
            <div class="flex space-x-2 mt-1">
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="border rounded p-2">

                <select id="hari_lahir" name="hari_lahir" class="border rounded p-2">
                    <option value="">-- Hari --</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                </select>

                <input type="time" name="jam_lahir" class="border rounded p-2">
            </div>
        </div>

        <div class="flex space-x-2">
            <div class="flex-1">
                <label class="block text-sm font-medium">Berat (gr)</label>
                <input type="number" class="w-full border rounded p-2" name="berat">
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium">Tinggi (cm)</label>
                <input type="number" class="w-full border rounded p-2" name="tinggi">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium">Persalinan</label>
            <select class="w-full border rounded p-2" name="persalinan">
                <option value="">-- Persalinan --</option>
                <option value="Normal">Normal</option>
                <option value="SC">SC</option>
                <option value="ERACS">ERACS</option>
            </select>
        </div>

        <div class="flex space-x-2">
            <div class="flex-1">
                <label class="block text-sm font-medium">Anak Ke</label>
                <input type="number" class="w-full border rounded p-2" name="anak_ke">
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium">Gol. Darah</label>
                <select class="w-full border rounded p-2" name="gol_darah_bayi">
                    <option value="">-- Gol Darah --</option>
                    <option>A</option>
                    <option>B</option>
                    <option>O</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- ================= INFORMASI IBU ================= -->
<div class="border rounded-xl shadow p-4 bg-white">
    <h2 class="font-bold text-lg mb-4">Informasi Ibu</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium">No RM</label>
            <input type="text" id="no_rm" name="no_rm" maxlength="6"
                class="w-full border rounded p-2">
            <p id="rm_error" class="text-red-600 text-sm mt-1 hidden">
                No RM harus 6 digit angka
            </p>
        </div>

        <div>
            <label class="block text-sm font-medium">Nama Ibu</label>
            <input type="text" class="w-full border rounded p-2" name="nama_ibu">
        </div>

        <div>
            <label class="block text-sm font-medium">No KTP</label>
            <input type="text" class="w-full border rounded p-2" name="nik_ibu">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium">Alamat</label>
            <textarea class="w-full border rounded p-2" name="alamat_ibu"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Pekerjaan</label>
            <input type="text" class="w-full border rounded p-2" name="pekerjaan_ibu">
        </div>

        <div>
            <label class="block text-sm font-medium">Gol. Darah</label>
            <input type="text" class="w-full border rounded p-2" name="goldar_ibu">
        </div>
    </div>
</div>

<!-- ================= INFORMASI AYAH ================= -->
<div class="border rounded-xl shadow p-4 bg-white">
    <h2 class="font-bold text-lg mb-4">Informasi Ayah</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" class="w-full border rounded p-2" name="nama_ayah" placeholder="Nama Ayah">
        <input type="text" class="w-full border rounded p-2" name="nik_ayah" placeholder="No KTP">
        <textarea class="w-full border rounded p-2 md:col-span-2" name="alamat_ayah" placeholder="Alamat"></textarea>
        <input type="text" class="w-full border rounded p-2" name="pekerjaan_ayah" placeholder="Pekerjaan">
        <input type="text" class="w-full border rounded p-2" name="gol_darah_ayah" placeholder="Gol. Darah">
    </div>
</div>

<div class="border rounded-xl shadow p-4 bg-white">
    <label class="block text-sm font-medium">DPJP</label>
        <select name="dokter_fingerprint" class="border p-2 w-full">
            <option value="">-- Pilih Dokter --</option>

            @foreach($dokters as $d)
                <option
                    value="{{ $d->FingerPrintID }}"
                    data-nama="{{ $d->FullName }}"
                    data-sip="{{ $d->NoSIP }}">
                    {{ $d->FullName }}
                </option>
            @endforeach
        </select>

        <input type="hidden" name="nama_dokter">
        <input type="hidden" name="no_sip">


</div>



<!-- ================= BUTTON ================= -->
<div class="flex justify-end space-x-3 mt-6">
    <button type="button" id="previewBtn"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Preview
    </button>

    <button type="button" id="saveBtn"
        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
        Simpan
    </button>

    <button type="button" id="printBtn"
        class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800">
        Print
    </button>
</div>

</form>
@endsection
