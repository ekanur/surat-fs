<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Verifikasi;
use App\Verifikator;
use App\User;
use Carbon\Carbon;

class IjinUjianController extends Controller
{
    public $pejabat;
	
    function __construct()
    {
    	$this->middleware(["auth"=>function($request, $next){

            $user = User::with("dosen")->select("id", "tipe", "dosen_id")->where("tipe", "sekjur")->get();
            // dd($user);
            foreach ($user as $pejabat) {
                $this->pejabat[$pejabat->tipe]["nama"] = $pejabat->dosen->nama;
                $this->pejabat[$pejabat->tipe]["nip"] = $pejabat->dosen->nip;
                $this->pejabat[$pejabat->tipe]["ttd"] = $pejabat->dosen->scan_ttd;
            }

            // dd($this->pejabat);
            return $next($request);

        }]);
    }

    function simpan(Request $request){
        if($request->status == "setuju"){
            $konten = array(
                        "judul" => json_decode($request->judul),
                        "dosen" => json_decode($request->dosen),
                        "penguji" => $this->getDosen($request->penguji),
                        "ruang" => $request->ruang,
                        "waktu" => $request->jam,
                        "tanggal" => $request->tanggal,
                    );
            $permohonan_surat = Permohonan_surat::where("id", $request->permohonan_surat_id)
                                                ->update(["konten" => json_encode($konten)]);
        }
        
        $this->updateStatusSurat($request);

        return redirect()->back();

    }

    function detail($id, $print=null)
    {
        if(auth()->user()->tipe == 'admin'){
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $id)->first();
        }else{
            $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $id], ["user_id", auth()->user()->id]])->first();
        }
        $sekjur = $this->pejabat["sekjur"];
        $konten = json_decode($verifikasi->permohonan_surat->konten);
        $konten->tanggal = Carbon::parse($konten->tanggal);

        return view("surat.ijin_ujian", compact('print', 'verifikasi', 'sekjur', 'konten'));
    }
}
