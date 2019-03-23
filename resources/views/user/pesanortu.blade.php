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
                <h5 class="light grey-text text-darken-3 right">Hello, Isma</h5>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Isi</th>
                        <th>Waktu Masuk</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Insan</td>
                        <td>
                            <p><a href="#">haha[...]</a></p>
                        </td>
                        <td>23 seconds ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
 
@section('footerSection')
@endsection