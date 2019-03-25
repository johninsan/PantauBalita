<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article\post;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function isipost(post $post)
    {
        return view('postfront.isipost', compact('post', 'contents'));
    }
    public function showpost()
    {
        return view('postfront.show');
    }
}
