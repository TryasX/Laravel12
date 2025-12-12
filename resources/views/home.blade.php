@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Overview</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500">Total Pasien</p>
        <p class="text-4xl font-bold text-gray-800 mt-2">1,234</p>
        <p class="text-orange-500 mt-1">+12% dari bulan lalu</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500">Pasien Baru</p>
        <p class="text-4xl font-bold text-green-600 mt-2">56</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-gray-500">Menunggu</p>
        <p class="text-4xl font-bold text-yellow-500 mt-2">8</p>
    </div>
</div>
@endsection
