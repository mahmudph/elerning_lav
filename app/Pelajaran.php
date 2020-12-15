<?php

namespace App;

use App\guru_mengajar;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
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
        'nama_pelajaran', 
    ];
    
    public function guru_mengajar() {
        $this->belongsToMany(Guru_mengajar::class);
    }
    
}
