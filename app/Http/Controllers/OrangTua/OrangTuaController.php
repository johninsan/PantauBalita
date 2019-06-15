<?php

namespace App\Http\Controllers\OrangTua;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pesan\Pesan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrangTuaController extends Controller
{
    public function showpetugas()
    {
        $petugass = User::select(['users.*'])
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id', 3)
            ->get();
        return view('user.petugas', compact('petugass'));
    }
    public function isipetugas($id)
    {
        $idasli = base64_decode($id);
        $countpesan = Pesan::where('penerima_id', $idasli)->where('pengirim_id', Auth::user()->id)->count();
        $petugass = User::where('id', $idasli)->get();
        return view('user.detailpetugas', compact('petugass', 'countpesan'));
    }
}
