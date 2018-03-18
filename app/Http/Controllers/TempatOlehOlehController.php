<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempatoleholeh;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\TempatoleholehException;
use Illuminate\Support\Str;
use DB;
class TempatOlehOlehController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tempatoleholeh = DB::table('tempatoleholehs')->join('objek_wisatas','objek_wisatas.id','=','tempatoleholehs.lokasi')->select('tempatoleholehs.*','objek_wisatas.name as nama')->get();
        return view('tempatoleholeh.index', compact('tempatoleholeh'));
    }

    public function lokasi(Request $request)
    {
        $tempatoleholeh = DB::table('tempatoleholehs')->join('objek_wisatas','objek_wisatas.id','=','tempatoleholehs.lokasi')->select('tempatoleholehs.*','objek_wisatas.name as nama')->where('tempatoleholehs.lokasi','=',$request->lokasi)->get();
        return view('tempatoleholeh.index', compact('tempatoleholeh'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tempatoleholeh.create');
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
        $tempatoleholeh=new Tempatoleholeh;
        $tempatoleholeh->slug=Str::slug($request->get('name'));
        $tempatoleholeh->name=$request->name;
        $tempatoleholeh->lokasi=$request->lokasi;
        $tempatoleholeh->alamat=$request->alamat;
        $tempatoleholeh->jadwal=$request->jadwal;
        $tempatoleholeh->no_telp=$request->no_telp;
        $tempatoleholeh->typenumber=$request->typenumber;
        $tempatoleholeh->artikel=$request->artikel;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $tempatoleholeh->gambar=$filename;
        }
        $tempatoleholeh->save();
        return redirect('admin/tempatoleholeh');
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
         $tempatoleholeh = Tempatoleholeh::findOrFail($id);
        return view('tempatoleholeh.show', compact('tempatoleholeh'));
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
        $tempatoleholeh = Tempatoleholeh::findOrFail($id);
        return view('tempatoleholeh.edit', compact('tempatoleholeh'));
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
        $tempatoleholeh=Tempatoleholeh::findOrFail($id);
        $tempatoleholeh->name=$request->name;
        $tempatoleholeh->lokasi=$request->lokasi;
        $tempatoleholeh->alamat=$request->alamat;
        $tempatoleholeh->jadwal=$request->jadwal;
        $tempatoleholeh->no_telp=$request->no_telp;
        $tempatoleholeh->typenumber=$request->typenumber;
        $tempatoleholeh->artikel=$request->artikel;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $tempatoleholeh->gambar=$filename;
        }
        $tempatoleholeh->save();
        return redirect('admin/tempatoleholeh');
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
        $tempatoleholeh=Tempatoleholeh::destroy($id);
        return redirect('admin/tempatoleholeh');
    }
}
