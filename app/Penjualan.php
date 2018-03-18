<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //

    public function karyawan() {
    	return $this->belongsTo('App\User', 'id_karyawan');
    }

    public function barang() {
    	return $this->belongsTo('App\Barang','id_barang');
    }

    public function jasa()
	{
		return $this->belongsTo('App\Jasa','id_jasa');
	}

     public function pelanggan()
	{
		return $this->belongsTo('App\Pelanggan','id_pelanggan');
	}
}
