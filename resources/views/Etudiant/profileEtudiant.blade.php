@extends('Etudiant.AccueilEtudiant')
@section('content')
 {{-- <!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

 <link rel="stylesheet" href="/css/style2.css">
 <link rel="stylesheet" href="/css/style.css">
 <link rel="stylesheet" href="/css/bootstrap.min.css">
 <script type="text/javascript"
 src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
 <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

 <script src="/js/collapse.js"></script>
 <script>

$(document).ready(function(){
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
       
    //Dès qu'on clique sur #b1, on applique hide() au titre
    $("#togg17").click(function(){
        $("#div1").toggle();
        $("#div2").toggle();
    });
    $("#phone").keyup(function(){
       if($("#phone").val().length!=10){
         $("#erreurphone").show();
         $("#hide").val("false");
       }
       else{
        $("#erreurphone").hide();
        $("#hide").val("true");
       }
    });
    $("#email").keyup(function(){
       if(!regex.test($("#email").val())){
         $("#erreuremail").show();
         $("#hide").val("false");
       }
       else{
        $("#erreuremail").hide();
        $("#hide").val("true");
       }
    });
    $("#password").keyup(function(){
       if( $("#password").val().length<8){
         $("#erreurpass").show();
         $("#hide").val("false");
       }
       else{
        $("#erreurpass").hide();
        $("#hide").val("true");
       }
    });
    $("#password_confirmation").keyup(function(){
       if( $("#password_confirmation").val()!=$("#password").val()){
         $("#erreurpassconfi").show();
         $("#hide").val("false");
       }
       else{
        $("#erreurpassconfi").hide();
        $("#hide").val("true");
       }
    });
    $("form").submit(function(e){
      if($("#hide").val()=="false"){
        e.preventDefault();
      
      }
        return true;
    });
    
    //Dès qu'on clique sur #b1, on applique show() au titre
    
});
  
  
  
  
  </script>
  <div class="wrapper">
    <div class="profile-card js-profile-card">
        <div class="profile-card__img">
            <img src="/uploads/user_image/{{Auth::user()->photo}}" id="image" alt="/uploads/user_image/placeholder.png">
        </div>
   <div class="profile-card__cnt js-profile-cnt">
    <div style="display:none" id="div2">
      <form method="POST" action="{{ Route('updateProfile') }}" enctype="multipart/form-data"  > 
        @csrf
        @method('PUT')
      <div class="form-group d-flex col-md-10 ml-auto mr-auto">
        <label for="" style="margin-top:5px">Nom complet:  </label>
        
      <input type="text"  style="margin-left:15px;" name="name" placeholder="Enter Name and LastName" value="{{Auth::user()->name}}" class="form-control"  required/>
        
    </div>
    <div class="form-group d-flex col-md-10 ml-auto mr-auto">
      <label for="" style="margin-top:5px">Email:  </label>
      
      <input type="email" id="email" name="email"  style="margin-left:15px;"  placeholder="E-mail" value="{{Auth::user()->email}}" class="form-control"
       required autofocus />
      
  </div>
  <div id="erreuremail" style="color:red;margin-bottom:8px;display:none;">invalid Email</div>

  <div class="form-group d-flex col-md-10 ml-auto mr-auto">
    <label for="" style="margin-top:5px">Tel:  </label>
    
    <input type="text" id="phone" name="telephone"  style="margin-left:30px;" class="form-control"  placeholder="phone number" value="{{Auth::user()->telephone}}"
     required autofocus />
    
</div>
<div id="erreurphone" style="color:red;margin-bottom:8px;display:none">numéro de téléphone doit contenir au moins 10 caractère</div>
<div class="form-group d-flex col-md-10 ml-auto mr-auto">
  <label for="" style="margin-top:5px">Niveau:  </label>
  
  <select name="niveau" id="select" class="form-control" style="margin-left:15px;">
   @if(Auth::user()->niveau=='INFO')
     <option selected>INFO</option>
     <option >GMSA</option>
     <option >SEII</option>
      <option >INDUS</option>
      <option >GTR</option>
      @endif
    @if(Auth::user()->niveau=='GMSA')
    <option >INFO</option>
     <option selected>GMSA</option>
     <option >SEII</option>
      <option >INDUS</option>
      <option >GTR</option>
    @endif
    @if(Auth::user()->niveau=='SEII')
    <option >INFO</option>
     <option >GMSA</option>
     <option selected>SEII</option>
      <option >INDUS</option>
      <option >GTR</option>
    @endif
    @if(Auth::user()->niveau=='INDUS')
    <option >INFO</option>
     <option >GMSA</option>
     <option >SEII</option>
      <option selected>INDUS</option>
      <option >GTR</option>
    @endif
    @if(Auth::user()->niveau=='GTR')
    <option >INFO</option>
     <option >GMSA</option>
     <option >SEII</option>
      <option >INDUS</option>
      <option selected>GTR</option>
    @endif
 </select>
   <input type="hidden" id="id" name="id"  style="margin-left:15px;" class="form-control"  placeholder="niveau " value="{{Auth::user()->id}}"
   required autofocus />
</div>
<div class="form-group d-flex col-md-7 ml-auto mr-auto">
<input type="file" name="file" class="btn form-control" id="idImageProduit" onchange="previewPicture(this)"  accept="file_extension | image/* | media_type" style="border-radius: 20px;
          border: 1px solid #7971ea;
          background-color: #7971ea;
          color: #FFFFFF;
          font-size: 12px;
          font-weight: bold;
          padding-right: 45px;
          padding-left: 45px;
        
          padding-bottom:20px;
          letter-spacing: 1px;
          text-transform: uppercase;
          transition: transform 80ms ease-in;" ></div>
           
<a class="btn btn-warning mb-2"  data-toggle="collapse" data-target="#contenu" id="changeP">
changer password
</a>
<div class="collapse" id="contenu">
  <div class="form-group d-flex col-md-10 ml-auto mr-auto">

  
  <input type="password" id="password" name="password"   style="margin-left:15px;" class="form-control"  placeholder="Saisir le nouveau password " 
 />
  
</div>
<div id="erreurpass" style="color:red;margin-bottom:8px;display:none">password doit contenir au moins 8 caracteres</div>
<div class="form-group d-flex col-md-10 ml-auto mr-auto">
 
  
  <input type="password" id="password_confirmation" name="password_confirmation"  style="margin-left:15px;" class="form-control"  placeholder="confirmer  password " 
  />
  <input type="hidden" id="hide"   style="margin-left:15px;" class="form-control"   value="1"
  />
</div>
<div id="erreurpassconfi" style="color:red;margin-bottom:8px;display:none">les deux pass ne sont pas identiques</div>
</div>
<br><br>
<button  type="submit"  class="btn" style="border-radius: 20px; 
        border: 1px solid #7971ea;
        background-color: #7971ea;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;">Modifier <i class="fa-solid fa-pen"></i></button>
        </form>
    </div>
    <div style="display:block" id="div1">
        <div class="profile-card__name"></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Nom complet: </strong><span >{{Auth::user()->name}}</span></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Email: </strong><span >{{Auth::user()->email}}</span></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Telephone: </strong><span >{{Auth::user()->telephone}}</span></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Niveau: </strong><span >{{Auth::user()->niveau}}</span></div>
       
      <script type="text/javascript">
          // L'image img#image
          var image = document.getElementById("image");

          // La fonction previewPicture
          var previewPicture = function (e) {

              // e.files contient un objet FileList
              const [ImageFile] = e.files

              // "picture" est un objet File
              if (ImageFile) {
                  // On change l'URL de l'image
                  image.src = URL.createObjectURL(ImageFile)
              }
          }
      </script>
        <br><br>
        <button  name="" id="togg17" class="btn" style="border-radius: 20px; 
        border: 1px solid #7971ea;
        background-color: #7971ea;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;" >Modifier <i class="fa-solid fa-pen"></i></button>    </div>
    
  

@endsection
