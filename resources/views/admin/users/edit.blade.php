@extends('baseA') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modification user{{$user->id}}</h1>
       
    
        <form method="post" action="{{route('updateUser',$user->id)}}">
            @method('PUT') 
            @csrf
            <div class="form-group">
                <label for="nom"> Nom:</label>
                <input type="text" class="form-control" name="nom" value="{{$user->nom}}">
            </div>

            
            <div class="form-group">
                <label for="description">Prenom:</label>
                <input type="text" class="form-control" name="prenom" value="{{$user->prenom}}">
            </div>
           
            <div class="form-group">
                <label for="description">Login:</label>
                <input type="text" class="form-control" name="login" value="{{$user->login}}">
            </div>

            <div class="form-group">
                <label for="description">Type:</label>
                <input type="text" class="form-control" name="type" value="{{$user->type}}">
            </div>
           
            Formation:
              <form action="/action_page.php">
              <label for="formation_id"> Formation</label>
                <select name="formation_id" >
                    <optgroup label="formation">
                          @foreach($formations as $forma)
                          <option value="{{$forma->id}}">{{$forma->intitule}}</option>
                           @endforeach
                  </optgroup>
                 
               </select> 
              

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </form>
    </div>
</div>
@endsection