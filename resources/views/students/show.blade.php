@extends('model')
@section('title', 'Liste des cours ')
@section('contents')
<p><b> La liste des cours</b></p>
@unless(empty($cours))

<table border = "1">
<tr>
<td>ID</td>
<td>InTITULE</td>
<td>USER_ID</td>
<td>FORMATION_ID</td>
<td>CREATED_AT</td>
<td>UPDATED_AT</td>
<td>DISINSCRIPTION</td>

</tr>
@foreach($cours as $cour)
<tr><td>{{$cour->id}}</td>
<td>{{$cour->intitule}}</td>
<td>{{$cour->user_id}}</td>
<td>{{$cour->formation_id}}</td>
<td>{{$cour->created_at}}</td>
<td>{{$cour->updated_at}}</td>
<td><a href="/disinscription/{{$cour->id}}">Disinscription</a></td>
</tr>
@endforeach
</table>
<a href="/listTitle">List cours par intituler</a>
@else
@endunless
@endsection




