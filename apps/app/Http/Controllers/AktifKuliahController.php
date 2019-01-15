<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verifikasi;
use App\User;

class AktifKuliahController extends Controller
{
	public $pejabat;

    function __construct()
    {
        $this->middleware(["auth"=>function($request, $next){

            $user = User::with("dosen")->select("id", "tipe", "dosen_id", "scan_ttd")->whereIn("tipe", ["dekan", "wd1", "wd2", "wd3"])->get();
            // dd($user);
            foreach ($user as $pejabat) {
                $this->pejabat[$pejabat->tipe]["nama"] = $pejabat->dosen->nama;
                $this->pejabat[$pejabat->tipe]["nip"] = $pejabat->dosen->nip;
                $this->pejabat[$pejabat->tipe]["ttd"] = $pejabat->scan_ttd;
            }

            // dd($this->pejabat);
            return $next($request);

        }]);
    }
    public function index(Request $request)
    {
    	return "aktif-kuliah";
    }

    function view($permohonan_surat_id, $print = null){
        if(auth()->user()->tipe == 'admin'){
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();
        }else{
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->first();
        }
        $wd1 = $this->pejabat["wd1"];
        // dd($verifikasi);

        return view("surat/aktif_kuliah", compact('verifikasi', 'print', "wd1"));
    }
}
