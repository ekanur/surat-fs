<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Dosen;
use App\Layanan_surat;
use App\Permohonan_surat;
use Auth;


class AppController extends Controller
{
	function __construct(){
		$this->middleware("auth:mahasiswa");
	}
   	function index(Request $request){
   		$dosen = Dosen::where("id", "!=", 1)->get();
   		$layanan_surat = Layanan_surat::select("id", "kode_layanan")->get();
   		$id_layanan_surat = array();
   		for ($i=0; $i < sizeof($layanan_surat) ; $i++) { 
   			$id_layanan_surat[$layanan_surat[$i]["kode_layanan"]] = $layanan_surat[$i]["id"];
   		}
        $permohonan_surat = $this->getPermohonanSurat();
   		return view("mahasiswa.app", compact('dosen', 'id_layanan_surat', 'permohonan_surat'));
	   }
	   
	   function getPermohonanSurat(){
			$permohonan_surat = Permohonan_surat::with("layanan_surat")->where("mahasiswa_id", Auth::guard('mahasiswa')->user()->id)->get();
			return $permohonan_surat;
	   }
}
