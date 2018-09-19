<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use App\User;
use App\File;

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
            else //User
                return redirect()->route('user_dashboard', ['type' => 'all']);
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
    public function addUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = 1;
        $user->save();

        return redirect()->route('admin_dashboard');
    }
    public function selfUploadFile(Request $request){
        //dd($request->all());
        $filename = $request->file('file')->store('public');
        $filename = str_replace('public/', '', $filename);

        $file = new File();
        $file->filename = $filename;
        $file->original_filename = $request->original_filename;
        $file->type = $request->type;

        $user = Auth::user();
        $user->files()->save($file);

        return redirect()->route('user_dashboard', ['type' => 'all']);
    }
    public function uploadFileToUser(Request $request){
        $filename = $request->file('file')->store('public');
        $filename = str_replace('public/', '', $filename);

        $file = new File();
        $file->filename = $filename;
        $file->original_filename = $request->original_filename;
        $file->type = $request->type;

        $user = User::find($request->user_id);
        $user->files()->save($file);
        return redirect()->back();
    }
    public function deleteFile(Request $request){
        File::destroy($request->file_id);
         return redirect()->back();
    }
    public function getAdminIndex(Request $request){
        $data = [
            'user' => Auth::user(),
            'users' => User::where('rol', 1)->get()
        ];
        return View('admin')->with($data);
    }

    public function getUserFiles(Request $request, $id, $type){
        $admin = Auth::user();
        $user = User::find($id);
        $data = [
            'user' => $admin,
            '_user' => $user,
            'files' => []
        ];
        if($type == 'documentos'){
              $files = $user->files()->where('type', 0)->get();
              $data['files'] = $files;
        }else if($type == 'presentaciones'){
              $files = $user->files()->where('type', 1)->get();
              $data['files'] = $files;
        }else if($type == 'inversion'){
              $files = $user->files()->where('type', 2)->get();
              $data['files'] = $files;
        }else{
              $files = $user->files;
              $data['files'] = $files;
        }
        return view('user_a')->with($data);
    }

    public function getUserIndex(Request $request, $type){
        $data = [
            'user' => Auth::user(),
            'files' => []
        ];
        if($type == 'documentos'){
              $files = Auth::user()->files()->where('type', 0)->get();
              $data['files'] = $files;
        }else if($type == 'presentaciones'){
              $files = Auth::user()->files()->where('type', 1)->get();
              $data['files'] = $files;
        }else if($type == 'inversion'){
              $files = Auth::user()->files()->where('type', 2)->get();
              $data['files'] = $files;
        }else{
              $files = Auth::user()->files;
              $data['files'] = $files;
        }
    	return view('user')->with($data);
    }
}
