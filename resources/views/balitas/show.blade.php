@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Balita</h3>
</section>
<div class="container">
    @include('includes.messages')
    <div class="row">
        <a data-position="bottom" data-tooltip="Klik untuk mendaftarkan balita" href="{{route('DaftarBalita.create')}}" class="tooltipped pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Daftar</a>
    </div>
    <div class="row">
        @foreach($balitas as $balita)
        <div class="col s12 m4">
            <div class="card medium">
                <div class="card-image balitaimg">
                    <img src="{{ url( 'uploads/foto') }}/{{ $balita->foto }}">
                </div>
                <div class="card-content">
                    <h5 class="ligt card-title">{{$balita->nama}}</h5>
                    @if($balita->JK == 1)
                    <p>Laki-laki</p>
                    @else
                    <p>Perempuan</p>
                    @endif
                </div>
                <div class="card-action">
                    <a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk monitor gizi balita" href="{{route('listbalita',$balita->id)}}"><i class="material-icons">child_care</i></a>
                    <a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk mengubah data" href="{{route('DaftarBalita.edit',$balita ->id)}}"><i class="material-icons">edit</i></a>
                    <form method="post" id="delete-form-{{$balita->id}}" action="{{route('DaftarBalita.destroy',$balita ->id)}}" style="display: none">
                        {{csrf_field()}} {{method_field('DELETE')}}
                    </form>
                    <a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk menghapus data" href="" onclick="
                            if(confirm('Are you sure?'))
                            {
                            event.preventDefault();document.getElementById('delete-form-{{$balita->id}}').submit();
                            }
                            else{
                            event.preventDefault();
                            }"><i class="material-icons">delete</i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
 
@section('footerSection')
@endsection