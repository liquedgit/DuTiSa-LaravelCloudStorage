<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function index(){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        $files = DB::table('files')->where('TraineeCode', 'like', Auth::user()->TraineeCode)->simplePaginate(4);
        return view('homepage', compact('files'));
    }

    public function insert(Request $request){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        $rules = [
            'file' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        foreach($request->file('file') as $file){
            $filename = $file->getClientOriginalName();
            Storage::putFileAs('public/files', $file, $filename);
            $file = new File();
            $file->TraineeCode = Auth::user()->TraineeCode;
            $file->name = $filename;
            $file->save();
        }
        return redirect('/dashboard');
    }

    public function delete($id){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        $file = File::find($id);
        if(isset($file)){
            // dd($file->name);
            Storage::delete('public/files/'.$file->name);
            $file->delete();
        }
        return redirect('/dashboard');
    }

    public function download($id){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());

        $file = File::find($id);
        return Storage::download('public/files/'.$file->name);
    }

    public function settings() {
        return view('/settings');
    }

    public function updatePassword(Request $request){
        if($request->new_password == $request->confirm_new_password) {
            $update = DB::table('users')
                ->where('TraineeCode', auth()->user()->TraineeCode)
                ->update([
                    'password' => bcrypt($request->new_password)
                ]);
            return redirect('/dashboard');
        }
        else {
            return back()->withErrors(["confirm-new-password" => "not match!"]);
        }
    }
}
