<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Isadmin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use sesssion;
use App\Rules\MatchOldPassword;
class ChangePasswordController extends Controller
{
  
  public function passwordEdit(){//$id
      
    //$users = User::find(Auth::user()->id);  
         return view('user.editPassword');//->with('users',$users);
     
 }
  
public function passwordupdate(Request $request){
$request->validate([
  'mdp'=>['required', new MatchOldPassword],
  'nmdp'=>['required'],
  'mdp_confirmation'=>['same:nmdp']
]);
User::find(auth()->user()->id)->update(['mdp' => Hash::make($request->nmdp) ]); 

$request->session()->flash('etat','password updated');
return redirect('/home');
}
}
