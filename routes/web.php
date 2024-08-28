<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SiswaController;
use app\models\siswa;
use App\Http\Controllers\ApiKelasController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk PostController
Route::get('/post', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route untuk KelasController
Route::group(['prefix' => 'kelas', 'as' => 'kelas.'], function () {
    Route::get('/', [KelasController::class, 'index'])->name('index');
    Route::get('/create', [KelasController::class, 'create'])->name('create');
    Route::post('/store', [KelasController::class, 'store'])->name('store');
    Route::get('/{id_kelas}', [KelasController::class, 'show'])->name('show');
    Route::get('/{id_kelas}/edit', [KelasController::class, 'edit'])->name('edit');
    Route::put('/{id_kelas}', [KelasController::class, 'update'])->name('update');
    Route::delete('/{id_kelas}', [KelasController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_kelas}/restore', [KelasController::class, 'restore'])->name('restore');
});

// Route untuk SppController
Route::group(['prefix' => 'spp', 'as' => 'spp.'], function () {
    Route::get('/', [SppController::class, 'index'])->name('index');
    Route::get('/create', [SppController::class, 'create'])->name('create');
    Route::post('/', [SppController::class, 'store'])->name('store');
    Route::get('/{id_spp}', [SppController::class, 'show'])->name('show');
    Route::get('/{id_spp}/edit', [SppController::class, 'edit'])->name('edit');
    Route::put('/{id_spp}', [SppController::class, 'update'])->name('update');
    Route::delete('/{id_spp}', [SppController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_spp}/restore', [SppController::class, 'restore'])->name('restore');
});
// Route untuk SiswaController
Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::get('/', [SiswaController::class, 'index'])->name('index');
    Route::get('/create', [SiswaController::class, 'create'])->name('create');
    Route::post('/', [SiswaController::class, 'store'])->name('store');
    Route::get('/{id_siswa}', [SiswaController::class, 'show'])->name('show');
    Route::get('/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('edit');
    Route::put('/{id_siswa}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/{id_siswa}', [SiswaController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_siswa}/restore', [SiswaController::class, 'restore'])->name('restore');
});
// Route untuk PembayaranController
Route::group(['prefix' => 'pembayaran', 'as' => 'pembayaran.'], function () {
    Route::get('/', [PembayaranController::class, 'index'])->name('index');
    Route::get('/create', [PembayaranController::class, 'create'])->name('create');
    Route::post('/', [PembayaranController::class, 'store'])->name('store');
    Route::get('/{id_pembayaran}', [PembayaranController::class, 'show'])->name('show');
    Route::get('/{id_pembayaran}/edit', [PembayaranController::class, 'edit'])->name('edit');
    Route::put('/{id_pembayaran}', [PembayaranController::class, 'update'])->name('update');
    Route::delete('/{id_pembayaran}', [PembayaranController::class, 'destroy'])->name('destroy');
    Route::patch('/{id_pembayaran}/restore', [PembayaranController::class, 'restore'])->name('restore');
});

//kelas api

Route::get('/dashboard/kelas', [\App\Http\Controllers\ApiKelasController::class, 'index']);
Route::get('/creat', [\App\Http\Controllers\ApiKelasController::class, 'create']);
Route::put('/update', [\App\Http\Controllers\ApiKelasController::class, 'update']);
Route::put('/show', [\App\Http\Controllers\ApiKelasController::class, 'show']);




