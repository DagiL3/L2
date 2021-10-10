<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Cour;
use App\Models\User;
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $formations=Formation::all();
        return view('formations.index',['formations'=>$formations]);
        
    }

    public function createForm()
    {
        return view('formations.createformations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this ->validate($request,[
            'intitule'=>'required',
        
        ]);
        $formation = new Formation;
        $formation->intitule =$request->input('intitule');
        $formation->save();
        $request->session()->flash('etat', 'Ajout effectué !');
        return redirect('/listformation');
    }

    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation=Formation::find($id);
        return view('formations.update',['formation'=>$formation]);
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
            ]);
            $formation = Formation::find($id);
            $formation->intitule =$request->input('intitule');
            $formation->save();
            $request->session()->flash('etat', 'modification effectué !');
            return redirect('/listformation');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public static function destroy(Request $request,$id)
    {
        $formation=Formation::find($id);
        if(!empty (User::where('formation_id','=',$id)->get())){
         $users=User::where('formation_id','=',$id)->get();
         foreach($users as $u){
            $u->delete();
         }
        }
        if(!empty (Cour::where('formation_id','=',$id)->get())){
           $cours= Cour::where('formation_id','=',$id)->get();
           foreach($cours as $c){
            $c->delete();
         }
        }
        $formation->delete();
        $request->session()->flash('etat', 'suprision effectué !');
        return redirect()->back();
    }
}
