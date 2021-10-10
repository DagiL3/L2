<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;;

class RegisterUserController extends Controller
{
    public function showForm(){
        $formation=Formation::all();
        return view('auth.register',['formation'=>$formation]);
    }
    public function store(Request $request){
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
            session()->flash('etat','enseignant added');
            return redirect('/login');
        }
        //$formation=Formation::find($fid);
        $user->formation_id=$fid;

        $user->save();
        session()->flash('etat','etudiant added');

        return redirect('/login');
      }
    }

