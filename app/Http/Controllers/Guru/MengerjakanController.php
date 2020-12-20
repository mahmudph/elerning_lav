<?php

namespace App\Http\Controllers\Guru;

use App\Guru_mengajar;
use App\Tugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\PengerjaanTugas;
use App\Siswa_tugas;
use App\Tugas_nilai;

class MengerjakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title= "Daftar Siswa Mengerjakan" ;
        $halaman = "Data Siswa Mengerjakan";
        return view('guru.mengerjakan.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
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
     * detail data
     *
     */
    public function detail($id)
    {
        $pengerjaan = PengerjaanTugas::find($id);
        return view('guru.mengerjakan.detail')->with('pengerjaan', $pengerjaan);

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
            'id_pengerjaan_tugas' => 'required|numeric',
            'keterangan' => 'string|max:255'
        ]);

        /* update data when exsist or create data if none */
        Tugas_nilai::updateOrCreate([
            'id_pengerjaan_tugas' => $request->input('id_pengerjaan_tugas'),
        ],$request->all());

        /* redirect back */
        return redirect()->route('guru.data_mengerjakan.show', $request->input('id_pengerjaan_tugas'))->with([
            'msg' => 'berhasil memberikan nilai',
            'success'
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
        $title= "Daftar Siswa Mengerjakan" ;
        $halaman = "Data Siswa Mengerjakan";
        $tugas = Tugas::find($id);
        $kelas = Siswa_tugas::whereIdTugas($id)->first();


        return view('guru.mengerjakan.index')->with([
            'title' => $title,
            'halaman' => $halaman,
            'tugas' => $tugas,
            'kelas' => $kelas != null ? $kelas->kelas->first() : null,
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
        $pengerjaan = PengerjaanTugas::find($id);
        return view('guru.mengerjakan.edit')->with('pengerjaan', $pengerjaan);
    }

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
        $pengajar = Tugas::whereId($id)->first();

        return view('admin.pengajaran.pengajaran-guru-kelas.delete')->with('pengajaran', $pengajar);
    }

        /*
    * @used for yijra datatables tabel kelas
    * @return query|abort
    */
    public function data(Request $request, $id_tugas) {
        if($request->ajax()) {
            /* get all pengerjaan tugas */
            $tugas = PengerjaanTugas::whereIdTugas($id_tugas);
            $siswa_tugas = $tugas->count() > 0 ? $tugas->get()->toquery() : [];

            return Datatables::of($siswa_tugas)
            ->addIndexColumn()
            ->editColumn('id_siswa', function($q) {
                return $q->siswa->nama_siswa;
            })
            ->editColumn('id_pelajaran', function($q) {
                return $q->pelajaran->nama_pelajaran;
            })
            ->editColumn('id_tugas', function($q) {
                return $q->tugas->nama_siswa;
            })
            ->addColumn('nilai', function($q) {
                return $q->tugas_nilai->nilai ?? "<span class='btn btn-info btn-xs '>Belum dinilai</span>";
            })
            ->editColumn('created_at', function($q) {
                  $time = strtotime($q->created_at);
                return date('y-M-d', $time);
            })
            ->addColumn('lihat_jawaban', function($query) {
                 return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-primary detail' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-eye'></span></a>
                </div>";
            })
            ->addColumn('action', function($query) {
                 return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info edit' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                </div>";
            })
            ->rawColumns(['detail','nilai', 'action','lihat_jawaban'])
            ->make(true);
        }
        return abort(404);
    }
}
