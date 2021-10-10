@extends('modelA')

@section('contents')
    <p>Enregistrement</p>
    <form action ="/admin/user/createuser" method="post">
    Nom: <input type="text" name="nom" value="{{old('nom')}}">
    Prenom: <input type="text" name="prenom" value="{{old('prenom')}}">
        Login: <input type="text" name="login" value="{{old('login')}}">
        MDP: <input type="password" name="mdp">
        Confirmation MDP: : <input type="password" name="mdp_confirmation">
        Formation:
        <form action="/action_page.php">
         <label for="formation_id">Choose formation:</label>
        <select name="formation_id" id="formation_id">
         <optgroup label="ensignant">
        <option value="-1">Ensignant</option>
         </optgroup>
        <optgroup label="Etudient">
           @foreach($formation as $forma)
          <option value="{{$forma->id}}">{{$forma->intitule}}</option>
        @endforeach
    </optgroup>
  </select>
  <br><br>
  <input type="submit" value="Submit">
        @csrf
    </form>
@endsection
