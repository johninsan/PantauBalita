@extends('layouts/app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Tambah Jadwal Posyandu</h3>
</section>
<div class="container">
    <form action="">
        <div class="row">
            <div class="input-field col m6 s12">
                <select>
                        <option value="" disabled selected>Pilih RW:</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                </select>
            </div>
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">date_range</i>
                <input type="text" name="tglposyandu" class="datepicker">
                <label>Tanggal Dilaksanakan:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="deskripsi" class="materialize-textarea" data-length="120"></textarea>
                <label for="deskripsi">Deskripsi Kegiatan:</label>
            </div>
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">phone</i>
                <input id="notelp" type="tel" class="validate" data-length="13">
                <label for="password">Nomor Telpon</label>
            </div>
        </div>
        <div class="row">
            <section class="blue lighten-4">
                <h5 class="light grey-text text-darken-3 center">Kegiatan di Posyandu:</h5>
            </section>
        </div>
        <div class="container">
            <div class="row">
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Kesehatan ibu dan anak</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Keluarga berencana</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Imunisasi</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Peningkatan gizi</span>
                </label>
            </div>
            <div class="row">
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Penanggulangan diare</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Sanitasi dasar</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" />
                    <span>Penyediaan obat esensial</span>
                </label>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col m10 s12">
                    <a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                    <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit" name="action">Submit
                    <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
 
@section('footerSection')
<script type="text/javascript">
    $('.datepicker').datepicker();
    M.textareaAutoResize($('#alamat'));
		$('input#notelp, textarea#deskripsi').characterCounter();
		$('.modal').modal();
		$('select').formSelect();

</script>
@endsection