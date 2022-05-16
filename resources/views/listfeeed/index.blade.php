@extends('prof.AccueilProf')
@section('content')
    <h1>liste des commentaires</h1>
    <div>
      @if(session()->has('etatfeed'))
      <h3 style="color: green"> 
        {{session()->get('etatfeed')}}
      </h3>
      @endif
    </div>
    <link rel="stylesheet" href="/css/showless.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div>
        <div class="container my-5">
            <div class="shadow-4 rounded-5 overflow-hidden">
              <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                  <tr>
                    <th>Nom_Etudiant</th>
                    <th>commentaire</th>
                    <th>Formation_Visée</th>
                    <th>Créer_le</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  

                    @php
                          $var=App\Models\Feedback::all();
                          $tuc=App\Models\Formation::where('user_id',Auth::user()->id)->get();

                        @endphp
                        @foreach($var as $feedback)
                          @foreach($tuc as $formation)
                          @if($feedback->type=='course' && $feedback->formation_id==$formation->id)
 <tr>
                    <td width="200">
                        
                      
                      <div class="d-flex align-items-center">
                        <img
                            src="/uploads/user_image/{{$feedback->user->photo}}"
                             alt=""
                             style="width: 45px; height: 45px;margin-right:10px;"
                             class="rounded-circle"
                             />
                        <div class="ms-3">
                          <p class="fw-bold mb-1">{{$feedback->user->name}}</p>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-bold mb-1">{{$feedback->description}}</p>
                    </td>
                    <td>
                      <span class="badge badge-success rounded-pill" style="width: 100px;height: 30px; text-align: center;font-size: 15px;">{{$formation->title}}</span>
                    </td>
                    <td>
                        <p class="fw-bold mb-1">{{$feedback->created_at}}</p>
                    </td>
                    <td>
                        <form method="POST" action="{{route('listfeed.destroy',['listfeed'=>$feedback->id])}}">
                     
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                         </form>
                    </td>
                  </tr>
                          @endif
                          @endforeach
                        @endforeach

               

                </tbody>
              </table>
            </div>
          </div>
@endsection