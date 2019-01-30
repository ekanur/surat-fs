<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan_surat;

class LayananSuratController extends Controller
{
    public function index()
    {
        $layanan_surat = Layanan_surat::all();
        return view("user.admin.layanan", compact("layanan_surat"));
    }
}
