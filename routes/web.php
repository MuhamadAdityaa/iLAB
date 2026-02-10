<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [JadwalController::class, 'tampil'])->name('welcome');
Route::get('/api/jadwal/{id}', [JadwalController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login')->name('login');
    Route::post('/login/submit', 'loginSubmit')->name('login.submit');
    Route::post('/logout', 'logout')->name('logout');
});


Route::get('/jadwal/{id}/', [JadwalController::class, 'tampil'])->where('id', '[0-9]+')->name('jadwal');

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('coba');
    })->name('dashboard');
    Route::controller(JadwalController::class)->group(function () {
        Route::get('/jadwal', 'indexAdmin')->name('jadwal.index');
        Route::get('/jadwal/create', 'create')->name('jadwal.create');
        Route::post('/jadwal/store', 'store')->name('jadwal.store');
        Route::get('/jadwal/{id}/edit', 'edit')->name('jadwal.edit.show');
        Route::post('/jadwal/{id}/update', 'update')->name('jadwal.update');
        Route::delete('/jadwal/{id}/delete', 'destroy')->name('jadwal.delete');
        Route::post('/jadwal/filter', 'filtering')->name('jadwal.filter');

        // Route::get('/jadwal/{id}/', 'tampil')->name('jadwal');
        // Route::get('/api/jadwal/{id}', 'index')->name('api');
    });

    Route::controller(GuruController::class)->group(function () {
        Route::get('/guru', 'index')->name('guru.index');
        Route::get('/guru/create', 'create')->name('guru.create');
        Route::post('/guru/store', 'store')->name('guru.store');
        Route::get('/guru/{id}/edit', 'edit')->name('guru.edit.show');
        Route::post('/guru/{id}/update', 'update')->name('guru.update');
        Route::delete('/guru/{id}/delete', 'destroy')->name('guru.delete');
        Route::get('/guru/{id}/detail', 'detail')->name('guru.detail');
    });

    Route::controller(MapelController::class)->group(function () {
        Route::get('/mapel', 'index')->name('mapel.index');
        Route::get('/mapel/create', 'create')->name('mapel.create');
        Route::post('/mapel/store', 'store')->name('mapel.store');
        Route::get('/mapel/{id}/edit', 'edit')->name('mapel.edit.show');
        Route::post('/mapel/{id}/update', 'update')->name('mapel.update');
        Route::delete('/mapel/{id}/delete', 'destroy')->name('mapel.delete');
    });

    Route::controller(RuanganController::class)->group(function () {
        Route::get('/ruangan', 'index')->name('ruangan.index');
        Route::get('/ruangan/create', 'create')->name('ruangan.create');
        Route::post('/ruangan/store', 'store')->name('ruangan.store');
        Route::get('/ruangan/{id}/edit', 'edit')->name('ruangan.edit.show');
        Route::post('/ruangan/{id}/update', 'update')->name('ruangan.update');
        Route::get('/ruangan/{id}/detail', 'detail')->name('ruangan.detail');
        Route::delete('/ruangan/{id}/delete', 'destroy')->name('ruangan.delete');
    });

    Route::controller(KelasController::class)->group(function () {
        Route::get('/kelas', 'index')->name('kelas.index');
        Route::get('/kelas/create', 'create')->name('kelas.create');
        Route::post('/kelas/store', 'store')->name('kelas.store');
        Route::get('/kelas/{id}/edit', 'edit')->name('kelas.edit.show');
        Route::post('/kelas/{id}/update', 'update')->name('kelas.update');
        Route::delete('/kelas/{id}/delete', 'destroy')->name('kelas.delete');
    });
});
