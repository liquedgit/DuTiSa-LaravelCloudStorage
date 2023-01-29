<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function settings() {
        return view('settings');
    }

    public function updatePassword(Request $request) {
        $curr = time();
        $last = Session::get('time');

        if($curr - $last > 60){
            return redirect('/logout');
        }

        Session::put('time', time());

        $validated = $request->validate([
            "new_password" => ["required"],
            "confirm_new_password" => ["required"]
        ]);

        $newPassword = $request->new_password;
        $confirmNewPassword = $request->confirm_new_password;

        if ($newPassword === $confirmNewPassword) {
            $user = User::where("TraineeCode", "=", Auth::user()->TraineeCode)->first();
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect("/dashboard");
        }

        return redirect("/settings")->withErrors(["No Match" => "Confirm password doen't match."]);
    }
}
