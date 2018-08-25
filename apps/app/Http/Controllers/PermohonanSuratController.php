<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Verifikasi;
use App\Verifikator;
use Auth;

class PermohonanSuratController extends Controller
{
    function __construct()
    {
    	$this->middleware("auth:mahasiswa")->except("viewAktifKuliah");
    }

    public function prosesAktifKuliah(Request $request){
    	$permohonan_surat = new Permohonan_surat;
    	$permohonan_surat->mahasiswa_id = Auth::guard("mahasiswa")->user()->id;
    	$permohonan_surat->layanan_surat_id = $request->layanan_surat_id;
    	$permohonan_surat->konten = json_encode([]);
    	$permohonan_surat->save();

    	$is_created = $this->kirimVerifikasi($request->layanan_surat_id, $permohonan_surat->id);

    	// dd($is_created);
    	return ($is_created) ? redirect()->back()->with("success", ["Berhasil diproses, silakan diperika di bagian Admin"]) : redirect()->back()->with("error", ["Gagal membuat permohonan surat"]) ;;
    }

    public function kirimVerifikasi($layanan_surat_id, $permohonan_surat_id){
    	$cek_verifikator = Verifikator::select("user_id", "urutan")->where("layanan_surat_id", "=", $layanan_surat_id)->get();
    	// dd($cek_verifikator);

    	$data_verifikasi = array();

    	foreach ($cek_verifikator as $verifikator) {
    		$data_verifikasi[] = array(
    			"permohonan_surat_id" => $permohonan_surat_id,
    			"mahasiswa_id" => Auth::guard("mahasiswa")->user()->id,
    			"user_id" => $verifikator->user_id,
    			"status" => "diajukan"
    		);
    	}

    	return Verifikasi::insert($data_verifikasi);
    }

    function viewAktifKuliah($permohonan_surat_id){
        $verifikasi = Verifikasi::with("mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();

        // dd($verifikasi);

        return view("surat/aktif_kuliah", compact('verifikasi'));
    }
}
