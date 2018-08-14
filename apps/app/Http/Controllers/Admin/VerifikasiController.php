<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Verifikasi;
use App\Permohonan_surat;

class VerifikasiController extends Controller
{
    function __construct()
    {
    	$this->middleware("auth");
    }

    function index(){
    	$verifikasi = Verifikasi::where("user_id", Auth::user()->id)->get();

    	dd($verifikasi);
    	return view("user.".Auth::user()->tipe.".index", compact($verifikasi));
    }
}
