
@extends('prof.AccueilProf')
@section('content')
    <h1>liste des formations</h1>
    <div>
      @if(session()->has('status'))
      {{-- <h3 style="color: #7CFC00"> 
        {{session()->get('status')}}
      </h3> --}}
      <div class="div alert alert-success alert-dismissible">{{session()->get('status')}}
    
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>

      @endif
    </div>
              
<link rel="stylesheet" href="/css/showless.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    {{-- <script src="/js/listlesson.js"></script> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/632cfa148c.js" crossorigin="anonymous"></script> --}}
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
          <a href="{{route('addform.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter une Nouvelle</span></a>

         
         </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
         
                            <th>Titre   </th>
                            <th>Description</th>
                             <th>Catégorie</th>
                            <th>Prix</th>
                            <th>durée</th>
                            
                            <th>crée_Le</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                   @forelse ($formations as $formation)     
                   @php
                        $var=App\Models\Category::find($formation->category);
                   @endphp
                 @if($formation->user_id==Auth::User()->id)   

                        <tr>
          
           
                <span style="width:15px">
 <td width="200">{{$formation->title}}</td> 
                </span>
                   
                  
               
                <td>{{$formation->description}}</td>
                <td>{{$formation->category->name}}</td> 
                <td>{{$formation->prix}}</td>
                <td>{{$formation->duréeFormation}}</td>
                
                <td>{{$formation->created_at}}</td>
            
      
        
                <td>
                    
                     <!--<button class="btn btn-warning"><a href="{{route('addform.edit',['addform'=>$formation->id])}}" >Edit</a></button>-->
                    <a href="{{route('addform.edit',['addform'=>$formation->id])}}" > <i class="fa-solid fa-pen-to-square btnedit"></i></a>
                </td><td>    
                     <form method="POST" action="{{route('addform.destroy',['addform'=>$formation->id])}}">
                     
                        @csrf
                         @method('DELETE')
                         <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                        <!-- <button class="btn btn-danger" value="Delete">Delete</button>-->

                     </form>
                </td>
                @endif
                            @empty
                            <p>Aucune formation n'est présente</p>
                          @endforelse
            </tr>
            
                        <tr>
                        </tr>
          
                    </tbody>
                </table>
      <div class="clearfix">
                    <div class="hint-text">Visualisation de <b>{{$formations->count()}}</b> entrées</div>
                    <ul class="pagination">
                        <div class="row">{{$formations->links()}}</div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection