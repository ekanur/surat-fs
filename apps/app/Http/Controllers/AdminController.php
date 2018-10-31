<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Verifikasi;
use App\Verifikator;
use App\Permohonan_surat;
use App\Dosen;

class AdminController extends Controller
{
	function __construct()
	{
		$this->middleware("auth");
	}
    function index(){
        $dosen = Dosen::where("id", "!=", 1)->get();

    	if (Auth::user()->tipe == 'admin') {
    		// $path_view  = 'admin';
    		$permohonan_surat = Permohonan_surat::with("layanan_surat", "mahasiswa")->orderBy("created_at", "desc")->get();

            return view("user/admin/index", compact('permohonan_surat'));
    	} else {
    		// $path_view = 'default';
    		$verifikasi = Verifikasi::with("permohonan_surat.layanan_surat", "mahasiswa")->where("user_id", Auth::user()->id)->orderBy("created_at", "desc")->get();
            foreach ($verifikasi as $key => $value) {
                if($this->cekUrutan($value->permohonan_surat->layanan_surat_id) == 1 || $this->cekStatusVerifikasi($value->permohonan_surat_id, ($this->cekUrutan($value->permohonan_surat->layanan_surat_id)-1))){
                    $value->bisa_verifikasi = "true";
                }else{
                    
                        $value->bisa_verifikasi = "false";
                    
                }
            }

            // dd($dosen);
        	return view("user/default/index", compact('verifikasi', 'dosen'));
        }
        // dd($verifikasi);


    }

    function cekUrutan($layanan_surat_id){
        $verifikator = Verifikator::where([["layanan_surat_id", $layanan_surat_id],["user_tipe", auth()->user()->tipe]])->select("urutan")->first();

        return $verifikator->urutan;
    }

    function cekStatusVerifikasi($permohonan_surat_id, $urutan){
        $verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id], ["urutan", $urutan]])->select("status")->first();

        return ($verifikasi->status == "setuju")? true : false;
    }
}
