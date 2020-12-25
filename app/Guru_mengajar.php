<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Guru_mengajar extends Model
{
     /* tabel name */
    protected $table = 'tbl_guru_mengajars';

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
        'id_pelajaran',
        'id_kelas'
    ];

    // public function guru() {
    //     return $this->hasMany(Guru::class,'id', 'id_guru');
    // }

    // public function pelajaran() {
    //     return $this->hasMany(Pelajaran::class,'id','id_pelajaran');
    // }

    // public function kelas()
    // {
    //     return $this->hasMany(Kelas::class, 'id', 'id_kelas');
    // }

    // public function siswa_kelas() {
    //     return $this->belongsToMany(Siswa_kelas::class, 'id_kelas', 'id_kelas');
    // }
    public function guru() {
        return $this->belongsTo(Guru::class,'id_guru', 'id');
    }

    public function pelajaran() {
        return $this->belongsTo(Pelajaran::class,'id_pelajaran','id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function siswa_kelas() {
        return $this->hasMany(Siswa_kelas::class, 'id_kelas', 'id_kelas');
    }

    public function get_pengajaran() {
        return $this->join('tbl_gurus', 'tbl_gurus.id', 'tbl_guru_mengajars.id_guru')
        ->join('tbl_kelas', 'tbl_kelas.id', 'tbl_guru_mengajars.id_kelas')
        ->join('tbl_pelajarans', 'tbl_pelajarans.id', 'tbl_guru_mengajars.id_pelajaran')
        ->select('tbl_gurus.nama_guru', 'tbl_guru_mengajars.id', 'tbl_kelas.nama_kelas', 'tbl_pelajarans.nama_pelajaran')
        ->tosql();
    }


}
