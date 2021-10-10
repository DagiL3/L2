<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\Formation;
use App\Models\User;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours=Cour::all();
        return view('cours.index',['cours'=>$cours]);
    }

    public function createForm()
    {
        $formations=Formation::all();
        $users=User::all();
        return view('cours.createCours',['formations'=>$formations,'users'=>$users]);
    }
   
    public function store(Request $request)
    {
        $this ->validate($request,[
            'intitule'=>'required',
             'user_id'=>'required',
             'formation_id'=>'required'
        ]);
        $cour = new Cour;
        $cour->intitule =$request->input('intitule');
        $cour->user_id =$request->input('user_id');
        $cour->formation_id = $request->input('formation_id');
        //$f = Formation::findOrFail($request->input('formation_id'));
      // $cour->formation()->associate($f);
        // $u=User::findOrFail($request->input('user_id'));
        //$cour->user()->attach($cour->id,$u);
        $cour->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect()->back();
        
        
       

    }

    /**
     * Display the specified resource par intitule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $titles=$request->input('title');
        $cours=Cour::where('intitule',"$titles")->get();
        return view('cours.show',['cours'=>$cours]);
    }
      /**
     * Display the specified resource par intitule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showid()
    {
        $user = User::find(Auth::user()->id);  
        //$formation=$users->formation_id;
        $a= $user->id;
        $cours=Cour::where('user_id', '=', $a)->get();
        return view('cours.show',['cours'=>$cours]);
    }

/**
     * Display the specified resource par intitule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showidS()
    {
        $user = User::find(Auth::user()->id);  
        //$formation=$users->formation_id;
        $a= $user->id;
        $cours=Cour::where('user_id', '=', $a)->get();
        return view('students.show',['cours'=>$cours]);
    }


    /**
     * Display the specified resource par intitule.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
      return view('cours.search');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {      $cid=Cour::find($id);
           $formations =Formation::all();
           $users=User::all();
          return view('cours.update',['formations'=>$formations,'users'=>$users,'cid'=>$cid]);          
    } 
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this ->validate($request,[
            'intitule'=>'required',
            'user_id'=>'required',
           'formation_id'=>'required'
        
        ]);
        $cour =Cour::find($id);
        $cour->intitule =$request->input('intitule');
        $cour->user_id =$request->input('user_id');
        $cour->formation_id = $request->input('formation_id');
        /*$f = Formation::findOrFail($request->input('formation_id'));
        $cour->formation()->associate($f);
        $u=User::findOrFail($request->input('user_id'));
        $cour->user()->associate($u);*/
        $cour->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect('/listcours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function destroy(Request $request, $id)
    {
        $cour=Cour::find($id);
     
        $plannings=$cour->planning;
        foreach($plannings as $planning){
            $planning->delete();
         }
         $cour->user_()->dissociate();
         $cour->formation()->dissociate();
        
        $cour->delete();
        $request->session()->flash('etat', $cour->intitule);
        return redirect('/listcours');

    }

    
}
