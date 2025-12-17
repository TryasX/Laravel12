<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SKLController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth');


Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    
    Route::get('/pegawai', function () {
        return view('pegawai');
    });
    
    Route::get('/skl', [SKLController::class, 'index']);

    Route::get('/api/pasien/{rm}', [PasienController::class, 'getByRM']);
    Route::post('/skl/preview', [SklController::class, 'preview']);
    Route::post('/skl/print', [SklController::class, 'print']);




});





// Route::get('/auth-test', function () {
//     $credentials = [
//         'FingerprintID' => '22211284',
//         'password' => 'TryasX@2024'
//     ];

//     return Auth::attempt($credentials) ? 'OK' : 'FAIL';
// });


// Route::get('/test', function () {
//     return vb_encrypt("TryasX@2024");
// });

// Route::get('/db-test', function () {
//     try {
//         $user = \App\Models\User::first();
//         return $user ?: 'Users table kosong';
//     } catch (\Exception $e) {
//         return 'ERROR: ' . $e->getMessage();
//     }
// });

