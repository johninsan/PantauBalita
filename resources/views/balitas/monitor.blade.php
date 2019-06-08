@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Monitor Balita</h3>
</section>
<form action="{{route('hasil')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}} @foreach($balitas as $balita)
    <div class="container">
        <input type="hidden" name="balita_id" value="{{$balita->id}}">
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <i class="material-icons prefix">colorize</i>
                <input id="Berat" name="Berat" type="number" step=".01" class="validate">
                <label for="Berat">Berat Badan:</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <i class="material-icons prefix">colorize</i>
                <input id="umur" name="umur" type="number" class="validate">
                <label for="umur">umur:</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col m6 s12 push-m2">
                <div class="btn">
                    <span>File</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" placeholder="Unggah foto Balita" type="text">
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit">Submit
                <i class="material-icons right">done</i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
@endsection