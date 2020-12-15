<?php

namespace App;
use App\Siswa;
use App\Guru_mengajar;
use Illuminate\Database\Eloquent\Model;

class Siswa_pelajaran extends Model
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
        'id_siswa', 
        'id_guru_mengajar'
    ];

     public function siswa() {
        $this->hasMany(Siswa::class);
    }

    public function guru_mengajar() {
        $this->belongsTo(Guru_mengajar::class);
    }
}
