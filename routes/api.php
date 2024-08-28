<?php

use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\siswaController;
use App\Http\Controllers\Api\SppController;
use App\Http\Controllers\ApiKelasController;
use App\Http\Controllers\ApiSppController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

//kelas


Route::group(['prefix' => 'kelas', 'as' => 'api.kelas'], function () {
    Route::get('/', [KelasController::class, 'index'])->name('index');
    Route::get('/create', [KelasController::class, 'create'])->name('create');
    Route::post('/', [KelasController::class, 'store'])->name('store');
    Route::get('/edit/{id_kelas}', [KelasController::class, 'edit'])->name('edit');
    Route::put('/{id_kelas}', [KelasController::class, 'update'])->name('update');
    Route::get('/{id_kelas}', [KelasController::class, 'show'])->name('show');
    Route::delete('/{id_kelas}', [KelasController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_kelas}/restore', [KelasController::class, 'restore'])->name('restore');
});
//siswa
Route::group(['prefix' => 'siswa', 'as' => 'api.siswa'], function () {
    Route::get('/', [SiswaController::class, 'index'])->name('index');
    Route::get('/create', [SiswaController::class, 'create'])->name('create');
    Route::post('/', [SiswaController::class, 'store'])->name('store');
    Route::get('/{id_siswa}', [SiswaController::class, 'show'])->name('show');
    Route::get('/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('edit');
    Route::put('/{id_siswa}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/{id_siswa}', [SiswaController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_siswa}/restore', [SiswaController::class, 'restore'])->name('restore');
});
//pembayaran
Route::group(['prefix' => 'pembayaran', 'as' => 'api.pembayaran'], function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
    Route::get('/{id_pembayaran}', [PembayaranController::class, 'show'])->name('show');
    Route::get('/{id_pembayaran}/edit', [PembayaranController::class, 'edit'])->name('edit');
    Route::put('/{id_pembayaran}', [PembayaranController::class, 'update'])->name('update');
    Route::delete('/{id_pembayaran}', [PembayaranController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_pembayaran}/restore', [PembayaranController::class, 'restore'])->name('restore');
});
//spp
Route::group(['prefix' => 'spp', 'as' => 'api.spp'], function () {
    Route::get('/', [SppController::class, 'index'])->name('index');
    Route::get('/create', [SppController::class, 'create'])->name('create');
    Route::post('/', [SppController::class, 'store'])->name('store');
    Route::get('/{id_spp}', [SppController::class, 'show'])->name('show');
    Route::get('/{id_spp}/edit', [SppController::class, 'edit'])->name('edit');
    Route::put('/{id_spp}', [SppController::class, 'update'])->name('update');
    Route::delete('/{id_spp}', [SppController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_spp}/restore', [SppController::class, 'restore'])->name('restore');
});