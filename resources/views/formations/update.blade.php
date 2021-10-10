@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">update {{$formation->intitule}}</h1>
       
    
        <form method="post" action="{{route('updateformation', $formation->id)}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="intitule">New intitule:</label>
                <input type="text" class="form-control" name="intitule" value="{{old('intitule')}}">
            </div>
  
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection