@extends('layouts/app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="light grey-text text-darken-3 center">Detail Jadwal Posyandu</h3>
</section>
@foreach($posyandus as $posyandu)
<div class="container">
    <div class="row">
        <div class="col m8 s12 offset-m2">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4 class="light grey-text text-darken-3 center">Dilaksanakan pada RW : {{$posyandu->rw_id}}</h4>
                </li>
                <li class="collection-item">Pada tanggal : {{\Carbon\Carbon::parse($posyandu->tanggal)->format('d F Y')}}</li>
                <li class="collection-item">
                    <h5 class="light">Penjelasan detail:</h5>
                </li>
                <li class="collection-item">{{$posyandu->deskripsi}}</li>
            </ul>
        </div>
    </div>
</div>
<section class="grey lighten-3">
    <h3 class="light grey-text text-darken-3 center">Kegiatan:</h3>
</section>
<div class="container">
    <div class="row">
        <small>Catatan: </small>
    </div>
    <div class="row">
        <small class="red-text text-darken-2">hijau = ada kegiatan, merah = tidak ada kegiatan</small>
    </div>
    <div class="row">
        <div class="col m6 s12">
            <p>Kesehatan ibu dan Anak:</p>
            <div class="progress">
                @if($posyandu->kesehatanibuanak == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
        <div class="col m6 s12">
            <p>Keluarga Berencana:</p>
            <div class="progress">
                @if($posyandu->KB == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m6 s12">
            <p>Imunisasi:</p>
            <div class="progress">
                @if($posyandu->imun == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
        <div class="col m6 s12">
            <p>Peningkatan Gizi:</p>
            <div class="progress">
                @if($posyandu->gizi == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m4 s12">
            <p>Penanggulangan Diare:</p>
            <div class="progress">
                @if($posyandu->diare == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
        <div class="col m4 s12">
            <p>Sanitasi Dasar:</p>
            <div class="progress">
                @if($posyandu->sanitasidasar == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
        <div class="col m4 s12">
            <p>Penyediaan Obat Esensial:</p>
            <div class="progress">
                @if($posyandu->penyediaanobat == '1')
                <div class="determinate green darken-3" style="width: 100%"></div>
                @else
                <div class="determinate red darken-3" style="width: 100%"></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection