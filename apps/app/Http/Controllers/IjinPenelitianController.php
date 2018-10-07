<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Verifikasi;
use App\Verifikator;
use App\User;
use Auth;
use Session;

class IjinPenelitianController extends Controller
{

    public $pejabat;

    function __construct()
    {
        $this->middleware(["auth"=>function($request, $next){

            $user = User::with("dosen")->select("id", "tipe", "dosen_id")->whereIn("tipe", ["dekan", "wd1", "wd2", "wd3"])->get();
            // dd($user);
            foreach ($user as $pejabat) {
                $this->pejabat[$pejabat->tipe]["nama"] = $pejabat->dosen->nama;
                $this->pejabat[$pejabat->tipe]["nip"] = $pejabat->dosen->nip;
            }

            // dd($this->pejabat);
            return $next($request);

        }]);
    }

    public function simpan(Request $request)
    {
    	
    }

    function view($permohonan_surat_id, $print = null){
        if(auth()->user()->tipe == 'admin'){
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();
        }else{
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->first();
        }
        
        // dd($verifikasi);
        $konten = json_decode($verifikasi->permohonan_surat->konten);
        $wd1 = $this->pejabat["wd1"];

        return view("surat/ijin_penelitian", compact('verifikasi', 'konten', 'print', "wd1"));
    }
}
