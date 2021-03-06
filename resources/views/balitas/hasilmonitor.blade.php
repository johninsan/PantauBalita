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
            @if(empty($monitor->foto))
            <img class="responsive-img materialboxed" src="/materialize/images/img/clients/1.jpg"> @else
            <img class="responsive-img materialboxed" src="{{ url( 'uploads/foto') }}/{{ $monitor->foto }}"> @endif
        </div>
        <div class="col m4 s12 push-m2">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h5>Keterangan Balita:</h5>
                </li>
                <li class="collection-item">Berat Badan: {{$monitor->beratbadan}}Kg</li>
                <li class="collection-item">Umur : {{$monitor->umur}} Bulan</li>
                <li class="collection-item">Tinggi Badan : {{$monitor->tinggi}} CM</li>
                <li class="collection-item">Jenis Kelamin : @if($monitor->jk == 1) Laki-laki @else Perempuan @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <section class="grey lighten-3">
        <h4 class="light center grey-text text-darken-3">Kondisi gizi balita saat ini adalah: @if($monitor->status == 1)
            <span class="red-text text-darken-2">Gizi Buruk</span> @elseif($monitor->status ==2)
            <span class="lime-text text-lighten-1">Kurang Gizi</span> @elseif($monitor->status ==3)
            <span class="green-text text-accent-3">Sehat</span> @elseif($monitor->status ==4)
            <span class="lime-text text-lighten-1">Gizi Lebih</span> @elseif($monitor->status ==5)
            <span class="red-text text-darken-2">Obesitas</span> @endif
        </h4>
    </section>
</div>
<div class="container">
    <div class="row">
        <div class="col m3 s12 push-m1">
            <a href="{{route('listbalita',$monitor ->balita_id)}}" class="blue lighten-effect blue lighten-2 btn z-depth-3"><i class="material-icons left">collections</i>List Hasil</a>
        </div>
    </div>
</div>
@endforeach
@endsection
 
@section('footerSection')
@endsection