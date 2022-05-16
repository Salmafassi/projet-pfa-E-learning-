@extends('prof.AccueilProf')
@section('content')
{{-- <section class="content">
     <div class="container"> --}}
        <div class="content-header">
            <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      @php
     
      $formations=App\Models\Formation::where('user_id',Auth::User()->id)->get();
      $subscribers=App\Models\Subscriber::all();
      $Suggestions=App\Models\Suggestion::where('user_id',Auth::User()->id)->get();
      $feeds=App\Models\Feedback::where('type','course')->get();
      $listfeedback=[];
      $mysubscriber=[];
      $count=0;
      $totalrevenu=0;
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
        
       
      <div class="row mt-4"> 
       <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              
              <h3>{{$formations->count()}}</h3>
            
              

              <p>Tous Mes Cours</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-graduation-cap "></i>
            </div>
            <a href="{{route('addform.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
           
            
              <h3>
               {{ $Suggestions->count()}} 
              </h3>

              <p>Nombre_Suggestions</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('addSuggest.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">

                <h3>{{count($mysubscriber)}}</h3>   
              <p>Abonnés</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('listSub.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> 
        <!-- ./col -->
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">

          @foreach ($feeds as $feed)    
             @foreach($formations as $form)
             @if($feed->formation_id==$form->id)
             @php
             $listfeedback[$count]=$feed;
             $count++;  
             @endphp   
             @endif
             @endforeach
              @endforeach
              
               <h3>{{count($listfeedback)}}</h3>
            

              <p>Commentaires</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-message "></i>
            </div>
            <a href="{{route('listfeed.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> 
        
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-8 offset-3">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Nouveau Abonnés</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
    
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 m-2">
                
                    <div class=" tablecontainer1 table-responsive">
                        <table id="myDatatable1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>photo</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                   
                                </tr>
                            </thead>
                              <tbody>
                                 
                                @foreach ($mysubscriber as $subs) 
                                @php
                                
                                // $date=new Date();
                                  $today=today()->format('Y-m-d');
                                  $var=App\Models\User::find($subs->user_id);
                                  @endphp
                                
                              
                                  
                                    @if($subs->created_at==$today." 00:00:00")
                                    <tr>
                                      <td>
                                        <img src="/uploads/user_image/{{$var->photo}}" class="img-circle elevation-2" alt="User Image" width="50px;" height="50px">
                                      </td>
                                      <td>{{$var->name}}</td>
                                      <td>{{$var->email}}</td>
                                      
                                      
                                  </tr>
                                 @endif
                          @endforeach
                              </tbody>

                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div></div>
@endsection