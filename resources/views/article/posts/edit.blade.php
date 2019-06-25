@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Buat Article</h3>
</section>
<form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}} {{method_field('PUT')}}
    <div class="container">
    @include('includes.messages')
        <div class="row">
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">colorize</i>
                <input id="title" value="{{$post->title}}" type="text" name="title" class="validate">
                <label for="title">Judul Article :</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">colorize</i>
                <input id="sub" name="subtitle" value="{{$post->subtitle}}" type="text" class="validate">
                <label for="sub">Sub Judul:</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m5 s12">
                <i class="material-icons prefix">colorize</i>
                <input id="slug" name="slug" type="text" value="{{$post->slug}}" class="validate">
                <label for="slug">Article Slug:</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
            <div class="file-field input-field col m4 s12">
                <div>
                    <label>Foto Lama:</label>
                    <img src="{{ url('uploads/foto/article/'.$post->image) }}" style="width: 150px; height: 150px;">
                </div>
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" placeholder="Unggah foto Article" type="text">
                </div>
            </div>
            <label class="col m3 s12">
                        <input type="checkbox" value="1" name="status"
                        @if($post ->status == 1) {{'checked'}}
                        @endif/>
                        <span>Publish</span>
                    </label>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <select name="categories[]" multiple>
                    <option value="" disabled>Choose your option</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @foreach($post->categories as $postCategory)
                                @if($postCategory -> id == $category ->id)
                                selected
                                @endif
                                @endforeach>
                                {{$category->name}}
                        </option>
                    @endforeach
                        </select>
                <label>Pilih Category:</label>
            </div>
            <div class="input-field col m6 s12">
                <select name="tags[]" multiple>
                    <option value="" disabled>Choose your option</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                                @foreach($post->tags as $postTag)
                                @if($postTag -> id == $tag ->id)
                                selected
                                @endif
                                @endforeach>
                                {{$tag->name}}
                        </option>
                    @endforeach
                </select>
                <label>Pilih Tag:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m12 s12">
                <textarea class="editor materialize-textarea" name="body" id="editor1">{{$post->body}}</textarea>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <a href="{{route('post.index')}}" class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit" name="action">Submit
                <i class="material-icons right">done</i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
<script src="{{asset('materialize/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
        })

</script>
@endsection