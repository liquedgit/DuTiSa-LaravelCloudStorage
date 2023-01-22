<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function auth(Request $request){

        $credentials = [
            'traineecode' => ['required'],
            'password' => ['required']
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('myfiles');
        }

        return back()->withErrors(['status'=>'Login Failed !']);
    }
}
