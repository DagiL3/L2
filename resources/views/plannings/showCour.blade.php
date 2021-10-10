@extends('model')

@section('contents')
    <p>choisir le  cour</p>
    <form action ="/planningcour" method="post">
        cour:
        <form action="/action_page.php">
         <label for="cour_id">Choose formation:</label>
        <select name="cour_id" id="cour_id">
        <optgroup label="Cour">
           @foreach($cours as $cour)
          <option value="{{$cour->id}}">{{$cour->intitule}}</option>
        @endforeach
    </optgroup>
  </select>
  <br><br>
  <input type="submit" value="Submit">
        @csrf
    </form>
@endsection
