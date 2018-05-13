<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;
use App\Barang;
use App\Pembelian;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelian = DB::table('pembelians')
                    ->join('suppliers','pembelians.id_supplier','=','suppliers.id')
                    ->join('barangs','pembelians.id_barang','=','barangs.id')
                    ->select('pembelians.*','suppliers.nama','barangs.merk')->get();
        return view('pembelian.index',compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pembelian.create',compact('supplier','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $barang = Barang::findOrFail($request->b);
        $pembelian = new Pembelian();
        $pembelian->id_supplier = $request->a;
        $pembelian->id_barang = $request->b;
        $pembelian->tanggal = $request->c;
        $pembelian->harga = $request->d;
        $pembelian->jumlah = $request->e;
        $barang->stok = $barang->stok+$request->e;
        $barang->save();
        $pembelian->total_harga = $request->d*$request->e;
        $pembelian->save();
        return redirect('pembelian');
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
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.edit',compact('pembelian','barang','supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $barang = Barang::findOrFail($request->b);
        $pembelian =Pembelian::findOrFail($id);
        $pembelian->id_supplier = $request->a;
        $pembelian->id_barang = $request->b;
        $pembelian->tanggal = $request->c;
        $pembelian->harga = $request->d;
        $pembelian->jumlah = $request->e;
        $barang->stok = $barang->stok+$request->e;
        $barang->save();
        $pembelian->total_harga = $request->d*$request->e;
        $pembelian->save();
        return redirect('pembelian');
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
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect('pembelian');
    }
}
