@extends('AccueilProf')

@section('content')
    <h1>list of Categories</h1>
<ul>
    <select required id="" class="field1" name="category">
            @forelse ($categs as $item)
                <option >{{$item->name}}</option>
                 @empty
                <p>No trainings to show</p>
            @endforelse
          
    </select>
       
</ul>
@endsection