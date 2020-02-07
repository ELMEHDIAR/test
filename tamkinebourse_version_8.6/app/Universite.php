<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    protected $table = 'universites';

    protected $fillable = [
        'nom_universite'
    ];

    public function domaines(){

        return $this->belongsToMany('App\Domaine' , 'universite_domaines' , 'id_universite_fk' , 'id_domaine_fk');
     }

     public function inscriptioninterne(){

        return $this->HasMany('App\Inscriptioninterne');
     }
}
