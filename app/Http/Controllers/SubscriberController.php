<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Subscriber;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail  as FacadesMail;;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subs=Subscriber::all();
        return view('listSub.index')->with('subscribers',$subs);

    }
    public function watchcourset($formationid=null){
     if($formationid){
       $formation=Formation::find($formationid); 
       return view("Etudiant.watchcourse",compact("formation"));
     }
     else{
         return view("Etudiant.watchcourse");
     }
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
 public function add(Request $request){
    $subscriber=new Subscriber();
    $subscriber->user_id=$request->userId;
    $subscriber->formation_id=$request->formationId;
    $datetime=new DateTime();
    $subscriber->created_at=$datetime->format('Y-m-d');
    $formation=Formation::find($request->formationId);
    $subscriber->progress=0;
    if(!Subscriber::where('user_id',$subscriber->user_id)->where('formation_id',$subscriber->formation_id)->exists()){

          $subscriber->save(); 
        $message="félécitation !, vous avez inscrit avec succès sur notre cours intitulé ".$formation->title;
        $data = [
                'subject' => $message,
                'id' => $subscriber->id,
            ];

            $subsc=User::where('id',$request->userId)->first();
            FacadesMail::to($subsc->email)->send(new \App\Mail\ContactMail1($data));
         
    }
    

    return view("Etudiant.continueCourse",['formation'=>$formation]);
 }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $subs=Subscriber::findOrFail($id); 
        $subs->delete();

        $request->session()->flash('etatsub','l\'abonnés est Supprimé avec succés!!');
        return redirect()->route('listSub.index');
    }
}