@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">associe avec un cour</h1>
       
    
        <form method="post" action="{{route('associe')}}">
            @method('PUT') 
            @csrf        
        <form action="/action_page.php">
            <label for="cour">Choose cours:</label>
                <select name="cour" id="cour">
                    @foreach($cours as $cour)
                      <option value="{{$cour->id}}">{{$cour->intitule}}</option>
                    @endforeach
   
                </select>
    
                
            <label for="tech">Chose Enseignant:</label>
                <select name="tech" id="tech">
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->prenom}}</option>
                    @endforeach
   
                </select>
          
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
@endsection
