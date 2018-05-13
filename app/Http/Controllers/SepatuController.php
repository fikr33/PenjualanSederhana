<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Jenis;

class SepatuController extends Controller
{
    //
    public function barang(){
    	$barang = Barang::all();
    	$jenis = Jenis::all();
    	return view('sepatu.wel',compact('barang','jenis'));
    }

    public function filter($id){
    	$barang = Barang::where('id_jenis','=',$id)->get();
    	return view('sepatu.jenis',compact('barang'));
    }

    public function detail($id){
    	$barang = Barang::find($id);
    	return view('sepatu.detail',compact('barang'));
    }
}
