@extends('admin.AccueilAdmin')
@section('content')
    <h1>liste des professeurs Bloqués</h1>
    <div>
    
    </div>
    <link rel="stylesheet" href="/css/showless.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div>
        <div class="container my-5">
            <div class="shadow-4 rounded-5 overflow-hidden">
              @if(session()->has('etatprofdeb'))
              {{-- <h3 style="color: #7CFC00"> 
                {{session()->get('status')}}
              </h3> --}}
              <div class="div alert alert-success alert-dismissible">{{session()->get('etatprofdeb')}}
            
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        
              @endif
              <table class="table align-middle mb-0 bg-white" style="border-end-end-radius: 20px;border-top-left-radius:20px;border-end-start-radius:20px;border-start-end-radius:20px;">
                <thead class="bg-light">
                  <tr>
                    <th>photo</th>
                    <th>Nom_Prof</th>
                    <th>Email_Prof</th>
                    <th>spécialité</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $profs=App\Models\User::all();
                    $var=$profs->where('type','App\Models\prof')->where('statusEtudiant','elimini');
                    @endphp
                    @forelse ($var as $prof)
                   
                  <tr>
                      <td> 
                        <img
                            src="/uploads/user_image/{{$prof->photo}}"
                             alt=""
                             style="width: 45px; height: 45px"
                             class="rounded-circle"
                             />
                        </td>
                        <td>
                          <p class="fw-bold mb-1">{{$prof->name}}</p>
                        </td>
                         <td>
                            <p class="text-muted mb-0">{{$prof->email}}</p>
                         </td>
                    <td>
                        <p class="fw-bold mb-1">{{$prof->spécialité}}</p>
                    </td>
                    <td>
                        <form method="POST" action="{{route('listprof.destroy',['listprof'=>$prof->id])}}">
                     
                            @csrf
                             @method('DELETE')
                             <button type="submit" class="btnstyle"><i class="fa-solid fa-trash-can btndelete"></i></button>
                         </form>
                    </td>
                   
                  </tr>
    
                @empty
                <p>Aucun professeurs n'est présent</p>

@endforelse 
                </tbody>
              </table>
            </div>
          </div>
@endsection