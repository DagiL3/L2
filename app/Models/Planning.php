<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
protected $table = 'plannings';
protected $primaryKey = 'id';
public $incrementing = false;
public $timestamps = false;
protected $fillable = ['cours_id','date_debut','date_fin'];

function cour(){
    return $this->belongsTo(Cour::class,'cour_id');
    }

 


}
