<?php

namespace App\Http\Controllers;

<<<<<<< HEAD:app/Http/Controllers/PesanController.php
=======
use App\Pembelian;
use App\Barang;
use App\Supplier;
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PembelianController.php
use Illuminate\Http\Request;
use Input;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'id_barang' => ['required'],
        'id_supplier' =>['required'],
        'harga' =>['required','integer'],
        'jumlah' =>['required', 'integer'],
    ];

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
<<<<<<< HEAD:app/Http/Controllers/PesanController.php
=======
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.create', compact('barang', 'supplier'));
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PembelianController.php
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
        $pembelian = new Pembelian;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->id_supplier = $request->id_supplier;
        $pembelian->harga = $request->harga;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total_harga = $request->jumlah * $request->harga;
        $pembelian->save();

        $barang = Barang::findOrFail($pembelian->id_barang);
        $barang->jumlah_barang = $barang->jumlah_barang + $request->jumlah;    
        $barang->save();

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
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.show', compact('pembelian','barang', 'supplier'));
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
        $this->validate($request, $this->rules);
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('pembelian.edit', compact('pembelian','barang', 'supplier'));
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
        
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->id_barang = $request->id_barang;
        $pembelian->id_supplier = $request->id_supplier;
        $pembelian->harga = $request->harga;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total_harga = $request->jumlah * $request->harga;
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
