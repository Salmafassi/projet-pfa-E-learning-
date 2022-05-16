
@extends('prof.AccueilProf')

@section('content')
    <div>
      @if(session()->has('etatless'))
      <h3 style="color: #7CFC00"> 
        {{session()->get('etatless')}}
      </h3>
      @endif
    </div>
   
    <link rel="stylesheet" href="/css/showless.css">
    <script src="/js/listlesson.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!--css design-->


    <!--js design-->
 
        <!--partie body-->
    <div>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
          <h2><b>Liste des Leçons</b></h2>
         </div>
         <div class="col-sm-6">
          <a href="{{route('addlesson.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter un Nouveau</span></a>

         
         </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
          
                            <th>Titre</th>
                            <th>Chapitre</th>
                            <th>Type_document</th>
                            <th>Document</th>
                            <th>Date de creation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                   @forelse ($lessons as $lesson) 
            
            
                        <tr>
         
           
            
                <td width="200">{{$lesson->title}}</td>
                <td>{{$lesson->chapter->title}}</td>
                <td>{{$lesson->type}}</td>
                <td>{{$lesson->fichier}}</td>
                <td>{{$lesson->created_at}}</td>
            
      
        
                <td>
<a href="{{route('addlesson.edit',['addlesson'=>$lesson->id])}}" > <i class="fa-solid fa-pen-to-square btnedit"></i></a>

</td><td>
                     <form method="POST" action="{{route('addlesson.destroy',['addlesson'=>$lesson->id])}}">
                        @csrf
                         @method('DELETE')
                         <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>

                     </form>
                </td>
                            
            </tr>
          
            @empty
                            <p>Aucune leçon n'est présente</p>
                          @endforelse
                        <tr>
                        </tr>
          
                    </tbody>
                </table>
       <div class="clearfix">
                    <div class="hint-text">Visualisation de <b>{{count($lessons)}}</b> entrées</div>
                    <ul class="pagination">
                        <div class="row"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection