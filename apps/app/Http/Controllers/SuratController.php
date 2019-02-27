<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan_surat;
use App\Verifikator;
use App\User;
use Auth;
use Session;
use Carbon\Carbon;

class SuratController extends Controller
{
    public $pejabat;

    function __construct()
    {
        $this->middleware(["auth"=>function($request, $next){

            $user = User::with("dosen")->select("id", "tipe", "scan_ttd", "dosen_id")->where("tipe", "!=", "admin")->get();
            // dd($user);
            foreach ($user as $pejabat) {
                if($pejabat->tipe == 'kajur'){
                  $this->pejabat[$pejabat->tipe."_".$pejabat->dosen->getOriginal("jurusan")]["nama"] = $pejabat->dosen->nama;
                  $this->pejabat[$pejabat->tipe."_".$pejabat->dosen->getOriginal("jurusan")]["nip"] = $pejabat->dosen->nip;
                  $this->pejabat[$pejabat->tipe."_".$pejabat->dosen->getOriginal("jurusan")]["ttd"] = $pejabat->scan_ttd;
                }else{
                  $this->pejabat[$pejabat->tipe]["nama"] = $pejabat->dosen->nama;
                  $this->pejabat[$pejabat->tipe]["nip"] = $pejabat->dosen->nip;
                  $this->pejabat[$pejabat->tipe]["ttd"] = $pejabat->scan_ttd;

                }
            }
            return $next($request);

        }]);
    }

    function view($permohonan_surat_id, $print = null){
        $permohonan_surat = Permohonan_surat::with("layanan_surat.verifikator", "mahasiswa")->findOrFail($permohonan_surat_id);
        $permohonan_surat->siap_cetak = $this->isSiapCetak($permohonan_surat->id, $permohonan_surat->layanan_surat->verifikator->sortBy("urutan"));
        // dd($permohonan_surat);
        // if(auth()->user()->tipe == 'admin'){
        //     $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where("permohonan_surat_id", $permohonan_surat_id)->firstOrFail();
        // }else{
        //     $verifikasi = Verifikasi::with("permohonan_surat", "mahasiswa", "user.dosen")->where([["permohonan_surat_id", $permohonan_surat_id], ["user_id", auth()->user()->id]])->firstOrFail();
        // // dd($verifikasi);
        // }
        $konten = $this->getKonten($permohonan_surat);
        $pejabat = $this->getPejabat($permohonan_surat->layanan_surat->kode_layanan, $permohonan_surat->mahasiswa->getOriginal("jurusan"));
        // $wd1 = $this->pejabat["wd1"];

        // dd($pejabat);

        return view("surat/".$permohonan_surat->layanan_surat->kode_layanan, compact('permohonan_surat', 'konten', 'print', "pejabat"));
    }

    function getKonten(Permohonan_surat $permohonan_surat){
        $konten = json_decode($permohonan_surat->konten);
        switch ($permohonan_surat->layanan_surat->kode_layanan) {
            case 'ijin-penelitian':
                $konten->tanggal_mulai = date_create($konten->tanggal_mulai);
                $konten->tanggal_selesai = date_create($konten->tanggal_selesai);
                break;
            case 'ijin-observasi':
                $konten->tanggal_mulai = date_create($konten->tanggal_mulai);
                $konten->tanggal_selesai = date_create($konten->tanggal_selesai);
                break;
            case 'pengajuan-skripsi':
                break;
            case 'ijin-ujian':
                $konten->tanggal = Carbon::parse($konten->tanggal);
                break;
        }

        return $konten;
    }

    function getPejabat($kode_layanan, $jurusan){
        if ($kode_layanan == 'aktif-kuliah' || $kode_layanan == 'ijin-penelitian' || $kode_layanan == 'ijin-observasi') {
            return $this->pejabat["wd1"];
        }elseif($kode_layanan == 'pengajuan-skripsi' || $kode_layanan == 'ijin-ujian'){
            return $this->pejabat["kajur_".$jurusan];
        }
    }

}
