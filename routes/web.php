<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenggunaController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them 
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/search/pelanggan', [TransaksiController::class, 'searchPelanggan'])->name('search.pelanggan');

// Menampilkan form create transaction & user
Route::get('/create-transaction-user', function () {
    return view('create_transaction'); // Ganti dengan nama view yang sesuai
})->name('create.transaction.user');

Route::get('/read_transactions', [TransaksiController::class, 'index'])->name('read.transactions');

Route::get('/read_transaction', function () {
    return view('read_transaction'); // Ganti dengan nama view yang sesuai
})->name('read.transaction.user');

// Route untuk menampilkan halaman edit
Route::get('/transactions/{id}/edit', [TransaksiController::class, 'edit'])->name('transactions.edit');

// Route untuk update data (PUT)
Route::put('/transactions/{id}', [TransaksiController::class, 'update'])->name('transactions.update');

Route::delete('/transactions/{id}', [TransaksiController::class, 'delete'])->name('transactions.delete');

// Menyimpan data transaksi dan pengguna
Route::post('/create-transaction-user', [TransaksiController::class, 'store'])->name('create-transaction-user.store');

// Route untuk menyimpan pengguna
Route::post('/users', [PelangganController::class, 'store'])->name('users.store');
