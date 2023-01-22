<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function auth(Request $request){
        // dd($request);
        $credentials = $request->validate([
            'TraineeCode' => 'required',
            'password' => 'required'
        ]);

        $check = Auth::attempt($credentials);
        if($check){
            $request->session()->regenerate();
            return redirect()->intended('menu');
        }

        return back()->withErrors(["status" => "Login Failed !"]);
    }
}
