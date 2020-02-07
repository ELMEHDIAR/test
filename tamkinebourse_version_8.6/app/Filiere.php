<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{

     public function domaine(){

        return $this->belongsTo('App\Domaine' , 'id_domaine_fk');
     }
}
