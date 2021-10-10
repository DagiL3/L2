@extends('model')
@section('title', 'Planning')
@section('contents')
<p><b>Plannings</b></p>
@unless(empty($cour))

<table border = "1">
<tr>
<td>ID</td>
<td>Cours_ID</td>
<td>Date_Debut</td>
<td>Date_Fin</td>
</tr>

         @foreach($cour->planning as $plan)
               <tr><td>{{$plan->id}}</td>
               <td>{{$plan->cours_id}}</td>
               <td>{{$plan->date_debut}}</td>
               <td>{{$plan->date_fin}}</td>
               @if(Auth::user()->IsEnseignant())
               <td><a href='/planningEdit/{{$plan->id}}'>Edit</a></td>
               <td><a href='/planningdelet/{{$plan->id}}'>Delete</a></td>
               @endif
@endforeach 
 
</tr>
</table>
<br><a href="/home">accuile</a><br>
<br><a href="/listTitle">List cours par intituler</a><br>

@endunless
@endsection


