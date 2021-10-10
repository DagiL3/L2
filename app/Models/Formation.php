<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
use HasFactory;
protected $table = 'formations';
protected $primaryKey = 'id';
public $incrementing = true;
public $timestamps = true;
 
function cour(){
    return $this->hasmany(Cour::class);
    }
function user(){
     return $this->hasMany(User::class);//select from users wher formationid =$this formation
    } 

    
 
}
