<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;

class MahasiswaController extends Controller
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

    public function index(){
    	$mahasiswa = Mahasiswa::all();

    	return view("user.admin.mahasiswa", compact('mahasiswa'));
    }
}
