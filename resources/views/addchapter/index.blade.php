
@extends('prof.AccueilProf')

@section('content')
    <div>
      @if(session()->has('etatChap'))
      <h3 style="color: #7CFC00"> 
        {{session()->get('etatChap')}}
      </h3>
      @endif
    </div>
   
    <link rel="stylesheet" href="/css/showless.css">
    

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
          <h2><b>liste des Chapitres</b></h2>
         </div>
         <div class="col-sm-6">
          <a href="{{route('addchapter.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter un Nouveau</span></a>

         
         </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                           <th>titre</th>
                            <th>Formation</th>
                            <th>Date de creation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count=0;
                        @endphp
                   @forelse ($chapters as $chapter) 
                   @php
                          $variable=$chapter->formation;
                          
                        @endphp
            
            @if($variable->user_id==Auth::user()->id)      
                        <tr>
          
                @php   $count++; @endphp
            
                <td width="200">{{$chapter->title}}</td>
                <td>{{$chapter->formation->title}}</td>
                <td>{{$chapter->dateCreation}}</td>
            
      
        
                <td>
<a href="{{route('addchapter.edit',['addchapter'=>$chapter->id])}}" > <i class="fa-solid fa-pen-to-square btnedit"></i></a>

</td><td>
                     <form method="POST" action="{{route('addchapter.destroy',['addchapter'=>$chapter->id])}}">
                        @csrf
                         @method('DELETE')
                         <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>

                     </form>
                </td>
                            
            </tr>
            @endif
            @empty
                            <p>Aucun chapitre n'est ajouté</p>
                          @endforelse
                        <tr>
                        </tr>
          
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Visualisation de <b>{{$count}}</b> entrées</div>
                    <ul class="pagination">
                        <div class="row"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection