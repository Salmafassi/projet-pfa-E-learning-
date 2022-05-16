@extends('prof.AccueilProf')
@section('content')
    <h1>liste des commentaires</h1>
    <div>

    </div>
    <link rel="stylesheet" href="/css/showless.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div>
        <div class="container my-5">

            <div class="shadow-4 rounded-5 overflow-hidden">
              @if(session()->has('etatfeed'))
              {{-- <h3 style="color: #7CFC00"> 
                {{session()->get('status')}}
              </h3> --}}
              <div class="div alert alert-success alert-dismissible">{{session()->get('etatfeed')}}
            
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        
              @endif
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
                    @forelse ($feedbacks as $feedback)

                    @php
                          $var=App\Models\User::find($feedback->user_id);
                          $tuc=App\Models\Formation::find($feedback->formation_id);

                        @endphp
                   @if($feedback->type!='site' && $tuc->user_id==Auth::user()->id)   
                       
                  <tr>
                    <td width="250">
                        
                      
                      <div class="d-flex align-items-center">
                        <img
                            src="/uploads/user_image/{{$var->photo}}"
                             alt=""
                             style="width: 45px; height: 45px;margin-right:10px;"
                             class="rounded-circle"
                             />
                        <div class="ms-3">
                          <p class="fw-bold mb-1">{{$var->name}}</p>
                         
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-bold mb-1">{{$feedback->description}}</p>
                    </td>
                    <td>
                      <span class="badge badge-success rounded-pill" style="width: 100px;height: 30px; text-align: center;font-size: 15px;">{{$tuc->title}}</span>
                    </td>
                    <td>
                        <p class="fw-bold mb-1">{{$feedback->dateCreation}}</p>
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

                @empty
                <p>Aucun commentaire à afficher</p>

@endforelse
                </tbody>
              </table>
            </div>
          </div>
@endsection