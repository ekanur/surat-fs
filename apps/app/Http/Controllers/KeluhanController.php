<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use Auth;
use Session;

class KeluhanController extends Controller
{
    public function simpan(Request $request){
    	$keluhan = new Keluhan;
    	$keluhan->nim = Auth::guard("mahasiswa")->user()->nim;
    	$keluhan->isi = $request->isi;
    	
    	if($keluhan->save()){
    		Session::flash("message", "Terima kasih telah memberikan aspirasi. Aspirasi anda sangat berarti bagi kami.");
    		Session::flash("status", "success");
    	}

    	return redirect()->back();
    }
}
