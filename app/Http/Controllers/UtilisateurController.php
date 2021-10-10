<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cour;
use App\Models\Planning;
use App\Models\Formation;

class UtilisateurController extends Controller
{
    public function createUtilisateurF(){

        $formation=Formation::all();
        return view('admin.users.register',['formation'=>$formation]);
    }

        public function createUtilisateur(Request $request){

            $request->validate([
                'nom'=>'required|string|max:255',
                'prenom'=>'required|string|max:255',
                'login'=>'required|string|max:255|unique:users',
                'mdp'=>'required|string|confirmed',
                'formation_id'=>'required|integer',
    
            ]);
            $user=new User();
            $user->nom=$request->nom;
            $user->prenom=$request->prenom;
            $user->login=$request->login;
            $user->mdp=Hash::make($request->mdp);
    
            $fid=$request->input('formation_id');
            
            if($fid =="-1"){
                $user->save();
                session()->flash('etat','ensignat added');
                return redirect('/admin/user');
            }
            //$formation=Formation::find($fid);
            $user->formation_id=$fid;
    
            $user->save();
            session()->flash('etat','etudient added');
    
            return redirect('/admin/user');
            }
            
            
            
        
public function allusers(){

$users=User::all();
return view('admin.users.all',['users'=>$users]);
}

public function filterEtudient(){
    $users=User::where('type','=','etudiant')->get();
    return view('admin.users.all',['users'=>$users]);
}
public function filterEnseignant(){
    $users=User::where('type','=','enseignant')->get();
    return view('admin.users.all',['users'=>$users]);
}
public function filterNomF(){
    $users=User::all();
    $nom='nom';
    return view('admin.users.filtre',['users'=>$users,'nom'=>$nom]);
}
public function filterNom(Request $request){
    $request->validate([
        'nom'=>'required'
    ]);
    $nom=$request->input('nom');
    $users=User::where('id','=',$nom)->get();
    return view('admin.users.all',['users'=>$users]);
}

public function filterPreNomF(){
    $users=User::all();
    $nom='prenom';
    return view('admin.users.filtre',['users'=>$users,'nom'=>$nom]);
}
public function filterPreNom(Request $request){
    $users=User::all();
    $request->validate([
        'nom'=>'required'
    ]);
    $prenom=$request->input('nom');
    $users=User::where('id','=',$prenom)->get();
    return view('admin.users.all',['users'=>$users]);
}


public function filterLoginF(){
    $users=User::all();$prenom='prenom';
    $nom='login';
    return view('admin.users.filtre',['users'=>$users,'nom'=>$nom]);
}
public function filterLogin(Request $request){
    $users=User::all();
    $request->validate([
        'nom'=>'required'
    ]);
    $login=$request->input('nom');
    $users=User::where('id','=',$login)->get();
    return view('admin.users.all',['users'=>$users]);
}
public function edit($id){
$user=User::find($id);
$formations=Formation::all();
return view('admin.users.edit',['user'=>$user,'formations'=>$formations]);
}
public function update(Request $request,$id){
$request->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'login'=>'required',
        'formation_id'=>'required',
        'type'=>'required'
      ]);
      $user=User::find($id);
     
      $user->nom= $request->input('nom');
      $user->prenom=$request->input('prenom'); 
      $user->login=$request->input('login'); 
      $user->formation()->dissociate();
      $user->formation_id =$request->input('formation_id');
      
      $user->type=$request->input('type'); 
      $user->save();

      
      $request->session()->flash('etat','user updated');
      return redirect('/admin/user');

    
}

public function delete(Request $request,$id){
    
    $user=User::find($id);
    $user->delete();
    $request->session()->flash('etat', 'user est suprimer !');
    return redirect('/admin/user');

  }

}
