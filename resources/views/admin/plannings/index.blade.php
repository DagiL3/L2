@extends('modelA')
@section('title', 'Planning')
@section('contents')
<p><b>Plannings</b></p>
@unless(empty($plannings))

<table border = "1">
<tr>

<td>ID</td>
<td>Cours_ID</td>
<td>Date_Debut</td>
<td>Date_Fin</td>
@if(Auth::user()->IsAdmin())
<td>Edit</td>
<td>delete</td>
@endif
</tr>

@foreach($plannings as $planning)
<tr><td>{{$planning->id}}</td>
<td>{{$planning->cours_id}}</td>
<td>{{$planning->date_debut}}</td>
<td>{{$planning->date_fin}}</td>
@if(Auth::user()->IsAdmin())
<td><a href='/admin/planningEdit/{{$planning->id}}'>Edit</a></td>
<td><a href='/admin/planningdelet/{{$planning->id}}'>Delete</a></td>
@endif
@endforeach
</tr>
</table>
<br><a href="/home">accuile</a><br>
<br><a href="/listTitle">List cours par intituler</a><br>

@endunless
@endsection


