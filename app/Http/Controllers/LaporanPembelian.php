<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;

class LaporanPembelian extends Controller
{
    //
    public function index()
    {
        //
        $pembelian = Pembelian::all();
        return view('laporan.pembelian', compact('pembelian'));
    }

    public function index2(Request $request)
    {
        //
    	$a = $request->a;
    	$b = $request->b;
		$pembelian = Pembelian::whereBetween('created_at', [$a, $b])->get();
		$sum = $pembelian->sum('total_harga');
        return view('laporan.pembelian1', compact('pembelian', 'a','b','sum'));
    }
}
