@extends('layout')

@section('content')
<h2>{{$post->title}}</h2>
<p>{{$post->description}}</p>
<p>{{$post->prix}}</p>
<p>{{$post->duréeFormation}}</p>
<em>{{$post->created_at}}</em>  
@endsection