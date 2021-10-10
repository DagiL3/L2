<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ChangeNomController extends Controller
{
    public function nomEdit(){
      
      //$user=User::find(auth()->user());
      
      return view('user.editNom');
     }
     
    public function nomdupdate(Request $request){
    $this->validate($request, [
      'nom'=>'required',
      'prenom'=>'required',
    ]);
    $user=User::find(auth()->user()->id);
   
    $user->nom= $request->input('nom');
    $user->prenom=$request->input('prenom'); 
    $user->save();
    
    $request->session()->flash('etat','Nom updated');
    return redirect('/home');
    }
    
}
