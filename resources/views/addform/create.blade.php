<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ajouter une formation</h1>
        </div><!-- /.col -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script>
    $(document).ready(function(){
      var float= /^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/;
$("#duration").keyup(function(){
       if($("#duration").val() % 1 !== 0){
         $("#erreurduration").show();
         $("#hide").val("false");
       }
       else{
        $("#erreurduration").hide();
        $("#hide").val("true");
       }
     
    });
  $("#price").keyup(function(){
    if(!float.test($("#price").val())){
      $("#erreurprice").show();
         $("#hide").val("false");
    }
    else{
        $("#erreurprice").hide();
        $("#hide").val("true");
       }
  }); 
  $("form").submit(function(e){
      if($("#hide").val()=="false"){
        e.preventDefault();
      
      }
        return true;
    });
});
  </script>
  <!--contentheader-->
  <form  method="POST" action="{{route('addform.store')}}" enctype="multipart/form-data">
    @csrf 
   
  <div class="container1" >
    <div class="contact-box1">
        <div class="left1"></div>
        <div class="right1">
            <h2>Nouvelle formation</h2>
            <input type="text" class="field1" name="title" placeholder="Titre">
            @php
            use App\Models\Category;
             $categs=Category::all();
            @endphp

            <select required id="" class="field1" name="category" id="categorie">
              @foreach ($categs as $item)
                  <option value={{$item->id}}>{{$item->name}}</option>
              @endforeach
            </select>
            <input type="hidden" name="profid" value="{{Auth::User()->id}}">
            <input type="text" class="field1" name="duration" placeholder="duration/week" id="duration">
            <div id="erreurduration" style="color:red;margin-bottom:8px;display:none;">durée doit etre entier</div>
            <input type="text" class="field1" name="price"  placeholder="prix($)" id="price">
            <div id="erreurprice" style="color:red;margin-bottom:8px;display:none;">prix doit etre double</div>
            <textarea placeholder="Description" name="description" class="field1" id="description" required></textarea>
            <input type="hidden" id="hide" value="">
            <textarea placeholder="prérequis" name="prerequis" class="field1" id="prerequis" required></textarea>
            <input type="file" name="file" class="upload-box1" accept="file_extension | image/* | media_type" required>
            <button class="btn1">Envoyer</button>
        </div>
    </div>
</div>
  </form>

@endsection
