<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dosen;

class DosenController extends Controller
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

    public function index()
    {
    	$dosen = Dosen::where("id", "!=", '1')->get();
    	return view("user.admin.dosen", compact('dosen'));
    }
}
