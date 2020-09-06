<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    protected $table="rekammedis";
    protected $fillable =['id_rm','pasien_id','keluhan','diagnosis','theraphy','user_id','created_at','updated_at'];
    protected $primaryKey = 'id_rm';
    protected $keyType='String';
    
    public function pasien(){
        return $this->belongsTo('App\Pasien'); 
    }

    public function userdok(){
        return $this->belongsTo('App\User'); 
    }

}