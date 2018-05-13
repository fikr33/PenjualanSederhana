<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = ['nama','alamat','no'];
    protected $visible = ['nama','alamat','no'];
    public $timestamps = true ;

    public function pembelian()
    {
    	return $this->hasMany('App\Pembelian');
    }
}
