<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $fillable = ['kode_barang','id_barang','tanggal','jumlah','total_harga'];
    protected $visible = ['kode_barang','id_barang','tanggal','jumlah','total_harga'];
    public $timestamps = true ;

    public function barang_transaksi()
    {
    	return $this->hasMany('App\barang');
    }
}
