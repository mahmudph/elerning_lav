<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\HomeController;

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
    Route::middleware(['can:isGuru'])->group(function() {
        Route::get('/', [HomeController::class, 'index'])->name('guru.home');

        /* data siswa */
        Route::get('/data_kelas/data', 'Guru\KelasController@data')->name('guru.data_kelas.data');

        /* data siswa */
        Route::get('/data_siswa/data/{id_kelas?}', 'Guru\SiswaController@data')->name('guru.data_siswa.data');

         /* data siswa */
        Route::get('/data_tugas/data/{id_pelajaran?}', 'Guru\TugasController@data')->name('guru.data_tugas.data');

        /* delte data tugas */
        Route::get('/data_tugas/{id_tugas}/delete', 'Guru\TugasController@delete')->name('guru.data_tugas.delete');

         /* data tugas mengerjakan */
        Route::get('/data_tugas/detail/{id_tugas?}', 'Guru\TugasController@detail')->name('guru.data_tugas.detail');

        /* data tugas mengerjakan */
        Route::get('/data_pelajaran/data/{id_kelas?}', 'Guru\PelajaranController@data')->name('guru.data_pelajaran.data');

        /* data tugas mengerjakan */
        Route::get('/data_pelajaran/detail/{id_kelas?}', 'Guru\PelajaranController@detail')->name('guru.data_pelajaran.detail');


         /* data tugas mengerjakan */
        Route::get('/data_mengerjakan/data/{id_tugas?}', 'Guru\MengerjakanController@data')->name('guru.data_mengerjakan.data');

        /* data tugas mengerjakan */
        Route::get('/data_mengerjakan/detail/{id_tugas?}', 'Guru\MengerjakanController@detail')->name('guru.data_mengerjakan.detail');

        Route::resources([
            'data_siswa' => 'Guru\SiswaController',
            'data_tugas' => 'Guru\TugasController',
            'data_nilai' => 'Guru\NilaiController',
            'data_kelas' => 'Guru\KelasController',
            'data_mengerjakan' => 'Guru\MengerjakanController',
            'data_pelajaran' => 'Guru\PelajaranController'
        ], [
            'as' => 'guru',
        ]);
    });
});
