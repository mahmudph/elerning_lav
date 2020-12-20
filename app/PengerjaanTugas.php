<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengerjaanTugas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_pengerjaan_tugas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_tugas',
        'id_kelas',
        'id_siswa',
        'id_pelajaran',
        'jawaban'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran', 'id');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas', 'id');
    }

    public function tugas_nilai() {
        return $this->hasOne(Tugas_nilai::class, 'id_pengerjaan_tugas', 'id');
    }

}
