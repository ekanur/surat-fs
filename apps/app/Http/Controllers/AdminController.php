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
    		$path_view  = 'admin';
    		$verifikasi = Verifikasi::with("permohonan_surat.layanan_surat", "mahasiswa")->all();
    	} else {
    		$path_view = 'default';
    		$verifikasi = Verifikasi::with("permohonan_surat.layanan_surat", "mahasiswa")->where("user_id", Auth::user()->id)->get();
    	}
    	// dd($verifikasi);

    	return view("user.".$path_view.".index", compact('verifikasi'));

    }
}
