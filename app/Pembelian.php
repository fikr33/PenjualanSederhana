<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    protected $fillable = ['id_supplier','id_barang','merk','tanggal','harga','jumlah','total_harga'];
    protected $visible = ['id_supplier','id_barang','merk','tanggal','harga','jumlah','total_harga'];
    public $timestamps = true ;

    public function supplier()
    {
    	return $this->hasMany('App\Supplier');
    }

    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }
}
