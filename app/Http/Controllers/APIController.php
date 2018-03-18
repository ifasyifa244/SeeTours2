<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjekWisata;


class APIController extends Controller
{
    public function Listdata(){
    	return ObjekWisata::all();
    }
}
