@extends('layouts.auth')

@section('title', 'Halaman Login')

@section('content')
    {{-- <h2 class="text-2xl font-semibold text-center mb-6">Login</h2> --}}

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- FINGERPRINT ID --}}
        <div class="mb-4">
            <label for="FingerprintID" class="block text-gray-700 font-medium mb-1">
                NIK
            </label>

            <input 
                id="FingerprintID" 
                name="FingerPrintID" 
                type="text"
                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                value="{{ old('FingerPrintID') }}" 
                required 
                maxlength="10"
                oninput="validateNik()" 
            >

            <span id="fp-error" class="text-red-600 text-sm hidden"></span>
        </div>


        {{-- PASSWORD --}}
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-1">
                Password
            </label>

            <input id="password" name="password" type="password" required autocomplete="current-password"
                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200 focus:border-indigo-500">

            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- REMEMBER --}}
        {{-- <div class="flex items-center mb-4">
            <input type="checkbox" name="remember" id="remember"
                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                {{ old('remember') ? 'checked' : '' }}>

            <label for="remember" class="ml-2 text-gray-700 text-sm">
                Remember Me
            </label>
        </div> --}}

        {{-- BUTTON --}}
        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg mt-2 font-medium transition">
            Login
        </button>
    </form>

    
@endsection
