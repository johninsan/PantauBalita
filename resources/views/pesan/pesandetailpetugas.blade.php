@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <h4 class="light grey-text text-darken-3">Pesan</h4>
            </div>
            <div class="col m6 s12">
                <h5 class="light grey-text text-darken-3 right">Hello, {{Auth::user()->name}}</h5>
            </div>
        </div>
    </div>
</section>
<section class="grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col m2 s12">
                <h5 class="light">Detail Pesan</h5>
            </div>
            <div class="col m2 s12 push-m1">
                <a class="waves-light btn modal-trigger" href="#modal2">Balas</a>
            </div>
        </div>
        @foreach($getPesan as $x)
        <div class="row">
            <input type="hidden" id="idPenerima" value="{{ $x->pengirim_id }}" />
            <input type="hidden" id="kode" value="{{ $x->kode }}" />
            <input type="hidden" id="judul" value="{{ $x->judul }}" />
        </div>
        @foreach(\App\User::where('id',$x->pengirim_id)->get() as $users) @if($x->pengirim_id != Auth::user()->id)
        <div class="row">
            <input type="hidden" id="namaUser" value="{{ $users->name }}" />
            <div class="col m6 s12 offset-m5">
                <div class="card-panel center teal lighten-3">
                    <h5 class="center light grey-text text-darken-3">{{$users->name}} - <small>{{ \Carbon\Carbon::createFromTimestamp(strtotime($x->created_at))->diffForHumans()}}</small>
                    </h5>
                    <p>{{$x->pesan}}</p>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col m6 s12">
                <div class="card-panel center indigo lighten-3">
                    <h5 class="center light grey-text text-darken-3">You({{$users->name}}) - <small>{{ \Carbon\Carbon::createFromTimestamp(strtotime($x->created_at))->diffForHumans()}}</small>
                    </h5>
                    <p>{{$x->pesan}}</p>
                </div>
            </div>
        </div>

        @endif @endforeach @endforeach
    </div>
</section>
<form role="form" enctype="multipart/form-data" action="{{route('messageReply')}}" method="POST">
    {{csrf_field()}}
    <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Pesan</h4>
            <p>Kepada :</p>
            <div class="row">
                <div class="input-field col s6">
                    <input disabled id="modal_nama" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col m8 s6">
                    <p>Judul :</p>
                    <input id="modal_judul" name="judul" type="text" class="validate">
                    <input id="modal_idpenerima" name="idPenerima" type="hidden">
                    <input id="modal_kode" name="kode" type="hidden">
                </div>
            </div>
            <div class="row">
                <div class="input-field col m8 s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" name="message" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Isi pesan</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close pink lighten-effect pink lighten-2 btn col s2 z-depth-3"><i class="material-icons left">close</i>Tutup</a>
            <button class="btn waves-effect waves-light col s2 push-s1 z-depth-3" type="submit">Kirim
            <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
<script type="text/javascript">
    $(document).ready(function(){

        var idPenerima = $('#idPenerima').val();
        var kode = $('#kode').val();
        var judul = $('#judul').val();
        var namaUser = $('#namaUser').val();

        $('#modal_idpenerima').val(idPenerima);
        $('#modal_kode').val(kode);
        $('#modal_judul').val(judul);
        $('#modal_nama').val(namaUser);
    })

</script>
@endsection