<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = "verifikasi";

    function permohonan_surat(){
    	return $this->belongsTo("App\Permohonan_surat");
    }

    function mahasiswa(){
    	return $this->belongsTo("App\Mahasiswa");
    }

    function user(){
    	return $this->belongsTo("App\User");
    }
}
