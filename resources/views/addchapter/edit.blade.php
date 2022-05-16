<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Modification de Chapitre</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!--contentheader-->
  <form  method="POST" action="{{route('addchapter.update',['addchapter'=>$chapter->id])}}" enctype="multipart/form-data">
    <!--addlesson lwla hia lfolderfin mstokia update et addlesson tania hia nom de parametre jbnah mn laliste des routes-->
    @csrf 
    @method('PUT')
  <div class="container1">
    <div class="contact-box1">
        <div class="leftchap"></div>
        <div class="right1">
            <h2>Modifier</h2>
            <input type="text" class="field1" name="title" value="{{old('title',$chapter->title)}}" placeholder="Title" required/>
            @php
            use App\Models\Formation;
             $formas=Formation::all();
            @endphp

            <select required id="" class="field1" name="formation" required>
              <option value="">selectionner une formation</option>

              @foreach ($formas as $item)
                  <option value="{{$item->id}}" @if($chapter->formation_id==$item->id) selected @endif>{{$item->title}}</option>
              @endforeach
            </select>
                  
                <button class="btn1">Valider</button>
        </div>
    </div>
</div>
  </form>
@endsection
