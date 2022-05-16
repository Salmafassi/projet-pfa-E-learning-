<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function edit(Request $request){
        
        $admin=User::find($request->id);  
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->telephone=$request->telephone;
        $admin->description=$request->description;
        if($request->password!=null){
            $admin->password=Hash::make($request->password); 
        }
        if($request->hasfile('file')){
           $destination='uploads/user_image'.$admin->photo;
       
           $file=$request->file;
           $extension=$file->getClientOriginalExtension();
           $filename=time().".".$extension;
           $file->move('uploads/user_image/',$filename);
           $admin->photo=$filename;
        }
        $admin->update();
        return redirect('/profileAdmin');
       


    }
}
