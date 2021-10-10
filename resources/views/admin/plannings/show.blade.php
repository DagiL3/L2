@extends('modelA')
@section('title', 'Planning')
@section('contents')
<p><b>Plannings</b></p>
@unless(empty($cours))

<table border = "1">
<tr>
<td>ID</td>
<td>Cours_ID</td>
<td>Date_Debut</td>
<td>Date_Fin</td>
<td>Planning</td>
</tr>
@foreach($cours as $cour)
         @foreach($cour->planning as $plan)
               <tr><td>{{$plan->id}}</td>
               <td>{{$plan->cours_id}}</td>
               <td>{{$plan->date_debut}}</td>
               <td>{{$plan->date_fin}}</td>
               <td><a href='/admin/planningcour/{{$cour->id}}'>Planning</a></td>
        @endforeach  
@endforeach  
</tr>
</table>
<br><a href="/home">accuile</a><br>


<br><a href="/listTitle">List cours par intituler</a><br>
@endunless
@endsection


