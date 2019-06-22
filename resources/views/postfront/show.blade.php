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
                        <img src="{{ url( 'uploads/foto/article') }}/{{ $post->image }}">
                    </div>
                    <div class="card-content">
                        <p class="ligt card-title">Judul :{{$post->title}}</p>
                        <p>Category: @foreach($post->categories as $category)
                            <a href="{{route('category',$category->slug)}}">{{$category->name}}</a> @endforeach</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('isi',$post->slug)}}">Baca Disini</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
 
@section('footerSection')
@endsection