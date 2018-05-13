<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Jenis;

class UserController extends Controller
{
    //
    public function index()
    {
        $barang = Barang::all();
        $jenis = Jenis::all();
        return view('welcome',compact('barang','jenis'));
    }
}
