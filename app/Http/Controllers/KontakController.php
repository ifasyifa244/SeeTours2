<?php

namespace App\Http\Controllers;

<<<<<<< HEAD:app/Http/Controllers/KontakController.php
=======
use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Jasa;
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PenjualanController.php
use Illuminate\Http\Request;
use App\Pesan;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD:app/Http/Controllers/KontakController.php
        $kontak = Pesan::all();
        return view('Kontak.index', compact('kontak'));
=======
        //
        $penjualan = Penjualan::orderBy('created_at','desc')->get();
        return view('penjualan.index', compact('penjualan'));
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PenjualanController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
<<<<<<< HEAD:app/Http/Controllers/KontakController.php
=======
        $barang = Barang::all();
        $jasa = Jasa::all();
        $pelanggan = Pelanggan::all();
        return view('penjualan.create', compact('barang', 'jasa', 'pelanggan'));
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PenjualanController.php
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
        // $this->validate($request, $this->rules);
        $penjualan = new Penjualan;
        
        $penjualan->id_pelanggan = $request->id_pelanggan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->id_jasa = $request->id_jasa;
        $penjualan->id_karyawan = $request->id_karyawan;
        $penjualan->jumlah = $request->jumlah;

        
        

        if ($request->id_jasa==null) {
            $barang = Barang::findOrFail($penjualan->id_barang);
        $penjualan->total_harga = $barang->harga_barang * $request->jumlah;
        $penjualan->save();
        $barang->jumlah_barang = $barang->jumlah_barang - $request->jumlah;    
        $barang->save();
        }

        else if ($request->id_barang==null) {
            $jasa = Jasa::findOrFail($penjualan->id_jasa);
        $penjualan->total_harga = $jasa->harga;
        $penjualan->save();
        }

        else{
            $barang = Barang::findOrFail($penjualan->id_barang);
            $jasa = Jasa::findOrFail($penjualan->id_jasa);
        $penjualan->total_harga = ($barang->harga_barang * $request->jumlah) + $jasa->harga;
        $penjualan->save();
   
        $barang->jumlah_barang = $barang->jumlah_barang - $request->jumlah;    
        $barang->save();
}

        return redirect('penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD:app/Http/Controllers/KontakController.php
        $kontak = Pesan::find($id);
        return view('Kontak.show', compact('kontak'));
=======
        //
        $barang = Barang::all();
        $jasa = Jasa::all();
        $pelanggan = Pelanggan::all();
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.show', compact('barang', 'jasa', 'pelanggan', 'penjualan'));
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PenjualanController.php
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
        $barang = Barang::all();
        $jasa = Jasa::all();
        $pelanggan = Pelanggan::all();
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.edit', compact('barang', 'jasa', 'pelanggan', 'penjualan'));
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
        // $this->validate($request, $this->rules);
        $penjualan = Penjualan::findOrFail($id);
        
       $penjualan->id_pelanggan = $request->id_pelanggan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->id_jasa = $request->id_jasa;
        $penjualan->id_karyawan = $request->id_karyawan;
        $penjualan->jumlah = $request->jumlah;

        
        

        if ($request->id_jasa==null) {
            $barang = Barang::findOrFail($penjualan->id_barang);
        $penjualan->total_harga = $barang->harga_barang * $request->jumlah;
        $penjualan->save();
        $barang->jumlah_barang = $barang->jumlah_barang - $request->jumlah;    
        $barang->save();
        }

        else if ($request->id_barang==null) {
            $jasa = Jasa::findOrFail($penjualan->id_jasa);
        $penjualan->total_harga = $jasa->harga;
        $penjualan->save();
        }

        else{
            $barang = Barang::findOrFail($penjualan->id_barang);
            $jasa = Jasa::findOrFail($penjualan->id_jasa);
        $penjualan->total_harga = ($barang->harga_barang * $request->jumlah) + $jasa->harga;
        $penjualan->save();
   
        $barang->jumlah_barang = $barang->jumlah_barang - $request->jumlah;    
        $barang->save();
    }
        return redirect('penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD:app/Http/Controllers/KontakController.php
       $kontak=Pesan::destroy($id);
        return redirect('admin/kontaks');
=======
        //
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect('penjualan');
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/PenjualanController.php
    }
}
