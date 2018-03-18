<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objekwisata;
use App\Pesan;
use App\Hotel;
use App\Rumahmakan;
use App\Tempatoleholeh;
use App\Atm;
use App\Spbu;
use App\About;
use DB;
use App\Kategori;

class FrontController extends Controller
{
    //
    public function index()
    {   $populer = Objekwisata::orderBy('viewers','desc')->take(5)->get();
    	return view ('FrontEnd.index')->with(compact('populer'));
    }

    public function filter($id)
    {
    	$objekwisata=Objekwisata::where('kategori','=',$id)->get();
        $kategori=Kategori::find($id);
    	return view ('FrontEnd.kota',compact('objekwisata','kategori'));
    }

    public function filtersemua($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $hotel=Hotel::where('lokasi','=',$id)->get();
        $rmakan=Rumahmakan::where('lokasi','=',$id)->get();
        $toleholeh=Tempatoleholeh::where('lokasi','=',$id)->get();
        $atm=Atm::where('lokasi','=',$id)->get();
        $spbu=Spbu::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filtersemua',compact('hotel','rmakan','toleholeh','atm','spbu','objek'));
    }

    public function filterhotel($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $hotel=Hotel::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filterhotel',compact('hotel','objek'));
    }

     public function filterrestoran($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $rmakan=Rumahmakan::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filterrestoran',compact('rmakan','objek'));
    }

     public function filtertoleholeh($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $toleholeh=Tempatoleholeh::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filtertoleholeh',compact('toleholeh','objek'));
    }

    public function filteratm($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $atm=Atm::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filteratm',compact('atm','objek'));
    }

    public function filterspbu($id)
    {
        $objek=Objekwisata::where('id','=',$id)->get();
        $spbu=Spbu::where('lokasi','=',$id)->get();
        return view ('FrontEnd.filterspbu',compact('spbu','objek'));
    }


    public function detail($slug)
    {
        $objek = Objekwisata::where('slug','=',$slug)->get();
        $id = Objekwisata::where('slug','=',$slug)->first()->id;
        // $objekwisata=DB::table('objek_wisatas')->join('atms','atms.lokasi','=','objek_wisatas.id')->join('hotels','hotels.lokasi','=','objek_wisatas.id')->join('rumahmakans','rumahmakans.lokasi','=','objek_wisatas.id')->join('spbus','spbus.lokasi','=','objek_wisatas.id')->join('tempatoleholehs','tempatoleholehs.lokasi','=','objek_wisatas.id')->select('objek_wisatas.*','atms.name as nama_atm','atms.kode_bank','atms.lokasi as lokasi_atm','atms.alamat as alamat_atm','atms.jadwal as jadwal_atm','atms.gambar as gambar_atm','hotels.name as nama_hotel','hotels.lokasi as lokasi_hotel','hotels.alamat as alamat_hotel','hotels.no_telp as no_telphotel', 'hotels.artikel as artikel_hotel', 'hotels.gambar as gambar_hotel','rumahmakans.name as nama_rm','rumahmakans.lokasi as lokasi_rm','rumahmakans.alamat as alamat_rm','rumahmakans.jadwal as jadwal_rm','rumahmakans.no_telp as no_telprm','rumahmakans.artikel as artikel_rm','rumahmakans.gambar as gambar_rm','tempatoleholehs.name as nama_to','tempatoleholehs.lokasi as lokasi_to','tempatoleholehs.alamat as alamat_to','tempatoleholehs.jadwal as jadwal_to','tempatoleholehs.no_telp as no_telpto','tempatoleholehs.artikel as artikel_to','tempatoleholehs.gambar as gambar_to','spbus.name as nama_spbu','spbus.kode_spbu','spbus.lokasi as lokasi_spbu','spbus.alamat as alamat_spbu','spbus.jadwal as jadwal_spbu','spbus.gambar as gambar_spbu')->where('objek_wisatas.id','=',$id)->get();

        $hotel = Hotel::where('lokasi','=',$id)->get();
        $rmakan = Rumahmakan::where('lokasi','=',$id)->get();
        $toleholeh = Tempatoleholeh::where('lokasi','=',$id)->get();
        $atm = Atm::where('lokasi','=',$id)->get();
        $spbu = Spbu::where('lokasi','=',$id)->get();
        $objeks = Objekwisata::where('slug',$slug)->first();
        $viewers = $objeks->viewers+1;
        $objeks->viewers = $viewers; 
        $objeks->save();


        return view ('FrontEnd.detail',compact('hotel','objek','rmakan','toleholeh','atm','spbu'));
    }
    public function detailhotel($slug)
    {
         $hotel=Hotel::where('slug','=',$slug)->get();
        return view ('FrontEnd.detailhotel',compact('hotel'));
    }

    public function detailrmakan($slug)
    {
        $rmakan=Rumahmakan::where('slug','=',$slug)->get();
        return view ('FrontEnd.detailrmakan',compact('rmakan'));
    }
    public function detailtoleholeh($slug)
    {
        $oleh=Tempatoleholeh::where('slug','=',$slug)->get();
        return view ('FrontEnd.detailtoleholeh',compact('oleh'));
    }
     public function profil()
    {
        $about=About::all();
        return view ('FrontEnd.about',compact('about'));
    }


    public function kirimpesan(Request $request)
    {
        
        $kontak=new Pesan;
        $kontak->name=$request->name;
        $kontak->no_telp=$request->no_telp;
        $kontak->email=$request->email;
        $kontak->pesan=$request->pesan;
        $kontak->save();
        return redirect('kontak');
    }

    public function kontak()
    {
        $kontak=Pesan::all();
        return view ('FrontEnd.contact',compact('kontak'));
    }


    public function kontaks()
    {
        $kontak=Pesan::all();
        return view ('Kontak.index',compact('kontak'));
    }


}
