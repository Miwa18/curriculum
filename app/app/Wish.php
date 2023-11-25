<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
   public function type(){
    return $this->belongsTo('App\Type','type_id','id');
   } 
   public function user(){
    return $this->belongsTo('App\User','user_id','id');
   }

   protected $fillable = [
    'date', 'comment',
];
}
