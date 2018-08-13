<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	function __construct()
	{
		$this->middleware("auth");
	}
    function index(){
    	return view("user.admin.index");
    }
}
