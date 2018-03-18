<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name','lokasi','slug','alamat','no_telp','type_number','artikel','gambar',];
}
