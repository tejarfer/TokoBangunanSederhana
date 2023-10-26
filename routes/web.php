<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', [DashboardController::class, 'index']);

// barang
Route::get('tampil-barang', [barangController::class, 'index']);
Route::get('tambah-barang', [barangController::class, 'create'])->name('barang.create');
Route::post('tampil-barang', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [barangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/edit/{id}', [barangController::class, 'update'])->name('barang.update');
Route::post('/barang/delete/{id}', [barangController::class, 'destroy'])->name('barang.destroy');

// order
Route::get('tampil-list-order', [orderController::class, 'index']);
Route::get('/order/create/{id}', [orderController::class, 'create'])->name('order.create')->middleware('auth');
Route::post('/order/create/{id}', [orderController::class, 'store'])->name('order.store');
Route::get('tampil-list-order/{id}', [orderController::class, 'konfirmasi'])->name('order.update');
Route::post('/order/delete/{id}', [orderController::class, 'destroy'])->name('order.destroy');

Auth::routes();

// penjualan
Route::get('tampil-penjualan', [penjualanController::class, 'index']);


