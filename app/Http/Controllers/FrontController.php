<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article\post;
use Illuminate\Support\Facades\Storage;

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
}
