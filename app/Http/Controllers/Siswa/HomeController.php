<?php

namespace App\Http\Controllers\Siswa;

use App\Guru;
use App\Siswa;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa_kelas;
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

        $title = "Dashboard";
        $halaman = "Dashboard";

        $user = Auth::user();

        $siswas = Siswa::whereIdUser($user->id)->first();
        /* check jika user sudah menjadi siswa */
        if($siswas) {
            /* check jika siswa sudah mendapat kelas  */
            $siswa_kelas = Siswa_kelas::whereIdSiswa($siswas->id)->first();
            if($siswa_kelas) {
                $pengajarans = Guru_mengajar::whereIdKelas($siswa_kelas->id_kelas)->get();
                /* check jika siswa sudah mendapatkan pelajarans  */
                $temp = [];
                foreach($pengajarans as $key => $pengajar) {
                    $temp[$key]['id'] = $pengajar->id;
                    $temp[$key]['id_pelajaran'] =isset($pengajar->pelajaran->id) ? $pengajar->pelajaran->id : '';
                    $temp[$key]['nama_pelajaran'] = isset($pengajar->pelajaran->nama_pelajaran) ? $pengajar->pelajaran->nama_pelajaran : '';
                    $temp[$key]['deskripsi_pelajaran'] = isset($pengajar->pelajaran->deskripsi) ? $pengajar->pelajaran->deskripsi : '';
                    $temp[$key]['id_kelas'] = isset($pengajar->kelas->id) ? $pengajar->kelas->id : '';
                    $temp[$key]['nama_kelas'] = isset($pengajar->kelas) ? $pengajar->kelas->nama_kelas : "";
                    $temp[$key]['nama_guru'] = isset($pengajar->guru) ? $pengajar->guru->nama_guru : "";
                }

                // dd($temp);
                $response = ['pelajarans' => $temp, 'title' => $title, 'halaman' => $halaman];
            } else {
                $response = ['pelajarans' => null, 'msg' => "anda Belum memiliki pelajarans", 'type' => 'info', 'title' => $title, 'halaman' => $halaman];
            }

        } else {
            /* jika hanya siswa belum menjadi user */
            $response = ['pelajarans' => null, 'msg' => "anda Belum menjadi siswa", 'type' => 'info', 'title' => $title, 'halaman' => $halaman];
        }

        return view('siswa.home.index')->with($response);


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
    public function update(Request $request, $id)
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
