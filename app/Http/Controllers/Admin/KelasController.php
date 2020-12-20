<?php

namespace App\Http\Controllers\Admin;

use App\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
class KelasController extends Controller
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
        return view('admin.kelas.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.kelas.tambah');
    }

    /*
    * metod for chec vaidation
    */
    public function validatePostRequest($request) {
        /* validatasi data post */
        $check = [
            'nama_kelas' => 'required',
            'jumlah_bangku' =>'required',
            'jumlah_kursi' =>'required'
        ];
        return $request->validate($check);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input
        $this->validatePostRequest($request);
        $kelas = Kelas::create($request->all());

        /* response */
        if($kelas) return view('admin.kelas.index');
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
        $kelas = Kelas::find($id);
        return view('admin.kelas.edit')->with('kelas', $kelas);
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
        /* request validate */
        $this->validatePostRequest($request);

        $kelas = Kelas::find($id)->update($request->all());
         /* response data when success*/
        if($kelas) return view('admin.kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Kelas::find($id)->delete();
        return view('admin.kelas.index')->with(['msg' => 'Berhasil menghapus kelas', 'type' => 'success']);
    }

    public function delete($id) {
        $kelas = Kelas::find($id);
        return view('admin.kelas.delete')->with('kelas', $kelas);
    }

    /* 
    * @used for yijra datatables tabel kelas
    * @return query|abort
    * params int | null id_kelas
    */
    public function data(Request $request, $id= null) {
        if($request->ajax()) {
            $kelas = Kelas::query();
            return Datatables::of($kelas)
            ->addIndexColumn()
            ->editColumn('jmlh_bangku', function($q) {
                return "<span class='text-center'>".$q->jmlh_bangku."</span>";
            })
             ->editColumn('jmlh_kursi', function($q) {
                return "<span class='text-center'>".$q->jmlh_kursi."</span>";
            })
            ->addColumn('action', function($query) {
                return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info edit' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                    <a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-trash'></span></a>
                </div>";
            })
            ->rawColumns(['jmlh_bangku', 'jmlh_kursi', 'action'])
            ->make(true);
        } 
        return abort(404);
    }
}
