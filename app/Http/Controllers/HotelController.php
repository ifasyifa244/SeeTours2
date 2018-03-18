<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\HotelException;
use DB;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = DB::table('hotels')->join('objek_wisatas','objek_wisatas.id','=','hotels.lokasi')->select('hotels.*','objek_wisatas.name as nama')->get();
        return view('hotel.index', compact('hotel'));
    }

    public function lokasi(Request $request)
    {
        $hotel = DB::table('hotels')->join('objek_wisatas','objek_wisatas.id','=','hotels.lokasi')->select('hotels.*','objek_wisatas.name as nama')->where('hotels.lokasi','=',$request->lokasi)->get();
        return view('hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hotel.create');
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
            'no_telp'=>'required',
            'typenumber'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $hotel=new Hotel;
        $hotel->slug=Str::slug($request->get('name'));
        $hotel->name=$request->name;
        $hotel->lokasi=$request->lokasi;
        $hotel->alamat=$request->alamat;
        $hotel->no_telp=$request->no_telp;
        $hotel->typenumber=$request->typenumber;
        $hotel->artikel=$request->artikel;
       if ($request->hasFile('gambar')) {
            # code...
            $file=$request->file('gambar');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $hotel->gambar=$filename;
        }
        $hotel->save();
        return redirect('admin/hotel');
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
        $hotel = Hotel::findOrFail($id);
        return view('hotel.show', compact('hotel'));
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
        $hotel = Hotel::findOrFail($id);
        return view('hotel.edit', compact('hotel'));
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
            'no_telp'=>'required',
            'typenumber'=>'required',
            'artikel'=>'required',
            'gambar'=>'image|max:20048']);
        $hotel=Hotel::findOrFail($id);
        $hotel->name=$request->name;
        $hotel->lokasi=$request->lokasi;
        $hotel->alamat=$request->alamat;
        $hotel->no_telp=$request->no_telp;
        $hotel->typenumber=$request->typenumber;
        $hotel->artikel=$request->artikel;
       if ($request->hasFile('gambar')) {
            # code...
            $file=$request->file('gambar');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $hotel->gambar=$filename;
        }
        $hotel->save();
        return redirect('admin/hotel');   
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
       $hotel=Hotel::destroy($id);
        return redirect('admin/hotel');
    }
}
