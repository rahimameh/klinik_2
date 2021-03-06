<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
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
  public function dokter(){
      return $this->hasOne('App\Dokter','users_id');//1 user 1 dokter
  }

    public function pasien(){
        return $this->hasOne('App\Pasien');//1 user 1 pasien
    }

    public function antri(){
        return $this->hasMany('App\Antrian','user_id'); //1 user bnyk antrian u/ setiap saat
       }

       public function rm(){
        return $this->hasMany('App\Rekammedis'); //1 user banyak rekammedis
       }

    }
