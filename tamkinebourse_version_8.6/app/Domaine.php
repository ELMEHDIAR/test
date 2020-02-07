<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{

    protected $table = 'domaines';


    protected $fillable = [
        'nom_domaine'
    ];


     public function universites(){

        return $this->belongsToMany('App\Universite' , 'universite_domaines' , 'id_universite_fk' , 'id_domaine_fk');
     }

     public function filieres(){

        return $this->hasMany('App\Filiere');
     }




}
