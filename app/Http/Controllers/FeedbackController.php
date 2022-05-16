<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Formation;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        $users=User::all();
        return view ('listfeeed.index',compact('users'))->with('feedbacks', $feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $feedback=new Feedback();
        $feedback->description=$request->feedback;
        $datetime=new DateTime();
        $feedback->dateCreation=$datetime->format('Y-m-d');
      $feedback->type="site";
      $feedback->formation_id=Formation::first()->id;
        $feedback->user_id=$request->userid;
           $feedback->save();
           return Redirect::back();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
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
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $feedbacks=Feedback::findOrFail($id); 
        $feedbacks->delete();

        $request->session()->flash('etatfeed','Commentaire Supprimé avec Succés!!');
        return redirect()->route('listfeeed.index');
    }
    public function store(Request $request)
    {
        $feedback=new Feedback();
        $feedback->description=$request->feedback;
        $datetime=new DateTime();
        $feedback->dateCreation=$datetime->format('Y-m-d');
        $feedback->Formation_id=$request->formationid;
        $feedback->user_id=$request->userid;
           $feedback->save();
           return Redirect::back();
    }
    public function index1($user=null){
        $feedbacks=Feedback::where('user_id',$user)->paginate(4);
        return view('Etudiant.feedback',['feedbacks'=>$feedbacks]);
    }
    public function update(Request $request){
        $feedbackid=$request->feedbackid;
        $feedbackeng=Feedback::find($feedbackid);
        $feedbackeng->description=$request->description;
        $feedbackeng->type=$request->typeselect;
        $formationId=Formation::where('title',$request->form)->first();
        $feedbackeng->formation_id=$formationId->id;
        //$feedbacks=Feedback::where('user_id',$request->user)->paginate(4);
        $feedbackeng->update();
       
        //return redirect('Etudiant.feedback',['feedbacks'=>$feedbacks]);
        return Redirect::back();
    }
    public function delete(Request $request){
          $feedback=Feedback::find($request->feedid);
          $feedback->delete();
          return Redirect::back();
    }
}
