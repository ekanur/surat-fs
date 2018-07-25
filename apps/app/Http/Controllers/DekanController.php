<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DekanController extends Controller
{
    function index(){
    	return view("dekan.index");
    }
}
