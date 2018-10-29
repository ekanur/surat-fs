<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Verifikasi;
use App\Verifikator;
use App\User;

class PengajuanJudulSkripsi extends Controller
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

    function simpan(Request $request){

    }
}
