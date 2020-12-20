<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\User;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title= "Dashboard" ;
        $halaman = "Dashboard";

        /* 
        * @get statistik data elearning
        */
        $home = [
            'count_kelas' =>  Kelas::count(),
            'count_guru' => Guru::count(),
            'count_siswa' => Siswa::count(),
            'count_user' => User::count(),
        ];

        /* data respon */
        $respon = [ 
            'title' => $title, 
            'halaman' => $halaman, 
            'home' => $home 
        ];
        return view('admin.home.index')->with($respon);
    }
 
}
