<?php


namespace App\Http\Controllers\Admin;
use App\Guru;
use App\Kelas;
use App\Pelajaran;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class NewPengajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Pengajaran" ;
        $halaman = "Data Pengajaran";
        return view('admin.newpengajaran.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kelas = Kelas::pluck('nama_kelas', 'id')->toArray();
        $gurus = Guru::pluck('nama_guru','id')->toArray();
        $pelajarans = Pelajaran::pluck('nama_pelajaran', 'id')->toArray();

        return view('admin.newpengajaran.tambah')->with([
            'gurus' => $gurus,
            'kelas' => $kelas,
            'pelajarans' => $pelajarans
        ]);
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
            'id_pelajaran' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
        ]);
        $result = Guru_mengajar::create($request->all());
        /* redirect data */
        if($result) return redirect()->route('admin.new-pengajaran.index')->with([
            'msg' => 'Berhasil menambah pengajaran',
            'type' => 'success',
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
        $pengajaran = Guru_mengajar::find($id);
        $kelas = Kelas::pluck('nama_kelas', 'id')->toArray();
        $gurus = Guru::pluck('nama_guru', 'id')->toArray();
        $pelajarans = Pelajaran::pluck('nama_pelajaran', 'id')->toArray();

        return view('admin.newpengajaran.edit')->with([
            'pengajaran' => $pengajaran,
            'gurus' => $gurus,
            'kelas' => $kelas,
            'pelajarans' => $pelajarans
        ]);
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
            'id_guru' => 'required|numeric',
            'id_pelajaran' => 'required|numeric',
            'id_kelas' => 'required|numeric',
        ]);

        /* update  data */
        Guru_mengajar::find($id)->update($request->all());
        /* render response message */
        return view('admin.newpengajaran.edit')->with([
            'msg' => 'berhasil mengedit pengajaran',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Guru_mengajar::find($id)->delete();
        return view('admin.newpengajaran.index')->with(['msg' => 'Berhasil menghapus pengajaran', 'type' => 'success']);
    }

    public function delete($id) {
        $pengajaran = Guru::find($id);
        return view('admin.newpengajaran.delete')->with('pengajaran', $pengajaran);
    }

    /**
     * function to render yijra data table
     * @params  request,
     * query string as id kelas
     * return view
     */
    public function data(Request $request)
    {
        if($request->ajax()) {
            /* get guru berdasarkan id_kelas */
            $pengajaran =  with(new Guru_mengajar)->get_pengajaran();
            return Datatables::of($pengajaran)
            ->addIndexColumn()
            ->filterColumn('nama_kelas', function($q, $keyword) {
                return $q->where('nama_kelas','like', '%'.$keyword.'%');
            })
            ->filterColumn('nama_guru', function($q, $keyword) {
                return $q->where('nama_guru', 'like', '%'.$keyword.'%');
            })
            ->filterColumn('nama_pelajaran', function($q, $keyword) {
                return $q->where('nama_pelajaran','like', '%'.$keyword.'%');
            })
            ->addColumn('action', function($query)  {
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
