<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $table = 'cours';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = ['intitule','user_id','formation_id'];

    public $attributes = ['user_id' => 1 ];

    public $timestamps = true;  

    function user(){
        return $this->belongsToMany(User::class,'cours_users','cours_id','user_id');//select from users where 
        }

      function user_(){ 
       return $this->belongsTo(User::class,'user_id');
       }

    function formation(){
        return $this->belongsTo(Formation::class,'formation_id');
        }

    function planning(){
        return $this->hasMany(Planning::class,'cours_id');//select from planning where cours_id=this 
        }


}  
