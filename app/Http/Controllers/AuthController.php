<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    public function viewLogin() {
        return view("auth.login");
    }

    public function executeLogin(Request $request) {
        $credentials = $request->validate([
            "TraineeCode" => ["required"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            Session::put('time', time());
            Session::put('name', Auth::user()->name);
            return redirect("/dashboard");
        }

        return redirect("/login")->withErrors(["Invalid Credentials" => "Trainee credentials not found."]);
    }

    public function executeLogout() {
        Session::flush();
        Auth::logout();
        return redirect("/login");
    }
}
