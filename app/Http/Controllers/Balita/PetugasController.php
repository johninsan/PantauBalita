<?php

namespace App\Http\Controllers\Balita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PetugasController extends Controller
{
    public function listortu()
    {
        $ortus = User::select(['users.*', 'role_user.role_id'])
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_id', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        // $ortus = User::where('status', 1)->get();
        return view('balitas.listortu', compact('ortus'));
    }
    public function getBalitabyOrtu($id)
    {
        $list = User::select(['users.name', 'balitas.*'])
            ->join('balitas', 'balitas.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('balitas.listbalita', compact('list'));
    }
}
