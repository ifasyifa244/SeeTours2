<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumahmakan extends Model
{
    protected $fillable = ['name','lokasi','slug','alamat','no_telp','type_number','artikel','gambar',];
}
