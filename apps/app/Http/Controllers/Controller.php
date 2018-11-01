<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Dosen;
use Auth;
use App\Verifikasi;
use App\Permohonan_surat;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getDosen($id){
        $dosen = null;
        if (is_array($id)) {
            $dosen = Dosen::select("id", "nama")->whereIn("id", $id)->get();
        }else{
            $dosen = Dosen::select("id", "nama")->where("id", $id)->first();
        }

        return $dosen;
    }

    function updateStatusSurat(Request $request){
        $verifikasi = Verifikasi::where([["permohonan_surat_id", $request->permohonan_surat_id], ["user_id", auth()->user()->id]])->update(["status" => $request->status], ["updated_at" => date("Y-m-d")]);
        
        // dd($this->cekStatus($request->permohonan_surat_id));
        if($this->cekStatus($request->permohonan_surat_id)){            
            $permohonan_surat = Permohonan_surat::find($request->permohonan_surat_id);
            $permohonan_surat->status = ($request->status == 'tolak') ? 'ditolak' : 'siap_cetak' ;
            $permohonan_surat->save();
        }

        return $verifikasi;
    }

    function cekStatus($permohonan_surat_id){
        $verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id]])->select("status")->get();

        if($verifikasi->contains("status", "diajukan")){
            return false;
        }
        return true;
    }
}
