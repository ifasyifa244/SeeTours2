<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD:app/Http/Controllers/AboutController.php
use App\About;
=======
use Input;
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/JasaController.php

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $rules = [
        'nama' => ['required','unique:jasas'],
        'harga' =>['required','integer'],
    ];

    public function index()
    {
        $about = About::all();
        return view('About.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('About.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
<<<<<<< HEAD:app/Http/Controllers/AboutController.php
    {   
        $about = new About();
        $about->konten=$request->konten;
        $about->save();
        return redirect('admin/about');
=======
    {
        //
        $this->validate($request, [
        'nama' => ['required','unique:jasas'],
        'harga' =>['required','integer'],
    ]);
        $jasa = new Jasa();
        $jasa->nama = $request->nama;
        $jasa->harga = $request->harga;
        $jasa->save();
        return redirect('jasa');

>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/JasaController.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $about = About::findOrFail($id);
        return view('About.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $about = About::findOrFail($id);
        return view('About.edit', compact('about'));
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
<<<<<<< HEAD:app/Http/Controllers/AboutController.php
        $about=About::findOrFail($id);
        $about->konten=$request->konten;
        $about->save();
        return redirect('admin/about');
=======
        $this->validate($request, [
        'nama' => ['required'],
        'harga' =>['required','integer'],
    ]);
        $jasa = Jasa::findOrFail($id);
        $jasa->nama = $request->nama;
        $jasa->harga = $request->harga;
        $jasa->save();
        return redirect('jasa');
>>>>>>> 51d53574806a4f0a4873213ff106f23d91444836:app/Http/Controllers/JasaController.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=About::destroy($id);
        return redirect('admin/about');
    }
}
