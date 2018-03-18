<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Input;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules = [
        'name' => ['required'],
        'email' =>['required','unique:users'],
        'password' =>['required','min:6'],
    ];

    public function index()
    {
        //
        $karyawan = User::all();
        return view('Karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => ['required'],
        'email' =>['required','unique:users','email'],
        'password' =>['required','min:6'],
    ]);
        $karyawan = new User();
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->password = bcrypt($request->password);
        $karyawan->save();
        return redirect('karyawan');
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
        $karyawan = User::findOrFail($id);
        return view('Karyawan.show', compact('karyawan'));
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
        $karyawan = User::findOrFail($id);
        return view('Karyawan.edit', compact('karyawan'));

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
        $this->validate($request, [
        'name' => ['required'],
        'email' =>['required','email'],
        'password' =>['required','min:6'],
    ]);
        $karyawan = User::findOrFail($id);
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->password = bcrypt($request->password);
        $karyawan->save();
        return redirect('karyawan');
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
        $karyawan = User::findOrFail($id);
        $karyawan->delete();
        return redirect('karyawan');
    }
}
