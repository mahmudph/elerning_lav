<?php

namespace App;

use App\Siswa;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class Siswa_kelas extends Model
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
        'id_kelas', 
        'id_siswa'
    ];


    public function siswa() {
        $this->hasMany(Siswa::class);
    }

    public function kelas() {
        $this->belongsTo(Kelas::class);
    }
}
