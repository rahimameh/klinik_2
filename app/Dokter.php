<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    //
    protected $table ='Dokter';
    protected $fillable =['nama','gender','umur','alamat','id','user_id'];
    protected $primaryKey = 'id';
    protected $keyType='String';
    public $incrementing= false;

  
}
