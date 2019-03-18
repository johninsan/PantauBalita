<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function isipost()
    {
        return view('postfront.isipost');
    }
    public function showpost()
    {
        return view('postfront.show');
    }
}
