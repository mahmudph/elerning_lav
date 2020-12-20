<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Kelas;
use App\Tugas;
use App\Siswa_tugas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Pelajaran;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pelajaran_id = $request->input('id_pelajaran');
        return view('guru.tugas.tambah')->with('pelajaran_id', $pelajaran_id);
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
            'nama_tugas' => 'required|max:150',
            'soal' => 'required',
            'id_pelajaran' => 'required|numeric'
        ]);
        /* creaate tugas */
        $tugas = Tugas::create($request->all());

        $user = Auth::user();

        /* get guru id */
        $guru =  Guru::where('id_user', $user->id)->first();

        /* get id guru mengajar  */
        $guru_mengajar = Guru_mengajar::where([
            'id_guru' => $guru->id,
            'id_pelajaran' => $request->input('id_pelajaran')
        ])->first();

        $siswa_tugas = Siswa_tugas::insert([
            'id_tugas' => $tugas->id,
            'id_kelas' =>  $guru_mengajar->id_kelas,
            'id_guru_mengajar' => $guru_mengajar->id,
        ]);

        if($siswa_tugas) {
            return redirect()->route('guru.data_tugas.index')->with([
                'msg' => 'berhasil menambahkan data tugas',
                'type' => 'success',
            ]);
        } else {
            return view('guru.tugas.tambah');
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
        $title= "Daftar Kelas" ;
        $halaman = "Data Kelas";
        $pelajaran= Pelajaran::find($id);
        return view('guru.tugas.index')->with([
            'title' => $title,
            'halaman' => $halaman,
            'pelajaran' => $pelajaran
        ]);
    }


    public function detail($id) {
        $tugas = Tugas::find($id);
        return view('guru.tugas.detail')->with('tugas', $tugas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return view('guru.tugas.edit')->with('tugas', $tugas);
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
        $request->validate([
            'nama_tugas' => 'required|max:150',
            'soal' => 'required',
        ]);

        Tugas::find($id)->update($request->all());
        return redirect()->route('guru.data_tugas.index')->with([
            'msg'=> 'berhasil mengedit data tugas',
            'type' => 'succcess',
        ]);
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tugas::where('id', $id)->delete();
        return redirect()->back()->with(['msg' => 'berhasil menghapus tugas', 'type' => 'success']);
    }

    /**
     * get delete vieew
     * @param int $id
     * return response
     */
    public function delete($id) {
        $tugas = Tugas::whereId($id)->first();
        return view('guru.tugas.delete')->with('tugas', $tugas);
    }

        /*
    * @used for yijra datatables tabel kelas
    * @return query|abort
    */
    public function data(Request $request, $id_pelajaran) {
        if($request->ajax()) {
            $user = Auth::user();
            /* get guru id */
            $guru =  Guru::where('id_user', $user->id)->first();

            /* get id guru mengajar  */
            $guru_mengajar = Guru_mengajar::where([
                'id_guru' => $guru->id,
                'id_pelajaran' => $id_pelajaran
            ])->get()->pluck('id')->toArray();

            $result =  Siswa_tugas::whereIn('id_guru_mengajar', $guru_mengajar)->get()->pluck('id_tugas');
            $tugas = Tugas::whereIn('id', $result->toArray());
            // dd($tugas->get());

            $siswa_tugas = $tugas->count() > 0 ? $tugas->get()->toquery() : [];

            return Datatables::of($siswa_tugas)
            ->addIndexColumn()
            ->addColumn('detail', function($q) {
                return "<a class='btn btn-info btn-xs text-center' href='".route('guru.data_mengerjakan.show', $q->id)."'>Detail</a>";
            })
            ->addColumn('lihat_soal', function($q) {
                return "<a href='#' class='text-center btn btn-xs btn-primary detail' data-toggle='modal' data-target='#modalContent' id_target='".$q->id."'><span class='fas fa-1x fa-eye'></span></a>";
            })
            ->editColumn('created_at', function($q) {
                $time = strtotime($q->created_at);
                return date('y-M-d', $time);
            })
            ->addColumn('action', function($query) {
                 return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info edit' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                    <a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-trash'></span></a>
                </div>";
            })
            ->rawColumns(['detail', 'action', 'lihat_soal'])
            ->make(true);
        }
        return abort(404);
    }

}
