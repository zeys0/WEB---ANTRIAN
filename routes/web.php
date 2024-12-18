<?php

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use App\Events\Pesan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------P
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class, 'index']);
Route::get('/daftarantrian', [Home::class, 'antrian']);
Route::post('/daftarantrian', [Home::class, 'tambahAntrian'])->name('tambah.antrian');

Route::get('/display', [Home::class, 'display']);


Route::get('/rincian', [Home::class, 'rincian']);
Route::get('/panggil-antrian/{kodeLoket}/{nomorAntrian}', [Home::class, 'panggilAntrian']);

Route::get('/trigger', [Home::class, 'trigger']);
// Route::delete('/hapus-antrian/{id}', 'HomeCo@hapusAntrian')->name('hapus-antrian');
Route::get('/admin', [Home::class, 'admin']);
Route::delete('/hapus-antrian/{id}', [Home::class, 'hapusAntrian'])->name('hapus-antrian');
Route::post('/reset-data', [Home::class, 'reset'])->name('reset.data');

Route::get('/folder', [Home::class, 'folder']);
Route::get('/cetak', [Home::class, 'cetak']);
