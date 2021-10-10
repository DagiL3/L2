@extends('model')
@section('title', 'Liste des cours')
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
@if(Auth::user()->IsAdmin())
<td>MODIFY</td>
<td>DELETE</td>
@endif
@if(Auth::user()->IsEtudiant())
<td>Inscription</td>
@endif

</tr>
@foreach($cours as $cour)
<tr><td>{{$cour->id}}</td>
<td>{{$cour->intitule}}</td>
<td>{{$cour->user_id}}</td>
<td>{{$cour->formation_id}}</td>
<td>{{$cour->created_at}}</td>
<td>{{$cour->updated_at}}</td>

@if(Auth::user()->IsAdmin())
<td><a href="/editCour/{{$cour->id}}">MODIFY</a></td>
<td><a href="/deleteCour/{{$cour->id}}">DELETE</a></td>
@endif

@if(Auth::user()->IsEtudiant())
<td><a href="/inscription/{{$cour->id}}">Inscription</a></td>
@endif


@endforeach
</tr>
</table>
<br><a href="/listTitle">List cours par intituler</a><br>
@else
@endunless
@endsection


