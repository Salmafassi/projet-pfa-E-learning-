<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons=array();
        $formations=Formation::where('user_id',Auth::user()->id)->get();
        foreach($formations as $form){
            foreach($form->chapters as $chapter){
                foreach($chapter->lessons as $lesson){
                   $lessons[]=$lesson;
                }
            }
        }
         return view ('addlesson.index')->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addlesson.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson=new Lesson();
        //$var=formation::find();
        $lesson->title=$request->input('title');
        $lesson->type=$request->input('type');
        // $lesson->fichier=$request->input('file');
        $lesson->chapter_id=$request->input('formation');
       $file=$request->file;
       $extension=$file->getClientOriginalExtension();
       $filename=time().".".$extension;
       $file->move('uploads/lesson_files/',$filename);
       $lesson->fichier=$filename;

        $lesson->save();
        $request->session()->flash('etatless','Leçon ajouté avec succés!!');
        return redirect()->route('addlesson.index');
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
        $lesson=Lesson::findOrFail($id); 
        return view('addlesson.edit',[
           'lesson'=>$lesson    
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
        $lesson=Lesson::findOrFail($id); 
                //$var=formation::find();
        $lesson->title=$request->input('title');
        
        $lesson->type=$request->input('type');
        // $lesson->fichier=$request->input('file');
        $lesson->chapter_id=$request->input('formation');
       $file=$request->file;
       $extension=$file->getClientOriginalExtension();
       $filename=time().".".$extension;
       $file->move('uploads/lesson_files/',$filename);
       $lesson->fichier=$filename;

        $lesson->save();
        $request->session()->flash('etatless','Leçon modifié avec succés!!');
        return redirect()->route('addlesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $lesson=Lesson::findOrFail($id); 
        $lesson->delete();

        $request->session()->flash('etatless','Leçon supprimé avec succés!!');
        return redirect()->route('addlesson.index');
    }
}
