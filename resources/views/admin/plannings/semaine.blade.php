@extends('modelA')
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
<a href="/admin/create_session_se/{{$dDate->id}}">create session pour cette semaine</a>

<td> <a href="/admin/planingNext/{{$dDate->id}}">next week</a></td>
 <td><a href="/admin/planingLast/{{$dDate->id}}">last week</a></td>
              

             
             
              
              
              
              
      
 @endunless
 <br><a href="/create_session">create session </a><br>


 <br><a href="/home">accuile</a><br>

<br><a href="/listTitle">List cours par intituler</a><br>




@endsection


