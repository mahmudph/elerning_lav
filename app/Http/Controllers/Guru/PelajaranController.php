<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Kelas;
use App\Pelajaran;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Pelajaran Kelas" ;
        $halaman = "Data Pelajaran Kelas";
        return view('guru.pelajaran.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
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
        $title= "Daftar Pelajaran Kelas" ;
        $halaman = "Data Pelajaran Kelas";
        $kelas = Kelas::find($id);
        return view('guru.pelajaran.index')->with([
             'title' => $title,
             'halaman' => $halaman,
             'id_kelas' => $id,
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

      public function destroy(Request $request, $id)
    {
        Pelajaran::find($id)->delete();
        return view('guru.pelajaran.index')->with(['msg' => 'Berhasil menghapus pelajaran', 'type' => 'success']);
    }

    public function delete($id) {
        $pelajaran = Pelajaran::find($id);
        return view('guru.pelajaran.delete')->with('kelas', $pelajaran);
    }

    /*
    * @used for yijra datatables tabel kelas
    * @return query|abort
    * params int | null id_kelas
    */
    public function data(Request $request, $id= null) {
        if($request->ajax()) {
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();

            /* get id guru mengajar  */
            $peleajaran = Guru_mengajar::where('id_guru', $guru->id)->get()->pluck('id_pelajaran')->toArray();

            /* get kelas yang di ajar kan oleh guru */
            $result = Pelajaran::whereIn('id', $peleajaran);

            $pelajaran = $result->count() > 0 ? $result->get()->toquery() : [];

            return Datatables::of($pelajaran)
            ->addIndexColumn()
            ->addColumn('detail', function($query) {
                return "<div class='btn-group' role='group'>
                    <a href='".route('guru.data_tugas.show', $query->id)."' class='text-center btn btn-xs btn-primary edit' id_target='".$query->id."'><span class='fas fa-1x fa-detail'></span>Detail tugas</a>
                </div>";
            })
            ->rawColumns(['detail'])
            ->make(true);
        }
        return abort(404);
    }
}
