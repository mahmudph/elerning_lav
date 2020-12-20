<?php

namespace App\Http\Controllers\Admin;

use App\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

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
    public function create()
    {
        return view('admin.pengajaran.pengajaran-siswa-kelas.tambah');
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
        $title= "Daftar Siswa" ;
        $halaman = "Data Siswa";
        $kelas = Kelas::find($id);
        return view('admin.pengajaran.pengajaran-siswa-kelas.detail')->with([ 'title' => $title, 'halaman' => $halaman, 'id' => $id, 'kelas' => $kelas ]);
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

        /**
     * get delete vieew 
     * @param int $id
     * return response 
     */
    public function delete($id) {

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
