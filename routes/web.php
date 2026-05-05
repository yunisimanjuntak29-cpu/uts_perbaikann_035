<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

// Langsung arahkan ke halaman daftar pasien
Route::get('/', function () {
    return redirect()->route('pasien.index');
});

// Hapus tanda '/' di depan 'pasien'
Route::resource('pasien', PasienController::class);
