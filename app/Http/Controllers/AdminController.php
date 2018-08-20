<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getLogin(){
    	return View('index');
    }
    public function login(Request $request){
    	$userData = array(
    		'email' => $request->username,
    		'password' => $request->password
    	);

    	if(Auth::attempt($userData)) {
            if(Auth::user()->rol == 0){ //Admin
                return redirect()->route('admin_dashboard');
            }
            else
                return redirect()->route('user_dashboard');
    	}else{
	    	return redirect()
	    			->route('getLogin')
	    			->with('mensaje_error', 'Los datos ingresados son incorrectos. Por favor, verifícalos.');
    	}
    }
    public function logout(){   
        Auth::logout();
        return redirect()
                ->route('getLogin')
                ->with('mensaje_error', 'Tu sesión ha sido cerrada.');


    }
    public function getAdminIndex(Request $request){
        return View('admin')->with(Auth::user());
    }
    public function getUserIndex(Request $request){
        $data = [
            'user' => Auth::user()
        ];
    	return view('user')->with($data);
    }
}
