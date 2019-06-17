@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h4 class="light grey-text text-darken-3 center">Hasil Monitor Bulan ini</h4>
</section>
@foreach($monitors as $monitor)
<div class="container bayiimg">
    <div class="row">
        <div class="col m4 s12 center">
            <img class="responsive-img materialboxed" src="/materialize/images/img/clients/1.jpg">
        </div>
        <div class="col m4 s12 push-m2">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h5>Keterangan Balita:</h5>
                </li>
                <li class="collection-item">Berat Badan: {{$monitor->beratbadan}}Kg</li>
                <li class="collection-item">Umur : {{$monitor->umur}} Bulan</li>
                <li class="collection-item">Jenis Kelamin : @if($monitor->jk == 1) Laki-laki @else Perempuan @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <section class="grey lighten-3">
        <h4 class="light center grey-text text-darken-3">Kondisi gizi balita saat ini adalah: @if($monitor->gb == 1)
            <span class="red-text text-darken-2">Gizi Buruk</span> @elseif($monitor->gk ==1)
            <span class="lime-text text-lighten-1">Kurang Gizi</span> @elseif($monitor->s ==1)
            <span class="green-text text-accent-3">Sehat</span> @elseif($monitor->gl ==1)
            <span class="lime-text text-lighten-1">Gizi Lebih</span> @elseif($monitor->o ==1)
            <span class="red-text text-darken-2">Obesitas</span> @endif
        </h4>
    </section>
</div>
<div class="container">
    <div class="row">
        <div class="col m6 s12">
            <span>ingin berkonsultasi dengan ahli? <a href="{{route('showpetugas')}}">tanya disini</a></span>
        </div>
        <div class="col m3 s12 push-m1">
            <a href="{{route('listbalita',$monitor ->balita_id)}}" class="blue lighten-effect blue lighten-2 btn z-depth-3"><i class="material-icons left">collections</i>List Hasil</a>
        </div>
    </div>
</div>
@endforeach
@endsection
 
@section('footerSection')
@endsection