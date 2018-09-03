<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Dosen;

class AppController extends Controller
{
	function __construct(){
		$this->middleware("auth:mahasiswa");
	}
   	function index(Request $request){
   		$dosen = Dosen::where("id", "!=", 1)->get();

   		return view("mahasiswa.app", compact('dosen'));
   	}
}
