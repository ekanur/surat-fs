<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verifikasi;

class AktifKuliahController extends Controller
{
    public function index(Request $request)
    {
    	return "aktif-kuliah";
    }

    function view($permohonan_surat_id, $print = null){
        $verifikasi = Verifikasi::with("mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();

        // dd($verifikasi);

        return view("surat/aktif_kuliah", compact('verifikasi', 'print'));
    }
}
