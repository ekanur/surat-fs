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

class PermohonanSuratController extends Controller
{
    public $pejabat;
    public $layanan_surat_id;
    public $kode_layanan;

    function __construct()
    {
        // $this->middleware("auth:mahasiswa");
        
    	$this->middleware(function($request, $next){
            $this->layanan_surat_id = $request->layanan_surat_id;
            $this->kode_layanan = $request->kode_layanan;

            $user = User::with("dosen")->select("id", "tipe", "dosen_id")->get();
            // dd($user);
            foreach ($user as $pejabat) {
                if($pejabat->tipe == "kajur" || $pejabat->tipe == 'sekjur'){
                    if($pejabat->dosen->jurusan == Auth::guard('mahasiswa')->user()->jurusan){
                        $this->pejabat[$pejabat->tipe] = $pejabat->id;
                    }
                }else{
                        $this->pejabat[$pejabat->tipe] = $pejabat->id;
                }
            }

            return $next($request);
        });

        
        
    }

    public function simpan(Request $request){
        // dd($this->user);
    	
        $permohonan_surat = new Permohonan_surat;
    	$permohonan_surat->mahasiswa_id = Auth::guard("mahasiswa")->user()->id;
    	$permohonan_surat->layanan_surat_id = $request->layanan_surat_id;
    	$permohonan_surat->konten = $this->kontenSurat($request);
        $permohonan_surat->status =  "verifikasi";
        // $permohonan_surat->status = ($request->layanan_surat_id == '1')? "verifikasi":"siap_cetak";
    	$permohonan_surat->save();

    	$is_created = $this->kirimVerifikasi($permohonan_surat->id);

    	// dd($is_created);
        if($is_created){
            Session::flash("message", "Berhasil, permohonan anda akan diproses.");
            Session::flash("status", "success");
        }

    	return redirect()->back();
    }

    function kontenSurat(Request $request){
        if ($this->kode_layanan == 'aktif-kuliah') {
            return json_encode([]);
        } elseif($this->kode_layanan == 'ijin-penelitian' || $this->kode_layanan == 'ijin-observasi') {
            $konten = array(
                        // "jenis" => $request->jenis,
                        "matakuliah" => $request->matakuliah,
                        "dosen" => $request->dosen,
                        "tahun_ajar" => $request->tahun_ajar,
                        "nama_instansi" => $request->nama_instansi,
                        "alamat_instansi" => $request->alamat_instansi,
                        "judul_penelitian" => $request->judul_penelitian,
                        "populasi" => $request->populasi,
                        "tempat" => $request->tempat,
                        "tanggal_mulai" => $request->tanggal_mulai,
                        "tanggal_selesai" => $request->tanggal_selesai,
                    );

            return json_encode($konten);
        }
        
    }

    // public function prosesIjinPenelitian(Request $request){
    //     $permohonan_surat = new Permohonan_surat;
    //     $permohonan_surat->mahasiswa_id = Auth::guard("mahasiswa")->user()->id;
    //     $permohonan_surat->layanan_surat_id = $request->layanan_surat_id;
    // }

    public function kirimVerifikasi($permohonan_surat_id){
    	$cek_verifikator = Verifikator::select("user_tipe", "urutan")->where("layanan_surat_id", "=", $this->layanan_surat_id)->orderBy("urutan")->get();
    	// dd($cek_verifikator);

    	$data_verifikasi = array();

    	foreach ($cek_verifikator as $verifikator) {
    		$data_verifikasi[] = array(
    			"permohonan_surat_id" => $permohonan_surat_id,
    			"mahasiswa_id" => Auth::guard("mahasiswa")->user()->id,
    			"user_id" => $this->pejabat[$verifikator->user_tipe],
                "urutan" => $verifikator->urutan,
    			"status" => "diajukan",
                "created_at" => date("Y-m-d")
    		);
    	}

    	return Verifikasi::insert($data_verifikasi);
    }

    // function viewAktifKuliah($permohonan_surat_id, $print = null){
    //     $verifikasi = Verifikasi::with("mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();

    //     // dd($verifikasi);

    //     return view("surat/aktif_kuliah", compact('verifikasi', 'print'));
    // }

    // function viewIjinPenelitian($permohonan_surat_id, $print = null){
    //     $verifikasi = Verifikasi::with("mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->first();

    //     return view("surat/ijin_penelitian", compact('verifikasi', 'print'));
    // }
}
