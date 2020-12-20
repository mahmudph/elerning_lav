<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\User;
use App\Kelas;
use App\Siswa;
use App\Tugas;
use App\Siswa_kelas;
use App\Siswa_tugas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Dashboard" ;
        $halaman = "Dashboard";

        /* find id guru based auth login */
        $user = Auth::user();
        /* guru */
        $guru = Guru::whereIdUser($user->id)->first();

        /* data guru mengajar */
        $data = Guru_mengajar::where('id_guru', $guru->id);
        $data_guru_mengajar = $data->get()->pluck('id');
        /* get data statistik pengajaran     */
        $home = [
            'count_kelas' =>  Kelas::WhereIn('id', $data->get()->pluck('id_kelas'))->count() ,
            'count_pelajaran' => Guru_mengajar::whereIdGuru($guru->id)->count(),
            'count_siswa' => Guru_mengajar::with('siswa_kelas')->whereIdGuru($guru->id)->count(),
            'count_tugas' => Siswa_tugas::whereIn('id_guru_mengajar',isset($data_guru_mengajar) ? $data_guru_mengajar->toArray() : null)->count(),
        ];
        /* data respon */
        $respon = [
            'title' => $title,
            'halaman' => $halaman,
            'home' => $home
        ];

        return view('guru.home.index')->with($respon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
