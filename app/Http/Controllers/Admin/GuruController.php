<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\User;
use App\Guru_mengajar;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar Guru" ;
        $halaman = "Data Guru";
        return view('admin.guru.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* get all id user from guru */
        $gurus = Guru::pluck('id_user')->toArray();
        /* select user which has become a guru */
        $users = User::whereNotIn('id', $gurus)->where('role', 'guru')->pluck('name','id');
        return view('admin.guru.tambah')->with('users', $users);
    }

    /**
    * @metod for chec vaidation
    */
    public function validatePostRequest($request) {
        /* validatasi data post */
        $check = [
            'id_user' => 'required|number',
            'nama_siswa' => 'required',
            'nip' => 'required',
            'gender' => 'required|number|in:[1,2]',
            'nomer_hp' => 'required',
            'tgl_lahir' => 'required|date', 
            'tempat_lahir' => 'required',
            'lulusan' => 'required',
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
        $this->validatePostRequest($request);
        $guru = Guru::create($request->all());
        if($guru) return view('admin.guru.index');
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
        /* current guru  */
        $guru = Guru::find($id);
        /* get all id user from guru */
        $gurus = Guru::pluck('id_user')->toArray();
        /* select user which has become a guru */
        $users = User::whereNotIn('id', $gurus)->where('role', 'guru')->pluck('name','id');
        return view('admin.guru.edit')->with(['guru' => $guru, 'users' => $users]);
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

        $guru = Guru::find($id)->update($request->all());
        if($guru) return view('admin.guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Guru::find($id)->delete();
        return view('admin.guru.index')->with(['msg' => 'Berhasil menghapus guru', 'type' => 'success']);

    }

    public function delete($id) {
        $guru = Guru::find($id);
        return view('admin.guru.delete')->with('guru', $guru);
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
            /* check id_kelas */
            $id_kelas = $request->get('id_kelas');
            if($id_kelas) {
                /* get guru berdasarkan id_kelas */
                $guru = Guru_mengajar::where('id_kelas', $id_kelas)->pluck('id_guru');
                $result = Guru::whereIn('id', $guru);
                /* check data */
                $gurus = $result->count() > 0 ? $result->get()->toquery() : [];
            } else {
                $gurus = Guru::query();
            }
            return Datatables::of($gurus)
            ->addIndexColumn()
            ->editColumn('gender', function($query) {
                return config('master.gender.'.$query->gender);
            })
            ->addColumn('action', function($query) use($id_kelas) {
                if($id_kelas != null) {
                    return " <a href='#' class='text-center btn btn-xs btn-danger delete' data-toggle='modal' data-target='#modalContent' id_target='".$query->mengajar[0]->id."'><span class='fas fa-1x fa-trash'></span></a>";
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
