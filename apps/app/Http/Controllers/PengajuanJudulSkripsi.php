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

            $user = User::with("dosen")->select("id", "tipe", "dosen_id")->where("tipe", "kajur")->get();
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
        $konten = array(
                        "judul" => json_decode($request->judul),
                        "dosen" => json_decode($request->dosen),
                        "judul_disetujui" => $request->pilih_judul,
                        "dosen_disetujui" => $this->getDosen($request->pilih_pembimbing)
                    );
        $permohonan_surat = Permohonan_surat::where("id", $request->permohonan_surat_id)
                                                ->update(["konten" => json_encode($konten)]);
        $this->updateStatusSurat($request);

        return redirect()->back();

    }

    function detail($id)
    {
        
    }
}
