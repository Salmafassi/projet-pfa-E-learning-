<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ListetudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studs = User::all();
        return view ('admin.listetud.index')->with('studs', $studs);
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
        $studs=User::findOrFail($id)->where('type','App\Models\Etudiant'); 
        $studs->delete();

        $request->session()->flash('etatetud','Etudiant Supprimé avec Succés!!');
        return redirect()->route('listetud.index');
    }
    public function Bloquer(Request $request,$id)
    {
        $studs=User::findOrFail($id); 
        $studs->statusEtudiant='elimini';
        $studs->update(['statusEtudiant' => 'elimini']);
        $request->session()->flash('etatetud','Etudiant Bloqué avec Succés!!');
        return redirect()->route('listetud.index');
    }
    public function Débloquer(Request $request,$id)
    {
        $studs=User::findOrFail($id); 
        $studs->statusEtudiant='normal';
        $studs->update(['statusEtudiant' => 'normal']);
        $request->session()->flash('etatetud','Etudiant Débloqué avec Succés!!');
        return redirect()->route('listetud.index');
       
    }
   
}
