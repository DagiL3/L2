@extends('model')
@section('title', 'Planning')
@section('contents')
<p><b>Plannings pour cette semaine  </b></p>

@unless(empty($dDate))

<table border = "1">
<tr>
<td>ID</td>
<td>Cours_ID</td>  
<td>Cours_Intitule</td>
<td>Date_Debut</td>
<td>Date_Fin</td>
</tr>
@foreach($cours as $cour)
         @foreach($plannings as $plan)
               @if($plan->cours_id==$cour->id)
                        <tr><td>{{$plan->id}}</td>
                       <td>{{$plan->cours_id}}</td>
                         <td>{{$cour->intitule}}</td>
                         <td>{{$plan->date_debut}}</td>
                        <td>{{$plan->date_fin}}</td>  
                        
                @endif
            
        @endforeach  
     
@endforeach  
</tr>
</table>
@if(Auth::user()->IsEnseignant())
<a href="/create_session_se/{{$dDate->id}}">create session pour cette semaine</a>
@endif
<td> <a href="/planingNext/{{$dDate->id}}">next week</a></td>
 <td><a href="/planingLast/{{$dDate->id}}">last week</a></td>            
      
 @endunless
 @if(Auth::user()->IsEnseignant())
 <br><a href="/create_session">create session </a><br>
@endif

<br><a href="/listTitle">List cours par intituler</a><br>

@endsection


