<link rel="stylesheet" href="/css/styleAdd.css">
@extends('prof.AccueilProf')
@section('content')
<!--contentheader-->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Exprimer vos Suggestions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

  <!--contentheader-->
  <form  method="POST" action="{{route('addSuggest.store')}}">
    @csrf 
   
  <div class="container2" >
    <div class="contact-box1">
        <div class="leftSuggest"></div>
        <div class="right1">
            <h2>Nouvelle Suggestion</h2>
           <br>
           <input type="hidden" name="professeurid" value="{{Auth::User()->id}}">
            <textarea placeholder="N'hésitez pas" name="description" class="field2" id="description" required></textarea>
            <button class="btn1">Envoyer</button>
        </div>
    </div>
</div>
  </form>
@endsection
