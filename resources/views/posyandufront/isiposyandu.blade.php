@extends('layouts/app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="light grey-text text-darken-3 center">Detail Jadwal Posyandu</h3>
</section>
<div class="container">
    <div class="row">
        <div class="col m8 s12 offset-m2">
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4>Dilaksanakan pada RW : 12</h4>
                </li>
                <li class="collection-item">Pada tanggal : 31 Maret 2019</li>
                <li class="collection-item">
                    <h5 class="light">Penjelasan detail:</h5>
                </li>
                <li class="collection-item">Alvin</li>
            </ul>
        </div>
    </div>
</div>
<section class="grey lighten-3">
    <h3 class="light grey-text text-darken-3 center">Kegiatan:</h3>
</section>
<div class="container">
    <div class="row">
        <div class="col m6 s12">
            <p>Kesehatan ibu dan Anak:</p>
            <div class="progress">
                <div class="determinate green darken-3" style="width: 100%"></div>
            </div>
        </div>
        <div class="col m6 s12">
            <p>Keluarga Berencana:</p>
            <div class="progress">
                <div class="determinate red darken-3" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m6 s12">
            <p>Imunisasi:</p>
            <div class="progress">
                <div class="determinate green darken-3" style="width: 100%"></div>
            </div>
        </div>
        <div class="col m6 s12">
            <p>Peningkatan Gizi:</p>
            <div class="progress">
                <div class="determinate red darken-3" style="width: 100%"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col m4 s12">
            <p>Penanggulangan Diare:</p>
            <div class="progress">
                <div class="determinate green darken-3" style="width: 100%"></div>
            </div>
        </div>
        <div class="col m4 s12">
            <p>Sanitasi Dasar:</p>
            <div class="progress">
                <div class="determinate red darken-3" style="width: 100%"></div>
            </div>
        </div>
        <div class="col m4 s12">
            <p>Penyediaan Obat Esensial:</p>
            <div class="progress">
                <div class="determinate green darken-3" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div>
@endsection