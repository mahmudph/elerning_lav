<?php

namespace App\Http\Controllers\Guru;

use App\Guru;
use App\User;
use App\Kelas;
use App\Siswa;
use App\Siswa_kelas;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Siswa" ;
        $halaman = "Data Siswa";
        return view('guru.siswa.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* get all id user from siswa */
        $siswas = Siswa::pluck('id_user')->toArray();
        /* select user which has become a siswa */
        $users = User::whereNotIn('id', $siswas)->where('role', 'siswa')->pluck('name','id');
        return view('admin.siswa.tambah')->with('users', $users);
    }


    /*
    * metod for chec vaidation
    */
    public function validatePostRequest($request) {
        /* validatasi data post */
        $check = [
            'id_user' => 'required|number',
            'nama_siswa' => 'required',
            'nis' => 'required',
            'gender' => 'required|number|in:[1,2]',
            'nomer_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required',
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
        /* validate input post */
        $this->validatePostRequest($request);

        /* create new siswa */
        $siswa = Siswa::create($request->all());

        /* return view when success  */
        if($siswa) return view('admin.siswa.index');
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
        return view('guru.siswa.index')->with([
            'title' => $title,
            'halaman' => $halaman,
            'id_kelas' => $id ,
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
        /* current siswa */
        $siswa = Siswa::find($id);
        /* get all id user from siswa */
        $siswas = Siswa::pluck('id_user')->toArray();
        /* select user which has become a siswa */
        $users = User::whereNotIn('id', $siswas)->where('role', 'siswa')->pluck('name','id');
        return view('admin.siswa.edit')->with(['siswa' => $siswa, 'users'=> $users]);
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
        $this->validatePostRequest($request);
        $siswa = Siswa::find($id)->update($request->all());

        /* return when it's done */
        if($siswa) return view('admin.siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Siswa::find($id)->delete();
        return view('admin.siswa.index')->with(['msg' => 'Berhasil menghapus siswa', 'type' => 'success']);
    }
    /**
     * function delete item pelajaran
     * @params id pelajaran as int
     * return view
     */
    public function delete($id) {
        $siswa = Siswa::find($id);
        return view('admin.siswa.delete')->with('siswa', $siswa);
    }

    /**
     * function to render yijra data table
     * @params
     * return view
     */
    public function data(Request $request,$id_kelas) {

        // if($request->ajax()) {
            /* find id guru based auth login */
            $user = Auth::user();
            /* guru */
            $guru = Guru::whereIdUser($user->id)->first();
            /* data guru mengajar */
            $data = Guru_mengajar::where('id_guru', $guru->id);
            $kelas_avalable = $data->get()->pluck('id_kelas')->toArray();

            /* check id_kelas */
            if($id_kelas && in_array($id_kelas, $kelas_avalable)) {
                /* get siswa berdasarkan id_kelas */
                $result = Siswa_kelas::where('id_kelas', $id_kelas)->groupby('id_siswa');
                /* check data */

                // dd($result->get()->toquery());
                $siswa = $result->count() > 0 ? $result->get()->toquery() : [];
            } else {
                $siswa = [];
            }
            return Datatables::of($siswa)
            ->addIndexColumn()
            ->editColumn('nis', function($query) use($id_kelas) {
                if($id_kelas) {
                    return $query->siswa->nis;
                }
                return $query->nama_siswa;
            })

            ->editColumn('nama_siswa', function($query)use($id_kelas) {
                if($id_kelas) {
                    return $query->siswa->nama_siswa;
                }
                return $query->nama_siswa;

            })
            ->editColumn('nomer_hp', function($query)use($id_kelas) {
                if($id_kelas) {
                    return $query->siswa->nomer_hp;
                }
                return $query->nama_siswa;

            })
            ->editColumn('gender', function($query) use($id_kelas) {
                if($id_kelas) {
                    if($query->siswa->gender)
                        return config('master.gender.'.$query->siswa->gender);
                    else
                        return null;
                } else {
                    return config('master.gender.'.$query->gender);
                }
            })
            ->addColumn('action', function($query) use ($id_kelas) {
                if($id_kelas) {
                    return "<a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$id_kelas."'><span class='fas fa-1x fa-trash'></span></a>";
                }
                return "<div class='btn-group' role='group'>
                    <a href='#' class='text-center btn btn-xs btn-info edit' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-edit'></span></a>
                    <a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->id."'><span class='fas fa-1x fa-trash'></span></a>
                </div>";
            })
            ->make(true);
    //    }
    //    return abort(404);

    }

}
