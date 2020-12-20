<?php

namespace App;

use App\Tugas;
use App\Guru_mengajar;
use App\Tugas_nilai;
use Illuminate\Database\Eloquent\Model;

class Siswa_tugas extends Model
{
     /* tabel name */
    protected $table = 'tbl_siswa_tugas';

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

    // public function kelas() {
    //     return $this->hasMany(Kelas::class, 'id', 'id_kelas');
    // }
    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas', 'id');
    }

    public function guru_mengajar() {
        $this->bilongsToMany(Guru_mengajar::class);
    }

    public function nilai() {
        $this->hasOne(Tugas_nilai::class);
    }

    /**
     * ambl tugas berdasarkan id user
     *
     * @param  string  $value
     * @return string
     */
    public function get_tugas_siswa($id_user)
    {
        return $this->select('')
        ->where('siswas.id_user', $id_user)
        ->join('tugas', 'tugas.id', 'siswa_tugas.id_tugas')
        ->join('siswa_kelas', 'siswa_kelas.id_kelas', 'siswa_tugas  .id_kelas')
        ->join('guru_mengajars', 'guru_mengajars.id', 'siswa_tugas.id_guru_mengajar')
        ->join('kelas', 'kelas.id', 'siswa_kelas.id_kelas')
        ->join('siswas','siswas.id','siswa_pelajarans.id_siswa')
        ->join('guru_mengajars', 'guru_mengajars.id', 'siswa_pelajarans.id_guru_mengajar')
        ->join('gurus', 'gurus.id', 'guru_mengajars.id_guru')
        ->join('pelajarans', 'pelajarans.id', 'guru_mengajars.id_pelajaran');
    }

    public function getSiswaTugas($id_user, $id_kelas, $id_pengajaran) {
        return
        $this->rightjoin('tbl_guru_mengajars', 'tbl_siswa_tugas.id_guru_mengajar', 'tbl_guru_mengajars.id')
        ->join('tbl_pelajarans', 'tbl_guru_mengajars.id_pelajaran', 'tbl_pelajarans.id')
        ->join('tbl_tugas', 'tbl_siswa_tugas.id_tugas', 'tbl_tugas.id')
        ->leftjoin('tbl_kelas', 'tbl_guru_mengajars.id_kelas', 'tbl_kelas.id')
        ->rightjoin('tbl_siswa_kelas', 'tbl_guru_mengajars.id_kelas', 'tbl_siswa_kelas.id_kelas')
        ->leftjoin('tbl_siswas', 'tbl_siswa_kelas.id_siswa', 'tbl_siswas.id')
        ->leftjoin('tbl_pengerjaan_tugas', 'tbl_tugas.id', 'tbl_pengerjaan_tugas.id_tugas')
        ->leftjoin('tbl_nilai_tugas', 'tbl_pengerjaan_tugas.id', 'tbl_nilai_tugas.id_pengerjaan_tugas')
        ->where('tbl_kelas.id', $id_kelas)
        ->where('tbl_siswas.id_user', $id_user)
        ->where('tbl_guru_mengajars.id', $id_pengajaran)
        ->select('tbl_tugas.nama_tugas', 'tbl_tugas.created_at', 'tbl_pengerjaan_tugas.created_at as dikerjakan', 'tbl_nilai_tugas.nilai', 'tbl_tugas.id', 'tbl_nilai_tugas.id as id_nilai_tugas')
        ->get();
    }

}
