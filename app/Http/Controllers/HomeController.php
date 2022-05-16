<?php

namespace App\Http\Controllers;

use App\Models\Ensafiens;
use App\Models\Formation;
use App\Models\prof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(isset(Auth::user()->id)){
          $role=Auth::user()->type;
        $ensafiens=Ensafiens::all();
        
        if($role=="App\Models\Etudiant"){
            
            $email=Auth::user()->email;
            $test=false;
            foreach($ensafiens as $ensafien){
                if($ensafien->email==$email){
                    $test=true;
                    break;
                }
            }
            $formation=Formation::all();
            $author=prof::all();
            
            // return view('allproducts',compact('formation'));
            if($test){
                return redirect('/allproducts')->with(['formation'=>$formation,'autho'=>$author]);
            }
            else{
                return redirect('/allproducts')->with(['formation'=>$formation,'autho'=>$author]);
            }
        }
       
            
        
      else if($role=="App\Models\prof"){
       return view('prof.homeprof');
    }
        else if($role=="App\Models\Admin" ){
            return view('admin.homeAdmin');
        }
        else{
            return redirect('/accueil');
        }  
        }
        else{
            return redirect('/accueil')->with(['message' => ' Veuillez contacter le directeur vous etes bloqué!!']); //hna lindir view libghitha t2afficha
   
        }
        
    }
    
}
