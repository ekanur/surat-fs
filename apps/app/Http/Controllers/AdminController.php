<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Verifikasi;
use App\Permohonan_surat;

class AdminController extends Controller
{
	function __construct()
	{
		$this->middleware("auth");
	}
    function index(){
    	if (Auth::user()->tipe == 'admin') {
    		// $path_view  = 'admin';
    		$permohonan_surat = Permohonan_surat::with("layanan_surat", "mahasiswa")->orderBy("created_at", "desc")->get();

            return view("user/admin/index", compact('permohonan_surat'));
    	} else {
    		// $path_view = 'default';
    		$verifikasi = Verifikasi::with("permohonan_surat.layanan_surat", "mahasiswa")->where("user_id", Auth::user()->id)->orderBy("created_at", "desc")->get();
        	return view("user/default/index", compact('verifikasi'));
        }
        // dd($verifikasi);


    }
}
