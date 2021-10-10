@extends('baseA') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Chose Enseignant</h1>
       
    
        <form method="post" action="{{route('ensigFormA')}}">
           
            @csrf        
        <form action="/action_page.php">
              
            <label for="user">Chose Enseignant:</label>
                <select name="user" id="user">
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->prenom}}</option>
                    @endforeach
   
                </select>
          
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
@endsection
