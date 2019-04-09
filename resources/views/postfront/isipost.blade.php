@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section>
    <div class="center col m12 s12 isi-img">
        <img src="{{ Storage::disk('local')->url($post->image) }}" />
    </div>
</section>
<section class="grey lighten-3">
    <div class="row">
        <h4 class="grey-text text-darken-3 center">{{$post->title}}</h4>
        <h5 class="light grey-text text-darken-3 center">{{$post->subtitle}}</h5>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col m12 s12">
            <p>{!! htmlspecialchars_decode($post->body) !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="col m4 s12 offset-m8">
            <small>{{$post->created_at->diffForHumans()}}</small>
        </div>
    </div>
    <div class="row">
        <div class="col m8 s12 tagpart">
            <h5 class="light">Tags:</h5>
            @foreach($post->tags as $tag)
            <a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a> @endforeach
        </div>
    </div>
</div>
@endsection
 
@section('footerSection')
@endsection