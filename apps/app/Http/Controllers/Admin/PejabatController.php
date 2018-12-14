<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Verifikator;
use App\Dosen;

class PejabatController extends Controller
{
    function __construct()
    {
    	$this->middleware(["auth" => function($request, $next){

    		if(is_null(auth()->user()) || auth()->user()->tipe != 'admin'){
    			abort(404);
    		}
    			return $next($request);
    	}]);
    }


    function index(){
    	$pejabat = User::with("dosen")->where("tipe", "!=", "admin")->get();

    	return view("user.admin.pejabat", compact('pejabat'));
    }

    function detail($id){
    	$pejabat = User::with("dosen")->where([["tipe", "!=", "admin"], ["id", "=", $id]])->firstOrFail();
        if($pejabat->tipe == 'kajur' || $pejabat->tipe == 'sekjur'){
            $dosen = Dosen::where([["id", "!=","1"], ["jurusan", "=", $pejabat->dosen->getOriginal('jurusan')]])->get();
        }else{
            $dosen = Dosen::where("id", "!=","1")->get();
    	}

        // dd($dosen);

    	return view("user.admin.detail_pejabat", compact('pejabat', 'dosen'));
    }

    function update(Request $request){
        $this->validate($request, [
            'ttd' => 'nullable|mimes:jpeg,jpg,bmp,png|max:2000'
        ]);
        
        $user = User::findOrFail($request->id);
        $user->dosen_id = $request->dosen_id;
        $user->scan_ttd = (is_null($request->file('ttd')))? $request->ttd_lama : $request->file('ttd')->store("public/ttd");
        $user->save();

        return redirect()->back()->withSuccess("Berhasil memperbarui pejabat");
    }

    function resetPassword(Request $request){
        $user = User::findOrFail($request->id);
        $user->password = bcrypt('123456');
        $user->save();

        return redirect()->back()->withSuccess("Berhasil Mereset Password");
    }
}
