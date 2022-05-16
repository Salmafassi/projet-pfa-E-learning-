<?php

namespace App\Http\Controllers;

use App\Models\suggestion;
use App\Models\User;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions=suggestion::where('user_id',Auth::user()->id)->get();
        return view ('addSuggest.index')->with('suggestion', $suggestions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addSuggest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suggest=new suggestion();
        $suggest->description=$request->input('description');
        $suggest->user_id=$request->professeurid;

        $datetime=new DateTime();
        $suggest->dateCreation=$datetime->format('Y-m-d');
        $suggest->save();
        $request->session()->flash('etatsugg','Suggestion ajoutée avec succés!!');
        return redirect()->route('addSuggest.index');
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
        $suggest=suggestion::findOrFail($id); 
        return view('addSuggest.edit',[
           'suggestion'=>$suggest    
        ]);
        
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
        $suggest=suggestion::findOrFail($id); 
        $suggest->description=$request->input('description');
        $suggest->user_id=$request->professeurid;

        $datetime=new DateTime();
        $suggest->dateCreation=$datetime->format('Y-m-d');
        $suggest->save();
        $request->session()->flash('etatsugg','Suggestion modifiée avec succés!!');
        return redirect()->route('addSuggest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $suggest=suggestion::findOrFail($id); 
        $suggest->delete();

        $request->session()->flash('etatsugg','Suggestion est supprimée avec succés!!');
        return redirect()->route('addSuggest.index');
    }
}
