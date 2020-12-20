<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\Kelas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PengajaranGuruKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Kelas" ;
        $halaman = "Data Kelas";
        return view('admin.pengajaran.pengajaran-guru-kelas.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::pluck('id', 'nama_guru')->toArray();
         return view('admin.pengajaran.pengajaran-guru-kelas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title= "Daftar Guru" ;
        $halaman = "Data Guru";
        $kelas = Kelas::find($id);
        return view('admin.pengajaran.pengajaran-guru-kelas.detail')->with([ 'title' => $title, 'halaman' => $halaman, 'id' => $id, 'kelas' => $kelas ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        Guru_mengajar::where('id_guru', $id)->delete();
        return redirect('admin.pengajaran.pengajaran-guru-kelas.index')
            ->with(['msg' => 'berhasil menghapus data', 'type' => 'success']);
    }

    /**
     * get delete vieew 
     * @param int $id
     * return response 
     */
    public function delete($id) {
        $pengajar = Guru_mengajar::whereId($id)->first();

        return view('admin.pengajaran.pengajaran-guru-kelas.delete')->with('pengajaran', $pengajar);
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
                return "<a class='btn btn-info btn-xs' href='".route('admin.pengajaran-guru-kelas.show', $q->id)."'>Detail</a>";
            }) 
            ->rawColumns(['detail'])
            ->make(true);
        } 
        return abort(404);
    }

}
