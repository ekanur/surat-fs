<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Verifikasi;
use App\Verifikator;
use Auth;
use Session;

class IjinPenelitianController extends Controller
{
    public function simpan(Request $request)
    {
    	
    }

    function view($permohonan_surat_id, $print = null){
        $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();
        $konten = json_decode($verifikasi->permohonan_surat->konten);

        // dd($konten);
        return view("surat/ijin_penelitian", compact('verifikasi', 'konten', 'print'));
    }
}
