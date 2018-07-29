<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AppController extends Controller
{
   	function index(Request $request){
   		Session::put("nim", $request->nim);

   		return view("mahasiswa.app");
   	}
}
