<?php

namespace App\Http\Controllers\post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article\post;
use App\Model\Article\tag;
use App\Model\Article\category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('article.posts.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $categories = category::all();
        return view('article.posts.post', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);
        $post = new post;
        $file = $request->file('image');
        if (empty($file)) {
            $post->urlfoto = null;
            $post->image = null;
        } else {
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('uploads/foto/article/', $newName);
            $post->image = $newName;
            $urlfoto = url('uploads/foto/article/') . $newName;
            $post->urlfoto = $urlfoto;
        }
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('tags', 'categories')->where('id', $id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('article.posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);
        $post = post::find($id);
        if (empty($file)) {
            $balita->urlfoto = null;
            $balita->image = null;
        } else {
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('uploads/foto/article/', $newName);
            $balita->image = $newName;
            $urlfoto = url('uploads/foto/article/') . $newName;
            $balita->urlfoto = $urlfoto;
        }
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
        return redirect()->back();
    }
}
