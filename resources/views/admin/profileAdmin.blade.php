@extends('admin.AccueilAdmin')
@section('content')
 {{-- <!DOCTYPE html>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

 <link rel="stylesheet" href="/css/styleprofile.css">
 <link rel="stylesheet" href="/css/style.css">
 <link rel="stylesheet" href="/css/style.css">
 {{-- <link rel="stylesheet" href="/css/bootstrap.min.css">

 --}}
  <script type="text/javascript"src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

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
  <div class="wrapper1">
    <div class="profile-card js-profile-card">
        <div class="profile-card__img">
            <img src="/uploads/user_image/{{Auth::user()->photo}}" id="image" alt="/uploads/user_image/placeholder.png">
        </div>
   <div class="profile-card__cnt js-profile-cnt">
    <div style="display:none" id="div2">
      <form method="POST" action="{{ Route('updateProfileAdmin') }}" enctype="multipart/form-data"  > 
        @csrf
        @method('PUT')
      <div class="form-group d-flex col-md-10 ml-auto mr-auto " >
        <label for="" style="margin-top:5px">Nom:  </label>
        
      <input type="text"  style="margin-left:15px;" name="name" placeholder="Enter Name and LastName" value="{{Auth::user()->name}}" class="form-control"  required/>
        
    </div>
    <input type="hidden" id="id" name="id"  style="margin-left:15px;" class="form-control"  placeholder="niveau " value="{{Auth::user()->id}}"
   required autofocus />
    <div class="form-group d-flex col-md-10 ml-auto mr-auto">
      <label for="" style="margin-top:5px">Email:  </label>
      
      <input type="email" id="email" name="email"  style="margin-left:15px;"  placeholder="E-mail" value="{{Auth::user()->email}}" class="form-control"
       required autofocus />
      
  </div>
  <div id="erreuremail" style="color:red;margin-bottom:8px;display:none;">invalid Email</div>

  <div class="form-group d-flex col-md-10 ml-auto mr-auto">
    <label for="" style="margin-top:5px">Tel:  </label>
    
    <input type="text" id="phone" name="telephone"  style="margin-left:35px;" class="form-control"  placeholder="phone number" value="{{Auth::user()->telephone}}"
     required autofocus />
    
</div>
<div id="erreurphone" style="color:red;margin-bottom:8px;display:none">le numero de telephone doit contenir 10 caractére</div>
<!--speci-->
<div class="form-group d-flex col-md-10 ml-auto mr-auto">
    <label for="" style="margin-top:5px">Description:  </label>
    
    <textarea type="text" id="description" name="description"  style="margin-left:30px;" class="form-control"  placeholder="Enter more information" value=""
     required  >{{Auth::user()->description}}</textarea>
    
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
changer mot_de_pass
</a>
<div class="collapse" id="contenu">
  <div class="form-group d-flex col-md-10 ml-auto mr-auto">

  
  <input type="password" id="password" name="password"   style="margin-left:15px;" class="form-control"  placeholder="Entrer le nouveau mot de passe " 
 />
  
</div>
<div id="erreurpass" style="color:red;margin-bottom:8px;display:none">mot de passe doit contenir 8 caractéres</div>
<div class="form-group d-flex col-md-10 ml-auto mr-auto">
 
  
  <input type="password" id="password_confirmation" name="password_confirmation"  style="margin-left:15px;" class="form-control"  placeholder="confirmer votre nouveau mot de passe" 
  />
  <input type="hidden" id="hide"   style="margin-left:15px;" class="form-control"   value="1"
  />
</div>
<div id="erreurpassconfi" style="color:red;margin-bottom:8px;display:none">les deux mots de passe sont différent</div>
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
        transition: transform 80ms ease-in;">Mise à Jour <i class="fa-solid fa-pen"></i></button>
        </form>
    </div>
    <div style="display:block" id="div1">
        <div class="profile-card__name"></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Nom: </strong><span >{{Auth::user()->name}}</span></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Email: </strong><span >{{Auth::user()->email}}</span></div>
        <div class="profile-card__txt" ><strong style="margin-right:50px">Telephone: </strong><span >{{Auth::user()->telephone}}</span></div>
       
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
        transition: transform 80ms ease-in;" >Mise à Jour <i class="fa-solid fa-pen"></i></button>   
         </div>
        </div>
  

@endsection
