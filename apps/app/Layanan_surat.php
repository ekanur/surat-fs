<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan_surat extends Model
{
    protected $table = "layanan_surat";

    function permohonan_surat(){
    	return $this->hasMany("App\Permohonan_surat");
    }
}
