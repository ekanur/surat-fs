<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permohonan_surat;

class SkripsiController extends Controller
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

    public function index()
    {
        $jurusan = $this->jurusan;
        $ijin_ujian = Permohonan_surat::whereHas("layanan_surat", function($query) use($jurusan){
                $query->where("kode_layanan", "ijin-ujian");
        })->get();

        // dd($this->jurusan);
        
        if(!is_null($this->jurusan)){
            $ijin_ujian = $ijin_ujian->filter(function($item, $key){
                return $item->mahasiswa->getAttributes()['jurusan'] == $this->jurusan;
            });
        }

        $ijin_ujian = $ijin_ujian->each(function($item, $key){
            $item->konten = json_decode($item->konten);
        });
        
        return view("user.default.skripsi", compact("ijin_ujian"));
    }

    public function detail($id)
    {
        
    }
}
