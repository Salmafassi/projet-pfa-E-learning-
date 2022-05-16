@extends('Etudiant.AccueilEtudiant')
@section('content')
<div class=" course-filter">
    <div class="filter-label">
      Catégorie:
      @php
      $var=App\Models\Category::all();
      $authors=App\Models\prof::all();
      use App\Models\Ensafiens;
      @endphp
    </div>
    <div class="btn-group">
      <button class="btn btn-default btn-lg btn-course-filter dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        
          Tous <span class="caret"></span>
        
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/allproducts">Tous</a></li>
       @foreach($var as $categorie)
       <li><a href="/allproducts/{{$categorie->id}}">{{$categorie->name}}</a></li>
        @endforeach  
      </ul>
    </div>
  </div>
  <!-- Filter: Author -->
  <div class="pull-left course-filter">
    <div class="filter-label">
      Prof:
    </div>
    <div class="btn-group">
      <button class="btn btn-default btn-lg btn-course-filter dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        
          Tous <span class="caret"></span>
        
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/allproducts">Tous</a></li>
        
        @foreach($authors as $author)
        <li><a href="/allproducts/author/{{$author->id}}">{{$author->name}}</a></li>
         @endforeach  
       </ul>
    </div>
  </div>
@php
$var=$query ?? "";
@endphp
<!-- Search Box -->
<div class="col-lg-4 col-md-4 offset-md-4 " >
  <form role="search" method="get" action="{{route('search')}}">
    @csrf
      <div class="input-group">
        <label for="search-courses" class="sr-only">Trouver un produit</label>
        
        <input class="form-control search input-lg" data-list=".list" id="search-courses" name="query" value="{{$var}}" placeholder="Trouver un cours" type="text">
    
        <span class="input-group-btn">
        <button aria-label="Search Courses" id="search-course-button" class="btn search btn-default btn-lg" type="submit"><i class="fa fa-search" style="padding-bottom: 5px" title="Search"></i></button>
      </span>
    </div>
  </form>
</div>
</div>
<div class="site-section">
    <div class="container"  >
        <div class="row search">
          @php 
          use App\Models\Formation;
          use App\Models\User;
          use App\Models\Subscriber;
          //$courses=Formation::all();
          $ensafiens=Ensafiens::where('email',Auth::user()->email)->exists();
           
          @endphp
          @foreach($formation as $course)
          @php
         
          $chapter_number=$course->chapters->count();
          $profId=$course->user_id;
          $prof=User::Find($profId);

          @endphp
            <div class="col-md-4">
                <div class="course bg-white h-90 align-self-stretch" style="float:right;">
                    <figure class="m-0">
                      <img src="/uploads/formations/{{$course->photo}}" alt="Image" class="img-fluid" width="340px" height="211.55px">
                    </figure>
                    <div class="course-inner-text py-4 px-4">
                      @if(!$ensafiens)
                      <span class="course-price">{{$course->prix}}$</span>
                      @endif
                      <div class="meta"><span class="icon-clock-o"></span>{{$chapter_number}} chapitres / {{$course->duréeFormation}} semaines</div>
                      <h3><a href="/contenucours/{{$course->id}}">{{$course->title}}</a></h3>
                      <p>{{$course->description}} </p>
                     
                    </div>
                    <div class="d-flex border-top stats">
                    <div class="px-2 py-2 ">
                      
                            <img class="img-fluid   rounded-circle" src="/uploads/user_image/{{$prof->photo}}" style="width:40px;height:35px;">
                      
                                
                    </div>
                    <div class="px-2 py-3 ">
                    <span>{{$prof->name}}</span>
                    </div>
                    @php
                     
                    $subscriberCours=Subscriber::where('formation_id',$course->id)->get()->count();
                    @endphp
                      <div class="py-3 w-25 px-8 ml-auto pl-2 border-left" ><span class="icon-users"></span>&nbsp;&nbsp;{{$subscriberCours}} </div>
                    </div>
                  </div>
                  
                </div>
               @endforeach
        </div>
        
          {{-- {{$formation->links()}} --}}
        
        <div class="row justify-content-center " style="margin-top:50px;margin-bottom:25px;">
            <div class="col-md-4  text-center">
              {{$formation->onEachSide(1)->links()}}
            </div>
          </div>
    </div>
  </div>
@endsection