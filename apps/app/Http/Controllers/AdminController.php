<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Verifikasi;
use App\Verifikator;
use App\Permohonan_surat;
use App\Layanan_surat;
use App\Dosen;

class AdminController extends Controller
{
	function __construct()
	{
		$this->middleware("auth");
    }
    
    function index(){
        if (Auth::user()->tipe != 'admin') {
           return $this->suratMasuk();
        }
        $statistik = json_encode($this->getStatistik());
        $permohonan_surat = Permohonan_surat::with("layanan_surat.verifikator", "mahasiswa")->orderBy("created_at", "desc")->get();
        foreach($permohonan_surat as $key => $value){
            $value->status = ($this->isSiapCetak($value->id, $value->layanan_surat->verifikator->sortBy("urutan")))? "siap_cetak": $value->status;
            $value->siap_cetak = $this->isSiapCetak($value->id, $value->layanan_surat->verifikator->sortBy("urutan"));
        }
        return view("user/admin/index", compact('permohonan_surat', 'statistik'));
    }

    // function cekUrutan($layanan_surat_id){
    //     $verifikator = Verifikator::where([["layanan_surat_id", $layanan_surat_id],["user_tipe", auth()->user()->tipe]])->select("urutan")->first();
    //     // dd($verifikator);
    //     return $verifikator->urutan;
    // }

    function getStatistik(){
        $statistik = array();
        $kode_layanan = null;
        $i=-1;
        $permohonan_surat = DB::table('layanan_surat')->select( 'kode_layanan', DB::raw("MONTH(permohonan_surat.created_at) as bulan, count(permohonan_surat.id) as total"))->join('permohonan_surat', 'permohonan_surat.layanan_surat_id', 'layanan_surat.id')->whereYear('permohonan_surat.created_at', date('Y'))->groupBy("kode_layanan", "bulan")->orderBy("kode_layanan")->orderBy("bulan")->get();
        // dd($permohonan_surat);
        foreach ($permohonan_surat as $key=> $value) {

            if($kode_layanan != $value->kode_layanan){
                $kode_layanan = $value->kode_layanan;
                $i++;
            }
            
            if(array_search($kode_layanan, array_column($statistik, "name"))){
                    $statistik[$i]["data"][($value->bulan-1)] = $value->total;
            }else{
                $statistik[$i]["name"] = $value->kode_layanan;
                for ($x=0; $x <= 11 ; $x++) { 
                    $statistik[$i]["data"][$x] = (($value->bulan-1) == $x)? $value->total : 0;
                }
            }
        }
        // dd($statistik);
        return $statistik;
    }

    function cekStatusVerifikasi($permohonan_surat_id, $urutan){
        $verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id], ["urutan", $urutan]])->select("status")->first();
        // dd($verifikasi);
        if(!is_null($verifikasi)){
            return ($verifikasi->status == "setuju")? true : false;
        }
        return false;
    }

    function suratMasuk(){
        $verifikator = Verifikator::select("layanan_surat_id", "urutan")->where("user_tipe", auth()->user()->tipe)->get()->toArray();
        // dd($verifikator);
        $layanan_surat_id = array();
        $urutan = array();
        foreach($verifikator as $data){
            $layanan_surat_id[] = $data["layanan_surat_id"];
            $urutan[$data["layanan_surat_id"]] = $data["urutan"];
        }
        
        if(auth()->user()->tipe == "kajur"){    
            $permohonan_surat = Permohonan_surat::with(["layanan_surat.verifikator", "verifikasi" => function($query){
                $query->where("user_tipe", auth()->user()->tipe);
                // $query->orderBy("urutan");
            }])->whereHas("mahasiswa", function($query){               
                $query->where("jurusan", auth()->user()->dosen->getOriginal("jurusan"));
            })->whereIn("layanan_surat_id", $layanan_surat_id)->orderBy("created_at", "desc")->get();            
        }else{
            $permohonan_surat = Permohonan_surat::with(["layanan_surat.verifikator", "verifikasi" => function($query){
                $query->where("user_tipe", auth()->user()->tipe);
                // $query->orderBy("urutan");
            }, "mahasiswa"])->whereIn("layanan_surat_id", $layanan_surat_id)->orderBy("created_at", "desc")->get();
        }

        foreach ($permohonan_surat as $key => $value) {
            if($urutan[$value->layanan_surat_id] == 1 || $this->cekStatusVerifikasi($value->id, ($urutan[$value->layanan_surat_id]-1))){
                $value->bisa_verifikasi = "true";
            }else{
                $value->bisa_verifikasi = "false"; 
            }
            // dd($value->layanan_surat->verifikator);
            $value->urutan = $urutan[$value->layanan_surat_id];
            // $value->status = (count($value->layanan_surat->verifikator) ==  count($value->verifikasi))? "siap_cetak": $value->status;
            $value->status = ($this->isSiapCetak($value->id, $value->layanan_surat->verifikator->sortBy("urutan")))? "siap_cetak": $value->status;
        }
        // dd($permohonan_surat);
        $dosen = Dosen::where("id", "!=", 1)->get();
        
        if(Auth::user()->tipe == 'dekan' || Auth::user()->tipe == 'wd1' || Auth::user()->tipe == 'wd2' || Auth::user()->tipe == 'wd3'){
            $statistik = json_encode($this->getStatistik());
            return view("user/default/index", compact('permohonan_surat', 'dosen', 'statistik'));
        }

        return view("user/default/index", compact('permohonan_surat', 'dosen'));
    }

    // function setStatus(int $permohonan_surat_id, \Illuminate\Support\Collection $verifikator){
    //     $user_tipe = array();
    //     foreach($verifikator as $verifikator){
    //         $user_tipe[] = $verifikator->user_tipe;
    //     }
    //     $count_verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id], ["status", "setuju"]])->whereIn("user_tipe", $user_tipe)->count();
    //     return ($count_verifikasi == count($user_tipe));
    // }
}