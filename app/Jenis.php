<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    //
    protected $fillable = ['jenis','cover'];
    protected $visible = ['jenis','cover'];
    public $timestamps = true ;

    public function barang()
    {
    	return $this->hasMany('App\barang');
    }
}
