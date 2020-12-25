<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= "Daftar User" ;
        $halaman = "Data User";
        return view('admin.user.index')->with([ 'title' => $title, 'halaman' => $halaman ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('name','id');
        return view('admin.user.tambah')->with('users', $users);
    }

    /*
    * metod for chec vaidation
    */
    public function validatePostRequest($request, $aksi="create") {
        /* validatasi data post */
        if($aksi === 'create') {
            $check = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'conf_pass' => 'required|min:8|same:password',
                'role' => 'required'
            ];
        } else {
             $check = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:8',
                'conf_pass' => 'nullable|min:8|same:password',
                'role' => 'required'
            ];
        }
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
        /* validate data */
        $this->validatePostRequest($request);

        /* simpan data  */
        $user = User::create($request->all());

        /* check data */
        if($user) return view('admin.user.index');

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
        $user = User::find($id);
        return view('admin.user.edit')->with('user', $user);
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
         /* validate data */
        $this->validatePostRequest($request, 'update');
        $user = User::find($id)->update($request->all());
        /* check if update success */
        if($user) return view('admin.user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return view('admin.user.index')->with(['msg' => 'Berhasil menghapus user', 'type' => 'success']);
    }

    /**
     * get user and confirmasi delete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $user = User::find($id);
        return view('admin.user.delete')->with('user', $user);
    }

     /**
     * function to render yijra data table
     * @params
     * return view
     */
    public function data(Request $request)
    {
        if($request->ajax()) {
            $users = User::query();
            return Datatables::of($users)
            ->addIndexColumn()
            ->editColumn('password', function($q){
                return '***********';
            })
            ->addColumn('action', function($query) {
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
