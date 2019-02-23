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
            $dosen = Dosen::select("id", "nama")->where("id", $id)->get();
        }
            // $dosen = Dosen::select("id", "nama")->whereIn("id", $id)->get();

        return $dosen;
    }

    function updateStatusSurat(Request $request){
        // dd($request);
        // $verifikator = Verifikator::where("layanan_surat_id", $request->layanan_surat_id)->get();
        // dd($verifikator);
        $verifikasi = Verifikasi::updateOrCreate(["permohonan_surat_id" => $request->permohonan_surat_id, "user_tipe"=> auth()->user()->tipe, "urutan" => $request->urutan], ["status" => $request->status, "updated_at" => date("Y-m-d")]);
          
        $permohonan_surat = Permohonan_surat::find($request->permohonan_surat_id);
        // if($request->status == 'tolak'){            
            $permohonan_surat->status = ($request->status == 'tolak')? 'ditolak': 'verifikasi';
        // }
        $permohonan_surat->save();
        // else{
            // dd(Verifikator::where([['layanan_surat_id', $permohonan_surat->layanan_surat_id]])->get()->count());
            // if($request->urutan == Verifikator::where([['layanan_surat_id', $permohonan_surat->layanan_surat_id]])->get()->count()){
                // $permohonan_surat->status = 'siap_cetak' ;
            // }
            
        // }

        return redirect()->back();
    }

    function isSiapCetak($permohonan_surat_id, \Illuminate\Support\Collection $verifikator){
        $user_tipe = array();
        foreach($verifikator as $verifikator){
            $user_tipe[] = $verifikator->user_tipe;
        }
        $count_verifikasi = Verifikasi::where([["permohonan_surat_id", $permohonan_surat_id], ["status", "setuju"]])->whereIn("user_tipe", $user_tipe)->count();
        return ($count_verifikasi == count($user_tipe));
    }
}
