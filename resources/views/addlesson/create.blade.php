<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ajouter une Leçon</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

  <!--contentheader-->
  <form  method="POST" action="{{route('addlesson.store')}}" enctype="multipart/form-data">
    @csrf 
   
  <div class="container1">
    <div class="contact-box1">
        <div class="leftless"></div>
        <div class="right1">
            <h2>Nouveau Leçon</h2>
            <input type="text" class="field1" name="title"  placeholder="Titre" id ="title" required/>
            @php
            use App\Models\Chapter;
             $chapters=Chapter::all();
            @endphp
              <script>
                $(document).ready(function(){
                  var float= /^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/;
                 $("#selectFormation").on('change',function(){
                  var formation = $(this).children("option:selected").val();
                    if(!float.test(formation)){
                      $("#erreurselect").show();
                    $("#hide").val("false");
                    }
                    else{
                      $("#erreurselect").hide();
                      $("#hide").val("true");
                    }
                  
                 });
                 $("form").submit(function(e){
                  if($("#hide").val()=="false"){
                    e.preventDefault();
                  
                  }
                    return true;
                });
                $("#file").click(function(){
                  var float= /^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/;
                  var formation = $("#selectFormation").children("option:selected").val();
                    if(!float.test(formation)){
                      $("#erreurselect").show();
                    $("#hide").val("false");
                    }
                    else{
                      $("#erreurselect").hide();
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
            <input type="hidden" id="hide">
            <select id="selectFormation" class="field1" name="formation" required>
              <option >selectionner le Chapitre</option>

              @foreach ($chapters as $item)
                  <option value="{{$item->id}}" >{{$item->title}}</option>
              @endforeach
            </select>
            <div id="erreurselect" style="color:red;margin-bottom:8px;display:none;">formation is required</div>
            <select id="" class="field1" name="type" required>
              <option value="">----le type du document----</option>
                    <option value="video">video</option>
                    <option value="CoursPdf">CoursPdf</option>
                    <option value="exercice">exercice</option>
              </select>            
             
            <input type="file" name="file" class="upload-box1" id="file" required>
            <button class="btn1">Valider</button>
        </div>
    </div>
</div>
  </form>
@endsection
