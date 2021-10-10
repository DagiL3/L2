@extends('baseA')

@section('main')

<h1>{{$nom}}</h1>
@if($nom=='nom')
<form method="post" action="{{route('nom')}}"> 
@elseif($nom=='prenom')
<form method="post" action="{{route('prenom')}}"> 
@else
<form method="post" action="{{route('login')}}"> 
@endif
 @csrf 
   
    user:
   <form action="/action_page.php">
   <label for="nom"> users</label>
      <select name="nom" id="nom">
        <optgroup label="User">
             @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->$nom}}</option>
              @endforeach
         </optgroup>
     </select> 
     <button type="submit" class="btn btn-primary">submit</button>
        </form>
        </form>
    </div>
</div>
@endsection