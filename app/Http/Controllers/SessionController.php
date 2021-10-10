<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Planning;
use Illuminate\Http\Request;
use DateTime;

use Carbon\Carbon;
class SessionController extends Controller
{
    public function createSesssion(Request $request){
      $cours=Cour::all();
      return view('sessions.form',['cours'=>$cours]);
    }

    public function storeSesssion(Request $request){
      $request->validate([
         'cour_id'=>'required',
         'datedd'  =>'required' ,
         'dateff'  =>'required' , 
      ]);
    
     $strartDate = Carbon::parse($request->input('datedd'));
     $endDate = Carbon::parse($request->input('dateff'));
     $planning= new Planning;
     $planning->cours_id=$request->input('cour_id');
     $planning->date_debut= $strartDate;
     $planning->date_fin= $endDate;
     $planning->save();
     $request->session()->flash('etat', 'Ajout effectué !');
     return redirect('/planningid');
    }

    public function courSanSession(){
     
      $user = User::find(Auth::user()->id);  
      $a= $user->id;
      $cours=Cour::where('user_id', '=', $a)->get();   
      $plannings=Planning::all();
    
      return view('sessions.courSanSession',['plannings'=>$plannings,'cours'=>$cours]);
    }

   public function showidSesssion(Request $request ,$id){
      $cours=Cour::find($id);
      return view('sessions.createid',['cours'=>$cours]);
    }

    public function storeidSesssion(Request $request,$id){
      $request->validate([
         'datedd'  =>'required' ,
         'dateff'  =>'required' , 
      ]);
     $cid=Cour::find($id);
     $strartDate = Carbon::parse($request->input('datedd'));
     $endDate = Carbon::parse($request->input('dateff'));
    
     $planning= new Planning;
     
     $planning->cours_id=$request->input('cour_id');
     $planning->date_debut= $strartDate;
     $planning->date_fin= $endDate;
     $planning->save();
     $request->session()->flash('etat', 'Ajout effectué !');
     return redirect('/planningid');
     }
    


    public function editSesssion($id){
     $plans=Planning::find($id);
     $cid=$plans->cours_id;
     $cours=Cour::where('id','=',$cid)->first();
     return view('sessions.edit',['plans'=>$plans, 'cours'=>$cours]);
    }

    public function updateSesssion(Request $request,$id){
      $request->validate([
        'cour_id'=>'required',
        'datedd'  =>'required' ,
        'dateff'  =>'required' , 
     ]);
  
    $strartDate = Carbon::parse($request->input('datedd'));
    $endDate = Carbon::parse($request->input('dateff'));
    $planning=Planning::find($id);
    $planning->cours_id=$request->input('cour_id');
    $planning->date_debut= $strartDate;
    $planning->date_fin= $endDate;
    $planning->save();
    $request->session()->flash('etat', 'modification effectué !');
    return redirect('/planningid');
    }
   
  public function deleteSesssion(Request $request,$id){
    
    $plan=Planning::find($id);
    $plan->delete();
    $request->session()->flash('etat', 'deleteSesssion est effectué !');
    return redirect('/planningid');

  }


}
