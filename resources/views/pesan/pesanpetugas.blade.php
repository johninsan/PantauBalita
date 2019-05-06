@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col m6 s12">
                <h4 class="light grey-text text-darken-3">Pesan</h4>
            </div>
            <div class="col m6 s12">
                <h5 class="light grey-text text-darken-3 right">
                    Inbox
                </h5>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            @foreach($pesan as $pesans)
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                        <th>Dari</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Waktu Kirim</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            @foreach(\App\Model\modelUser::where('id',$pesans->pengirim_id)->get() as $user) {{$user->name}} @endforeach
                        </td>
                        <td>{{$pesans->judul}}</td>
                        <td>
                            <p><a class="tooltipped" data-position="top" data-tooltip="Klik untuk melihat percakapan" href="{{route('pesandetailpetugas',$pesans->kode)}}">{{ substr($pesans->pesan,0,60) }} [...]</a></p>
                        </td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($pesans->created_at))->diffForHumans() }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
    </div>
</section>
@endsection
 
@section('footerSection')
@endsection