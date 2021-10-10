<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\User;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscriptionForm()
    {
        $cours=Cour::all();
        return view('students.inscription',['cours'=>$cours]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscription(Request $request,$id)
    {
     

        $user = User::find(Auth::user()->id);  
      //  $choi=$request->input('cour');
        $choix=Cour::find($id);
        $cour =new Cour();
        $cour->intitule =$choix->intitule;
        $cour->user_id =$user->id;
        $cour->formation_id =$choix->formation_id;
        $cour->save();
        $request->session()->flash('etat', 'inscription est effectué !');
        return redirect('/listcours');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disinscription(Request $request,$id)
    {
        $choix=Cour::find($id);
        $choix->delete();
        $request->session()->flash('etat', 'disinscription est effectué !');
        return redirect()->back();

    }

    
}
