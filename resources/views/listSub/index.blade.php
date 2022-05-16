@extends('prof.AccueilProf')
@section('content')
    <h1>liste des abonnés</h1>
    <div>
      @if(session()->has('etatsub'))
      <h3 style="color: #7CFC00"> 
        {{session()->get('etatsub')}}
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
                    <th>photo</th>
                    <th>Nom_Etudiant</th>
                    <th>Etudiant_email</th>
                    <th>Créer_le</th>
                    <th>Supprimer</th>
                    <th>Contacter</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($subscribers as $subsc)

                    @php
                          $variable=App\Models\Formation::find($subsc->formation_id);
                          $var=App\Models\User::find($subsc->user_id);


                        @endphp

                   @if($variable->user_id==Auth::User()->id)   
                       
                  <tr>
                      <td> 
                        <img
                            src="/uploads/user_image/{{$var->photo}}"
                             alt=""
                             style="width: 45px; height: 45px"
                             class="rounded-circle"
                             />
                        </td>
                        <td>
                          <p class="fw-bold mb-1">{{$var->name}}</p>
                        </td>
                         <td>
                            <p class="text-muted mb-0">{{$var->email}}</p>
                         </td>
                    <td>
                        <p class="fw-bold mb-1">{{$subsc->created_at}}</p>
                    </td>
                    <td>
                        <form method="POST" action="{{route('listSub.destroy',['listSub'=>$subsc->id])}}">
                     
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                         </form>
                    </td>
                    <td>
                       <span class="badge badge-warning rounded-pill" style="width: 100px;height: 30px; text-align: center;font-size: 15px;"><a href="/chatify/{{$var->id}}">Contacter_le</a></span>

                    </td>
                  </tr>
                  @endif
                @empty
                <p>Aucun abonnés n'est présent</p>

@endforelse 
                </tbody>
              </table>
            </div>
          </div>
@endsection