<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atm;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\AtmException;
use DB;
class AtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $atm = DB::table('atms')->join('objek_wisatas','objek_wisatas.id','=','atms.lokasi')->select('atms.*','objek_wisatas.name as nama')->get();
        return view('Atm.index', compact('atm'));
    }
    public function lokasi(Request $request)
    {
         $atm = DB::table('atms')->join('objek_wisatas','objek_wisatas.id','=','atms.lokasi')->select('atms.*','objek_wisatas.name as nama')->where('atms.lokasi','=',$request->lokasi)->get();
        return view('Atm.index', compact('atm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Atm.create');
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
         
            
        $atm=new Atm;
        $atm->name=$request->name;
        $atm->kode_bank=$request->kode;
        $atm->alamat=$request->alamat;
        $atm->lokasi=$request->lokasi;
        $atm->jadwal=$request->jadwal;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $atm->gambar=$filename;
        }
        $atm->save();
        return redirect('admin/atm');
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
         $atm = Atm::findOrFail($id);
        return view('Atm.show', compact('atm'));
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
        $atm = Atm::findOrFail($id);
        return view('Atm.edit', compact('atm'));
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
         $atm=Atm::findOrFail($id);
          
        $atm->name=$request->name;
        $atm->kode_bank=$request->kode;
        $atm->alamat=$request->alamat;
        $atm->lokasi=$request->lokasi;
        $atm->jadwal=$request->jadwal;
       if ($request->hasFile('image')) {
            # code...
            $file=$request->file('image');

            $destinationPath=public_path().'/img/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess=$file->move($destinationPath,$filename);
            $atm->gambar=$filename;
        }
        $atm->save();
        return redirect('admin/atm');
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
        $atm=Atm::destroy($id);
        return redirect('admin/atm');
}
}
