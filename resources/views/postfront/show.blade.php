@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<div class="container">
    <div class="row">
        <h3 class="center light grey-text text-darken-3">ARTICLE MENARIK</h3>
        <div class="row">
            @foreach($posts as $post)
            <div class="col s12 m4">
                <div class="card medium">
                    <div class="card-image">
                        <img src="{{ Storage::disk('local')->url($post->image) }}">
                    </div>
                    <div class="card-content">
                        <h5 class="ligt card-title">{{$post->title}}</h5>
                        <p>{!! htmlspecialchars_decode(str_limit($post->body,10)) !!}</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('isi',$post->slug)}}">Baca Disini</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
 
@section('footerSection')
@endsection