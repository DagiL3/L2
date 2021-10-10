<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    
   
public function showForm(){
    return view('auth.login');
}
public function login(Request $request){
    $request->validate([
        'login'=>'required|string',
        'mdp'=>'required|string',
    ]);
    $credentials=['login'=>$request->input('login'),'password'=>$request->input('mdp')];
    if(Auth::attempt($credentials)){
        $user=User::find(auth()->user()->id);
        if($user->type=='NULL'){
            return view('user.accuile');
        }
    
        else {

            $request->session()->regenerate();
            $request->session()->flash('etat','Login successful');
            return redirect()->intended('/home');
        
        }
           
       
    }
    return back()->withErrors([
        'login'=>'The provided credentials do not match our records.',
    ]);
}
 public function logout(Request $request){
     Auth::logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect('/');
 }
}