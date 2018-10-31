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
   		$path_view  = 'admin';
    }

    function aktifKuliah(Request $request){
        $this->updateStatusSurat($request);

        return redirect()->back();
    }

}
