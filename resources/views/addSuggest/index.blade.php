
@extends('prof.AccueilProf')

@section('content')
    <div>
      @if(session()->has('etatsugg'))
      <h3 style="color: #7CFC00"> 
        {{session()->get('etatsugg')}}
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
          <h2><b>Liste des Suggestions</b></h2>
         </div>
         <div class="col-sm-6">
          <a href="{{route('addSuggest.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter une Nouvelle Suggestion</span></a>

         
         </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
          
                            <th>Sujet</th>
                            <th>Date  de creation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        
                        use App\Models\suggestion;
                        $suggests=suggestion::all();
                   @endphp
                   @forelse ($suggests as $suggestion)     
                   @if($suggestion->user_id==Auth::User()->id)   
 
                        <tr>
         
           
            
                <td width="400">{{$suggestion->description}}</td>
                <td>{{$suggestion->created_at}}</td>
            
      
        
                <td>
<a href="{{route('addSuggest.edit',['addSuggest'=>$suggestion->id])}}" > <i class="fa-solid fa-pen-to-square btnedit"></i></a>

</td><td>
                     <form method="POST" action="{{route('addSuggest.destroy',['addSuggest'=>$suggestion->id])}}">
                        @csrf
                         @method('DELETE')
                         <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>

                     </form>
                </td>
                @endif
                            @empty
                            <p>Aucune suggestion n'est ajoutés</p>
                          @endforelse
            </tr>
                        <tr>
                        </tr>
          
                    </tbody>
                </table>
</div>

@endsection