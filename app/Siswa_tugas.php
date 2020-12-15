<?php

namespace App;

use App\Siswa;
use App\Tugas;
use App\Pelajaran;
use App\Guru_mengajar;
use App\Tugas_nilai;
use Illuminate\Database\Eloquent\Model;

class Siswa_tugas extends Model
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
        'id_tugas', 
        'id_kelas', 
        'id_guru_mengajar', 
    ];

    public function kelas() {
        $this->bilongsToMany(Kelas::class);
    }
    public function tugas()
    {
        $this->hasMany(Tugas::class);
    }
   
    public function guru_mengajar() {
        $this->bilongsToMany(Guru_mengajar::class);
    }

    public function nilai() {
        $this->hasOne(Tugas_nilai::class);
    }

}
