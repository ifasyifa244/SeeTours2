<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rumahmakan;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\RumahmakanException;
use Illuminate\Support\Str;
use DB;

class RumahmakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rumahmakan = DB::table('rumahmakans')->join('objek_wisatas','objek_wisatas.id','=','rumahmakans.lokasi')->select('rumahmakans.*','objek_wisatas.name as nama')->get();
        return view('rumahmakan.index', compact('rumahmakan'));
    }

    public function lokasi(Request $request)
    {
        $rumahmakan = DB::table('rumahmakans')->join('objek_wisatas','objek_wisatas.id','=','rumahmakans.lokasi')->select('rumahmakans.*','objek_wisatas.name as nama')->where('rumahmakans.lokasi','=',$request->lokasi)->get();
        return view('rumahmakan.index', compact('rumahmakan'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rumahmakan.create');
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
            'name'=>'required',
            'lokasi'=>'required',
            'alamat'=>'required',
            'jadwal'=>'required',
            'no_telp'=>'required',
            'typenumber'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $rumahmakan=new Rumahmakan;
        $rumahmakan->slug=Str::slug($request->get('name'));
        $rumahmakan->name=$request->name;
        $rumahmakan->lokasi=$request->lokasi;
        $rumahmakan->alamat=$request->alamat;
        $rumahmakan->jadwal=$request->jadwal;
        $rumahmakan->no_telp=$request->no_telp;
        $rumahmakan->typenumber=$request->typenumber;
        $rumahmakan->artikel=$request->artikel;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $rumahmakan->gambar=$filename;
        }
        $rumahmakan->save();
        return redirect('admin/rumahmakan');
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
         $rumahmakan = Rumahmakan::findOrFail($id);
        return view('rumahmakan.show', compact('rumahmakan'));
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
        $rumahmakan =Rumahmakan::findOrFail($id);
        return view('rumahmakan.edit', compact('rumahmakan'));
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
            'alamat'=>'required',
            'jadwal'=>'required',
            'no_telp'=>'required',
            'typenumber'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $rumahmakan=Rumahmakan::findOrFail($id);
        $rumahmakan->name=$request->name;
        $rumahmakan->lokasi=$request->lokasi;
        $rumahmakan->alamat=$request->alamat;
        $rumahmakan->jadwal=$request->jadwal;
        $rumahmakan->no_telp=$request->no_telp;
        $rumahmakan->typenumber=$request->typenumber;
        $rumahmakan->artikel=$request->artikel;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $rumahmakan->gambar=$filename;
        }
        $rumahmakan->save();
        return redirect('admin/rumahmakan');
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
        $rumahmakan=Rumahmakan::destroy($id);
        return redirect('admin/rumahmakan');
    }
}
