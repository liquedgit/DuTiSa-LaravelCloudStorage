<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            Session::put('time', time());
            // $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(["status" => "Login Failed !"]);
    }

    public function logout(Request $request){
        // $request->session()->invalidate();
        // $request->session()->regenerate();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    public function menu(){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        return redirect()->back();
    }

}
