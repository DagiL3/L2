<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
   
    public $primaryKey ='id';
   
    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['nom','prenom','login', 'mdp', 'type'];

    protected $attributes = ['type' => 'NULL'];
   
    
   
    public function getAuthPassword(){
    return $this->mdp;
    }

    function cour(){
        return $this->belongsToMany(Cour::class,'cours_users','user_id','cours_id');
      }

    function cour_(){
        return $this->hasMany(Cour::class, 'user_id');//select *from cours where user_id = $this user(on cours table un column user_id exist)
     }
     
     function formation(){
        return $this->belongsTo(Formation::class,'formation_id');
     }      

   public function isAdmin(){
       return $this->type=='admin';
    }

 public function isEtudiant(){
  return $this->type=='etudiant';
}
public function isEnseignant(){
  return $this->type=='enseignant';
}




}
