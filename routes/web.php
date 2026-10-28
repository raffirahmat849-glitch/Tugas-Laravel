<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

Route::get('/mahasiswa', [Mahasiswa::class, 'index']);

Route::post('/mahasiswa/store', [Mahasiswa::class, 'store']);

Route::get('/mahasiswa/edit/{id}', [Mahasiswa::class, 'edit']);

Route::put('/mahasiswa/update/{id}', [Mahasiswa::class, 'update']);

Route::delete('/mahasiswa/destroy/{id}', [Mahasiswa::class, 'destroy']);