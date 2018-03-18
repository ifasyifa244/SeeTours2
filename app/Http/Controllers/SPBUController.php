<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spbu;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\SpbuException;
use DB;

class SPBUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spbu = DB::table('spbus')->join('objek_wisatas','objek_wisatas.id','=','spbus.lokasi')->select('spbus.*','objek_wisatas.name as nama')->get();
        return view('SPBU.index', compact('spbu'));
    }

    public function lokasi(Request $request)
    {
        $spbu = DB::table('spbus')->join('objek_wisatas','objek_wisatas.id','=','spbus.lokasi')->select('spbus.*','objek_wisatas.name as nama')->where('spbus.lokasi','=',$request->lokasi)->get();
        return view('SPBU.index', compact('spbu'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('SPBU.create');
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
        
        $spbu=new Spbu;
        $spbu->name=$request->name;
        $spbu->kode_spbu=$request->kode;
        $spbu->alamat=$request->alamat;
        $spbu->lokasi=$request->lokasi;
        $spbu->jadwal=$request->jadwal;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $spbu->gambar=$filename;
        }
        $spbu->save();
        return redirect('admin/spbu');
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
         $spbu = Spbu::findOrFail($id);
        return view('SPBU.show', compact('spbu'));
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
        $spbu = Spbu::findOrFail($id);
        return view('SPBU.edit', compact('spbu'));
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
        
            
        $spbu=Spbu::findOrFail($id);
        $spbu->name=$request->name;
        $spbu->kode_spbu=$request->kode;
        $spbu->alamat=$request->alamat;
        $spbu->lokasi=$request->lokasi;
        $spbu->jadwal=$request->jadwal;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $spbu->gambar=$filename;
        }
        $spbu->save();
        return redirect('admin/spbu');
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
     $spbu=Spbu::destroy($id);
        return redirect('admin/spbu');
    }
}
