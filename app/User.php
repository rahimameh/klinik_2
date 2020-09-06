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
      return $this->hasOne('App\Dokter','users_id');
  }

    public function pasien(){
        return $this->belongsTo('App\Pasien');
    }

    public function antri(){
        return $this->hasMany('App\Antrian','user_id'); 
       }

       public function rmdok(){
        return $this->hasMany('App\Rekammedis'); 
       }

    }
