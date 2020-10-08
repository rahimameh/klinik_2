<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    protected $table="rekammedis";
    protected $fillable =['id','pasien_id','keluhan','diagnosis','theraphy','user_id','created_at','updated_at'];
    protected $primaryKey = 'id';
    protected $keyType='String';
    
    public function pasien(){
        return $this->belongsTo('App\Pasien','pasien_id'); //1 pasien bnyk rekammedis
    }
   
    public function user(){
        return $this->belongsTo('App\User','user_id'); //1 user bnyk rekammedis
    }
   

}