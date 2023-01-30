<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function viewRegister() {
        return view("auth.register");
    }

    public function executeRegister(Request $request) {

        $data = $request->validate([
            'TraineeCode' => 'required|regex:/^T([0-9]){3}/|max:4',
            'TraineeName' => 'required',
            'Password' => 'required',
            'ConfirmPassword' => 'required'
        ]);

        if($data['Password'] != $data['ConfirmPassword']){
            return back()->withErrors(["status" => "Password does not match"]);
        }

        if(DB::table('users')->where('TraineeCode', $data['TraineeCode'])->exists()){
            return back()->withErrors(["status" => "Trainee number already exists"]);
        }

        DB::table('users')->insert([
            'name' => $data['TraineeName'],
            'TraineeCode' => $data['TraineeCode'],
            'password' => bcrypt($data['Password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/login');
    }

}
