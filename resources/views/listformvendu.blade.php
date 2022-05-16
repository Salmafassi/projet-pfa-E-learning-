
@extends('prof.AccueilProf')
@section('content')
    <h1>liste des formations Vendus</h1>
    <div>
      @if(session()->has('status'))
      <h3 style="color: green"> 
        {{session()->get('status')}}
      </h3>
      @endif
    </div>
              
<link rel="stylesheet" href="/css/showless.css">
    <script src="/js/listlesson.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://kit.fontawesome.com/632cfa148c.js" crossorigin="anonymous"></script>
 <!--css design-->


    <!--js design-->
 
        <!--partie body-->
    <div>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
          <h2><b>Liste de mes formations</b></h2>
         </div>
         <div class="col-sm-6">
          {{-- <a href="{{route('addform.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter une Nouvelle</span></a> --}}

         
         </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
          
                            <th>Titre</th>
                            <th>Description</th>
                             <th>Catégorie</th>
                            <th>Prix</th>
                            <th>durée</th>
                            <th>Nombre_Vente</th>
                            {{-- <th>Modifier</th>
                            <th>Supprimer</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $formations=App\Models\Formation::where('status','Vendu')->get();
                        $subscribers=App\Models\Subscriber::all();
                        $mysubscriber=[];
                         $count=0;
                        @endphp
                         @foreach($formations as $form)
                         @foreach($subscribers as $sub)
                         @php
                         if($form->id==$sub->formation_id){
                           $mysubscriber[$count]=$sub;
                           $count++;
                         }
                         @endphp
                         @endforeach
                        @endforeach
                        @forelse ($formations as $formation)  
                       
                      
                   @php
                        $var=App\Models\Category::find($formation->category);
                   @endphp
                 @if($formation->user_id==Auth::User()->id)  
                               

                        <tr>
          
            
                <td width="200">{{$formation->title}}</td>
                <td>{{$formation->description}}</td>
                <td>{{$formation->category->name}}</td> 
                <td>{{$formation->prix}}</td>
                <td>{{$formation->duréeFormation}}</td>
                <td>{{count($mysubscriber)}}</td>
            
            
      
        
                {{-- <td>
                    
                     <!--<button class="btn btn-warning"><a href="{{route('addform.edit',['addform'=>$formation->id])}}" >Edit</a></button>-->
                    <a href="{{route('addform.edit',['addform'=>$formation->id])}}" > <i class="fa-solid fa-pen-to-square btnedit"></i></a>
                </td><td>    
                     <form method="POST" action="{{route('addform.destroy',['addform'=>$formation->id])}}">
                     
                        @csrf
                         @method('DELETE')
                         <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                        <!-- <button class="btn btn-danger" value="Delete">Delete</button>-->

                     </form>
                </td> --}}
                @endif 
                
                            @empty
                            <p>Aucune formation n'est présente</p>
                          @endforelse
                         
            </tr>
            
                        <tr>
                        </tr>
          
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection