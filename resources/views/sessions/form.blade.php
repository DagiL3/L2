
@extends('model')

@section('contents')

<h1>Show a Date and Time Control</h1>
<form action ="/create_session" method="post">
    @csrf   
    Cour:
<form action="/action_page.php">
         <label for="cour_id">Choose Cour:</label>
      <select name="cour_id" id="cour_id">
        <optgroup label="Cour">
             @foreach($cours as $cour)
                  <option value="{{$cour->id}}">{{$cour->intitule}}</option>
              @endforeach
         </optgroup>
     </select> 
     <p>Si vous utiliser Firefox, Safari or Internet Explorer 12 (or earlier)  
                    il faut metre le date en ce format <strong> année /moins/jour/ T heure:minutes </strong>. Example: 2021/11/25/T10/22</p>
   
        <label for="datedd">session commence (y-m-d-h:m):</label>
        <input type="datetime-local" id="datedd" name="datedd">
  
        <label for="dateff">session fini (y-m-d-h:m):</label>
        <input type="datetime-local" id="dateff" name="dateff">
  
        <input type="submit">
    </form>
</form>
            
@endsection
