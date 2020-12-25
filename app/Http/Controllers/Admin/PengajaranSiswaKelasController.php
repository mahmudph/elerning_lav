<?php

namespace App\Http\Controllers\Admin;

use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Siswa_kelas;

class PengajaranSiswaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Pelajaran" ;
        $halaman = "Data Pelajaran";
        return view('admin.pengajaran.pengajaran-siswa-kelas.index')->with([
            'title' => $title,
            'halaman' => $halaman,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_kelas = $request->input("id_kelas");
        if($id_kelas) {
            /* get siswa yang sudah menjadi siswa kelas */
            $siswa_kelas = Siswa_kelas::whereIdKelas($id_kelas)->get()->pluck('id_siswa')->toArray();

            $siswas = Siswa::whereNotIn('id', $siswa_kelas)->pluck('nama_siswa', 'id')->toArray();
            $kelas = Kelas::find($request->input('id_kelas'));
            return view('admin.pengajaran.pengajaran-siswa-kelas.tambah')->with(['siswas' =>$siswas, 'kelas' => $kelas]);
        } else {
            return redirect()->back()->with([
                'msg' => 'kelas id tidak ditemukan',
                'type' => 'error'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'numeric|required',
            'id_siswa' => 'numeric|required',
        ]);
        $result = Siswa_kelas::create($request->all());
        if($result) {
            return redirect()->route('admin.pengajaran-guru-kelas.index')->with([
                'msg'=> 'Berhasil menambah data siswa',
                'type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg'=> 'Gagal menambah data siswa',
                'type' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title= "Daftar Siswa" ;
        $halaman = "Data Siswa";
        $kelas = Kelas::find($id);

        return view('admin.pengajaran.pengajaran-siswa-kelas.detail')->with([
            'id' => $id,
            'title' => $title,
            'halaman' => $halaman,
            'kelas' => $kelas,
        ]);
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
        Siswa_kelas::find($id)->delete();
        return view('admin.pengajaran.pengajaran-siswa-kelas.index')->with([
            'msg' => 'Berhasil menghapus siswa',
            'type' => 'success'
        ]);
    }

        /**
     * get delete vieew
     * @param int $id
     * return response
     */
    public function delete($id) {
        $siswa_kelas = Siswa_kelas::find($id);
        return view('admin.pengajaran.pengajaran-siswa-kelas.delete')->with('siswa_kelas', $siswa_kelas);
    }

        /*
    * @used for yijra datatables tabel kelas
    * @return query|abort
    */
    public function data(Request $request) {
        if($request->ajax()) {
            $kelas = Kelas::query();
            return Datatables::of($kelas)
            ->addIndexColumn()
            ->addColumn('detail', function($q) {
                return "<a class='btn btn-xs btn-info text-center' href='".route('admin.pengajaran-siswa-kelas.show', $q->id)."'>Detail</a>";
            })
            ->rawColumns(['detail'])
            ->make(true);
        }
        return abort(404);
    }
}
