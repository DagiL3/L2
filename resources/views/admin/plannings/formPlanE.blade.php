@extends('modelA')

@section('contents')
    <p>choisir le  cour</p>
    <form action ="/admin/getPlanning" method="post">
        cour:
        <form action="/action_page.php">
         <label for="user">Choose Enseignant:</label>
        <select name="user" id="user">
        <optgroup label="Enseignant">
           @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->nom}}</option>
        @endforeach
    </optgroup>
  </select>
  <br><br>
  <input type="submit" value="Submit">
        @csrf
    </form>
@endsection
