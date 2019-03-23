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
                <h5 class="light grey-text text-darken-3 right">Hello, Isma</h5>
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
        <div class="row">
            <div class="col m7 s12">
                <div class="card-panel center indigo lighten-3">
                    <i class="material-icons medium">mail_outline</i>
                    <h4 class="center light grey-text text-darken-3">You(Isma)</h4>
                    <h5>3 minutes ago</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, dolorum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m7 s12 offset-m5">
                <div class="card-panel center teal lighten-3">
                    <i class="material-icons medium">reply</i>
                    <h4 class="center light grey-text text-darken-3">Petugas(Insan)</h4>
                    <h5>4 minutes ago</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, dolorum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="#">
    <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Pesan</h4>
            <p>Kirim Pesan</p>
            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="Insan" id="disabled" type="text" class="validate">
                        <label for="disabled">Kepada</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="col s6">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Isi pesan</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close pink lighten-effect pink lighten-2 btn col s2 z-depth-3"><i class="material-icons left">close</i>Tutup</a>
            <button class="btn waves-effect waves-light col s2 push-s1 z-depth-3" type="submit" name="action">Kirim
            <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</form>
@endsection
 
@section('footerSection')
@endsection