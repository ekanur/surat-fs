<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	function __construct()
	{
		// $this->middleware("auth:mahasiswa");
	}
    function index(){
    	// return view("mahasiswa.index");
    	return view("mahasiswa.app");
    }
}
