<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscriptionsuite extends Model
{
    protected $table  = "inscriptionsuite";

   protected $fillable = [

      "note_bac",
      "id_inscriptions_fk",
      "featured_01",
      "featured_02"

   ];

    public function inscri()
    {

       return $this->belongsTo('App\Inscriptioninterne' , 'id_inscriptions_fk');
    }
}
