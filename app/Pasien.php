<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $table ='pasien';
    protected $fillable = ['user_id','nama','umur','gender','alamat','id',];
    // Karna laravel default nya ngebaca primary key sebagai id
    protected $primaryKey = 'id';
    public $incrementing= false;
    // perlindungan bahwa pkny string
    protected $keyType='String';
    

   public function rm(){
    return $this->hasMany('App\Rekammedis','pasien_id'); 
   }
}
