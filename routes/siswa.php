<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa\HomeController;
use App\Http\Controllers\Siswa\NilaiController;
use App\Http\Controllers\Siswa\TugasController;
use App\Http\Controllers\Siswa\PelajaranController;

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


Route::middleware(['auth'])->group(function(){
    Route::middleware(['can:isSiswa'])->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('siswa.home');
        Route::get('/tugas', [TugasController::class, 'index'])->name('siswa.tugas');
        Route::get('/nilai', [NilaiController::class, 'index'])->name('siswa.nilai');
        Route::get('/pelajaran', [PelajaranController::class, 'index'])->name('siswa.pelajaran');

         /* data tugas mengerjakan */
        Route::get('/data_tugas/{id_kelas}/data/{id_pengajaran}', 'Siswa\TugasController@data')->name('siswa.data_tugas.data');


        /* data tugas mengerjakan */
        Route::get('/data_tugas/{id_kelas}/detail/{id_pengajaran}', 'Siswa\TugasController@detail')->name('siswa.data_tugas.detail');


        Route::resources([
            'data_tugas' => 'Siswa\TugasController'
        ], ['as' => 'siswa']);
    });
});
