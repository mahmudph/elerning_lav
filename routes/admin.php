<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PelajaranController;

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
    Route::middleware(['can:isAdmin'])->group(function() {
        Route::get('/', 'Admin\HomeController@index')->name('admin.home.index');
        Route::get('guru/data', 'Admin\GuruController@data')->name('admin.guru.data');
        Route::get('guru/{id}/delete', 'Admin\GuruController@delete')->name('admin.guru.delete');

        Route::get('siswa/data', 'Admin\SiswaController@data')->name('admin.siswa.data');
        Route::get('siswa/{id}/delete', 'Admin\SiswaController@delete')->name('admin.siswa.delete');

        Route::get('kelas/data', 'Admin\KelasController@data')->name('admin.kelas.data');
        Route::get('kelas/{id}/delete', 'Admin\KelasController@delete')->name('admin.kelas.delete');


        Route::get('pelajaran/data', 'Admin\PelajaranController@data')->name('admin.pelajaran.data');
        Route::get('pelajaran/{id}/delete', 'Admin\PelajaranController@delete')->name('admin.pelajaran.delete');

        Route::get('users/data', 'Admin\UserController@data')->name('admin.users.data');
        Route::get('users/{id}/delete', 'Admin\UserController@delete')->name('admin.users.delete');



        /* pengajaran siswa per kelas */
        Route::get('pengajaran-siswa-kelas/data', 'Admin\PengajaranSiswaKelasController@data')->name('admin.pengajaran-siswa-kelas.data');
        Route::get('pengajaran-siswa-kelas/{id}/delete', 'Admin\PengajaranSiswaKelasController@delete')->name('admin.pengajaran-siswa-kelas.delete');

        /* guru pengjar tiap kelapengajaran pengajaran pengajarans */
        Route::get('pengajaran-guru-kelas/data', 'Admin\PengajaranGuruKelasController@data')->name('admin.pengajaran-guru-kelas.data');
        Route::get('pengajaran-guru-kelas/{id}/delete', 'Admin\PengajaranGuruKelasController@delete')->name('admin.pengajaran-guru-kelas.delete');

        /* mata pelajaran tiap kelas */
        Route::get('pengajaran-pelajaran-kelas/data', 'Admin\PengajaranPelajaranKelasController@data')->name('admin.pengajaran-pelajaran-kelas.data');
        Route::get('pengajaran-pelajaran-kelas/{id}/delete', 'Admin\PengajaranPelajaranKelasController@delete')->name('admin.pengajaran-pelajaran-kelas.delete');

        /* mata pelajaran tiap kelas */
        Route::get('new-pengajaran/data', 'Admin\NewPengajaranController@data')->name('admin.new-pengajaran.data');
        Route::get('new-pengajaran/{id}/delete', 'Admin\NewPengajaranController@delete')->name('admin.new-pengajaran.delete');


        Route::resources([
            'guru' => 'Admin\GuruController',
            'siswa' => 'Admin\SiswaController',
            'kelas' => 'Admin\KelasController',
            'pelajaran' => 'Admin\PelajaranController',
            'users' => 'Admin\UserController',
            'pengajaran-siswa-kelas' => 'Admin\PengajaranSiswaKelasController',
            'pengajaran-guru-kelas' => 'Admin\PengajaranGuruKelasController',
            'pengajaran-pelajaran-kelas' => 'Admin\PengajaranPelajaranKelasController',
            'new-pengajaran' => 'Admin\NewPengajaranController',
        ], ['as' => 'admin']);
    });
});
