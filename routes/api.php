<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('karyawan', [KaryawanController::class, 'index']); // Menampilkan semua karyawan
Route::post('karyawan', [KaryawanController::class, 'store']); // Menambah karyawan
Route::get('karyawan/{id}', [KaryawanController::class, 'show']); // Menampilkan detail karyawan
Route::put('karyawan/{id}', [KaryawanController::class, 'update']); // Mengupdate karyawan
Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy']); // Menghapus karyawan