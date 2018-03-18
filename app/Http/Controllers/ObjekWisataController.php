<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjekWisata;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\ObjekWisataException;
use DB;
use Illuminate\Support\Str;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objekwisata = DB::table('objek_wisatas')->join('kategoris','kategoris.id','=','objek_wisatas.kategori')->select('objek_wisatas.*','kategoris.nama_kategori')->get();
        return view('objekwisata.index', compact('objekwisata'));
    }

    public function kategori($id)
    {
        //
        $objekwisata = DB::table('objek_wisatas')->join('kategoris','kategoris.id','=','objek_wisatas.kategori')->select('objek_wisatas.*','kategoris.nama_kategori')->where('objek_wisatas.kategori','=',$id)->get();
        return view('objekwisata.index', compact('objekwisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('objekwisata.create');
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
        $this->validate($request,[
            'kategori'=>'required',
            'name'=>'required',
            'lokasi'=>'required',
            'jadwal'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $objekwisata=new ObjekWisata;
        $objekwisata->slug=Str::slug($request->get('name'));
        $objekwisata->kategori=$request->kategori;
        $objekwisata->jadwal=$request->jadwal;
        $objekwisata->name=$request->name;
        $objekwisata->lokasi=$request->lokasi;

        $objekwisata->artikel=$request->artikel;
       if ($request->hasFile('gambar')) {
            # code...
            $file=$request->file('gambar');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $objekwisata->gambar=$filename;
        }
        $objekwisata->save();
        return redirect('admin/objekwisata');
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
        $objekwisata = ObjekWisata::findOrFail($id);
        return view('objekwisata.show', compact('objekwisata'));
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
         $objekwisata = ObjekWisata::findOrFail($id);
        return view('objekwisata.edit', compact('objekwisata'));
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
       $this->validate($request,[
            'name'=>'required',
            'lokasi'=>'required',
            'jadwal'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $objekwisata=ObjekWisata::findOrFail($id);
        $objekwisata->name=$request->name;
        $objekwisata->lokasi=$request->lokasi;
        $objekwisata->jadwal=$request->jadwal; 
        $objekwisata->artikel=$request->artikel;
       if ($request->hasFile('gambar')) {
            # code...
            $file=$request->file('gambar');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $objekwisata->gambar=$filename;
        }
        $objekwisata->save();
        return redirect('admin/objekwisata');
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
     $objekwisata=Objekwisata::destroy($id);
        return redirect('admin/objekwisata');
    }
}
     