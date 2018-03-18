<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $hakakses= User::all(); 
        return view('HakAkses.index',compact('hakakses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('HakAkses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required']);
        $hakakses=new User;
        $hakakses->name=$request->name;
        $hakakses->email=$request->email;
        $hakakses->password=bcrypt($request->password);
        $hakakses->save();
        return redirect('admin/hakakses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hakakses = User::findOrFail($id);
        return view('Hakakses.show', compact('hakakses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hakakses = User::findOrFail($id);
        return view('Hakakses.edit', compact('hakakses'));
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
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required']);
        $hakakses=User::findOrFail($id);
        $hakakses->name=$request->name;
        $hakakses->email=$request->email;
        $hakakses->password=bcrypt($request->password);
        $hakakses->save();
        return redirect('admin/hakakses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hakakses=User::destroy($id);
        return redirect('admin/hakakses');
    }
}
