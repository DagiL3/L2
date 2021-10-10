@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">cree des cours</h1>
       
    
        <form method="post" action="{{route('createcours')}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="intitule"> intitule:</label>
                <input type="text" class="form-control" name="intitule" value="{{old('intitule')}}">
            </div>

            


     <label for="formation_id"> formation</label>
      <select name="formation_id" id="formation_id">
        <optgroup label="formation">
             @foreach($formations as $formation)
                  <option value="{{$formation->id}}">{{$formation->intitule}}</option>
              @endforeach
         </optgroup>
     </select> 

     <form action="/action_page.php">
         <label for="user_id"> user</label>
      <select name="user_id" id="user_id">
        <optgroup label="user">
             @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->nom}}</option>
              @endforeach
         </optgroup>
     </select> 
           
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
@endsection