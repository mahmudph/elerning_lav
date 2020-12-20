<?php

namespace App\Http\Controllers\Siswa;

use App\Siswa;
use App\Siswa_tugas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\PengerjaanTugas;
use App\Tugas_nilai;
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

        $user = Auth::user();
        $siswa = Siswa::whereIdUser($user->id)->first();
        $pel = Guru_mengajar::whereId($request->input('id_guru_mengajar'))->first()->pelajaran->id;

        $request->request->add([
            'id_pelajaran' => $pel,
            'id_siswa' => $siswa->id,
        ]);
        $request->validate([
            'id_siswa_tugas' => 'required|numeric',
            'id_tugas' => 'required|numeric',
            'id_pelajaran' => 'required|numeric',
            'id_siswa' => 'required|numeric',
            'jawaban' => 'required|string'
        ]);

        /* pengerjakaan tugas */
        PengerjaanTugas::create($request->all());

        // response back
        return redirect()->back()->with([
            'msg'=> 'berhasil mengerjakan tugas',
            'type' => 'success'
        ]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keterangan = Tugas_nilai::find($id)->keterangan;
        return view('siswa.tugas.detail-ket')->with('keterangan', $keterangan);

    }

    public function detail($id_kelas, $id_pengajaran) {
        $title= "Daftar Kelas" ;
        $halaman = "Data Kelas";


        $pelajaran= Guru_mengajar::find($id_pengajaran);
        return view('siswa.tugas.index')->with([
            'title' => $title,
            'halaman' => $halaman,
            'pelajaran' => $pelajaran,
            'id_pengajaran' => $id_pengajaran,
            'id_kelas' => $id_kelas,
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
        $pengerjaan = Siswa_tugas::find($id);
        return view('siswa.tugas.tambah')->with('pengerjaan', $pengerjaan);
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


        /*
    * @used for yijra datatables tabel kelas
    * @return query|abort
    */
    public function data(Request $request, $id_kelas, $id_pengajaran) {
        // if($request->ajax()) {

            $user = Auth::user();
            $result =  with(new Siswa_tugas)->getSiswaTugas($user->id, $id_kelas, $id_pengajaran);

            // dd($result->toquery());
            return Datatables::of($result)
            ->addIndexColumn()
            ->editColumn('created_at', function($q) {
                $time = strtotime($q->created_at);
                return date('y-M-d', $time);
            })
            ->editColumn('dikerjakan', function($q) {
                if($q->dikerjakan) {
                    $time = strtotime($q->created_at);
                    return date('y-M-d', $time);
                } else {
                    return '<span class="btn btn-xs btn-info">belum dikerjakan</span>';
                }
            })
            ->editColumn('nilai', function($q) {
                return $q->nilai ? $q->nilai : '<span class="btn btn-xs btn-info">belum dinilai</span>';
            })
            ->addColumn('keterangan', function($q) {
                if($q->nilai) {
                    return "<a href='#' class='text-center btn btn-xs btn-info detail' data-toggle='modal' data-target='#modalContent' id_target='".$q->id_nilai_tugas."'><span class='fas fa-1x fa-eye'></span></a>";
                }
                return '-';
            })
            ->addColumn('action', function($query) {
                if($query->dikerjakan) {
                    return " <button class='text-center btn btn-xs btn-info' disabled><span class='fas fa-1x fa-edit'></span></button>";
                }
                 return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info tambah' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                </div>";
            })
            ->rawColumns(['detail', 'action', 'lihat_soal', 'nilai', 'dikerjakan', 'keterangan'])
            ->make(true);
        // }
        // return abort(404);
    }
}
