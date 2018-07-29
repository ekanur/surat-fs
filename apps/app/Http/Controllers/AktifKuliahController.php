<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AktifKuliahController extends Controller
{
    public function index(Request $request)
    {
    	return "aktif-kuliah";
    }

    public function view()
    {
    	return view("surat/aktif_kuliah");
    }
}
