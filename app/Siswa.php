<?php

namespace App;

use App\Siswa_kelas;
use App\Siswa_pelajaran;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
     /* tabel name */
    protected $table = 'tbl_siswas';
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
        return $this->belongsTo(Siswa_kelas::class, 'id','id_siswa');
    }

    public function pelajaran() {
        return $this->belongsToMany(Siswa_pelajaran::class);
    }

}
