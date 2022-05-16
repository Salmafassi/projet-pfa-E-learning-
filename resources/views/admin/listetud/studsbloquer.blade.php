@extends('admin.AccueilAdmin')
@section('content')
    <h1>liste des Etudiants Bloqués</h1>
    <div>
     
    </div>
    <link rel="stylesheet" href="/css/showless.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div>
        <div class="container my-5">
            <div class="shadow-4 rounded-5 overflow-hidden">
              @if(session()->has('etatetud'))
              {{-- <h3 style="color: #7CFC00"> 
                {{session()->get('status')}}
              </h3> --}}
              <div class="div alert alert-success alert-dismissible">{{session()->get('etatetud')}}
            
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        
              @endif
              <table class="table align-middle mb-0 bg-white" style="border-end-end-radius: 20px;border-top-left-radius:20px;border-end-start-radius:20px;border-start-end-radius:20px;">
                <thead class="bg-light">
                  <tr>
                    <th>photo</th>
                    <th>Nom_Etudiant</th>
                    <th>Email_Etudaint</th>
                    <th>Niveau</th>
                    <th>Supprimer</th>
                   
                  </tr>
                </thead>
                <tbody>
                    @php
                    $studs=App\Models\User::all();
                    $var=$studs->where('type','App\Models\Etudiant')->where('statusEtudiant','elimini');
                    @endphp
                    @forelse ($var as $stud)
                   
                  <tr>
                      <td> 
                        <img
                            src="/uploads/user_image/{{$stud->photo}}"
                             alt=""
                             style="width: 45px; height: 45px"
                             class="rounded-circle"
                             />
                        </td>
                        <td>
                          <p class="fw-bold mb-1">{{$stud->name}}</p>
                        </td>
                         <td>
                            <p class="text-muted mb-0">{{$stud->email}}</p>
                         </td>
                    <td>
                        <p class="fw-bold mb-1">{{$stud->niveau}}</p>
                    </td>
                    <td>
                        <form method="POST" action="{{route('listetud.destroy',['listetud'=>$stud->id])}}">
                     
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                         </form>
                    </td>
                    
                  </tr>
    
                @empty
                <p>Aucun etudiant n'est présent</p>

@endforelse 
                </tbody>
              </table>
            </div>
          </div>
@endsection