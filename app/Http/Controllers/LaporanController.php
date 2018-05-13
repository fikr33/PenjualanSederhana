<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use DB;
use PDF;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $penjualan = Penjualan::all();
        return view('laporan.index',compact('penjualan'));
    }

    // public function index2(Request $request){ 
    // $a = $request->a; 
    // $b = $request->b; 
    // $penjualan1 = Penjualan::whereBetween('tanggal', [$a, $b])->get();
    // $sum = $penjualan1->sum('total_harga'); 
    // return view('laporan.penjualan',compact('penjualan1','a','b','sum')); 
    // }

    public function downloadPDF(Request $request){
        $a = $request->a; 
        $b = $request->b;
        $penjualan1 = Penjualan::whereBetween('tanggal', [$a, $b])->get(); 
        $sum = $penjualan1->sum('total_harga');
      $user = Penjualan::all();

      $pdf = PDF::loadView('laporan/pdf', compact('user','a','b','sum'));
      return $pdf->download('laporan.pdf');

    }
}
