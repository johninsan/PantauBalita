@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Nama OrangTua</h3>
</section>
<div class="container">
    @include('includes.messages')
    <div class="row">
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama</th>
                    <th>Telephone</th>
                    <th>Alamat</th>
                    <th>Monitor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ortus as $ortu)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$ortu->name}}</td>
                    <td>{{$ortu->phone}}</td>
                    <td>{{$ortu->alamat}}</td>
                    <td><a class="tooltipped" data-position="bottom" data-tooltip="lihat data balita orang tua terkait" href="{{route('getBalitabyOrtu',$ortu->id)}}"><i class="material-icons">child_care</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('footerSection')
<script src="{{ asset('materialize/datatable/datatables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready( function () {
		$('#myTable').DataTable();
	} );

</script>
@endsection