@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modification of Nom/Prenom</h1>
       
    
        <form method="post" action="{{route('updateNom')}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="nom"> Nom:</label>
                <input type="text" class="form-control" name="nom" value="{{old('nom')}}">
            </div>

            
            <div class="form-group">
                <label for="description">Prenom:</label>
                <input type="text" class="form-control" name="prenom" value="{{old('prenom')}}">
            </div>
           
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection