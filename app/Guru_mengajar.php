<?php

namespace App;
use App\Guru;
use App\Pelajaran;
use App\Siswa_tugas;
use Illuminate\Database\Eloquent\Model;

class Guru_mengajar extends Model
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
        'id_guru', 
        'id_pelajaran'
    ];

    public function guru() {
        $this->belongsToMany(Guru::class);
    }

    public function pelajaran() {
        $this->hasMany(Pelajaran::class);
    }

    public function siswa_tugas() {
        $this->hasMany(Siswa_tugas::class);
    }
}
