<?php

namespace App\Http\Controllers\OrangTua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\modelUser;
use App\Pesan\Pesan;
use Illuminate\Support\Facades\Session;

class OrangTuaController extends Controller
{
    public function showpetugas()
    {
        $petugass = modelUser::where('tipe', 2)->orderBy('created_at', 'DESC')->paginate(8);
        return view('user.petugas', compact('petugass'));
    }
    public function isipetugas($id)
    {
        $idasli = base64_decode($id);
        $countpesan = Pesan::where('penerima_id', $idasli)->where('pengirim_id', Session::get('id'))->count();
        $petugass = modelUser::where('id', $idasli)->get();
        return view('user.detailpetugas', compact('petugass', 'countpesan'));
    }
}
