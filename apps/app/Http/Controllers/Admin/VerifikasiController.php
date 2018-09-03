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
    	if (Auth::user()->tipe == 'admin') {
    		$verifikasi = Verifikasi::all();
    	} else {
    		$path_view = 'default';
    		$verifikasi = Verifikasi::where("user_id", Auth::user()->id)->get();
    	}


    	return view("user.".$path_view.".index", compact('verifikasi'));
    }

    function aktifKuliah(Request $request){
        $verifikasi = Verifikasi::where("permohonan_surat_id", $request->permohonan_surat_id)->update(["status" => $request->status]);
        $permohonan_surat = Permohonan_surat::find($request->permohonan_surat_id);
        $permohonan_surat->status = "siap_cetak";
        $permohonan_surat->save();

        return redirect()->back();
    }
}
