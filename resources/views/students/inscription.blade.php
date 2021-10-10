@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Inscription</h1>
       
        <form method="post" action="{{route('inscription')}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="cour"> Inscription:</label>
                <select name="cour" id="cour">
                   @foreach($cours as $cour)
                 <option value="{{$cour->id}}">{{$cour->intitule}}</option>
                   @endforeach
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
@endsection
