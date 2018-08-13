<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MahasiswaLoginController extends Controller
{
	function __construct()
	{
		$this->middleware("guest:mahasiswa", ['except' => ['logout']]);
	}
    public function showLoginForm(){
    	return view("auth.mahasiswa");
    }

    function login(Request $request){
    	$this->validate($request, [
    		"nim" => "required|numeric",
    		"password" => "required"
    	]);

    	if (Auth::guard("mahasiswa")->attempt(['nim' => $request->nim, 'password' => $request->password])) {
    		return redirect()->intended(route("mahasiswa.dashboard"));
    	}

    	return redirect()->back()->withInput($request->only("nim"));
    	
    }

    function username(){
    	return "nim";
    }

    function logout(){
        Auth::guard("mahasiswa")->logout();

        return redirect()->route("mahasiswa.login");
    }
}
