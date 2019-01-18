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
use PDF;

class IjinPenelitianController extends Controller
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

    public function loadLogo()
    {
    	$avatarUrl = asset("img/logo_um.jpg");
        $arrContextOptions=array(
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );
        $type = pathinfo($avatarUrl, PATHINFO_EXTENSION);
        $avatarData = file_get_contents($avatarUrl, false, stream_context_create($arrContextOptions));
        $avatarBase64Data = base64_encode($avatarData);
        $imageData = 'data:image/' . $type . ';base64,' . $avatarBase64Data;

        return $imageData;
    }

    function view($permohonan_surat_id, $print = null){
        if(auth()->user()->tipe == 'admin'){
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();
        }else{
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->first();
        }
        
        // dd($verifikasi);
        $konten = json_decode($verifikasi->permohonan_surat->konten);
        $konten->tanggal_mulai = date_create($konten->tanggal_mulai);
        $konten->tanggal_selesai = date_create($konten->tanggal_selesai);
        $wd1 = $this->pejabat["wd1"];
        $data = [
            'konten' => $konten,
            'wd1' => $this->pejabat["wd1"],
            'verifikasi' => $verifikasi,
            // "logo" => $this->loadLogo()
        ];
        
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView("surat/ijin_penelitian", $data);

        return $pdf->stream();

        // return view("surat/ijin_penelitian", compact('verifikasi', 'konten', 'print', "wd1"));
    }
}
