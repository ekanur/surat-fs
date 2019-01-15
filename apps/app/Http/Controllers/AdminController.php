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
        $statistik = json_encode($this->getStatistik());
        // dd($statistik);

        if (Auth::user()->tipe == 'admin') {
            // $path_view  = 'admin';
            $permohonan_surat = Permohonan_surat::with("layanan_surat", "mahasiswa")->orderBy("created_at", "desc")->get();

            return view("user/admin/index", compact('permohonan_surat', 'statistik'));
        }

        $dosen = Dosen::where("id", "!=", 1)->get();
    		// $path_view = 'default';
    	$verifikasi = Verifikasi::with("permohonan_surat.layanan_surat", "mahasiswa")->where("user_id", Auth::user()->id)->orderBy("created_at", "desc")->get();
        foreach ($verifikasi as $key => $value) {
            if($this->cekUrutan($value->permohonan_surat->layanan_surat_id) == 1 || $this->cekStatusVerifikasi($value->permohonan_surat_id, ($this->cekUrutan($value->permohonan_surat->layanan_surat_id)-1))){
                    $value->bisa_verifikasi = "true";
            }else{
                    
                $value->bisa_verifikasi = "false";
                    
            }
        }

        return view("user/default/index", compact('verifikasi', 'dosen', 'statistik'));
    }

    function cekUrutan($layanan_surat_id){
        $verifikator = Verifikator::where([["layanan_surat_id", $layanan_surat_id],["user_tipe", auth()->user()->tipe]])->select("urutan")->first();

        return $verifikator->urutan;
    }

    function getStatistik(){
        $statistik = array();
        $kode_layanan = null;
        $i=-1;
        $permohonan_surat = DB::table('layanan_surat')->select( 'kode_layanan', DB::raw("MONTH(permohonan_surat.created_at) as bulan, count(permohonan_surat.id) as total"))->join('permohonan_surat', 'permohonan_surat.layanan_surat_id', 'layanan_surat.id')->whereYear('permohonan_surat.created_at', date('Y'))->groupBy("kode_layanan", "bulan")->orderBy("kode_layanan")->orderBy("bulan")->get();

        foreach ($permohonan_surat as $key=> $value) {
            

            if($kode_layanan != $value->kode_layanan){
                $kode_layanan = $value->kode_layanan;
                $i++;
            }
            
            if(array_search($kode_layanan, array_column($statistik, "name"))){
                    $statistik[$i]["data"][$value->bulan] = $value->total;
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

    function getStatus(){
        $status = array();

        return $status;
    }

    function cekStatusVerifikasi($permohonan_surat_id, $urutan){
        $verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id], ["urutan", $urutan]])->select("status")->first();

        return ($verifikasi->status == "setuju")? true : false;
    }
}