<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keluhan;

class AspirasiController extends Controller
{
	public $jurusan = null;

    function __construct()
    {
    	$this->middleware(["auth" => function($request, $next){
            
            if(in_array(auth()->user()->tipe, ["kajur", "sekjur"])){
                // get original value, instead  accessor func
    			$this->jurusan = auth()->user()->dosen->getAttributes()['jurusan'];
    		}

    	    return $next($request);
    	}]);
    }

    function index(){
    	$keluhan = Keluhan::with("mahasiswa")->get();

        if(!is_null($this->jurusan)){
            $keluhan = $keluhan->filter(function($item, $key){
                return $item->mahasiswa->getAttributes()['jurusan'] == $this->jurusan;
            });
        }

    	return view("user.default.keluhan", compact('keluhan'));
    }
}
