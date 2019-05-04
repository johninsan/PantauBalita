@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">List Petugas</h3>
</section>
<div class="container">
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama</th>
                    <th>Tanya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugass as $petugas)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$petugas->name}}</td>
                    <td><a href="{{route('isipetugas',base64_encode($petugas->id))}}"><i class="material-icons">chat</i></a></td>
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