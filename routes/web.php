<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Http\Request;

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

Route::resource('mahasiswas', MahasiswaController::class);

Route::get('/mahasiswas/nilai/{Nim}' ,[MahasiswaController::class,'nilai'])->name('mahasiswas.nilai');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mahasiswas/cetak/pdf', [MahasiswaController::class ,'cetak_pdf'])->name('mahasiswas.cetak');