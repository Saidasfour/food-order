<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(){
        return view('admin.adminsregister');
    }

    public function store(Request $request){
        $formFields=$request->validate([
            'username'=>['required','min:3'],
            'password'=>'required|confirmed|min:5'
        ]);

        $formFields['password']=bcrypt($formFields['password']);
        $user=Admin::create($formFields);

        auth()->login($user);
        return redirect('/admin')->with('message','Admin created and logged in');
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admins/authenticate')->with('message','Logged Out');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $formFields=$request->validate([
            'username'=>['required','min:3'],
            'password'=>'required'
        ]);
        //dd($formFields);
        

        if(Auth::guard(name:'admin')->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/admin')->with('message','You are now logged in');
        }else{
            return back()->withErrors(['username'=>'Invalid Credentials'])->onlyInput();
        }

        
    }

   
}
