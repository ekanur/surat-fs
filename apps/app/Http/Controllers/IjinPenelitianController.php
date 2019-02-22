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

            $user = User::with("dosen")->select("id", "tipe", "dosen_id", "scan_ttd")->whereIn("tipe", ["dekan", "wd1", "wd2", "wd3"])->get();

            foreach ($user as $pejabat) {
                $this->pejabat[$pejabat->tipe]["nama"] = $pejabat->dosen->nama;
                $this->pejabat[$pejabat->tipe]["nip"] = $pejabat->dosen->nip;
                $this->pejabat[$pejabat->tipe]["ttd"] = $pejabat->scan_ttd;
            }

            return $next($request);
        }]);
    }

    function view($permohonan_surat_id, $print = null){
        $permohonan_surat = Permohonan_surat::with("mahasiswa")->findOrFail($permohonan_surat_id);
        // dd($permohonan_surat);
        // if(auth()->user()->tipe == 'admin'){
        //     // $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();
        // }else{
        //     // $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->first();
        // }
        
        // dd($permohonan_surat);
        $konten = json_decode($permohonan_surat->konten);
        $konten->tanggal_mulai = date_create($konten->tanggal_mulai);
        $konten->tanggal_selesai = date_create($konten->tanggal_selesai);
        $wd1 = $this->pejabat["wd1"];

        return view("surat/ijin_penelitian", compact('permohonan_surat', 'konten', 'print', "wd1"));
    }
}
