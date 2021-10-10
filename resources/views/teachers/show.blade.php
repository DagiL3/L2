@extends('model')
@section('title', 'Liste des cours')
@section('contents')
<p><b> La liste des cours pour Enseignants</b></p>
@unless(empty($cours))

<table border = "1">
<tr>
<td>ID</td>
<td>InTITULE</td>
<td>USER_ID</td>
<td>FORMATION_ID</td>
<td>CREATED_AT</td>
<td>UPDATED_AT</td>
<td>Create_Session</td>
</tr>
@foreach($cours as $cour)
<tr><td>{{$cour->id}}</td>
<td>{{$cour->intitule}}</td>
<td>{{$cour->user_id}}</td>
<td>{{$cour->formation_id}}</td>
<td>{{$cour->created_at}}</td>
<td>{{$cour->updated_at}}</td>
<td><a href="/create_sessionid/{{$cour->id}}">Create_Session</a></td>
@endforeach
</tr>
</table>

<br><a href="/listTitle">List cours par intituler</a><br>

@endunless
@endsection


