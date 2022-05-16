<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters= Chapter::all();
         return view ('addchapter.index')->with('chapters', $chapters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addchapter.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapter=new Chapter();
        //$var=formation::find();
        $chapter->title=$request->input('title');
        $chapter->formation_id=$request->input('formation');
        $datetime=new DateTime();
        $chapter->dateCreation=$datetime->format('Y-m-d');
        $chapter->save();
        $request->session()->flash('etatChap','Chapitre Ajouté avec succés');
        return redirect()->route('addchapter.index');
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
        $chapter=Chapter::findOrFail($id); 
        return view('addchapter.edit',[
           'chapter'=>$chapter    
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
        $chapter=Chapter::findOrFail($id); 

        $chapter->title=$request->input('title');
        $chapter->formation_id=$request->input('formation');
        $chapter->save();
        $request->session()->flash('etatChap','Chapitre est modifié avec succès!!');
        return redirect()->route('addchapter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $chapter=Chapter::findOrFail($id); 
        $chapter->delete();

        $request->session()->flash('etatChap','Chapitre est supprimé avec succés!!');
        return redirect()->route('addchapter.index');
    }
}
