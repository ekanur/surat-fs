<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $table = "keluhan";

    function mahasiswa(){
    	return $this->belongsTo("App\Mahasiswa", "nim", "nim");
    }
}
