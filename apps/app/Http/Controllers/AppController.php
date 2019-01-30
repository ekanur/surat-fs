<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Dosen;
use App\Mahasiswa;
use App\Layanan_surat;
use App\Permohonan_surat;
use Auth;
use Hash;


class AppController extends Controller
{
	function __construct(){
		$this->middleware("auth:mahasiswa");
	}
   	function index(Request $request){
   		$dosen = Dosen::where("id", "!=", 1)->get();
   		$layanan_surat = Layanan_surat::select("id", "kode_layanan")->get();
   		$id_layanan_surat = array();
   		for ($i=0; $i < sizeof($layanan_surat) ; $i++) { 
   			$id_layanan_surat[$layanan_surat[$i]["kode_layanan"]] = $layanan_surat[$i]["id"];
   		}
        $permohonan_surat = $this->getPermohonanSurat();
   		return view("mahasiswa.app", compact('dosen', 'id_layanan_surat', 'permohonan_surat'));
	   }
	   
	   function getPermohonanSurat(){
			$permohonan_surat = Permohonan_surat::with("layanan_surat")->where("mahasiswa_id", Auth::guard('mahasiswa')->user()->id)->get();
			return $permohonan_surat;
	   }

	   function gantiPassword(Request $request){
			$this->validate($request, [
				'old' => 'required',
				'password' => 'required|min:6|confirmed'
			]);

			$mahasiswa = Mahasiswa::find(Auth::id());
			$hashed_password = $mahasiswa->password;

			if(Hash::check($request->old, $hashed_password)){
				$mahasiswa->fill([
					'password' => Hash::make($request->password)
				])->save();
				$request->session()->flash('message', "Berhasil mengubah password. Password akan berubah setelah Logout");
				$request->session()->flash('status', "success");

				return redirect()->back();
			}
			$request->session()->flash('message', "Gagal mengubah password.");
			$request->session()->flash('status', "error");

			return redirect()->back();


	   }
}
