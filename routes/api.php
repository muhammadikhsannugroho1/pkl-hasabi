<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

//kelas
Route::apiResource('/kelas', App\Http\Controllers\Api\KelasController::class);



//spp
Route::apiResource('/spp', App\Http\Controllers\Api\SppController::class);

//pembayaran
Route::apiResource('/pembayaran', App\Http\Controllers\Api\PembayaranController::class);

//siswa
Route::apiResource('/siswa', App\Http\Controllers\Api\siswaController::class);

