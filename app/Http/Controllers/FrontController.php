<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article\post;
use App\Model\Article\category;
use App\Model\Article\tag;
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
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('postfront.show', compact('posts'));
    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('postfront.show', compact('posts'));
    }
    public function category(category $category)
    {
        $posts = $category->categories();
        return view('postfront.show', compact('posts'));
    }
    public function showposyandu()
    {
        $posyandus = posyandu::orderBy('created_at', 'DESC')->paginate(8);
        return view('posyandufront.show', compact('posyandus'));
    }
    public function isiposyandu($id)
    {
        $idasli = base64_decode($id);
        $posyandus = posyandu::where('id', $idasli)->get();
        return view('posyandufront.isiposyandu', compact('posyandus'));
    }
}
