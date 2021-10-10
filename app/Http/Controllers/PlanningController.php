<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Planning;
use App\Models\User;
use App\Models\Cour;
use  Illuminate\Support\Collection;

use Carbon\Carbon;
class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plannings=Planning::all();
        return view('plannings.index',['plannings'=>$plannings]);
    }
    //admin
    public function indexs()
    {
        $plannings=Planning::all();
        return view('admin.indexs',['plannings'=>$plannings]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * pour etudient 
     */
    public function show(Request $request)
    {
        $user = User::find(Auth::user()->id);  
        $a= $user->id;
        $cours=Cour::where('user_id', '=', $a)->get();       
        $plannings=Planning::all();
        return view('plannings.show',['cours'=>$cours]);//,'plannings'=>$plannings]
    }

    
    public function showPlanning(Request $request,$id)
    {    
       // $cour=Cour::find($a)->first();
       // $plannings=Planning::where('cours_id','=',$a)->get();
        $cour=Cour::find($id); 
        return view('plannings.showPlanning',['cour'=>$cour]);
    }
//admin
    public function showPlannings(Request $request,$id)
    {    
       // $cour=Cour::find($a)->first();
       // $plannings=Planning::where('cours_id','=',$a)->get();
        $cour=Cour::find($id); 
        return view('admin.plannings.showPlanning',['cour'=>$cour]);
    }
//all teachers planning 
  public function formPlanE(){

    $users=User::where('type','=','enseignant')->get();
    return view('plannings.formPlanE',['users'=>$users]);

  }


public function getPlanning(Request $request){

    $this ->validate($request,[
        'user'=>'required',
    ]);
    $uid=$request->input('user');
    $cours=Cour::where('user_id', '=',  $uid)->get();       
        
  return view('admin.plannings.show',['cours'=>$cours]);
  
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function planning_semaine(Request $request)
    {
        $startDate= Carbon::now()->startOfWeek();
        $endDate=Carbon::now()->endOfWeek();
        $user = User::findOrFail(Auth::user()->id);
        $a=$user->id;
        $cours=Cour::where('user_id', '=', $a)->get();  
        
       $plannings=Planning::whereBetween('date_debut', array( $startDate,$endDate))->get();
       //$cur=$cours->first()->$plannings;
       $dDate= Planning::whereBetween('date_debut', array($startDate,$endDate))->first();
    return view('plannings.semaine',['plannings'=>$plannings,'cours'=>$cours,'dDate'=>$dDate]);
    }

    public function planning_next(Request $request,$id)
    {
         
        $date=Planning::findOrFail($id);
        $date_d=$date->date_debut;
        $Date_d=Carbon::parse($date_d)->startOfWeek();
        $Date_f=Carbon::parse($date_d)->endOfWeek();
        $startDate=$Date_d->addDay(7);
        $endDate=$Date_f->addDay(7);

        $user = User::findOrFail(Auth::user()->id);
        $a=$user->id;
        
        $cours=Cour::where('user_id', '=', $a)->get();  
       
        $plannings=Planning::whereBetween('date_debut', array($startDate,$endDate))->get();
        //$cur=$cours->first()->$plannings; 
        $dDate=Planning::whereBetween('date_debut', array($startDate,$endDate))->first();
        //$request->session()->flash('etat',$dDate->id );
        return view('plannings.semaine',['plannings'=>$plannings,'cours'=>$cours,'dDate'=> $dDate]);
    }

  
    
    public function planning_last(Request $request,$id)
    {
        $date=Planning::findOrFail($id);
        $date_d=$date->date_debut;
        $Date_d=Carbon::parse($date_d)->startOfWeek();
        $Date_f=Carbon::parse($date_d)->endOfWeek();
        $startDate=$Date_d->subWeek();
        $endDate=$Date_f->subWeek();

        $user = User::findOrFail(Auth::user()->id);
        $a=$user->id;
        $cours=Cour::where('user_id', '=', $a)->get();  
       // $cur=$cours->first()->$plannings;  
        $plannings=Planning::whereBetween('date_debut', array($startDate,$endDate))->get();
        $cur=$cours->first()->$plannings; 
        $dDate=Planning::whereBetween('date_debut', array($startDate,$endDate))->first();  
            return view('plannings.semaine',['plannings'=>$plannings,'cours'=>$cours,'dDate'=> $dDate]);
            
    }

    public function planning_lasts($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $a=$user->id;
        
        $cours=Cour::where('user_id', '=', $a)->get();

        $date=Planning::findOrFail($id);
        $date_d=$date->date_debut;
        $Date_d=Carbon::parse($date_d)->startOfWeek();
        $Date_f=Carbon::parse($date_d)->endOfWeek();
        $start= $Date_d->format('Y-m-d');
        $fini=$Date_f->format('Y-m-d');
        return view('sessions.semaineForm',['cours'=>$cours,'start'=>$start,'fini'=>$fini]);
    }

    public function formSesssion_semaine(Request $request,$id){
        $date=Planning::findOrFail($id);
        $date_d=$date->date_debut;
        $Date_d=Carbon::parse($date_d)->startOfWeek();
        $Date_f=Carbon::parse($date_d)->endOfWeek();

       }

}