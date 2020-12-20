<?php

namespace App;

use App\Siswa_tugas;
use Illuminate\Database\Eloquent\Model;

class Tugas_nilai extends Model
{
     /* tabel name */
    protected $table = 'tbl_nilai_tugas';
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
    protected $fillable = ['nilai', 'keterangan', 'id_pengerjaan_tugas'];

    public function siswa_tugas() {
        $this->belongsTo(Siswa_tugas::class);
    }
}
