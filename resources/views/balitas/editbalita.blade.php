@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Daftarkan Balita Anda</h3>
</section>
<div class="container">
    <section>
        <div class="row">
            <form action="{{route('DaftarBalita.update',$balita->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}} {{method_field('PUT')}}
                <div class="row">
                    <div class="input-field col m8 s12 offset-m2">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first" type="text" name="nama" value="{{$balita->nama}}" class="validate">
                        <label for="first">Nama Balita :</label>
                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">location_on</i>
                        <input id="dob" name="pob" placeholder="contoh : Bekasi" value="{{$balita->pob}}" type="text" class="validate">
                        <label for="nama">Tempat Lahir:</label>
                    </div>
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" name="dob" value="{{$balita->dob}}" class="datepicker">
                        <label>Tanggal Lahir:</label>
                    </div>
                </div>
                <div class="row">
                    <p class="col m6 s12">Jenis Kelamin:
                    </p>
                </div>
                <div class="row">
                    <label class="col m3 s6">
                            <input class="with-gap" value="1" name="jk" type="radio"  
                            @if($balita->JK == 1)
                            {{'checked'}}
                            @endif/>
                            <span>Laki-laki</span>
                        </label>
                    <label class="col m3 s6">
                            <input class="with-gap" value="2" name="jk" type="radio"  
                            @if($balita->JK == 2)
                            {{'checked'}}
                            @endif/>
                            <span>Perempuan</span>
                        </label>
                    <div class="file-field input-field col m6 s12">
                        <div>
                            <label>Foto Lama:</label>
                            <img src="{{ url('uploads/foto/'.$balita->foto) }}" style="width: 150px; height: 150px;">
                        </div>
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" placeholder="Unggah foto balita" type="text">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col m10 s12">
                            <a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                            <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit">Daftar
                                        <i class="material-icons right">done</i>
                                    </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
 
@section('footerSection')
<script type="text/javascript">
    $('.datepicker').datepicker();

</script>
@endsection