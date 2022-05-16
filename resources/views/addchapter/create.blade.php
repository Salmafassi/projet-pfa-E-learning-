<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ajouter un Chapitre</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

  <!--contentheader-->
  <form  method="POST" action="{{route('addchapter.store')}}" enctype="multipart/form-data">
    @csrf 
   
  <div class="container1">
    <div class="contact-box1">
        <div class="leftchap"></div>
        <div class="right1">
            <h2>Nouveau Chapitre</h2>
            <input type="text" class="field1" name="title"  placeholder="Titre" id ="title" required/>
            @php
            use App\Models\Formation;
             $formas=Formation::all();
            @endphp
            <input type="hidden" id="hide">
            <select id="selectFormation" class="field1" name="formation" required>
              <option >selectionner une Formation</option>

              @foreach ($formas as $item)
                  <option value="{{$item->id}}" >{{$item->title}}</option>
              @endforeach
            </select>
            <div id="erreurselect" style="color:red;margin-bottom:8px;display:none;">formation is required</div>
            <button class="btn1">Valider</button>
        </div>
    </div>
</div>
  </form>
@endsection
