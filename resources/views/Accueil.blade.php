<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LAcademy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link rel="stylesheet" href="css/style1.css"> -->
    <!-- <link rel="stylesheet" href="css/style.scss"> -->
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" id="authentification">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="/accueil" class="navbar-brand header-logo topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="/uploads/system/logo-light.png" alt="" height="40">
            </span>
          
        </a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Domicile</a></li>
                <li><a href="#courses-section" class="nav-link">Cours</a></li>
                <li><a href="#programs-section" class="nav-link">Programmes</a></li>
                <li><a href="#teachers-section" class="nav-link">Enseignants</a></li>
                <li><a href="#Feedbacks" class="nav-link">Commentaires</a></li>
                <!-- <li><a href="accueilEtudiant.php" class="nav-link">Feedbacks</a></li> -->
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contactez-nous</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="sign">
                <!--sign-->
                <div class="container " id="container">
                  <div class="form-container sign-up-container">
                    <form method="POST" action="{{ route('register') }}" > 
                      @csrf
                      
                    
                     <div id="app">
                                        
                    </div>
                    <script src="{{ mix('js/app.js')}}"></script>
                     
                     
                    </form>

                  </div>
                  <div class="form-container sign-in-container">
                   
                     <form action="{{ route('login') }}" method="post" id="signin_form">
                      @csrf
                      <h1 class="title">S'identifier</h1>
                      {{-- @if($role !=null )
                      {{$role}}
                      @endif --}}
                      <br>
                      <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @if(session()->has('message'))
              {{-- <h3 style="color: #7CFC00"> 
                {{session()->get('status')}}
              </h3> --}}
              <div class="div alert alert-success alert-dismissible">{{session()->get('message')}}
            
               
            </div>
        
              @endif
                      {{-- <div id="error_signin_mail"></div> --}}
                      <input type="email" id="email" placeholder="email" name="email" placeholder="Username/E-mail"
                        value="" required autofocus/>
                      {{-- <div id="error_signin_pwd"></div> --}}
                      <input type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password" />
                      <a href="{{ route('password.request') }}" data-toggle="modal" data-target="#oMessagerie">Mot de passe oublié?</a>
                      <button>S'identifier</button>
                    </form>
                  </div>
                  <div class="modal fade" id="oMessagerie" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="oMessagerieLabel">changement password</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">x</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <x-auth-session-status class="mb-4" :status="session('status')" />

                          <!-- Validation Errors -->
                          <x-auth-validation-errors class="mb-4" :errors="$errors" />
                          <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                
                            <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email')" />
                
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            </div>
                
                            {{-- <div class="flex items-center justify-end mt-4">
                                <x-button>
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div> --}}
                       
                        </div>
                        <div class="modal-footer" style="text-align: center">
                          <button type="submit" class="btn btn-secondary" >Réinitialiser password</button>
                        </div> 
                      </form>
                      </div>
                    </div>
                  </div>
                  <div class="overlay-container">
                    <div class="overlay">
                    <div id="overlay-left" class="overlay-panel overlay-left">
                          <h1>Content de te revoir!</h1>
                          <p>Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
                          <button class="ghost" id="signIn">S'identifier</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                          <h1>Bonjour, apprenant !</h1>
                          <p>Entrez vos données personnelles et commencez votre voyage avec nous</p>
                          <button class="ghost" id="signUp">S'inscrire</button>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <!--end-->
          </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Cours</h2>
          </div>
        </div>
      </div>
    </div>
    @php
    $formations=App\Models\Formation::all();
    use App\Models\User;
          use App\Models\Subscriber;
    @endphp
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">
           @foreach($formations as $course)
           @php
         
           $chapter_number=$course->chapters->count();
           $profId=$course->user_id;
           $prof=User::Find($profId);
 
           @endphp
            
                 <div class="course bg-white h-100 align-self-stretch" >
                     <figure class="m-0">
                       <img src="/uploads/formations/{{$course->photo}}" alt="Image" class="img-fluid" width="340px" height="211.55px">
                     </figure>
                     <div class="course-inner-text py-4 px-4">
                       
                       <span class="course-price">{{$course->prix}}$</span>
                       
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
                   
                 
           @endforeach
          

           
             </div>

        </div>
        {{-- <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div> --}}
      </div>
    </div>


    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Nos programmes</h2>
            <p>Notre objectif est de rendre les études SIMPLES, FACILES et ACCESSIBLES à TOUS. Nous avons donc rassemblé les MEILLEURS COURS au monde en un seul endroit.</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="/images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Nous sommes excellents en éducation</h2>
            <p class="mb-4">L'éducation est un art et nous sommes les artistes.</p>

            @php
           $subscribers=App\Models\Subscriber::all();
           @endphp
            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon-users icon"></span></span>
              <div><h3 class="m-0">{{$subscribers->count()}} abonnés</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-eye"></span></span>
              <div><h3 class="m-0">{{$projects->views}} visiteurs Aujourd'hui</h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="/images/undraw_teaching.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Viser l'excellence</h2>
            <p class="mb-4">notre objectif est votre réussite.</p>
           
            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon-users icon"></span></span>
              <div><h3 class="m-0">{{$subscribers->count()}} abonnés</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-eye"></span></span>
              <div><h3 class="m-0">
                {{-- @foreach($projects as $project) --}}
              {{$projects->views}} visiteurs Aujourd'hui
               {{-- @endforeach --}}
              </h3></div>
            </div>

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="/images/undraw_teacher.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">L'éducation c'est la vie</h2>
            <p class="mb-4">Début d'un voyage d'apprentissage sans fin.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon-users icon"></span></span>
              <div><h3 class="m-0">{{$subscribers->count()}} abonnés</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-eye"></span></span>
              <div><h3 class="m-0">{{$projects->views}} visiteurs Aujourd'hui</h3></div>
            </div>

          </div>
        </div>

      </div>
    </div>

    
    <div class="site-section" id="teachers-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Nos enseignants</h2>
            <p class="mb-5">Le meilleur nous promettons le meilleur nous sommes !</p>
          </div>
        </div>
       @php
       use App\Models\prof;
       $teachers=prof::all();
       @endphp
        <div class="row">
             <div class="owl-carousel col-12 nonloop-block-14">
              
          @foreach($teachers as $teacher)
          
              
      
            
          {{-- <div class="col-md-12 col-lg-5 mb-4 d-block w-100" data-aos="fade-up" data-aos-delay="100"> --}}
            <div class="teacher text-center">
              <img src="/uploads/user_image/{{$teacher->photo}}" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4"  style="height:300px;width:300px;">
              <div class="py-2">
                <h3 class="text-black">{{$teacher->name}}</h3>
                <p class="position">Spécialité: {{$teacher->spécialité}}</p>
                <p>&ldquo;{{$teacher->description}}&rdquo;</p>
              </div>
            {{-- </div> --}}
          
          </div>
          @endforeach
        
        </div></div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
