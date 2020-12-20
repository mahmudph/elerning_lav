<?php

namespace App;

use App\Siswa;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class Siswa_kelas extends Model
{
     /* tabel name */
    protected $table = 'tbl_siswa_kelas';
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
        'id_kelas',
        'id_siswa'
    ];


    public function siswa() {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
        // return $this->hasMany(Siswa::class, 'id', 'id_siswa');
        // return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas','id');
        // return $this->hasMany(Kelas::class, 'id','id_kelas');
    }

    public function kelas_pengajaran()
    {
        return $this->hasMany(Guru_mengajar::class, 'id_kelas', 'id_kelas');
    }
}
