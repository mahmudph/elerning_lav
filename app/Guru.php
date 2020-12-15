<?php

namespace App;
use App\Guru_mengajar;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
        'nama_guru', 
        'nip', 
        'nomer_hp', 
        'tgl_lahir', 
        'tempat_lahir', 
        'alamat', 
        'lulusan'
     ];

     
    public function mengajar() {
        $this->hasMany(Guru_mengajar::class);
    }
}
