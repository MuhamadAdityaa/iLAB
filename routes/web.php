<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    GuruController,
    MapelController,
    RuanganController,
    JadwalController,
};

Route::get('/', [JadwalController::class, 'tampil'])->name('welcome');
Route::get('/api/jadwal', [JadwalController::class, 'index']);

Route::get('/dashboard', function () {
    return view('coba');
})->name('dashboard');

Route::controller(GuruController::class)->group(function(){
    Route::get('/guru', 'index')->name('guru.index');
    Route::get('/guru/create', 'create')->name('guru.create');
    Route::post('/guru/store', 'store')->name('guru.store');
    Route::get('/guru/{id}/edit', 'edit')->name('guru.edit.show');
    Route::post('/guru/{id}/update', 'update')->name('guru.update');
    Route::delete('/guru/{id}/delete', 'destroy')->name('guru.delete');
    Route::get('/guru/{id}/detail', 'detail')->name('guru.detail');
});

Route::controller(MapelController::class)->group(function(){
    Route::get('/mapel', 'index')->name('mapel.index');
    Route::get('/mapel/create', 'create')->name('mapel.create');
    Route::post('/mapel/store', 'store')->name('mapel.store');
    Route::get('/mapel/{id}/edit', 'edit')->name('mapel.edit.show');
    Route::post('/mapel/{id}/update', 'update')->name('mapel.update');
    Route::delete('/mapel/{id}/delete', 'destroy')->name('mapel.delete');
});

Route::controller(RuanganController::class)->group(function(){
    Route::get('/ruangan', 'index')->name('ruangan.index');
    Route::get('/ruangan/create', 'create')->name('ruangan.create');
    Route::post('/ruangan/store', 'store')->name('ruangan.store');
    Route::get('/ruangan/{id}/edit', 'edit')->name('ruangan.edit.show');
    Route::post('/ruangan/{id}/update', 'update')->name('ruangan.update');
    Route::delete('/ruangan/{id}/delete', 'destroy')->name('ruangan.delete');
});
