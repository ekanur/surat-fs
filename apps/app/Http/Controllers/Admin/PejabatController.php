<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Dosen;

class PejabatController extends Controller
{
    function __construct()
    {
    	$this->middleware(["auth" => function($request, $next){
    		if(auth()->user()->tipe != 'admin'){
    			abort(404);
    		}
    			return $next($request);
    	}]);
    }


    function index(){
    	$pejabat = User::with("dosen")->where("tipe", "!=", "admin")->get();

    	return view("user.admin.pejabat", compact('pejabat'));
    }

    function detail($id){
    	$pejabat = User::with("dosen")->where([["tipe", "!=", "admin"], ["id", "=", $id]])->firstOrFail();
    	if($pejabat->tipe != 'kajur' || $pejabat->tipe != 'sekjur'){
	    	$dosen = Dosen::where("id", "!=","1")->get();
    	}else{
    		$dosen = Dosen::where([["id", "!=","1"], ["jurusan", "=", $pejabat->dosen->jurusan]])->get();
    	}

    	return view("user.admin.detail_pejabat", compact('pejabat', 'dosen'));
    }

    function update(Request $request){

    }
}
