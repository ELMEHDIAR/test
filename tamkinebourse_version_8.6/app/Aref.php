<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aref extends Model
{
     public function directions(){

        return $this->hasMany('App\Directionprovinciale');
     }
}
