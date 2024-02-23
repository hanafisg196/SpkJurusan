<?php

use App\Http\Controllers\BatchSoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SubSoalController;
use App\Http\Controllers\PihakSekolahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('tampilan.main');
});
Route::get('/main2', function () {
    return view('tampilan2.main');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/login', function () {
    return view('login.index');
});


Route::resource('/ujian',UjianController::class);



Route::resource('/siswa',SiswaController::class);
Route::post('/editsiswa/{id}', [SiswaController::class,'editsiswa']);
Route::resource('/pihaksekolah',PihakSekolahController::class);
Route::post('/editpihaksekolah/{id}', [PihakSekolahController::class,'editpihaksekolah']);
Route::resource('/soal',SoalController::class);
Route::post('/editsoal/{id}', [SoalController::class,'editsoal']);
Route::resource('/subsoal',SubSoalController::class);
Route::post('/tambahjawaban/{id}', [SubSoalController::class,'tambahjawaban']);
Route::resource('/batch',BatchSoalController::class);
Route::post('/batch/{id}', [BatchSoalController::class,'edit']);
