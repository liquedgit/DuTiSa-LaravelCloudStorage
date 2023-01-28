<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function auth(Request $request){
//         dd($request);
        $credentials = $request->validate([
            'TraineeCode' => 'required',
            'password' => 'required'
        ]);

        $check = Auth::attempt($credentials);
        if($check){
            Session::put('time', time());

            $nameGetter = DB::table('users')->where('TraineeCode', $request->TraineeCode)->get();

            Session::put('name', $nameGetter[0]->name);


            return redirect()->intended('dashboard');
        }

        return back()->withErrors(["status" => "Login Failed !"]);
    }

    public function logout(Request $request){
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

    public function register(Request $request){

        $data = $request->validate([
            'TraineeCode' => 'required',
            'name' => 'required',
            'password' => 'required',
            'ConfirmPassword' => 'required'
        ]);


        if($data['password'] != $data['ConfirmPassword']){
            return back()->withErrors(["status" => "Password does not match"]);
        }

        if(DB::table('users')->where('TraineeCode', $data['TraineeCode'])->exists()){
            return back()->withErrors(["status" => "Trainee number already exists"]);
        }

        DB::table('users')->insert([
            'name' => $data['name'],
            'TraineeCode' => $data['TraineeCode'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect('/logindirect');
    }

}
