@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="center light grey-text text-darken-3">Detail Petugas</h3>
</section>
@foreach($petugass as $petugas)
<div class="container">
    <div class="row">
        <div class="col m5 s12">
            <div class="card-panel blue darken-2 center white-text">
                <i class="medium material-icons">account_circle</i>
                <h5>Petugas</h5>
                <p>Silahkan bertanya kepada ahli kesehatan untuk kesehatan balita anda.</p>
            </div>
            <ul class="collection with-header">
                <li class="collection-header">
                    <h4>Data Petugas</h4>
                </li>
                <li class="collection-item">{{$petugas->name}}</li>
                <li class="collection-item">{{$petugas->phone}}</li>
                <li class="collection-item">{{$petugas->alamat}}</li>
            </ul>
        </div>
        @if(($countpesan)
        < 1) <div class="col m7 s12">
            <form action="{{route('messagePost')}}" method="POST">
                {{csrf_field()}}
                <div class="card-panel">
                    <h5>Kirim Pesan</h5>
                    <div class="input-field">
                        <input value="{{$petugas->id}}" id="disabled" type="hidden" name="idPenerima" class="validate">
                    </div>
                    <div class="input-field">
                        <input disabled value="{{$petugas->name}}" id="disabled" type="text" class="validate" name="name">
                        <label for="disabled">Kepada</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="judul" name="judul" class="validate">
                        <label for="judul">Judul Pesan</label>
                    </div>
                    <div class="input-field">
                        <textarea name="message" id="message" class="materialize-textarea" data-length="120"></textarea>
                        <label for="message">Isi Pesan</label>
                    </div>
                    <button type="submit" class="btn blue darken-2"><i class="material-icons right">send</i>Kirim</button>
                </div>
            </form>
    </div>
    @else
    <div class="col m7 s12">
        <div class="row">
            <div class="card-panel  teal accent-3">
                <span class="grey-text text-darken-4">Kamu telah mengirimkan pesan, harap tunggu balasan dari petugas. <br><a href="{{route('pesanortu')}}">Klik disini untuk melihat pesan masuk</a>
                </span>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
@endforeach
@endsection
 
@section('footerSection')
<script type="text/javascript">
    $(document).ready(function(){
    M.textareaAutoResize($('#message'));
    $('textarea#message').characterCounter();
});

</script>
@endsection