<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\PublicFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PublicFileController extends Controller
{
    public function viewDashboard(){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        $files = DB::table('public_files')->simplePaginate(10);
        return view('dashboardPublic', compact('files'));
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

            $fileDiscriminator = Time().$filename;
            Storage::putFileAs('public/public_files', $file, $fileDiscriminator);
            $file = new PublicFile();
            $file->name = $filename;
            $file->discriminator = $fileDiscriminator;
            $file->save();
        }
        return redirect('/dashboardPublic');
    }


    public function delete($id){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());
        $file = PublicFile::find($id);
        if(isset($file)){
            // dd($file->name);
            Storage::delete('public/public_files/'.$file->discriminator);
            $file->delete();
        }
        return redirect('/dashboardPublic');
    }

    public function download($id){
        $curr = time();
        $last = Session::get('time');
        if($curr - $last > 60){
            return redirect('/logout');
        }
        Session::put('time', time());

        $file = PublicFile::find($id);
        return Storage::download('public/public_files/'.$file->discriminator);
    }
}
