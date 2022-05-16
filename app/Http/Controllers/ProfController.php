<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if(!Gate::allows('profAccess')){
            abort('403');
        }
        return view('homeprof');
    }
    public function edit(Request $request){
        if(!Gate::allows('profAccess')){
            abort('403');
        }
        $prof=User::find($request->id);
        $prof->name=$request->name;
        $prof->email=$request->email;
        $prof->telephone=$request->telephone;
        $prof->spécialité=$request->specialite;
        $prof->description=$request->description;
        if($request->password!=null){
            $prof->password=Hash::make($request->password); 
        }
        if($request->hasfile('file')){
           $destination='uploads/user_image'.$prof->photo;
       
           $file=$request->file;
           $extension=$file->getClientOriginalExtension();
           $filename=time().".".$extension;
           $file->move('uploads/user_image/',$filename);
           $prof->photo=$filename;
        }
        $prof->update();
        return redirect('/profileProf');
       


    }
  
}
