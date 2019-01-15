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

    public function import(Request $request){
        if($request->hasFile("file_import")){
            $path = $request->file("file_import")->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            if(!empty($data) && sizeof($data)!=0){
                $max = (sizeof($data)<=100) ? sizeof($data) : 300 ;
                for ($i=0; $i < $max ; $i++) {
                    if((null != $data[$i]->nim || '' != $data[$i]->nim) && (null != $data[$i]->nama || '' != $data[$i]->nama) && (null != $data[$i]->jurusan || '' != $data[$i]->jurusan) && (null != $data[$i]->prodi || '' != $data[$i]->prodi)){
                        $insert[] = [
                                "nip"=>$data[$i]->nip,
                                "nama"=>$data[$i]->nama,
                                "jurusan"=>$data[$i]->jurusan,
                                "created_at" => date("Y-m-d")
                            ];
                    }

                }

                if(!empty($insert)){
                    Mahasiswa::insert($insert);
                    session()->flash('msg', "Berhasil mengimport ".sizeof($insert)." dari ".$max." data");
                }
            }else{
                    session()->flash('msg', "Terjadi Kesalahan mengimport data.");
            }
        }

        return redirect()->back();
    }
}
