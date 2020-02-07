<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable
/* implements MustVerifyEmail */
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom' , 'ville' , 'adresse' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inscription_externe(){
        return $this->hasOne('App\Inscriptionexterne' , 'id_user_fk');
    }

    public function inscription_interne(){
        return $this->hasOne('App\Inscriptioninterne', "id_user_fk");
    }

    public function isRole(){
         return $this->role;
    }
}
