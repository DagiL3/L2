
@extends('modelA')

@section('contents')

<h1>Show a Date and Time Control</h1>
<form action ="/admin/form" method="post">
    @csrf   
    Cour:
<form action="/action_page.php">
         
     <label for="user_id">Choose Enseignant:</label>
      <select name="user_id" id="user_id">
        <optgroup label="User">
             @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->nom}}</option>
              @endforeach
         </optgroup>
     </select> 
        <input type="submit">
    </form>
</form>
            
@endsection
