@extends('model')
@section('title', 'Liste des Formations')
@section('contents')
<p><b> La liste des Formations</b></p>
@unless(empty($formations))

<table border = "1">
<tr>
<td>ID</td>
<td>InTITULE</td>
<td>CREATED_AT</td>
<td>UPDATED_AT</td>
</tr>
@foreach($formations as $formation)
<tr><td>{{$formation->id}}</td>
<td>{{$formation->intitule}}</td>
<td>{{$formation->created_at}}</td>
<td>{{$formation->updated_at}}</td>
@if(Auth::user()->IsAdmin())
<td><a href = 'deleteFormation/{{$formation->id }}'>Delete</a></td>
<td><a href = 'editFormation/{{$formation->id}}'>Modify</a></td>
@endif
</tr>
@endforeach
</table>
@if(Auth::user()->IsAdmin())
<a href = '/createformation'>Add Formation</a></td>
@endif
<!--<br><a class="navbar-brand" href="/admin">Return to accuile</a> <br>-->
@else
@endunless
@endsection



