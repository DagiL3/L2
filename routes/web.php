<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Middleware;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ChangeNomController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\PlanningController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use  App\Http\Controllers\Test; 
use  App\Http\Controllers\UtilisateurController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('accuille');
});


        Route::get('/register',[App\Http\Controllers\RegisterUserController::class,'showForm'])->name('register');
        Route::post('/register',[App\Http\Controllers\RegisterUserController::class,'store']);
        Route::get('/login', [App\Http\Controllers\AuthenticatedSessionController::class,'showForm'])->name('login');
        Route::post('/login',[App\Http\Controllers\AuthenticatedSessionController::class,'login'])->name('logout');
        Route::get('/listformation',[App\Http\Controllers\FormationController::class,'index']);//->middleware('auth')

Route::group(['middleware' => 'auth'], function () {

    Route::view('/home','home');

    Route::get('/logout',[App\Http\Controllers\AuthenticatedSessionController::class,'logout'])->name('logout');

    Route::get('/changePassword',[App\Http\Controllers\ChangePasswordController::class,'passwordEdit'])->name('edit.password');
    Route::post('/changePassword',[App\Http\Controllers\ChangePasswordController::class,'passwordupdate'])->name('updatepass');

    Route::get('/changeNom',[App\Http\Controllers\ChangeNomController::class,'nomEdit']);
    Route::PUT('/changeNom',[App\Http\Controllers\ChangeNomController::class,'nomdupdate'])->name('updateNom');

    Route::get('/listcours',[App\Http\Controllers\CoursController::class,'index']);
    Route::get('/listcoursid',[App\Http\Controllers\CoursController::class,'showid']);

    Route::get('/listTitle',[App\Http\Controllers\CoursController::class,'search'])->name('showform');
    Route::PUT('/listTitle',[App\Http\Controllers\CoursController::class,'show'])->name('showcours');//->middleware('auth')



        //Route::get('/listTitle',[App\Http\Controllers\CoursFormation::class,'search'])->name('showform');//->middleware('auth')
        //Route::PUT('/listTitle',[App\Http\Controllers\CoursFormation::class,'show'])->name('showcours');//->middleware('auth')

Route::middleware(['is_etudiant'])->group( function () {

   // Route::get('/inscription',[App\Http\Controllers\EtudiantController::class,'inscriptionForm']);
    
    Route::get('/inscription/{id}',[App\Http\Controllers\EtudiantController::class,'inscription'])->name('inscription');
    Route::get('/disinscription/{id}',[App\Http\Controllers\EtudiantController::class,'disinscription'])->name('disinscription');
    Route::get('/listcoursids',[App\Http\Controllers\CoursController::class,'showidS']);
    Route::get('/etudient', function () {
        return view('students.accuill');
    });
});

Route::middleware('is_admin')->group(function (){
    Route::get('/accepteViwe',[App\Http\Controllers\AdminController::class,'accepteViwe']);
    Route::get('/accept/{id}',[App\Http\Controllers\AdminController::class,'accepte']);
    Route::get('/refuse/{id}',[App\Http\Controllers\AdminController::class,'refuse']);

   
    Route::view('/admin','admin.admin_show');
  //  Route::get('/listcoursA',[App\Http\Controllers\AdminController::class,'index']);
    Route::get('/createcours',[App\Http\Controllers\CoursController::class,'createForm']);
    Route::PUT('/createcours',[App\Http\Controllers\CoursController::class,'store'])->name('createcours');
    Route::get('/createformation',[App\Http\Controllers\FormationController::class,'createForm']);
    Route::PUT('/createformation',[App\Http\Controllers\FormationController::class,'create'])->name('createformations');

    Route::get('/ensigForm',[App\Http\Controllers\EnseignantController::class,'createRecored']);
    Route::PUT('/ensigForm',[App\Http\Controllers\EnseignantController::class,'associe'])->name('associe');

    Route::get('/editFormation/{id}',[App\Http\Controllers\FormationController::class,'edit'])->name('edit');
    Route::PUT('/editFormation/{id}',[App\Http\Controllers\FormationController::class,'update'])->name('updateformation');
    ////////
    Route::get('/deleteFormation/{id}',[App\Http\Controllers\FormationController::class,'destroy'])->name('destroy');
    
    Route::get('/editCour/{id}',[App\Http\Controllers\CoursController::class,'edit']);//->middleware('auth')
    Route::PUT('/editCour/{id}',[App\Http\Controllers\CoursController::class,'update'])->name('updateCour');//->middleware('auth')
    Route::get('/deleteCour/{id}',[App\Http\Controllers\CoursController::class,'destroy']);
   
    Route::get('/getEnseignant',[App\Http\Controllers\EnseignantController::class,'ListeensEignant']);
    Route::post('/getCour',[App\Http\Controllers\EnseignantController::class,'ListeensEignantA'])->name('ensigFormA');
  
    Route::get('/getFormEnseignant',[App\Http\Controllers\PlanningController::class,'formPlanE']);
    Route::post('/getPlanning',[App\Http\Controllers\PlanningController::class,'getPlanning'])->name('getPlanning');

    Route::get('/admin/create_session',[App\Http\Controllers\AdminController::class,'createSesssion']);
    Route::post('/admin/create_session',[App\Http\Controllers\AdminController::class,'storeSesssion']);

    Route::get('/admin/planningEdit/{id}',[App\Http\Controllers\AdminController::class,'editSesssion']);
    Route::PUT('/admin/planningEdit/{id}',[App\Http\Controllers\AdminController::class,'updateSesssion'])->name('adminupdateSesssion');
    Route::get('/admin/planningdelet/{id}',[App\Http\Controllers\AdminController::class,'deleteSesssion']);
    //get form ensig to edit
    //Route::get('/admin/form',[App\Http\Controllers\AdminController::class,'getindexadmin']);
    //Route::post('/admin/form',[App\Http\Controllers\AdminController::class,'indexadmin']);

    Route::get('/admin/create_sessionid',[App\Http\Controllers\AdminController::class,'courSanSession']);
    Route::get('/admin/create_sessionid/{id}',[App\Http\Controllers\AdminController::class,'showidSesssion']);
    Route::PUT('/admin/create_sessionid/{id}',[App\Http\Controllers\AdminController::class,'storeidSesssion'])->name('adminupdateSesssionid');
    //create planning par semaine
    Route::get('/admin/create_session_se/{id}',[App\Http\Controllers\PlanningController::class,'planning_lasts']);//planning_lasts
    Route::get('/admin/planning',[App\Http\Controllers\PlanningController::class,'indexs']);
    Route::get('/admin/planningcour/{id}',[App\Http\Controllers\PlanningController::class,'showPlannings']);

//////////// users /////////////////////////

Route::get('/admin/user',[App\Http\Controllers\UtilisateurController::class,'allusers']);
Route::get('/admin/user/etudiant',[App\Http\Controllers\UtilisateurController::class,'filterEtudient']);
Route::get('/admin/user/enseignant',[App\Http\Controllers\UtilisateurController::class,'filterEnseignant']);

Route::get('/admin/user/nom',[App\Http\Controllers\UtilisateurController::class,'filterNomF']);
Route::post('/admin/user/nom',[App\Http\Controllers\UtilisateurController::class,'filterNom'])->name('nom');

Route::get('/admin/user/prenom',[App\Http\Controllers\UtilisateurController::class,'filterPreNomF']);
Route::post('/admin/user/prenom',[App\Http\Controllers\UtilisateurController::class,'filterPreNom'])->name('prenom');

Route::get('/admin/user/login',[App\Http\Controllers\UtilisateurController::class,'filterLoginF']);
Route::post('/admin/user/login',[App\Http\Controllers\UtilisateurController::class,'filterLogin'])->name('login');

Route::get('/admin/user/edit/{id}',[App\Http\Controllers\UtilisateurController::class,'edit']);
Route::PUT('/admin/user/edit/{id}',[App\Http\Controllers\UtilisateurController::class,'update'])->name('updateUser');
Route::get('/admin/user/delete/{id}',[App\Http\Controllers\UtilisateurController::class,'delete']);

Route::get('/admin/user/createuser',[App\Http\Controllers\UtilisateurController::class,'createUtilisateurF']);
Route::post('/admin/user/createuser',[App\Http\Controllers\UtilisateurController::class,'createUtilisateur']);
});
   
Route::middleware(['is_enseignant'])->group(function (){
    
    Route::get('/ensigcour',[App\Http\Controllers\EnseignantController::class,'index']);
    Route::get('/ensigcourid',[App\Http\Controllers\EnseignantController::class,'show']);

    Route::get('/ensigant', function () {
        return view('teachers.accuill');
    });
    Route::get('/create_session',[App\Http\Controllers\SessionController::class,'createSesssion']);
    Route::post('/create_session',[App\Http\Controllers\SessionController::class,'storeSesssion']);
    Route::get('/planningEdit/{id}',[App\Http\Controllers\SessionController::class,'editSesssion']);
    Route::PUT('/planningEdit/{id}',[App\Http\Controllers\SessionController::class,'updateSesssion'])->name('updateSesssion');
    Route::get('/planningdelet/{id}',[App\Http\Controllers\SessionController::class,'deleteSesssion']);
  
    //create planning par cours 
    Route::get('/create_sessionid',[App\Http\Controllers\SessionController::class,'courSanSession']);
    Route::get('/create_sessionid/{id}',[App\Http\Controllers\SessionController::class,'showidSesssion']);
    Route::PUT('/create_sessionid/{id}',[App\Http\Controllers\SessionController::class,'storeidSesssion'])->name('updateSesssionid');
    //create planning par semaine
    Route::get('create_session_se/{id}',[App\Http\Controllers\PlanningController::class,'planning_lasts']);//planning_lasts
    //Route::post('create_session_se/{id}',[App\Http\Controllers\PlanningController::class,'planning_last'])->name('planning_lasts');//planning_lasts


});
   
    //etudient 
    Route::get('/planning',[App\Http\Controllers\PlanningController::class,'index']);
    Route::get('/planningid',[App\Http\Controllers\PlanningController::class,'show']);
    Route::get('/planningse',[App\Http\Controllers\PlanningController::class,'planning_semaine']);
    Route::get('/planingNext/{id}',[App\Http\Controllers\PlanningController::class,'planning_next']);
    Route::get('/planingLast/{id}',[App\Http\Controllers\PlanningController::class,'planning_last']);
    Route::get('/planningcour/{id}',[App\Http\Controllers\PlanningController::class,'showPlanning']);
   
    /*Route::get('/planingid', function () {
        return view('plannings.showCour');
    });*/
    Route::get('/a',[App\Http\Controllers\Test::class,'planning_last']);

    
 Route::get('/create_sessionid',[App\Http\Controllers\SessionController::class,'courSanSession']);
    Route::get('/create_sessionid/{id}',[App\Http\Controllers\SessionController::class,'showidSesssion']);
    Route::PUT('/create_sessionid/{id}',[App\Http\Controllers\SessionController::class,'storeidSesssion'])->name('updateSesssionid');
    //create planning par semaine
    Route::get('create_session_se/{id}',[App\Http\Controllers\PlanningController::class,'planning_lasts']);//planning_lasts
    
   
   

});
