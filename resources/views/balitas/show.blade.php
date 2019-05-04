@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Balita</h3>
</section>
<div class="container">
    <div class="row">
        <a href="{{route('DaftarBalita.create')}}" class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
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
                    <p>{{$balita ->JK? 'Laki-laki' : 'Perempuan'}}</p>
                </div>
                <div class="card-action">
                    <a href="{{route('monitor')}}"><i class="material-icons">computer</i></a>
                    <a href="{{route('DaftarBalita.edit',$balita ->id)}}"><i class="material-icons">edit</i></a>
                    <form method="post" id="delete-form-{{$balita->id}}" action="{{route('DaftarBalita.destroy',$balita ->id)}}" style="display: none">
                        {{csrf_field()}} {{method_field('DELETE')}}
                    </form>
                    <a href="" onclick="
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