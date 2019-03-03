@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<div class="container">
	<div class="section">
		<h3 class="grey-text light center">Test Yajra</h3>
		<div class="row">
			<a class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
		</div>
		<div class="row">
			<table id="myTable" class="highlight centered responsive-table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Item Name</th>
						<th>Item Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->alamat}}</td>
						<td>{{$user->phone}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
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