<?php

namespace App\Http\Controllers\OrangTua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\yajra;

class OrangTuaController extends Controller
{
    public function testyajra()
    {
    	$users = yajra::all();
    	return view('testyajra',compact('users'));
    }
}
