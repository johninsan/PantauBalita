@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content') @foreach($balitas as $balita)
<section>
    <div class="center col m12 s12 isi-img">
        <img src="{{ url( 'uploads/foto') }}/{{ $balita->foto }}" />
    </div>
</section>
<section class="grey lighten-3">
    <div class="row">
        <h4 class="grey-text text-darken-3 center">Monitor gizi balita setiap bulan</h4>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col m6 s12">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4>Nama :{{$balita->nama}}</h4>
                </li>
                <li class="collection-item">Lahir di : {{$balita->pob}}</li>
                @if($balita->JK == 1)
                <li class="collection-item">Jenis kelamin :Laki-laki</li>
                @else
                <li class="collection-item">Jenis kelamin :Perempuan</li>
                @endif
                <li class="collection-item">Tanggal lahir : {{\Carbon\Carbon::parse($balita->dob)->format('d F Y')}}</li>
            </ul>
        </div>
        <div class="col m6 s12">
            <div class="row">
                @if($monitor_count != 0)
                <div class="card-panel  teal accent-3">
                    <span class="grey-text text-darken-4">Bulan ini anda sudah memonitor gizi balita terkait.
                    </span>
                </div>
                @else
                <div class="card-panel  teal accent-3">
                    <span class="grey-text text-darken-4">Monitor gizi balita anda setiap bulannya. <br><a href="{{route('monitor',$balita->id)}}">Klik disini untuk monitor gizi</a>
                    </span>
                </div>
                @endif
                <div class="card-panel  pink lighten-4">
                    <span class="grey-text text-darken-4">Lihat hasil monitor gizi balita terkait. <br><a href="{{route('listbalita',$balita->id)}}">Klik disini untuk melihat</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
 
@section('footerSection')
@endsection