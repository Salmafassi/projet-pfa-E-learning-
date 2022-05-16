@extends('admin.AccueilAdmin')
@section('content')
    <h1>liste des formations Vendus</h1>
    <div>
      @if(session()->has('etatform'))
      <h3 style="color: green"> 
        {{session()->get('etatform')}}
      </h3>
      @endif
    </div>
    <link rel="stylesheet" href="/css/showless.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div>
        <div class="container my-5">
            <div class="shadow-4 rounded-5 overflow-hidden">
              <table class="table align-middle mb-0 bg-white" style="border-end-end-radius: 20px;border-top-left-radius:20px;border-end-start-radius:20px;border-start-end-radius:20px;">
                <thead class="bg-light">
                  <tr>

                    <th>titre</th>
                    <th>Nom_Prof</th>
                    <th>catégorie</th>
                    <th>prix(DH)</th>
                    <th>Nbr_Etudiant_inscrit</th>
                    <th>Supprimer</th>
                   
                  </tr>
                </thead>
                <tbody>
                   @php
                   $forms=App\Models\Formation::where('status','Vendu')->get();
                   @endphp
                    @forelse ($forms as $form)
                    @php
                    $var=App\Models\User::find($form->user_id);
                    $subss=App\Models\Subscriber::where('formation_id',$form->id)->get();
                    $subsc=App\Models\Subscriber::all();
                    //$subs=App\Models\Subscriber::find($form->id==$subss->$formation_id);
                
                    @endphp
                  <tr>
                      <td width="200"> 
                        <p class="fw-bold mb-1" >{{$form->title}}</p>
                        </td>
                        <td>
                          <p class="fw-bold mb-1">{{$var->name}}</p>
                        </td>
                         <td>
                            <p class="text-muted mb-0">{{$form->category->name}}</p>
                         </td>
                    <td>
                        <p class="fw-bold mb-1">{{$form->prix}}</p>
                    </td>
                    <td>
                        <p class="fw-bold mb-1">{{$subss->count()}}</p>
                    </td>
                    
                    <td>
                        <form method="POST" action="{{route('listform.destroy',['listform'=>$form->id])}}">
                     
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                         </form>
                    </td>
                  </tr>
    
                @empty
                <p>Aucune formation n'est présente</p>

@endforelse 
                </tbody>
              </table>
            </div>
          </div>
@endsection