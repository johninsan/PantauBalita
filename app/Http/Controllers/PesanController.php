<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function pesandetailortu()
    {
        return view('user.pesandetailortu');
    }
    public function pesanortu()
    {
        return view('user.pesanortu');
    }
}
