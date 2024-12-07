<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('dosen.index');
});

Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);
