<?php

use Illuminate\Database\Seeder;
use App\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategori = new Kategori();
     	$kategori->nama_kategori = "KOTA";
     	$kategori->save(); 

     	$kategori1 = new Kategori();
     	$kategori1->nama_kategori = "KABUPATEN";
     	$kategori1->save();
    }
}
