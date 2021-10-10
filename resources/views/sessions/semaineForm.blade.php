
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
   
        <label for="datedd">session  commence (y-m-d-h:m):</label>
    
        <input type="datetime-local" id="datedd" name="datedd" min="{{$start}}T22:22:00" max="{{$fini}}T21:25:00">
      
        
        <label for="dateff">session fini (y-m-d-h:m):</label>
        <input type="datetime-local" id="dateff" name="dateff" min="{{$start}}T22:22:00" max="{{$fini}}T22:22:00"   >
         
        
        <input type="submit">
    </form>
</form>
            
@endsection
