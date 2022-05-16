<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Modification de Leçon</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!--contentheader-->
  <form  method="POST" action="{{route('addlesson.update',['addlesson'=>$lesson->id])}}" enctype="multipart/form-data">
    <!--addlesson lwla hia lfolderfin mstokia update et addlesson tania hia nom de parametre jbnah mn laliste des routes-->
    @csrf 
    @method('PUT')
  <div class="container1">
    <div class="contact-box1">
        <div class="leftless"></div>
        <div class="right1">
            <h2>Mettre à Jour</h2>
            <input type="text" class="field1" name="title" value="{{old('title',$lesson->title)}}" placeholder="Title" required/>
            @php
            use App\Models\Chapter;
             $chap=Chapter::all();
            @endphp

            <select required id="" class="field1" name="formation" required>
              <option value="">selectionner un Chapitre</option>

              @foreach ($chap as $item)
                  <option value="{{$item->id}}" @if($lesson->chapter->id==$item->id) selected @endif>{{$item->title}}</option>
              @endforeach
            </select>
            
            <select required id="" class="field1" name="type" required>
                <option value="">--Selectionner type de document--</option>
                    <option {{ ($lesson->type) == 'video' ? 'selected' : ''}} value="video">video</option>
                    <option {{ ($lesson->type) == 'CoursPdf' ? 'selected' : ''}} value="CoursPdf">PDF_Cours</option>
                    <option {{ ($lesson->type) == 'exercice' ? 'selected' : ''}} value="exercice" >PDF_TD</option>
              </select>            
             
            <input type="file" name="file" value="{{old('file',$lesson->fichier)}}" class="upload-box1"  accept="file_extension | image/* | media_type" required>
            <button class="btn1">Valider</button>
        </div>
    </div>
</div>
  </form>
@endsection
