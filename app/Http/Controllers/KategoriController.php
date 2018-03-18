<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $kategori= Kategori::all(); 
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD:app/Http/Controllers/KategoriController.php
        $this->validate($request,[
            'nama_kategori'=>'required']);
        $kategori= new Kategori;
        $kategori->nama_kategori=$request->name;
        $kategori->save();
        return redirect('admin/kategori');
=======
        //
        $this->validate($request, [
        'nama' =>['required', 'unique:suppliers'],
        'alamat' =>['required'],
        'no_telepon' =>['required','numeric','unique:suppliers'],
    ]);
        $supplier = new Supplier;
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->no_telepon = $request->no_telepon;
        $supplier->save();
        return redirect('supplier');
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/SupplierController.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
<<<<<<< HEAD:app/Http/Controllers/KategoriController.php
        $this->validate($request,[
            'nama_kategori'=>'required']);
        $kategori=Kategori::findorFail($id);
        $kategori->nama_kategori=$request->name;
        $kategori->save();
        return redirect('admin/kategori');
=======
        //
        $this->validate($request, [
        'nama' =>['required'],
        'alamat' =>['required'],
        'no_telepon' =>['required','numeric'],
    ]);
         $supplier = Supplier::findOrFail($id);
         $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->no_telepon = $request->no_telepon;
        $supplier->save();
        return redirect('supplier');
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/SupplierController.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=Kategori::destroy($id);
        return redirect('admin/kategori');
    }
}
