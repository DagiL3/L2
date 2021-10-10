
@extends('base')

@section('main')

<h1>Show a Date and Time Control</h1>

<form method="post" action="{{route('updateSesssion',$plans->id)}}">
 @method('PUT') 
 @csrf 
   
    Cour:
   <form action="/action_page.php">
         <label for="cour_id"></label>
               <select name="cour_id" id="cour_id"  value="{{old('$cours->id')}}" >
                      <optgroup label="Cour">
                     
                            <option value="{{$cours->id}}">{{$cours->intitule}}</option>
                         
                      </optgroup>
               </select> 
                <p>Si vous utiliser Firefox, Safari or Internet Explorer 12 (or earlier)  
                    il faut metre le date en ce format <strong> année /moins/jour/ T heure:minutes </strong>. Example: 2021/11/25/T10/22</p>
           <label for="datedd">session commence(y/m/d/T h:m):</label>
      
              <input type="datetime-local" id="datedd" name="datedd">
  
          <label for="dateff">session fini (y/m/d/T h:m):</label>
               <input type="datetime-local" id="dateff" name="dateff">
  
        <input type="submit">
    </form>
</form>
            
@endsection
