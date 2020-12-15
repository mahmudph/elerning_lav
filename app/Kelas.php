<?php

namespace App;

use App\siswa_kelas;
use App\Siswa_tugas;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
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
        'nama_kelas', 
        'jumlah_bangku', 
        'jumlah_kursi', 
    ];

    public function siswa_kelas() {
        $this->hasMany(Siswa_kelas::class);
    }

    public function siswa_tugas() {
        $this->hasMany(Siswa_tugas::class);
    }
}
