@extends('model')

@section('contents')
    <p>Modification of password </p>
    <form action ="/changePassword" method="post">
    Current password: <input type="password" name="mdp">
    New password: <input type="password" name="nmdp">
    Confirmation MDP<input type="password" name="mdp_confirmation">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection