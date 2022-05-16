<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Modification de Formation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!--validation-->
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
  <form  method="POST" action="{{route('addform.update',['addform'=>$formation->id])}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf 
    <div id="app">

    </div>
  <div class="container1">
    <div class="contact-box1">
        <div class="left1"></div>
        <div class="right1">
            <h2>Mettre à Jour</h2>
            <input required type="text" class="field1" name="title" value="{{old('title',$formation->title)}}" placeholder="Title">
            @php
            use App\Models\Category;
             $categs=Category::all();
            @endphp

            <select required id="" class="field1" name="category">
                <option value="">selectionner la catégorie</option>

              @foreach ($categs as $item)
                  <option value="{{$item->id}}" @if($formation->category->name==$item->name) selected @endif>{{$item->name}}</option>
              @endforeach
            </select>
            <input type="hidden" name="profid" value="{{Auth::User()->id}}">
            <input required  type="text" class="field1" name="duration" value="{{old('duration',$formation->duréeFormation)}}" placeholder="duration/week">
            <div id="erreurduration" style="color:red;margin-bottom:8px;display:none;">durée doit etre un entier</div>

            <input required type="text" class="field1" name="price" value="{{old('price',$formation->prix)}}" placeholder="price($)">
            <div id="erreurprice" style="color:red;margin-bottom:8px;display:none;">le prix doit etre un réel</div>
             <textarea required placeholder="Description" name="description"  value="{{old('description',$formation->description)}}" class="field1">{{old('description',$formation->description)}}</textarea>

             <input required type="file" name="file" class="upload-box1" value="{{old('price',$formation->photo)}}" accept="file_extension | image/* | media_type">
            <button class="btn1">Valider</button>
        </div>
    </div>
</div>
  </form>
@endsection
