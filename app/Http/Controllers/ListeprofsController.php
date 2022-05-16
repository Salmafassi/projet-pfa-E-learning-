<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ListeprofsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profs = User::all();
        return view ('admin.listprof.index')->with('profs', $profs);
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
        //
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
        $prof=User::find($id); 
        $prof->delete();

        $request->session()->flash('etatprof','Professeur Supprimé avec Succés!!');
        return redirect()->route('listprof.index');
    }
    public function Bloquer(Request $request,$id)
    {
        $prof=User::findOrFail($id); 
        $prof->statusEtudiant='elimini';
        $prof->update(['statusEtudiant' => 'elimini']);
        $request->session()->flash('etatprof','Professeur Bloqué avec Succés!!');
        return redirect()->route('listprof.index');
    }
    public function Débloquer(Request $request,$id)
    {
        $prof=User::findOrFail($id); 
        $prof->statusEtudiant='normal';
        $prof->update(['statusEtudiant' => 'normal']);
       $request->session()->flash('etatprof','Professeur Débloqué avec Succés!!');
      return redirect()->route('listprof.index');
       
    }
   
}
