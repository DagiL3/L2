@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">update {{$cid->intitule}} </h1>
       
    
        <form method="post" action="{{route('updateCour' ,$cid->id)}}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="intitule"> New intitule:</label>
                <input type="text" class="form-control" name="intitule" value="{{old('intitule')}}">
            </div>

            
            <form action="/action_page.php">
         <label for="user_id"> user</label>
      <select name="user_id" id="user_id">
        <optgroup label="user">
             @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->nom}}</option>
              @endforeach
         </optgroup>
     </select> 

     <label for="formation_id"> user</label>
      <select name="formation_id" id="formation_id">
        <optgroup label="formation">
             @foreach($formations as $formation)
                  <option value="{{$formation->id}}">{{$formation->intitule}}</option>
              @endforeach
         </optgroup>
     </select> 
          
           
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
@endsection