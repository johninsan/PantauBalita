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
            <form>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first" type="text" name="first" class="validate">
                        <label for="first">Nama Awal :</label>
                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="last" name="last" type="text" class="validate">
                        <label for="last">Nama Akhir:</label>
                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">location_on</i>
                        <input id="dob" name="pob" placeholder="contoh : Bekasi" type="text" class="validate">
                        <label for="nama">Tempat Lahir:</label>
                    </div>
                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" name="dob" class="datepicker">
                        <label>Tanggal Lahir:</label>
                    </div>
                </div>
                <div class="row">
                    <p class="col m6 s12">Jenis Kelamin:
                    </p>
                </div>
                <div class="row">
                    <label class="col m3 s6">
                            <input class="with-gap" name="group1" type="radio"  />
                            <span>Laki-laki</span>
                        </label>
                    <label class="col m3 s6">
                            <input class="with-gap" name="group1" type="radio"  />
                            <span>Perempuan</span>
                        </label>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col m10 s12">
                            <a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                            <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit" name="action">Daftar
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