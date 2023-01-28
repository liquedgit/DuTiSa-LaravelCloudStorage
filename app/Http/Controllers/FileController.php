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

            // Save file to db
            $file = new File();
            $file->TraineeCode = Auth::user()->TraineeCode;
            $file->name = $filename;
            $file->discriminator = $fileDiscriminator;
            $file->save();
        }
        return redirect('/dashboard');
    }

    public function delete($id){
        $file = File::find($id);
        if(isset($file)){
            Storage::delete('public/files/'.$file->discriminator);
            $file->delete();
        }
        return redirect('/dashboard');
    }

    public function download($id){
        $file = File::find($id);
//        @dd($file->discriminator);
        return Storage::download('public/files/'.$file->discriminator);
    }
}
