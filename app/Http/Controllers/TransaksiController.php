<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Barang;
use App\Penjualan;
use App\Http\Requests\PenjualanRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksi = DB::table('penjualans')
                    ->join('barangs','penjualans.id_barang','=','barangs.id')
                    ->select('penjualans.*','barangs.merk')->get();
        return view('transaksi.index',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        return view('transaksi.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenjualanRequest $request)
    {
        //
      //   $barang = Barang::findOrFail($request->barang);
      //   if ($barang->stok >= $request->e) 
      //    {
      //   $transaksi = new Penjualan();
      //   $transaksi->kode_transaksi = $request->a;
      //   $transaksi->id_barang = $request->barang;
      //   $transaksi->tanggal = $request->c;
      //   $transaksi->jumlah = $request->e;
      //   $barang->stok = $barang->stok-$request->e;
      //   $barang->save();
      //   $transaksi->total_harga = $barang->harga_jual*$request->e;
      //   $transaksi->save();
      // }
      //   else{
      //       Session::flash("flash_notification",[
      //           "level"=>"danger",
      //           "message"=>"Stok Tidak Mencukupi"]);
      //       return redirect('transaksi/create');
      //   }


        for ($id=0; $id < count($request->id_barang); $id++) { 
            $transaksi = new Penjualan;
            $transaksi->kode_transaksi = $request->kode_transaksi[$id];
            $transaksi->id_barang = $request->id_barang[$id];
            $transaksi->tanggal = $request->tanggal[$id];
            $transaksi->jumlah = $request->jumlah[$id];

            $barang = Barang::findOrFail($request->id_barang[$id]);
            $barang->stok = $barang->stok - $request->jumlah[$id];

            $transaksi->total_harga = $request->jumlah[$id]*$barang->harga_jual;
            $barang->save();
            $transaksi->save();
        }
        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Penjualan::findOrFail($id);
        $barang = Barang::all();
        return view('transaksi.edit',compact('transaksi','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenjualanRequest $request, $id)
    {
        //
        $barang = Barang::findOrFail($request->merk);
        $transaksi =Penjualan::findOrFail($id);
        $transaksi->kode_transaksi = $request->a;
        $transaksi->id_barang = $request->merk;
        $transaksi->tanggal = $request->b;
        $transaksi->jumlah = $request->d;
        $barang->stok = $barang->stok-$request->d;
        $barang->save();
        $transaksi->total_harga = $barang->harga_jual*$request->d;
        $transaksi->save();
        return redirect('transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi = Penjualan::findOrFail($id);
        $transaksi->delete();
        return redirect('transaksi');
    }
    
}