@extends('admin.layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Judul Permission</h3>
</section>
<form action="{{route('permission.store')}}" method="POST">
    {{csrf_field()}}
    <div class="container">
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <i class="material-icons prefix">colorize</i>
                <input id="name" type="text" name="name" class="validate">
                <label for="name">Permission Name :</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <select name="for">
                      <option value="" disabled selected>Pilih Salah Satu!</option>
                      <option value="pesan">Pesan</option>
                      <option value="article">Article</option>
                      <option value="others">Others</option>
                    </select>
                <label>Permission For:</label>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit" name="action">Submit
                <i class="material-icons right">done</i>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
@endsection