<?php

namespace App\Http\Controllers;

use App\Models\Courscomplet;
use App\Models\Formation;
use App\Models\Lesson;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Owenoj\LaravelGetId3\GetId3;
use Symfony\Component\Console\Input\InputArgument;

class EtudiantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
       if(!Gate::allows('EtudiantAccess')){
           abort('403');
       }
       
        return view('Etudiant.allproducts');
    }
    public function profile(){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        }
        return view('Etudiant.profileEtudiant');
    }
    public function edit(Request $request){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        }
        $etudiant=User::find($request->id);
        $etudiant->name=$request->name;
        $etudiant->email=$request->email;
        $etudiant->telephone=$request->telephone;
        $etudiant->niveau=$request->niveau;
        if($request->password!=null){
            $etudiant->password=Hash::make($request->password); 
        }
        if($request->hasfile('file')){
           $destination='uploads/user_image'.$etudiant->photo;
       
           $file=$request->file;
           $extension=$file->getClientOriginalExtension();
           $filename=time().".".$extension;
           $file->move('uploads/user_image/',$filename);
           $etudiant->photo=$filename;
        }
        $etudiant->update();
        return redirect('/profile');
       


    }
    public function allproducts($categorie=null,$author=null){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        }
       
       
        if( $author){
               $formation=Formation::where('user_id','=',$author)->paginate(2);
             }
             else if($categorie){
                $formation=Formation::where('category_id','=',$categorie)->paginate(2);
             }
            //  else if($query){
                 
            //     $formation=Formation::where('title','LIKE',$query)->get();
            //  }
             else{
                $formation=Formation::paginate(2);
             }
        return view("Etudiant.allproducts",compact('formation'));
    }
    public function allproductsurch(Request $request){
         $query=$request->input('query');
       
         if($query){
                 
               $formation=Formation::where('title','LIKE','%'.$query.'%')->paginate(2);
            }

          return view("Etudiant.allproducts",['formation'=>$formation,'query'=>$query]);
    }
    public function myproducts($categorie=null,$author=null,$subscriber=null){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        }
       $tabformation=[];
       $count=0;
       $count1=0;
       $subscriber1=Subscriber::where('user_id',$subscriber)->get();
       if($subscriber){
        $tabformation=[];
        $count=0;
        $count1=0;
        $subscriber1=Subscriber::where('user_id',$subscriber)->get();
        $formation2=Formation::all();
        foreach($formation2 as $form){
            foreach($subscriber1 as $sub){
             if($form->id==$sub->formation_id){
                $tabformation[$count1] =$form;
                $count1++;
             }
             }
        }
       $formation=$tabformation; 
       }
       else{
 if( $author){
               
               $formation1=Formation::where('user_id','=',$author)->get();
                foreach($formation1 as $form){
                    foreach($subscriber1 as $sub){
                     if($form->id==$sub->formation_id){
                        $tabformation[$count] = $form;
                        $count++;
                     }
                    }
                }
                $formation=$tabformation;
               
             }
              if($categorie){
                $tabformation=[];
                $count=0;
                $count1=0;
                $subscriber1=Subscriber::where('user_id',$subscriber)->get();
                $formation1=Formation::where('category_id','=',$categorie)->get();
                foreach($formation1 as $form){
                    foreach($subscriber1 as $sub){
                     if($form->id==$sub->formation_id){
                        $tabformation[$count1] =$form;
                        $count1++;
                     }
                    }
                }
                $formation=$tabformation;
             }
           
            
           
            
       }
       
        return view("Etudiant.myproducts",['formation'=>$formation]);
    }
    public function myproductsurch(Request $request){
         $query=$request->input('query');
         $count1=0;
         $tabformation=[];
         $subscriber1=Subscriber::where('user_id',$request->subscriber)->get();
         if($query){
                 
               $formation1=Formation::where('title','LIKE','%'.$query.'%')->get();
               foreach($formation1 as $form){
                foreach($subscriber1 as $sub){
                 if($form->id==$sub->formation_id){
                    $tabformation[$count1] =$form;
                    $count1++;
                 }
                }
            }
            $formation=$tabformation;
            }

          return view("Etudiant.myproducts",['formation'=>$formation,'query'=>$query]);
    }
    // public function myproducts(){
    //     if(!Gate::allows('EtudiantAccess')){
    //         abort('403');
    //     }
    //     return view("Etudiant.myproducts");
    // }
    public function contenucours($id){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        } 
       $formation=Formation::find($id);
       return view("Etudiant.coursContent",['formation'=>$formation]);
    }
    public function lessoncontenu($fichier=null,$formation=null){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        } 
        $fichier=Lesson::find($fichier);
        $formation1=Formation::find($formation);
        return view("Etudiant.lessonContent",['fichier'=>$fichier,'formation'=>$formation1]);
    }
    public function completlesson($lessonNext=null,$lessonCurrent=null,$formation=null,$user=null){
        if(!Gate::allows('EtudiantAccess')){
            abort('403');
        }
        $count=0;
        $subscriber=Subscriber::where('user_id',$user)->where('formation_id',$formation)->first();
        $courscomplet=new Courscomplet();
        $courscomplet->subscriber_id=$subscriber->id;
        $courscomplet->lesson_id=$lessonCurrent;
        if(!Courscomplet::where('lesson_id',$lessonCurrent)->exists()){
            $courscomplet->save();  
        }
       $ids=[]; 
        $fichier=Lesson::find($lessonNext);
        $formation1=Formation::find($formation);
         $chapterformation=$formation1->chapters;
         foreach($chapterformation as $chapter){
             foreach($chapter->lessons as $lesson){
               if($lesson->type=='video'){
                $ids[$count]=$lesson->id;
                   $count++;
                       
               }
             }
         }
         $lessons=Courscomplet::where('subscriber_id',$subscriber->id)->wherein('lesson_id',$ids)->get()->count();
         $countlessons=$lessons*100/$count;
         $subscriber->progress=$countlessons;
         $subscriber->save();
        return view("Etudiant.lessonContent",['fichier'=>$fichier,'formation'=>$formation1]);
    }
   public function affichprofs($user=null){
    $subscriber=Subscriber::where('user_id',$user)->get();
    
    $tabform=[];
    $tabprof=[];
    $count=0;
    foreach($subscriber as $sub){

        $formation=Formation::where('id',$sub->formation_id)->first();
        $tabform[$count]=$formation;
        $count++;
        }
        $count=0;
       foreach($tabform as $form) {
         $prof=User::where('id',$form->user_id)->distinct()->first();
         $tabprof[$count]=$prof;
         $count++;
       }
       return view('Etudiant.myprofs',['profs'=>$tabprof]);
    }
   }

