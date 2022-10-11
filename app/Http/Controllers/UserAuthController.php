<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserAuthController extends Controller
{
    public function create(){
        return view('authenticate.user-register');
    }

    public function store(Request $request){
        $formFields=$request->validate([
            'username'=>['required','min:3'],
            'location'=>'required',
            'password'=>'required|confirmed|min:5'
        ]);

        $formFields['password']=bcrypt($formFields['password']);
        $user=User::create($formFields);

        auth()->login($user);
        return redirect('/')->with('message','User created and logged in');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message','Logged Out');
    }

    public function login(){
        return view('authenticate.user-login');
    }

    public function authenticate(Request $request){

        $formFields=$request->validate([
            'username'=>['required','min:3'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now logged in');
        }

        return back()->withErrors(['username'=>'Invalid Credentials'])->onlyInput();
        
    }
}
