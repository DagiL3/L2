
@extends('modelA')

@section('contents')

<h1>Show a Date and Time Control</h1>
<form action ="/admin/create_session" method="post">
    @csrf   
    Cour:
<form action="/action_page.php">
         <label for="cour_id">Choose Cour:</label>
      <select name="cour_id" id="cour_id">
        <optgroup label="Cour">
             @foreach($cours as $cour)
                  <option value="{{$cour->id}}">{{$cour->intitule}}</option>
              @endforeach
         </optgroup>
     </select> 
     <label for="user_id">Choose Enseignant:</label>
      <select name="user_id" id="user_id">
        <optgroup label="User">
             @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->nom}}</option>
              @endforeach
         </optgroup>
     </select> 
   
        <label for="datedd">session commence (y-m-d-h:m):</label>
        <input type="datetime-local" id="datedd" name="datedd">
  
        <label for="dateff">session fini (y-m-d-h:m):</label>
        <input type="datetime-local" id="dateff" name="dateff">
  
        <input type="submit">
    </form>
</form>
            
@endsection
