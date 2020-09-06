<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table="antrian";
    protected $fillable =['nomor_antrian','user_id'];
    protected $primaryKey = 'id';
    // tabel antrian dimiliki oleh tabel user
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
