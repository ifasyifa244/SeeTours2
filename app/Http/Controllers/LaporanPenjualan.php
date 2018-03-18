<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;

class LaporanPenjualan extends Controller
{
    //
    public function index()
    {
        //
        $penjualan = Penjualan::all();
        return view('laporan.penjualan', compact('penjualan'));
    }

    public function index2(Request $request)
    {
        //
    	$a = $request->a;
    	$b = $request->b;
		$penjualan = Penjualan::whereBetween('created_at', [$a, $b])->get();
		$sum = $penjualan->sum('total_harga');
        return view('laporan.penjualan1', compact('penjualan', 'a','b','sum'));
    }
}
