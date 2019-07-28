@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Pantau Gizi</h3>
</section>
<form action="{{route('gizibulan')}}" method="POST">
    {{csrf_field()}}
    <div class="container">
    @include('includes.messages')
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <select name="rw_id">
                  <option value="" disabled selected>Pilih RW</option>
                  @foreach($rws as $rw)
                  <option value="{{$rw->id}}">{{$rw->rw}}</option>
                  @endforeach
                </select>
                <label>RW berapa?</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12 push-m2">
                <select name="bulan">
                  <option value="" disabled selected>Pilih Bulan</option>
                  @foreach($bulan as $moon)
                  <option value="{{$moon}}">{{$moon}}</option>
                  @endforeach
                </select>
                <label>Bulan ke berapa?</label>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col m6 s12">
                    <a href="{{route('home')}}" class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                    <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit">Submit
                <i class="material-icons right">done</i>
                </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
<script type="text/javascript"></script>
@endsection