@php
$feedbacks=App\Models\Feedback::where('type','site')->get();
@endphp
    <div class="site-section" id="Feedbacks" >
      <div class="container">
        <div class="row mb-4 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Feedbacks des étudiants</h2>
          </div>
        </div>
      </div>
    </div>
  
    <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
       <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">
                  @foreach($feedbacks as $feedbak)
                      <div style="text-align:center">
                        <div class="col-md-12 testimony">
                        <div class="col-md-12 offset-md-4" >
                          <img src="/uploads/user_image/{{$feedbak->user->photo}}" alt="Image" class="img-fluid w-25 mb-4 rounded-circle" style="height:60px;width:280px">
                          </div>
                          <h3 class="mb-4">{{$feedbak->user->name}}</h3>
                          <blockquote>
                            <p>&ldquo; {{$feedbak->description}}&rdquo;</p>
                          </blockquote>
                        </div>
                      </div>
                @endforeach
               
                      
                
</div>
</div>
      </div>
      </div>


    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="/images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="/images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Pourquoi nous choisir</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon-users icon"></span></span></div>
                <div><h3 class="m-0">{{$subscribers->count()}} abonnés</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-eye"></span></span></div>
                <div><h3 class="m-0">{{$projects->views}} visiteurs Aujourd'hui</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Les meilleurs professionnels du monde</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Développez vos connaissances</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">
                  Meilleurs cours d'assistant d'enseignement en ligne</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Meilleurs professeurs</h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7">

            <h2 class="section-title mb-3">Contactez-nous</h2>
            <p class="mb-5">Nous sommes plus qu'heureux de recevoir vos suggestions.</p>
            <!-- Beginning of the php for the contact form -->
           
                 <div class="alert "></div>
              
            <!-- End of the php for the contact form -->
            <form action="{{ route('send.email') }}" class="" method="post" data-aos="fade" id="contact_form">
              @csrf
              @if(session()->has('message'))
                                                <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif
              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_fullname"></div>
                  <input type="text" name="name" id="contact_fullname" class="form-control" placeholder="Nom complet" value="" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_subject"></div>
                  <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Sujet" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_email"></div>
                  <input type="email" id="contact_email" name="email"  class="form-control" placeholder="Email" value="" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <div id="error_contact_message"></div>
                  <textarea class="form-control" id="contact_message" name="message" cols="30" rows="10" placeholder="Ecrivez vos messages ici." required></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <input type="submit" name="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Envoyer le Message">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>À propos de LAcademy</h3>
        <p>Une plate-forme d'apprentissage en ligne riche en ressources, nous rendons l'apprentissage facile et simple pour tout le monde.</p>
       </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home-section" class="nav-link">Domicile</a></li>
              <li><a href="#courses-section" class="nav-link">Cours</a></li>
              <li><a href="#programs-section" class="nav-link">Programmes</a></li>
              <li><a href="#teachers-section" class="nav-link">Enseignants</a></li>
            </ul>
            </div>
            <div class="col-md-3 ml-auto">
              <ul class="list-unstyled footer-links">
              @auth
              <li><a href="#" class="nav-link" data-toggle="modal" data-target="#oMessagerie1">Ajouter Feedback</a></li>
              @endauth
              @guest
                  
              <li><a href="#authentification" class="nav-link" >Ajouter Feedback</a></li>
              @endguest
              <li><a href="#Feedbacks" class="nav-link">Feedbacks</a></li>
            </ul>
          </div>
          @auth
          <div class="modal fade" id="oMessagerie1" tabindex="-1" role="dialog" aria-labelledby="oMessagerieLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="oMessagerieLabel">ajouter feedback</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">x</span>
                  </button>
                </div>
                <div class="modal-body">
                  
      
                  <!-- Validation Errors -->
                  
                  <form method="post" action="{{route('feedbacksite')}}">
                    @csrf
        
                    <!-- Email Address -->
                    <div class="form-group">
                      
                    <textarea name="feedback" class="form-control" rows="10" placeholder="taper un feedback"></textarea>
                    
                    <input type="hidden" name="userid" value={{ Auth::user()->id}}>
                    </div>
               
                </div>
                
                <div class="modal-footer" style="">
                  
                   <button type="submit" class="btn btn-md btn-primary" value="valider">valider</button> 
                 
                  
                </div>
                 
              </form>
              </div>
            </div>
          </div>
          @endauth
          

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved   
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div> <!-- .site-wrap -->
<style>

  .modal{
   position:fixed;top:30%;left:40%;
  }
</style>
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>
  <script src="/js/jquery.countdown.min.js"></script>
  <script src="/js/bootstrap-datepicker.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.31/vue.cjs.js"></script> --}}

  <script src="/js/main.js"></script>

  </body>
</html>
