<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Category;
use App\Models\Subscriber;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::where('user_id',Auth::user()->id)->paginate(2);
        $categs=Category::all();
         return view ('addform.index',compact('categs'))->with('formations', $formations);
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('addform.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
         //validation
        $validatedData=$request->validate([
            'title'=>'required|min:4|max:100',
            'description'=>'required',
            'prix'=>'required',
            'duréFormation'=>'required'

        ]);
        $input = $request->all();
        Formation::create($input);
        return redirect('index')->with('flash_message', 'Formation was Addedd!'); 
    }*/
    
    public function store(Request $request)
    {

            $formation=new Formation();
            $formation->title=$request->input('title');
            $formation->description=$request->input('description');
            $formation->duréeFormation=$request->input('duration');
            $formation->prix=$request->input('price');
         $formation->prerequis=$request->input('prerequis');
            $formation->category_id=$request->input('category');
            $formation->user_id=$request->profid;
            $datetime=new DateTime();
            
                $file=$request->file;
                $extension=$file->getClientOriginalExtension();
                $filename=time().".".$extension;
                $file->move('uploads/formations/',$filename);
                $formation->photo=$filename;
            
            $formation->dateCreation=$datetime->format('Y-m-d');
            $formation->save();
            $request->session()->flash('status','Foramtion est crée avec succès!!');
            return redirect()->route('addform.index');
            // dd('OK');
            //dd($request->all());-->permet d'afficher tout ce qui est inserer
    }
   
    /**
     * Display the specified resource.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('addform.show',[
            'formation'=> Formation::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation=Formation::findOrFail($id); 
        return view('addform.edit',[
           'formation'=>$formation    
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
        $formation=Formation::findOrFail($id);
        $formation->title=$request->input('title');
        $formation->description=$request->input('description');
        $formation->duréeFormation=$request->input('duration');
        $formation->prix=$request->input('price');
        $formation->category_id=$request->input('category');
        $formation->user_id=$request->profid;
        
            
        $file=$request->file;
        $extension=$file->getClientOriginalExtension();
        $filename=time().".".$extension;
        $file->move('uploads/formations/',$filename);
        $formation->photo=$filename;
    $datetime=new DateTime();
    $formation->dateCreation=$datetime->format('Y-m-d');
        $formation->save();
        $request->session()->flash('status','formation est modifiée avec succés!!');
        return redirect()->route('addform.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $formation=Formation::findOrFail($id); 
        $formation->delete();

        $request->session()->flash('status','formation est Supprimée avec succés!!');
        return redirect()->route('addform.index');
    }
   
}
