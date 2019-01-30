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

class IjinObservasiController extends Controller
{
	function __construct()
    {
        $this->middleware(["auth"=>function($request, $next){

            $user = User::with("dosen")->select("id", "tipe", "scan_ttd", "dosen_id")->whereIn("tipe", ["wd1"])->get();
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


    function view($permohonan_surat_id, $print = null){
        if(auth()->user()->tipe == 'admin'){
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->firstOrFail();
        }else{
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->firstOrFail();
        // dd($verifikasi);
        }
        
        $konten = json_decode($verifikasi->permohonan_surat->konten);
        $konten->tanggal_mulai = date_create($konten->tanggal_mulai);
        $konten->tanggal_selesai = date_create($konten->tanggal_selesai);
        $wd1 = $this->pejabat["wd1"];

        // dd($wd1);

        return view("surat/ijin_observasi", compact('verifikasi', 'konten', 'print', "wd1"));
    }
}
