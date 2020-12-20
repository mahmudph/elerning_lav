<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
     /* tabel name */
    protected $table = 'tbl_kelas';
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
        return $this->belongsTo(Siswa_kelas::class, 'id', 'id_kelas');
    }

    public function siswa_tugas() {
        return $this->hasMany(Siswa_tugas::class);
    }

    public function guru_mengajar()
    {
        return $this->belongsTo(Guru_mengajar::class);
    }
}
