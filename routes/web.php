<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataController;

Route::get('/', [DataController::class, 'index'])->name('index');

Route::get('/admin', function(){return view('admin.admin');})->name('admin');
Route::get('/cari', [DataController::class, 'cariBuku'])->name('cariBuku');

#Route buku
Route::get('/admin/buku', [DataController::class, 'indexBuku'])->name('indexBuku');
Route::get('/admin/buku/form', [DataController::class, 'formBuku'])->name('formBuku');
Route::post('/admin/buku/form', [DataController::class, 'addBuku'])->name('addBuku');
Route::get('/admin/buku/form/{id}', [DataController::class, 'editBuku'])->name('editBuku');
Route::put('/admin/buku/form/{id}', [DataController::class, 'updateBuku'])->name('updateBuku');
Route::delete('/admin/buku/{id}', [DataController::class, 'deleteBuku'])->name('deleteBuku');

#Route Penerbit
Route::get('/admin/penerbit', [DataController::class, 'indexPenerbit'])->name('indexPenerbit');
Route::get('/admin/penerbit/form', function () {
    return view('admin.formPenerbit');})
->name('formPenerbit');
Route::post('/admin/penerbit/form', [DataController::class, 'addPenerbit'])->name('addPenerbit');
Route::get('/admin/penerbit/form/{id}', [DataController::class, 'editPenerbit'])->name('editPenerbit');
Route::put('/admin/penerbit/form/{id}', [DataController::class, 'updatePenerbit'])->name('updatePenerbit');
Route::delete('/admin/penerbit/{id}', [DataController::class, 'deletePenerbit'])->name('deletePenerbit');

#Route Pengadaan
Route::get('/pengadaan', [DataController::class, 'pengadaan'])->name('pengadaan');
Route::get('/pengadaan/laporan', [DataController::class, 'cetakLaporan'])->name('cetak');