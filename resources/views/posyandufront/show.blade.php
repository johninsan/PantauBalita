@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="blue lighten-3">
    <h3 class="center light grey-text text-darken-3">Jadwal Posyandu</h3>
</section>
<div class="container">
    <div class="row">
        @foreach($posyandus as $posyandu)
        <div class="col s12 m4">
            <div class="card brown darken-1">
                <div class="card-content white-text">
                    <span class="card-title">RW : {{$posyandu->rw_id}}</span>
                    <h5 class="light">{{str_limit($posyandu->deskripsi,10)}}</h5>
                    <p>{{\Carbon\Carbon::parse($posyandu->tanggal)->format('d F Y')}}</p>
                </div>
                <div class="card-action">
                    <a href="{{route('isiposyandu',base64_encode($posyandu->id))}}">Lihat detail</a>
                </div>
            </div>
        </div>
        @endforeach
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