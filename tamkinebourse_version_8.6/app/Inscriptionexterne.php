<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscriptionexterne extends Model
{
    protected $fillable = [

        'cin',
        'pays',
        'date_naissance' ,
       'filiere_bac' ,
       'etablissement' ,
       'id_user_fk' ,
         'id_universite_fk' ,
          'id_domaine_fk' ,
          'note_premierbac' ,
          'note_examreg' ,
           'situation_pere' ,
           'situation_mere' ,
            'annee_inscription' ,
            'telephone',
            'type_bourse',
            'featured_1',
            'featured_2',
            'featured_3',
            'featured_4',


    ];


     public function aref()
    {
       return $this->belongsTo('App\Aref' , 'id_aref_fk');
    }

    public function direction()
    {
       return $this->belongsTo('App\Directionprovinciale' , 'id_direction_fk');
    }

    public function universite(){

       return $this->belongsTo('App\Universite' , 'id_universite_fk');
    }

    public function filiere(){

       return $this->belongsTo('App\Filiere' , 'id_filiere_fk');
    }

    public function user(){

       return $this->belongsTo('App\User' , 'id_user_fk');
    }

    public function domaine(){

        return $this->belongsTo('App\Domaine' , 'id_domaine_fk');
     }

}
