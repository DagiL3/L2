@extends('modelA')
@section('title', 'users')
@section('contents')
<p><b>Users </b></p>
@unless(empty($users))

<table border = "1">
<tr>

<td>ID</td>
<td>NOM</td>
<td>PRENOM</td>
<td>Login</td>
<td>FORMATION_ID</td>
<td>TYPE</td>
<td>Edit</td>
<td>delete</td>
</tr>

@foreach($users as $user)
<tr><td>{{$user->id}}</td>
<td>{{$user->nom}}</td>
<td>{{$user->prenom}}</td>
<td>{{$user->login}}</td>
<td>{{$user->formation_id}}</td>
<td>{{$user->type}}</td>
@if($user->type =="NULL")
<td><a href="/accept/{{$user->id}}">ACCEPTE</a></td>
<td><a href="/refuse/{{$user->id}}">REFUSE</a></td>
@else
<td><a href='/admin/user/edit/{{$user->id}}'>Edit</a></td>
<td><a href='/admin/user/delete/{{$user->id}}'>Delete</a></td>
@endif
@endforeach
</tr>
</table>
<br><a href="/home">accuile</a><br>
<br><a href="/listTitle">List cours par intituler</a><br>
@endunless
@endsection


