<?php

namespace App;

use App\Siswa_tugas;
use Illuminate\Database\Eloquent\Model;

class Tugas_nilai extends Model
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
    protected $fillable = ['nilai'];

    public function siswa_tugas() {
        $this->belongsTo(Siswa_tugas::class);
    }
}
