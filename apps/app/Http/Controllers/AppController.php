<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AppController extends Controller
{
	function __construct(){
		$this->middleware("auth:mahasiswa");
	}
   	function index(Request $request){
   		// Session::put("nim", $request->nim);

   		return view("mahasiswa.app");
   	}
}
