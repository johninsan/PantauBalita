@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-1">
    <h3 class="center light grey-text text-darken-3">Jadwal Posyandu</h3>
</section>
<div class="container">
    <div class="row">
        @foreach($posyandus as $posyandu)
        <div class="col s12 m4">
            <div class="card small teal accent-4">
                <div class="card-content white-text">
                    <span class="card-title">JADWAL</span>
                    <br>
                    <h5>RW : {{$posyandu->rw_id}}</h5>
                    <h5 class="light">{{str_limit($posyandu->deskripsi,10)}}</h5>
                    <p>Dilaksanakan : {{\Carbon\Carbon::parse($posyandu->tanggal)->format('d F Y')}}</p>
                </div>
                <div class="card-action teal lighten-2">
                    <a href="{{route('isiposyandu',base64_encode($posyandu->id))}}">Lihat detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        {{$posyandus->links()}}
    </div>
    {{--
    <ul class="pagination">
        <li class="waves-effect"><i class="material-icons">chevron_left</i> {{ $posyandus->links() }}
        </li>
        <li class="waves-effect"><i class="material-icons">chevron_right</i></li>
    </ul> --}}
</div>
@endsection
 
@section('footerSection')
@endsection