@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">search by title</h1>
       
    
        <form method="post" action="{{route('showcours')}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="title"> Intitule:</label>
                <input type="text" class="form-control" name="title" >
                <button type="submit" class="btn btn-primary">search</button>
            </div>
            </form>
    </div>
@endsection