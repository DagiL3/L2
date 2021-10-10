@extends('modelA')
@section('title', 'Liste des cours')
@section('contents')
<p><b> La liste des cours pour Enseignants</b></p>
@unless(empty($users))

<table border = "1">
<tr>
<td>ID</td>
<td>NOM</td>
<td>PRENOM</td>
<td>FORMATION_ID</td>
<td>TYPE</td>
<td>ACCEPTE</td>
<td>REFUSE</td>
</tr>
@foreach($users as $user)
<tr><td>{{$user->id}}</td>
<td>{{$user->nom}}</td>
<td>{{$user->prenom}}</td>
<td>{{$user->formation_id}}</td>
<td>{{$user->type}}</td>
<td><a href="/accept/{{$user->id}}">ACCEPTE</a></td>
<td><a href="/refuse/{{$user->id}}">REFUSE</a></td>
@endforeach
</tr>
</table>


@endunless
@endsection


