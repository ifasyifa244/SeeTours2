<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    protected $fillable = ['name','lokasi','slug','jadwal','artikel','gambar','kategori','viewers'];
}
