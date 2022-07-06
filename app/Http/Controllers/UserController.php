<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route("home");
        }else{
            return redirect()->back()->with('message','Şifre veya E-mail Hatalı')->with('message_type','danger');
        }

    }

    public function logout(){
        Auth::logout();

        session()->flush();
        session()->regenerate();

        return redirect()->route('loginPage');
    }
}
