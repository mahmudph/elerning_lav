<?php

namespace App\Http\Controllers\Admin;

use App\Pelajaran;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class PelajaranController extends Controller
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
        return view('admin.pelajaran.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelajaran.tambah');
    }

     /*
    * metod for chec vaidation
    */
    public function validatePostRequest($request) {
        /* validatasi data post */
        $check = ['nama_pelajaran' => 'required', 'deskripsi' => 'required'];
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
        /* check post input */
        $this->validatePostRequest($request);
        $pelajaran = Pelajaran::create($request->all());

        if($pelajaran) return view('admin.pelajaran.index');

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
        $pelajaran = Pelajaran::find($id);
        return view('admin.pelajaran.edit')->with('pelajaran', $pelajaran);
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
        /* check post input */
        $this->validatePostRequest($request);

        $pelajaran = Pelajaran::find($id)->update($request->all());
        if($pelajaran) return view('admin.pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelajaran::find($id)->delete();
        return view('admin.pelajaran.index')->with(['msg' => 'Berhasil menghapus pelajaran', 'type' => 'info']);
    }
     /**
     * function delete item pelajaran
     * @params id pelajaran as int
     * return view
     */
    public function delete($id) {
        $pelajaran = Pelajaran::find($id);
        return view('admin.pelajaran.delete')->with('pelajaran', $pelajaran);
    }
    /**
     * function to render yijra data table
     * @params  request
     * return view
    */
    public function data(Request $request) {
       if($request->ajax()) {
             /* check id_kelas */
            $id_kelas = $request->get('id_kelas');
            if($id_kelas) {

                /* get pelajaran id by id kelas */
                $pel = Guru_mengajar::where('id_kelas', $id_kelas)->pluck('id_pelajaran')->toArray();
                /* get pelajaran by idkelas  */
                $result = Pelajaran::whereIn('id', $pel);

                /* check data */
                $pelajaran = $result->count() > 0 ? $result->get()->toquery() : [];

            } else {
                $pelajaran = Pelajaran::query();
            }
            return Datatables::of($pelajaran)
            ->addIndexColumn()
            ->addColumn('action', function($query) use($id_kelas) {
                if($id_kelas != null) {
                    return "<a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-trash'></span></a>";
                }
                return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info edit' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                    <a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-trash'></span></a>
                </div>";
            })
            ->make(true);
       }
       return abort(404);
    }
}
