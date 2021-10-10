<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Planning;
use App\Models\User;
use App\Models\Cour;
use  Illuminate\Support\Collection;

use Carbon\Carbon;
class Test extends Controller
{
public function planning_last()
    {
        
        $date=Planning::findOrFail(3);
        $date_d=$date->date_debut;
        
        $Date_d=Carbon::parse($date_d)->startOfWeek();;
        $Date_f=Carbon::parse($date_d)->endOfWeek();;
        
         echo $startDate=$Date_d->addWeek();
         echo '             ';
          $endDate=$Date_f->addWeek();

        $user = User::findOrFail(Auth::user()->id);
        $a=$user->id;
        $cours=Cour::where('user_id', '=', $a)->get();  
      
        $plannings=Planning::whereBetween('date_debut', array($startDate,$endDate))->get();
        
        $dDate=Planning::whereBetween('date_debut', array($startDate,$endDate))->first();
            echo $dDate->id;

    }
}