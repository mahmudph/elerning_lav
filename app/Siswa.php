<?php

namespace App;

use App\Siswa_kelas;
use App\Siswa_pelajaran;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_siswa', 
        'nis', 
        'gender', 
        'nomer_hp', 
        'tgl_lahir', 
        'tempat_lahir', 
        'alamat', 
    ];

    public function kelas() {
        $this->belongsTo(Siswa_kelas::class);
    }

    public function pelajaran() {
        $this->belongsToMany(Siswa_pelajaran::class);
    }

}
