<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cour;
use App\Models\Planning;
use DateTime;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function accepteViwe(){

     $users=User::where('type','=','NULL')->get();
      return view('admin.accepte',['users'=>$users]);
    } 

    public function accepte(Request $request,$id){
        $user=User::find($id);
        if($user->formation_id== $request->input('-1')){
            $user->type='enseignant';
            $user->save();
            $request->session()->flash('etat', ' enseignant ajouter !');
            return redirect()->back();
        }else{
            $user->type='etudiant';
            $user->save();
            $request->session()->flash('etat', ' etudiant ajouter !');
            return redirect()->back();
        }
    } 

    public function refuse(Request $request,$id){
        $user=User::find($id);
       
        $user->delete();
        $request->session()->flash('etat', ' demande refuser !');
        return redirect()->back();
    } 
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours=Cour::all();
        return view('admin.cour',['cours'=>$cours]);
    }
///create session 

    public function createSesssion(Request $request){
      $cours=Cour::all();
      $users=User::where('type','=','enseignant')->get();
      return view('admin.sessions.form',['cours'=>$cours,'users'=>$users]);
    }

    public function storeSesssion(Request $request){
      $request->validate([
         'cour_id'=>'required',
         'user_id'=>'required',
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

        $u= User::findOrFail($request->input('user_id'));
        $cu= Cour::findOrFail($request->input('cour_id'));
        
      $cu->user_()->associate($u);
      $cu->save();
      $request->session()->flash('etat', 'Ajout effectué !');
      $plannings=Planning::all();
            return view('admin.plannings.index',[ 'plannings'=> $plannings]);
      }
    ///

    /*public function getindexadmin()
    {
      
            $users=User::where('type','=','enseignant')->get();
            return view('admin.session',['users'=>$users]);
   }
    public function indexadmin(Request $request)
    {
        $request->validate([
            'user_id'=>'required'
         ]);
            $id=$request->input('user_id');
            $cours=Cour::where('user_id','=',$id )->get();  //user(enseignant) associate with cours 
            $plannings=Planning::all();
            return view('admin.plannings.show',['cours'=>$cours]);
   }
   */

    public function courSanSession(){
     
      $user = User::find(Auth::user()->id);  
      $a= $user->id;
      $cours=Cour::where('user_id', '=', $a)->get();   
      $plannings=Planning::all();
    
      return view('admin.sessions.courSanSession',['plannings'=>$plannings,'cours'=>$cours]);
    }

   public function showidSesssion(Request $request ,$id){
      $cours=Cour::find($id);
      return view('admin.sessions.createid',['cours'=>$cours]);
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
     return redirect()->back();
     }
    


    public function editSesssion($id){
     $plans=Planning::find($id);
     $cid=$plans->cours_id;
     $cours=Cour::where('id','=',$cid)->first();
     return view('admin.sessions.edit',['plans'=>$plans, 'cours'=>$cours]);
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
    return redirect ('/admin/planning');
    }
   
  public function deleteSesssion(Request $request,$id){
    
    $plan=Planning::find($id);
    $plan->delete();
    $request->session()->flash('etat', 'deleteSesssion est effectué !');
    return redirect()->back();

  }






    

}
