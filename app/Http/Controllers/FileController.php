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
    public function viewDashboard() {
        $curr = time();
        $last = Session::get('time');

        if($curr - $last > 60){
            return redirect('/logout');
        }

        Session::put('time', time());

        $files = File::where("TraineeCode", "=", Auth::user()->TraineeCode)->simplePaginate(10);

        return view("/dashboard", compact('files'));
    }

    public function uploadFiles(Request $request){
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

            $fileDiscriminator = Time().$filename; // generate unique name
            Storage::putFileAs('public/files', $file, $fileDiscriminator);
            $file = new File();
            $file->TraineeCode = Auth::user()->TraineeCode;
            $file->discriminator = $fileDiscriminator;
            $file->name = $filename;
            $file->save();
        }

        return redirect('/dashboard');
    }

    public function delete(Request $request){
        $curr = time();
        $last = Session::get('time');

        if($curr - $last > 60){
            return redirect('/logout');
        }

        Session::put('time', time());

        $file = File::find($request->id);

        if(isset($file)){
            Storage::delete('public/files/' . $file->discriminator);
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
        return Storage::download('public/files/'.$file->discriminator);
    }

    public function view($id){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());

        $file = File::find($id);
        return $file->id;
    }

    public function store(Request $request)
    {

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $fileDiscriminator = Time().$filename;

        Storage::putFileAs('public/files', $file, $fileDiscriminator);
        $file = new File();
        $file->TraineeCode = Auth::user()->TraineeCode;
        $file->discriminator = $fileDiscriminator;
        $file->name = $filename;
        $file->save();

        return 'success';
    }




}
