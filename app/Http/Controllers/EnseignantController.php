<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cour;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=User::find(Auth::user()->id);

        if($user->type=='enseignant'){
           $a=$user->id;
            
            $cours=Cour::where('user_id','=',$a )->get();  //user(enseignant) associate with cours 
            
            return view('teachers.index',['cours'=>$cours]);
        }
        else{
            $request->session()->flash('etat', 'cette section est pour enseignant!');
            return redirect()->back();
        }
    }
   
   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRecored(Request $request)
    {      
   
       $users=User::where('type','=','enseignant')->get();//enseignan
        $cours=Cour::all();
        return view('teachers.createRecored',['users'=>$users],['cours'=>$cours]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function associe(Request $request)
    {
      $this ->validate($request,[
        'cour'=>'required',
        'tech'=>'required',
      ]);
      $ids=$request->input('cour');
      $cours=Cour::find($ids);
       $user=User::find($request->input('tech'));

       $cour= new Cour();
       $cour->intitule=$cours->intitule;
       $cour->user_id=$user->id;
       $cour->formation_id=$cours->formation_id;
       $cour->save();
       $request->session()->flash('etat' , 'associe succucful!');
       return redirect('/admin/user/enseignant');
       
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
       $users=User::find(Auth::user()->id);

        $cours=Cour::where('user_id', $users->id)->get();
        return view('teachers.show',['cours'=>$cours]);
    }
    

    /**
     * Show the form for editing the specified resource.
     * Liste des cours par enseignant
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ListeensEignant()
    {
        $users=User::where('type','=','enseignant')->get();
            
    
            return view('admin.ListeensEignant',['users'=>$users]);
        
    }
     /**
     * Show the form for editing the specified resource.
     * Liste des cours par enseignant
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ListeensEignantA(Request $request){
        $this ->validate($request,[
            'user'=>'required',
        ]);
        $uid=$request->input('user');

        $cours=Cour::where('user_id','=',$uid )->get();  //user(enseignant) associate with cours 
            return view('admin.show',['cours'=>$cours]);

    }

}
