@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h4 class="light grey-text text-darken-3 center">Hasil Monitor Bulan ini</h4>
</section>
<div class="container bayiimg">
    <div class="row">
        <div class="col m4 s12 center">
            <img class="responsive-img materialboxed" src="materialize/images/img/clients/1.jpg">
        </div>
        <div class="col m4 s12 push-m2">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h5>Keterangan Balita:</h5>
                </li>
                <li class="collection-item">Berat Badan: 6Kg</li>
                <li class="collection-item">Umur : 6 Bulan</li>
                <li class="collection-item">Jenis Kelamin : Laki-laki</li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <section class="grey lighten-3">
        <h4 class="light center grey-text text-darken-3">Kondisi gizi balita saat ini adalah:@foreach($monitors as $monitor) @if ($monitor->hasil >= 0.25 && $monitor->hasil
            <=0.4 ) Kurang Gizi @endif @endforeach</h4>
    </section>
</div>
<div class="container">
    <div class="row">
        <div class="col m6 s12">
            <span>ingin berkonsultasi dengan ahli? <a href="#">tanya disini</a></span>
        </div>
        <div class="col m3 s12 push-m1">
            <a class="blue lighten-effect blue lighten-2 btn z-depth-3"><i class="material-icons left">collections</i>List Hasil</a>
        </div>
    </div>
</div>
@endsection
 
@section('footerSection')
@endsection