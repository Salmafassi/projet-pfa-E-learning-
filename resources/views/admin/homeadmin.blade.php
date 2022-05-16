@extends('admin.AccueilAdmin')
@section('content')
{{-- <section class="content">
     <div class="container"> --}}
        <div class="content-header">
            <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      @php
      $formations=App\Models\Formation::all();
    $formV=App\Models\Formation::where('status','Vendu')->get();
      $suggestions=App\Models\Suggestion::all();
      $feeds=App\Models\Feedback::where('type','site')->get();
      $profs=App\Models\User::all();
      $totalrevenu=0;
     
      @endphp
        
       
      <div class="row mt-4"> 
       <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
             
              
              <h3>{{$formations->count()}}</h3>
              

              <p>Nombre_Formations</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-graduation-cap "></i>
            </div>
            <a href="{{route('listform.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              
                @foreach ($profs as $prof)   
               @endforeach  
                <h3>{{$prof->where('type','App\Models\prof')->count()}}</h3>
               
             
                <p>Nombre_Professeurs</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-graduation-cap "></i>
              </div>
              <a href="{{route('listprof.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
       
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              
               
                <h3>{{$suggestions->count()}}</h3> 
                 
              
              <p>Nombre_Suggestions</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('listsugg.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> 
        <!-- ./col -->
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">

           
          
               <h3>{{$feeds->count()}}</h3>
            

              <p>Feedbacks</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-message "></i>
            </div>
            <a href="{{route('listfeed.index')}}" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> 
        <!-- ./col -->
       <div class="col-lg-3 col-6">
         
          <div class="small-box bg-danger">
            <div class="inner">

              @foreach ($formV as $fv)    
              @php 
              $subscribers=App\Models\Subscriber::where('formation_id',$fv->id)->get()->count();
              $totalrevenu= $totalrevenu+$fv->prix*$subscribers;
              @endphp
              @endforeach
          
               <h3>{{$totalrevenu}}</h3>
          
              <p>Total_Revenu</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-message "></i>
            </div>
            <a href="/formvenduA" class="small-box-footer">plus d'info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> 
      </div>
</div></div>
@endsection