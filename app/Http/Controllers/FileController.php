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
        $files = DB::table('files')->where('TraineeCode', 'like', Auth::user()->TraineeCode)->simplePaginate(4);
        return view('homepage', compact('files'));
    }
    public function insert(Request $request){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 600){
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
        $file = $request->file;
        $filename = $file->getClientOriginalName();
        Storage::putFileAs('public/files', $file, $filename);
        $filename = 'files/'.$filename;

        $file = new File();
        $file->TraineeCode = Auth::user()->TraineeCode;
        $file->name = $filename;
        $file->save();
        return redirect('/dashboard');

    }
}
