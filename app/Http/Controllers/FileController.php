<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\temporary;
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
            // dd($file->name);
            Storage::delete('public/files/'.$file->discriminator);
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

    public function storeTemporary(Request $request)
    {
        $file = $request->file('image');
        $filename = hexdec(uniqid()) . '.' . $file->extension();
        $folder = uniqid() . '-' . now()->timestamp;
        Session::put('folder', $folder); //save session  folder
        Session::put('filename', $filename); //save session filename
        Storage::putFileAs('files/tmp/', $file, $filename);

        Temporary::create([
            'folder' => $folder,
            'image' => $filename
        ]);

        return 'success';
    }


    public function destroy(Temporary $temporaryData)
    {
        $temporaryFolder = Session::get('folder');
        $namefile = Session::get('filename');

        $path = storage_path() . '/app/files/tmp/' . $temporaryFolder . '/' . $namefile;
        if (File::exists($path)) {
            File::delete($path);
            rmdir(storage_path('app/files/tmp/' . $temporaryFolder));

            //delete record in table temporaryImage
            Temporary::where([
                'folder' =>  $temporaryFolder,
                'image' => $namefile
            ])->delete();

            return 'success';
        }

        else {
            return 'not found';
        }
    }

    public function storePermanent(Request $request)
    {
        $temporaryFolder = Session::get('folder');
        $namefile = Session::get('filename');

        $temporary = Temporary::where('folder', $temporaryFolder)->where('image', $namefile)->first();

        if ($temporary) { //if exist
            //GW KERJAIN DISINI =======================================


            $fileDiscriminator = Time().$namefile; // generate unique name
            Storage::putFileAs('public/files', $file, $fileDiscriminator);
            $file = new File();
            $file->TraineeCode = Auth::user()->TraineeCode;
            $file->discriminator = $fileDiscriminator;
            $file->name = $namefile;
            $file->save();



            //GW KERJAIN DISINI =======================================
            //hapus file and folder temporary
            $path = storage_path() . '/app/files/tmp/' . $temporary->folder . '/' . $temporary->image;
            if (File::exists($path)) {

                Storage::move('files/tmp/'.$temporary->folder.'/'.$temporary->image, 'files/'.$temporary->folder.'/'.$temporary->image);

                File::delete($path);
                rmdir(storage_path('app/files/tmp/' . $temporary->folder));

                //delete record in temporary table
                $temporary->delete();

                return response()->json(['status' => true, 'message' => 'Data Success']);
            }

            return response()->json(['status' => true, 'message' => 'Data Gagal']);

        }

        return response()->json(['status' => false, 'message' => 'Data Gagal']);
    }

}
