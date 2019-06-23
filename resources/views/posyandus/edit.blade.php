@extends('layouts/app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-4">
    <h3 class="light grey-text text-darken-3 center">Tambah Jadwal Posyandu</h3>
</section>
<div class="container">
    <form action="{{route('Posyandu.update',$posyandu->id)}}" method="post">
        {{csrf_field()}}{{method_field('PUT')}}
        <div class="row">
            <div class="input-field col m6 s12">
                <select name="rw_id">
                        <option value="" disabled selected>Pilih RW:</option>
                            @foreach(\App\Model\Posyandu\rw::all() as $cihuy)
                                  <option value="{{ $cihuy->id }}"
                                    @if($posyandu ->rw_id == $cihuy->id)
                                    selected
                                    @endif>{{ $cihuy->rw }}
                                </option>
                            @endforeach
                </select>
            </div>
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">date_range</i>
                <input type="text" name="tanggal" class="datepicker" value="{{$posyandu->tanggal}}">
                <label>Tanggal Dilaksanakan:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="deskripsi" name="deskripsi" class="materialize-textarea" data-length="120">{{$posyandu->deskripsi}}</textarea>
                <label for="deskripsi">Deskripsi Kegiatan:</label>
            </div>
            <div class="input-field col m6 s12">
                <i class="material-icons prefix">phone</i>
                <input id="notelp" value="{{$posyandu->phone}}" type="tel" name="phone" class="validate" data-length="13">
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
                    <input type="checkbox" value="1" name="kesehatanibuanak"@if($posyandu ->kesehatanibuanak == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Kesehatan ibu dan anak</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="KB"@if($posyandu ->KB == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Keluarga berencana</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="imun" @if($posyandu ->imun == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Imunisasi</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="gizi" @if($posyandu ->gizi == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Peningkatan gizi</span>
                </label>
            </div>
            <div class="row">
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="diare" @if($posyandu ->diare == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Penanggulangan diare</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="sanitasidasar" @if($posyandu ->sanitasidasar == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Sanitasi dasar</span>
                </label>
                <label class="col m3 s12">
                    <input type="checkbox" value="1" name="penyediaanobat" @if($posyandu ->penyediaanobat == 1)
                    {{'checked'}}
                    @endif/>
                    <span>Penyediaan obat esensial</span>
                </label>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col m10 s12">
                    <a href="{{route('Posyandu.index')}}" class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
                    <button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit">Submit
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
    M.textareaAutoResize($('#alamat'));
		$('input#notelp, textarea#deskripsi').characterCounter();
		$('.modal').modal();
		$('select').formSelect();

</script>
@endsection