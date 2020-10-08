<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Antrian extends Model
{
    
    protected $table="antrian";
    protected $fillable =['antrian','user_id','pasien_id'];
    protected $primaryKey = 'id';
    

    public function user(){
        return $this->belongsTo('App\User');//1 user bnyk antrian
    }
  
    public function dokter(){
        return $this->belongsTo('App\Dokter'); //1 dokter bnyk antrian
    }
    public function pasien(){
        return $this->belongsTo('App\Pasien','pasien_id'); //1 pasien bnyk rekammedis
    }
    
}
