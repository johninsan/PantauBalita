<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article\post;
use Illuminate\Support\Facades\Storage;
use App\Model\Posyandu\posyandu;
use App\Model\Posyandu\rw;

class FrontController extends Controller
{
    public function isipost(post $post)
    {
        return view('postfront.isipost', compact('post'));
    }
    public function showpost()
    {
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        return view('postfront.show', compact('posts'));
    }
    public function showposyandu()
    {
        $posyandus = posyandu::orderBy('created_at', 'DESC')->paginate(8);
        return view('posyandufront.show', compact('posyandus'));
    }
    public function isiposyandu()
    {
        return view('posyandufront.isiposyandu');
    }
}
