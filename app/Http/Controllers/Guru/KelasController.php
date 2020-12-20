<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\Kelas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('guru.kelas.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
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
        $request->validate($check);
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
        // $this->validatePostRequest($request);

        // $kelas = Kelas::find($id)->update($request->all());
        //  /* response data when success*/
        // if($kelas) return view('admin.kelas.index');
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
            $user = Auth::user();
            $guru = Guru::where('id_user', $user->id)->first();

            /* get id guru mengajar  */
            $guru_mengajar = Guru_mengajar::where('id_guru', $guru->id)->get()->pluck('id_kelas')->toArray();

            /* get kelas yang di ajar kan oleh guru */
            $result = Kelas::whereIn('id', $guru_mengajar);

            $kelas = $result->count() > 0 ? $result->get()->toquery() : [];

            return Datatables::of($kelas)
            ->addIndexColumn()
            ->addColumn('detail', function($query) {
                return "<div class='btn-group' role='group'>
                    <a href='".route('guru.data_pelajaran.show', $query->id)."' class='text-center btn btn-xs btn-info edit mr-2' id_target='".$query->id."'><span class='fas fa-1x fa-detail'></span>Detail Pelajaran</a>
                    <a href='".route('guru.data_siswa.show', $query->id)."' class='text-center btn btn-xs btn-info edit mr-2' id_target='".$query->id."'><span class='fas fa-1x fa-detail'></span>Detail siswa</a>
                    <!-- <a href='".route('guru.data_tugas.show', $query->id)."' class='text-center btn btn-xs btn-primary edit' id_target='".$query->id."'><span class='fas fa-1x fa-detail'></span>Detail tugas</a> -->
                </div>";
            })
            ->rawColumns(['detail'])
            ->make(true);
        }
        return abort(404);
    }
}
