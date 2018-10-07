<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan_surat extends Model
{
    
    protected $table = "permohonan_surat";

    function layanan_surat(){
    	return $this->belongsTo("App\Layanan_surat");
    }

    function mahasiswa(){
    	return $this->belongsTo("App\Mahasiswa");
    }

    function verifikasi(){
    	return $this->hasMany("App\Verifikasi");
    }
}
