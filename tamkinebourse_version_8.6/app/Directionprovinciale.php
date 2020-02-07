<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directionprovinciale extends Model
{
    public function directions(){

        return $this->belongsTo('App\Aref' , 'id_aref_fk');
     }
}
